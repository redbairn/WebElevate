<?php
/************************************************************************************* 
* Author: Craig Bell
* Assignment: WE4.0 HTML site Build and associated Backend Code, Digital Skills Academy 
* Student ID: D15126839 
* Date: 2016/04/25
* Ref: http://www.wikihow.com/Create-a-Secure-Login-Script-in-PHP-and-MySQL
**************************************************************************************/
/*-For the connection to the database and logins-*/
/*-Required for the Login Modal-*/
include_once 'session.class.php';/*inc.in the (cpanel.php),*/
include_once 'login_attempts.php';/*inc.in the (login_help.php, cpanel.php)*/


/*-Required for the Register Modal-*/
include_once 'login.modal.php';
include_once 'register.inc.php';
include_once 'db_connect.php';/*inc.in the (login_help.php, user.class.php, session.class.php)*/

/*-Required for the CPanel file-*/
include_once 'user.class.php';

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		
			
		<!-- GOOGLE WEBMASTERS TAG VERIFICATION -->
		<meta name="google-site-verification" content="49njg6hTwQw_CL1Wg9M-kXlfHQAMHyr8SPI6CP8XcPE" />

		


		
		<link rel="icon" href="http://site519.webelevate.net/ConnectedCare/assets/images/favicon.ico" type="image/x-icon"/>
        <link rel="shortcut icon" href="http://site519.webelevate.net/ConnectedCare/assets/images/favicon.ico" type="image/x-icon"/>
			
		<meta name="description" content="Connect vulnerable parents with their loved ones, using sophisticated technology to support them to live in the own home.">
        <meta name="keywords" content="home care">
        <meta name="author" content="Team 4 - Game of Drones">
        
        
        <!-- Schema.org markup for Google+ -->
        <meta itemprop="name"  content="Connected Care, smart home care system">
        <meta itemprop="description" content="ConnectedCare is all about the caring home. We have a commitment to innovation and excellence through using the best technology to provide supported home care to vulnerable individuals and their family. We aim to be a dependable, reliable and committed member of the team our clients put together to ensure their family members can live safely in their own homes. ">
        <meta itemprop="image" content="http://site519.webelevate.net/ConnectedCare/assets/images/APP_MOCKUP_PRESENATION-NEW8.jpg" >

        <!-- Twitter Card data -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:site" content="@Connected_Smart">
        <meta name="twitter:title" content="Connected Care, smart home care system">
        <meta name="twitter:description" content="ConnectedCare is all about the caring home. We have a commitment to innovation and excellence through using the best technology to provide supported home care to vulnerable individuals and their family. We aim to be a dependable, reliable and committed member of the team our clients put together to ensure their family members can live safely in their own homes. ">
        <meta name="twitter:creator" content="@author_handle">
        <meta name="twitter:image" content="http://site519.webelevate.net/ConnectedCare/assets/images/APP_MOCKUP_PRESENATION-NEW8.jpg">


        <!-- Open Graph data -->
        <meta property="og:locale" content="en_US">
        <meta property="og:title" content="Connected Care, smart home care system" />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="http://site519.webelevate.net/ConnectedCare/"/>
        <meta property="og:image" content="http://site519.webelevate.net/ConnectedCare/assets/images/APP_MOCKUP_PRESENATION-NEW8.jpg" />
        <meta property="og:description" content="ConnectedCare is all about the caring home. We have a commitment to innovation and excellence through using the best technology to provide supported home care to vulnerable individuals and their family. We aim to be a dependable, reliable and committed member of the team our clients put together to ensure their family members can live safely in their own homes." />
        <meta property="og:site_name" content="Connected Care" />

		
		
		
		<title><?php if(isset($title)){ echo $title; }?></title>


        <link rel="stylesheet" href="/ConnectedCare/css/animate.css" type="text/css">

		<link href="/ConnectedCare/css/lightbox.css" rel="stylesheet" type="text/css" >
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet" >
		<link href='https://fonts.googleapis.com/css?family=Roboto:400,500,700,300' rel='stylesheet' type='text/css'>
   		
		<!-- Bootstrap -->
		<link href="/ConnectedCare/css/bootstrap.min.css" rel="stylesheet">
		<link href="/ConnectedCare/css/normalize.css" rel="stylesheet">	
		
		<!-- CUSTOM BOXES -->
		
		<link href="/ConnectedCare/css/fixed_footer_boxes_mobile.css" rel="stylesheet">
		<!-- Extra CSS files -->
		<link href="/ConnectedCare/css/main.css" rel="stylesheet">
    
        <style>
        .m-heights-demo .is-active a {
            color: #000;
            text-decoration: none
        }
        /* Used to add extra height to elements for demo purposes */
        .m-dummy-height {
            height: 500px;
        }
        </style>  	
        

	
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

		<!-- Scripts -->
		
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesnt work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script  src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script  src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

		<!--Google-->
				<!-- GOOGLE ANALYTICS -->
		
		<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-76149080-1', 'auto');
  ga('send', 'pageview');

