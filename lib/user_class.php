<?php
	
	require_once "database_class.php";
	
	class User extends DataBase {
		
		public function __construct() {
			parent::__construct();
		}
		
		public function AddUser($login, $email, $name, $age, $country, $city, $password, $gender, $avatar) {
			if(!$this->checkData($login, $password)) return false;
			return $this->query("INSERT INTO `test_users` (`id`, `login`, `email`, `name`, `age`, `country`, `city`, `password`, `gender`, `avatar`, `regdate`) VALUES ('', '$login', '$email', '$name', '$age', '$country', '$city', '$password', '$gender', '$avatar', '".time()."')"); 
		}

		public function checkData($login, $password) {
			if(!$this->valid->validLogin($login)) return false;
			if(!$this->valid->validHash($password)) return false;
			return true;
		}
		
		public function FormChars($p1) {
			return nl2br(htmlspecialchars(trim($p1), ENT_QUOTES), false);
		}
		
	}
	
	$user = new User();
	
?>