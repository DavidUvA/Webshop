<?php
	include "../include/category_breadcrumb.php";
	function backoffice_productbox($product_id) {
		if ($_POST[hidden] == "add") {
			include "../connection.php";

			$query = "SELECT * FROM brand WHERE brand_id=$_REQUEST[brand]"; 
			$result = mysql_query($query) or die(mysql_error());
			$row = mysql_fetch_array($result) or die(mysql_error());

			$brand_name = $row['brand_name'];

			$query = "SELECT * FROM category WHERE category_id=$_REQUEST[category]"; 
			$result = mysql_query($query) or die(mysql_error());
			$row = mysql_fetch_array($result) or die(mysql_error());

			$category_id = $row['category_id'];

			echo "<table class=\"product_box\";>
                    <tbody><tr>
                        <th>ID:</th>
                        <td>" . $product_id . "</td>
                    </tr>
                    <tr>
                        <th>Name:</th>
                        <td>" . $_POST['product_name'] . "</td>
                    </tr>
                    <tr>
                		<th>Category:</th>
                		<td>"; category_breadcrumb($category_id); echo "</td>
                    <tr>
                        <th>Brand:</th>
                        <td>" . $brand_name . "</td>
                    </tr>
                    <tr>
                        <th>Price:</th>
                        <td>&#8364; " . $_POST['product_price'] . "</td>
                    </tr>
                    <tr>
                        <th>Stock:</th>
                        <td>" . $_POST['product_quantity'] . "</td>
                    </tr>
                	<tr>
                        <th>Delivery period:</th>
                        <td>" . $_POST['product_deliverytime'] . "</td>
                    </tr> 
                	<tr>
                        <th>Featured:</th>
                        <td>" . $_POST['product_featured'] . "</td>
                    </tr>
                    <tr><td>&nbsp;</td><td></td></tr>                                              
                    <tr id=\"edit\">
                        <th><a title=\"View/edit\" href=\"../product.php?id=" . $product_id . "\">>View/edit</a></th>
                        <td></td>
                    </tr>
            		</tbody>
            	</table>";
        }
	}
?>