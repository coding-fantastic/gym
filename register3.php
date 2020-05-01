<!DOCTYPE html>
<html>  		<!--for the administrator -->
<head>
<meta charset="utf-8" />
<link rel="stylesheet" href="style2.css" type="text/css" />	<!-- //link css  -->
<meta name="viewport" content="width=device-width, initial-scale=1.0" >     <!-- make framework Responsive  -->
   <style>
      .error {color: #FF0000;}
       </style>

</head>
<body>

<header class="mainHeader">
      <!-- <img src="dumbbell.jpg">  -->

      <nav><ul>  		<!-- navigation bar  -->
	<li class="active"><a href="home3.php">Home</a></li>

<!-- admin in the registration side will be a problem -->
	<!-- <li><a href="admin.php"> Admin Panel</a></li> -->

	<li><a href="#">About</a></li>

	<li><a href="#">Contact</a></li>

      </ul></nav>

  </header>


</body>
</html>

<?php

$Fnamerr = $Lnamerr = $Weighterr =$Emailerr = $Passworderr = $myPassword ="";
$myPasswordAgain = $PhoneNumberr  = $Usernamerr = $Fname =$Lname =$Weight=$Username ="";
$PhoneNumber = $Email =$Money=$Moneyerr = "";
$errorCheck=$sendNow=0;


if ($_SERVER["REQUEST_METHOD"] == "POST"){ //checks if it is post if it is not dispaly a blank page

    /*$usernamecheck = mysql_query ("SELECT  * from users WHERE Username = '$_POST[Username]'");
    $userchecker = mysql_fetch_assoc ($usernamecheck); */


   if (!empty($_POST["Fname"])) {
     $Fname = test_input($_POST["Fname"]);

     if(!preg_match("/^[a-zA-Z_]*$/",$Fname)){
	$Fnamerr = "Only letters and _ are allowed";
	$errorCheck=1;    $sendNow=1;
     }
     }

     if (!empty($_POST["Lname"])) {
     $Lname = test_input($_POST["Lname"]);
     if(!preg_match("/^[a-zA-Z_]*$/",$Lname)){
	$Lnamerr = "Only letters and _ allowed";
	$errorCheck=1;    $sendNow=1;
     }
     }

     //place service in the $Service variable
     if (!empty($_POST["Service"])){
     $Service = test_input($_POST["Service"]);
     }

     if (!empty($_POST["Username"])) {
     $Username = test_input($_POST["Username"]);
     if(!preg_match("/^[a-zA-Z0-9]*$/",$Username)){
	$Usernamerr = "only letters and numbers are allowed" ;
	$errorCheck=1;    $sendNow=1;
     }
     else {
      if(strlen ($Username) <3){
	$Usernamerr = "username must be more than 2 character";
	$errorCheck=1;    $sendNow=1;
      }else {}

     }
     }
     /*if($_POST["Username"])== $userchecker["Username"] {
	  $Usernamerr = "The username is already taken.";
      }*/
     if (!empty($_POST["PhoneNumber"])) {
     $PhoneNumber = test_input($_POST["PhoneNumber"]);
     if(!preg_match("/^[0-9]*$/",$PhoneNumber)){
	$PhoneNumberr = "Only numbers are allowed";
	$errorCheck=1;    $sendNow=1;
     }
     }

     if (!empty($_POST["Weight"])) {
     $Weight = test_input($_POST["Weight"]);
     if(!preg_match("/^[0-9]*$/",$Weight)){
	$Weighterr = "Only numbers are allowed";
	$errorCheck=1;    $sendNow=1;
     }
     }

     if (!empty($_POST["Money"])) {
     $Money = test_input($_POST["Money"]);
     if(!preg_match("/^[0-9]*$/",$Money)){
	$Moneyerr = "<br>Only numbers are allowed";
	$errorCheck=1;    $sendNow=1;
     }
     }

 if (!empty($_POST["Email"])) {
    $Email = test_input($_POST["Email"]);

    /*check if e-mail is well-formed*/
    if (!filter_var($Email,FILTER_VALIDATE_EMAIL)){
      $Emailerr = "Invalid email format ";
      $errorCheck=1;    $sendNow=1;
    }
}

$myPassword =  ($_POST["Password"]); //store the password
$myPasswordAgain = ($_POST["Password_again"]); //store user retyped password

//echo "Your Password is -> ".$myPassword."<br>";
//echo "Your retyped Password is -> ".$myPasswordAgain."<br>";
if(strlen ($myPassword) <7){
    $Passworderr = "Password must be more than 6 characters";
    $errorCheck=1;    $sendNow=1;
} else {
if ($myPassword != $myPasswordAgain){
    $Passworderr = " <br> Oops! Password did not match! Try again ";
    $errorCheck=1;    $sendNow=1;
}
}
//echo $Passworderr;

if($sendNow==0){
  require 'phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();				//Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';			//Specify main and backup SMTP servers
$mail->SMTPAuth = true;				//Enable SMTP autentication
$mail->Username = 'gymsender@gmail.com';	//SMTP username
$mail->Password = 'gymsender1';			//SMTP password
$mail->SMTPSecure = 'tls';			//Enable TLS encryption,

$mail->From = 'gymsender@gmail.com';
$mail->FromName = 'The Gym';
$mail->addAddress($Email);
//$mail->addCC('alexo1@students.uonbi.ac.ke');

$mail->isHTML(true);				//set email format to html

$mail->Subject = 'Team Gym!';
$mail->Body    = '<b> Welcome to The Gym </b>. <br>Thank you for registering with The Gym . <br>';
//$mail->AltBody    = ' Thank you for registering with The Gym . <br>';


if(!$mail->send()) {
    echo '<br>Message could not be sent.<br>';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
 } else {
   echo '<br>Message has been sent<br>';
}
}

}
function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>


<h2> Gym Registration Form </h2>

<form action="connect3.php" method="post">
<!--
>?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>
HTMLSPECIALCHARS() function converts special characters to HTML entities -->


    <label for="Fname">First Name</label><br>
    <input type="text" name="Fname"  id="Fname" value="<?php echo $Fname; ?>" maxlength="12"  autocomplete="off" required>
    <span class="error"> <?php echo $Fnamerr ?>   </span>
    <br>

    <label for="Lname">Last Name</label> <br>
    <input type="text" name="Lname"  id="Lname" value="<?php echo $Lname;?> "  maxlength="12"  autocomplete="off">
    <span class="error"> <?php echo $Lnamerr ?> </span>
    <br>

    <label for="Weight">Enter your weight (in Kg ) </label><br>
    <input type="text" name="Weight"  id="Weight" value="<?php echo $Weight; ?>"  maxlength="3"  autocomplete="off">
    <span class="error"> <?php echo $Weighterr ?> </span>
    <br>
    <label for="Money">Enter the Money </label><br>
    <input type="text" name="Money"  id="Money" value="<?php echo $Money; ?>" maxlength="5"  autocomplete="off">
    <span class="error"> <?php echo $Moneyerr ?> </span>
    <br>

    <label for="Username">Username</label><br>
    <input type="text" name="Username" id="Username" value="<?php echo $Username; ?>" maxlength="12"  autocomplete="off" required>
    <span class="error"><?php echo $Usernamerr ?></span>
    <br>

    <label for="PhoneNumber">Your phone number </label><br>
    <input type="text" name="PhoneNumber" id="PhoneNumber" value="<?php echo $PhoneNumber; ?>"  maxlength="12" autocomplete="off">
    <span class="error"> <?php echo $PhoneNumberr ?> </span>
    <br><br>

    <label> Which service do you want?</label><br>
    <select name="Service" >
      <option  value="Yoga">Yoga</option>
      <option  value="Body Building">Body Building</option>
      <option  value="Kick Boxing">Kick Boxing</option>
      <option  value="Acrobats">Acrobats</option>
      <option  value="Aerobics">Aerobics</option>
      <option  value="Nutirtion counseling">Nutirtion counseling</option>
      <option  value="Personal Training">Personal Training</option>
    </select><br><br>

    <label for="Email">Enter your email</label><br>
    <input type="text" name="Email"  id="Email" value="<?php echo $Email ?>" autocomplete="off" maxlength="40"  required>
    <span class="error"> <?php echo $Emailerr;?></span>
    <br>

    <label for="Password">Enter your password</label><br>
    <input type="Password" name="Password"  id="Password" value="<?php echo $myPassword?>" maxlength="10"  required ><br>


    <label for="Password_again">Re-enter your password</label><br>
    <input type="Password" name="Password_again"  id="Password_again" value="<?php echo $myPasswordAgain?>" maxlength="10"  ><br>
    <span class="error"> <?php echo $Passworderr;?> </span>  <br>


    <label> Gender </label><br>
    <input type="radio" name="Gender" value="Male" checked> Female
    <input type="radio" name="Gender" value="Female" > Male <br><br>



    <input type="submit" name="Register" value="Register">

</form>
