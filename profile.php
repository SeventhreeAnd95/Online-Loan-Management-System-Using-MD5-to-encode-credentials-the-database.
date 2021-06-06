<?php
session_start();
$_SESSION['current'] = 'home';
include("config.php");

if (empty ($_SESSION['u_id']))
	{
    	header("Location: index.php");
    	exit;
	}

	if (isset($_POST['u_submit']))

	{
		$u_id=$_SESSION['u_id'];
		$uid=$_SESSION['u_id'];
		$Name=$_POST['name'];		
		$Contact=$_POST['contact'];
		$Email=$_POST['email'];
		//$Password=$_POST['password'];
		$Current_City=$_POST['currentCity'];
		$DOB=$_POST['DOB'];
		$Type_Of_Employment=$_POST['typeofemployment'];
if($Type_Of_Employment != 'ownbussiness')
        {        
            $Company_Name=$_POST['companyname'];
            $Company_Joining_Date=$_POST['companyjoiningdate'];
            $Work_Exp=$_POST['workexp'];
            $Salary=$_POST['salary'];
            
            $Industry_Type='';
            $Start_Date='';
            $Profit='';
            $Turnover='';
            $Partnership_Percentage='';
        }
        else
        {
            $Industry_Type=$_POST['industrytype'];
            $Start_Date=$_POST['startdate'];
            $Profit=$_POST['profit'];
            $Turnover=$_POST['turnover'];
            $Partnership_Percentage=$_POST['partnershippercentage'];
            $Company_Name='';
            $Company_Joining_Date='';
            $Work_Exp='';
            $Salary='';
        }
		
		/*$Company_Name=$_POST['companyname'];
		$Company_Joining_Date=$_POST['companyjoiningdate'];
		$Work_Exp=$_POST['workexp'];
		$Salary=$_POST['salary'];
		$Industry_Type=$_POST['industrytype'];
		$Start_Date=$_POST['startdate'];
		$Profit=$_POST['profit'];
		$Turnover=$_POST['turnover'];
		$Partnership_Percentage=$_POST['partnershippercentage'];
		*/
		$query = mysql_query("UPDATE user SET u_currentcity = '$Current_City', u_DOB='$DOB', Company_Name='$Company_Name', u_typeofemployment='$Type_Of_Employment', 	u_companyjoiningdate='$Company_Joining_Date', u_workexp='$Work_Exp', u_salary='$Salary', u_industrytype='$Industry_Type', u_startdate='$Start_Date', u_profit='$Profit', u_turnover='$Turnover', u_partnershippercentage='$Partnership_Percentage'  
		WHERE u_id= '$u_id'")or die(mysql_error());
		
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
	<br>
	<?php
	include("config.php");
		$u_id=$_SESSION["u_id"];
		$result = mysql_query("SELECT * FROM user  WHERE u_id='$u_id'")or die(mysql_error());
		
		while($row = mysql_fetch_array( $result )) {
		?>
		<h4 class="align">Profile</h4>
		<form action="profile.php" method="post">
			<table class="table2">
				<tr>
					<th>Name:</th>
					<td><input type="text" name="name" value="<?php echo $row['u_name'];?>"></td>
				</tr>
				<tr>
					<th>Mobile no</th>
					<td><input type="text" name="contact" value="<?php echo $row['u_contact'];?>"></td>
				</tr>
				<tr>
					<th>Email:</th>
					<td><input type="Email"  name="email" value="<?php echo $row['u_email'];?>" ></td>
				</tr>
				<tr>
					<th>Current City</th>
					<td><input type="text" name="currentCity" value="<?php echo $row['u_currentcity'];?>"></td>
				</tr>
				<tr>
					<th>DOB</th>
					<td><input type="Date" name="DOB" value="<?php echo $row['u_DOB'];?>"></td>
				</tr>
				<tr>
				<th>
				<div><?php echo $row['u_typeofemployment'];?>
				<span><label>Type of employment</label></span> </th><td><span><input name="typeofemployment" type="radio" group="typeofemployment" id="typeofemployment" cla ss="textbox" value="Salaried" <?php if($row['u_typeofemployment']=='Salaried') echo "checked"; ?> onclick="fun1()">Salaried</span>
                          <span><input name="typeofemployment" type="radio" group="typeofemployment" id="typeofemployment" cla ss="textbox" value="ownbussiness" onclick="fun2()" <?php if($row['u_typeofemployment']=='ownbussiness') echo "checked"; ?>>Own business</span></div>
                          <td></tr>
				
				
						<tr><th>   </th><td>  <div id="salaried">
							<div><span><label>Company name</label></span> <span><input type="text" name="companyname" value="<?php echo $row['Company_Name'];?>"></span></div>
							<div><span><label>Company joining date</label></span> <span><input type="date" name="companyjoiningdate" value="<?php echo $row['u_companyjoiningdate'];?>"></span></div>
							<div><span><label>Work Exp</label></span> <span><input type="text" name="workexp" value="<?php echo $row['u_workexp'];?>"></span></div>
							<div><span><label>Salary</label></span> <span><input type="text" name="salary" value= <?php echo $row['u_salary'];?>></span></div>
						  </div>
						  <div id="ownbussiness" style="display:none;">
							<div><span><label>Industry Type</label></span> <span><input type="text" name="industrytype" value="<?php echo $row['u_industrytype'];?>"></span></div>
							<div><span><label>Start Date</label></span> <span><input type="date" name="startdate" value="<?php echo $row['u_startdate'];?>"></span></div>
							<div><span><label>Profit</label></span> <span><input type="text" name="profit" value="<?php echo $row['u_profit'];?>"></span></div>
							<div><span><label>Turnover</label></span> <span><input type="text" name="turnover" value="<?php echo $row['u_turnover'];?>"></span></div>
							<div><span><label>Partnership Percentage</label></span> <span><input type="text" name="partnershippercentage" value="<?php echo $row['u_partnershippercentage'];?>"></span></div>
						  </div>
						</div><td>
						</tr>
						<tr>
						<td>
						</td>
						<td>
							<input type="submit" class="btn credit-btn box-shadow btn-2" name="u_submit" value="submit">
						</td>
						</tr>
					</table>			
		</form>		
		<?php }
		
		?>
		<!--</br></br>
		<div class="align" style="">
			<input type="submit" class="btn credit-btn box-shadow btn-2" name="u_submit" value="submit">
		</div>	--></br></br>
		
	<?php include("footer.php"); ?>
	<?php include("footerjs.php"); ?>
<script>function fun1(){document.getElementById("salaried").style.display="block";document.getElementById("ownbussiness").style.display="none";}
		function fun2(){document.getElementById("salaried").style.display="none";document.getElementById("ownbussiness").style.display="block";}</script>
</body>
</html>