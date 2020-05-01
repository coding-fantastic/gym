<?php
if (isset($_POST['name'])=== true && empty($_POST['name']) === false ){

  require'../db/connect.php';
  
//echo 'Content';
$nameForQuery = trim($_POST['name']);
//echo $nameForQuery;
  $query = "select * from users where Username ='$nameForQuery'";
  $result = mysqli_query ($conn,$query);
  $end=0;
  while($row = mysqli_fetch_assoc($result)){
	if ($nameForQuery==$row['Username']){
		echo $row['Userid']." ".$row['Fname']." ".$row['Money'];
		$end=1;
	}
  }
	if ($end==0){
	echo 'not found';
	}
  }