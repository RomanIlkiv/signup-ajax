<div class="menu">
	<ul class="list">
		<? if(!isset($_SESSION["login"]) && !isset($_SESSION["password"])) {?>
		<li><a href="index.php"><? echo $lang["registr"]; ?></a></li>
		<li><a href="login.php"><? echo $lang["log"]; ?></a></li>
		<? } else {?>
		<li><a href="profile.php"><? echo $lang["profile"]; ?></a></li>
		<? } ?>
		<li id="lang">
			<? echo $lang["lang"]; ?>
			<p id="ua"><img src="img/ua.png" title="Українська" alt="Українська"></p>
			<p id="en"><img src="img/en.png" title="English" alt="English"></p>
		</li>
	</ul>
</div>