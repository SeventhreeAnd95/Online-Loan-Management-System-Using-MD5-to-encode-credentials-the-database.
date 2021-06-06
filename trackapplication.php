<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("head.php"); ?>
	<link rel="stylesheet" type="text/css" href="custom.css">
</head>

<body>
    <?php include("header.php"); ?>
    <!-- ##### Header Area End ##### -->

	<div><br> <br><h4 class="align"> Track Application</h4></div>
     <div>
		<form action="trackapplication.php" method="post" class="aline"><br><br>
			<table class="table1 aline">
			<tr>
				<td>Appliction ID:</td>
						
				<td><input type="text" name="search" size="40" maxlength="10" ></td>
				<td class="align">
				
				
				<div class="text-center">
							<span>
								<input type="submit" class="btn credit-btn box-shadow btn-2" name="submit" value="Log in">
							</span>
						</div></td>
			</tr>	
			</table>
			
			<?php
								
								if(isset($_POST['submit'])) 
								{
								
								$loan=$_POST['search'];
							include("config.php");

							$result = mysql_query("SELECT * FROM applyloan WHERE loan_id='$loan'")or die(mysql_error());

							echo "<h4 class='align'> Application status Select/ Reject</h4><br><br><table class='table1'>";

							echo "<tr><th>Appliction ID </th><th>status </th></tr>";

							while($row = mysql_fetch_array( $result )) 
							{

							echo "<tr>";
							echo '<td>' . $row['loan_id']	. '</td>';
							echo '<td>' . $row['status'] . '</td>';

							

							
							echo "</tr>";

							}

								}

							// close table>

							echo "</table>";

?>
				
			
		</form><br><br><br><br>
		
		
	</div>

    <!-- ##### Footer Area Start ##### -->
    <?php include("footer.php"); ?>
	<?php include("footerjs.php"); ?>
	
</body>
</html>