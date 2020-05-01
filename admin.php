<?php
session_start();
?>
<!DOCTYPE html>
<html>  		<!-- a php form to allow me to perform most tasks of the admin -->
<head>
<meta charset="utf-8" />
<link rel="stylesheet" href="style2.css" type="text/css" />	<!-- //link css  -->
<meta name="viewport" content="width=device-width, initial-scale=1.0" >     <!-- make framework Responsive  -->

<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->


  <script> // javascript to show moving time
function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('txt').innerHTML =
    h + ":" + m + ":" + s;
    var t = setTimeout(startTime, 500);
}
function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}
</script>

<style>
/* Tooltip container */
.tooltip {
    position: relative;
    display: inline-block;

}

/* Tooltip text */
.tooltip .tooltiptext {
    visibility: hidden;
    width: 120px;
    background-color: #cf5c3f;
    color: #fff;
    text-align: center;
    padding: 5px 0;
    border-radius: 6px;

    /* Position the tooltip text - see examples below! */
    position: absolute;
    z-index: 1;
}

/* Show the tooltip text when you mouse over the tooltip container */
.tooltip:hover .tooltiptext {
    visibility: visible;
}
</style>

<style>
/* dropdown */

li a:hover, .dropdown:hover .dropbtn {
    background-color: #cf5c3f;
}

li.dropdown {
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #b3b3b3;
    min-width: auto;
    box-shadow: 0px 8px 16px 0px black;
}

/*.dropdown-content a {
    color: black;
    padding: auto;
    text-decoration: none;
    display: block;
    text-align: left;
}*/

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
    display: block;
}
</style>

</head>

<body  onload="startTime()" >
<!-- navigation bar with a sign up and login icons
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
	<ul class="dropdown-menu">
	  <li><a href="#">Page 1-1</a></li>
	  <li><a href="#">Page 1-2</a></li>
	  <li><a href="#">Page 1-3</a></li>
	</ul>
      </li>
       <li><a href="#">Page 2 </a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
	  <li><a href="#"><span class="glyphicon glyphicon-user"></span>Sign Up</a></li>
	  <li><a href="#"><span class="glyphicon glyphicon-log-in"></span>Login</a></li>
	</ul>
      </div>
  </nav>
  -->
<!-- <p> <h1> Traverse the admin section with the buttons below : </h1></p> -->

<header class="mainHeader">
      <!-- <img src="dumbbell.jpg">  -->

      <nav><ul>  		<!-- navigation bar  -->
	<li class="active"><a href="home4.php">Home</a></li>


	<!--<li><a href="register3.php">Register a user</a></li> -->

	<li class="dropdown">
	  <a href="#">Register</a>
	  <div class="dropdown-content">
	    <a style="display: block;" href="addEquipments.php"> Equipments</a>
	    <a style="display: block;" href="addTrainer.php">Trainer</a>
	    <a style="display: block;" href="addAdmin.php">Administrator</a>
	    <a style="display: block;" href="register3.php">User</a>
	  </div>
	</li>
	<li class="dropdown">
	  <a href="#">Delete</a>
	  <div class="dropdown-content">
	    <a style="display: block;" href="deleteEquipments.php"> Equipments</a>
	    <a style="display: block;" href="deleteTrainer.php"> Trainer</a>
	    <a style="display: block;" href="deleteAdmin.php"> Administrator</a>
	    <a style="display: block;" href="deleteUser.php"> user</a>
	</li>

	<li class="dropdown">
	    <a href="#">Update</a>
	    <div class="dropdown-content">
	    <a style="display: block;" href="updateEquipments.php"> Equipments</a>
	    <a style="display: block;" href="updateTrainer.php"> Trainer</a>
	    <a style="display: block;" href="updateAdmin.php"> Administrator</a>
	    <a style="display: block;" href="updateUser.php"> user</a>
	</li>

	<li><a href="money.php">Accounts</a></li>
	<li><a href="sendMail.php">Email</a></li>
	<li style="float:right"><a href="logout2.php">Log out </a></li>
	<li><a href=""><?php echo $_SESSION['Username'];echo " ".$_SESSION['Message']."." ?></a></li>
      </ul></nav>
        <?php echo "<br>The date today is ". date('Y-m-d')."<br>";// shows the current date ?>
        <div id="txt"> </div>
  </header>

  <div style="float:right;" >
  <input type="text" id="name" placeholder="Username">
   <input type="submit" id="name-submit" value="Search">
   <div id="name-data"></div>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="js/global.js"></script>
   </div>
