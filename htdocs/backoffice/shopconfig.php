<?php
	// Puts html content for menu in $menu_backoffice
	include "menu_backoffice.php";

	// Puts html content for stylesheets in $css_backoffice
	include "css_backoffice.php";
?>

<?php
	// CONNECT TO DATABASE
	include "connection.php";

	if ($_POST[hidden] != "save") {
	
		$config = mysql_query("SELECT * FROM shopconfig");
		echo $config[0];
		echo $config[1];


		$body_content = "<h1>Shop config</h1>

		<form method=\"post\" action=\"$_SERVER[PHP_SELF]\">
		
		<table style=\"border: 0px;\">
			<tr>
				<td>Shop name:</td>
				<td><input type=\"text\" name=\"shop_name\" size=30 maxlength=50></td>
			</tr>
			<tr>
				<td>Address</td>
				<td><input type=\"textarea\" name=\"shop_address\" size=30 maxlength=16></td>
			</tr>
			<tr>
				<td>Phone number</td>
				<td><input type=\"password\" name=\"shop_phone\" size=30 maxlength=16></td>
			</tr>
		</table>

		<input type=\"hidden\" name=\"hidden\" value=\"save\">
		<input type=\"button\" name=\"submit\" value=\"Save\">
		</form>";
	}
	else if ($_POST[hidden] == "save") {
		$body_content = "SAVE";
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