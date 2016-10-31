<?php
/************************************************************************************* 
* Author: Craig Bell
* Assignment: WE4.0 HTML site Build and associated Backend Code, Digital Skills Academy 
* Student ID: D15126839 
* Date: 2016/04/25
* Ref: http://www.wikihow.com/Create-a-Secure-Login-Script-in-PHP-and-MySQL
**************************************************************************************/
/*
 * Copyright (C) 2013 peredur.net
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
/*Require or get fatal error*/
include_once 'psl-config.php';
include_once 'db_connect.php';
// instantiate a new DAL
$dal = new DAL();
$mysqli = $dal -> dbconnect();
/*Session class for across the website*/
class Session
{
	// Securely start a PHP session.
	public function sec_Session_start() {
		$session_name = 'sec_session_id';   // Set a custom session name 
		$secure = SECURE; // Don't change this (If TRUE cookie will only be sent over secure connections.)

		// This stops JavaScript being able to access the session id.
		$httponly = true;

		// Forces sessions to only use cookies.
		if (ini_set('session.use_only_cookies', 1) === FALSE) {
			header("Location: ../error.php?err=Could not initiate a safe session (ini_set)");
			exit();
		}

		// Gets current cookies params.
		$cookieParams = session_get_cookie_params();
		session_set_cookie_params($cookieParams["lifetime"], 
			$cookieParams["path"], 
			$cookieParams["domain"], 
			$secure, 
			$httponly);

		// Sets the session name to the one set above.
		session_name($session_name);
		session_start();            // Start the PHP session 
		session_regenerate_id();    // regenerated the session, delete the old one.

		
	}
	
	// Check logged in status.
	public function login_Check($mysqli) {
		// Check if all session variables are set 
		if (isset($_SESSION['user_id'], $_SESSION['username'], $_SESSION['login_string'])) {
			$user_id = $_SESSION['user_id'];
			$login_string = $_SESSION['login_string'];
			$username = $_SESSION['username'];
			

			// Get the user-agent string of the user.
			$user_browser = $_SERVER['HTTP_USER_AGENT'];

			if ($stmt = $mysqli->prepare("SELECT password 
						  FROM logins 
						  WHERE id = ? LIMIT 1")) {
				// Bind "$user_id" to parameter. 
				$stmt->bind_param('i', $user_id);
				$stmt->execute();   // Execute the prepared query.
				$stmt->store_result();

				if ($stmt->num_rows == 1) {
					// If the user exists get variables from result.
					$stmt->bind_result($password);
					$stmt->fetch();
					$login_check = hash('sha512', $password . $user_browser);

					if ($login_check == $login_string) {
						// Logged In!!!! 
						return true;
					} else {
						// Not logged in 
						return false;
					}
				} else {
					// Not logged in 
					return false;
				}
			} else {
				// Could not prepare statement
				header("Location: ../error.php?err=Database error: cannot prepare statement");
				exit();
			}
		} else {
			// Not logged in 
			return false;
		}
	}
}
$sessionObject1 = new Session();
$sessionObj1 = $sessionObject1 -> sec_Session_start();
$sessionObject2 = new Session();
$sessionObj2 = $sessionObject2 -> login_Check($mysqli); // Needed to set the variable to the called function in order for the page to use the var.
?>