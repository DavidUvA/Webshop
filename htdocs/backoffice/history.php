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
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<?php 
include "generateorders.php";
include "factuur.php";
?>
<html>
	<head>
	
	<style type="text/css">
	
	html {
		background: #73add7 url(images/header_back.gif) repeat-x left top;
		background-color: white;
	}

	body {
		width: 100%;
		margin-left: 0px;
		margin-top: 0px;
		background: url(images/back_mic.jpg) no-repeat center 143px;
	}
		
	</style>
		<title>Webshop</title>
		<link rel="stylesheet" type="text/css" href="css/menu.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<link rel="stylesheet" type="text/css" href="css/history.css">
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
					<?php 
						generateorders();
				
					?>
			</div>
		
			<div id="box-main">
				<?php 
						if(empty($_GET['id']))
						{
						echo "No invoice selected";
						}
					else{
						generatebill($_GET['id']); 
						}
					
				
					?>
			</div>
			<div id="box-smallcontainer" style="margin-left: auto; margin-right: auto; width: 100%;">
		
				<div>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed elit ante. Nunc luctus tempus nibh, ac pellentesque dolor rhoncus vitae. Donec ac ipsum ut elit suscipit varius. Donec urna turpis, porta nec tincidunt suscipit, dapibus at neque. Nulla cursus risus vitae diam egestas in feugiat arcu consectetur.
				</div>
		
				<div></div>
				<div></div>	
		
			</div>
	
			<div id="box-footer">Developed by David Sondervan, Nicolas Martos, Artiom Emelianov, Nisjaat Sheik Joesoef, Willem van Dijk in Amsterdam 2012.</div>

		</div>

		
	</body>
</html>