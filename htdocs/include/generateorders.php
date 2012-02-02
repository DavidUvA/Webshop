<?php
 include "connection.php";
 function generateorders() {
	//  $username = $_SESSION["user_email"];
	$username = "admin@admin.com";
	$sql = "SELECT * from user WHERE user_email='$username'";
	$result = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_array($result);
	$user_id = $row['user_id'];
	$order_id = array();


	echo "You are now logged in with the username: " . "<b>" . $username . "</b> " . ".<br /></br>";
	echo "These are your invoices click on one for more information.</br></br>"; 



	$sql1 = "SELECT * FROM `order` WHERE `user_id` = $user_id";
	$result1 = mysql_query($sql1) or die(mysql_error());

	while ($row = mysql_fetch_assoc($result1)) {
		$orderid = $row['order_id'];
		$order_id[] = $orderid;
	}
	// $_GET["id"]
	foreach ($order_id as $orderids) {
		echo "<a href=\"history.php?id=". $orderids ."\"> " . $orderids ."</a></br></br>";
	}	 
 }
 ?>