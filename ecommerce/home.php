<!DOCTYPE html>
<html lang="en">
<head>
 
 <?php include "head_includes.php"; ?>
  
</head>
<body style="background-color: bodycolor;background-image: url(images/)">

<?php include "mainmenu.php"; ?>


<div class="container">    
   <div class="row">
    <div class="col-lg-6">
      <img src="images/ecommerce.jpg"  style='width:100%' alt="Image" >
    </div>
	
	<div class="col-lg-6">
			<div class="container" style="background-color: #ffffff;width:100%">
    <br>
    <div class="row">
        <div class="col-sm-12">
            <div >
                <img src="images/user.png" style="width:130px;height:130px" class="profile-img rounded-circle" alt="give image path">
				<form name='f1' method='post' action="login_code.php" >
                
					<div class='row'>
						<div class='col-md-12'>
							<label for='email'>Email:</label>
							<input type='email' class='form-control' id='email' placeholder='Enter email' name='email' required >
						</div>
					</div>
					<div class='row'>
						<div class='col-md-12'>
							<label for='password'>Password:</label>
							<input type='password' class='form-control' id='password' placeholder='Enter password' name='password' required >
						</div>
					</div>
					<br>
					<button class="btn btn-lg btn-info btn-block" type="submit">
						Sign in</button>
						<br>
					<label class="checkbox pull-left">
						<a href="customerRegistration.php" class="text-center new-account">New Customer? Create Account </a>
                </label>
               
                </form>
            </div>
            
			
        </div>
    </div>
	<br><center>
			<?php if (isset($_REQUEST["msg"])) {
       echo "<br><h2>Invalid Username/Password</h2>";
   } ?>

			</center>
</div>
    </div>
   </div>
</div><br>

<br><br>
</body>
</html>