<!--<div><a href="home3.php">Take me home </a> </div> -->
<form action="" method="post">

  <br><br>

  <input type="submit" name="customers" value="customers">

  <input type="submit" name="workers" value="Workers">

   <div class="tooltip">
  <input type="submit" name="equipments" value="Equipments">
    <span class="tooltiptext">Equipments</span>
   </div>
  <!--<input type="submit" name="sum" value="sum of equipments"> -->

  <!--<div class="tooltip">
  <input type="submit" name="moneyMade" value="Check money made in a month">
    <span class="tooltiptext">show money</span>
   </div>  -->

   <div class="tooltip">
  <input type="submit" name="Comments" value="Comments">
  <span class="tooltiptext">show comments</span>
   </div>



</form>

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


if (isset($_POST['customers'])){ //print out all the customers

      //define variables and set to empty values
      $output="";
      echo "<article class='topcontent'>";

      //get the total number of rows
      $query="select * from users ";
    $result = mysqli_query($conn,$query);
      $totalRow = 0;  //show the total number of record on table
       while ($row = mysqli_fetch_assoc($result)){  /*  Fetch a result row as an associative array */
	   $totalRow++;
	}

	/*//pagination logic
	$page=trim($_GET["page"]);
	echo "$page";
	if ( $page="" || $page=="1"){
	  $page1=0;
	}else{
	  $page1= ($page * 5 );
	  echo "<br> page1 is $page1";
	}

      $query="select * from users limit $page1,5 ";  //query for limit  where if page1 is 0 start output from userid 1 ;;; 5 is the limit
    $result = mysqli_query($conn,$query);   */

	$query="select * from users  ";  //query for limit  where if page1 is 0 start output from userid 1 ;;; 5 is the limit
    $result = mysqli_query($conn,$query);

    echo "<div style='overflow-x:auto;'>"; //enable horizontal bar at the end if screen is small
	// echo "Registered Customers are <b>".$totalRow."</b>";

	echo "<table><tr>

	<caption><b>Customers Available</b></caption>
	  <th>ID</th><th>Fname</th><th>Lname</th><th>Weight</th><th>Username</th><th>Money</th><th>Phone Number</th><th>Email</th><th>Joined</th></tr>";
      while ($row = mysqli_fetch_assoc($result)){  /*  Fetch a result row as an associative array */

	      // echo "<tr><td>". $row['Userid']."</td><td>". $row['Fname']." </td><td>". $row['Lname']." </td><td> ".$row['Weight']." </td><td> ".$row['Username']." </td><td>  ".$row['Money']."</td><td>  ".$row['PhoneNumber']."</td><td>  ".$row['Email']."</td><td>  ".$row['Joined']."</td><td></tr>";
        echo "<tr><td>". $row['ID']."</td><td>". $row['Fname']." </td><td>". $row['Lname']." </td><td> ".$row['Weight']." </td><td> ".$row['Username']." </td><td>  ".$row['Money']."</td><td>  ".$row['PhoneNumber']."</td><td>  ".$row['Email'].
        "</td><td>".$row['Date_Time']."</td><td></tr>";
	}

	  echo " </table>";
	  echo "</div>";
	  /*$a=ceil($totalRow/5);  //ceil rounds of the nearest whole
	  for ($b=1;$b<=$a;$b++){
	      ?><a href="admin.php?page=<?php echo $b; ?>"><?php echo $b." "; ?></a> <?php
	  }   */
	  ?> <a href="paging.php">##</a>  <?php
	  echo "</article>";


    }

