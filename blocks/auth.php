<?php

	if(isset($_POST["send"])) {
		//перевірка введених даних на хштмл теги та зайві пробіли
		$login = $user->FormChars($_POST["login"]);
		$password = $user->FormChars(md5($config->secret_word.$_POST["password"]));
		
		//перевірка чи існує такий логін з таким паролем
		$array = $db->select("users", array('id'), "`login` = '$login' AND `password` = '$password'");
		if (count($array) === 0) {
			//виведення повідомлення про помилку в паролі чи логіні
				$str = $mess->messageSend(1, "You wrote incorrect login or password");
				echo $str;
				return false;
			}
		$_SESSION["login"] = $login;
		$_SESSION["password"] = $password;
		$_SESSION["auth"] = 1;
		//переадресація на профіль корисутвача
		header("Location: profile.php");
		exit();
	}

?>