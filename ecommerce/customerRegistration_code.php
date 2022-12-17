<?php 
session_start();

include 'mysqldb.php';
if(isset($_REQUEST['customername']))
	$customername=$_REQUEST['customername'];
else
	$customername='null';

if(isset($_REQUEST['address']))
	$address=$_REQUEST['address'];
else
	$address='null';

if(isset($_REQUEST['zipcode']))
	$zipcode=$_REQUEST['zipcode'];
else
	$zipcode='null';

if(isset($_REQUEST['mobile']))
	$mobile=$_REQUEST['mobile'];
else
	$mobile='null';

if(isset($_REQUEST['email']))
	$email=$_REQUEST['email'];
else
	$email='null';

if(isset($_REQUEST['password']))
	$password=$_REQUEST['password'];
else
	$password='null';

$otptype=$_REQUEST['otptype'];


$otp = rand(1000,9999);
$_SESSION['otp']=$otp;
$_SESSION['email']=$email;
$qry="insert into customers(customername,address,zipcode,mobile,email,password,otp,status,registerDate) values('$customername','$address','$zipcode','$mobile','$email','$password','$otp','InActive',curdate())";
//echo $qry;
if(mysqli_query($conn, $qry))
 {
	 $_SESSION['mobile']=$mobile;
	 
	 echo "<script language='javascript'>window.location='registrationOTP.php';</script>";
	 //echo "<script language='javascript'>window.location='registrationOTP.php?mobile=".$mobile."';</script>";
	 
	
}
 else 
 {
	 echo "<script language='javascript'>window.location='customerRegistration.php?msg=Registration Failed';</script>";
}
mysqli_close($conn);
?>