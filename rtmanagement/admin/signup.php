<?php
include 'db.php';
$error = "";
if (isset($_POST['submit'])) {
	$username=$_POST['username'];
	$password=$_POST['password'];
	$query = "INSERT INTO adminmaster (username, password, isActive) VALUES ('$username', '$password', '1')";

	$result = $conn->query($query);
	print_r($result);
	if($result != NULL) {
		header("location:index.php");		
	}
	else{
		$error="Oops! Something went wrong. Please try after some time!!";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Signup</title>
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
		Admin SignUp
	</div>
	<br /><br />
	<div>
		<input class="txt" type="text" placeholder="Enter User Name" name="username" required><br /><br>
		<input class="txt" type="Password" placeholder="Enter Password" name="password" required><br /><br><br />
		<input type="submit" id="editbtn" value="Sign Up" name="submit" /><br><br />
		<a href="index.php" class="signup">Login Here</a><br />
		<p class="error"><?php echo $error; ?></p>
	</div>

</div>
</div>
</form>
</font>
</body>
</html>