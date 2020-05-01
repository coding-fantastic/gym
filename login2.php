
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
$Username=trim($_POST['Username']);
$Password=trim($_POST['Password']);

$query="select * from users ";
$result = mysqli_query($conn,$query);


if ($errorChecker!=1){

  while ($row = mysqli_fetch_assoc($result)){
if ($Username == $row["Username"] && $Password == $row["Password"]){
 echo "Welcome ". $row["Username"]."<br><br>";

}
}

}else {
//include 'login.php';
//include 'register2.php';   //take the errorCheck variable from register2.php to show if there is any error
//if ($errorChecker==1){
    echo "<br> There is an error in your form.<br> Try again. <br> ";
    die();
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
  
  <input type="submit" value="Login">
</form>