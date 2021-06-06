<?php
session_start();
$_SESSION['current'] = 'home';
include("config.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("head.php"); ?>
</head>

<body>
    <?php include("header.php"); ?>
    <!-- ##### Header Area End ##### -->

    
        <!-- ##### Google Maps ##### -->
        
    <!-- ##### Contact Area End ##### -->
<div>
	
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d497698.6600798865!2d77.35073573336324!3d12.954517008640542!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae1670c9b44e6d%3A0xf8dfc3e8517e4fe0!2sBengaluru%2C+Karnataka!5e0!3m2!1sen!2sin!4v1554535426894!5m2!1sen!2sin" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>            
		
</div>

<!-- ##### Footer Area Start ##### -->
    <?php include("footer.php"); ?>
    
		<?php include("footerjs.php"); ?>
</body>

</html>