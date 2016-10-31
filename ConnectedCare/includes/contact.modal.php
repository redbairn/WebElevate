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


<!--Contact Modal-->	
<div class="bd-example">
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
	
	<!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          
          <img src="/ConnectedCare/assets/images/ConnectCare_logo.png" width="200px">
          <h4 class="modal-title" id="ContactModalLabel">New message</h4>
          
                  </div>
        <div class="modal-body">
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
        </div>
        <div class="modal-footer">
          <span class="left_float_with_right_space">Follow Us on:</span>
						<span class="left_float_with_right_space"><a href="https://www.facebook.com/Connected-Care-Smart-Home-561174847396250" target="_blank"   data-toggle="tooltip" title="Facebook"><img src="/ConnectedCare/assets/images/facebook_icon.jpg" class="social_icons" alt="facebook icon"></a>
					
						<a href="https://twitter.com/Connected_Smart" target="_blank"   data-toggle="tooltip" title="Twitter"><img src="/ConnectedCare/assets/images/twitter_icon.jpg" class="social_icons" alt="twitter icon"></a></span>
          <button type="button" class="btn btn-primary" onclick="return messformhash(contact_form, contact_form.recipientName, contact_form.recipientEmail, contact_form.messagetext);">Send message</button>
        </div>
      </div>
    </div>
  </div>
</div><!-- / Contact Modal -->