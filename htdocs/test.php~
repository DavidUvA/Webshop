<?php

// to eventually re-fill the fields
$name = "";
$email = "";
$age = "";
$comments = "";

// to re-select a radio button and select option
$Mchecked = "";
$Fchecked = "";
$selectMinus_30="";
$select30_to_60="";
$select60_plus="";

// to display errors
$error = "";

$done=false;

if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["age"])){
    if($_POST["name"]==""){
    $error = "empty name <br/>";
    }

    if($_POST["email"]==""){
    $error = $error . "empty mail <br/>";
    }

    if($_POST["comments"]==""){
    $error = $error . "error: empty comments <br/>";
    }


    $name = $_POST["name"];
    $email = $_POST["email"];
    $comments = $_POST["comments"];

    $age = $_POST["age"];
    if ($age == "Under 30"){
        $selectMinus_30 = "selected";
    }
    else if ($age == "Between 30 and 60"){
        $select30_to_60 = "selected";
    }
    else if ($age == "60+"){
        $select60_plus = "selected";
    }

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
    <strong>Gender</strong><br/>
    <input type="radio" name="gen" value="Male" <?php echo $Mchecked;?>>Male</input><br/>
    <input type="radio" name="gen" value="Female" <?php echo $Fchecked;?>>Female</input><br/>
    <br/>
    <select name="age" value="<?php echo $age;?>">
    <option value="Under 30" <?php echo $selectMinus_30;?>>Under 30</option><br/>
    <option value="Between 30 and 60" <?php echo $select30_to_60;?>>Between 30 and 60</option><br/>
    <option value="60+" <?php echo $select60_plus;?>>60+</option>
    </select>
    <br/>
    Comments: <textarea name="comments" cols="20" rows="5"><?php echo $comments; ?></textarea>
 
    <input type="submit" name="submit" value="Submit my Information" />
    </form>
	</div>
<?php }else{
    echo "Thank you, ".$name." for your comments: " . "<strong>" . $comments . "</strong>";
    echo "<br/>We will reply to you at:" . "<em>" . $email . "</em>";
 } ?>

</body>
</html>

