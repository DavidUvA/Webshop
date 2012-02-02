<?php
	session_start();
	$host="localhost"; // Host name
	$username="davidhg51_uva"; // Mysql username
	$password="banaan123"; // Mysql password
	$db_name="davidhg51_uva"; // Database name
	$tbl_name="user"; // Table name

	// Connect to server and select databse.
	mysql_connect("$host", "$username", "$password")or die("cannot connect");
	mysql_select_db("$db_name")or die("cannot select DB");

	$myusername=$_POST['myusername'];
	$mypassword=$_POST['mypassword'];

	$myusername = stripslashes($myusername);
	$mypassword = stripslashes($mypassword);
	$myusername = mysql_real_escape_string($myusername);
	$mypassword = mysql_real_escape_string($mypassword);

	$sql="SELECT priv FROM $tbl_name WHERE user_email='$myusername' and user_password='$mypassword'";
	$result=mysql_query($sql);


	// Mysql_num_row is counting table row
	$count=mysql_num_rows($result);
	// If result matched $myusername and $mypassword, table row must be 1 row

	if($count==1){
	    $row =  mysql_fetch_assoc($result);
		$_SESSION["priv"] =  $row["priv"];
		$_SESSION["user_id"] = $row["user_id"];
		if ($row["priv"] == 2) {
			header("location:../backoffice/backoffice.php");
		} else {
			header("location:login_success.php");
		}
		
	}
	else {
	echo "Wrong Username or Password";
	}
?>
