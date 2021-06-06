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
	<h4 class="align">Charges Details</h4>
	
	<?php
		$count = mysql_query("SELECT * FROM category") or die(mysql_error());
		$row_count = mysql_fetch_array($count);
		if ($row_count != 0) {
	?><br>
	<form action="">
		<table class="table1 align">
			<tr align="center">
				<th>Name</th>  
				<th>Rate</th> 
				
				
			</tr>
			<?php
                  $qq1 = mysql_query("SELECT * FROM emi") or die(mysql_error());
                  while ($row = mysql_fetch_array($qq1))
					  {
                  ?>
			<tr>
				<td><?php echo $row['cat'];?></td>
				<td><?php echo $row['rate'];?></td>
				
			</tr>
			
			
					  <?php }}?>
			</table>
	</form>
	</br></br>

	<?php include("footer.php"); ?>
	<?php include("footerjs.php"); ?>
	
</body>
</html>