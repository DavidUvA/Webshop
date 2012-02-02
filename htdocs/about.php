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
		<link rel="stylesheet" type="text/css" href="css/about.css">
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
     	 	     	 	
			<div id="sidebar-left"><img border="0" src="images/aboutus.jpg" alt="offices" width="200px" height="340px" /></div>
		
			<div id="box-main">
				<h3 style="margin: 0px;">About us</h3>
				<p>Founded at the very start of 2012, "webshopname" is a webshop located in Amsterdam, that provides and delivers!</p>
				<p>"Webshopname" is meant for everyone who listens or produces music. At this place you can find the best equipment for cheap prices! If you are not sure what equipment suits you, you can contact us for advice, feel free to do so.</p>
				<b>Shipping</b>
				<p>It is only possible to order products online. We will deliver the product at the corresponding address or you can choose to pick it up yourself. The shipping price is 4,99 euro however for products above 50 euro there is no shipping price. </p>
						
			</div>
		
			<div id="box-smallcontainer" style="margin-left: auto; margin-right: auto; width: 100%;">
		
				<div>
					<h3>Staff</h3>
						<p>
							<li style="list-style-type: none;">David Sondervan</li>
							<li style="list-style-type: none;">Nisjaat Sheik Joesoef</li>
							<li style="list-style-type: none;">Willem van Dijk</li>
							<li style="list-style-type: none;">Nicolas Martos</li>
							<li style="list-style-type: none;">Artiom Emalianov</li>
						</p>
				</div>	
					
				<div>
					<h3>Questions</h3>
					<p>
						If you got any kind of questions, check out our FAQ section.
						If your question is personal or your question isn't listed in the FAQ section you can send us an email.
					</p>
				</div>
				
				<div>
					
				</div>	
		
			</div>

			<div id="box-footer">
				<?php echo $main_footer; ?>
			</div>

		</div>

		
	</body>
</html>