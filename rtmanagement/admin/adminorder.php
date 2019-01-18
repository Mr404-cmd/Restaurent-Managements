<?php
include 'db.php';
$orderData = [];
$result = $conn->query("SELECT * FROM ordermaster JOIN productmaster ON ordermaster.product_id = productmaster.ProdctID JOIN customerinfo ON ordermaster.customer_id = customerinfo.customer_id WHERE order_status = 1");

		if($result != null && $result->num_rows > 0 ) {
				while ($row = $result->fetch_assoc()) {
					$product_detail = [];
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

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="../Script/jquery-3.1.1.js"></script>
	<style>
		.toprow{
			padding: 15px;
			text-align: center;
			font-size: 20px;
			color: #2b547e;
		}

		.tddata{
			font-size: 18px;
			text-align: center;
			text-decoration: none;
			color:black;
		}

		.itemdata{
			font-size: 20px;
			color: red;
			border:1px solid black;
			padding: 15px;
		}

		.indata{
			padding: 10px;
			font-size: 18px;
		}

		#editbtn{
			width: 150px;
			height: 40px;
			font-size: 18px;
			border: 1px solid black;
			background-color: #2B547E;
			color: white;
			border-radius: 5px;
			text-decoration: none;
		}

		.vieworder{
			background-color: #2B547E;
			color: white;
			height: 75px;
			width: 100%;
			font-size: 28px;
			border: 1px solid black;
			border-radius: 5px;
		}

		.viewtxt{
			line-height: 15px;
			font-family: calibri;
		}

	</style>
</head>
<body>
<font face="calibri">
<div class="main" align="center">

	<div class="vieworder">
		<p class="viewtxt">View Order</p>
	</div>
	<br /><br />
	<a href="adminpanel.php"><input type="submit" id="editbtn" value="Back" name=""></a>
	<br /><br />

	<table border="1" width="800px" style="border-collapse: collapse;" align="center">

	<thead>
		<tr>
			<td width="150px" class="toprow">Customer Name</th>
			<td width="500px" class="toprow">Item</th>
			<td width="150px" class="toprow">Total Payable</th>
			<td width="150px" class="toprow">Generate Bill</th>	
		</tr>
	</thead>

	<tbody style="text-align: center;">	

		<?php foreach ($orderData as $customer_id => $product_detail): 
			$total_payable = 0;
		?>
		<tr>
			<td class="tddata">
				<?php echo $product_detail[0]["customer_name"] ; ?>
			</td>

			<td style="text-align: center;">
				<table border="1" style="border-collapse: collapse;" align="center" width="100%">
				<tr>
					<td class="itemdata">Item Name</td>
					<td class="itemdata">Rate Per Item</td>
					<td class="itemdata">Quantity</td>					
					<td class="itemdata">Price</td>
				</tr>
				<?php foreach ($product_detail as $key => $product): ?>
					<tr>
					<td class="indata"><?php echo $product["product_name"];?></td>
					<td class="indata"><?php echo $product["rate"];?></td>
					<td class="indata"><?php echo $product["quantity"];?></td>
					<td class="indata"><?php echo $product["quantity"] * $product["rate"];?></td>
				</tr>
				<?php 
				$total_payable = $total_payable + $product["quantity"] * $product["rate"];
				endforeach;?>	
				</table>
			</td>
			
			<td class="tddata">
				<?php echo $total_payable;?>
			</td>
			<td class="tddata">
				<span id="dvBill" style="">
            		<a href="bill.php?customer_id=<?php echo $customer_id;?>">Generate Bill</a>
            	</span>
			</td>
		</tr>
	<?php endforeach; ?>
		</tbody>	
	</table>
</div>
</font>
</body>
</html>