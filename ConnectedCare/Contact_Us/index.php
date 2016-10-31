<?php 
//define page title
$title = 'Contact Us';

include ('../includes/header.php'); 
?>
		<main>	
			
							
				<div class="row">
				
					
					<div class="container">
				
				
				<!--- BANNER -------->					
				<img src="/ConnectedCare/assets/images/banner_2.jpg"  alt="mother and douther reading a book" width="100%">
				
  					<div class="online_shops pages" style="margin-bottom: 30px;">
  					Download Our App today: &nbsp;&nbsp;
						<a href="#" target="_blank">
							<i class="fa fa-apple online_store" data-toggle="tooltip" data-placement="bottom" title="Download" alt="Download ConnectetCare App from  Apple online store" aria-hidden="true"></i></a>
					
						<a href="#" target="_blank">
							<i data-toggle="tooltip" data-placement="bottom" title="Download" class="fa fa-android online_store" aria-hidden="true" alt="Download ConnectetCare App from Android online store" ></i></a>
					
						<a href="#" target="_blank">
							<i data-toggle="tooltip" data-placement="bottom" title="Download"  class="fa fa-windows online_store" aria-hidden="true" alt="Download ConnectetCare App from Windows online store"></i></a> 	
						</div> <!-- / online shops -->
										
   			       <!---  END OF BANNER -------->
   	
					</div> <!-- / container -->
					
					<div class="container">
                    
					    <h3 class="center title"> <i class="fa fa-paper-plane-o" aria-hidden="true" style="margin: 10px;"></i> CONTACT US</h3>
					    
					
					<?php
/********************************************************** 
* Author: Craig Bell
* Assignment: WE4.0 HTML site Build and associated Backend Code, Digital Skills Academy 
* Student ID: D15126839 
* Date: 2016/04/25
* Ref: http://www.wikihow.com/Create-a-Secure-Login-Script-in-PHP-and-MySQL
* Ref: http://stackoverflow.com/questions/386294/what-is-the-maximum-length-of-a-valid-email-address
* Ref: http://stackoverflow.com/questions/20958/list-of-standard-lengths-for-database-fields
***********************************************************/
?>


             
      <div class="col-xs-12 col-sm-12 col-md-6 col-md-push-3 col-lg-6 col-lg-push-3">
         
          <form action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>" method="post" name="contact_form">
            <div class="form-group">
              <label for="recipient-name" class="form-control-label">Name:</label>
              <input type="text" class="form-control name_modal_form" id="recipient-name" name="recipientName" maxlength="70" required >
            </div>
			<div class="form-group">
              <label for="recipient-email" class="form-control-label">Email address:</label>
              <input type="email" class="form-control name_modal_form" id="recipient-email" name="recipientEmail" maxlength="254" autocomplete="off" required >
            </div>
            <div class="form-group">
              <label for="message-text" class="form-control-label">Message:</label>
              <textarea class="form-control" id="message-text" name="messagetext" maxlength="200" autocomplete="off" required ></textarea>
            </div>
          </form>
     
        <div class="modal-footer">
          <span class="left_float_with_right_space">Follow Us on:</span>
						<span class="left_float_with_right_space" ><a href="https://www.facebook.com/Connected-Care-Smart-Home-561174847396250" target="_blank"   data-toggle="tooltip" title="Facebook"  data-placement="bottom"><img src="/ConnectedCare/assets/images/facebook_icon.jpg" class="social_icons" alt="facebook icon"></a>
					
						<a href="https://twitter.com/Connected_Smart" target="_blank"   data-toggle="tooltip" title="Twitter"  data-placement="bottom"><img src="/ConnectedCare/assets/images/twitter_icon.jpg" class="social_icons" alt="twitter icon"></a></span>
         
       
          <button type="button" class="btn btn-primary" onclick="return messformhash(contact_form, contact_form.recipientName, contact_form.recipientEmail, contact_form.messagetext);">Send message</button>
        </div>
     
  </div> 
 

					
					
				</div> <!-- / container -->				
			</div> <!-- / row -->
			
			
			
			
		</main>

<?php include ('../includes/footer.php'); ?>