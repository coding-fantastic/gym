<!DOCTYPE html>
<html>
<head>
<style>
	table{
		width: 100%;
		border-collapse: collapse;
	}
	table, td, th {
		border: 1px solid black;
		padding: 5px;
	}
	
	th {text-align: left;}
</style>
</head>
<body>
<?php
	$q = intval($_GET['q']);
	define ("DB_SERVER","localhost");
define ("DB_USER","root");
define ("DB_PASSWORD","");
define ("DB_NAME","testGym2");

$conn  = new mysqli (DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME);

//check server connection

if($conn->connect_error){
      die("Connection failed:".$conn->connect_error);
 }
	$query = "select * from users";
	$result=mysqli_fetch_assoc($conn,$query);
	echo "<table>
	<tr>
	<th>Customer Id</th> <th>F_Name</th> <th>L_Name</th> <th>Weight</th> <th>Phone Number</th> <th>Service</th>
	</tr>";
	while ($row = mysqli_fetch_assoc($result)){
		echo "<tr>";
		echo "<td>".$row['Userid']. "</td>";
		echo "<td>".$row['Fname']. "</td>";
		echo "<td>".$row['Lname']. "</td>";
		echo "<td>".$row['Weight']. "</td>";
		echo "<td>".$row['Money']. "</td>";
		echo "<td>".$row['PhoneNumber']. "</td>";
		echo "<td>".$row['Service']. "</td>";
		echo "</tr>";
	}
	echo "</table>";
	mysqli_close($conn);
?>
</body>
</html>