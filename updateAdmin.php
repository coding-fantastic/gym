
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
      $status=$passErr='';
      if (isset($_POST["Add"])){ 
	
	  
	  $error=0;
	  $Adminid = trim($_POST["Adminid"]);
	  $Name= trim($_POST["Name"]);	  
	  $Password =trim($_POST["Password"]);
	  $rePassword =trim($_POST["rePassword"]);
	  
	  
		 if ($Password!=$rePassword){
		  $error=1;
		  ?><script>
			alert("Your password do not  match");
		  </script><?php
		}
		if (strlen($Password)<6){
		  $error=1;
			 
			$passErr=" too short";
		  
		}
		
		$result = 'select * from admin';
		$query = mysqli_query($conn,$result);
		while ($row = mysqli_fetch_assoc($query)){
			  if ($Adminid!=$row['Adminid']){
			      $error=4;
			  }
		    }
		
		
		if ($error==0){
		$Password = md5($Password);
		//echo  "password going into database like this ".$Password;
		$result = 'select * from admin';
		$query = mysqli_query($conn,$result);
		    // check if no username has been entered then  enter a pick from databse 
		    
		    if(empty($Name)){
		    while ($row = mysqli_fetch_assoc($query)){
			  if ($Adminid==$row['Adminid']){
			      $Name = $row['Name'];
			  }
		    }
		    }
		    
		$query="update admin 
		set Name='$Name', Password='$Password' 
		where Adminid='$Adminid'";  // avoid alteration of joined date 
		 $result = mysqli_query($conn,$query);
		?><script>
		  alert("changes were made successfully");
		</script> <?php  
	    } else if ($error==4) {
		?><script>
		  alert("There is no Admin with that id ");
		  </script> <?php
	    }	
	    
	    else {
		$status = "No changes were made";
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

<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8" />     
<link rel="stylesheet" href="style2.css" type="text/css" />	<!-- //link css  -->
<meta name="viewport" content="width=device-width, initial-scale=1.0" >     <!-- make framework Responsive  -->

    <style>
	.error{color:#FF0000;}
    </style>
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
    <input type="text" name="Adminid" id="Adminid" placeholder=" Admin id " maxlength="6" required><br><br>
    <input type="text" name="Name" id="Name" placeholder="Name " maxlength="10" ><br><br>
    <input type="password" name="Password" id="Password" placeholder="Password" maxlength="15" required>
    <span class="error"><?php echo $passErr ?> </span><br><br>
    <input type="password" name="rePassword" id="rePassword" placeholder="Password Again" maxlength="15" required><br>
    
    <span class="error"><?php echo $status ?> </span><br><br><br>
    
    <input type="submit" name="Add" value="Add"> <br> 
        
  </form>
  
  
  
</body>
</html>

