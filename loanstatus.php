<?php
session_start();
$_SESSION['current'] = 'home';
include("config.php");

	
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("head.php"); ?>
	<link rel="stylesheet" type="text/css" href="custom.css">
</head>

<body>
    <?php include("header.php"); ?><br><br>
    <!-- ##### Header Area End ##### -->
	
	
	
	<form action="interest.php" method="post">
		<h4 class="align">Current Status Of Your Loan</h4></br></br>
				
			<br>
			<table class="table1">
				<tr>
					<th>Loan ID</th>
					<th>Loan Type</th>
					<th>Loan Amount</th>
					<th>How Many Months</th>
					<th>Interest Rate</th>
					<th>Status</th>
					<th>View</th>
				</tr>
				<?php
					$uid=$_SESSION["u_id"];
					$result = mysql_query("SELECT * FROM applyloan  WHERE status !='Approved' and u_id=".$uid)or die(mysql_error());
					
					while($row = mysql_fetch_array( $result )) { 
				?>
	
				<tr>
					<td><?php echo $row['loan_id']; ?></td>
					<td><?php echo $row['Loantype']; ?></td>
					<td><?php echo $row['Loanamount']; ?></td>
					<td><?php echo $row['Totalmonths']; ?></td>
					<td><?php echo $row['Percentage']; ?></td>
					<td><?php echo $row['status']; ?></td>
					<td><a href="view.php?lid=<?php echo $row['loan_id'];?>"  class="ubtn">View</a></td>
				</tr>
				<?php
					}
				?>
			
				
			</table><br><br>
	</form>
	

    <!-- ##### Footer Area Start ##### -->
    <?php include("footer.php"); ?>    
	<?php include("footerjs.php"); ?>
	
</body>
</html>