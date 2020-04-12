<?php
  session_start();

  $connection = mysqli_connect('127.0.0.1', 'root', '123456', 'part2');
  if($connection and isset($_POST['send'])) {
    echo "connected to db";

    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $query = mysqli_query($connection, "SELECT * FROM users WHERE username='$username'");
    $foundUser = mysqli_fetch_assoc($query);

    if(!$foundUser) {
      mysqli_query($connection, "INSERT INTO users (username, password) VALUES ('$username', '$password')");
      $_SESSION['username'] = $username;
      $_SESSION['status'] = "greetings! You've created a new account.";
      header('location: page.php');
    } else {
      echo nl2br("\nError! User $username already exist!\n");
    }
  }
?>


<!DOCTYPE html>
<html>
<head>
  <title>Registration</title>
</head>
<body>
  <div >
  	<h2>Registration</h2>
  </div>
	
  <form method="post" action="registration.php">
  	<div>
  	  <label>Username</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div>

  	<div>
  	  <label>Password</label>
  	  <input type="password" name="password">
  	</div>

  	<div>
  	  <button type="submit" name="send">Send</button>
  	</div>
  </form>

  <a href = "login.php">Already have an account?</a>
</body>
</html>