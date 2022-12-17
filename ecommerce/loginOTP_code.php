<?php 
session_start();

include 'mysqldb.php';

/*$otp='0';
if(isset($_REQUEST['otp']))
	$otp = $_REQUEST['otp'];

*/
//if($otp == $_SESSION['otp'])
//{

	$qry="update customers set otp='varified', status='Active' where email='".$_SESSION['email']."'";

	if(mysqli_query($conn, $qry))
	 {
		 echo "<script language='javascript'>window.location='home.php';</script>";
	}
	 else 
	 {
		 echo "<script language='javascript'>window.location='registrationOTP.php?msg=Invalid OTP';</script>";
	}
/*}
else{
	 echo "<script language='javascript'>window.location='registrationOTP.php?msg=Invalid OTP';</script>";
}*/
mysqli_close($conn);
?>