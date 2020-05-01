

<!DOCTYPE HTML>
<html>
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
	<li><a href="admin.php"> Admin Panel</a></li>
	
      </ul></nav>
       
  </header>


  
  
  
</body>
</html>

<?php 

   define ("DB_SERVER","localhost");
define ("DB_USER","root");
define ("DB_PASSWORD","");
define ("DB_NAME","testGym2");
$conn  = new mysqli (DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME);
	  //check server connection
	  if($conn->connect_error){
	      die("Connection failed:".$conn->connect_error);
    }
    $page=1;
    $page=$_GET['page'];
    
    if ($page=='' || $page=='1'){
	  $page1=0;
    }else {
	  $page1= ($page * 5)- 5;
    }
    
    
   $query = "select * from users limit $page1,5";
   $result = mysqli_query($conn,$query);
   echo "<article class='topcontent'>";
   echo "<div style='overflow-x:auto;'>"; //enable horizontal bar at the end if screen is small
	// echo "Registered Customers are <b>".$totalRow."</b>";
	
	echo "<table><tr> 
	
	<caption><b>Customers Available</b></caption>
	  <th>ID</th><th>Fname</th><th>Lname</th><th>Weight</th><th>Username</th><th>Money</th><th>Phone Number</th><th>Email</th><th>Joined</th></tr>";
  
   
   while ($row= mysqli_fetch_assoc($result)){
	 echo "<tr><td>". $row['Userid']."</td><td>". $row['Fname']." </td><td>". $row['Lname']." </td><td> ".$row['Weight']." </td><td> ".$row['Username']." </td><td>  ".$row['Money']."</td><td>  ".$row['PhoneNumber']."</td><td>  ".$row['Email']."</td><td>  ".$row['Joined']."</td><td></tr>";
	}
	  echo " </table>";
	  echo "</div>";
	  /*$a=ceil($totalRow/5);  //ceil rounds of the nearest whole
	  for ($b=1;$b<=$a;$b++){
	      ?><a href="admin.php?page=<?php echo $b; ?>"><?php echo $b." "; ?></a> <?php
	  }   */
	 
	  echo "</article>";
   
   $query = "select * from users ";
   $result = mysqli_query($conn,$query);
   
   $rowNum = mysqli_num_rows($result);
   //echo $rowNum.'<br>';
   $a = $rowNum/5;
   //echo $a.'<br>';
   $a = ceil($a);
   echo "<br><br>";
   for ($b=1;$b<=$a;$b++){
	   ?><a href="paging.php?page=<?php echo $b; ?>" style="text-decoration:none "><?php echo $b." "; ?></a> <?php
   }

   
  function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
   
?>
