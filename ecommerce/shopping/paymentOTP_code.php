<?php session_start(); 
if(!isset($_SESSION['email']))
{
	echo "<script language='javascript'>window.location='../home.php';</script>";
	return;
}

include '../mysqldb.php';

/*$otp='0';
if(isset($_REQUEST['otp']))
	$otp = $_REQUEST['otp'];



if($otp == $_SESSION['otp'])
{*/

	$qry="update accounts set balance=balance-".$_SESSION['amount']." where cardnumber='".$_SESSION['cardno']."'";
	//echo $qry;
	

	if(mysqli_query($conn, $qry))
	 {
		 
		 $qry="insert into payments(productCode,email,paydate,amount) values('".$_SESSION['productCode']."','".$_SESSION['email']."',now(),'".$_SESSION['amount']."')";
		// echo $qry;
		 mysqli_query($conn, $qry);
		 echo "<script language='javascript'>window.alert('payment done');window.location='ecommerceHome.php';</script>";
	}
	 else 
	 {
		 echo "<script language='javascript'>window.location='cart.php?msg=Invalid OTP';</script>";
	}
/*}
else{
	  echo "<script language='javascript'>window.location='cart.php?msg=Invalid OTP';</script>";
}*/
mysqli_close($conn);
?>

