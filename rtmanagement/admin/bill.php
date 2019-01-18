<?php
include 'db.php';
$customer_name = "";
$orderData = [];
$sql = "SELECT * FROM ordermaster JOIN productmaster ON ordermaster.product_id = productmaster.ProdctID JOIN customerinfo ON ordermaster.customer_id = customerinfo.customer_id WHERE order_status = 1 and ordermaster.customer_id =".$_GET["customer_id"];
$result = $conn->query($sql);

$conn->query("UPDATE ordermaster set order_status = 0 WHERE customer_id =".$_GET["customer_id"]."");
		
		if($result != null && $result->num_rows > 0 ) {
				while ($row = $result->fetch_assoc()) {
					$product_detail = [];
					$customer_name = $row["customer_name"];
					$product_detail["customer_name"] = $row["customer_name"];
					$product_detail["product_name"] = $row["ProductName"];
					$product_detail["quantity"] = $row["quantity"];
					$product_detail["rate"] = $row["RatePerProduct"];
					if(!isset($orderData[$row["customer_id"]])) {
						$orderData[$row["customer_id"]] = array($product_detail);
					} else {
						array_push($orderData[$row["customer_id"]], $product_detail);
					}
				}
			}
$total_payable = 0;
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
		.t1{
			font-size: 24px;
			color: #2b547e;
		}

		.h1o{
			color: red;
			font-size: 35px;
		}

		.hrafter{
			border:2px solid #2b547e;
		}

		.t2{
			border-collapse: collapse;
			width: 50%;
		}

		.tdedit{
			padding: 15px;
			font-size: 18px;
			text-align: center;
		}

		.pedit{
			font-size: 22px;
			text-align: center;
			color: #2b547e;
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

		.dedit{
			padding: 15px;
			font-size: 18px;
			text-align: center;
		}

	</style>
</head>
<body>
<font face="calibri">
<h1 align="center" class="h1o"> Order Receipt </h1></p>
<hr class="hrafter"><br />
<table align="center" class="t1">
	<tr>
		<td>
			Customer Name &nbsp;
		</td>
		<td>
			: &nbsp;
		</td>
		<td>
			<?php echo $customer_name; ?>
		</td>
	</tr>
	<tr>
		<td align="right">
			Date &nbsp;
		</td>
		<td>
			: &nbsp;
		</td>
		<td>
			<?php echo Date("Y-m-d"); ?>
		</td>
	</tr>
</table>

	<br />
	<br />	

<table border="1" align="center" class="t2"> 
	<tr>
		<td class="tdedit">Product Name</td>
		<td class="tdedit">Rate</td>
		<td class="tdedit">Quantity</td>
		<td class="tdedit">Amount</td>
	</tr>

	<?php foreach ($orderData as $customer_id => $value): 
		foreach ($value as $key => $product):
	?>
	
	<tr>
		<td class="dedit"><?php echo $product["product_name"];?></td>
		<td class="dedit"><?php echo $product["rate"];?></td>
		<td class="dedit"><?php echo $product["quantity"];?></td>
		<td class="dedit"><?php echo $product["quantity"] * $product["rate"];?></td>
	</tr>
				
	<?php 
		$total_payable = $total_payable + $product["quantity"] * $product["rate"];
		endforeach;endforeach;
	?>
</table>
<br />
<p class="pedit"> Your Total Amount is Rs. <?php echo $total_payable; ?></p>

<p align="center"><input type="button" id="editbtn" onclick="window.print()" value="Print" name=""></p>
</font>
</body>
</html>