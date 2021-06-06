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

    <!-- ##### Features Area Start ###### -->
    
    <!-- ##### Call To Action Start ###### -->
    <section class="cta-area d-flex flex-wrap">
        <!-- Cta Thumbnail -->
        <div class="cta-thumbnail bg-img jarallax" style="background-image: url(img/bg-img/5.jpg);"></div>

        <!-- Cta Content -->
        <div class="cta-content">
            <!-- Section Heading -->
            <div class="section-heading white">
                <div class="line"></div>
                <h2>Helping small businesses like yours</h2>
            </div>
            <h6>Loan management system is an advanced and comprehensive bank loan management system that aims to improve the quality, turnaround time and service for end-customers. As a loan management solution, it enables financial institutions to automate the processes for achieving cost savings and enhanced customer experience.</h6>
            
			<div class="d-flex flex-wrap mt-50">
                <!-- Single Skills Area -->
                <div class="single-skils-area mb-70 mr-5">
                    <div id="circle" class="circle" data-value="0.90">
                        <div class="skills-text">
                            <span>90%</span>
                        </div>
                    </div>
                    <p>Energy</p>
                </div>

                <!-- Single Skills Area -->
                <div class="single-skils-area mb-70 mr-5">
                    <div id="circle2" class="circle" data-value="0.75">
                        <div class="skills-text">
                            <span>75%</span>
                        </div>
                    </div>
                    <p>power</p>
                </div>

                <!-- Single Skills Area -->
                <div class="single-skils-area mb-70">
                    <div id="circle3" class="circle" data-value="0.97">
                        <div class="skills-text">
                            <span>97%</span>
                        </div>
                    </div>
                    <p>resource</p>
                </div>
            </div>
            <a href="#" class="btn credit-btn box-shadow btn-2">Read More</a>
        </div>
    </section>
    <!-- ##### Call To Action End ###### -->

    <!-- ##### Footer Area Start ##### -->
    <?php include("footer.php"); ?>
	<?php include("footerjs.php"); ?>
	
</body>
</html>