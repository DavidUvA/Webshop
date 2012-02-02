<?php
session_start();
	// Places head content (css /scripts etc) in $backoffice_headcontent;
	include "include/backoffice_headcontent.php";

	// Places header content (shop name from site config) in $backoffice_header
	include "include/backoffice_header.php";
	
	// Places horizontal menu content for backoffice in $menu_backoffice
	include "include/menu_backoffice.php";

	// Places search box content in $main_search
	include "../phpcontent/main_search.php";

	// Places left sidebar content in $main_leftsidebar
	include "../phpcontent/main_leftsidebar.php";

	// Places footer content in $main_footer
	include "../phpcontent/main_footer.php";

	// Puts html content for stylesheets in $css_backoffice
	include "include/css_backoffice.php";

	// Puts html content for login form in $backoffice_loginform
	include "include/checklogin.php";
?>

<?php
	// CONNECT TO DATABASE
	include "../connection.php";

	if ($_POST[hidden] == "save") {

		$save_shopconfig = "UPDATE shopconfig SET shop_name='$_POST[shop_name]', shop_address='$_POST[shop_address]', shop_phone='$_POST[shop_phone]', shop_email='$_POST[shop_email]' WHERE shop_name='$_POST[oldshopname]'";

		mysql_query($save_shopconfig) or die(mysql_error());
		$updated_msg = "<h4>Shop config has been updated</h4>";

	}

	$query = "SELECT * FROM shopconfig LIMIT 1"; 

	$result = mysql_query($query) or die(mysql_error());
	$row = mysql_fetch_array($result) or die(mysql_error());
	$old_shopname = $row['shop_name'];

	$body_content = "<h1>Shop config</h1>

	" . $updated_msg . "

	<form method=\"post\" action=\"$_SERVER[PHP_SELF]\">
	
	<table style=\"border: 0px;\">
		<tr>
			<td>Shop name:</td>
			<td><input type=\"text\" name=\"shop_name\" size=\"51\"	 maxlength=\"30\" value=\"" . $row['shop_name'] . "\"></td>
		</tr>
		<tr>
			<td>Address:</td>
			<td><textarea            name=\"shop_address\"      	 maxlength=\"120\" cols=\"40\" rows=\"3\" style=\"resize: none;\">" . $row['shop_address'] . "</textarea></td>
		</tr>
		<tr>
			<td>Phone number:</td>
			<td><input type=\"text\" name=\"shop_phone\" size=\"51\" maxlength=\"12\" value=\"" . $row['shop_phone'] . "\"></td>
		</tr>
		<tr>
			<td>Contact e-mail:</td>
			<td><input type=\"text\" name=\"shop_email\" size=\"51\" maxlength=\"40\" value=\"" . $row['shop_email'] . "\"></td>
		</tr>
	</table>
	<br />
	<input type=\"hidden\" name=\"hidden\" value=\"save\">
	<input type=\"hidden\" name=\"oldshopname\" value=\"" . $old_shopname . "\">
	<input type=\"submit\" name=\"submit\" value=\"Save\">
	</form>";
?>

<html>
	<head>
		<title>Add entry</title>
		<?php echo $css_backoffice; ?>
	</head>
	<body>
		<div id="maincontainer">
						
			<div id="header">		
				<?php echo $main_header; ?>
			</div>
			
			<div id="box-login">
				<?php echo $backoffice_loginform; ?>
			</div>
			
        	<div id="horizontalmenu">
    	    	<?php echo $menu_backoffice; ?>
     	 	</div>	
     	 	
     		<div id="box-search">
				<?php echo $main_search; ?>
			</div>
		
			<div id="sidebar-left">
				<?php echo $main_leftsidebar; ?>
			</div>
		
			<div id="box-carousel">
				<?php echo $body_content; ?>
			</div>
	
			<div id="box-footer">Developed by David Sondervan, Nicolas Martos, Artiom Emelianov, Nisjaat Sheik Joesoef, Willem van Dijk in Amsterdam 2012.</div>

		</div>
	</body>
</html>