<html>
<head>
<style>
p.insert {border-style: insert;}

</style>
</head>
<body>
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
     // echo "Connected successfully <br>";
}

    

if (isset($_POST['submit'])){
      
      $query="select * from equipments ";
    $result = mysqli_query($conn,$query);
	  
      while ($row = mysqli_fetch_assoc($result)){  /*  Fetch a result row as an associative array */
	  
	  echo "<br>". $row['S/no']."   ".$row['Name']."   ".$row['No. of units']."   ".$row['Prize']."<br>";
	      
	  
	}
    

    }



?>

<form action="" method="post">
<p class="insert"> <input type="submit" name="submit" value="Check the equipments Available"> </p>
</form>

</body>
</html>