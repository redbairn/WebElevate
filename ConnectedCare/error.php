<?php
/************************************************************************************* 
* Author: Craig Bell
* Assignment: WE4.0 HTML site Build and associated Backend Code, Digital Skills Academy 
* Student ID: D15126839 
* Date: 2016/04/25
* Ref: http://www.wikihow.com/Create-a-Secure-Login-Script-in-PHP-and-MySQL
**************************************************************************************/

$error = filter_input(INPUT_GET, 'err', $filter = FILTER_SANITIZE_STRING);
 
if (! $error) {
    $error = 'Oops! An unknown error happened.';
}
?>
<?php 
//define page title
$title = 'Error';

include ('includes/header.php'); ?>
	<div class="container">
		<main>
			<h1 id="error_title">There was a problem</h1>
			<p class="error"><?php echo $error; ?></p>  
		</main>
	</div>
<?php include ('includes/footer.php'); ?>