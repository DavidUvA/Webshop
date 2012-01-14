<?php
$db = mysql_connect("localhost", "webdb1228", "wred5yep") or die("Could not connect.");
 
if(!$db) 
 
	die("no db");
 
if(!mysql_select_db("webdb1228",$db))
 
 	die("No database selected.");
?>