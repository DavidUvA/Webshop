<?php
	session_start();

	if ($_SESSION['priv'] != 2) {
		header("Location: error.php");
		exit;	
	}
	else {
		echo "Priv = 2";
	}
?>