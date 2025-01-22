<?php

class Order
{
	protected $userId;
	protected $kursy;
	protected $fullName;
	protected $email;
	protected $phone;
	protected $address;
	protected $delivery;
	protected $total;
	protected $orderDate;
	function __construct($userId, $kursy, $fullName, $email, $phone, $address, $delivery, $total) {
		$this->userId = $userId;
		$this->kursy = $kursy;
		$this->fullName = $fullName;
		$this->email = $email;
		$this->phone = $phone;
		$this->address = $address;
		$this->delivery = $delivery;
		$this->total = $total;
		$this->orderDate = date("Y-m-d H:i:s");
	}

	public function saveToDB($db) {
		$sql = "INSERT INTO orders VALUES (NULL, '$this->userId', '$this->kursy', '$this->fullName', '$this->email', '$this->phone', '$this->address', '$this->delivery', '$this->total', '$this->orderDate')";
		if($db->insert($sql)){
			return true;
		} else {
			return false;
		}
	}
}