<?php
	session_start();
	include('config.php');
	$uemail=$_POST['email']; 
	$upassword=md5($_POST['pass']); 
	$sql="SELECT * FROM user WHERE u_email='$uemail' and u_password='$upassword'";
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result);
	if($row)
	{
			$_SESSION['u_id']=$row['u_id'];
			$_SESSION['u_email']=$row['u_email'];
			$_SESSION['u_name']=$row['u_name'];
			header("location:index.php");
	}
	else 
	{
		header("location:signup.php?uid=1");
	}
?>
