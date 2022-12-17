<!DOCTYPE html>
<html lang="en">
<head>
 <?php session_start();
if(!isset($_SESSION['email']))
{
	echo "<script language='javascript'>window.location='../home.php';</script>";
	return;
}
?>
 <?php include "../head_includes.php"; ?>
  
</head>
<body class='bg' style="background-image: url('../images/eback1.jpg');">

<?php include "menu.php"; ?>

<?php include "../mysqldb.php"; ?>

<div class="container">    
  <h2>Orders..</h2>
<?php
  $qry="select A.customername,A.mobile,A.email,B.productCode,B.paydate,B.amount from customers A,payments B where A.email=B.email";
$rs=mysqli_query($conn, $qry);
if (mysqli_num_rows($rs) > 0) 
{
	echo "<br><table class='table table-bordered display' id='table_id'>";
	echo "<thead class='table-light'>";
	echo "<tr>";
	echo "<th>customername</th>";
	echo "<th>mobile</th>";
	echo "<th>email</th>";
	echo "<th>Product</th>";
	echo "<th>paydate</th>";
	echo "<th>amount</th>";
	echo "</tr>";
	echo "</thead>";
	echo "<tbody>";
	while($row = mysqli_fetch_assoc($rs))
	{
		echo "<tr>";
		 echo "<td>".$row['customername']."</td>";
		 echo "<td>".$row['mobile']."</td>";
		 echo "<td>".$row['email']."</td>";
		 echo "<td>".getProduct($conn, $row['productCode'])."</td>";
		 echo "<td>".$row['paydate']."</td>";
		 echo "<td>".$row['amount']."</td>";
		echo "</tr>";
	}
	echo "</tbody>";
	
	echo "</table>
</div>";
}
else
{

	echo "<h3>Records Not Found</h3>";
}
mysqli_close($conn);


function getProduct($conn, $productCode){
	$qry="select productName,productDesc,Cost from cart where productCode='$productCode'";
	$rs=mysqli_query($conn,$qry);
	$ss="";
	if($row=mysqli_fetch_assoc($rs)){
		$ss="".$row['productName'].", ".$row['productDesc'].", ".$row['Cost'];
	}
	return $ss;
}

?>
   </div>
   <br>
   
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>
		<script>
		$(document).ready( function () {
    $('#table_id').DataTable();
} );
		</script>
		
</body>
</html>
