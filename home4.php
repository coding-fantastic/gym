<?php
  session_start();


  ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <title>The Gym </title>
  <meta charset="utf-8" />     
  
  <link rel="stylesheet" href="style2.css" type="text/css" />   <!-- //link css  -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" >     <!-- make framework Responsive  -->

</head>

<body class="body">

  <header class="mainHeader">
      <!-- <img src="dumbbell.jpg">  -->
       
      <nav><ul>  		<!-- navigation bar  -->
	<li class="active"><a href="home3.php">Home</a></li>
	<li><a href="admin.php">Admin </a></li> 
	<!-- <li><a href="#">Contact Us</a></li> -->
	<li><a href="service.php">services</a></li>
	<!-- <li style="float:right"><a href="#">Member log in </a></li>
	<li style="float:right"><a href="#">Sign up </a></li> -->	
	<li style="float:right"><a href="logout2.php">Log out </a></li>
	<li style="float:right"><a href="#"> <?php echo $_SESSION['Message'];echo $_SESSION['Username']; ?></a></li>
      
      </ul></nav>
       
  </header>
  
  <div class="mainContent">    <!-- the main content for first and second post or top and bottom content -->
    <div class="content">
    
    
    
	<article class="topcontent">
	   <header>                 <!-- header of the article container -->
		   <center> <h2><a href="#" title="First post"> The Gym </a></h2></center>
	   </header>
	   
	   <footer>			<!-- posting bellow the header of the article -->
	      <p class="post_info">  This post is written by Me  </p>   
	   </footer>
	   
	   
	      <p><img src="images/gym1.jpg" alt="gym1" width="70%" height="50%" align="left" >
