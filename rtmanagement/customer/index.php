<?php
include 'db.php';
if(isset($_POST['submit'])) {
	
	$customername=$_POST['customername'];
	$tableno=$_POST['tableno'];
	$idnumber=$_POST['idnumber'];
	
	$query="INSERT INTO customerinfo (customer_name,customer_id,table_no) VALUES ('$customername','$idnumber','$tableno')";
	
	$result=$conn->query($query);
	if($result){
		header("location:customerorder.php?customer_id=$idnumber&customer_name=$customername");
		// $msg="Record inserted successfly";
		// echo "<script type='text/javascript'>alert('$msg');</script>";
	}
	else{
		$errormsg="Something went wrong,Try Again.";
		echo "<script type='text/javascript'>alert('$errormsg');</script>";
	}
} 

$table = $conn->query("SELECT * FROM table_master WHERE status = 1");
$orderTableData = [];
if($table != null && $table->num_rows > 0 ) {
	while ($tablerow = $table->fetch_assoc()) {
		$orderTableData[$tablerow["id"]] = $tablerow["id"];
	}
}
$conn->close();
?>


<!DOCTYPE html>
<html>
<head>
	<title> The Empress </title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<style>
		.tsize{
			width: 150px;
			border: 1px solid #2B547E;
			border-radius: 5px;
			padding: 5px;
			padding-left: 8px;
		}

		.tselect{
			width: 150px;
			border: 1px solid #2B547E;
			border-radius: 5px;
			padding: 5px;
		}
		.editc{
			font-size: 18px;
		}

		.hrafter{
			border: 2px solid #2B547E;
		}

		.editbtn{
			width: 150px;
			height: 40px;
			border: 1px solid black;
			background-color: #2B547E;
			color: white;
			border-radius: 5px;
		}

		#navedit{
			background-color: #2B547E;
			height: 70px;
			padding-right: 30px;
			padding-left: 30px;
			margin-bottom: 0px;
		}

		#liedit{
			color:white;
			font-size:20px;
			line-height: 35px;
			padding-left: 25px;
			padding-right: 25px;
		}

		#navhead{
			color:white;
			font-size:28px;
			line-height: 35px;
			padding-left: 25px;
			padding-right: 25px;		
		}

		#liedit:hover{
			color:white;
		}

		#liedit:active{
			color:white;
		}

		#liedit:visited{
			color:white;
		}

		.editfooter{
			background-color: #2B547E;
			height: 60px;
			line-height: 60px;
			color:white;
			font-size: 20px;
			text-align: center;
		}

		.imgedit{
			border-radius: 5px;
		}
	</style>
</head>
<body>
<font face="calibri">
<div class="main">

<div class="nav">
	<nav class="navbar navbar-default" id="navedit">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="index.php" id="navhead">The Empress</a>
	    </div>
	     <ul class="nav navbar-nav navbar-right">
	       <li><a href="index.php" id="liedit">Home</a></li>
	       <li><a href="customerorder.php" id="liedit">Menu</a></li>
	     </ul>
	  </div>
	</nav>
</div>

<img src="../images/banner.jpg" width="100%" class="imgedit" />


<div class="container-fluid">
	<div class="row" align="center">
		<h2 align="center"> Please Enter Your Details First </h2>
		<hr class="hrafter">
		<form action="index.php" name="customername" method="post">
			<div class="col-md-12">
				<table style="border-collapse: collapse;" class="editc">
					<tr>
						<td> Name &nbsp;</td>
						<td> : &nbsp;</td>
						<td><input type="text" class="tsize tpad" name="customername" required></td>
					</tr>
					<tr>
						<td colspan="3"><br></td>
					</tr>
					<tr>
						<td> Table No. &nbsp;</td>
						<td> : &nbsp;</td>
						<td>
							<select name="tableno" class="tselect" required>
								<option value="">Enter Table No.</option>
									<?php 
	           	 					if(count($orderTableData) > 0 ) {
									foreach ($orderTableData as $key => $value) {
									echo '<option class="clsOpt" value="'.$value.'">'.$value.'</option>';
									}
           							}
           							?>
							</select>
						</td>
					</tr>
					<tr>
						<td colspan="3"><br></td>
					</tr>
					<tr>
						<td> Enter ID &nbsp;</td>
						<td> : </td>
						<td><input type="text" class="tsize tpad" name="idnumber" required></td>
					</tr>
					<tr>
						<td colspan="3"><br></td>
					</tr>
					<tr>
						<td colspan="3" align="center"><input type="submit" class="editbtn" name="submit" value="Start Ordering"></td>
					</tr>	
				</table>
			</div>
		</form>
	</div>
</div>

<br />
<br />

<footer class="editfooter">
	<p> &copy; Copyright 2017-2019 The Empress </p>
</footer>

</div>
</font>
</body>
</html>