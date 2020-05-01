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
  <input type="date" name="beginDate" id="beginDate" placeholder="eg.2016-12-01">
  <input type="date" name="endDate" id="endDate" placeholder="eg.2016-12-31">
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
	if ($beginDate>$endDate){  // make sure date is set correctly 
	  //echo "begindate which  is ".$beginDate."greater than  end date".$endDate."<br>";
	  $temp= $endDate;
	  $endDate = $beginDate;
	  $beginDate= $temp;
	 // echo "we have changed begin date to ".$beginDate." and end date to ".$endDate."<br>";
	}
	
	$query="select * from users where Joined between '$beginDate' and '$endDate'";
	$result = mysqli_query($conn,$query);
	
	//echo var_dump($result).'<br>'; //function to check the variable type and what its content
	
	while ($row = mysqli_fetch_assoc($result)){  //  Fetch a result row as an associative array 
	 //while ($row = mysqli_result($result)){
	  $moneyMade +=$row['Money'];
	  //echo  $row['Userid']." ". $row['Fname']." ".$row['Money'].'<br>';

	}
	
	$beginDateUnixTime = strtotime("$beginDate"); // function to convert user's begin date to unix_timestamp
	$endDateUnixTime = strtotime("$endDate");  // function to convert user's end date to unix_timestamp
	
	//echo date ("$beginDate");
	echo "MONEY MADE FROM ".date('Y-F-d',$beginDateUnixTime ). " TO ".date('Y-F-d',$endDateUnixTime )." is ".  $moneyMade;
		
	$first_day_this_month = date('Y-m-01');  //get the first date of the current month we are on
	$last_day_this_month = date('Y-m-t');   //get's the last date on the month we are on 
	
	//echo "<br>first_day_this_month is  ".$first_day_this_month ." -  - last_day_this_month is ". $last_day_this_month;
	
	//calculate the total money for the month we are currently in eg December 
	
	$query="select * from users where Joined between ' $first_day_this_month ' and ' $last_day_this_month '";
	$result = mysqli_query($conn,$query);
	
	$moneyMade=$thisMonthMoney=0;  
	//echo var_dump($result).'<br>'; //function to check the variable type and what its content
	
	while ($row = mysqli_fetch_assoc($result)){  //  Fetch a result row as an associative array 
	 //while ($row = mysqli_result($result)){
	  $moneyMade +=$row['Money']; 
 	  //echo  $row['Userid']." ". $row['Fname']." ".$row['Money'].'<br>';
 	
	}
		
	echo "<br><hr>MONEY FOR ".date('Y-F',strtotime("$first_day_this_month") ) ." = ".$moneyMade; 
	$thisMonthMoney= $moneyMade;
	
	//calculation of the money for the previous month
	echo "<hr>";
	$first_day_last_month =  date("Y-m-01",strtotime("-1 month"));
	$last_day_last_month = date("Y-m-t",strtotime("-1 month"));
	//echo "<br>".$first_day_last_month ." last day last month ".$last_day_last_month;
	
	$query="select * from users where Joined between ' $first_day_last_month ' and ' $last_day_last_month '";
	$result = mysqli_query($conn,$query);
	
	$moneyMade=$lastMonthMoney=0;  
	//echo var_dump($result).'<br>'; //function to check the variable type and what its content
	
	while ($row = mysqli_fetch_assoc($result)){  //  Fetch a result row as an associative array 
	 //while ($row = mysqli_result($result)){
	  $moneyMade +=$row['Money']; 
 	  //echo  $row['Userid']." ". $row['Fname']." ".$row['Money'].'<br>';
 	
	}
	echo "<br>MONEY FOR ".date('Y-F',strtotime("$first_day_last_month") ) ." = ".$moneyMade; 
	$lastMonthMoney= $moneyMade;
	echo "<hr>";
	
	//calculate the growth of the business
	$total=0;
	$total=$thisMonthMoney-$lastMonthMoney;
	echo "<br>";
	if ($total<0){
	    echo "There is a decrease of ".$total."<br> :(";
	}else if ($total>0){
	    echo "There is an increase of ".$total." ";
	}else {
	    echo "Nothing has changed.".$total;
	}
	//echo "<br>Percentage wise<br> ";
	if($thisMonthMoney!=0){
	$total=round($total/$thisMonthMoney*100) ; echo "<br><hr><br>";
	
	if($total==0){
	  echo "Nothing has changed trying adding new stuff or read customers feedback  ";
	}else if ($total>0){
	  echo "An increase of ".$total."%  :)";
	}else  {
	  echo "Check what is not happening in the gym.".$total." :(";
	}
	 }else{ 
	  echo " <br>We can not compute Percentage with a zero :(";
	  }
      
      }

      function test_input ($data){
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
      }


?>
