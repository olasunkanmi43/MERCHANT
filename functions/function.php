<?php

		function create_text($name, $placeholder, $type="text") {
			echo $placeholder.": <input type=\"$type\" name=\"$name\" placeholder=\"$placeholder\">";
		}

		function create_radio($name,$value) {
			echo $value.": <input type=\"radio\" name=\"$name\" value=\"$value\">";
		}

		function create_area($name, $placeholder, $row=5, $col=20) {
			echo $placeholder."<br><textarea name=\"$name\" rows=\"$row\" cols=\"$col\"></textarea>";
		}

?>