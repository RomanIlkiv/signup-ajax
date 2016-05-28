<?php
	require_once "config.php";
	
	class CheckValid {
		
		private $config;
		
		public function __construct() {
			$this->config = new Config();
		}
		
		public function validLogin($login) {
			if ($this->isContainQuotes($login)) return false;
			if (preg_match("/^\d*$/i", $login)) return false;
			return true;
		}
		
		public function validHash($hash) {
			if (!$this->validString($hash, 32, 32)) return false;
			if (!$this->isOnlyLettersAndDigits($hash)) return false;
			return true;
		}
		
		public function validString($string, $min_lenght, $max_lenght) {
			if (!is_string($string)) return false;
			if (strlen($string) < $min_lenght) return false;
			if (strlen($string) > $max_lenght) return false;
			return true;
		}
		
		public function isOnlyLettersAndDigits($string) {
			if (!is_int($string) && (!is_string($string))) return false;
			if (!preg_match("/[a-zа-я0-9]*/i", $string)) return false;
			return true;
		}
		
		private function isContainQuotes($string) {
			$array = array("\"", "'", "`", "&quot;", "&apos;");
			foreach ($array as $key => $value) {
				if (strpos($string, $value) !== false) {
					return true;
				}
			}
			return false;
		}
		
	}
?>