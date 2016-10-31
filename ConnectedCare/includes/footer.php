<?php
/************************************************************************************* 
* Author: Craig Bell
* Assignment: WE4.0 HTML site Build and associated Backend Code, Digital Skills Academy 
* Student ID: D15126839 
* Date: 2016/04/25
* Ref: http://www.wikihow.com/Create-a-Secure-Login-Script-in-PHP-and-MySQL
**************************************************************************************/ 
?>
	
	<footer>
	
	
	<div class="row hidden-md hidden-lg">
	<section class="fix_container col-xs-12">
	    
	    <div class="login_box col-xs-4">
	        <a data-toggle="modal" data-target="#myLoginModal"><i class="fa fa-user" aria-hidden="true"></i></a>
	    </div> <!-- / login -->
	    
	    <div class="contact_us_box col-xs-4">
	         <a href="#" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap"><i class="fa fa-envelope" aria-hidden="true"></i></a>
	    </div> <!-- / contact us -->
          
	      
	    <div class="quick_call_box col-xs-4">
	            <a href="tel: 003530879432594" alt="quick call button"><i class="fa fa-phone-square" aria-hidden="true"></i></a>
	    </div> <!-- / quick call -->
	    
	</section> <!-- FIX CONTAINER -->
	
	</div><!-- / ROW -->
		<div class="container">
							
				<div class="row">
					
					
						<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 footer_left">
					
						<div class="contact_info">
						<h4>  CONTACT INFO </h4>
						
						<p>Connected Care<br>
						<i class="fa fa-angle-right" aria-hidden="true"></i> <a href="tel:18885086639">1888-508-6639</a><br>
						<i class="fa fa-angle-right" aria-hidden="true"></i> <a href="mailto:info@connectedcare.net">info@connectehome.net</a><br>
						<p><i class="fa fa-clock-o" aria-hidden="true"></i> Opening hours:<br>
						Mon-Fri: 9am - 5pm
						</div> <!-- / CONTACT INFPO -->
						
						
						</div> <!-- / FOOTER LEFT -->
						
						
						<!-- social media container -->
						
						
					
					
    				        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 footer_middle">
    				        <h4>  </h4>
    				        <a href="http://site519.webelevate.net/ConnectedCare/" alt="ConnectedCare Logo link"><img src="http://site519.webelevate.net/ConnectedCare/Blog/wp-content/uploads/2016/05/ConnectCare_logo.png" alt="ConnectedCare Logo Desktop" width="85%"></a>					
					</div> <!-- / FOOTER MIDDLE -->
					
					
					<!-- / middle container -->
					
					
					<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4footer_right">
					   <h4>  PAGES </h4>
						<i class="fa fa-angle-right" aria-hidden="true"></i> <a data-toggle="modal" data-target="#myLoginModal"> Login </a><br>
						<i class="fa fa-angle-right" aria-hidden="true"></i> <a data-toggle="modal" data-target="#myRegisterModal"> Register </a><br>
						<i class="fa fa-angle-right" aria-hidden="true"></i> <a data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Contact Us </a> <br>
						<i class="fa fa-angle-right" aria-hidden="true"></i> <a href="/ConnectedCare/Documentation/">Documentation </a><br>



					</div>	<!-- / FOOTER-RIGHT -->
				
					
				</div><!-- /  ROW-->
				

			</div><!-- / CONTAINER -->
		
	</footer>
	
					<div class="row copyrights">
						<div class="container">		
							<a href="#top" class="back-to-top"><i class="fa fa-chevron-up" aria-hidden="true"></i></a>
							<p class="designed_by">Designed by <a href="http://kamil-kus.ie" target="_blank"> Kamil Kus</a> & Developed by <a href="http://cargocollective.com/CraigBell" target="_blank">Craig Bell</a>
							<!--AKA red_bairn-->
							<span class="designed_by2">Created by Game of Drones (Team4) at <a href="http://www.webelevate.ie/" target="_blank">WebElevate 4.0</a></span></p>
					</div> <!-- / container -->
				</div> <!-- / row -->
				
				
	<!-------    EXTRA JS ----------------->

 


	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  
       
       
    	<!-- BACK TO TOP  -->
	<script>
		jQuery(document).ready(function() {
		var offset = 220;
		var duration = 500;
		jQuery(window).scroll(function() {
			if (jQuery(this).scrollTop() > offset) {
				jQuery('.back-to-top').fadeIn(duration);
			} else {
				jQuery('.back-to-top').fadeOut(duration);
			}
		});
		
		jQuery('.back-to-top').click(function(event) {
			event.preventDefault();
			jQuery('html, body').animate({scrollTop: 0}, duration);
			return false;
		})
	});
       
    </script>
    
    

    
 <!-- / BACK TO TOP-->    	
    		
    				
	<script  src="/ConnectedCare/js/lightbox.js"></script>			
	<!-- jQuery (necessary for Bootstraps JavaScript plugins) -->   
       
       
       
       
        <!-- include zepto.js or jquery.js -->
        <!-- <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/zepto/1.0/zepto.min.js"></script> -->
  
        <!-- include pikabu.js -->
        <script  type="text/javascript" src="/ConnectedCare/js/pikabu.js"></script>
        <script>
            $(function() {
                pikabu = new Pikabu();

                // Script to adjust element heights for demo
                $('.m-heights-demo').on('click', 'a', function(e) {
                    var $link = $(this), target = $link.data('target');

                    e.preventDefault();

                    $('.is-active').removeClass('is-active');
                    $link.parents('li').addClass('is-active');

                    $('.m-dummy-height').remove();

                    target && $(target).append($('<div class="m-dummy-height">'));
                    pikabu.closeSidebars();
                    
                    
                    
                });
                
                

    $('[data-toggle="tooltip"]').tooltip(); 


                /*
                Sample usage:

                pikabu = new Pikabu({
                    // If you'd like to request different elements be used
                    // as controls.
                    // IMPORTANT: If you change the class names here, please
                    // remember to change the appropriate classes in the
                    // stylesheets as well.
                    selectors: {
                        element: '.main-element-container',
                        left: '.left-sidebar',
                        right: '.right-sidebar',
                        navToggles: '.sidebar-opener',
                        overlay: '.overlay'
                    },
                    // Specify left and right sidebar widths independently
                    widths: {
                        left: '70%',
                        right: '70%'
                    },
                    // Functions to trigger on initializing, opening and closing the sidebar
                    onInit: function() { ... },
                    onOpened: function() { ... },
                    onClosed: function() { ... }
                });

                // Once you've created the pikabu instance like shown above,
                // you can use it elsewhere as shown below:

                pikabu.openSidebar('right');
                pikabu.closeSidebars();

                pikabu.activeSidebar // 'left' or 'right'
                pikabu.$sidebars[pikabu.activeSidebar] // get the Zepto/jQuery active sidebar object

                // Pikabu also provides some utility functions, like:
                pikabu.scrollTo(500); // Smooth scroll to 500px in the document

                // pikabu.device contains some capability information about the device, like:
                pikabu.isAndroid; // returns true/false
                */
            });
        </script>


 
         
	<?php include_once "contact.modal.php";?>

	<!-- Trigger the modal with a button -->

	<?php include_once "login.modal.php";?>

	<?php include_once "register.modal.php";?>
      
      
	  </div><!-- / wrapper -->
	</body>
</html>