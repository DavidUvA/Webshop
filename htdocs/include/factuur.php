<?php
include "connection.php";
 function generatebill($order_id) {

   $useremail = "admin@admin.com";
	
   $sql2 = "SELECT * FROM `user` WHERE `user_email` = '$useremail'";
		$result2 = mysql_query($sql2) or die(mysql_error());
		$row2 = mysql_fetch_array($result2);
		$addressid = $row2['user_billingaddressid'];
   $sql3 = "SELECT * FROM `address` WHERE `address_id` = '$addressid'";
		$result3 = mysql_query($sql3) or die(mysql_error());
		$row3 = mysql_fetch_array($result3);
	$sql4 = "SELECT * FROM `order` WHERE `order_id` = '$order_id'";
		$result4 = mysql_query($sql4) or die(mysql_error());
		$row4 = mysql_fetch_array($result4);
	$sql5 = "SELECT * FROM shopconfig LIMIT 1"; 
		$result5 = mysql_query($sql5) or die(mysql_error());
		$row5 = mysql_fetch_array($result5) or die(mysql_error());
		
   $shopname = $row5[0];
   $shopaddress = $row5[1];
   $shopphone = $row5[2];
   $shopemail = $row5[3];
   $shoppingcostnl = $row5[4];
   $shoppingcostbe = $row5[5];
   $title = $row3[1]; 
   $firstname = $row3[2]; 
   $middlename = $row3[3]; 
   $lastname = $row3[4]; 
   $streetname = $row3[5]; 
   $streetnumber = $row3[6]; 
   $streeadjunct = $row3[7];
   $postalcode = $row3[8]; 
   $city = $row3[9]; 
   $country = $row3[10]; 
   $orderdate = $row4[2];
   $checknl = 'The Netherlands';
   $shippingscosts = $row4[5];
   $totalcosts = "";

	
	echo  $shopname .  ", " .   $shopaddress . ", " .  $shopphone  . ", "   . $shopemail . 	" <hr> ";
	
	
	echo "
	
	Name: " . $lastname . " ," . $firstname . " 
	<br>
	Email: "  . $useremail .
	"<hr>";

   
		$sql = "SELECT * FROM `order_item` WHERE `order_id` = $order_id";
		$result = mysql_query($sql) or die(mysql_error());
		
   echo "<table class=\"table\" >";
   while($row = mysql_fetch_array($result, MYSQL_NUM)){  
      $orderid = $row[0];
      $productid = $row[1];
      $orderquantity = $row[2];
      $orderprice = $row[3] * $row[2];
      $sql1 = "SELECT `product_name` FROM `product` WHERE `product_id` = $productid";
      $result1 = mysql_query($sql1) or die(mysql_error());
      $row1 = mysql_fetch_array($result1, MYSQL_NUM);
      $totalcosts = ($totalcosts + ($orderprice * $orderquantity));

      echo "<tr><td>Orderid =". $orderid .       " </td>         ";
      echo "<td class=\"table\" >Productname =  ". $row1[0]. "      </td>   ";
      echo "<td>Quantity =  ". $orderquantity .   "         </td>  ";
      echo "<td> Price =  $". $orderprice .   "      </td></tr>";
      
   }
   $totalcosts = $totalcosts + $shippingscosts;
   echo "<tr><td>Shippingcosts = $ " . $shippingscosts . "</td>";
   echo "</tr><td>Total costs = $" . $totalcosts . " </td>";
   echo "</tr><tr><td> Order date = ".  $orderdate . "</td>";
   echo "</tr>  ";
   echo "</table >";
}
?>
