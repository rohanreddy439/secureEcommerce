<?php 
session_start();
include 'mysqldb.php';

if(isset($_REQUEST['email']))
	$email=$_REQUEST['email'];
else
	$email='null';

if(isset($_REQUEST['password']))
	$password=$_REQUEST['password'];
else
	$password='null';

$qry="select * from customers where email='$email' and password='$password'";
$rs=mysqli_query($conn, $qry);
 if($row = mysqli_fetch_assoc($rs))
{
			$_SESSION['email']=$email;			
			$_SESSION['password']=$password; 
			$_SESSION['mobile']=$row['mobile'];
			//echo "<script language='javascript'>window.location='shopping/ecommerceHome.php';</script>";
			//echo "<script language='javascript'>window.location='loginOTP.php?mobile=".$row['mobile']."';</script>";
			echo "<script language='javascript'>window.location='loginOTP.php';</script>";
}
 else 
 {
	$qry="select * from admin where username='$email' and password='$password'";
	$rs=mysqli_query($conn, $qry);
	if($row = mysqli_fetch_assoc($rs))
	{
		echo "<script language='javascript'>window.location='admin/adminHome.php';</script>";
	}
	else
	{
		echo "<script language='javascript'>window.location='home.php?msg=Invalid username/password';</script>";
	}
 }
mysqli_close($conn);
?>