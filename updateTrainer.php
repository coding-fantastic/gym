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
    <input type="text" name="ID" id="ID" placeholder=" ID " maxlength="5" required><br>
    <input type="text" name="Name" id="Name" placeholder="Name "  maxlength="10" required><br>
    <input type="text" name="NID" id="NID" placeholder="National ID" minlength="3" maxlength="6" required><br>
    <input type="text" name="Phone" id="Phone" placeholder="Phone number" maxlength="12" ><br>
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
	  $ID = test_input($_POST["ID"]);
	  $Name= trim($_POST["Name"]);	  
	  $Id =trim($_POST["NID"]); 	  
	  $Phone =trim($_POST["Phone"]); 
	  $Description =trim($_POST["Description"]); 
	  
		 if (!preg_match("/^[0-9+]*$/",$ID)){
		  $error=1;
		  ?><script>
			alert("ID only takes in numbers");
		  </script><?php
		} else
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
		
		
		if($error==0){
		  $result = 'select * from workers';
		  $query = mysqli_query($conn,$result);
		  while ($row = mysqli_fetch_assoc($query)){
			if ($ID==$row['ID']){
				$error=0;
				
				if(empty($ID)){
			    $ID=$row['ID'];
			  }
			  if(empty($Name)){
			    $Name=$row['Name'];
			  }
			  if(empty($Id)){
			    $Id=$row['NationalID'];
			  }
			  if(empty($Phone)){
			    $Phone=$row['PhoneNumber'];
			  }
			  if(empty($Description)){
			    $Description=$row['Description'];
			  }
				break;
			}else {
			    $error=4;
			}
		  }
		}
		
		if ($error==0){
	  $query="update workers
	  set Name='$Name',NationalID='$Id',PhoneNumber='$Phone',Description='$Description' 
	  where ID='$ID'";  
	    $result = mysqli_query($conn,$query);
		?><script>
		  alert("table modified");
		</script> <?php  
	    }else if ($error==4){
		 ?><script>
		    alert("id not found");
		 </script> <?php
	    }else 
	    
	    {
		?><script>
		  alert("nothing modified");
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