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
}
?>