The Gym,  offers various services to help members meet their fitness goals.  Increasing your physical activity helps prevent cardiovascular disease and type 2 diabetes, among other common health hazards.
	      </p>
	      <p>
	    The Gym are an effective way to add variety to your routine. However, you do not have to go to a gym to stay active. When considering a health club, it is important that the features are worth the price you pay. 
	    </p>
	      
	   
	   
	</article>
	
	<article class="bottomcontent"> <!--Second container (second post) -->
	   <header>                 <!-- header of the article container -->
		    <h2><a href="#" title="Wellness">Wellness</a></h2>
	   </header>
	   
	   <footer>			<!-- posting bellow the header of the article -->
	      <p class="post_info">  This post is written by Me  </p>   
	   </footer>
	   
	   <img src="images/gym2.jpg" alt="gym2" width="70%" height="50%" align="right">
	      <p>
	      The ultimate goal of a gym is to help make its members healthier. Some health clubs require that new members undergo a health assessment. You will be weighed and a staff member will measure your body fat composition.
	      </p>
	      <p>
	      These tests should not replace a proper wellness examination from your doctor. You should also consult your doctor before joining a health club, particularly if you are new to exercise.
	      </p>
	      
	   </article>
	   
	   <article class="bottomcontent"> <!--Second container (second post) -->
	   <header>                 <!-- header of the article container -->
		    <h2><a href="#" title="Wellness">Multiple Types of Workouts</a></h2>
	   </header>
	   
	   <footer>			<!-- posting bellow the header of the article -->
	      <p class="post_info">  This post is written by Me  </p>   
	   </footer>
	   
	   <img src="images/gym3.jpg" alt="gym3" width="70%" height="50%" align="left">
	      <p>
	      Unlike a basic household or housing-complex gym, health clubs provide variety. 
	      </p>
	      <p>
	       Gyms offer machines, free weights and also hold classes, such as kickboxing, yoga and dance. 
	      </p>
	      <p>
	      Variety helps decrease boredom, which is one reason people quit exercising. The Gym are also a way to meet other people who can help keep you motivated. This is particularly the case if you take workout classes. Some gyms offer free childcare services for exercising members.
	      </p>
	      
	   </article>
	   
	   <article class="bottomcontent"> <!--Second container (second post) -->
	   <header>                 <!-- header of the article container -->
		    <h2><a href="#" title="Wellness">Personal Training</a></h2>
	   </header>
	   
	   <footer>			<!-- posting bellow the header of the article -->
	      <p class="post_info">  This post is written by Me  </p>   
	   </footer>
	   
	   <img src="images/gym5.jpg" alt="gym5" width="90%" height="50%">
	      <p>
	      Most health clubs employ personal trainers. Keep in mind that they charge by the hour, and that this cost is separate from your basic health-club membership fees. Some health clubs give you a free session with a trainer when you join. 
	      </p>
	      <p>
	       Personal trainers help safely take your workouts to the next level. At the same time, you will work harder than ever before. 
	      </p>
	      <p>
	      A trainer helps guide you through both strength training and cardiovascular workouts. You do not have to sign up with a trainer immediately upon joining a health club, but only if you feel you need to increase the intensity of your workouts under professional guidance. Pick a trainer with an accredited national certification.
	      </p>
	      
	   </article>
	   
	   <article class="bottomcontent"> <!--Second container (second post) -->
	   <header>                 <!-- header of the article container -->
		    <h2><a href="#" title="Wellness">Considerations</a></h2>
	   </header>
	   
	   <footer>			<!-- posting bellow the header of the article -->
	      <p class="post_info">  This post is written by Me  </p>   
	   </footer>
	   
	   <img src="images/gym4.jpg" alt="gym4" width="90%" height="50%">
	      <p>
	      Gym membership is costly, and many have difficult cancellation policies. Many members also quit going to health clubs due to a lack of motivation or time, but still end up paying monthly fees. 
	      </p>
	      <p>
	       The purpose of a gym is to help you get in shape. But it is also a business. If you sign a contract for a certain number of months, do not expect that you can break it after a few weeks.To avoid this headache, do your homework and make sure that you are committed to working out at a particular health club.
	      </p>
	      	      
	   </article>
	   
	   <!-- <article class="bottomcontent">
	    <p> Acrobats</p>
	   <video width ="20" controls>
	      <source src="VID-20161129-WA0001.mp4" type="video/mp4">
	   </video>
	   </article> -->
	      

	      
	
    </div>
  </div>
  
  <aside class="top-sidebar">     <!-- for sidebar  -->
      <article>				<!-- content for the sidebar -->
	  <h2>Top sidebar</h2>
	  <p>We all know it’s so much easier to stay healthy when you’re really enjoying yourself. For most of us, this means updating our routine regularly to keep it fresh and challenging. And with so much on offer here, there’s always something new to try.


	      
	      </p>
	      <!-- <div><a href="connect3.php">Login</a></div>   login button  -->
      </article>
  </aside>
  <aside class="middle-sidebar">     <!-- for sidebar  -->
      <article>				<!-- content for the sidebar -->
	  <h2>middle sidebar</h2>
	  <p>We all know it’s so much easier to stay healthy when you’re really enjoying yourself. For most of us, this means updating our routine regularly to keep it fresh and challenging. And with so much on offer here, there’s always something new to try.


	      
	      </p>
      </article>
  </aside>
   <aside class="bottom-sidebar">     <!-- for sidebar  -->
      <article>				<!-- content for the sidebar -->
	  <h2>Leave us a feedback</h2>   <!-- bottom sidebar for post-->
	   <form action='' method='post'>
  
  <input type="text" name="Name" id="Name" value="" placeholder="Name"> 
  <br><br>
  
  <input type="text" name="Email" id="Email" value="" placeholder="Email optional"> 
  <br><br>
  
  <textarea rows="5" cols="20"  name="comment" placeholder="comment..."  ></textarea>
  <br>
  <input type="submit" name="comments"  value="Post">

</form>
      </article>  
  </aside>
  
  <footer class="mainfooter">
    
      <article style= "float:right;">
       <p>
      <b> Be the first to receive exciting news from The Gym!
      </p>
      <form  >
	<input type="text" name="Email" id="Email" placeholder="Your Email Address"  >
	<input type="submit" name="emailSend" value="Send" >
      </form>
      </article>
      
      <br><br><br>
      <p>Copyright &copy; <a href="#" title="1stwebdesigner">1stwebdesigner.com</a></p>
     
  </footer>
  
  

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
      $Name=$Email=$Comment='';
      
     if (isset($_POST['comments'])){
      
      $Email=trim($_POST["Email"]);
      $Comment=trim($_POST["comment"]);
      
      if (strlen ($Comment)>3){
      if(!empty($_POST['Name'])){
	$Name=trim($_POST["Name"]);
      }else {
	$Name="Anonymous";
	
      }
                 
      $query = "insert into comments(Name,Email,Comment)values('$Name','$Email','$Comment')";
      $result = mysqli_query($conn,$query);
      }else{
      //if comment is less than four words don't insert to comment table 
      
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
