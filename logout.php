<?php 
    session_start();
    session_destroy();
    unset($_SESSION['Username']);
    $_SESSION['Message'] = "You are now logged out";
    header("location:login.php");
?>