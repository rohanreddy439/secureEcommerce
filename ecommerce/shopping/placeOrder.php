<?php session_start(); 
if(!isset($_SESSION['email']))
{
	echo "<script language='javascript'>window.location='../home.php';</script>";
	return;
}

include "../mysqldb.php";

$cardno = $_REQUEST['cardno'];
$_SESSION['cardno']=$cardno;
$_SESSION['amount']=$_REQUEST['amount'];
$cardtype = $_REQUEST['cardtype'];
$expdate = $_REQUEST['expdate'];
$cvv = $_REQUEST['cvv'];

$otp = rand(10000,99999);
$_SESSION['otp'] = $otp;
$_SESSION['productCode']=$_REQUEST['productCode'];

$qry="select * from accounts where cardtype='$cardtype' and cardnumber='$cardno' and expdate='$expdate' and cvv='$cvv'";
$result=mysqli_query($conn, $qry);
if($row = mysqli_fetch_assoc($result)){
	 echo "<script language='javascript'>window.location='paymentOTP.php';</script>";
}
else
{
	 echo "<script language='javascript'>window.location='cart.php?msg=failed';</script>";
}

?>