<?php
session_start();
include("config.php");
if (empty ($_SESSION['u_id']))
	{
    	header("Location: index.php");
    	exit;
	}

if (isset($_SESSION['u_id'])) {
      $u_id   = $_SESSION['u_id'];
      $error = '';
      if (isset($_POST['cpsubmit'])) {
          $oldpassword       = $_POST['pass'];
          $newpassword       = $_POST['cpass'];
          $repeatnewpassword = $_POST['rcpass'];
          if ($u_id == '' || $newpassword == '' || $repeatnewpassword = '') 
		  {
              $error = 'ERROR: Please fill in all required fields!';
			  header("Location:changepassword.php");
          }
          $qq1 = mysql_query("SELECT * FROM user where u_id = $u_id") or die(mysql_error());
          $row = mysql_fetch_array($qq1);
          if ($oldpassword != $row['u_password']) 
		  {
              $error = 'ERROR: Old Password does not Match.';
			  header("Location:changepassword.php");
          }
          else if ($_POST['cpass'] == $_POST['rcpass'])
		  {
              $query = mysql_query("UPDATE user SET  u_password = '$newpassword' WHERE u_id= $u_id and u_password='$oldpassword'") or die(mysql_error());
              $error = 'Updated: Congratulation your Password is Updated.';
			  header("Location:changepassword.php?eid=7");
          } else {
              $error = 'ERROR: New & Repeat Password Should be Same.';
			  header("Location:changepassword.php");
          }
		  //echo $error;
      }
  } else {
      header("Location:login.php");
  }

?>