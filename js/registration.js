//Обявляємо змінні, які потрібні для роботи в майбтуньому
var text = "";
var age;

//Перевірка логіну в ході реєстрації чи існує вже такий логін в базі даних
function CheckLogin() {
	$.post("../blocks/registration.php", {login: $("#login").val()}, function(data) {
		if ((data) == "1") {
			$(".error").slideUp(500);
			$("#login").css("border", "2px solid green");
			$("label[for='login']").css("color", "green");
		}
		else if ((data) == "0") {
			$("#login").css("border", "2px solid #9d9393");
			$("label[for='login']").css("color", "red");
			if ($.cookie('lang') == 'null'  || typeof $.cookie('lang') === 'undefined') {
				text = "Користувач з таким Логіном вже існує";
			}
			else {
				text = "User with such login already exist";	
			}
			$("label[for='login']").after("<div class='error'>"+ text +"</div>");
		}
	});
}

//Перевірка емейлу в ході реєстрації чи існує вже такий емейл в базі даних
function CheckEmail() {
	$.post("../blocks/registration.php", {email: $("#email").val()}, function(data) {
		if ((data) == "1") {
			$(".error").slideUp(500);
			$("#email").css("border", "2px solid green");
			$("label[for='email']").css("color", "green");
		}
		else if ((data) == "0") {
			$("#email").css("border", "2px solid #9d9393");
			$("label[for='email']").css("color", "red");
			if ($.cookie('lang') == 'null'  || typeof $.cookie('lang') === 'undefined') {
				text = "Користувач з таким Eмейлом вже існує";
			}
			else {
				text = "User with such email already exist";	
			}
			$("label[for='email']").after("<div class='error'>"+ text2 +"</div>");
		}
	});
}

//Перевірка паролю в ході реєстрації
function CheckPassword() {
	$.post("../blocks/registration.php", {password_1: $("#pass").val(), password_2: $("#pass_2").val()}, function(data) {
		 if ((data) == "1") {
			$(".error").slideUp(500);
			$("#pass, #pass_2").css("border", "2px solid green");
			$("label[for='pass'], label[for='pass_2']").css("color", "green");
		 }
		else if ((data) == "0") {
			$("#login").css("border", "2px solid #9d9393");
			$("label[for='pass']").css("color", "red");
			if ($.cookie('lang') == 'null'  || typeof $.cookie('lang') === 'undefined') {
				var text = "Ви ввели різні паролі";
			}
			else {
				var text = "You wrote difference passwords";	
			}
			$("label[for='pass']").after("<div class='error'>"+ text +"</div>");
		}
	});
}

//Перевірка чи правильно введена капча
function CheckCapcha() {
	$.post("../blocks/registration.php", {capcha: $("#capcha").val()}, function(data) {
		if ((data) == "1") {
			$(".error").slideUp(500);
			$("#capcha").css("border", "2px solid green");
			$("label[for='capcha']").css("color", "green");
		}
		else if ((data) == "0") {
			$("#capcha").css("border", "2px solid #9d9393");
			$("label[for='capcha']").css("color", "red");
			if ($.cookie('lang') == 'null'  || typeof $.cookie('lang') === 'undefined') {
				text = "Ви ввели невірний код";
			}
			else {
				text = "You wrote wrong capcha";	
			}
			$("label[for='capcha']").after("<div class='error cap'>"+ text +"</div>");
			$(".cap").css({"width" : "200px", "margin":"5px 0 0 210px", "position":"absolute"});
		}
	});
}

$(document).ready(function() {
	//Після того, як щось було введено в пункті Логіна викликається функція CheckLogin();
	$("#login").bind("change", function() {
		if($("#login").val() != "") {
			CheckLogin();
		}
	});
	
	$("#email").bind("change", function() {
		if($("#email").val() != "") {
			var email = $("#email").val();
			//регулярний вираз для перевірки емейлу
			var regV = /^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$/;
			var result = email.search(regV);
			//Перевірка чи знайшлись співпадіння
			if (result != -1) {
				CheckEmail();	
			}
			else {
				$("#email").css("border", "2px solid #9d9393");
				$("label[for='email']").css("color", "red");
				if ($.cookie('lang') == 'null'  || typeof $.cookie('lang') === 'undefined') {
					text = "Ви ввели некоректний email";
				}
				else {
					text = "You wrote incorrect email";	
				}
				$("label[for='email']").after("<div class='error'>"+ text +"</div>");	
			}
		}
	});
	
	$("#pass_2").bind("change", function() {
		//Перевірка чи заповнені обидва поля з паролем
		if($("#pass").val() != "" && $("#pass_2").val() != "") {
			//Перевірка в клієнській частині чи однакові паролі
			if ($("#pass").val() == $("#pass_2").val()) {
				CheckPassword();	
			}
			else {
				if ($.cookie('lang') == 'null'  || typeof $.cookie('lang') === 'undefined') {
					text = "Ви ввели різні паролі";
				}
				else {
					text = "You wrote difference passwords";	
				}
				$("label[for='pass_2']").after("<div class='error'>"+ text +"</div>");
			}
		}
		else {
			if ($.cookie('lang') == 'null'  || typeof $.cookie('lang') === 'undefined') {
				text = "Будь ласка, заповніть обидва поля з паролем";
			}
			else {
				text = "Please, fill two fields with password";	
			}
			$("label[for='pass_2']").after("<div class='error'>"+ text +"</div>");
		}
	});
	
	$("#age").bind("change", function() {
		//перевірка чи введена користувачем інформація є числом
		age = Number($("#age").val());
		if (isNaN(age) == true) {
			if ($.cookie('lang') == 'null'  || typeof $.cookie('lang') === 'undefined') {
				text = "Ви повинні ввести тільки цифри";
			}
			else {
				text = "You can enter only numbers";
			}
			$("label[for='age']").after("<div class='error'>"+ text +"</div>");	
		}
		else if (age > 100 || age < 5) {
			if ($.cookie('lang') == 'null'  || typeof $.cookie('lang') === 'undefined') {
				text = "Будь ласка, введіть свій реальний вік";
			}
			else {
				text = "Please, write your real age";
			}
			$("label[for='age']").after("<div class='error'>"+ text +"</div>");
		}
		else {
			$(".error").slideUp(500);
			$("#age").css("border", "2px solid green");
			$("label[for='age']").css("color", "green");	
		}
	});	
	
	$("#capcha").bind("change", function() {
		if($("#capcha").val() != "") {
			CheckCapcha();
		}
	});
});
