<?php
/************************************************************************************* 
* Author: Craig Bell
* Assignment: WE4.0 HTML site Build and associated Backend Code, Digital Skills Academy 
* Student ID: D15126839 
* Date: 2016/04/25
* Ref: http://www.wikihow.com/Create-a-Secure-Login-Script-in-PHP-and-MySQL
**************************************************************************************/
include_once 'login.modal.php';
/*Had this included at the top of the header.php but when I went into View Source on the webpage the Login Modal was showing above the Doctype!!*/

?>


<!-- Register Modal -->
<div id="myRegisterModal" class="modal fade" role="dialog">
	<div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
          
          <img src="/ConnectedCare/assets/images/ConnectCare_logo.png" width="200px">
          <h3 class="modal-title" id="RegisterModalLabel">Register</h3>
			<ul>
				<li>Usernames may contain only digits, upper and lowercase letters and underscores</li>
				<li>Emails must have a valid email format</li>
				<li>Passwords must be at least 10 characters long</li>
				<li>Passwords must contain
					<ul>
						<li>At least one uppercase letter (A..Z).</li>
						<li>At least one lowercase letter (a..z).</li>
						<li>At least one number (0..9).</li>
						<li>At least one special character.</li>
					</ul>
				</li>
				<li>Your password and confirmation must match exactly</li>
			</ul>
      </div>
      <div class="modal-body">
			<form action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>" method="post" id="test_form" name="registration_form" autocomplete="on">
				<div class="form-group">
					<label for="username" class="form-control-label">Username</label>
					<input type="Username" class="form-control" name="username" id="username" placeholder="Username">
				</div>
				<div class="form-group">
					<label for="email">Email:</label>
					<input type="Email" class="form-control" name="email" id="email" placeholder="Email">
				</div>
				<div class="form-group">
					<label for="password">Password:</label>
					<input type="Password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="off">
				</div>
				<div class="form-group">
					<label for="confirmpwd">Confirm password:</label>
					<input type="Password" class="form-control" name="confirmpwd" id="confirmpwd" placeholder="Confirm Password" autocomplete="off">
				</div>
			</form>
			<p>Return to the <a data-dismiss="modal" data-toggle="modal" data-target="#myLoginModal">login page</a>.</p>
      </div>
      <div class="modal-footer">
          <span class="left_float_with_right_space">Follow Us on:</span>
						<span class="left_float_with_right_space"><a href="https://www.facebook.com/Connected-Care-Smart-Home-561174847396250" target="_blank"   data-toggle="tooltip" title="Facebook"><img src="/ConnectedCare/assets/images/facebook_icon.jpg" class="social_icons" alt="facebook icon"></a>
					
						<a href="https://twitter.com/Connected_Smart" target="_blank"   data-toggle="tooltip" title="Twitter"><img src="/ConnectedCare/assets/images/twitter_icon.jpg" class="social_icons" alt="twitter icon"></a></span>
            
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		<button type="button" class="btn btn-primary" onclick="return regformhash(registration_form,
																						registration_form.username,
																						registration_form.email,
																						registration_form.password,
																						registration_form.confirmpwd);">Register</button>
																					
      </div>
      
      
    </div>

            
  </div>
</div><!-- / Register Modal -->