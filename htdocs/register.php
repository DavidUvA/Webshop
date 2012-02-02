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
<?php
include 'connection.php';
$errors = array();
if ( ! empty( $_POST ) ){

    // Do form stuff in here 
	$email = $_POST['email'];
	$password = $_POST['password'];
	$password1 = $_POST['password1'];
	$checkemail = "/^[a-z0-9]+([_\\.-][a-z0-9]+)*@([a-z0-9]+([\.-][a-z0-9]+)*)+\\.[a-z]{2,}$/i";
	$counter = 0;
	$result = mysql_num_rows(mysql_query("SELECT * FROM user WHERE user_email ='$email'"));

	if($result > 0)
		{	
			$errors[] = "<p> The email address you entered is already in our database, please register with another email address</p>";
		}
			
	if (!preg_match($checkemail,$email))
		{
			$errors[] = "<p>The email you enterted is incorrect.</p></br>";	
		}		
		
	if ((strlen($password)) < 6)
		{
			$errors[] = "<p>Password must be a minimum of 6 characters</p></br>";
		}
			
	if ($password != $password1)
		{	
			$errors[] = "<p>Passwords do not match!</p></br>";	
		}	
			
			
	if ($password == "")
		{	
			$errors[] = "<p>Pleaser enter a password </p></br>";
		}
}
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
		<link rel="stylesheet" type="text/css" href="css/register.css">
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
			<p1> Welcome, Sir/Madame,</p1>
				<hr>
			
				<p1>Please enter the required information below to create an account.</p1>
				</br>
					<hr>
				<p1>Your Email-adress will be used as your username in the future. Please enter a valid Email-adress.</p1>
				</br>
		
		</div>
		
			<div id="box-main">
			<?php
					if(count($errors) == 0 and !empty( $_POST ))
					{
							mysql_query("INSERT INTO user(user_email,user_password) VALUES ('$email','$password')");
							echo "<h1>Registration succes</h1>";
					}
			
					else
					{
						foreach ($errors as $error){
							echo $error . "<br/>";
						}
			?>
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method=post> 
		<h1>Account details</h1>
		<table style="border: 0px;">
			<tr>
				<td>* E-mail address:</td>
				<td><input type="text" name="email" size=30 maxlength=50></td>
			</tr>
			<tr>
				<td>* Password:</td>
				<td><input type="password" name="password" size=30 maxlength=16 placeholder="	Atleast 6 characters"></td>
			</tr>	<tr>
				<td>* Nogmaals Password:</td>
				<td><input type="password" name="password1" size=30 maxlength=16></td>
			</tr>
			
			
		</table>
		<br/>
		<input type="submit" class="button" value="Register" />
		</form>
			<?php 
				}
			?>
			</div>

			<div id="box-footer">
				<?php echo $main_footer; ?>
			</div>


		</div>

		
	</body>
</html>