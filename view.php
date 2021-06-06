<?php

session_start();
$_SESSION['current'] = 'home';
include("config.php");
	if(isset($_GET['lid']))
	{
		$loan_id = $_GET['lid'];
	}
  
  $sql = "SELECT DL, PAN, Residence, Adhar_id, Loantype, Totalmonths, Loanamount, Percentage FROM applyloan WHERE loan_id='$loan_id'";
  //echo $sql;
  $result = mysql_query($sql);
  $row = mysql_fetch_assoc($result);
  //mysql_close($link);

  //header("Content-type: image/jpeg");
  $dl = $row['DL'];
  $pan = $row['PAN'];
  $Residence = $row['Residence'];
  $Adhar_ID=$row['Adhar_id'];
  $Loan_Type=$row['Loantype'];
  $Total_Months=$row['Totalmonths'];
  $Loan_Amount=$row['Loanamount'];
  $Percentage=$row['Percentage'];

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
<h4 class="align">View Loan Details</h4>
<br>
<form action="">
 <table class="table2 align">
  <tr>
		<th>Driving License</th>
		<td><img src="<?php echo $dl;?>" width="150" height="150" /></td>

	</tr>
	<tr>
	<th>Pan Card</th>
	<td><img src="<?php echo $pan;?>" width="150" height="150" /></td>

	<tr>
	<th>Residencial Proof</th>
	<td><img src="<?php echo $Residence;?>" width="150" height="150" /></td>

	</tr>
	<tr>
		<th>Adhar ID</th>
		<td><?php echo $Adhar_ID; ?></td>
	</tr>
	<tr>
	<th>Loan Type</th>
	<td><?php echo $Loan_Type; ?></td>
	</tr>
	<tr>
	<th>Total Months</th>
	<td><?php echo $Total_Months; ?></td>
	</tr>
	<tr>
	<th>Loan Amount</th>
	<td><?php echo $Loan_Amount; ?></td>
	</tr>
	<tr>
	<th>Percentage</th>
	<td><?php echo $Percentage; ?></td>
	</tr>
</table>

</form>

	
	<br><br>
		
	  <?php include("footer.php"); ?>
    
		<?php include("footerjs.php"); ?>
</body>
</html>