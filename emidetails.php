<?php
session_start();
$_SESSION['current'] = 'home';
include("config.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" type="text/css" href="custom.css">
    <?php include("head.php"); ?>
</head>

<body>

    <?php include("header.php"); ?>
	<br>
		<h4 class="align">EMI DETAILS</h4>
		
	<br>
	<div >
		
		
	</div>	
	
		
	<br><br>
	
	
	<form action="" >
		<table class="table1">
			<tr>
				<th>Loan ID</th>
				<th>Loan Type</th>
				<th>Loan Amount</th>
				<th>How Many Months</th>
				<th>Interest Rate</th>
				<th>Start Date</th>
				<th>View</th>
				<th>Emi Calculation</th>
			</tr>
			<?php
				$uid=$_SESSION["u_id"];
				$result = mysql_query("SELECT * FROM applyloan WHERE status ='Approved' and u_id=".$uid)or die(mysql_error());
				
				while($row = mysql_fetch_array( $result )) { 
			?>
			<tr>
				<td><?php echo $row['loan_id']; ?></td>
				<td><?php echo $row['Loantype']; ?></td>
				<td><?php echo $row['Loanamount']; ?></td>
				<td><?php echo $row['Totalmonths']; ?></td>
				<td><?php echo $row['Percentage']; ?></td>
				<td><?php echo $row['startdate']; ?></td>
				<td><a href="view.php?lid=<?php echo $row['loan_id'];?>"  class="ubtn">View</a></td>
				<td><a href="emicalculation.php?lid=<?php echo $row['loan_id']; ?>"   class="ubtn">Emi Calculation</a>
				</td></tr>
			<?php
				}
			?>
		</table>
	</form>	
	
	<br><br>
		
	  <?php include("footer.php"); ?>
    
		<?php include("footerjs.php"); ?>
	
</body>

</html>