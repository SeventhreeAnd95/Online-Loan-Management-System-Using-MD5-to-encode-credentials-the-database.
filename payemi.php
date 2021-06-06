<?php
session_start();
$_SESSION['current'] = 'home';
include("config.php");

if(isset($_POST['pay']))
{
	//$uid=$_SESSION["u_id"];
	$cardnum = $_POST['cardnumber'];
	$expdatemm = $_POST['expdatemm'];
	$expdateyy = $_POST['expdateyy'];
	//$cvv =md5( $_POST['cvv']);
	if($_SESSION['lid']!='')
	{
		if($_SESSION['month']!='')
		{
			if($_SESSION['emi']!='')
			{
				if($_SESSION['duedate']!='')
				{
					if($_SESSION['cdate']!='')
					{
						$u_id=$_SESSION["u_id"];
						//$lid =$_GET['lid'];
						$loan_id =$_SESSION['lid'];
						$month =$_SESSION['month'];
						$emi=$_SESSION['emi'];
						$duedate =$_SESSION['duedate'];
						$cdate =$_SESSION['cdate'];
						$duedate = date('Y-m-d',strtotime($duedate));
						$cdate = date('Y-m-d',strtotime($cdate));
						$result = mysql_query("SELECT * FROM applyloan WHERE status ='Approved' and loan_id = '$loan_id' and u_id=".$u_id)or die(mysql_error());
						if($row = mysql_fetch_array( $result ))
						{
							$sql = "INSERT INTO payemi (u_id,loan_id, month, emi, duedate, cdate, cardnum, expdatemm, expdateyy) 
							VALUES($u_id, '$loan_id',$month,$emi,'$duedate','$cdate',$cardnum,$expdatemm,$expdateyy)";
							//echo $sql;
							$retval = mysql_query($sql);
							if(! $retval ) 
							{
								die('Could not enter data: ' . mysql_error());
							}
							else
							{
								$sql1 = "update applyloan set curmonth=$month where u_id = $u_id and loan_id = '$loan_id'";
								//echo $sql1;
								$retval1 = mysql_query($sql1);
								if($retval ) 
								{
									$sql1 = "update user set cardnum=$cardnum, expdatemm=$expdatemm, expdateyy=$expdatemm where u_id = $u_id";
									//echo $sql1;
									$retval1 = mysql_query($sql1);
									if($retval ) 
									{
										header("Location:emicalculation.php?lid=$loan_id");
									}
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
}
else
{
	header("Location:logout.php");
}

?>
