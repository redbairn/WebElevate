<?php 
//define page title
$title = 'Register';

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
							<i data-toggle="tooltip" data-placement="bottom" title="Download" class="fa fa-android online_store" aria-hidden="true" alt="Download ConnectetCare App from Android onlin store" ></i></a>
					
						<a href="#" target="_blank">
							<i data-toggle="tooltip" data-placement="bottom" title="Download"  class="fa fa-windows online_store" aria-hidden="true" alt="Download ConnectetCare App from Windows pnline store"></i></a> 	
						</div> <!-- / online shops -->
										
   			       <!---  END OF BANNER -------->
   	
					</div> <!-- / container -->
					
					<div class="container">
	

	<h3 class="center title" ><i class="fa fa-pencil-square-o" aria-hidden="true" style="margin: 10px;"></i> Register</h3>

 <div class="col-xs-12 col-sm-12 col-md-6 col-md-push-3 col-lg-6 col-lg-push-3 register_container">
                    
       <?php
/************************************************************************************* 
* Author: Craig Bell
* Assignment: WE4.0 HTML site Build and associated Backend Code, Digital Skills Academy 
* Student ID: D15126839 
* Date: 2016/04/25
* Ref: http://www.wikihow.com/Create-a-Secure-Login-Script-in-PHP-and-MySQL
**************************************************************************************/
include_once '../includes/login.modal.php';
/*Had this included at the top of the header.php but when I went into View Source on the webpage the Login Modal was showing above the Doctype!!*/

?>

     
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
			<p>Return to the <a href="http://site519.webelevate.net/ConnectedCare/LogIn">login page</a>.</p>
      </div>
      <div class="modal-footer">
          <span class="left_float_with_right_space">Follow Us on:</span>
						<span class="left_float_with_right_space"><a href="https://www.facebook.com/Connected-Care-Smart-Home-561174847396250" target="_blank"   data-toggle="tooltip" title="Facebook" data-placement="bottom"><img src="/ConnectedCare/assets/images/facebook_icon.jpg" class="social_icons" alt="facebook icon"></a>
					
						<a href="https://twitter.com/Connected_Smart" target="_blank"   data-toggle="tooltip" title="Twitter" data-placement="bottom"><img src="/ConnectedCare/assets/images/twitter_icon.jpg" class="social_icons" alt="twitter icon"></a></span>
            
     
		<button type="button" class="btn btn-primary" onclick="return regformhash(registration_form,
																						registration_form.username,
																						registration_form.email,
																						registration_form.password,
																						registration_form.confirmpwd);">Register</button>
																					
      </div>
      
      
 </div>
					
					
				</div> <!-- / container -->				
			</div> <!-- / row -->
			
		</main>

		
<?php include ('../includes/footer.php'); ?>