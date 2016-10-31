<?php
/************************************************************************************* 
* Author: Craig Bell
* Assignment: WE4.0 HTML site Build and associated Backend Code, Digital Skills Academy 
* Student ID: D15126839 
* Date: 2016/04/25
* Ref: http://www.wikihow.com/Create-a-Secure-Login-Script-in-PHP-and-MySQL
**************************************************************************************/

/**
 * These are the database login details
 */  
define("HOST", "localhost");     // The host you want to connect to.
define("USER", "site519_sec_user");    // The database username. // site519_sec_user
define("PASSWORD", "eKcGZr59zAa2BEWU");    // The database password. 
define("DATABASE", "site519_secure_login");    // The database name. // _Was secure_login before using for DSA (Shared Hosting) // site519_secure_login_
 
define("CAN_REGISTER", "any");
define("DEFAULT_ROLE", "member");

//set timezone
date_default_timezone_set('Europe/London');

//application address
define('DIR','http://site519.webelevate.net/');
define('SITEEMAIL','noreply@webelevate.net');// need to set up on cPanel???
 
define("SECURE", FALSE);    // FOR DEVELOPMENT ONLY!!!!

?>