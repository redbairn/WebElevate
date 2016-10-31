<?php
/************************************************************************************* 
* Author: Craig Bell
* Assignment: WE4.0 HTML site Build and associated Backend Code, Digital Skills Academy 
* Student ID: D15126839 
* Date: 2016/04/25
* Ref: http://www.wikihow.com/Create-a-Secure-Login-Script-in-PHP-and-MySQL
**************************************************************************************/
include_once 'session.class.php';

session_start();

// Unset all session values 
$_SESSION = array();
 
// get session parameters 
$params = session_get_cookie_params();

$success_logout_msg = "";
 
// Delete the actual cookie. 
setcookie(session_name(),
		'', time() - 42000, 
		$params["path"], 
		$params["domain"], 
		$params["secure"], 
		$params["httponly"]);
 
// Destroy session 
session_destroy();
header('Location: ../index.php?logout=true'); // Redirect back to the homepage here
exit();


?>