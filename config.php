<?php
$mysql_host='localhost';
$mysql_username='root';
$mysql_password='';
$dbname='loanwala';
$con=mysql_connect($mysql_host, $mysql_username, $mysql_password);
if (!$con){
	die('Could not connect: '. mysql_error());
	  }
mysql_select_db($dbname,$con) or die(mysql_error());
?>
