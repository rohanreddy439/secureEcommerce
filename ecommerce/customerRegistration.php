<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include 'head_includes.php';?>
  		
<script type="text/javascript">
    
function ComparePasswords() {
      
	 var pwd = document.getElementById("password").value;
        
	var cpwd= document.getElementById("cpassword").value;
        
	if (pwd != cpwd) {
         
		   alert("Mismatch passwords");
			
		document.getElementById("cpassword").value="";
            
		return false;
       
	 }
	 
	 if(pwd.length<8 || pwd.length>16){
		   alert("Password length should be 8 to 16.");
		   return false;
	 }
	 
        
		return true;
    }
</script>
</head>
<body class='bg' style="background-image: url('images/eback1.jpg');">

<?php 
include 'mainmenu.php';
 ?>
<div class="container" style="" >
  <h2>New Customer Registration</h2>
  <form name='f1' method='post' action="customerRegistration_code.php" enctype="multipart/form-data">
	
        
        
<div class='row'>
	<div class='col-md-6'>
		<label for='customername'>Customername</label>
		<input type='text' class='form-control' id='customername' placeholder='Customername' name='customername' required >
	</div>
	<div class='col-md-6'>
		<label for='address'>Address</label>
		<textarea rows='1' class='form-control' id='address' placeholder='Address' name='address' required ></textarea>
	</div>
</div>
<div class='row'>
	<div class='col-md-6'>
		<label for='zipcode'>Zipcode</label>
		<input type='number' class='form-control' id='zipcode' placeholder='Zipcode' name='zipcode' required >
	</div>
	<div class='col-md-6'>
		<label for='mobile'>Mobile</label>
		<input type='number' class='form-control' id='mobile' placeholder='Mobile' name='mobile' required >
	</div>
</div>
<div class='row'>
	<div class='col-md-6'>
		<label for='email'>Email</label>
		<input type='email' class='form-control' id='email' placeholder='Email' name='email' required >
	</div>
	<div class='col-md-6'>
		<label for='password'>Password</label>
		<input type='password' class='form-control' id='password' placeholder='Password' name='password' required >
	</div>
	<div class='col-md-6'>
		<label for='cpassword'>Confirm-password:</label>
		<input type='password' class='form-control' id='cpassword' placeholder='Confirm-Password' name='cpassword' onfocusout='ComparePasswords()'required >
		</div>



<div class='col-md-6'>
		<label for='cpassword'>How you want to receive OTP </label>
		<select name='otptype' class='form-control'>
			<option>SMS</option>
			<option>EMAIL</option>
		</select>
		
		</div>
</div>





   <br>
	<button type="submit" class="btn btn-default btn-warning">Create Account</button>
   </form>
     <br>
   
   <?php if (isset($_REQUEST["msg"])) {
       echo "<br><h2>Registration failed. Try again!!!</h2>";
   } ?>
</div>
		</div>
		
</body>
</html>
