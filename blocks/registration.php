<?php
	require_once "../lib/user_class.php";
	session_start();

	/*Перевірки для Аджаксу*/
	if (isset($_POST["login"]))	{
		//перевірка логіна на наявність хштмл тегів і зайвих пробілів
		$login = $user->FormChars($_POST["login"]);
		//пошук чи цей логін не є зайнятий
		$array = $db->select("users", array("id"), "`login` = '".$login."'"); 
		//інформація передається назад в функцію аджакса
		if (count($array) > 0) {
			echo "0";
		}
		else {
			echo "1";
		}
	}	
	
	if (isset($_POST["email"]))	{
		$email = $user->FormChars($_POST["email"]);
		$array = $db->select("users", array("id"), "`email` = '".$email."'"); 
		if (count($array) > 0) {
			echo "0";
		}
		else {
			echo "1";
		}
	}
	
	
	if (isset($_POST["password_1"]) && isset($_POST["password_2"]))	{
		$password = $user->FormChars(md5($config->secret_word.$_POST["password_1"]));//хешування паролів
		$password_2 = $user->FormChars(md5($config->secret_word.$_POST["password_2"]));
		if ($password != $password_2) {
			echo "0";
		}
		else {
			echo "1";
		}
	}
	
	if (isset($_POST["capcha"]))	{
		$capcha = $user->FormChars($_POST["capcha"]);
		if ($_SESSION['rand'] != $capcha) {
			echo "0";
		}
		else {
			echo "1";
		}
	}
	
?>