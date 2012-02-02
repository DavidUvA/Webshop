<?php
	/*
	 Description:
	  - Prints a dropdown list of all brands
	  - Only to be used within a <form> </form>
	 Usage:
	  - branddropdown()
	*/
	include "../connection.php";
	function branddropdown() {
	    echo "<select name=\"brand\">\n";
		echo "<option value=\"x\">Please select</option>\n";

	    $sql = "SELECT * from brand order by brand_name ASC";
	    $result = mysql_query($sql) or die("Could not select brand");
	    while ($row = mysql_fetch_assoc($result)) {
	    	echo "<option value=\"" . $row['brand_id'] . "\">";
        	echo $row['brand_name'] . "</option>\n"; 
		}
		echo "</select>";
	}
?>