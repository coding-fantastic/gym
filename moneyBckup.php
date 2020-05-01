<?php
session_start();

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
<!DOCTYPE html>
<html>  		<!-- a php form to allow me to perform most tasks of the admin -->
<head>
<meta charset="utf-8" />
<link rel="stylesheet" href="style2.css" type="text/css" />	<!-- //link css  -->
<meta name="viewport" content="width=device-width, initial-scale=1.0" >     <!-- make framework Responsive  -->
</head>
<body>

<header class="mainHeader">
      <!-- <img src="dumbbell.jpg">  -->
      <nav><ul>  		<!-- navigation bar  -->
	<li class="active"><a href="home3.php">Home</a></li>
	<li><a href="#">About Us</a></li>

	<li><a href="#">Contact Us</a></li>
	<li><a href="admin.php">Admin Main Page</a></li>
	<li style="float:right"><a href="logout2.php">Log out </a></li>
	<li style="float:right" ><a href=""><?php echo $_SESSION['Message'];echo $_SESSION['Username'] ?></a></li>
      </ul></nav>
        <?php echo "<br>The date today is ". date('Y-m-d')."<br>";// shows the current date ?>
  </header>
  
  <form action="" method="POST">
  
  <br><br>
  <input type="text" name="beginDate" id="beginDate" placeholder="eg.2016-12-01">
  <input type="text" name="endDate" id="endDate" placeholder="eg.2016-12-31">
  <input type="submit" name="moneyMade" value="Money made"> 
  
  </form>

</body>
</html>
<?php
  if (isset($_POST['moneyMade'])){
	$moneyMade=0;
	
	//$query = "select SUM(Money) from users where Joined<='2016-11-01 00:00:00' and Joined>='2016-11-31 00:00:00'";
	//if (!$query) { echo 'MySQL Error: ' . mysqli_error(); exit; }
	$beginDate = trim($_POST["beginDate"]);
	$endDate = trim($_POST["endDate"]);
	
	$query="select * from users where Joined between '$beginDate' and '$endDate'";
	$result = mysqli_query($conn,$query);
	
	//echo var_dump($result).'<br>'; //function to check the variable type and what its content
	
	while ($row = mysqli_fetch_assoc($result)){  //  Fetch a result row as an associative array 
	 //while ($row = mysqli_result($result)){
	  $moneyMade +=$row['Money'];
	  //echo  $row['Userid']." ". $row['Fname']." ".$row['Money'].'<br>';

	}
	
	echo "$beginDate<br>";

	echo date ("$beginDate");
	//echo "Money made from ".date('Y-F-d',$beginDate). " to ".date('Y-F-d',$endDate)." is ".  $moneyMade;
	echo "<br>This month is ". date('F')."<br>";
	$thisMonth = date("now"); //thisMonth will hold the unix_timestamp for this monthe
	$lastMonth = date("-1 month"); //lastMOnthe is for holding unix_timestamp for last month
	echo strtotime("now"),"<br>"; //show current time in unix_timestampp which is in numerical format
	echo strtotime("-1 month"),"<br>"; //show previous month in unix_timestampp which is in numerical format
	echo strtotime('+1 month')."<br>";
	
      }

      function test_input ($data){
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
      }


?>
