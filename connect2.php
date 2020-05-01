<?php

//create server and database connection constants

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
$Fname=trim($_POST['Fname']);
$Lname=trim($_POST['Lname']);
$Weight=trim($_POST['Weight']);
$Username = trim($_POST['Username']);
$PhoneNumber = trim ($_POST['PhoneNumber']);
$Email=trim($_POST['Email']);
$Password=trim($_POST['Password']);

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

include 'register2.php';   //take the errorCheck variable from register2.php to show if there is any error
if ($errorCheck==1){
    echo "<br> There is an error in your form.<br> Try again. <br> ";
    die();
} else {

while ($row = mysqli_fetch_assoc($result)){
if ($Username == $row["Username"]){
 echo $row["Username"]." exists  please try another username ";
 die();

}
}
}


//echo "<br>Userid-> ".$row["Userid"]." Fname-> ".$row["Fname"]."Username->".$row["Username"]."<br>";
mysqli_free_result($result);


//now insert the received values into database using defined variables
$sqli = "INSERT INTO users(Fname,Lname,Weight,Username,PhoneNumber,Email,Password) VALUES
('$Fname','$Lname','$Weight','$Username','$PhoneNumber','$Email',md5('$Password'))";
 // header("location:register2.php");


if($conn->query($sqli)===TRUE){
    echo " successfully registered <br>";
}else{
    echo "Error: ".$sqli. "<br>" .$con->error;
}


$conn->close(); //close the connection for security reasons
