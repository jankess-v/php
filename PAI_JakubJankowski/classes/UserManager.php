<?php
	include_once "classes/Database.php";
	include_once "classes/User.php";
	$db = new Database("localhost", "root", "", "klienci");
class UserManager
{
	public function loginForm(){
		echo '
            <form id="contactForm" method="post" action="">
			    <div class="text-center mb-5">
			        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3">
			            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed">
			                <path d="M480-120v-80h280v-560H480v-80h280q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H480Zm-80-160-55-58 102-102H120v-80h327L345-622l55-58 200 200-200 200Z"/>
			            </svg>    
			        </div>
			        <h1 class="fw-bolder">Zaloguj się</h1>
			    </div>
			    <!--Login input-->
			    <div class="form-floating mb-3 input-control">
			        <input class="form-control" id="username" name="username" type="text" placeholder="Login">
			        <label for="username">Login</label>
			    </div>
			    <!--Hasło input-->
			    <div class="form-floating mb-3 input-control">
			        <input class="form-control" id="passwd" name="passwd" type="password" placeholder="Hasło">
			        <label for="passwd">Hasło</label>
			    </div>
			    <div class="d-grid">
			        <button class="btn btn-primary btn-lg" id="submit" type="submit" name="zaloguj" value="Zaloguj">Zaloguj</button>
			    </div>
			    <div class="text-center mt-3">
			        <small>Nie masz konta? <a href="register.php">Zarejestruj się</a></small>
			    </div>
			</form>
						';
	}

	public function adminAddUserForm() {
		echo '
            <form id="addUser" method="post" action="userData.php">
			    <!--Status input-->
	            <div class="form-floating mb-3 input-control">
	                <select class="form-select" id="status" name="status">
	                    <option value="1">1 - Użytkownik</option>
	                    <option value="2">2 - Admin</option>
	                </select>
	                <label for="status">Status</label>
	            </div>
			    <!--userName input-->
			    <div class="form-floating mb-3 input-control">
			        <input class="form-control" id="userName" name="userName" type="text" placeholder="Username">
			        <label for="userName">Nazwa użytkownika</label>
			    </div>
			    <!--password input-->
			    <div class="form-floating mb-3 input-control">
			        <input class="form-control" id="passwd" name="passwd" type="password" placeholder="Hasło">
			        <label for="passwd">Hasło</label>
			    </div>
			    <!--fullName input-->
			    <div class="form-floating mb-3 input-control">
			        <input class="form-control" id="fullName" name="fullName" type="text" placeholder="Imię i nazwisko">
			        <label for="fullName">Imię i nazwisko</label>
			    </div>
			    <!--email input-->
			    <div class="form-floating mb-3 input-control">
			        <input class="form-control" id="email" name="email" type="email" placeholder="Email">
			        <label for="email">Email</label>
			    </div>
			    <div class="d-grid">
			        <button class="btn btn-primary btn-lg" id="submit" type="submit" name="addUser" value="Dodaj">Dodaj</button>
			    </div>
			</form>
						';
	}

	public function adminAddUser($db) {
		$args = [
			'userName' => ['filter' => FILTER_VALIDATE_REGEXP,
				'options' => ['regexp' => '/^[0-9A-Za-z_-]{2,25}$/']],
			'fullName' => ['filter' => FILTER_VALIDATE_REGEXP,
				'options' => ['regexp' => '/^[A-ZŁŚŻŹĆŃÓ][a-ząęłńśćźżó-]{1,24} [A-ZŁŚŻŹĆŃÓ][a-ząęłńśćźżó-]{1,24}$/']],
			'passwd' => ['filter' => FILTER_VALIDATE_REGEXP,
				'options' => ['regexp' => '/^.{5,}$/']],
			'email' => ['filter' => FILTER_VALIDATE_EMAIL],
			'status' => ['filter' => FILTER_SANITIZE_FULL_SPECIAL_CHARS]
		];

		$dane = filter_input_array(INPUT_POST, $args);
		$errors = "";

		$userName = $dane['userName'];
		$fullName = $dane['fullName'];
		$passwd = $dane['passwd'];
		$email = $dane['email'];
		$status = $dane['status'];

		if($db->checkUserExists($email, $userName)) {
			$errors .= "<br>Użytkownik o podanym emailu lub loginie już istnieje";
		}

		foreach ($dane as $key => $val) {
			if ($val === false || $val === NULL || $val === '') {
				$errors .= "<br>" . $key;
			}
		}
		if ($errors === "") {
			$this->user = new User($userName, $fullName, $email, $passwd);
			$this->user->setStatus($status);
			$this->user->saveToDB($db);
			echo '<meta http-equiv="refresh" content="0;url=userData.php">';
		} else {
			echo "<div class='alert alert-danger m-5'><b>Błędne dane:</b> $errors</div>";
			$this->user = NULL;
		}
	}

