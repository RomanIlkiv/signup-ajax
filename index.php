<?php
	//Підключення сторонніх файлів
	session_start();
	header('Content-type: text/html; charset=utf-8');
	require_once "lib/user_class.php";
	require_once "lib/message_class.php";
	require_once "blocks/send_data.php";

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Registration</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/main_page.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="js/registration.js" type="text/javascript"></script>
		<script src="js/jquery.cookie.js" type="text/javascript"></script>
		
<!--		Створення Куки для двомовності сайту-->
		<script type="text/javascript">
			$(document).ready(function() {
				//alert(typeof($.cookie('lang')));
				
				$("img[title='English']").click(function() {
					$.cookie('lang', 'en');
					location.reload();
					
				});
				
				$("img[title='Українська']").click(function() {
					$.cookie('lang', null);
					location.reload();

				});
				
				if ($.cookie('lang') == 'null' || typeof ($.cookie('lang')) === 'undefined') {
					$("li a[href='index.php'], li a[href='login.php']").css("font-size", "36px");
				}
				
				
			});
		</script>
		
<!--		Підключення потрібного файлу з мовою в залежності від значення Куки-->
		<?
			if(!$_COOKIE["lang"] || $_COOKIE["lang"] == "null") {
				require_once "lang/ua.php";	
			}
			else if ($_COOKIE["lang"] == "en") {
				require_once "lang/en.php";		
			}

		?>
    </head>
    <body>
        <section id="menu">
<!--			Підключення меню-->
			<?require_once "menu.php";?>
        </section>
        <section id="my_form">
            <div class="form_registr">
				<form action="" method="post" name="registr" enctype="multipart/form-data">
					<label for="login" class="my_label"><? echo $lang["login"]; ?><span class="star">*</span></label>
					<input type="text" name="login" id="login" class="my_input" placeholder="<? echo $lang["place_log"]; ?>" required>

					<label for="email" class="my_label"><? echo $lang["email"]; ?><span class="star">*</span></label>
					<input type="email" name="email" id="email" class="my_input" placeholder="Email" required>
					
					<label for="pass" class="my_label"><? echo $lang["password"]; ?><span class="star">*</span></label>
					<input type="password" name="password_1" id="pass" class="my_input" placeholder="<? echo $lang["place_password"]; ?>" required>

					<label for="pass_2" class="my_label"><? echo $lang["pass_2"]; ?><span class="star">*</span></label>
					<input type="password" name="password_2" id="pass_2" class="my_input" placeholder="<? echo $lang["place_pass2"]; ?>" required>

					<label for="name" class="my_label"><? echo $lang["name"]; ?></label>
					<input type="text" id="name" name="name" class="my_input" placeholder="<? echo $lang["place_name"]; ?>">
					
					<label for="age" class="my_label"><? echo $lang["age"]; ?><span class="star">*</span></label>
					<input type="text" id="age" name="age" class="my_input" placeholder="<? echo $lang["place_age"]; ?>" required>
					
					<label for="country" class="my_label"><? echo $lang["country"]; ?></label>
					<input type="text" name="country" id="country" class="my_input" placeholder="<? echo $lang["place_country"]; ?>">
					
					<label for="city" class="my_label"><? echo $lang["city"]; ?></label><br>
					<input type="text" name="city" id="city" class="my_input" placeholder="<? echo $lang["place_city"]; ?>">

					<span id="block_radio">
						<p class="my_label"><? echo $lang["gender"]; ?></p>
						<label for="man" class="radio"><? echo $lang["man"]; ?></label>
						<input id="man" name="gender" type="radio" value="1" required>
						<label for="woman" class="radio"><? echo $lang["woman"]; ?></label>
						<input id="woman" name="gender" type="radio" value="0" required>
					</span>

					<label for="file" class="my_label"><? echo $lang["photo"]; ?></label><br>
					<input type="file" name="avatar" id="file">
					<img src="blocks/capcha.php" alt="Capcha" class="capcha_img hidden-xs">
					<span class="capcha hidden-xs">
						<label for="capcha" class="my_label capcha_label"><? echo $lang["capcha"]; ?></label><br>
						<input type="text" name="capcha" id="capcha" class="my_input input_label" required>
					</span>
					<br>
					<p class="my_label require"><? echo $lang["fileds1"]; ?><span class="star">*</span><? echo $lang["fileds2"]; ?></p>
					<input type="submit" name="send" value="<? echo $lang["send"]; ?>" class="button" id="send_registr">
				</form>
			</div>
        </section>
    </body>
</html>