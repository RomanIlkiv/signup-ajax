<?php
	session_start();
	header('Content-type: text/html; charset=utf-8');
	require_once "lib/user_class.php";
	require_once "lib/message_class.php";
	require_once "blocks/auth.php";

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Log In</title>
        <link href="bootstrap-3.3.5-dist/bootstrap-3.3.5-dist/css/bootstrap.css" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/main_page.css">
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
        <section id="my_form">
			<div class="form_registr">
<!--				Перевірка на авторизацію корисутвача, якщо він вже є авторизованим, то вибити йому інформацію про це-->
				<? if (isset($_SESSION["login"]) && isset($_SESSION["password"])) {?>
					<div class="AcceptBlock">
						<p><? echo $lang["already_auth"]; ?></p>
						<a href="profile.php"><? echo $lang["profile"]; ?></a>
					</div>
				<?} else {?>
<!--				Інакше вивести форму авторизації-->
                    <form action="" method="post" name="registr">
                        <label for="login" class="my_label"><? echo $lang["login"]; ?></label><br>
                        <input type="text" name="login" id="login" class="my_input" placeholder="<? echo $lang["place_log"]; ?>">
                        
                        <label for="pass" class="my_label"><? echo $lang["password"]; ?></label><br>
                        <input type="password" name="password" id="pass" class="my_input" placeholder="<? echo $lang["place_password"]; ?>">

                        <br>
                        <input type="submit" name="send" value="<? echo $lang["send"]; ?>" class="button margin">
                    </form>
				<?} ?>	
			</div>	
        </section>
    </body>
</html>