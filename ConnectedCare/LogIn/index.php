<?php 
//define page title
$title = 'LogIn';

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
					
<h3 class="center title"><i class="fa fa-sign-in" aria-hidden="true" style="margin: 10px;"></i> LogIn</h3>
					
 <div class="col-xs-12 col-sm-12 col-md-6 col-md-push-3 col-lg-6 col-lg-push-3 login_container">
        
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
		  <?php include("../includes/login_help.php"); ?>

      <div class="modal-footer">
     
		<button type="button" class="btn btn-primary" onclick="formhash(login_form, login_form.password);">Login</button>
      </div>


                        </div> <!-- / login_container -->			
					
				</div> <!-- / container -->				
			</div> <!-- / row -->
			
		</main>

<?php include ('../includes/footer.php'); ?>