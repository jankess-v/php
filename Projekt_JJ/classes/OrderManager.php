<?php
	include_once 'Database.php';
	include_once 'Order.php';
class OrderManager
{
	public function checkOrder($userId) {
		$db = new Database("localhost", "root", "", "klienci");
		$args = [
			'kursy' => ['filter' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
				'flags' => FILTER_REQUIRE_ARRAY],
			'fullName' => ['filter' => FILTER_VALIDATE_REGEXP,
				'options' => ['regexp' => '/^[A-ZŁŚŻŹĆŃÓ][a-ząęłńśćźżó-]{1,24} [A-ZŁŚŻŹĆŃÓ][a-ząęłńśćźżó-]{1,24}$/']],
			'email' => ['filter' => FILTER_VALIDATE_EMAIL],
			'phone' => ['filter' => FILTER_VALIDATE_REGEXP,
				'options' => ['regexp' => '/^([+][0-9]{2})?[1-9][0-9]{8}$/']],
			'adress' => ['filter' => FILTER_SANITIZE_FULL_SPECIAL_CHARS],
			'delivery' => ['filter' => FILTER_SANITIZE_FULL_SPECIAL_CHARS]
		];

		$kursy = ["japonski" => 129.99,
				"francuski" => 149.99,
				"niemiecki" => 149.99];

		$dane = filter_input_array(INPUT_POST, $args);
		$errors = "";


		$wybraneKursy = $dane['kursy'];

		$total = 0.0;
		foreach ($dane as $key => $val) {
			if ($val === false || $val === NULL || $val === '') {
				$errors .= "<br>" . $key;
			}
		}
		if($wybraneKursy !== NULL){
			foreach($kursy as $key => $val) {
				foreach($wybraneKursy as $kurs) {
					if($key == $kurs) {
						$total += $val;
					}
				}
			}
			$wybraneKursy = implode(", ", $wybraneKursy);
		}

		$delivery = $dane['delivery'];
		switch($delivery){
			case "1":
				$delivery = "DPD";
				$total += 15.39;
				break;
			case "2":
				$delivery = "Poczta Polska";
				$total += 11.99;
				break;
			case "3":
				$delivery = "InPost";
				$total += 13.99;
				break;
		}

		$fullName = $dane['fullName'];
		$email = $dane['email'];
		$phone = $dane['phone'];
		$adress = $dane['adress'];

		if($errors === "") {
			$order = new Order($userId, $wybraneKursy, $fullName, $email, $phone, $adress, $delivery, $total);
			$order->saveToDB($db);
			echo "<div class='alert alert-success m-5'><b>Udało się złożyć zamówienie</b></div>";
		} else {
			echo "<div class='alert alert-danger m-5'><b>Błędne dane:</b> $errors</div>";
			$order = NULL;
		}
	}

	public function displayOrdersById($db, $userId) {
		$sql = "SELECT * FROM orders WHERE userId = '$userId'";
		$result = $db->selectOrder($sql);
		if ($result !== "<table class='table table-bordered'><tbody><tr class='table-primary'><th>Nr zamówienia</th><th>Id użytkownika</th><th>Kursy</th><th>Imię i nazwisko</th><th>Email</th><th>Telefon</th><th>Adres</th><th>Dostawa</th><th>Suma</th><th>Data</th></tr></tbody></table>"){
			echo $result;
		} else {
			echo '<div class="alert alert-warning m-3">Brak zamówień do wyświetlenia.</div>';
		}
	}
}