<?php
	include "../connection.php";
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/menu.css" />
</head>
<body>
<div id="horizontalmenu">
<?php
	$sql = "SELECT * from category order by category_name ASC";
	$result = mysql_query($sql) or die("Could not select category");
	echo "<ul>\n";
	recursive(0,0,$result);

	function recursive($root, $depth, $sql) {
		$temp = 2;
		$temp2 = 1;
		$row = 0;
		while ($catarray = mysql_fetch_array($sql)) {
			echo "\n root: " . $root . " depth: " . $depth . " temp: " . $temp . " temp2: " . $temp2 . "\n";
			if ($catarray['category_parentid'] == $root) {
				if (($depth>0) && ($temp == 1)) {
					// open submenu li
					$temp2 = 2;
					echo "<li>\n";s
				}
				if ((!$root) && (!$depth) && ($temp2 == 2)) {
					// close submenu ul

					echo "Tempunset" . $temp2;
					echo "</ul></li>\n";
				}
				if($depth == 0) {
					echo "<li>";
				}
				if (($depth>0) && ((empty($temp)) || ($temp == 2))) {
					echo "<ul><li>";
					$temp = 1;
					// echo "Tempset";
				}

			    echo "<a href=\"category.php?id=" . $catarray['category_id'] . "\">";
			    echo $catarray['category_name'];
			    echo "</a>\n";
			    
			    if (($depth>0) && ($temp == 1)) {
					// close submenu li
					echo "</li>\n";
				}

			    mysql_data_seek($sql,0);
			    recursive($catarray['category_id'], $depth+1,$sql);
			}
			$row++; 
			if(mysql_num_rows($sql)!= $row) {
				mysql_data_seek($sql,$row);
			}
		}
	}

	echo "</ul>";
?>
</div>
</body>
</html>