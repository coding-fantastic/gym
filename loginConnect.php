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
$Username = trim($_POST['Username']);
$Password=trim($_POST['Password']);

$query="select * from users ";
$result = mysqli_query($conn,$query);


if ($errorChecker!=1){

  while ($row = mysqli_fetch_assoc($result)){
if ($Username == $row["Username"] && $Password == $row["Password"]){
 echo "Welcome ". $row["Username"];

}
}

}else {
include 'login.php';
//include 'register2.php';   //take the errorCheck variable from register2.php to show if there is any error
//if ($errorChecker==1){
    echo "<br> There is an error in your form.<br> Try again. <br> ";
    die();
} /*else {   
  
  while ($row = mysqli_fetch_assoc($result)){
if ($Username == $row["Username"] && $Password == $row["Password"]){
 echo "Welcome ". $row["Username"];
 }  
 }
 } */