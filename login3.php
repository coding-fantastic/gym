<head>
  <style>
    .error {color: #FF0000;}
  </style>

</head>



<?php

$Password=$Passworderr=$Username=$Usernamerr='';
$errorChecker=$userAvailable=0;

/*
If the REQUEST_METHOD is POST,
then the form has been submitted
- and it should be validated.
If it has not been submitted,
skip the validation and display a blank form.
*/

if(!empty($_POST["Username"])){
$Username=test_input($_POST["Username"]);
$Password=test_input($_POST["Password"]);
}


define ("DB_SERVER","localhost");
define ("DB_USER","root");
define ("DB_PASSWORD","");
define ("DB_NAME","testGym2");

$conn  = new mysqli (DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME);

//check server connection

if($conn->connect_error){
      die("Connection failed:".$con->connect_error);
} else {
      echo "Connected successfully <br>";
}

//receive values from user form and trim white spaces
//$Username = trim($_POST['Username']);
//$Password=trim($_POST['Password']);

$query="select * from users ";
$result = mysqli_query($conn,$query);

//server
if ($_SERVER["REQUEST_METHOD"]=="POST"){

    if (!preg_match("/^[a-zA-Z0-9]*$/",$Username)){
	$Usernamerr = "only letters and numbers are allowed" ;
	$errorChecker=1;
    } 
    if(strlen ($Username)<3) {
      $Usernamerr = "username must be more than 2 character";
	$errorChecker=1;
    }
  
//echo "errorChecker is ". $errorChecker."<br>";  
}
?>

<form action="" method="post">

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

<?php


if ($_SERVER["REQUEST_METHOD"]=="POST"){
//check if there is an error
    if ($errorChecker!=1){

	while ($row = mysqli_fetch_assoc($result)){  /*  Fetch a result row as an associative array */
    if($Username == $row["Username"] && $Password == $row["Password"]){
	if(strlen ($Username)>=3){ /*avoid printing empty welcome*/
	      echo "Welcome ". $row["Username"];
     }

      }
//if statement to check user availability
    if ($Username!=$row["Username"]){
	$userAvailable=1;
    }


}
  if ($userAvailable==1){
    echo "<br> No user found <br> Try with another username <br>";
  }

}else if ($errorChecker==1) {
//include 'login.php';
//include 'register2.php';   //take the errorCheck variable from register2.php to show if there is any error
//if ($errorChecker==1){
    echo "<br> There is an error in your form.<br> Try again. <br> ";
    die();
    
}/*else {
    echo "<br>The entered password and username is not correct<br>";
}*/
}
function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>


