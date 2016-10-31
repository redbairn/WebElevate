<?php
/************************************************************************************* 
* Author: Craig Bell
* Assignment: WE4.0 HTML site Build and associated Backend Code, Digital Skills Academy 
* Student ID: D15126839 
* Date: 2016/04/25
* Ref: http://www.wikihow.com/Create-a-Secure-Login-Script-in-PHP-and-MySQL
**************************************************************************************/

include_once 'db_connect.php';
include_once 'session.class.php';
include_once 'login_attempts.php';

session_start();
 
if (isset($_POST['email'], $_POST['p'])) {
	$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = $_POST['p']; // The hashed password.
 
    if (login($email, $password, $mysqli) == true) {
        // Login success 
        header('Location: ../dashboard.php');
    } else {
        // Login failed 
        header('Location: ../index.php?error=1');
    }
} else {
    // The correct POST variables were not sent to this page. 
	header('Location: ../error.php?err=Could not process login');
    echo 'Invalid Request';
}

?>