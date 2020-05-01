

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
    <input type="text" name="Userid" id="Userid" placeholder="Enter the customer's id " required>
    <input type="submit" name="deleteCustomer" value="Delete"> 
    
        
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
      if (isset($_POST["deleteCustomer"])){ //check if Delete button is pressed 
	if (!empty($_POST["Userid"])){		//if condition to chech if the form submitted is empty 
	  $customerId='';	  $customerId =trim($_POST["Userid"]);
	  $error=1; 
	}
	  $query="select  * from admin";
	  $result= mysqli_query($conn,$query);
	  
	  while($row = mysqli_fetch_assoc($result)){
	      if ($customerId==$row['Adminid']){
		  $error=0;
	      }
	  }
	  
		if($error==0){
		
	$query = "Delete from admin where Adminid='$customerId'";
	  $result = mysqli_query($conn,$query);
	  ?> <script> 
		alert("Deleted successfully");
	  </script> <?php
	  }else {
	  ?> <script> 
		alert("No changes were made");
	  </script> <?php
	  
	  }
	
      }    
}
   
  function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
   
?>