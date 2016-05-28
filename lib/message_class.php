<?php
	
	class Message {

		public function messageSend($p1, $text, $p3 = "") {
			switch ($p1) {
				case 1: {
					$warn = "Error: ";
					$class = "Wrong";
					break; 
				}
				case 2: {
					$warn = "Warning: ";
					$class = "Warning";
					break; 
				} 
				case 3: {
					$warn = "Success: ";
					$class = "Success";
					break; 
				} 
				default: return false;
			}
			if ($p3) $_SERVER['HTTP_REFERER']  = $p3;
			echo "<div class='messageBlock $class'><b>$warn</b>$text</div>";
			
		}
		
	}
	
	$mess = new Message();

	
?>