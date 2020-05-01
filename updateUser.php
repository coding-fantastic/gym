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

  <form action="" method="post">
    <br>
    <input type="text" name="Userid" id="Userid" placeholder="Enter the customer's id " required><br>
    <input type="text" name="Fname" id="Fname" placeholder="first name" required><br>
    <input type="text" name="Lname" id="Lname" placeholder="Last name" required><br>
    <input type="text" name="Weight" id="Weight" placeholder="Weight" required><br>
    <input type="text" name="Username" id="Username" placeholder="Username" required><br>
    <input type="text" name="Money" id="Money" placeholder="Money" required><br>
    <input type="text" name="PhoneNumber" id="PhoneNumber" placeholder="Phone number" required><br>
    <input type="text" name="Service" id="Service" placeholder="Service" required><br>
    <input type="submit" name="updateCustomer" value="Update"> <br> 
    
    
        
  </form>
  
  
  
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
} else {
      //echo "Connected successfully <br>";
        
           
      // delete a customer from the table
      if (isset($_POST["updateCustomer"])){ //check if Delete button is pressed 
	
	  $Userid=$Fname=$Lname=$Weight=$Username=$Money='';
	  $updaterr=1;
	  $Userid= trim($_POST["Userid"]);	  
	  $Fname =trim($_POST["Fname"]); 	  
	  $Lname =trim($_POST["Lname"]); 
	  $Weight =trim($_POST["Weight"]);	  	  
	  $Username =trim($_POST["Username"]);	  
	  $Money =trim($_POST["Money"]);
	  $Phone =trim($_POST["PhoneNumber"]);
	  $Service=trim($_POST["Service"]);
	  
	    $query="select * from users ";  // avoid alteration of joined date 
	    $Joined='';
	    $result = mysqli_query($conn,$query);
	    while ($row = mysqli_fetch_assoc($result)){
		if ($row['Userid']==$Userid){
		    $Joined = $row['Joined'];
		    //echo 'joined before update is ' .$Joined.'<br>';
		    $updaterr=0;
		  }
		  
	    }
	    //echo "updaterr is " .$updaterr."<br>";
	    if ($updaterr!=1){
	    $query = "Update users
	      set Fname='$Fname',Lname='$Lname',Weight='$Weight',Username='$Username',Money='$Money',PhoneNumber='$Phone',Service='$Service',Joined='$Joined'
	      where Userid='$Userid'";
	    $result = mysqli_query($conn,$query);
	    ?><script>
		alert(" tabled modified ");
	      
	    </script><?php
	    
	    }else {
	      echo '<br>There is no customer with that id. Please try again <br>';
	    }
	    
	          
      
      }
      
      /*if (isset($_POST['customers'])){ //print out all the customers
      
      //define variables and set to empty values
      $output="";
      echo "<article class='topcontent'>";
      $query="select * from users ";
    $result = mysqli_query($conn,$query);
	  echo "<table><tr><th>ID</th><th>Fname</th><th>Lname</th><th>Weight</th><th>Username</th><th>Money</th><th>Phone Number</th><th>Email</th><th>Password</th><th>Joined</th></tr>";
      while ($row = mysqli_fetch_assoc($result)){  //  Fetch a result row as an associative array   
	      echo "<tr><td>". $row['Userid']."</td><td>". $row['Fname']." </td><td>". $row['Lname']." </td><td> ".$row['Weight']." </td><td> ".$row['Username']." </td><td>  ".$row['Money']."</td><td>  ".$row['PhoneNumber']."</td><td>  ".$row['Email']."</td><td>  ".$row['Password']."</td><td>  ".$row['Joined']."</td><td>";     
	      echo "<br>";
	}
	  echo "</table>";
	  echo "</article>";

    }*/
      
}
   
  function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
   
?>