<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome Admin Panel</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>

	<style>
		.adminpanel{
			width: 100%;
			height: 75px;
			background-color: #2b547e;
			color: white;
			font-family: calibri;
		}

		.atxt{
			text-align: center;
			line-height: 75px;
			font-size: 28px;
			font-family: calibri;
		}

		.editname{
			font-size: 26px;
			color: #2b547e;
			margin-top: 40px;
		}

		.logout{
			font-size: 18px;
			width: 100px;
			border: 1px solid black;
			border-radius: 5px;
			height: 40px;
			color: white;
			background-color: #2b547e;
		}

		.tedit{
			font-size: 25px;
			margin-top: 50px;
			border: 2px solid black;
			border-radius: 5px;
			border-collapse: collapse;
		}

		.tdedit{
			padding: 20px;
		}

	</style>
</head>
<body>
<font face="calibri">

	<div class="adminpanel">
		<p class="atxt"> Admin Panel </p>
	</div>

	<p class="editname text-center"> Welcome, <?php echo $_SESSION["username"]; ?> </p><br />
	<h2 align="center"><a href="logout.php"><input type="submit" value="Logout" class="logout" name=""></a></h2>
	
	<table align="center" border="1" class="tedit">
	<tr>
		<td class="tdedit"><a href="product-master.php">Add Product</a></td>
		<td class="tdedit"><a href="adminorder.php">View Order</a></td>
	</tr>	
	</table>

</font>
</body>
</html>