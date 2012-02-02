<?php
	function category() {
		include "connection.php";
		$category_id = $_GET['id'];

		$sql =  "SELECT * from product WHERE category_id=$category_id";
		$result = mysql_query($sql) or die(mysql_error());

		;$rows = mysql_num_rows($result);
		echo "<ul class=\"productlist\" id =\"productlist\">";

		while ($row = mysql_fetch_assoc($result)) {
			$product_id = $row['product_id'];
			$product_brandid = $row['brand_id'];
			$product_name = $row['product_name'];
			$product_description = $row['product_description'];
			$product_price = $row['product_price'];
			$product_deliverytime = $row['product_deliverytime'];

			$product_ahref = "<a href=\"product.php?id=" . $product_id . "\"
					   title=\"Meer info over " . $product_name . "\">";
			$product_imgsrc = "<img src=\"images/products/cdj2000.jpg\" alt=\"" . $product_name . "\" />";
			echo "<li class=\"item\">
					  <div class=\"image\">";
						echo $product_ahref;
						echo $product_imgsrc;
						echo "</a>
					  </div>
					  <div class=\"description\">
					  	  <h4>" . $product_ahref . $product_name . "</a></h4>
						  <div><span class=\"remainingText\">" . $product_description . "</span></div>
						  <div class=\"readmore\">" . $product_ahref . "Read more</a></div>
					  </div>
				  </li>";
		}
		echo "</ul>";
	}
?>
<html>
	<head>
	<title>Category</title>
	<style>
		ul.productlist {
			style: none;
		}
	</head>
	<body>
		<?php category(); ?>
	</body>
</html>