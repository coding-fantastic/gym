
<!DOCTYPE HTML>

<html><head>

<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
<link rel="stylesheet" href="style2.css" type="text/css" />

</head>
<body>

    

    <!--<div> <a href="home3.php"> Take me to home</a> </div>  -->
</body>

</html>
<?php

//create server and database connection constants

define ("DB_SERVER","localhost");
define ("DB_USER","root");
define ("DB_PASSWORD","");
define ("DB_NAME","testGym2");

$conn  = new mysqli (DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME);

//check server connection

if($conn->connect_error){
      die("Connection failed:".$conn->connect_error);
} else {
	//echo "Connected successfully <br>";
}

include 'register3.php';   //take the errorCheck variable from register2.php to show if there is any error
//receive values from user form and trim white spaces
if (isset($_POST['Register'])){
$Fname=trim($_POST['Fname']);
$Lname=trim($_POST['Lname']);
$Weight=trim($_POST['Weight']);
$Username = trim($_POST['Username']);
$Money = trim($_POST['Money']);
$PhoneNumber = trim ($_POST['PhoneNumber']);
$Email=trim($_POST['Email']);
$Password=trim($_POST['Password']);
$Gender=trim($_POST['Gender']);
$Service= trim($_POST['Service']);
}

$query = "select * from users  ";
$result = mysqli_query($conn,$query);

/* associative array */
//$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

/*while ($row = mysqli_fetch_assoc($result)){
    printf ("Userid -> %d Fname-> %s Lname-> %s Weight-> %d Username-> %s
    PhoneNumber-> %d Email->%s Password->%s Joined->%d <br>"
    ,$row["Userid"],$row["Fname"],$row["Lname"],$row["Weight"],
    $row["Username"],$row["PhoneNumber"],$row["Email"],$row["Password"],
    $row["Joined"]);
    
}*/


if ($errorCheck==1){
    echo "<br> There is an error in your form.<br> Please try again. <br> ";
    die();
} else {   

while ($row = mysqli_fetch_assoc($result)){
if ($Username == $row["Username"]){
 echo $row["Username"]." exists.<br>  Please try another username ";
 die();
 
}
}
}


//echo "<br>Userid-> ".$row["Userid"]." Fname-> ".$row["Fname"]."Username->".$row["Username"]."<br>";
mysqli_free_result($result);


//now insert the received values into database using defined variables
$sqli = "INSERT INTO users(Fname,Lname,Weight,Username,Money,PhoneNumber,Service,Gender,Email,Password) VALUES
('$Fname','$Lname','$Weight','$Username','$Money','$PhoneNumber','$Service','$Gender','$Email',md5('$Password'))";
 // header("location:register2.php");


if($conn->query($sqli)===TRUE){
    echo " successfully registered <br>";
    /*echo "<div class='container'>";
    echo "<div class='alert alert-success alert-dismissable fade in'>";
    echo " <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> ";
    echo "<strong> successfully registered </strong>";
    echo "</div>";*/
    
}else{
    echo "Error: ".$sqli. "<br>" .$con->error;
}


$conn->close(); //close the connection for security reasons