	public function login($db){
		$args = [
			'username' => FILTER_SANITIZE_ADD_SLASHES,
			'passwd' => FILTER_SANITIZE_ADD_SLASHES
		];

		$dane = filter_input_array(INPUT_POST, $args);
		$username = $dane['username'];
		$passwd = $dane['passwd'];
		$userId = $db->selectUser($username, $passwd, "users");

		if($userId >= 0){
			session_start();
			//$sql = "delete from logged_in_users where userId = '$userId'";
			$sessionId = session_id();
			$date = date("Y-m-d H:i:s");
			$_SESSION["loggedin"] = true;

			$db->delete("DELETE FROM logged_in_users WHERE userId = '$userId'");
			$db->insert("INSERT INTO logged_in_users VALUES ('$sessionId', '$userId', '$date')");
		}
		return $userId;
	}

	public function logout($db){
		session_start();
		$sessionId = session_id();
		//$_SESSION = [];

		$sql = "delete from logged_in_users where sessionId = '$sessionId'";
		if($db->delete($sql)){
			echo "
			<div class='alert alert-danger m-5 text-center'>
				<h4>Wylogowano</h4>
			</div>";
			header("Location: login.php");
		} else {
			echo "Nie udało się wylogować";
		}

		setcookie(session_name(), '', time() - 42000, '/');
		session_destroy();
		$_SESSION["loggedin"] = false;
	}

	public function getLoggedInUser($db, $sessionId){
		$userId = -1;
		if ($result = $db->getMysqli()->query("SELECT userId FROM logged_in_users WHERE sessionId = '$sessionId'")) {
			$row = $result->fetch_object();
			$userId = $row->userId;
		}
		return $userId;
	}

	public function getLoggedInUserData($db, $userId) {
		if ($userId <= 0) {
			return null;
		}

		$sql = "SELECT userName, fullName, email, status, passwd, date FROM users WHERE id = ?";
		$stmt = $db->getMysqli()->prepare($sql);
		$stmt->bind_param("i", $userId);
		$stmt->execute();
		$result = $stmt->get_result();

		if ($result->num_rows > 0) {
			return $result->fetch_assoc();
		}

		return null;
	}

	public function getLoggedInUserDate($db, $userId) {
		if ($userId <= 0) {
			return null;
		}

		$sql = "SELECT lastUpdate FROM logged_in_users WHERE userId = '$userId'";
		$result = $db->getMysqli()->query($sql);
		if($result->num_rows > 0){
			$row = $result->fetch_object();
			$lastUpdate = $row->lastUpdate;
			return $lastUpdate;
		}

		return null;
	}

	public function updateExistingUser($db, $userId){
		$args = [
			'userName' => ['filter' => FILTER_VALIDATE_REGEXP,
				'options' => ['regexp' => '/^[0-9A-Za-z_-]{2,25}$/']],
			'fullName' => ['filter' => FILTER_VALIDATE_REGEXP,
				'options' => ['regexp' => '/^[A-ZŁŚŻŹĆŃÓ][a-ząęłńśćźżó-]{1,24} [A-ZŁŚŻŹĆŃÓ][a-ząęłńśćźżó-]{1,24}$/']],
			'email' => ['filter' => FILTER_VALIDATE_EMAIL]
		];
		//Sprawdź poprawność edytowanych danych
		$dane = filter_input_array(INPUT_POST, $args);
		$errors = "";
		//Pobierz dane usera przed ich usunięciem
		$previousData = $this->getLoggedInUserData($db, $userId);

		$userName = $dane['userName'];
		$email = $dane['email'];
		$fullName = $dane['fullName'];

		$passwd = $previousData['passwd'];
		$status = $previousData['status'];
		$date = $previousData['date'];
		$previousUserName = $previousData['userName'];
		$previousEmail = $previousData['email'];
		$previousFullName = $previousData['fullName'];

		foreach ($dane as $key => $val) {
			if ($val === false || $val === NULL || $val === '') {
				$errors .= "<br>" . $key;
			}
		}

		if ($errors === "") {
			$db->delete("DELETE FROM users WHERE id = '$userId'");

			if($db->checkUserExists($email, $userName) === true){
				echo "<div class='alert alert-danger m-5'>Istnieje użytkownik o podanym emailu lub loginie!</div>";
				$sql = "INSERT INTO users VALUES ('$userId', '$previousUserName', '$previousFullName', '$previousEmail', '$passwd', '$status', '$date')";
				$db->insert($sql);
				exit();
			}

			$sql = "INSERT INTO users VALUES ('$userId', '$userName', '$fullName', '$email', '$passwd', '$status', '$date')";
			if($db->insert($sql)){
				echo "<div class='alert alert-success m-5'>Dane zmienione pomyślnie!</div>";
				echo '<meta http-equiv="refresh" content="0;url=userData.php">';
				exit();
			}
		} else {
			echo "<div class='alert alert-danger m-5'><b>Błędne dane:</b> $errors</div>";
		}
	}

	public function getAllUsersTable($db) {
		$sql = "SELECT * FROM users";
		$result = $db->selectUserTable($sql);
		if ($result !== "<table class='table table-bordered'><tbody><tr class='table-primary'><th>Id użytkownika</th><th>Login</th><th>Imię i nazwisko</th><th>Email</th><th>Hasło</th><th>Status</th><th>Data</th></tr></tbody></table>"){
			echo $result;
		} else {
			echo '<div class="alert alert-warning m-3">Brak zamówień do wyświetlenia</div>';
		}
	}
}

?>