<?php
include 'db.php';
if(isset($_POST['order'])) {
	$quantitys= $_POST['quantity'];
	$customer_id=$_POST['customer_id'];
	$ProductIds=$_POST['ProductId'];

	foreach ($ProductIds as $key => $value) {
		$query="INSERT INTO ordermaster 
	(product_id, customer_id, quantity) VALUES ('$value','$customer_id', '$quantitys[$key]')";

		$result=$conn->query($query);
	}

	header("location:ordersuccess.php");
}

$customer_name = isset($_GET["customer_name"]) ? $_GET["customer_name"] : "";
$customer_id = isset($_GET["customer_id"]) ? $_GET["customer_id"] : ""; 
$result = $conn->query("SELECT * FROM productmaster");

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Order Now</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<style>
		#navedit{
			background-color: #2B547E;
			height: 70px;
			padding-right: 30px;
			padding-left: 30px;
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

		.cname{
			color:#2B547E;
			font-size: 40px;
		}

		.hrafter{
			border: 2px solid #2B547E;
		}

		.tstyle{
			font-size: 20px;
		}

		.edittd{
			text-align: center;
			padding-left: 10px;
			padding-bottom: 15px;
		}

		#ddlplt{
			width: 70px;
			text-align: center;
			border: 1px solid black;
			border-radius: 5px;
		}

		#editbtn{
			width: 150px;
			height: 40px;
			font-size: 20px;
			border: 1px solid black;
			background-color: #2B547E;
			color: white;
			border-radius: 5px;
		}

		.editfooter{
			background-color: #2B547E;
			height: 60px;
			line-height: 60px;
			color:white;
			font-size: 20px;
			text-align: center;
		}

	</style>

	<script type="text/javascript">
	$(document).ready(function () {
	    $('#editbtn').click(function() {
	      checked = $("input[type=checkbox]:checked").length;

	      if(!checked) {
	        alert("You must check at least one checkbox.");
	        return false;
	      }

	    });
	});
	</script>
</head>
<body>
<font face="calibri">

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

<div class="container-fluid">
<div class="row" align="center">

	<form method="post" action= "">

	<h1 class="cname"> Welcome <?php echo $customer_name;?></h1>
	<hr class="hrafter">
	<input type="hidden" name="customer_id" value="<?php echo $customer_id;?>">

	<table class="tstyle" style="border-collapse: collapse;">
		<tr>
			<td colspan="2" width="320px" align="center">Items</td>
			<td width="120px" align="center">Quantity</td>
			<td width="200px;" align="center">Price</td>
			<td width="200px" align="center">Status</td>
		</tr>

		<tr>
			<td colspan="5">
				<hr class="hrafter">
			</td>
		</tr>

		<?php 
			if($result != null && $result->num_rows > 0 ) :
				while ($row = $result->fetch_assoc()) :
					
		?>	

		<tr>
			
		<td class="edittd">
			<input type="checkbox" name="ProductId[]" value=<?php echo "".$row['ProdctID']."";?> data-dal= <?php echo "".$row['ProdctID']."";?> id="chkboxpani" class="chkItem">
		</td>

		<td class="edittd">
			<?php echo $row["ProductName"]; ?>
		</td>

        <td class="edittd">
           	<select id="ddlplt" name="quantity[]">
           	<?php for ($i = 1; $i <= $row["Quantity"]; $i++) {
           		echo '<option value="'.$i.'">'.$i.'</option>';
           	}
           	?>
           	</select>
        </td>

        <td class="edittd">
           	<?php echo 'Rs. '.$row["RatePerProduct"] ?>
        </td>

        <td class="edittd">
           	<?php echo $row["IsAvaliable"] == 1 ? "Available" : "UnAvailable"?>
        </td>
            
		</tr>

		<?php endwhile; endif;?>
	
	</table>
	<br />
	<br />
	<input id="editbtn" type="submit" value="Order" name="order">

    </form>
</div>
</div>
<br /><br />
<footer class="editfooter">
	<p> &copy; Copyright 2017-2019 The Empress </p>
</footer>

</font>
</body>
</html>