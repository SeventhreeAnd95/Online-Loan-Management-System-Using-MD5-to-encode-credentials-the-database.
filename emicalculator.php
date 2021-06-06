<?php
if(isset($_POST['submit']))
{
	$loanamount = $_POST['loanamount'];
	$tenure = $_POST['tenure'];
	$interestrate = $_POST['interestrate'];
	
	$monthlyrate = $interestrate/12;
	$p_into_r = $loanamount*$monthlyrate/100;
	$static = 1;
	$static_plus_r = $static + ($monthlyrate/100) ;
	//echo $p_into_r;
	//echo "<br/>";
	//echo $static_plus_r;
	
	//echo "<br/>";
	$static_plus_r_restto_n =round(pow($static_plus_r, $tenure),5);
	//echo round($static_plus_r_restto_n,5);
	$static_plus_r_restto_n_1 = round($static_plus_r_restto_n-1,5);
	//echo $static_into_r;
	//echo "<br/>";
	$emimonthly = round($p_into_r*($static_plus_r_restto_n/$static_plus_r_restto_n_1),2);
	//echo $emimonthly;
}
//echo(pow(5, 2)); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("head.php"); ?>
	<link rel="stylesheet" type="text/css" href="custom.css">
</head>

<body>
    <?php include("header.php"); ?>
    <!-- ##### Header Area End ##### -->
	<div> <br></div>
    <div>
		<h4 class="align"> EMI Calculator</h4>
		<form action="emicalculator.php" method="post" class="emiform"><br>
			<table class="table1">
				<tr>
					<td>Loan Amount </td>
					<td><input type="text" name="loanamount" size="40" maxlength="10" width="48" height="48" value="<?php if(isset($_POST['submit'])){echo $loanamount;}?>" required></td>
				</tr>
				<tr>	
					<td>Tenure in Months </td>
					<td><input type="text" name="tenure" size="40" maxlength="10" width="48" height="48" value="<?php if(isset($_POST['submit'])){echo $tenure;}?>" required></td>
				</tr>	
				<tr>	
					<td>Interest Rate </td>
					<td><input type="text" name="interestrate" size="40" maxlength="10" width="48" height="48" value="<?php if(isset($_POST['submit'])){echo $interestrate;}?>" required></td>
				</tr>	
				<tr>
					<td></td>					
					<td class="align"><input type="submit" name="submit"  value= "submit" class="btn credit-btn box-shadow btn-2"></td>
				</tr>	
			</table>	
		</form><br></br>
<?php
if(isset($_POST['submit']))
{
?>
		<h4 class="align"> Display For monthly EMI</h4>
		
		<table class="table1">	
			<tr>
				<th>Month</th>
				<th>Opening Amount </th>
				<th>Interest Rate</th>
				<th>Interest Amount</th>
				<th>Total with Interest</th>
				<th>PayEMI</th>
				<th>Closing Amount </th>				
			</tr>
			<?php
			for($i=1;$i<=$tenure;$i++)
			{
			?>
			<tr>
				<td><?php echo $i;?> </td>
				<td><?php echo round($loanamount,2);?></td>
				<td><?php echo $interestrate;?></td>
				<td><?php echo round(($loanamount*$interestrate/100)/12,2);?></td>
				<td><?php echo round($loanamount + (($loanamount*$interestrate/100)/12),2);?></td>
				<td><?php echo $emimonthly;?></td>
				<td><?php echo round(($loanamount + (($loanamount*$interestrate/100)/12))-$emimonthly,2);?></td>
			</tr>
			<?php
			$loanamount =round(($loanamount + (($loanamount*$interestrate/100)/12))-$emimonthly,2);
			}
			?>
			
			
			
		</table>
<?php
}
?>		
		<br><br><br><br>	
	</div>

    <!-- ##### Footer Area Start ##### -->
    <?php include("footer.php"); ?>    
	<?php include("footerjs.php"); ?>
	
</body>
</html>