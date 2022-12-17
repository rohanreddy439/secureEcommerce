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


<div class="container">    
   <div class="row">
    	<div class="col-sm-4">
		
				<div class="card" style="width:200px">
				<img class="card-img-top" src="../images/laptop1.jpg" alt="Card image" style="width:100%">
				<div class="card-body">
				  <h4 class="card-title">HCL Laptop</h4>
				  <p class="card-text">HCL ME Core i5 3rd Gen - (4 GB/500 GB HDD/DOS) HCLAE2V0156N Laptop (15.84 inch, Black, 2 kg) ;</p>
				  <p>Cost: 400$</p>
				  <a href="cart.php?p=1" class="btn btn-primary">Buy</a>
				</div>
			  </div>
						
			
        </div>
		
		<div class="col-sm-4">
		
				<div class="card" style="width:200px">
				<img class="card-img-top" src="../images/laptop2.jpg" alt="Card image" style="width:100%;height:200px" >
				<div class="card-body">
				  <h4 class="card-title">Apple Laptop</h4>
				  <p class="card-text">‎MacBook Air with M1 chip · ‎M2 chip · ‎Buy MacBook Air with M2 Chip<br></p>
				  <p>Cost: 700$</p>
				  <br>
				  <a href="cart.php?p=2" class="btn btn-primary">Buy</a>
				</div>
			  </div>
						
			
        </div>
		
		
    </div>
	<br><center>
		

			</center>
</div>
    </div>
   </div>
</div><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br>
</body>
</html>
