
<head>
   <style>
      .error {color: #FF0000;}
       </style>  

</head>

<?php
$Password=$Passworderr=$Username=$Usernamerr='';
$errorChecker=0;

if(!empty($_POST["Username"])){
$Username=test_input($_POST["Username"]);
}

/* 
If the REQUEST_METHOD is POST, then the form has been submitted - and it should be validated. If it has not been submitted, skip the validation and display a blank form.
*/
if ($_SERVER["REQUEST_METHOD"]=="POST"){

    if (!preg_match("/^[a-zA-Z0-9]*$/",$Username)){
	$Usernamerr = "only letters and numbers are allowed" ;
	$errorChecker=1;
    } 
    if(strlen ($Username)<3) {
      $Usernamerr = "username must be more than 2 character";
	$errorChecker=1;
    }
  
echo "errorChecker is ". $errorChecker."<br>";    

}

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>

<form action="loginConnect.php" method="post">

  <label for="Username">Username</label>
  <input type="text" name="Username" id="Username" value="<?php echo $Username; ?>" size="10" maxlength="10" required>
  <span class="error"> <?php echo $Usernamerr; ?> </span>
  <br><br>
  
  
  <label for="Password">Password</label>
  <input type="Password" name="Password" id="Password" value="<?php echo $Password; ?>" size="10" maxlength="10" required>
  <span class="error"> <?php echo $Passworderr; ?> </span>
  <br><br>
  
  <input type="submit" value="Login">
</form>