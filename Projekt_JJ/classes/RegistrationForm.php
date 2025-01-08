<?php
	include_once "classes/Database.php";
class RegistrationForm
{
    protected $user;
    function __construct()
    {
		echo '
            <form id="registrationForm" method="post" action="register.php">
            	<div class="text-center mb-5">
					<div class="feature bg-primary bg-gradient text-white rounded-3 mb-3">
<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M200-246q54-53 125.5-83.5T480-360q83 0 154.5 30.5T760-246v-514H200v514Zm280-194q58 0 99-41t41-99q0-58-41-99t-99-41q-58 0-99 41t-41 99q0 58 41 99t99 41ZM200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h560q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H200Zm69-80h422q-44-39-99.5-59.5T480-280q-56 0-112.5 20.5T269-200Zm211-320q-25 0-42.5-17.5T420-580q0-25 17.5-42.5T480-640q25 0 42.5 17.5T540-580q0 25-17.5 42.5T480-520Zm0 17Z"/></svg>					</div>
					<h1 class="fw-bolder">Zarejestruj się</h1>
				</div>
				<!--Name input-->
				<div class="form-floating mb-3 input-control">
					<input class="form-control" id="fullName" name="fullName" type="text" placeholder="Imię">
					<label for="imie">Imię i nazwisko</label>
				</div>
				<!--Login input-->
				<div class="form-floating mb-3 input-control">
					<input class="form-control" id="userName" name="userName" type="text" placeholder="Login">
					<label for="userName">Login</label>
				</div>
				<!--Hasło input-->
				<div class="form-floating mb-3 input-control">
					<input class="form-control" id="passwd" name="passwd" type="password" placeholder="Hasło">
					<label for="passwd">Hasło</label>
				</div>
				<!--Email address input-->
				<div class="form-floating mb-3 input-control">
					<input class="form-control" id="email" name="email" type="text" placeholder="name@example.com"/>
					<label for="email">Email</label>
				</div>
				<div class="d-grid">
					<button class="btn btn-primary btn-lg" id="submit" type="submit" name="submit" value="Zarejestruj">Zarejestruj się</button>
				</div>
			</form>
						';
    }

    function checkUser() {
	    $db = new Database("localhost", "root", "", "klienci");
        $args = [
	        'userName' => ['filter' => FILTER_VALIDATE_REGEXP,
		        'options' => ['regexp' => '/^[0-9A-Za-z_-]{2,25}$/']],
	        'fullName' => ['filter' => FILTER_VALIDATE_REGEXP,
		        'options' => ['regexp' => '/^[A-ZŁŚŻŹĆŃÓ][a-ząęłńśćźżó-]{1,24} [A-ZŁŚŻŹĆŃÓ][a-ząęłńśćźżó-]{1,24}$/']],
	        'passwd' => ['filter' => FILTER_VALIDATE_REGEXP,
		        'options' => ['regexp' => '/^.{5,}$/']],
	        'email' => ['filter' => FILTER_VALIDATE_EMAIL]
        ];
        $dane = filter_input_array(INPUT_POST, $args);
        $errors = "";

		$email = $dane['email'];
		$userName = $dane['userName'];

		if($db->checkUserExists($email, $userName)) {
			$errors .= "<br>Użytkownik o podanym emailu lub loginie już istnieje";
		}

        foreach ($dane as $key => $val) {
            if ($val === false || $val === NULL || $val === '') {
                $errors .= "<br>" . $key;
            }
        }
        if ($errors === "") {
            $this->user = new User($dane['userName'], $dane['fullName'], $dane['email'], $dane['passwd']);
        } else {
            echo "<br>Błędne dane: <b>" . $errors . "</b>";
            $this->user = NULL;
        }
        return $this->user;
    }
}