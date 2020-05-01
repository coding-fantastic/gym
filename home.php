<?php

session_start();

?>

<!DOCTYPE html>
<html>
  <head>
	<title>Register , login and logout </title>
	<link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <div class="header">
	<h1>Register and logut </h1>
    </div>
    <h1>Home</h1>
    <div><h4>Welcome <?php echo $_SESSION['Username']; ?> </h4></div>
    <div><a href="login4.php">Logout</a></div>
  </body>

</html>