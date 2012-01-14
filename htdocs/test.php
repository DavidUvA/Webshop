<?php

// to eventually re-fill the fields
$name = "";
$email = "";



// to display errors
$error = "";

$done=false;

if (isset($_POST["name"]) && isset($_POST["email"])){
    if($_POST["name"]==""){
    $error = "empty name <br/>";
    }

    if($_POST["email"]==""){
    $error = $error . "empty mail <br/>";
    }

    $name = $_POST["name"];
    $email = $_POST["email"];


    if ($error==""){
        $done=true;
    }
}
?>

<html>
<head>
<title>Lab6 : P1</title>
</head>

<body>

<?php if (!$done){ ?>
    <div>
    <legend><h4>Enter your information in the fields below</h4></legend>
    <p class="error" style="color:red;"><?php echo $error;?></p>
    <form name="info" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
    <strong>Name:</strong> <input type="text" name="name" id="name" value="<?php echo $name; ?>" /><br/>
    <strong>Email:</strong> <input type="text" name="email" id="email" value="<?php echo $email; ?>" /><br/>
    <br/>
    <br/>
    <input type="submit" name="submit" value="Submit my Information" />
    </form>
	</div>
<?php }else{
    echo "Thank you, ".$name.;
    echo "<br/>We will reply to you at:" . "<em>" . $email . "</em>";
 } ?>

</body>
</html>

