<?php
session_start();
$_SESSION['current'] = 'home';
include("config.php");
$e ="";
 if(isset($_POST['u_submit'])) 
	{
    	//include("config.php");
		
		$name=$_POST['u_name'];
		$email=$_POST['u_email'];
		$contact=$_POST['u_contact'];
		$password=md5($_POST['u_password']);

		$check = mysql_query(" SELECT u_email FROM user WHERE u_email='$email'");
		$num_rows = mysql_num_rows($check);
		if($num_rows>0)
		{
			$e = "<font color='red'>Email already exists...!!</font>";
			//header("Location:signup.php?e=$e");
		}
		else
		{
			$sql = "INSERT INTO user". "( u_name, u_email, u_contact, u_password) "." VALUES('$name','$email','$contact','$password')";
				
			$retval = mysql_query($sql);

			if(! $retval ) 
			{
				//die('Could not enter data: ' . mysql_error());
				//$loc=header("Location: signup.php");
				
			}
			else
			{
				//$loc=header("Location: signup.php");
				$e =  "<font color='green'>Entered data successfully\n</font>";	
			}
		}
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("head.php"); ?>
</head>

<body>
    <?php include("header.php"); ?>
    <!-- ##### Header Area End ##### -->

	<div id="content">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="box"><br><br>
						<h2 class="text-uppercase">Login</h2>
						<?php
							if(isset($_GET["uid"])) {
							if($_GET["uid"]==1) {
						?>
							<div style="color:red;">
						Please Enter Correct Details
					</div>
						<?php
					}
					}
					?>
						<hr>

						<form action="login.php" method="post">
							<div class="form-group">
								<label for="email">Email</label>
								<input type="text" name="email" class="form-control" id="email" required>
							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" name="pass" class="form-control" id="pass" required>
							</div>
							<div class="text-center">
								<span>
									<input type="submit" class="btn credit-btn box-shadow btn-2" name="usubmit" value="Submit">
								</span>
							</div><br><br>	
							<!--<div class="text-center">
								<a href="login.php" class="btn credit-btn box-shadow btn-2">Log in</a>
							</div> -->
						</form>
					</div>
				</div>

				<div class="col-md-6">
					<div class="box"><br><br>
						<h2 class="text-uppercase">Sign Up</h2>
						<?php echo $e;?>
						<hr>
						<form action="signup.php" method="post">
							<div class="form-group">
								<label for="name">Name</label>
								<input type="text" class="form-control" name="u_name" id="u_name" placeholder="Name" required>
							</div>
							<div class="form-group">
								<label for="email">Email</label>
								<input type="text" class="form-control" name="u_email" id="u_email" placeholder="Email Id" required>
							</div>
							<div class="form-group">
								<label for="contact">Contact</label>
								<input type="tel" class="form-control" name="u_contact" id="u_contact" placeholder="Contact" required>
							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" class="form-control" name="u_password" id="u_password" placeholder="Password" required>
							</div>
							<div class="text-center">
								<span >
									<input type="submit" class="btn credit-btn box-shadow btn-2" name="u_submit" value="Submit">
								</span>
							</div><br><br>
							<!--<div class="text-center">
								<a href="registration.php" name="u_submit" id="submit" class="btn credit-btn box-shadow btn-2">Submit</a>
							</div>-->
						</form>
					</div>
				</div>
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container -->
	</div>
		<!-- ##### Footer Area Start ##### -->
    <?php include("footer.php"); ?>
	<?php include("footerjs.php"); ?>	
</body>
</html>	