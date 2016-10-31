<?php
/************************************************************************************* 
* Author: Craig Bell
* Assignment: WE4.0 HTML site Build and associated Backend Code, Digital Skills Academy 
* Student ID: D15126839 
* Date: 2016/04/25
* Ref: http://www.wikihow.com/Create-a-Secure-Login-Script-in-PHP-and-MySQL
**************************************************************************************/			

/* --- ALERT MESSAGES --- */

// Error message from Login Form
if (isset($_GET['error'])) {
	// Message from redirection with the URL header('../index.php?error=1')
	echo '<div class="alert alert-danger" role="alert" style="margin-bottom:5%;z-index: 2;text-align:center;"><h1>Error Logging In!</h1></div>';
}
// Error message from Registration Form
if (!empty($error_msg)) {
	echo '<div class="alert alert-danger" role="alert" style="margin-bottom:5%;z-index: 2;text-align:center;"><h1>Unsuccessful Registration</h1>'.$error_msg.'</div>';
}
// Success message from Registration Form
if (!empty($success_msg)) {
	echo '<div class="alert alert-success" role="alert" style="margin-bottom:5%;z-index: 2;text-align:center;"><h1>Registration successful!</h1><p>'.$success_msg.'</p></div>';
}
// Success message from Contact Form
if ($savingMessage) {
	echo '<div class="alert alert-success" role="alert" style="margin-bottom:5%;z-index: 2;text-align:center;"><h1>Message Sent!</h1><p>One of our customer support representatives will contact you shortly.</p></div>';
}
// Success message when Logged Out
if ($_GET["logout"] == "true"){
	echo '<div class="alert alert-success" role="alert" style="margin-bottom:5%;z-index: 2;text-align:center;"><h1>Logged Out</h1><p>You have logged out successfully!</p></div>';
}
	
?>