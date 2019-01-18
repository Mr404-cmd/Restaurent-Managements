<?php
session_start();

include 'db.php';
$error = "";
if (isset($_POST['submit'])) {
	$username=$_POST['username'];
	$password=$_POST['password'];
	$query = "SELECT username, password FROM adminmaster WHERE username = '$username' AND password = '$password' AND isActive = true";

	$result=$conn->query($query);
	if($result != NULL && $result->num_rows > 0){
		$_SESSION["username"] = $username;
		header("location:adminpanel.php");		
	}
	else{
		$error="*Invalid username or password";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	<style>
		.adminlogin{
			border: 2px solid black;
			border-radius: 5px;
			width: 400px;
			height: 410px;
			margin-top: 200px;
		}

		.adlogin{
			font-size: 24px;
			background-color: #2B547E;
			color: white;
			padding: 15px;
		}

		.signup{
			text-decoration: none;
			color: red;
		}

		.txt{
			font-family: calibri;
			color: black;
			padding: 10px;
			font-size: 18px;
			border: 1px solid #2B547E;
			border-radius: 5px;
		}

		#editbtn{
			width: 120px;
			height: 40px;
			font-family: calibri;
			font-size: 20px;
			border: 1px solid black;
			background-color: #2B547E;
			color: white;
			border-radius: 5px;			
		}

		.signup{
			font-size: 20px;
			color: black;
			text-decoration: underline;
		}

		.error{
			font-size: 20px;
			color: red;
		}

	</style>
</head>
<body>
<font face="calibri">
<form action="#" method="post">

<div align="center">
<div class="adminlogin">

	<div class="adlogin">
		Admin Login
	</div>
	<br /><br />
	<div>
		<input class="txt" type="text" placeholder="Enter User Name" name="username" required><br /><br>
		<input class="txt" type="Password" placeholder="Enter Password" name="password" required><br /><br><br />
		<input type="submit" id="editbtn" value="Login" name="submit" /><br><br />
		<a href="signup.php" class="signup">Sign Up Here</a><br />
		<p class="error"><?php echo $error; ?></p>
	</div>

</div>
</div>
</form>
</font>
</body>
</html>