<?php
  session_start();
  if(isset($_GET['logout'])) {
    session_destroy();
    header('location: login.php'); 
  }

  if(!isset($_SESSION['username'])) {
    header('location: registration.php');
  }

  echo nl2br($_SESSION['username'].",".$_SESSION['status']."\n");
?>


<!DOCTYPE html>
<html>
<head>
  <title>Page</title>
</head>
<body>
  <a href="page.php?logout='1'">logout</a>

	
</body>
</html>