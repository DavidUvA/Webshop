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
		<link rel="stylesheet" type="text/css" href="css/contact.css">
	</head>
	
	<body>
		<div id="maincontainer">
						
			<div id="header">		
				<?php echo $main_header; ?>						
			</div>
			
			<div id="box-login">
				<?php echo $main_loginform; ?>
				</br>
			</div>
			
        	<div id="horizontalmenu">

    	    	<?php echo $main_menu; ?>
     	 	</div>	
     	 	
     		<div id="box-search">
				<?php echo $main_search; ?>
			</div>	
		
			<div id="sidebar-left">
				<font size="5"><b>Contact information</b></font> </br> 
				<b>Adress:</b> Hypothetical Adress 15 1111XX Amsterdam </br>
				<b>Telephone:</b> 010-123456789 </br> 
				<b>Email:</b> webshop@webshop.com </br>
				<b>Visiting hours:</b> Ma-Fr 08:00 - 17:00</p>
				

				<p><b>Email us if you have a question</b></p>
				<?php

require_once('connection.php');



if(isset($_POST['action']) && $_POST['action'] == 'submitform')
{
	
	$name = $_POST['name'];
	$email = $_POST['email'];
	$title = $_POST['title'];
	$comment = $_POST['comment'];
	
	$name = stripslashes($name);
	$email = stripslashes($email);
	$title = stripslashes($title);
	$comment = stripslashes($comment);
	$name = mysql_real_escape_string($name);
	$email = mysql_real_escape_string($email);
	$title = mysql_real_escape_string($title);
	$comment = mysql_real_escape_string($comment);
	$ip = gethostbyname($_SERVER['REMOTE_ADDR']);
	
	
	mysql_select_db("davidhg51_uva", $db);
	
	$insert_query = sprintf("INSERT INTO contacts (name, email, title, comment) VALUES (%s, %s, %s, %s)",
							sanitize($name, "text"),
							sanitize($email, "text"),
							sanitize($title, "text"),
							sanitize($comment, "text"),
							sanitize($ip, "text"));
	
	$result = mysql_query($insert_query, $db) or die(mysql_error());
	
	if($result)
	{
		//send the email
		
		$to = "ouremail@ourisp.com";
		$subject = "New contact from the website";
		
		//headers and subject
		$headers  = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
		$headers .= "From: ".$name." <".$email.">\r\n";
		
		$body = "New contact<br />";
		$body .= "Name: ".$name."<br />";
		$body .= "Email: ".$email."<br />";
		$body .= "Comment: ".$comment."<br />";
		$body .= "IP: ".$ip."<br />";
		
		mail($to, $subject, $body, $headers);
		
		//ok message
		
		echo "Your message has been sent";
	}
}

function sanitize($value, $type) 
{
  $value = (!get_magic_quotes_gpc()) ? addslashes($value) : $value;

  switch ($type) {
    case "text":
      $value = ($value != "") ? "'" . $value . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $value = ($value != "") ? intval($value) : "NULL";
      break;
    case "double":
      $value = ($value != "") ? "'" . doubleval($value) . "'" : "NULL";
      break;
    case "date":
      $value = ($value != "") ? "'" . $value . "'" : "NULL";
      break;
  }
  
  return $value;
}
?>

						
				<form id="contact" name="contact" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

				<p><label><input type="text" id="name" name="name" value="" placeholder="Name" /></label></p>

				<p><label><input type="text" id="email" name="email" value="" placeholder="Email" /></label></p>

				<p><label><input type="text" id="title" name="title" value="" placeholder="Title" /></label></p>

				<p><label><br /><textarea id="comment" name="comment" placeholder="Comment" ></textarea></label></p>

				<input type="hidden" id="action" name="action" value="submitform" />

				<p><input type="submit" id="submit" name="submit" value="Send" /> <input type="Reset" id="reset" name="reset" value="Reset" /></p>

				</form>
			
			</div>
		
			<div id="box-main">
				<iframe width="720" height="340" frameborder="0" scrolling="no" src="http://maps.google.com/maps?					f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Science+Park,+Amsterdam,		 	+Nederland&amp;aq=&amp;sll=52.358933,4.96376&amp;sspn=0.04141,0.111494&amp;vpsrc=6&amp;ie=UTF8&amp;hq=Science+Park,&amp;hnear=Amsterdam,+Government+of+Amsterdam,+North+Holland,+The+Netherlands&amp;t=m&amp;fll=52.356601,4.955521&amp;fspn=0.020706,0.055747&amp;st=112682123204788070687&amp;rq=1&amp;ev=zo&amp;split=1&amp;ll=52.355474,4.954834&amp;spn=0.031453,0.070038&amp;z=12&amp;output=embed"></iframe><br /><small><a href="http://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Science+Park,+Amsterdam,+Nederland&amp;aq=&amp;sll=52.358933,4.96376&amp;sspn=0.04141,0.111494&amp;vpsrc=6&amp;ie=UTF8&amp;hq=Science+Park,&amp;hnear=Amsterdam,+Government+of+Amsterdam,+North+Holland,+The+Netherlands&amp;t=m&amp;fll=52.356601,4.955521&amp;fspn=0.020706,0.055747&amp;st=112682123204788070687&amp;rq=1&amp;ev=zo&amp;split=1&amp;ll=52.355474,4.954834&amp;spn=0.031453,0.070038&amp;z=12" style="color:#0000FF;text-align:left"></a></small>
			</div>
		
			<div id="box-smallcontainer"">
		
				<div>
					<img border="0" src="images/offices1.jpg" alt="offices" width="205" height="150" />
				</div>
		
				<div>
					<img border="0" src="images/palm-beach-office-1t.jpg" alt="offices" width="205" height="150" />
				</div>
				
				<div>
					<img border="0" src="images/offices.jpg" alt="offices" width="205" height="150" /> 
				</div>	
		
			</div>
	
			<div id="box-footer"><?php echo $main_footer; ?></div>

		
	</body>
</html>
