<!DOCTYPE html>
<html lang="en">

<head>

  <title>HTML5/CSS3 Responsive Theme </title>
  <meta charset="utf-8" />     
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <link rel="stylesheet" href="style2.css" type="text/css" />   <!-- //link css  -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" >     <!-- make framework Responsive  -->
  
    <style>
      .carousel-inner > .item > img,
      .carousel-inner > .item > a > img{
	  width: 40%;
	  margin: auto;
      }
    </style>
</head>

<body class="body">

  <header class="mainHeader">
      <!-- <img src="dumbbell.jpg">  -->
            
      <nav><ul>  		<!-- navigation bar  -->
	<li class="active"><a href=#">Home</a></li>
	<li><a href=#">About</a></li>
	<li><a href=#">Portfolio</a></li>
	<li><a href=#">Contact</a></li>
      
      </ul></nav>
      
      <div class="container">
	<br>
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
	  <!-- indicators -->
	  <ol class="carousel-indicators">
	    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
	    <li data-target="#myCarousel" data-slide-to="1"></li>
	    <li data-target="#myCarousel" data-slide-to="2"></li>
	    <li data-target="#myCarousel" data-slide-to="3"></li>
	    
	  </ol>
	  <!-- wrapper for slides -->
	  <div class="carousel-inner" role="listbox">
	    <div class="item active">
		<img src="dumbbell.jpg" alt="dumbbell" width="360" height="345">
		<div class="carousel-caption">
		    <h3>dumbbell_1</h3>
		    <p> This the first dumbbell. </p>
		</div>
	    </div>
	    <div class="item">
	      <img src="dumbbell.jpg" alt="dumbbell" width="460" height="345">
		<div class="carousel-caption">
		  <h3>dumbbell_2</h3>
		  <p> This is the second dumbbell. </p>
		</div>
	    </div>
	    <div class="item">
	      <img src="dumbbell.jpg" alt="dumbbell" width="460" height="345">
		<div class="carousel-caption">
		  <h3>dumbbell_3</h3>
		  <p> 3rd dumbbell. </p>
		</div>
	    </div>
	    <!-- Left and right controls -->
	    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
	      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
	      <span class="sr-only">Previous</span>
	    </a>
	    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
	      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
	      <span class="sr-only">Next</span>
	    </a>
	  </div>  
	
      </div>
       
  </header>
  
  <div class="mainContent">    <!-- the main content for first and second post or top and bottom content -->
    <div class="content">
    
    
    
	<article class="topcontent">
	   <header>                 <!-- header of the article container -->
		    <h2><a href="#" title="First post">First post</a></h2>
	   </header>
	   
	   <footer>			<!-- posting bellow the header of the article -->
	      <p class="post_info">  This post is written by Me  </p>   
	   </footer>
	   
	   
	      <p>
Health clubs, also called fitness centers or gyms, offer various services to help members meet their fitness goals. Increasing your physical activity helps prevent cardiovascular disease and type 2 diabetes, among other common health hazards. Health clubs are an effective way to add variety to your routine. However, you do not have to go to a gym to stay active. When considering a health club, it is important that the features are worth the price you pay.
	      
	      </p>
	      <p>
Join the gym and you’ll get so much more than just a great workout. Our qualified staff of fitness professionals will give you personalized attention, customizing an all-inclusive wellness plan to help you achieve your fitness goals.
	      
	      </p>
	   
	   
	</article>
	
	<article class="bottomcontent">
	   <header>                 <!-- header of the article container -->
		    <h2><a href="#" title="Wellness">Second post</a></h2>
	   </header>
	   
	   <footer>			<!-- posting bellow the header of the article -->
	      <p class="post_info">  This post is written by Me  </p>   
	   </footer>
	   
	   
	      <p>
The ultimate goal of a gym is to help make its members healthier. Some health clubs require that new members undergo a health assessment. You will be weighed and a staff member will measure your body fat composition. These tests should not replace a proper wellness examination from your doctor. You should also consult your doctor before joining a health club, particularly if you are new to exercise.
	      
	      </p>
	      <!-- <p>
	      We all know it’s so much easier to stay healthy when you’re really enjoying yourself. For most of us, this means updating our routine regularly to keep it fresh and challenging. And with so much on offer here, there’s always something new to try.

Our gyms have an unrivalled range of equipment, our group exercise classes are second-to-none, and our Personal Trainers are on hand to help you achieve your goals. We also have beautiful indoor and outdoor pools, fabulous swimming coaches who are great with both adults and kids, plus the perfect place to relax your tired muscles – our spas.  
	      
	      </p>  -->
	   
	   
	</article>
	
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
	  <h2>Please leave us a comment</h2>   <!-- bottom sidebar for post-->
	   <form action='' method='post'>
  
  <input type="text" name="Name" id="Name" value="" placeholder="Name."> 
  <br><br>
  
  <input type="text" name="Email" id="Email" value="" placeholder="Email."> 
  <br><br>
  
  <textarea rows="5" cols="20"  name="comment"  >
    comment... </textarea>
  <br>
  <input type="submit" name="Post" value="Post">

</form>
      </article>
  </aside>
  
  <footer class="mainfooter">
      <p>Copyright &copy; <a href="#" title="1stwebdesigner">1stwebdesigner.com</a></p>
  </footer>
  
  

</body>

</html>
