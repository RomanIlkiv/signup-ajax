<?
session_start();
require_once "../lib/user_class.php";
require_once "../lib/message_class.php";

	$array = $db->select("users", array("login"), "`login` = '$_SESSION[login]'");
	if(isset($_POST["change"])) {
		
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
			
			$download = "../img/avatars/".$array[0]["login"];
			imagejpeg($tmp, $download.".jpg");
			imagedestroy($image);
			imagedestroy($tmp);
			$db->update("users", "avatar", 2, "`login` = '".$_SESSION["login"]."'");
		}
		
		//запит в базу даних на зміну введених полів
		if (isset($_POST["name"]) && $_POST["name"] !== "") {
			$db->update("users", "name", $_POST["name"], "`login` = '$_SESSION[login]'");	
		}
		
		if (isset($_POST["country"]) && $_POST["country"] !== "") {
			$db->update("users", "country", $_POST["country"], "`login` = '$_SESSION[login]'");	
		}
		
		if (isset($_POST["city"]) && $_POST["city"] !== "") {
			$db->update("users", "city", $_POST["city"], "`login` = '$_SESSION[login]'");	
		}
	}
	
	header("Location: http://task.registr/profile.php");
	exit();
?>	