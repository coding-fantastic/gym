<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
<link rel="stylesheet" href="style2.css" type="text/css" />	<!-- //link css  -->
<meta name="viewport" content="width=device-width, initial-scale=1.0" >     <!-- make framework Responsive  -->
  <style>
    .error {color: #FF0000;}
  </style>

</head>
<body class="body">
<header class="mainHeader">  <!-- navigation bar -->
      <!-- <img src="dumbbell.jpg">  -->

      <nav><ul>  		<!-- navigation bar  -->
	<li class="active"><a href="home3.php">Home</a></li>
	<li><a href="about.php">About</a></li>

	<li><a href="contactUs.php">Contact Us</a></li>
	<!-- <li style="float:right"><a href="login5.php">Member log in </a></li> -->
	<!-- <li style="float:right"><a href="register3.php">Register </a></li> -->


      </ul></nav>
  </header>
  <div class="mainContent">
      <div class="content">

	  <article class="topcontent">
	  <form action="" method="post">

	    <br><label for="Username">Username</label>
	    <input type="text" name="Username" id="Username" value="" size="10" maxlength="10" required>
	    <span class="error">  </span>
	      <br><br>

	    <label for="Password">Password</label>
	    <input type="Password" name="Password" id="Password" value="" size="10" maxlength="10" required>
	    <span class="error">  </span>
	    <br><br>

	      <input type="submit" name="submit" value="Login">

	      <a href="#">forgot password?</a>

	    </form>
	  </article>
      </div>
  </div>

  </body>


<?php
define ("DB_SERVER","localhost");
define ("DB_USER","root");
define ("DB_PASSWORD","");
define ("DB_NAME","testGym2");

$conn  = new mysqli (DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME);

//check server connection

if($conn->connect_error){ //check if you have connected to the database
      die("Connection failed:".$con->connect_error);
}

if(isset($_POST['submit'])){
      session_start();
  $Username = trim($_POST['Username']);
  $Password = trim($_POST['Password']);
  $Password =md5($Password);
  //echo "user pass " .$Password;
  $query = "select * from users";
  $result = mysqli_query($conn,$query);

  while($row = mysqli_fetch_assoc($result)){
    // echo $row['Username'].'-> '.$row['Password'].'<br>';
    // echo $Username .' = '.$row['Username'].'-> '.$Password.' = '.$row['Password'].'<br>';
    if($Username == $row["Username"] && $Password == $row["Password"]){
      $_SESSION['Message']= "Welcome ";
      $_SESSION['Username'] = $Username;
      header("location:home5.php");
    }
  }

  $query = "select * from admin";
  $result  = mysqli_query($conn,$query);
  while ($row = mysqli_fetch_assoc($result)){
    // echo $row['Name'].'-> '.$row['Password'].'<br>';
    // echo  '$Username ==> '.$Username.' $Password ==> '. $Password.'<br>';
    // echo $row['Username'].'-> '.$row['Password'].'<br>';
    // if($Username == $row["Name"] && $Password == $row["Password"]){
    echo $Username .' = '.$row['Username'].'-> '.$Password.' = '.$row['Password'].'<br>';
    if($Username == $row["Username"] && $Password == $row["Password"]){
      echo 'You are an admin';
      $_SESSION['Message']="You are an administrator ";
      $_SESSION['Username']=$Username;
      header("location:admin.php");

    }
  }

  echo "<br>Password / Username are incorrect <br> Please try again";

}


function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


?>
