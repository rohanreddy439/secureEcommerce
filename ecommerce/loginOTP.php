<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include 'head_includes.php';?>

</head>
<body class='bg' style="background-image: url('images/eback1.jpg');">

<?php 
include 'mainmenu.php';
 ?>
<div class="container" style="" >
<br><br><br>
<input type='hidden' name='mobile' id='mobile' value="+1<?php echo $_SESSION['mobile'];?>">
		<div id="recaptcha-container"></div>
  <h2>Enter OTP to complete registration</h2>
 
        
<div class='row'>
	<div class='col-md-6'>
		<label for='customername'>OTP</label>
		<input type='number' class='form-control' id='verficationcode' placeholder='otp' name='verficationcode' required >
	</div>
	
</div>
   <br>
	<button type="button" class="btn btn-default btn-warning" onclick="codeverify()">Verify</button>

   <br>
   
   <?php if (isset($_REQUEST["msg"])) {
       echo "<br><h2>Invalid OTP</h2>";
   } ?>
</div>
		<br><br><br><br><br>
		
<script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>
<script>


const firebaseConfig = {

  apiKey: "AIzaSyB3qQV9-x-EFq6OQoyVuXDQYybxz67lJl8",
  authDomain: "ecommerce-23d30.firebaseapp.com",
  projectId: "ecommerce-23d30",
  storageBucket: "ecommerce-23d30.appspot.com",
  messagingSenderId: "379353665817",
  appId: "1:379353665817:web:1fef58ae212b9745c4f588",
  measurementId: "G-WYR36F79MG"
};
firebase.initializeApp(firebaseConfig);
render();

function render(){
	window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
	recaptchaVerifier.render();
}

//function phoneAuth(){
	var number = document.getElementById("mobile").value;
	
	firebase.auth().signInWithPhoneNumber(number,
	window.recaptchaVerifier).then(function(confirmationResult){
		window.confirmationResult = confirmationResult;
		coderesult = confirmationResult;
		window.alert(confirmationResult);
	}).catch(function(error){
alert(error.message);
});
//}

function codeverify(){
	var code = document.getElementById('verficationcode').value;
	coderesult.confirm(code).then(function(){
		window.alert('verfied');
		//window.location="loginOTP_code.php";
		window.location="shopping/ecommerceHome.php";
		
	}).catch(function(){
		window.location="loginOTP.php?msg=aa";
	});
}

</script>
</body>
</html>