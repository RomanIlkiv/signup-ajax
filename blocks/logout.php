<?php	
	session_start();
	//видалення сесій з даними
		unset($_SESSION["login"]);
		unset($_SESSION["password"]);
		unset($_SESSION["auth"]);
		header("Location: ../login.php");
		exit();
?>