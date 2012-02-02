<?php
	// Places head content (css / scripts etc) in $main_headcontent
	include "phpcontent/main_headcontent.php";

	// Places header content (shop name from site config) in $main_header
	include "phpcontent/main_header.php";

	// Places login form content in $main_loginform
	include "phpcontent/main_loginform.php";

	// Places horizontal menu content in $main_menu
	include "phpcontent/main_menu.php";

	// Places search box content in $main_search
	include "phpcontent/main_search.php";

	// Places left sidebar content in $main_leftsidebar
	include "phpcontent/main_leftsidebar.php";

	// Places carousel content in $main_carousel
	include "phpcontent/main_carousel.php";

	// Places footer content in $main_footer
	include "phpcontent/main_footer.php";

	include "include/generateorders.php";
	include "include/factuur.php";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
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

		<link rel="stylesheet" type="text/css" href="css/factuur.css">
	</head>
	
	<body>
		<div id="maincontainer">
			
			<div id="header">		
				<?php echo $main_header; ?>					
			</div>
			
			<div id="box-login">
				<?php echo $main_loginform; ?>
			</div>
			
        	<div id="horizontalmenu">
        		<?php echo $main_menu; ?>
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
	
			<div id="box-footer">
				<?php echo $main_footer; ?>
			</div>

		</div>

		
	</body>
</html>