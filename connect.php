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

//now insert the received values into database using defined variables
$sqli = "INSERT INTO users(Fname,Lname,Weight,Username,PhoneNumber,Email,Password) VALUES
('$Fname','$Lname','$Weight','$Username','$PhoneNumber','$Email','$Password')";

if($conn->query($sqli)===TRUE){
    echo "New user created";
}else{
    echo "Error: ".$sqli. "<br>" .$con->error;
}

$conn->close(); //close the connection for security reasons