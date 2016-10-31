<?php
/************************************************************************************* 
* Author: Craig Bell
* Assignment: WE4.0 HTML site Build and associated Backend Code, Digital Skills Academy 
* Student ID: D15126839 
* Date: 2016/04/25
* Ref: http://www.wikihow.com/Create-a-Secure-Login-Script-in-PHP-and-MySQL
**************************************************************************************/

// instantiate a new DAL
$dal = new DAL();
$mysqli = $dal -> dbconnect();

// Grab the username for the session
$sessionNow = new Session();

class User
{
	public function addInfo()
	{
		global $mysqli;
		$message = "";
		 
		if (isset($_POST['firstname'], $_POST['lastname'], $_POST['dob'], $_POST['housenam'], $_POST['street'], $_POST['town'], $_POST['county'])) 
		{
			// Sanitize and validate the data passed in
			$firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
			$lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
			$dob = preg_replace("([^0-9/])", "", $_POST['dob']);
			$housenam = filter_input(INPUT_POST, 'housenam', FILTER_SANITIZE_STRING);
			$street = filter_input(INPUT_POST, 'street', FILTER_SANITIZE_STRING);
			$town = filter_input(INPUT_POST, 'town', FILTER_SANITIZE_STRING);
			$county = filter_input(INPUT_POST, 'county', FILTER_SANITIZE_STRING);
			$username = $_SESSION['username'];
			
			
			/*The Additonal Member Information details inserted into the database when the form details are submitted*/
			$insert_stmt = "INSERT INTO site519_secure_login.users (USERNAME, FIRSTNAME, LASTNAME, DATE_OF_BIRTH, HOUSE_NAME, STREET, TOWN, COUNTY) VALUES 
			('".$username."','".$firstname."','".$lastname."','".$dob."','".$housenam."','".$street."','".$town."','".$county."')" or die ("Error...");
			
			//execute the query
			return $mysqli->query($insert_stmt);
		
			// If the statment doesn't work throw a failure message and make a redirect
			if (! $mysqli->query($insert_stmt)) 
			{
				header('Location: ../error.php?err=Member Information failure: INSERT');
			}else{
				// $message = "Thank you for sending in your details.";
				header('Location:   ../protected_page.php?message=1');		
				exit();
			}
		}
	}
	
	/*Function to store the Contact form message*/
	public function storeMessage()
	{
		global $mysqli;
		$success_contact_msg = "";
		
		if (isset($_POST['recipientName'], $_POST['recipientEmail'], $_POST['messagetext'])) 
		{
			// Sanitize and validate the data passed in
			$recipientname = filter_input(INPUT_POST, 'recipientName', FILTER_SANITIZE_STRING);
			$recipientemail = filter_input(INPUT_POST, 'recipientEmail', FILTER_SANITIZE_EMAIL);
			$messagetext = filter_input(INPUT_POST, 'messagetext', FILTER_SANITIZE_STRING);
			$messagetext = $mysqli->real_escape_string($messagetext);
			/* $username = $_SESSION['username']; */
			
			
			/*The Additonal Member Information details inserted into the database when the form details are submitted*/
			$insert_stmt = "INSERT INTO site519_secure_login.contact_messages (RECIPIENT_NAME, RECIPIENT_EMAIL, MESSAGE) VALUES 
			('".$recipientname."','".$recipientemail."','".$messagetext."')" or die ("Error...");
			
			//execute the query
			return $mysqli->query($insert_stmt);
		
			// If the statment doesn't work throw a failure message and make a redirect
			if ($insert_stmt->execute()) 
			{
				header('Location: ../error.php?err=Member Information failure: INSERT');
			}
		}
	}//End of storeMessage
}
// instantiate a new User
$storeMessage = new User();
$savingMessage = $storeMessage -> storeMessage($success_contact_msg);
/*Saving Additional Information*/
$additionalInfo = new User();
$additional_information = $additionalInfo -> addInfo();
?>