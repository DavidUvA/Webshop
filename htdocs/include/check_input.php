<?php
	function check_input($value) {
		return $value;
	}
	/*
	function check_input($value) {
		// Stripslashes
		if (get_magic_qquotes_gpc()) {
			$value = stripslashes($value);
		}
		if (!is_numeric($value)) {
			$value = "'" . mysql_real_escape_string($value). "'";
		}
		return $value;
	}
	*/
?>