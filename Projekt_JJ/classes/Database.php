<?php

class Database {
	private $mysqli;

	public function __construct($server, $user, $pass, $base) {
		$this->mysqli = new mysqli($server, $user, $pass, $base);

		if ($this->mysqli->connect_errno) {
			printf("Nie udało się połączyć z serwerem: %s\n", $this->mysqli->connect_error);
			exit();
		}
		if ($this->mysqli->set_charset("utf8")) {}
	}

	function __destruct()
	{
		$this->mysqli->close();
	}

	public function select($sql, $fields) {
		// $sql - query
		// $fields - database columns

		$content = "";

		if ($result = $this->mysqli->query($sql)) {
			$colnumber = count($fields);

			$content .= "<table><tbody><tr>";
			foreach ($fields as $field) {
				$content .= "<th>$field</th>";
			}
			$content .= "</tr>";
			while ($row = $result->fetch_object()) {
				$content .= "<tr>";
				for ($i = 0; $i < $colnumber; $i++) {
					$field = $fields[$i];
					$content .= "<td>" . $row->$field . "</td>";
				}
				$content .= "</tr>";
			}
			$content .= "</tbody></table>";
			$result->close();
		}
		return $content;
	}

	public function selectUser($login, $passwd, $table) {
		$id = -1;
		$sql = "SELECT * FROM $table WHERE userName='$login'";

		if ($result = $this->mysqli->query($sql)) {
			$num = $result->num_rows;

			if ($num == 1) {
				$row = $result->fetch_object();
				$hash = $row->passwd;

				if (password_verify($passwd, $hash)) {
					$id = $row->id;
				}
			}
		}
		return $id;
	}

	public function insert($sql) {
		if ($this->mysqli->query($sql))
			return true;
		else
			return false;
	}

	public function update($sql) {
		if ($this->mysqli->query($sql))
			return true;
		else
			return false;
	}

	public function delete($sql) {
		if ($this->mysqli->query($sql))
			return true;
		else
			return false;
	}

	public function selectOrder($sql) {
		$content = "";
		$fields = ['orderId', 'userId', 'kursy', 'fullName', 'email', 'phone', 'address', 'delivery', 'total', 'orderDate'];
		$pola = ['Nr zamówienia', 'Id użytkownika', 'Kursy', 'Imię i nazwisko', 'Email', 'Telefon', 'Adres', 'Dostawa', 'Suma', 'Data'];
		if ($result = $this->mysqli->query($sql)) {
			$colnumber = count($fields);

			$content .= "<table class='table table-bordered'><tbody><tr class='table-primary'>";
			foreach ($pola as $field) {
				$content .= "<th>$field</th>";
			}
			$content .= "</tr>";

			while ($row = $result->fetch_object()) {
				$content .= "<tr>";
				for ($i = 0; $i < $colnumber; $i++) {
					$field = $fields[$i];
					$content .= "<td>" . $row->$field . "</td>";
				}
				$content .= "</tr>";
			}
			$content .= "</tbody></table>";
			$result->close();
		}
		return $content;
	}

	public function selectUserTable($sql) {
		$content = "";
		$fields = ['id', 'userName', 'fullName', 'email', 'passwd', 'status', 'date'];
		$pola = ['Id użytkownika', 'Login', 'Imię i nazwisko', 'Email', 'Hasło', 'Status', 'Data'];
		if ($result = $this->mysqli->query($sql)) {
			$colnumber = count($fields);

			$content .= "<table class='table table-bordered'><tbody><tr class='table-primary'>";
			foreach ($pola as $field) {
				$content .= "<th>$field</th>";
			}
			$content .= "</tr>";

			while ($row = $result->fetch_object()) {
				$content .= "<tr>";
				for ($i = 0; $i < $colnumber; $i++) {
					$field = $fields[$i];
					$content .= "<td>" . $row->$field . "</td>";
				}
				$content .= "</tr>";
			}
			$content .= "</tbody></table>";
			$result->close();
		}
		return $content;
	}

	public function getMysqli() {
		return $this->mysqli;
	}


	public function checkUserExists($email, $userName) {
		// Przygotuj zapytanie SQL
		$sql = "SELECT COUNT(*) as count FROM users WHERE email = ? OR userName = ?";

		// Przygotowanie zapytania i przekazanie parametrów
		$stmt = $this->mysqli->prepare($sql);
		$stmt->bind_param('ss', $email, $userName);
		$stmt->execute();
		$result = $stmt->get_result();

		// Pobierz wynik
		$row = $result->fetch_assoc();
		$stmt->close();

		// Jeśli znaleziono wiersze, zwróć true
		return $row['count'] > 0;
	}


}
?>