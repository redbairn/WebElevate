<?php
/************************************************************************************* 
* Author: Craig Bell
* Assignment: WE4.0 HTML site Build and associated Backend Code, Digital Skills Academy 
* Student ID: D15126839 
* Date: 2016/04/25
* Ref: http://www.wikihow.com/Create-a-Secure-Login-Script-in-PHP-and-MySQL
**************************************************************************************/
?>

<!-- Login Modal -->
<div id="myLoginModal" class="modal fade" role="dialog">
	<div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
          
          <img src="http://site519.webelevate.net/ConnectedCare/assets/images/ConnectCare_logo.png" width="200px">
          <h3 class="modal-title" id="LoginModalLabel">Login</h3>
          
          <span class="left_float_with_right_space">Follow Us on:</span>
						<a href="https://www.facebook.com/Connected-Care-Smart-Home-561174847396250" target="_blank"   data-toggle="tooltip" title="Facebook"><img src="/ConnectedCare/assets/images/facebook_icon.jpg" class="social_icons" alt="facebook icon"></a>
					
						<a href="https://twitter.com/Connected_Smart" target="_blank"   data-toggle="tooltip" title="Twitter"><img src="/ConnectedCare/assets/images/twitter_icon.jpg" class="social_icons" alt="twitter icon"></a>
          
      </div>
      <div class="modal-body">
			<?php
			if(isset($_GET['action'])){

				//check the action
				switch ($_GET['action']) {
					case 'active':
						echo "<h2 class='bg-success'>Your account is now active you may now log in.</h2>";
						break;
					case 'reset':
						echo "<h2 class='bg-success'>Please check your inbox for a reset link.</h2>";
						break;
					case 'resetAccount':
						echo "<h2 class='bg-success'>Password changed, you may now login.</h2>";
						break;
				}

			}
			?>
			<form action="/ConnectedCare/includes/process_login.php" method="post" name="login_form" autocomplete="on">
				<div class="form-group">
					<label for="exampleInputEmail1" class="form-control-label">Email address</label>
					<input type="email" class="form-control" id="exampleInputEmail1" name="email"  value="" placeholder="Email" tabindex="1">
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Password:</label>
					<input type="password" class="form-control" id="exampleInputPassword1" name="password"  value="" placeholder="Password" autocomplete="off" tabindex="2">
				</div>
			</form>
			<p class="forgot_pw">
				<label>
				Forgot your password? 
				<a href="../phpmailer/reset.php" tabindex="3">Click here to reset it</a>.
				</label>
			</p>
		  <?php include("login_help.php"); ?>
      </div>
      <div class="modal-footer">
		<button type="button" class="btn btn-primary" onclick="formhash(login_form, login_form.password);">		Login
		</button>
      </div>
    </div>

  </div>
</div><!-- / Login Modal -->