 <?php
	if (!$_SESSION["priv"]) {
		$backoffice_loginform = "<form name=\"input\" action=\"../../include/checklogin.php\" method=\"post\">
			Username: <input type=\"text\" name=\"myusername\" size=\"20\" /> </br>
			Password: <input type=\"password\" name=\"mypassword\" size=\"20\" /> </br>
			<a href=\"register.htm\" style=\"text-decoration:none;\"><button type=\"button\">Sign up</button></a><button type=\"submit\">Login</button>
		</form>";
	}
	else{
		$backoffice_loginform = "Welcome Admin<a href=\"include/logout.php\" style=\"text-decoration:none;\"><button type=\"button\">Logout</button></a>";
	}
?>