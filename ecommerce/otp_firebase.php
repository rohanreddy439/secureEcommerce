<html>
<body >
	<form name='f1'>
		<input type='text' name='mobile' id='mobile' value="+91<?php echo $_REQUEST['mobile'];?>">
		<div id="recaptcha-container"></div>
		<input type='button' name='b1' onclick='phoneAuth()' value='send otp'>
		
		<br>
		<input type='text' name='verficationcode' id='verficationcode'>
		<input type='button' name='b2' id='b2' onclick='codeverify()' value='Verify'>
		
	</form>
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
		//window.alert('verfied');
		window.location="registrationOTP_code.php";
		
	}).catch(function(){
		alert('error');
	});
}

</script>
</body>
</html>