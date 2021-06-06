<?php
session_start();
$_SESSION['current'] = 'home';
include("config.php");

if (empty ($_SESSION['u_id']))
	{
    	header("Location: index.php");
    	exit;
	}

if(isset($_POST['all_submit']))
{
	//include('../config.php');
	
	$u_id = $_SESSION['u_id'];
	
	
	$Adhar_ID=$_POST['adharid'];
	$Loan_Type=$_POST['loantype'];
	$Total_Months=$_POST['totalmonths'];
	$Loan_Amount=$_POST['loanamount'];
	//$qq= "select * from emi where cat= '$Loan_Type'";
	$qq1 = mysql_query("select * from emi where cat= '$Loan_Type'") or die(mysql_error());
	while ($row_qq1 = mysql_fetch_array($qq1)) {
		$Percentage = $row_qq1['rate'];
	}
	//$Percentage=$_POST['percentage'];
	
			
			$file = rand(1000,100000)."-".$_FILES['dl']['name'];
			//echo "<br> Driving Licence is uploaded succesfully.<br>";
			
			$file_loc = $_FILES['dl']['tmp_name'];
			//echo "<br>".$file_loc."<br>";
			$file_size = $_FILES['dl']['size'];
			$file_type = $_FILES['dl']['type'];		
			
			

			$folder="uploads/";
			$final_file=str_replace(' ','-',$file);
			$imgupload=$folder."".$final_file;
			$imgsave_dl="uploads/"."".$final_file;
			//echo $imgsave;
			if(move_uploaded_file($file_loc,$folder.$final_file))
			{
				/*$sql = "INSERT INTO loanfiles (DL) VALUES('$imgsave_dl')";
				
				 $retval = mysql_query($sql);
				if(! $retval ) 
				{
					die('Could not enter data: ' . mysql_error());
				}
				else
				{

				}*/

			}
			else
			{
				echo "error DL";
				//$loc=header("Location:aproduct.php");
			}
		

	//include('../config.php');
			
			$file = rand(1000,100000)."-".$_FILES['pan']['name'];
			//echo "<br> PAN is uploaded succesfully.<br>";
			
			$file_loc = $_FILES['pan']['tmp_name'];
			//echo "<br>".$file_loc."<br>";
			$file_size = $_FILES['pan']['size'];
			$file_type = $_FILES['pan']['type'];		
			

			$folder="uploads/";
			$final_file=str_replace(' ','-',$file);
			$imgupload=$folder."".$final_file;
			$imgsave_pan="uploads/"."".$final_file;
			//echo $imgsave;
			if(move_uploaded_file($file_loc,$folder.$final_file))
			{
				/*$sql = "INSERT INTO loanfiles (PAN) VALUES('$imgsave_pan')";
				
				 $retval = mysql_query($sql);
				if(! $retval ) 
				{
					die('Could not enter data: ' . mysql_error());
				}
				else
				{

				}*/

			}
			else
			{
				echo "error pan";
				//$loc=header("Location:aproduct.php");
			}
		

	//include('../config.php');
			
			$file = rand(1000,100000)."-".$_FILES['residence']['name'];
			//echo "<br> Residence Proof is uploaded succesfully.<br>";
			
			$file_loc = $_FILES['residence']['tmp_name'];
			//echo "<br>".$file_loc."<br>";
			$file_size = $_FILES['residence']['size'];
			$file_type = $_FILES['residence']['type'];		
			

			$folder="uploads/";
			$final_file=str_replace(' ','-',$file);
			$imgupload=$folder."".$final_file;
			$imgsave_Residence="uploads/"."".$final_file;
			//echo $imgsave;
			if(move_uploaded_file($file_loc,$folder.$final_file))
			{
				/*$sql = "INSERT INTO loanfiles (Residence) VALUES('$imgsave_Residence')";
				
				 $retval = mysql_query($sql);
				if(! $retval ) 
				{
					die('Could not enter data: ' . mysql_error());
				}
				else
				{

				} */

			}
			else
			{
				echo "error residence";
				//$loc=header("Location:aproduct.php");
			}
			
		if($imgsave_dl!="")
	{
		if($imgsave_pan!="")
		{
			if($imgsave_Residence!="")
			{
				//  using hashing and rand storing the loan id
				$loan_id = "LID" . $u_id. rand(1000,100000);
				$sql = "INSERT INTO applyloan (u_id,loan_id, DL, PAN, Residence, Adhar_id, Loantype, Totalmonths, Loanamount, Percentage ,status) VALUES('$u_id', '$loan_id','$imgsave_dl','$imgsave_pan','$imgsave_Residence','$Adhar_ID','$Loan_Type','$Total_Months','$Loan_Amount','$Percentage','Pending')";
				
				 $retval = mysql_query($sql);
				if(! $retval ) 
				{
					die('Could not enter data: ' . mysql_error());
				}
				else
				{
					
				}
			}
		}
		
	}
}			
		
?>			


<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" type="text/css" href="custom.css">
    <?php include("head.php"); ?>
</head>

<body>
    <?php include("header.php"); ?>
   
<br><br>
<h4 class="align">Apply Loan</h4>
<br>
<br>

	<form action="applyloan.php" method="post" enctype="multipart/form-data"><br>
		<table class="table2">
		<tr>
		<th>Salary Slip(if Salaried)/COI (if owner)</th> <td><input type="file" name="dl" required></td>		
		</tr>
		<tr>
		<th>PAN Card <font color="red">*</font></th> <td><input type="file" name="pan" required></td>
		</tr>
		<tr>
		<th>Residence Proof<font color="red">*</font></th> <td><input type="file" name="residence" required></td>
		</tr>
		<tr>
		<th>Adhar ID</th><td> <input type="text" name="adharid" maxlength="12" required></td>
		</tr>	
			<tr><th>Loan Type </th><td><select name="loantype" class="form-control course">
			
			
						<?php
											
											$query=mysql_query("Select cat from emi");
											if( mysql_num_rows($query)>0 )
											{
												while($row=mysql_fetch_array($query))
											{	?>
											<option value="<?php echo $row['cat'];?>">
											<?php echo $row['cat'];?></option>
											
											<?php
											}
										}
										
											?>
							</select>		</td>	
			</tr>
			<tr>
			<th>Total Months </th><td><input type="text" name="totalmonths" required></td>
			</tr>
			<tr>
			<th>Loan Amount </th><td><input type="text" name="loanamount" required></td>
			</tr>
			<div style="display:none;">
			<tr style="display:none;">
			<th>Percentage </th><td>
			
			<input type="text" name="percentage" disabled></td>		
			</tr>
			</div>
			<tr>
				<th></th><td>
				<input type="submit" class="btn credit-btn box-shadow btn-2" name="all_submit"></td></table>
		</form>		
		
		<div class="align" style="">
			
		
</div>
<br><br>

 <!-- ##### Call To Action End ###### -->

    <!-- ##### Footer Area Start ##### -->
    <?php include("footer.php"); ?>
	<?php include("footerjs.php"); ?>
	
</body>
</html>
	