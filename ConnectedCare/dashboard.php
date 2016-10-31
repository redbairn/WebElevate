<?php
/************************************************************************************* 
* Author: Craig Bell
* Assignment: WE4.0 HTML site Build and associated Backend Code, Digital Skills Academy 
* Student ID: D15126839 
* Date: 2016/04/25
* Ref: http://www.wikihow.com/Create-a-Secure-Login-Script-in-PHP-and-MySQL
**************************************************************************************/

include_once 'includes/db_connect.php';
include_once 'includes/session.class.php';

//define page title
$title = 'Dashboard';
 
?>

<?php include("includes/header.php"); ?>
    <body>
		<div class="container">
		
			
				
				<!--- BANNER -------->					
				<img src="/ConnectedCare/assets/images/banner_2.jpg"  alt="banner" width="100%">
				
				
   			       <!---  END OF BANNER -------->
				    
   	
					</div> <!-- / container -->
			<div class="logged">
				<?php if ( $sessionObj2 == true) : ?>
					<h1>Welcome <?php echo htmlentities($_SESSION['username']); ?></h1> 
					<form>
						<p>
							This is an example protected page.  To access this page, users
							must be logged in.  At some stage, we'll also check the role of
							the user, so pages will be able to determine the type of user
							authorised to access the page.
						</p>
						<p><strong>Continue to </strong><a href="cpanel.php">Control Panel</a></p>
						<?php echo $sessionObj1; ?>
					<?php else : ?>
						<p>
							<a class="btn btn-lg btn-danger" href="#">Unauthorised Access!</a>
						</p>
						<p>
							<span class="error">You are not authorized to access this page.</span>
						</p>
						<p>
						 Please click <a data-toggle="modal" data-target="#myLoginModal">here</a> to login.
						</p>
				<?php endif; ?>
					</form>
			</div>
			<?php include("includes/login_help.php"); ?>
		</div>
    </body>
<?php include("includes/footer.php"); ?>