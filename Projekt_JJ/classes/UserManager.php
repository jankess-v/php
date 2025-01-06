<?php
	include_once "classes/Database.php";
	$db = new Database("localhost", "root", "", "klienci");
class UserManager
{
	public function loginForm(){
		echo '
            <form id="contactForm" method="post" action="">
            	<div class="text-center mb-5">
					<div class="feature bg-primary bg-gradient text-white rounded-3 mb-3">
						<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M480-120v-80h280v-560H480v-80h280q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H480Zm-80-160-55-58 102-102H120v-80h327L345-622l55-58 200 200-200 200Z"/></svg>	
					</div>
					<h1 class="fw-bolder">Zaloguj się</h1>
				</div>
				<!--Login input-->
				<div class="form-floating mb-3 input-control">
					<input class="form-control" id="username" name="username" type="text" placeholder="Login">
					<label for="userName">Login</label>
				</div>
				<!--Hasło input-->
				<div class="form-floating mb-3 input-control">
					<input class="form-control" id="passwd" name="passwd" type="password" placeholder="Hasło">
					<label for="passwd">Hasło</label>
				</div>
				<div class="d-grid">
					<button class="btn btn-primary btn-lg" id="submit" type="submit" name="zaloguj" value="Zaloguj">Zaloguj</button>
				</div>
			</form>
						';
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
		if ($result = $db->mysqli->query("SELECT userId FROM logged_in_users WHERE sessionId = $sessionId")) {
			$row = $result->fetch_object();
			$userId = $row->userId;
		}
		return $userId;
	}
}

?>