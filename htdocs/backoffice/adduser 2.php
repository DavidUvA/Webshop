<?php
	// Puts html content for menu in $menu_backoffice
	include "menu_backoffice.php";

	// Puts html content for stylesheets in $css_backoffice
	include "css_backoffice.php";
?>
<?php
	if ($_POST[op] != "add") {
		
		$body_content = "<h1>Add user</h1>

		<h2>Account info</h2>

		<form method=\"post\" action=\"$_SERVER[PHP_SELF]\">
		
		<table style=\"border: 0px;\">
			<tr>
				<td>* E-mail address:</td>
				<td><input type=\"text\" name=\"email\" size=30 maxlength=50></td>
			</tr>
			<tr>
				<td>* Password:</td>
				<td><input type=\"password\" name=\"password\" size=30 maxlength=16></td>
			</tr>
			<tr>
				<td>* Confirm password:</td>
				<td><input type=\"password\" name=\"confirmpassword\" size=30 maxlength=16></td>
			</tr>
		</table>

		<br />

		<h2>Billing address</h2>

		<select name=\"title\">
		<option value=\"Mr\" selected=\"selected\">Mr</option>
		<option value=\"Ms\">Ms</option>
		<option value=\"Mrs\">Mrs</option>
		<option value=\"Miss\">Miss</option>
		</select>

		<input type=\"text\" name=\"firstname\"    size=30 maxlength=30 placeholder=\"* First name\">
		<input type=\"text\" name=\"middlename\"   size=20 maxlength=30 placeholder=\"Middle name\">
		<input type=\"text\" name=\"lastname\"     size=30 maxlength=30 placeholder=\"* Last name\"> <br />

		<br />

		<input type=\"text\" name=\"streetname\"   size=30 maxlength=50 placeholder=\"* Streetname\">
		<input type=\"text\" name=\"streetnumber\" size=10 maxlength=4  placeholder=\"* Number\">
		<input type=\"text\" name=\"adjunct\"      size=5  maxlength=4> <br />

		<input type=\"text\" name=\"postalcode\"   size=20 maxlength=6 placeholder=\"* Postalcode\">
		<input type=\"text\" name=\"city\"         size=20 maxlength=40 placeholder=\"* City\">

		<select name=\"country\">
		<option name=\"The Netherlands\" selected=\"selected\">The Netherlands</option>
		<option name=\"Belgium\">Belgium</option>
		</select>
		
		<br /><br /><br />

		<input type=\"checkbox\" name=\"shippingcheckbox\" onClick=\"toggleVisibility(this)\"/>
		<strong>Ship to a different address</strong><br />

		<div id=\"shippingaddress\" style=\"display: none;\">
			<h2>Shipping address</h2>

			<select name=\"title2\">
			<option value=\"Mr\" selected=\"selected\">Mr</option>
			<option value=\"Ms\">Ms</option>
			<option value=\"Mrs\">Mrs</option>
			<option value=\"Miss\">Miss</option>
			</select>

			<input type=\"text\" name=\"firstname2\"    size=30 maxlength=30 placeholder=\"* First name\">
			<input type=\"text\" name=\"middlename2\"   size=20 maxlength=30 placeholder=\"Middle name\">
			<input type=\"text\" name=\"lastname2\"     size=30 maxlength=30 placeholder=\"* Last name\"> <br />

			<br />

			<input type=\"text\" name=\"streetname2\"   size=30 maxlength=50 placeholder=\"* Streetname\">
			<input type=\"text\" name=\"streetnumber2\" size=10 maxlength=4  placeholder=\"* Number\">
			<input type=\"text\" name=\"adjunct2\"      size=5  maxlength=4> <br />

			<input type=\"text\" name=\"postalcode2\"   size=20 maxlength=6  placeholder=\"* Postalcode\">
			<input type=\"text\" name=\"city2\"         size=20 maxlength=40 placeholder=\"* City\">

			<select name=\"country2\">
			<option name=\"The Netherlands\" selected=\"selected\">The Netherlands</option>
			<option name=\"Belgium\">Belgium</option>
			</select>
		</div>
		
		<br />
		<input type=\"hidden\" name=\"op\" value=\"add\">
		<input type=\"submit\" name=\"submit\" value=\"Add user\">
		</form>";
	}
	else if ($_POST[op] == "add") {
		// CHECK REQUIRED FIELDS. MISSING? BACK TO FORM
		// if (($_POST[firstname] == "") || ($_POST[lastname] == "")) {
		// 	header("Location: adduser.php");
		//	exit;
		// }
		if (isset($_POST['submit'])) {
		    if (check_empty_fields()) {
		        // process the form data
		    }
		}
			
		// CONNECT TO DATABASE
		include "connection.php";

		// INSERT BILLING ADDRESS
		if ($_POST[firstname]) {
			$add_billingaddress = "insert into address (address_title, address_firstname, address_middlename, address_lastname, address_streetname, address_streetnumber, address_adjunct, address_postalcode, address_city, address_country, address_mobilephone, address_homephone) values ('$_POST[title]', '$_POST[firstname]', '$_POST[middlename]', '$_POST[lastname]', '$_POST[streetname]', $_POST[streetnumber], '$_POST[adjunct]', '$_POST[postalcode]', '$_POST[city]', '$_POST[country]', 1234, NULL)";
			mysql_query($add_billingaddress) or die(mysql_error());

			//get billingaddress id to insert in user table
			$user_billingaddressid = mysql_insert_id();
		}

		// INSERT SHIPPING ADDRESS
		// Check if shipping address checkbox is checked
		if (isset($_POST['shippingcheckbox'])) {
			$add_shippingaddress = "insert into address (address_title, address_firstname, address_middlename, address_lastname, address_streetname, address_streetnumber, address_adjunct, address_postalcode, address_city, address_country, address_mobilephone, address_homephone) values ('$_POST[title2]', '$_POST[firstname2]', '$_POST[middlename2]', '$_POST[lastname2]', '$_POST[streetname2]', $_POST[streetnumber], '$_POST[adjunct2]', '$_POST[postalcode2]', '$_POST[city2]', '$_POST[country2]', 1234, NULL)";
			mysql_query($add_shippingaddress) or die(mysql_error());

			//get shippingaddress id to insert in user table
			$user_shippingaddressid = mysql_insert_id();
		}


		if ($user_billingaddressid) {
			$add_user = "insert into user (user_email, user_password, user_registration, user_lastlogin, user_billingaddressid, user_shippingaddressid) values ('$_POST[email]', '$_POST[password]', now(), now(), '$user_billingaddressid', '$user_shippingaddressid')";
			mysql_query($add_user) or die(mysql_error());

			$body_content = "<h1>User added</h1><br />
			<a href=\"adduser.php\">Add another user</a>";
		}
	}
