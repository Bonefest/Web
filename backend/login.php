<?php
  session_start();

  if(isset($_SESSION['username']))
    header('location: page.php');

  $connection = mysqli_connect('127.0.0.1', 'root', '123456', 'part2');
  if($connection and isset($_POST['send'])) {
    echo "connected to db";

    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $query = mysqli_query($connection, "SELECT * FROM users WHERE username='$username'");
    $foundUser = mysqli_fetch_assoc($query);

    if($foundUser) {
      if($foundUser['username'] == $username and $foundUser['password'] == $password) {
        $_SESSION['username'] = $username;
        $_SESSION['status'] = "You've successfully loged in!";
        header('location: page.php');
      } 
    }
    
    echo nl2br("\nUnable to login! Check name and/or password.\n");
  }
?>


<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
</head>
<body>
  <div>
  	<h2>Login</h2>
  </div>
	
  <form method="post" action="login.php">
  	<div>
  	  <label>Username</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div>

  	<div>
  	  <label>Password</label>
  	  <input type="password" name="password">
  	</div>

  	<div>
  	  <button type="submit" name="send">Login</button>
  	</div>
  </form>


  <a href = "registration.php">Don't have an account?</a>
</body>
</html>