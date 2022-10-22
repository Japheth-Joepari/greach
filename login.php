<?php 
include "include/connect.php";

if (isset($_POST['login'])) {
	$email = $_POST['email'];
	$pass = $_POST['pass'];

	$login_query = "select * from `users` where email='$email' && password='$pass'";
	$login_result = mysqli_query($con,$login_query);
	$num = mysqli_num_rows($login_result);
	if ($num>0) {
		echo "welcome";
		session_start();
		$_SESSION['email']=$email;
		header("location:forum/index.php");
	}else{
		echo "invalid credentials";
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
	<form method="post" class="register">
		<div class="form-elements">		
		<h2>Login</h2>	
		<label>Email</label>
		<input type="email" name="email" placeholder="mail@example.com">
		<label>Password</label>
		<input type="password" name="pass" placeholder="enter Password">
		<button type="submit" name="login" id="submit">Login</button>
		<p class="text">Don't have an account? <a href="register.php">Register</a></p>
		</div>
	</form>

</body>
</html>