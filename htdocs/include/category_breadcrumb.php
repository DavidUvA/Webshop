<?php
	function category_breadcrumb($category_id) {
		include "../connection.php";
		$query = "SELECT * FROM category WHERE category_id=$category_id"; 
		$result = mysql_query($query) or die(mysql_error());
		$array = mysql_fetch_array($result) or die(mysql_error());
		$category_parentid = $array['category_parentid'];

		$breadcrumb = "<a href=\"../category.php?id=";
		$breadcrumb .= $category_id;
		$breadcrumb .= "\">";
		$breadcrumb .= $array['category_name'];
		$breadcrumb .= "</a>";
		
		while ($category_parentid) {
			echo $x;
			$query = "SELECT * FROM category WHERE category_id=$category_parentid"; 
			$result = mysql_query($query) or die(mysql_error());
			$array = mysql_fetch_array($result) or die(mysql_error());

			$temp = "<a href=\"../category.php?id=";
			$temp .= $array['category_id'];
			$temp .= "\">";
			$temp .= $array['category_name'];
			$temp .= "</a> > ";

			$breadcrumb = $temp.$breadcrumb;
			$category_parentid = $array['category_parentid'];
		}
		echo $breadcrumb;
	}
?>