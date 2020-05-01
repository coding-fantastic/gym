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

session_start();
        $Username=$id=$Service='';
        $Username= $_SESSION['Username'];
        //echo "username is ".$Username."<br>";
        $query = "select * from users";
        $result = mysqli_query($conn,$query);
        while($row=mysqli_fetch_assoc($result)){
	    if($Username==$row['Username']){
		$id=$row['Userid'];
		$Service = $row['Service'];
	    }
        }
        //echo "services are ".$Service. "<br>";

?>


<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8" />     
<link rel="stylesheet" href="style2.css" type="text/css" />	<!-- //link css  -->
<meta name="viewport" content="width=device-width, initial-scale=1.0" >     <!-- make framework Responsive  -->

</head>
<body class="body">

<header class="mainHeader">
      <!-- <img src="dumbbell.jpg">  -->
            
      <nav><ul>  		<!-- navigation bar  -->
	<li class="active"><a href="home4.php">Home</a></li>
	
	 <!--<li><a href="admin.php">Admin </a></li> -->
	
	<li><a href="#">Contact</a></li>
      
      </ul></nav>
       
  </header>

  <form action="" method="post">
    <br>    
    <p> You can add more service <?php echo $Username; ?></p>
    <!-- <input type="text" name="Userid" id="Userid" value="<?php echo $id; ?>" required> -->
    <input type="text" name="Service" id="Service" value="<?php echo $Service; ?>" required>
    <input type="submit" name="addService" value="addService"> 
    
        
  </form>
  
  <div class="mainContent">
    <div class="content">
      <article class="topcontent">
	<h2>Nutrition Counseling</h2>
	<p>
	<b>An apple a day.</b> Our Nutrition experts collaborate with you in your overall fitness and health by working to build a customized nutritional program around your own personal goals. We will help you to reach nutritional success for a healthier, happier you.
	</p>
      </article>
      
      
  
      
      <article class="topcontent">
	<h2>Personal Training</h2>
	<p>
	  <b>Muscle your way towards confidence.</b>Let us help you achieve results through our Private Trainers’ resilient commitment and tireless effort. Our private trainers specialize in teaching practices that will improve your overall health and lead you towards a more sustainable life. They are with you step for step and rep for rep.
	</p>
      </article>
      <article class="topcontent">
	<h2>Acrobats</h2>
	<p>
	  <b>Muscle your way towards confidence.</b>Let us help you achieve results through our Private Trainers’ resilient commitment and tireless effort. Our private trainers specialize in teaching practices that will improve your overall health and lead you towards a more sustainable life. They are with you step for step and rep for rep.
	</p>
	<video width ="20" controls>
	      <source src="VID-20161129-WA0001.mp4" type="video/mp4" width="80%" height="50%">
	</video>
      </article>
    </div>
  </div>
  <aside  class="top-sidebar">     <!-- for sidebar  -->
      <article>				<!-- content for the sidebar -->
	  <h2>currently your subscription are</h2>
	  <p>    <input type="text" name="Service" id="Service" value="<?php echo $Service; ?>" >


	      
	      </p>
	      <!-- <div><a href="connect3.php">Login</a></div>   login button  -->
      </article>
  </aside>
  
  
  
</body>
</html>

<?php 

 //else {
      //echo "Connected successfully <br>";
        
        
        
      // delete a customer from the table
      if (isset($_POST["addService"])){ //check if Delete button is pressed 
	if (!empty($_POST["Userid"])){		//if condition to chech if the form submitted is empty 
	  $customerId=$Service='';	 
	  $customerId =trim($_POST["Userid"]);
	  $Service = trim($_POST["Service"]);
	  echo $customerId;
	  $query = "update users set Service='$Service' where Userid= $customerId ";
	  $result = mysqli_query($conn,$query);
	  
	}
      }
      //echo "service and customerId is ".$Service." " .$customerId;
      //if (isset($_GET["delete"])){
      
      //}
      //delete service
      
      
      
//}
   
  function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
   
?>