if (isset($_POST['workers'])){

      //define variables and set to empty values
      $output="";
      $rowCount=0;
      echo "<article class='topcontent'>";
      $query="select * from workers ";
    $result = mysqli_query($conn,$query);
	  echo "<div style='overflow-x:auto;'>"; //enable horizontal bar at the end if screen is small
	  echo "<table><tr>
	  <th>ID</th><th>Name</th><th>National ID</th><th>Phone Number</th><th>Personal Trainer for</th></tr>";
      while ($row = mysqli_fetch_assoc($result)){  /*  Fetch a result row as an associative array */

	      echo "<tr><td>". $row['ID']."</td><td>". $row['Name']." </td><td> ".$row['NationalID']." </td><td> ".$row['PhoneNumber']." </td><td>  ".$row['Description']."</td><td>";
	      $rowCount= $rowCount+1;
	}
	  echo "<caption><b>Workers Available ".$rowCount."</b></caption>";
	  echo "</table>";
	  echo "</div>";
	  echo "</article>";

    }

    if (isset($_POST['equipments'])){

      $query="select * from equipments ";
    $result = mysqli_query($conn,$query);

	  echo "<article class='topcontent'>";  //add a container of topcontent, topcontent is in the css section
	  //echo "<table class='table table-stripped'>";
	  $rowCount=0;
	  echo "<div style='overflow-x:auto;'>"; //enable horizontal bar at the end if screen is small
	  echo "<table>
	  <tr>
	  <th>ID</th><th>Name</th><th>Price</th><th>No. of units</th> </tr> </thead>";
      while ($row = mysqli_fetch_assoc($result)){  /*  Fetch a result row as an associative array */

	  //echo  "<br>". $row['ID']."<br> Name is ->  ".$row['Name']." Number of available units is -> ".$row['No. of units']." Prize of each unit ->  ".$row['Prize']."<br>";
	    echo "<tr>
	    <td>".$row['ID']."</td>
	    <td>".$row['Name']."</td>
	    <td>".$row['Prize']."</td>
	    <td>".$row['NoOfUnits']."</td>
	    </tr>  ";
	    $rowCount=$rowCount+1;

	}
	   echo "<caption><b>Equipments Available ".$rowCount."</b></caption> ";
	   echo "</table>";
	   echo "</div>";
	   echo "</article>";


    }

    if (isset($_POST['sum'])){

	$query="select * from equipments ";
	$result = mysqli_query($conn,$query);
	$sum=0;

	while ($row = mysqli_fetch_assoc($result)){  /*  Fetch a result row as an associative array */

	$sum +=$row['Prize'];


	}
      echo "<br>The total sum of all the equipments is: ". $sum;

    }

    /*if (isset($_POST['moneyMade'])){
	$moneyMade=0;
	$month = 'January';

	$month_start = strtotime("first day of {$month}");
	$month_end = strtotime("last day of {$month}");

	$query = "SELECT SUM(`Money`) FROM `equipments` WHERE UNIX_TIMESTAMP(`Joined`) >= {$month_start} AND UNIX_TIMESTAMP(`Joined`) <= {$month_end}";
	//$query="select * from equipments ";
	$result = mysqli_query($conn,$query);
	//echo var_dump ($result);

	while ($row = mysqli_fetch_assoc($result)){  //  Fetch a result row as an associative array
	var_dump($row);
	$moneyMade +=$row['Money'];
	  var_dump($query);

	}

	echo "Money made for this month is ". $moneyMade;

      } */

      if (isset($_POST['moneyMade'])){
	$moneyMade=0;

	//$query = "select SUM(Money) from users where Joined<='2016-11-01 00:00:00' and Joined>='2016-11-31 00:00:00'";
	//if (!$query) { echo 'MySQL Error: ' . mysqli_error(); exit; }
	$beginDate="2016-12-01";
	$query="select * from users where Joined between '{$beginDate}' and '2016-12-31'";
	$result = mysqli_query($conn,$query);

	//echo var_dump($result).'<br>'; //function to check the variable type and what its content

	while ($row = mysqli_fetch_assoc($result)){  //  Fetch a result row as an associative array
	 //while ($row = mysqli_result($result)){
	  $moneyMade +=$row['Money'];
	  //echo  $row['Userid']." ". $row['Fname']." ".$row['Money'].'<br>';

	}

	echo "Money made for this month is ". $moneyMade;

      }
      //show all the comments
      if (isset($_POST['Comments'])){ //print out all the customers

      //define variables and set to empty values
      $output="";
      $rowCount=0;
      echo "<article class='topcontent'>";
      $query="select * from comments ";
    $result = mysqli_query($conn,$query);
	 echo "<div style='overflow-x:auto;'>"; //enable horizontal bar at the end if screen is small
	 echo "<table>
	  <tr>
	  <th>Date</th><th>Name</th><th>Email</th><th>Comment(s)</th></tr>";
      while ($row = mysqli_fetch_assoc($result)){  /*  Fetch a result row as an associative array */

	      echo "<tr><td>". $row['Date']."</td><td>". $row['Name']."</td><td>". $row['Email']." </td><td>". $row['Comment']." </td></tr>";
	      //echo "<br>";
	      $rowCount=$rowCount+1;
	}
	  echo "<caption><b>Users Comments are  ".$rowCount."</b></caption> ";
	  echo "</table>";
	  echo "</div>";
	  echo "</article>";

    }

      // will come here
?>


</body>
</html>