?>

<html>
	<head>
		<title>Add entry</title>
		<?php echo $css_backoffice; ?>
		<style type="text/css">
			
			html {
				background: #73add7 url(../images/header_back.gif) repeat-x left top;
				background-color: white;
			}

			body {
				width: 100%;
				margin-left: 0px;
				margin-top: 0px;
				background: url(../images/back_mic.jpg) no-repeat center 143px;
			}
				
		</style>
		<script type="text/javascript" language="javascript">
		 function toggleVisibility(cb)
		 {
		  var checkboxid = document.getElementById("shippingaddress");
		  if(cb.checked==true)
		   checkboxid.style.display = "block";
		  else
		   checkboxid.style.display = "none";
		 }
		</script>
	</head>
	<body>
		<div id="maincontainer">
						
			<div id="header">		
				<h2><a href="index.htm" style="text-decoration:none; color:white">Header</a></h2>						
			</div>
			
			<div id="box-login">
			
				<form name="input" action="checklogin.php" method="post">
					Username: <input type="text" name="myusername" size="20" /> </br>
					Password: <input type="password" name="mypassword" size="20" /> </br>
					<a href="register.htm" style="text-decoration:none;"><button type="button">Sign up</button></a><button type="submit">Login</button>
				</form>
				</br>
			</div>
			
        	<div id="horizontalmenu">
    	    	<ul>
					<li class="active"><a href="backoffice.php">Backoffice</a>
        	       		<ul>
            	   		</ul>
        	    	</li>
	            	<li><a href="listusers.php">Users</a>
        	       		<ul>
    	           		   <li><a href="listusers.php">List</a></li>
	               		   <li><a href="adduser.php">Add</a></li>
	               		   <li><a href="editusers.php">Edit</a></li>
            	   		</ul>
        	    	</li>
    	        	<li><a href="viewproducts.php">Products</a>
	              		<ul>
							<li><a href="viewproducts.php">View</a></li>
                	   		<li><a href="editproducts.php">Import/export</a></li>
       	        		</ul>
        	    	</li>
    	        	<li><a href="vieworders.php">Orders</a>
    	        		<ul>
							<li><a href="vieworders.php">View</a></li>
                	   		<li><a href="addorder.php">Add order manually</a></li>
       	        		</ul>
	            	</li>
            		<li><a href="shopconfig.php">Shop config</a></li>
     	    	</ul>
     	 	</div>	
     	 	
     		<div id="box-search">
				<form> 
					<input type="text" name="search query" size="20"/>
					<button type="button">Search</button>
				</form>
			</div>
		
			<div id="sidebar-left">
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed elit ante. Nunc luctus tempus nibh, ac pellentesque dolor rhoncus vitae. Donec ac ipsum ut elit suscipit varius. Donec urna turpis, porta nec tincidunt suscipit, dapibus at neque. Nulla cursus risus vitae diam egestas in feugiat arcu consectetur. Vivamus dapibus tincidunt dictum. Aliquam nec volutpat libero. Phasellus et arcu elit. Praesent nunc ante, placerat sagittis pharetra non, rutrum vitae nisl. Sed sollicitudin dui non lacus semper in lacinia sapien sollicitudin. Praesent lobortis urna sapien. Sed sed eros neque, in posuere massa. Quisque sit amet nisi dolor, id elementum libero. Mauris pharetra ultricies tellus non laoreet. Ut rutrum rutrum libero quis aliquet. Nulla mauris ipsum, gravida ac dictum non, dictum eget est.
			</div>
		
			<div id="box-carousel">
				<?php echo $body_content; ?>
			</div>
	
			<div id="box-footer">Developed by David Sondervan, Nicolas Martos, Artiom Emelianov, Nisjaat Sheik Joesoef, Willem van Dijk in Amsterdam 2012.</div>

		</div>
	</body>
</html>