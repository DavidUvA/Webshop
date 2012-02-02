<?php
$db = mysql_connect("localhost", "davidhg51_uva", "banaan123") or die("Could not connect.");
 
if(!$db) 
 
	die("no db");
 
if(!mysql_select_db("davidhg51_uva",$db))
 
 	die("No database selected.");
?>
