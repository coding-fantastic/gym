<head>
  <meta charset="utf-8" />     
<link rel="stylesheet" href="style2.css" type="text/css" />	<!-- //link css  -->
<meta name="viewport" content="width=device-width, initial-scale=1.0" >     <!-- make framework Responsive  -->
  <style>
    .error {color: #FF0000;}
  </style>

</head>



<?php

$Password=$Passworderr=$Username=$Usernamerr='';
$checkError=$userAvailable=0;

if (isset($_POST['submit'])){
session_start();
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
	$checkError=1;
    } 
    if(strlen ($Username)<3) {
      $Usernamerr = "username must be more than 2 character";
	$checkError=1;
    }
  
}


//if ($_SERVER["REQUEST_METHOD"]=="POST"){
//check if there is an error
    if ($checkError!=1){
      
    
      
	while ($row = mysqli_fetch_assoc($result)){  /*  Fetch a result row as an associative array */
	    /*if($Username!=$row["Username"]){
	      $userAvailable=1;
	      echo $row['Username']."<br>";
	      }  */
	    if($Username == $row["Username"] && $Password == $row["Password"]){
	      
		if(strlen ($Username)>=3){ /*avoid printing empty welcome*/
		    echo "Welcome ". $row["Username"];
     }

      }
//if statement to check user availability
/*    if ($Username!=$row["Username"]){
	$userAvailable=1;
		
    }   */


}

$sql = "select * from users where Username = '$Username'";
$result = mysqli_query($conn,$sql);
if (mysqli_num_rows($result) ==1){
    $_SESSION['Message'] = "You are now logged in";
    $_SESSION['Username']= $Username;
    header("location:home4.php");   //redirect to home page 
}else {
  echo "<br> The  user you entered was not found in our records. <br> Please try with another username <br>";
}
    
   /* while ($row = mysqli_fetch_assoc($result)){
	  if($Username!=$row["Username"]){
	      $userAvailable=1;
	      echo "inside second assoc";
	}      
    }*/
    //echo "<br> userAvailable is  ".$userAvailable;
   if ($userAvailable==1){
    echo "<br> The  user you entered was not found in our records. <br> Please try with another username <br>";
  } 

}else if ($checkError==1) {

    echo "<br> There is an error in your form.<br> Try again. <br> ";
    //die();
    header("location:login4.php");
    
}
}
function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
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
  
  <input type="submit" name="submit" value="Login">

</form>