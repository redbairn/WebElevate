<?php
/************************************************************************************* 
* Author: Craig Bell
* Assignment: WE4.0 HTML site Build and associated Backend Code, Digital Skills Academy 
* Student ID: D15126839 
* Date: 2016/04/25
* Ref: http://www.wikihow.com/Create-a-Secure-Login-Script-in-PHP-and-MySQL
**************************************************************************************/
include_once 'db_connect.php';
//include_once '../classes/phpmailer/mail.php';

$error_msg = "";
$success_msg = '';
 
if (isset($_POST['username'], $_POST['email'], $_POST['p'])) {
    // Sanitize and validate the data passed in
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Not a valid email
        $error_msg .= '<p class="error">The email address you entered is not valid</p>';
    }
 
    $password = filter_input(INPUT_POST, 'p', FILTER_SANITIZE_STRING);
    if (strlen($password) != 128) {
        // The hashed pwd should be 128 characters long.
        // If it's not, something really odd has happened
        $error_msg .= '<p class="error">Invalid password configuration.</p>';
    }
 
    // Username validity and password validity have been checked client side.
    // This should should be adequate as nobody gains any advantage from
    // breaking these rules.
    //
 
    $prep_stmt = "SELECT id FROM logins WHERE email = ? LIMIT 1";
    $stmt = $mysqli->prepare($prep_stmt);
 
	// check existing email  
    if ($stmt) {
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result();
 
        if ($stmt->num_rows == 1) {
            // A user with this email address already exists
            $error_msg .= '<p>A user with this email address already exists.</p>';
        }
    } else {
        $error_msg .= '<p>Database error Line 45</p>';
    }
 
    // check existing username
    $prep_stmt = "SELECT id FROM logins WHERE username = ? LIMIT 1";
    $stmt = $mysqli->prepare($prep_stmt);
 
    if ($stmt) {
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $stmt->store_result();
 
		if ($stmt->num_rows == 1) {
				// A user with this username already exists
				$error_msg .= '<p>A user with this username already exists</p>';
		}
	} else {
			$error_msg .= '<p>Database error line 64</p>';
	}
 
    // TODO: 
    // We'll also have to account for the situation where the user doesn't have
    // rights to do registration, by checking what type of user is attempting to
    // perform the operation.
 
    if (empty($error_msg)) {
        // Create a random salt
        //$random_salt = hash('sha512', uniqid(openssl_random_pseudo_bytes(16), TRUE)); // Did not work
        $random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
 
        // Create salted password 
        $password = hash('sha512', $password . $random_salt);
 
 
		/////////////////////////////////////////////////
		//* Section for posting new registered member */
		///////////////////////////////////////////////
		$to = $email; //validated earlier
		$subject = "Registration Confirmation - ConnectedCare";
		$body = "<p>Thank you for registering at ConnectedCare.</p>
		<p>To activate your account, please click on this link: <a href='".DIR."activate.php?x=$id&y=$activasion'>".DIR."activate.php?x=$id&y=$activasion</a></p>
		<p>Regards Site Admin</p>";

		/* $mail = new Mail();
		$mail->setFrom(SITEEMAIL);//ConnectedCare Email address
		$mail->addAddress($to);
		$mail->subject($subject);
		$mail->body($body);
		$mail->send();*/
		
        // Insert the new user into the database 
        if ($insert_stmt = $mysqli->prepare("INSERT INTO logins (username, email, password, salt) VALUES (?, ?, ?, ?)")) {
            $insert_stmt->bind_param('ssss', $username, $email, $password, $random_salt);
            //Execute the prepared query.
            if (! $insert_stmt->execute()) {
                header('Location: ../error.php?err=Registration failure: INSERT');
				exit();
            }
			
        }
        $success_msg .= 'You can now login from <a data-toggle="modal" data-target="#myLoginModal">here</a>';
    }
}
?>