</script>
		
        <link rel="stylesheet" href="/ConnectedCare/css/pikabu.css">
        <link rel="stylesheet" href="/ConnectedCare/css/pikabu-theme.css">


		<!--Login and Register Javascript-->
		<script  type="text/javascript" src="/ConnectedCare/js/sha512.js"></script>
		<script  type="text/javascript" src="/ConnectedCare/js/forms.js"></script>
		
		  <script   type="text/javascript" src="/ConnectedCare/js/new.js"></script>
          <script   type="text/javascript" src="/ConnectedCare/js/new2.js"></script> 
		





<div id="wrapper">
			<!-----------------------     HEADER    --->    <header>
			<?php include_once 'alert_messages.php'; ?>
			
			<!-- Top bar -->
			<div class="container top_bar">
					<div class="row">
						<div class="col-xs-6 col-sm-6 col-md-8 col-lg-8 social_media_top_bar"> 
							<span class="top_bar_text">Follow Us: </span>
							<a href="https://www.facebook.com/Connected-Care-Smart-Home-561174847396250" target="_blank"><img src="/ConnectedCare/assets/images/facebook_icon.jpg"  data-toggle="tooltip" data-placement="bottom" title="Facebook" class="social_icons" alt="Facebook icon"></a>
							<a href="https://twitter.com/Connected_Smart" target="_blank"><img src="/ConnectedCare/assets/images/twitter_icon.jpg" data-toggle="tooltip" data-placement="bottom" title="Twitter"  class="social_icons" alt="Twitter icon"></a>
						</div>
						<!-- Follow Us: Social media -->
						<div class="col-xs-6 col-sm-6 col-md-4 col-lg-4 login_register_top_bar">
							<a  class="login_top_bar" data-toggle="modal" data-target="#myLoginModal"><i class="fa fa-user user_top_bar" aria-hidden="true"></i> LOGIN</a>
							<a  class="register_top_bar" data-toggle="modal" data-target="#myRegisterModal"><i class="fa fa-user-plus" aria-hidden="true"></i> REGISTER</a>      
						</div>

						<!-- Login & Register -->





					</div>
					<!--End of row for Top Bar -->
			</div>
			<!--End of container for Top Images-->
				
				
				<!--Navigation left outside the container to go full width-->
				<!--Might need to have it inside for mobile version-->
				
				
				<nav class="navbar navbar-inverse  hidden-xs hidden-sm" data-spy="affix" data-offset-top="197"  id="navbar-main my-menu">
					<div class="container">
						<div class="row">
							<div class="navbar-header">
								<a class="navbar-brand" href="/ConnectedCare/" id="#top">
									<img src="http://site519.webelevate.net/ConnectedCare/Blog/wp-content/uploads/2016/05/ConnectCare_logo.png" class="hidden-xs logo" alt="ConnectedCare Logo Desktop" >
									<div class="row">
										<img id="img_brand_sml" src="/ConnectedCare/assets/images/newest-logo.png" class="visible-xs col-xs-12 logo" alt="ConnectedCare Logo Mobile" >
									</div>
								</a>
								<div class="row">
									<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
								</div>
							</div>
							<!-- End navbar-header-->
							
							<div id="navbar" class="collapse navbar-collapse">
								<ul class="nav nav-tabs navbar-right nav-main">
									<li><a href="/ConnectedCare/" >HOME</a></li>
									<li><a href="/ConnectedCare/About/">ABOUT</a></li>
									<li class="dropdown"><a href="" class="dropdown-toggle"  data-toggle = "dropdown" >FUNCTIONALITY <i class="fa fa-angle-down" aria-hidden="true"></a></i>
										<ul class="dropdown-menu">
											<li><a class="smoothScroll" href="/ConnectedCare/Functionality/#Functional_Scope"><i class="fa fa-angle-right" aria-hidden="true" style="margin-right: 15px;"></i>Functional Scope</a></li>
											<li><a class="smoothScroll" href="/ConnectedCare/Functionality/#Connected_Home"><i class="fa fa-angle-right" aria-hidden="true" style="margin-right: 15px;"></i>Connected Home</a></li>
											<li><a class="smoothScroll" href="/ConnectedCare/Functionality/#Bluetooth_LE_abilities"><i class="fa fa-angle-right" aria-hidden="true" style="margin-right: 15px;"></i>Bluetooth LE abilities</a></li>
											<li><a class="smoothScroll" href="/ConnectedCare/Functionality/#NFC_chip_in_a_smartphone"><i class="fa fa-angle-right" aria-hidden="true" style="margin-right: 15px;"></i>NFC chip in a smartphone</a></li>
										</ul>
									</li>
                                    <li class="dropdown"> <a href="#" class="dropdown-toggle"  data-toggle = "dropdown" >DOCUMENTATION <i class="fa fa-angle-down" aria-hidden="true"></i></a>
										<ul class="dropdown-menu">
											<li><a class="smoothScroll2" href="/ConnectedCare/Documentation/#What_the_product_is"><i class="fa fa-angle-right" aria-hidden="true" style="margin-right: 15px;"></i>What the Product is</a></li>
											<li><a class="smoothScroll2" href="/ConnectedCare/Documentation/#Who_will_use_it"><i class="fa fa-angle-right" aria-hidden="true" style="margin-right: 15px;"></i>Who will use it</a></li>
											<li><a class="smoothScroll2" href="/ConnectedCare/Documentation/#Concept_design"><i class="fa fa-angle-right" aria-hidden="true" style="margin-right: 15px;"></i>Concept Design</a></li>
											<li><a class="smoothScroll2" href="/ConnectedCare/Documentation/#Personas"><i class="fa fa-angle-right" aria-hidden="true" style="margin-right: 15px;"></i> Personas</a></li>
											<li><a class="smoothScroll2" href="/ConnectedCare/Documentation/#Informed_data_gathering"><i class="fa fa-angle-right" aria-hidden="true" style="margin-right: 15px;"></i>I.Data Gathering</a></li>
											<li><a class="smoothScroll2" href="/ConnectedCare/Documentation/#Scenarios"><i class="fa fa-angle-right" aria-hidden="true" style="margin-right: 15px;"></i>Scenarios</a></li>
											<li><a class="smoothScroll2" href="/ConnectedCare/Documentation/#Task_cases"><i class="fa fa-angle-right" aria-hidden="true" style="margin-right: 15px;"></i>Task Cases</a></li>
											<li><a class="smoothScroll2" href="/ConnectedCare/Documentation/#Use_cases"><i class="fa fa-angle-right" aria-hidden="true" style="margin-right: 15px;"></i>Use Cases</a></li>
											<li><a class="smoothScroll2" href="/ConnectedCare/Documentation/#Product_design"><i class="fa fa-angle-right" aria-hidden="true" style="margin-right: 15px;"></i>Product Design</a></li>
											<li><a class="smoothScroll2" href="/ConnectedCare/Documentation/#Appendix"><i class="fa fa-angle-right" aria-hidden="true" style="margin-right: 15px;"></i>Appendix</a></li>
										</ul>
									</li>
									
									<li><a href="http://site519.webelevate.net/ConnectedCare/Blog/">BLOG</a></li>
									<li><a href="#" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">CONTACT US</a></li>

								</ul>
							</div><!-- / NAV-COLLAPSE -->
						</div><!-- / ROW -->
					</div><!-- / CONTAINER -->
				</nav><!-- / NAVBAR -->

	
       <!-- the viewport -->
      
            <!-- the left sidebar -->
            <div class="hidden-md hidden-lg" data-spy="affix" data-offset-top="50">
            
            
            <div class="pikabu-sidebar pikabu-sidebar--left"  data-spy="affix" data-offset-top="50">
                <!-- left sidebar content -->
              <div class="logo_mobile center">
                 <a href="/ConnectedCare/" alt="link to ConnectedCare home page"><img class="center" src="/ConnectedCare/assets/images/newest-logo.png" alt="ConnectedCare logo"></a>
              </div> <!-- logo mobile menu -->
               				<!-- SOCIAL MEDIA ICONS IN MOBILE MENU -->
               				
               				
               
                <ul class="nav nav-tabs navbar-right nav-main">
									<li class="mobile_menu"><a href="/ConnectedCare/" >HOME <i class="fa fa-home mobile_menu_icons" aria-hidden="true"></i></a></li>
									<li class="mobile_menu"><a href="/ConnectedCare/About/">ABOUT <i class="fa fa-user mobile_menu_icons" aria-hidden="true"></i></a></li>
                    <li class="dropdown mobile_menu"><a href="" class="dropdown-toggle"  data-toggle = "dropdown" >FUNCTIONALITY <i class="fa fa-angle-down" aria-hidden="true" style="margin-left:10px;"></i><i class="fa fa-cog mobile_menu_icons" aria-hidden="true"></i></a>
										<ul class="dropdown-menu">
										
										
										     									    <li><a class="smoothScroll" href="/ConnectedCare/Functionality/#Functional_Scope"><i class="fa fa-angle-right" aria-hidden="true" style="margin-right: 15px;"></i>Functional Scope</a></li>
											<li><a class="smoothScroll" href="/ConnectedCare/Functionality/#Connected_Home"><i class="fa fa-angle-right" aria-hidden="true" style="margin-right: 15px;"></i>Connected Home</a></li>
											<li><a class="smoothScroll" href="/ConnectedCare/Functionality/#Bluetooth_LE_abilities"><i class="fa fa-angle-right" aria-hidden="true" style="margin-right: 15px;"></i>Bluetooth LE abilities</a></li>
											<li><a class="smoothScroll" href="/ConnectedCare/Functionality/#NFC_chip_in_a_smartphone"><i class="fa fa-angle-right" aria-hidden="true" style="margin-right: 15px;"></i>NFC chip in a smartphone</a></li>  
										
										
										
											
			
													
																							

										</ul>
									</li>
									<li class="dropdown mobile_menu"> <a href="#" class="dropdown-toggle"  data-toggle = "dropdown" >DOCUMENTATION <i class="fa fa-angle-down" aria-hidden="true" style="margin-left:10px;"></i><i class="fa fa-file-text-o mobile_menu_icons" aria-hidden="true"></i></a>
										<ul class="dropdown-menu">
			
                                    
                                    
            							            <li><a class="smoothScroll2" href="/ConnectedCare/Documentation/#What_the_product_is"><i class="fa fa-angle-right" aria-hidden="true" style="margin-right: 15px;"></i>What the Product is</a></li>
											<li><a class="smoothScroll2" href="/ConnectedCare/Documentation/#Who_will_use_it"><i class="fa fa-angle-right" aria-hidden="true" style="margin-right: 15px;"></i>Who will use it</a></li>
											<li><a class="smoothScroll2" href="/ConnectedCare/Documentation/#Concept_design"><i class="fa fa-angle-right" aria-hidden="true" style="margin-right: 15px;"></i>Concept Design</a></li>
											<li><a class="smoothScroll2" href="/ConnectedCare/Documentation/#Personas"><i class="fa fa-angle-right" aria-hidden="true" style="margin-right: 15px;"></i> Personas</a></li>
											<li><a class="smoothScroll2" href="/ConnectedCare/Documentation/#Informed_data_gathering"><i class="fa fa-angle-right" aria-hidden="true" style="margin-right: 15px;"></i>I.Data Gathering</a></li>
											<li><a class="smoothScroll2" href="/ConnectedCare/Documentation/#Scenarios"><i class="fa fa-angle-right" aria-hidden="true" style="margin-right: 15px;"></i>Scenarios</a></li>
											<li><a class="smoothScroll2" href="/ConnectedCare/Documentation/#Task_cases"><i class="fa fa-angle-right" aria-hidden="true" style="margin-right: 15px;"></i>Task Cases</a></li>
											<li><a class="smoothScroll2" href="/ConnectedCare/Documentation/#Use_cases"><i class="fa fa-angle-right" aria-hidden="true" style="margin-right: 15px;"></i>Use Cases</a></li>
											<li><a class="smoothScroll2" href="/ConnectedCare/Documentation/#Product_design"><i class="fa fa-angle-right" aria-hidden="true" style="margin-right: 15px;"></i>Product Design</a></li>
											<li><a class="smoothScroll2" href="/ConnectedCare/Documentation/#Appendix"><i class="fa fa-angle-right" aria-hidden="true" style="margin-right: 15px;"></i>Appendix</a></li>                        
                             
                                    
										</ul>
									</li>
								     <li><a href="http://site519.webelevate.net/ConnectedCare/Blog/">BLOG</a></li>
								     
									<li class=" mobile_menu"><a href="#" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">CONTACT US<i class="fa fa-paper-plane mobile_menu_icons" aria-hidden="true"></i></a></li>

								</ul>
	
        
            
                   <div class="center social_media_mobile">
  							<a href="https://www.facebook.com/Connected-Care-Smart-Home-561174847396250" target="_blank"><i class="fa fa-facebook-square" aria-hidden="true"  data-toggle="tooltip" data-placement="bottom" title="Facebook" class="social_icons" alt="Facebook icon"></i></a>
							<a href="https://twitter.com/Connected_Smart" target="_blank"><i class="fa fa-twitter-square" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Twitter"  class="social_icons" alt="Twitter icon"></i></a>
               </div><!-- social media mobile menu -->
                   
                   
                   
                    </div><!-- the main page content -->
            <div class="pikabu-container">
                <!-- Overlay is needed to have a big click area to close the sidebars -->
                <div class="pikabu-overlay"></div>

              
                    <a class="pikabu-nav-toggle" data-role="left">Left Menu</a>
                       <a href="/ConnectedCare/" alt="link to ConnectedCare home page"><img class="center" src="/ConnectedCare/assets/images/newest-logo.png" alt="ConnectedCare logo"></a>
               
               
</div> 
				


		

    </div>