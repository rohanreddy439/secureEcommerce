<?php session_start();
if(!isset($_SESSION['email']))
{
	echo "<script language='javascript'>window.location='../home.php';</script>";
	return;
}


//echo "email=".$_SESSION['email'];
//return;


?>
<html>
<head>
   <?php include '../head_includes.php';?>
</head>
<body>

<?php 
	include 'menu.php';
	include '../mysqldb.php';
 ?>
 


<div class='container'>
<h3 style='color:#00FA00'>Cart Items</h3>
	<div class='row'>
		<div class='col-4'>
			 <table class='table'>
				<tr><th>Product Codde</td> <th>Product</td> <th>Cost</td> <th>Qty</th><th>Total Price</th></tr>
				<tbody>
			<?php
					$total=0;
					$productCode="Nill";
					
					$p=0;
					if(isset($_REQUEST['p']))
						$p=$_REQUEST['p'];
					else
						$p=0;
						
					 $qry1="select productcode,productname,cost,qty,totalcost from cart where id=".$p;
					 $rs1=mysqli_query($conn,$qry1);
					 while($row1=mysqli_fetch_assoc($rs1))
					 {
						 $productCode=$row1['productcode'];
						 echo "<tr><td>".$row1['productcode']."</td><td>".$row1['productname']."</td><td>".$row1['cost']."$</td><td>".$row1['qty']."</td><td>".$row1['totalcost']."$</td></tr>";
						 $total= $total + $row1['totalcost'];
					 }

					echo "<tr><td ></td><td><b>Total</b></td><td></td><td></td><td><b>".$total."</b></td></tr>";
					echo "</tbody>";
				
					echo "</table>";
					mysqli_close($conn);
			?>
		</div>
		
		<div class='col-sm-2'>&nbsp;</div>
		
		<div class='col-sm-4'>
		
		<form name='f1' method='post' action='placeOrder.php' style='margin-top:-80px'>
		<input type='hidden' name='productCode' value='<?php echo $productCode;?>'>
		<div class='row'>
					<div class='col-sm-12'>
					<?php
			if(isset($_REQUEST['msg']))
				echo "<h4 style='color:red'>Transaction failed. Try again!</h4>";
		
		?>
		<br>
					<h4>Shipping Address & Payment</h4>
				</div>
			</div>
	
			<div class='row'>
			
				<div class='col-sm-12'>
					Address<br>
					<textarea class='form-control' rows='1' name='address' required></textarea>
				</div>
			</div>
	
		
			<div class='row'>
				<div class='col-sm-12'>
					Zipcode<br>
					<input type='text' name='zipcode' class='form-control' required>
				</div>
			</div>
		
			<div class='row'>
				<div class='col-sm-12'>
					Card Type<br>
					<input type='radio' name='cardtype' value='credit' checked> Credit Card 
					<input type='radio' name='cardtype' value='debit'> Debit Card 
					
				</div>
			</div>
			
			
			<div class='row'>
				<div class='col-sm-12'>
					Card Number<br>
					<input type='number' name='cardno' class='form-control' min='1000000000000000' max='9999999999999999' required>
				</div>
			</div>
			
			<div class='row'>
				<div class='col-sm-12'>
					Expiry Date<br>
					<input type='text' name='expdate' class='form-control'   required>
				</div>
			</div>
			
			<div class='row'>
				<div class='col-sm-12'>
					CVV<br>
					<input type='number' name='cvv' class='form-control'   required>
				</div>
			</div>
			
			<div class='row'>
				<div class='col-sm-12'>
				<input type='hidden' name='amount' value='<?php echo $total;?>'>
					<br><input type='submit' name='submit' value='Place Order <?php echo $total.' $';?>' class='form-control btn btn-primary'>
				</div>
			</div>
		
		</form>
		
		
		</div>

</div>
	
</body>
</html>
