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
    <br><br><br>
    <input type="text" name="Email" id="Email" placeholder="send email to individual "><br><br>
    <input type="text" name="Subject" id="Subject" placeholder="Subject "><br><br>
    <textarea rows="4" cols="50" name="message" placeholder=" Enter your message... "></textarea><br><br>
    <input type="submit" name="sendMail" value="send mail"> 
    
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
        
      
      if (isset($_POST["sendMail"])){ //check if Delete button is pressed
      $sendNow=0;
      require '/lib/PHPMailer/PHPMailerAutoload.php';
      $mail = new PHPMailer;
      
      $message=$subject='';
      $subject= $_POST["Subject"];
      $email=trim($_POST["Email"]);
     
     if (strlen($email)>3)
     { 
	$sendNow=1; 
     }
	if (!empty($_POST["message"])){		//if condition to chech if the form submitted is empty 
	  $message = $_POST["message"];
	  
	}else {
	  $sendNow=2;
	}
	
	//echo "subject is ".$subject."<br> message is ".$message;
	//echo  $email." <br> ".$sendNow."<br>";
	if ($sendNow==1)
	{
	    
	    //require '/lib/PHPMailer/PHPMailerAutoload.php';
	    //$mail-> new PHPMailer;
	    $mail->isSMTP();
	    $mail->Host = 'smtp.gmail.com';
	    $mail->SMTPAuth = true;
	    $mail->Username = 'gymsender@gmail.com';
	    $mail->Password = 'gymsender1';
	    $mail->SMTPSecure = 'tls';
	    $mail->Port = 587;
	    $mail->From = 'gymsender@gmail.com';
	    $mail->FromName= 'Team Gym';
	    $mail->addAddress($email);
	    $mail->isHTML(true);
	    $mail->Subject = ($subject);
	    $mail->Body = ($message);
	    if(!$mail->send()){
		echo '<br>Message could not be sent.<br>';
		echo 'Mailer Error: '.$mail->ErrorInfo;
	    } else {
		echo '<br>Message has been sent <br>';
	    }
	    
	}
	if ($sendNow==0){
	
	    
	    $query ="select * from subscribers";
	    $result = mysqli_query($conn,$query);
	    
	    $mail->isSMTP();
	    $mail->Host = 'smtp.gmail.com';
	    $mail->SMTPAuth = true;
	    $mail->Username = 'gymsender@gmail.com';
	    $mail->Password = 'gymsender1';
	    $mail->SMTPSecure = 'tls';
	    $mail->Port = 587;
	    $mail->From = 'gymsender@gmail.com';
	    $mail->FromName= 'Team Gym';
	    
	    while ($row = mysqli_fetch_assoc($result)){
	    $mail->addAddress($row['Email']);
	    //echo $row['Email'];
	    $mail->isHTML(true);
	    $mail->Subject =($subject);
	    $mail->Body = ($message);
	    //$mail->clearAddresses();
	    
	    }
	    if(!$mail->send()){
		echo '<br>Message could not be sent.<br>';
		echo 'Mailer Error: '.$mail->ErrorInfo;
	    } else {
		echo '<br>Message has been sent <br>';
	    }
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