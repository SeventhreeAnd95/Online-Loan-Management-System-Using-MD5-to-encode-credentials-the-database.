<?php
session_start();
$_SESSION['current'] = 'home';
include("config.php");
if (empty ($_SESSION['u_id']))
	{
    	header("Location: index.php");
    	exit;
	}

//$uid=$_SESSION["u_id"];
$_SESSION['lid'] ="";
$_SESSION['month'] ="";
$_SESSION['emi'] ="";
$_SESSION['duedate'] ="";
$_SESSION['cdate'] ="";
$cardnum = '';
$expdatemm = 'MM';
$expdateyy = 'YY';
if(isset($_GET['lid']))
{
	if(isset($_GET['month']))
	{
		if(isset($_GET['emi']))
		{
			if(isset($_GET['duedate']))
			{
				if(isset($_GET['cdate']))
				{
					$uid=$_SESSION["u_id"];
					$lid =$_GET['lid'];
					$_SESSION['lid'] =$_GET['lid'];
					$_SESSION['month'] =$_GET['month'];
					$_SESSION['emi'] =$_GET['emi'];
					$_SESSION['duedate'] =$_GET['duedate'];
					$_SESSION['cdate'] =$_GET['cdate'];
					$result = mysql_query("SELECT * FROM applyloan WHERE status ='Approved' and loan_id = '$lid' and u_id=".$uid)or die(mysql_error());
					if($row = mysql_fetch_array( $result ))
					{
						$result1 = mysql_query("SELECT * FROM user WHERE u_id=".$uid)or die(mysql_error());
						if($row1 = mysql_fetch_array( $result1 ))
						{
							$cardnum = $row1['cardnum'];
							
							$expdatemm = $row1['expdatemm'];
							$expdateyy = $row1['expdateyy'];
							
							if($cardnum ==0)
							{
								$cardnum = '';
							}
							if($expdatemm ==0)
							{
								$expdatemm = 'MM';
							}
							if($expdateyy ==0)
							{
								$expdateyy = 'YY';
							}
							
							
						}
					}
					else
					{
						header("Location:logout.php");
					}						
				}
			}
		}
	}
}
else
{
	header("Location:logout.php");
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
    <!-- ##### Header Area End ##### --><br>
	<form action="payemi.php" method="post">
	<h4 class="align">Pay Your EMI By Using Your DEBIT/CREDIT Card</h4></br></br>
		 <div class="align">
			<div>
				<span>
					<label>Card Number</label>
				</span> 				
				<span>
					<input name="cardnumber" type="text" class="textbox" style="width:300px" required maxlength="16" value="<?php echo $cardnum;?>">
				</span>
			</div>
			<div>
				<span>
					<label>Expiry Date</label>
				</span> 
				<span>
					<input name="expdatemm" type="text" class="textbox" style="display:inline;width:60px" value="<?php echo $expdatemm;?>" required maxlength="2"> / <input name="expdateyy"type="text"class="textbox"style="display:inline;width:60px"value="<?php echo $expdateyy;?>" required maxlength="2">
				</span>
			</div>
			<div>
				<span>
					<label>CVV</label>
				</span> 
				<span>
					<input name="cvv" type="text" class="textbox" style="width:100px" required maxlength="3">
				</span>
			</div><br>
		</div>		
	
	<div class="align">
		<input type="submit" name ="pay" class="btn credit-btn box-shadow btn-2" value="pay"/><br><br><br>
	</div>
</form>
    <!-- ##### Footer Area Start ##### -->
    <?php include("footer.php"); ?>
    <?php include("footerjs.php"); ?>
	
</body>
</html>