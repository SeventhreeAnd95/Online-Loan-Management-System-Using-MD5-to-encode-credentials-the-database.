<?php
if (isset($_SESSION['folderstep']))
{
	$folderstep = $_SESSION['folderstep'];
}
else
{
	$folderstep = "";
}

?>
<meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Credit - Loan &amp; Credit Company HTML Template</title>

    <!-- Favicon -->
    <link rel="icon" href="<?php echo $folderstep;?>img/core-img/favicon.ico">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="<?php echo $folderstep;?>style.css">
	
	<link rel="stylesheet" type="text/css" href="<?php echo $folderstep;?>custom.css">