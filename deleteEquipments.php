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
    <input type="text" name="ID" id="ID" placeholder="Equipment Id" required><br>
    
    <input type="submit" name="Delete" value="Delete"> <br>         
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
	
	  $ID='';
	  $error=0;
	  $ID= trim($_POST["ID"]);	  
		 if (!preg_match("/^[0-9]*$/",$ID)){
		  $error=1;
		  ?><script>
			alert("Equipment id  only takes in numbers");
		  </script><?php
		} 
		
		if ($error==0){
	  $query="delete from  equipments where ID='$ID'" ;  // avoid alteration of joined date 
	    $result = mysqli_query($conn,$query);
		?><script>
		  alert("Deleted item successfully");
		</script> <?php  
	    } else {
		?><script>
		  alert("No changes were made");
		  </script><?php
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