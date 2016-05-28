<?php
	session_start();
	header('Content-type: text/html; charset=utf-8');
	require_once "lib/user_class.php";
	require_once "lib/message_class.php";

	$array = $db->select("users", array("*"), "`login` = '$_SESSION[login]'");
	
//Перевірка чи добавляв користувач свою аватарку
	if ($array[0]["avatar"] < 2) {
		$avatar = $array[0]["avatar"];
	}
	else {
		$avatar = "avatars/".$array[0]["login"];
	}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Profile</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/main_page.css">
        <link rel="stylesheet" href="css/profile.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="js/jquery.cookie.js" type="text/javascript"></script>
		
		<script type="text/javascript">
			$(document).ready(function() {
				$("img[title='English']").click(function() {
					$.cookie('lang', 'en');
					location.reload();
					
				});
				
				$("img[title='Українська']").click(function() {
					$.cookie('lang', null);
					location.reload();

				});
				
				if ($.cookie('lang') == 'null') {
					$("li a[href='index.php'], li a[href='login.php']").css("font-size", "36px");
				}
			});
		</script>
		<?
			if(!isset($_COOKIE["lang"]) || $_COOKIE["lang"] == "null") {
				require_once "lang/ua.php";	
			}
			else if ($_COOKIE["lang"] == "en") {
				require_once "lang/en.php";		
			}

		?>
    </head>
    <body>
        <section id="menu">
			<?require_once "menu.php";?>	
        </section>
        <? if(isset($_SESSION["login"]) && isset($_SESSION["password"])) { ?>
        <section id="profile">
            <div id="page">
					<img src="img/<?echo $avatar?>.jpg" alt="Avatar">
                <div class="login"><? echo $lang["place_log"]; ?>: <? echo $_SESSION["login"];?></div>
				<div class="login"><? echo $lang["place_name"]; ?>: <? echo $array[0]["name"];?></div>
				<div class="login"><? echo $lang["place_age"]; ?>: <? echo $array[0]["age"];?></div>
				<p class="login"><? echo $lang["place_country"]; ?>: <? echo $array[0]["country"];?></p>
				<p class="login"><? echo $lang["place_city"]; ?>: <? echo $array[0]["city"];?></p>
                <form name="cha" action="blocks/change.php" method="post" enctype="multipart/form-data" id="avatar">
					<p class="login"><? echo $lang["ava"]; ?>:</p><br><br>
					<input type="file" name="avatar"><br><br>
					<input type="text" name="name" class="my_input input_change" placeholder="<? echo $lang["place_name"]; ?>"><br>
					<input type="text" name="country" class="my_input input_change" placeholder="<? echo $lang["place_country"]; ?>"><br>
					<input type="text" name="city" class="my_input input_change" placeholder="<? echo $lang["place_city"]; ?>"><br><br>
					<input type="submit" name="change" class="send_avatar" value="<? echo $lang["send"]; ?>"><br>
				</form>
                <a href="blocks/logout.php" class="button" id="logout"><? echo $lang["logout"]; ?></a>
            </div>
            
        </section>
        <?} else {?>
<!--		Якшо користувач не авторизований вивести йому інформацію про це-->
			<div class="AcceptBlock ban_profile">
				<p><? echo $lang["ban_profile"]; ?></p>
				<a href="login.php"><? echo $lang["page_log"]; ?></a>
			</div>
		
		<?} ?>
       
    </body>
</html>