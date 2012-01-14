<?php
	// Puts html content for menu in $menu_backoffice
	include "menu_backoffice.php";

	// Puts html content for stylesheets in $css_backoffice
	include "css_backoffice.php";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
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
		<title>Webshop</title>
		<?php echo $css_backoffice; ?>
	</head>
	
	<body>
		<div id="maincontainer">
						
			<div id="header">		
				<h2><a href="backoffice.php" style="text-decoration:none; color:white">Backoffice</a></h2>						
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
    	    	<?php echo $menu_backoffice; ?>
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
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed elit ante. Nunc luctus tempus nibh, ac pellentesque dolor rhoncus vitae. Donec ac ipsum ut elit suscipit varius. Donec urna turpis, porta nec tincidunt suscipit, dapibus at neque. Nulla cursus risus vitae diam egestas in feugiat arcu consectetur. Vivamus dapibus tincidunt dictum. Aliquam nec volutpat libero. Phasellus et arcu elit. Praesent nunc ante, placerat sagittis pharetra non, rutrum vitae nisl. Sed sollicitudin dui non lacus semper in lacinia sapien sollicitudin. Praesent lobortis urna sapien. Sed sed eros neque, in posuere massa. Quisque sit amet nisi dolor, id elementum libero. Mauris pharetra ultricies tellus non laoreet. Ut rutrum rutrum libero quis aliquet. Nulla mauris ipsum, gravida ac dictum non, dictum eget est.

				<p>Nam iaculis sapien eget turpis eleifend pharetra. Duis pretium semper lacinia. Nulla sagittis lacus quis lacus vehicula fringilla. Fusce at lectus vitae lectus varius sagittis vel ac velit. Nunc consectetur, magna in luctus ultricies, mi turpis fringilla sem, nec facilisis mauris nunc eu leo. Praesent gravida consectetur nulla, mattis laoreet libero lobortis nec. Sed nec magna velit.</p>
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
