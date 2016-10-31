<?php
/************************************************************************************* 
* Author: Craig Bell
* Assignment: WE4.0 HTML site Build and associated Backend Code, Digital Skills Academy 
* Student ID: D15126839 
* Date: 2016/04/25
* Ref: http://www.wikihow.com/Create-a-Secure-Login-Script-in-PHP-and-MySQL
**************************************************************************************/

/*IMRON02 helped me understand about calling the function from the other file*/
/*Needed to set the variable to the called function in order for the page to use the var.*/
if ($sessionObj2 == true) {
	$logged = 'in';
} else {
	$logged = 'out';
}


echo '<div class=\'login-help\'>';

			if ($sessionObj2 == true) {
				echo '<li class=\'circle_in\'>Currently logged ' . $logged . ' as ' . htmlentities($_SESSION['username']) . '.</li>';
				echo '<p>Do you want to change user? <a href="/ConnectedCare/includes/logout.php">Log out</a>.</p>';
			} else{
				echo '<li class=\'circle_out\'> Currently logged ' . $logged . '.</li>';
				echo '<p>If you don\'t have a login, please <a href="http://site519.webelevate.net/ConnectedCare/Register/">register</a></p>';
			}
 
echo '</div>';

?>