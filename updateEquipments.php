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
    <input type="text" name="ID" id="ID" placeholder="Item id " maxlength="6" required><br>
    <input type="text" name="Name" id="Name" placeholder="Name "  ><br>
    <input type="text" name="Price" id="Price" placeholder="Price" maxlength="5" ><br>
    <input type="text" name="Units" id="Units" placeholder="Number of units" maxlength="3" ><br>
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
	
	  //$Userid=$Fname=$Lname=$Weight=$Username=$Money='';
	  $error=0;
	  $ID = trim($_POST["ID"]);
	  $Name= trim($_POST["Name"]);	  
	  $Price =trim($_POST["Price"]); 	  
	  $Units =trim($_POST["Units"]); 
	  
		 if (!preg_match("/^[0-9]*$/",$ID)){
		  $error=1;
		  ?><script>
			alert("ID only takes in numbers");
		  </script><?php
		}else 
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
		if($error==0){
		//check if data is set
		$result = 'select * from equipments';
		$query = mysqli_query($conn,$result);
		while ($row = mysqli_fetch_assoc($query)){
			  if ($ID==$row['ID']){
			      $error=0;
			
			      if(empty($Name)){
			    $Name=$row['Name'];
			  }
			  if(empty($Price)){
			    $Price=$row['Prize'];
			  }
			  if(empty($Units)){
			    $Units=$row['NoOfUnits'];
			  }
			  break;
			  }else{
			    $error=4;
			  }
			  
		    }
		    }
		
		if ($error==0){
	  $query="update  equipments
	   set Name='$Name',Prize='$Price',NoOfUnits='$Units' 
	   where ID='$ID'   ";
	    $result = mysqli_query($conn,$query);
		?><script>
		  alert("Added item successfully");
		</script> <?php  
	    }else if ($error==4){
		?><script>
		    alert("No equipment with that id");
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