<?php
	include "../connection.php";

	$query = "SELECT * FROM shopconfig"; 
	$result = mysql_query($query) or die(mysql_error());
	$row = mysql_fetch_array($result) or die(mysql_error());

	$main_header = "<h2><a href=\"backoffice.php\">" . $row['shop_name'] . "</a></h2>";
?>