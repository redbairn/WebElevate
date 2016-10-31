<?php
/********************************************************** 
* Author: Craig Bell
* Assignment: WE4.0 HTML site Build and associated Backend Code, Digital Skills Academy 
* Student ID: D15126839 
* Date: 2016/04/25
* Ref: http://chenroulin.com/questions/77935/php-loginsystem-remember-me
***********************************************************/  
include_once 'db_connect.php';
include_once 'session.class.php';//Where to check if user is successfully logged in
/* include_once 'protected_page.php'; */


class Cookies{
	public function theCookie(){
			if (($sessionObj2 == true) && $sessionObj1) { // However you implement it_ ($login->success && $login->rememberMe)
			$selector = base64_encode(openssl_random_pseudo_bytes(9));
			$authenticator = openssl_random_pseudo_bytes(33);

			setcookie(
				'remember',
				 $selector.':'.base64_encode($authenticator),
				 time() + 864000,
				 '/',
				 'yourdomain.com',
				 true, // http-only
				 true  // TLS-only
			);

			$database->exec(
				"INSERT INTO auth_tokens (selector, token, userid, expires) VALUES (?, ?, ?, ?)", 
				[
					$selector,
					hash('sha256', $authenticator),
					$login->userId,
					date('Y-m-d\TH:i:s', time() + 864000)
				]
			);
		}
	}
	public function reAuth(){
			if (empty($_SESSION['user_id']) && !empty($_COOKIE['remember'])) {
			list($selector, $authenticator) = explode(':', $_COOKIE['remember']);

			$row = $database->selectRow(
				"SELECT * FROM auth_tokens WHERE selector = ?",
				[
					$selector
				]
			);

			if (hash_equals($row['token'], hash('sha256', $authenticator))) {
				$_SESSION['userid'] = $row['userid'];
				// Then regenerate login token as above
			}
		}
	}
}
?>