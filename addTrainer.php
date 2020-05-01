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
    <input type="text" name="ID" id="ID" placeholder="National ID" required><br>
    <input type="text" name="Phone" id="Phone" placeholder="Phone number"><br>
    <textarea rows='5' cols='20' name='Description' placeholder='write what the employee can coach' ></textarea><br>
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
	
	  
	  $error=0;
	  $Name= trim($_POST["Name"]);	  
	  $Id =trim($_POST["ID"]); 	  
	  $Phone =trim($_POST["Phone"]); 
	  $Description =trim($_POST["Description"]); 
	  
		 if (!preg_match("/^[0-9+]*$/",$Phone)){
		  $error=1;
		  ?><script>
			alert("Phone only takes in numbers");
		  </script><?php
		} else if (!preg_match("/^[0-9]*$/",$Id)){
		  $error=1;
		  ?><script>
			alert(" id only takes numbers");
		  </script> <?php
		}
		
		if ($error==0){
	  $query="insert into  workers (Name,NationalID,PhoneNumber,Description) value ('$Name','$Id','$Phone','$Description')";  // avoid alteration of joined date 
	    $result = mysqli_query($conn,$query);
		?><script>
		  alert("Added an employee successfully");
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