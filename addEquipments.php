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
    <input type="text" name="Name" id="Name" placeholder="Name " required><br>
    <input type="text" name="Price" id="Price" placeholder="Price" required><br>
    <input type="text" name="Units" id="Units" placeholder="Number of units" required><br>
    <input type="submit" name="Add" value="Add"> <br> 
    
    
        
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
      //echo "Connected successfully <br>
      if (isset($_POST["Add"])){ 
	
	  $Userid=$Fname=$Lname=$Weight=$Username=$Money='';
	  $error=0;
	  $Name= trim($_POST["Name"]);	  
	  $Price =trim($_POST["Price"]); 	  
	  $Units =trim($_POST["Units"]); 
	  
		 if (!preg_match("/^[0-9]*$/",$Price)){
		  $error=1;
		  ?><script>
			alert("Price only takes in numbers");
		  </script><?php
		} else if (!preg_match("/^[0-9]*$/",$Units)){
		  $error=1;
		  ?><script>
			alert(" units only takes numbers");
		  </script> <?php
		}
		
		if ($error==0){
	  $query="insert into  equipments (Name,Prize,NoOfUnits) value ('$Name','$Price','$Units')";  // avoid alteration of joined date 
	    $result = mysqli_query($conn,$query);
		?><script>
		  alert("Added item successfully");
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