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
	
			<div id="box-footer">
				<?php echo $main_footer; ?>
			</div>

		</div>
	</body>
</html>
