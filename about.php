<?php
session_start();
$_SESSION['current'] = 'home';
include("config.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("head.php"); ?>
</head>

<body>
    <?php include("header.php"); ?>
    <!-- ##### Header Area End ##### -->

   <div style="height:50px"></div>

    <h5>Loan management system is an advanced and comprehensive bank loan management system that aims to improve the quality, turnaround time and service for end-customers. As a loan management solution, it enables financial institutions to automate the processes for achieving cost savings and enhanced customer experience.</h6>
<br>
<br>
<br>
	<marquee><img src="img\bg-img\5.jpg" height="300" width="300"/>&nbsp;&nbsp;&nbsp;&nbsp;<img src="img\bg-img\5.jpg"" height="300" width="300"/></marquee>

    	<div style="height:300px"></div>

    <!-- ##### Footer Area Start ##### -->
    <?php include("footer.php"); ?>
    
		<?php include("footerjs.php"); ?>
	
</body>

</html>