<?php
session_start();
$_SESSION['u_id'] = 1;
if (empty ($_SESSION['u_id']))
	{
    	header("Location: index.php");
    	exit;
	}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <?php include("head.php"); ?>
	<link rel="stylesheet" type="text/css" href="custom.css">
</head>

<body>
    <?php include("header.php"); ?>
	<br>
	<h4 class="align">Change Password</h4></br>
	
		<form action="changep.php" method="post">		
			<div>
				<span>
					<label>PASSWORD</label>
				</span>
				<span>
					<input type="password" name="pass" value="" required>
				</span>
			</div>
			<div>
				<span>
					<label>CONFIRM PASSWORD</label>
				</span>
				<span>
					<input type="password" name="cpass" value=""  required>
				</span>
			</div>
			<div>
				<span>
					<label>Repeat CONFIRM PASSWORD</label>
				</span>
				<span>
					<input type="password" name="rcpass" value=""  required>
				</span>
			</div>
			<div>
				<span>
					<input type="submit" class="btn credit-btn box-shadow btn-2" name="cpsubmit" value="Submit">
				</span>
			</div>
		</form> </br></br></br>

<?php include("footer.php"); ?>    
<?php include("footerjs.php"); ?>	

</body>
</html>