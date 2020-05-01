
<head>
   <style>
      .error {color: #FF0000;}
       </style>  

</head>


<?php

$Fnamerr = $Lnamerr = $Weighterr =$Emailerr = $Passworderr = $myPassword ="";
$myPasswordAgain = $PhoneNumberr  = $Usernamerr = $Fname =$Lname =$Weight=$Username ="";
$PhoneNumber = $Email = "";
$errorCheck=0;

if ($_SERVER["REQUEST_METHOD"] == "POST"){ //checks if it is post if it is not dispaly a blank page

    /*$usernamecheck = mysql_query ("SELECT  * from users WHERE Username = '$_POST[Username]'");
    $userchecker = mysql_fetch_assoc ($usernamecheck); */
    

   if (!empty($_POST["Fname"])) {
     $Fname = test_input($_POST["Fname"]);
     
     if(!preg_match("/^[a-zA-Z_]*$/",$Fname)){
	$Fnamerr = "Only letters and _ are allowed";
	$errorCheck=1;
     }
     }

     if (!empty($_POST["Lname"])) {
     $Lname = test_input($_POST["Lname"]);
     if(!preg_match("/^[a-zA-Z_]*$/",$Lname)){
	$Lnamerr = "Only letters and _ allowed";
	$errorCheck=1;
     }
     }
     
     if (!empty($_POST["Username"])) {
     $Username = test_input($_POST["Username"]);
     if(!preg_match("/^[a-zA-Z0-9]*$/",$Username)){
	$Usernamerr = "only letters and numbers are allowed" ;
	$errorCheck=1;
     }    
     else {
      if(strlen ($Username) <3){
	$Usernamerr = "username must be more than 2 character";
	$errorCheck=1;
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
	$errorCheck=1;
     }
     }
     
     if (!empty($_POST["Weight"])) {
     $Weight = test_input($_POST["Weight"]);
     if(!preg_match("/^[0-9]*$/",$Weight)){
	$Weighterr = "Only numbers are allowed";
	$errorCheck=1;
     }	 
     }

 if (!empty($_POST["Email"])) {
    $Email = test_input($_POST["Email"]);
    
    /*check if e-mail is well-formed*/
    if (!filter_var($Email,FILTER_VALIDATE_EMAIL)){
      $Emailerr = "Invalid email format ";
      $errorCheck=1;
    }
}

$myPassword =  ($_POST["Password"]); //store the password 
$myPasswordAgain = ($_POST["Password_again"]); //store user retyped password

//echo "Your Password is -> ".$myPassword."<br>";
//echo "Your retyped Password is -> ".$myPasswordAgain."<br>";
if(strlen ($myPassword) <7){
    $Passworderr = "Password must be more than 6 characters";
} else {
if ($myPassword != $myPasswordAgain){
    $Passworderr = "  Oops! Password did not match! Try again ";
}
}
//echo $Passworderr;






}
function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>       


<h2> Gym Registration Form </h2>  

<form action="connect2.php" method="post">
<!--
>?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>
HTMLSPECIALCHARS() function converts special characters to HTML entities -->
    
    
    <label for="Fname">First Name</label>
    <input type="text" name="Fname"  id="Fname" value="<?php echo $Fname; ?>" size="12" maxlength="10" autocomplete="off" required>
    <span class="error"> <?php echo $Fnamerr ?>   </span>
    <br>
    
    <label for="Lname">Last Name</label>
    <input type="text" name="Lname"  id="Lname" value="<?php echo $Lname;?>" size="12" maxlength="10" autocomplete="off">
    <span class="error"> <?php echo $Lnamerr ?> </span>
    <br>
    
    <label for="Weight">Enter your weight </label>
    <input type="text" name="Weight"  id="Weight" value="<?php echo $Weight; ?>" size="5" maxlength="3" autocomplete="off">
    <span class="error"> <?php echo $Weighterr ?> </span>
    <br>
    
    <label for="Username">Username</label>
    <input type="text" name="Username" id="Username" value="<?php echo $Username; ?>" size="12" maxlength="10" autocomplete="off" required>
    <span class="error"><?php echo $Usernamerr ?></span>
    <br>
    
    <label for="PhoneNumber">Your phone number </label>
    <input type="text" name="PhoneNumber" id="PhoneNumber" value="<?php echo $PhoneNumber; ?>" size="10" maxlength="12" autocomplete="off">
    <span class="error"> <?php echo $PhoneNumberr ?> </span>
    <br>
    
    <label for="Email">Enter your email</label>
    <input type="text" name="Email"  id="Email" value="<?php echo $Email ?>" autocomplete="off" size="15" maxlength="30" required>
    <span class="error"> <?php echo $Emailerr;?></span>
    <br>
    
    <label for="Password">Enter your password</label>
    <input type="Password" name="Password"  id="Password" value="<?php echo $myPassword?>" size="10" maxlength="10" required >
    <br>
    
    <label for="Password_again">Re-enter your password</label>
    <input type="Password" name="Password_again"  id="Password_again" value="<?php echo $myPasswordAgain?>" size="10" maxlength="10" >
    <span class="error"> <?php echo $Passworderr;?> </span>
     
    
    <br>
  
    
    <input type="submit" value="Register">

</form> 

  
