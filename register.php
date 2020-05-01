
<head>
   <style>
      .error {color: #FF0000;}
   </style>  

</head>


<?php

$Fnamerr = $Lnamerr = $Weighterr =$Emailerr = $Passworderr = $myPassword = $myPasswordAgain ="";


/*if (empty($_POST["Fname"])){
    $Fnamerr = " first name is required";
} else {  */
    $Fnamehas = test_input($_POST["Fname"]);
//}

/*if (empty($_POST["Lname"])){
    $Lnamerr = " last name is required";
} else {  */
     $Lnamehas = test_input($_POST["Lname"]);
//}

/*if (empty($_POST["Weight"])){
    $Weighterr = "Weight is required ";
} else {
    
} */

/*if (empty($_POST["Email"])){
     $Emailerr = "Email is required ";
} else */ if (!empty($_POST["Email"])) {
    $Email = test_input($_POST["Email"]);
    
    /*check if e-mail is well-formed*/
    if (!filter_var($Email,FILTER_VALIDATE_EMAIL)){
      $Emailerr = "Invalid email format ";
    }
}

/*if (!($_POST["Password"]) == ($_POST["Password_again"])){
    $Passworderr = "  Oops! Password did not match! Try again." ;
} */



function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
 
 // echo "Given values are <br>";
 //echo "Fname is ".$Fname."<br>";
  //echo "Fnamehas is ".$Fnamehas."<br>";
  //echo "Fnamerr is ".$Fnamerr."<br>";
  //echo "<br>".$Lnamerr;
  //echo "<br>".$Weighterr;
  //echo "<br>".$Emailerr;
 /* echo "Fnamerr has ".$Fnamerr."<br>";*/

?>


<h2> Gym Registration Form </h2>


<form action="" method="post">
    <label for="Fname">First Name</label>
    <input type="text" name="Fname"  id="Fname" value="" autocomplete="off">
    <span class="error"> <?php echo $Fnamerr;?></span>
    <br>
    
    <label for="Lname">Last Name</label>
    <input type="text" name="Lname"  id="Lname" value="" autocomplete="off">
    <span class="error"> <?php echo $Lnamerr;?></span>
    <br>
    
    <label for="Weight">Enter your weight </label>
    <input type="text" name="Weight"  id="Weight" value="" autocomplete="off">
    <span class="error"> <?php echo $Weighterr;?></span>
    <br>
    
    <label for="Email">Enter your email</label>
    <input type="text" name="Email"  id="Email" value="" autocomplete="off" required>
    <span class="error"> <?php echo $Emailerr;?></span>
    <br>
    
    <label for="Password">Enter your password</label>
    <input type="Password" name="Password"  id="Password" value="" >
    
    <br>
    
    <label for="Password_again">Re-enter your password</label>
    <input type="password" name="Password_again"  id="Password_again" value="" >
    
    
    
    <?php   //php to check if password match 


$myPassword =  ($_POST["Password"]); //store the password 
$myPasswordAgain = ($_POST["Password_again"]); //store user retyped password

//echo "Your Password is -> ".$myPassword."<br>";
//echo "Your retyped Password is -> ".$myPasswordAgain."<br>";

if ($myPassword != $myPasswordAgain){
    $Passworderr = "  Oops! Password did not match! Try again ";
}
//echo $Passworderr;
?>

<span class="error"> <?php echo $Passworderr; ?> </span>

    
    <br>
    
    <input type="submit" value="Register">

</form>    

