<?php
include 'db.php';
	$ProductId = "";
	$ProductName= "";
	$Quantity= "";
	$RatePerProduct= "";
	$IsAvaliable = false;
if(isset($_POST['Submit'])) {
	$ProductId= $_POST['ProductId'];
	$ProductName= $_POST['ProductName'];
	$Quantity= $_POST['Quantity'];
	$RatePerProduct= $_POST['RatePerProduct'];
	$IsAvaliable = isset($_POST['IsAvaliable']) ? true: false;
	$query="UPDATE  productmaster SET 
			ProductName = '$ProductName', Quantity = '$Quantity', RatePerProduct = '$RatePerProduct', IsAvaliable = $IsAvaliable WHERE ProdctID = '$ProductId'";
	$result=$conn->query($query);
	if($result){
		header("location:product-master.php");
	}
	else{
		$errormsg="Something went wrong,Try Again.";
		echo "<script type='text/javascript'>alert('$errormsg');</script>";
	}
} 
else{
	if(isset($_GET["id"])) {
		$ProductId =  $_GET["id"];
		$result = $conn->query("SELECT * FROM productmaster WHERE ProdctID = '$ProductId'");
		if($result != null && $result->num_rows == 1 ) { 
			$row = $result->fetch_assoc() ;
			$ProductId = $row["ProdctID"];
			$ProductName= $row["ProductName"];
			$Quantity= $row["Quantity"];
			$RatePerProduct= $row["RatePerProduct"];
			$IsAvaliable = $row["IsAvaliable"];
		}
	}
}
$result = $conn->query("SELECT * FROM productmaster");
$conn->close();
?>



<!DOCTYPE html>
<html>
<head>
	<title>Edit Product</title>
	<script type="text/javascript" src="../Script/jquery-3.1.1.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
	$('form#form1').submit(function(){
	   var ProductName=$('#txtName').val();
				if (ProductName=="") 
				{
					$('.validate').show();
					return false;
					// $('#valCst').val();
					// $('#valCst').css({'display':'block','color':'red'});
				}
				else{
					$('.validate').hide();
					return true;
				}
     });						

			$('#btnSave').click(function(){
				//$('#form1').submit();
			});
		});  
	</script>
	<style>
		.pmaster{
			background-color: #2b547e;
			color: white;
			font-size: 28px;
			font-family: calibri;
			width: 100%;
			height: 75px;
			border: 1px solid black;
			border-radius: 5px;
		}

		.ptext{
			font-size: 28px;
			font-family: calibri;
			line-height: 15px;
		}

		.padd{
			font-size: 26px;
			color: #2b547e;
			text-align: center;
		}

		.hrafter{
			width: 60%;
			border: 2px solid #2b547e;
		}

		.hra{
			width: 100%;
			border: 2px solid #2B547E;
		}

		.tdedit{
			text-align: center;
			font-size: 18px;
			padding: 5px;
		}

		#editbtn{
			width: 100px;
			height: 40px;
			font-size: 18px;
			border: 1px solid black;
			background-color: #2B547E;
			color: white;
			border-radius: 5px;
		}

		.txtedit{
			font-size: 16px;
			padding: 5px;
			width: 200px;
			border: 1px solid black;
			border-radius: 5px;
			font-family: calibri;
		}

		.tdpad{
			padding: 15px;
		}

	</style>
</head>
<body>

<font face="calibri">

<form action="editproduct.php" id="form1"  method="post" name="product_masterform">

<div class="pmaster">
	<p align="center" class="ptext">Product Master</p>
</div>

<p class="padd">Edit Product Details</p>

<hr class="hrafter"><br />

<table align="center">
	<tr>
		<td class="tdedit">
			Product Name
		</td>
		<td class="tdedit">
			:
		</td>
		<td class="tdedit">
		<input id="txtName" maxlength="50" type="hidden" name="ProductId" value="<?php echo $ProductId ?>">
			<input id="txtName" class="txtedit" maxlength="50" type="text" name="ProductName" value="<?php echo $ProductName ?>">
		</td>
	</tr>

	<tr>
		<td colspan="3"><br></td>
	</tr>

	<tr>
		<td class="tdedit">
		Quantity
		</td>
		<td class="tdedit">
			:
		</td>
		<td class="tdedit">
			<input type="number" class="txtedit" maxlength="10" name="Quantity" value="<?php echo $Quantity ?>">
		</td>
	</tr>

	<tr>
		<td colspan="3"><br></td>
	</tr>

	<tr>
		<td class="tdedit">
		Rate Per Item 
		</td>
		<td class="tdedit">
			:
		</td>
		<td class="tdedit">
			<input type="number" class="txtedit" maxlength="5" name="RatePerProduct" value="<?php echo $RatePerProduct ?>">
		</td>
	</tr>

	<tr>
		<td colspan="3"><br></td>
	</tr>

	<tr>
		<td class="tdedit">
		Is Available 
		</td>
		<td class="tdedit">
			:
		</td>
		<td class="tdedit" style="text-align: left">
			<input type="checkbox" name="IsAvaliable" <?php if($IsAvaliable) { echo "checked";}?> >
		</td>
	</tr>
</table>
<br />

<div align="center">
	<input id="editbtn" type="submit" value="Edit" name="Submit">
</div>
<br />

<hr class="hra">

<p class="padd">All Product Details</p>
<hr class="hrafter">
<br />
<table align="center" border="1" style="border-collapse: collapse; font-size: 18px; padding: 10px;">
	<thead style="background-color: #2B547E; color: white; text-align: center;">
		<tr>
			<td class="tdpad">Product ID</td>
			<td class="tdpad">Product Name</td>
			<td class="tdpad">Quantity</td>
			<td class="tdpad">Rate Per Product</td>
			<td class="tdpad">Is Avaliable</td>
			<td class="tdpad">Is Active</td>
			<td class="tdpad">Created Date</td>
			<td class="tdpad">Action</td>
		</tr>
	</thead>
	<tbody style="text-align: center; padding: 10px;">
		<?php 
			if($result != null && $result->num_rows > 0 ) {
				while ($row = $result->fetch_assoc()) {
					echo "<tr>";

						echo "<td>".$row["ProdctID"]."</td>";
						echo "<td>".$row["ProductName"]."</td>";
						echo "<td>".$row["Quantity"]."</td>";
						echo "<td>".$row["RatePerProduct"]."</td>";
						 
						echo "<td>".$row["IsAvaliable"]."</td>";
						echo "<td>".$row["IsActive"]."</td>";
						//echo "<td>".$row["IsActive"] == 1 ? "Active" : "Dactive"."</td>";
						echo "<td>".$row["CreatedDate"]."</td>";
						echo "<td><a class='clslink' href='editproduct.php?id=".$row["ProdctID"]."'>Edit</a> | <a class='clslink' href='product-master.php?id=".$row["ProdctID"]."'>Delete</a></td>";
						// echo "<td><input type = """.$row["delete"]."</td>";
					echo "</tr>";
				}
			}
		?>
	</tbody>
</table>

</form>
</font>
</body>
</html>