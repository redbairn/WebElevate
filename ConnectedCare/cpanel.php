<?php
/************************************************************************************* 
* Author: Craig Bell
* Assignment: WE4.0 HTML site Build and associated Backend Code, Digital Skills Academy 
* Student ID: D15126839 
* Date: 2016/04/25
* Ref: http://www.wikihow.com/Create-a-Secure-Login-Script-in-PHP-and-MySQL
**************************************************************************************/
include("includes/header.php");
?>
    <body>
		<div class="container">
			<!-- Registration form to be output if the POST variables are not
			set or if the registration script caused an error. -->
			<div class="memInfo">
				<h1>Additional Member Information</h1>
				<?php
					if (!empty($error_msg)) 
					{
						echo $error_msg;
					}
				?>
				<form action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>" 
						method="post" 
						name="member_form">
						<p style="text-align:center;"><strong>Please provide all your details below.</strong></p>
						<?php 
							if(!empty($_GET['message'])) 
							{
								$message = $_GET['message'];
								echo "<p class='dets_success'>" . $message . "</p>";
							}
						?>
						<br />
					Firstname: <input type="text" 
						name="firstname" 
						id="firstname"
						placeholder="John"
						required /><br>
					Lastname: <input type="text" 
						name="lastname" 
						id="lastname"
						placeholder="Smith"
						required /><br>
					Date of Birth: <input type="date"
									 name="dob" 
									 id="dob" 
									 required /><br>
					House/Apt: <input type="text" 
						name="housenam" 
						id="housenam"
						placeholder="Building name or number"
						required /><br>
					Street: <input type="text" 
						name="street" 
						id="street"
						placeholder="Seaview Park" 
						required /><br>
					Town: <input type="text" 
						name="town" 
						id="town" 
						placeholder="Greystones"
						required /><br>
					County: <input type="text" 
						name='county' 
						id='county'
						placeholder="County Wicklow"
						required /><br>
					<p><a class="remove" href="protected_page.php">&#8592;Return to Welcome Page</a></p> 
					<p class="submit">
					<input type="button" 
						   value="Submit"
						   onclick="return meminfo(this.form,
										   this.form.firstname,
										   this.form.lastname,
										   this.form.dob,
										   this.form.housenam,
										   this.form.street,
										   this.form.town,
										   this.form.county);" /> 
					</p>
				</form>
			</div>
			<?php include("includes/login_help.php"); ?>
		</div>
    </body>
<?php include("includes/footer.php"); ?>