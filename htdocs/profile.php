<?php
	// Places head content (css /scripts etc) in $main_headcontent
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<?php echo $main_headcontent; ?>
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
				<?php echo $main_leftsidebar; ?>
			</div>
		
			<div id="box-carousel">
				<?php echo $main_carousel; ?>
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
