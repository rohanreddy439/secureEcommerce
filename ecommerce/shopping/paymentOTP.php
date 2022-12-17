<?php session_start(); 
if(!isset($_SESSION['email']))
{
	echo "<script language='javascript'>window.location='../home.php';</script>";
	return;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include '../head_includes.php';?>

</head>
<body class='bg' style="background-image: url('../images/eback1.jpg');">

<?php 
include 'menu.php';
//echo $_SESSION['otp'];
 ?>
<div class="container" style="" >

  <h2>Enter OTP to complete payment</h2>
  <form name='f1' method='post' >
	<input type='hidden' name='mobile' id='mobile' value="+1<?php echo $_SESSION['mobile'];?>">
		<div id="recaptcha-container"></div>
        
        
<div class='row'>
	<div class='col-md-6'>
		<label for='otp'>OTP</label>
		<input type='number' class='form-control' id='verficationcode' placeholder='otp' name='verficationcode' required >
	</div>
	
</div>
   <br>
	
	<button type="button" class="btn btn-default btn-warning" onclick="codeverify()">Continue Payment</button>
   </form>
   <br>
   
   <?php if (isset($_REQUEST["msg"])) {
       echo "<br><h2>Invalid OTP</h2>";
   } ?>
</div>
		<br><br><br><br><br>
		
<script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>
<script>
// For Firebase JS SDK v7.20.0 and later, measurementId is optional

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
		window.location="paymentOTP_code.php";
		
	}).catch(function(){
		window.location="paymentOTP.php?msg=aa";
	});
}

</script>
		
</body>
</html>
