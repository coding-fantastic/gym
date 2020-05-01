

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
	<li><a href="#">About</a></li>
	
	<li><a href="#">Contact</a></li>
      
      </ul></nav>
       
  </header>

   <br>
   <br><input type="text" id="name" placeholder="Username">
   <input type="submit" id="name-submit" value="Search">
   <div id="name-data"></div>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="js/global.js"></script>
  
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
	  $query = "Delete from users where Userid='$customerId'";
	  $result = mysqli_query($conn,$query);
	  
	}
      }
      
      
      //edit a user
      
}
   
  function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
   
?>