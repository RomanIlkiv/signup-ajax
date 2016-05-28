<?php
	
	if (isset($_POST['send'])) {
		
		//перевірка інформації на наявність хштмл тегів і зайвих пробілів та запис введених даних в змінні
		$login = $user->FormChars($_POST["login"]);
		$email = $user->FormChars($_POST["email"]);
		//регулярний вираз перевірки емейлу
		$reg = "/[a-z0-9][a-z0-9\._-]*[a-z0-9]*@([a-z0-9]+([a-z0-9-]*[a-z0-9]+)*\.)+[a-z0-9]*/i";
		if (!preg_match($reg, $email)) {
			$str = $mess->messageSend(1, "You wrote incorrect email");
			echo $str;
			return false;
		}
		//запис даних в змінні
		$name = $user->FormChars($_POST["name"]);
		$age = $user->FormChars($_POST["age"]);
		$country = $user->FormChars($_POST["country"]);
		$city = $user->FormChars($_POST["city"]);
		$password = $user->FormChars(md5($config->secret_word.$_POST["password_1"]));
		$password_2 = $user->FormChars(md5($config->secret_word.$_POST["password_2"]));
		$capcha = $user->FormChars($_POST["capcha"]);
		
		if ($_SESSION['rand'] != $capcha) {
			$str = $mess->messageSend(1, "You wrote wrong capcha");
			echo $str;
			return false;
		}
		
		//перевірка чи існує такий вже логін
		$array = $db->select("users", array("id"), "`login` = '".$login."'"); 
		if (count($array) > 0) {
			$str = $mess->messageSend(1, "User with such login already exists");
			echo $str;
			return false;
		}
		
		//перевірка чи існує такий вже емейл
		$array = $db->select("users", array("id"), "`email` = '".$email."'"); 
		if (count($array) > 0) {
			$str = $mess->messageSend(1, "User with such email already exists");
			echo $str;
			return false;
		}
		
		if ($password != $password_2) {
			$str = $mess->messageSend(1, "You wrote difference passwords");
			echo $str;
			return false;
		}
		
		$age = intval($age);
		
		if (!is_integer($age)) {
			$str = $mess->messageSend(1, "Please, write your age");
			echo $str;
			return false;
		}
		else if ($age < 5 || $age > 100) {
			$str = $mess->messageSend(1, "Please, write your real age");
			echo $str;
			return false;
		}
		
		$gender = $_POST["gender"];
		
		if ($_FILES["avatar"]["tmp_name"]) {
				if($_FILES["avatar"]["type"] == "image/jpeg") {
					$image = imagecreatefromjpeg($_FILES["avatar"]["tmp_name"]);
					$format = ".jpg";
				}
				else if ($_FILES["avatar"]["type"] == "image/png") {
					$image = imagecreatefrompng($_FILES["avatar"]["tmp_name"]);
					$format = ".png";
				}
				else if ($_FILES["avatar"]["type"] == "image/gif") {
					$image = imagecreatefromgif($_FILES["avatar"]["tmp_name"]);
					$format = ".gif";
				}
				else {
					header("Location: http://task.registr/profile.php");
					exit();
				}
			$size = getimagesize($_FILES["avatar"]["tmp_name"]);
			$tmp = imagecreatetruecolor(120, 150);
			imagecopyresampled($tmp, $image, 0, 0, 0, 0, 120, 150, $size[0], $size[1]);
			
			$download = "img/avatars/".$login;
			imagejpeg($tmp, $download.".jpg");
			imagedestroy($image);
			imagedestroy($tmp);
			$avatar = 2;
		}
		else {
			$avatar = $gender;
		}

		//Додання користувача в БД	
		$user->AddUser($login, $email, $name, $age, $country, $city, $password, $gender, $avatar);
		$str = $mess->messageSend(3, "Your registration finished.");
		echo $str;
	}
	
?>	