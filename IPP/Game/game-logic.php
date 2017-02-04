<?php


include($_SERVER['DOCUMENT_ROOT'] .'/(name of client)/wp-content/themes/dt-the7-child/includes/db.class.php');

// Getting the details from the Topics page
if (isset($_POST['submit'])){

	// Show the radio button value, i.e. which one was checked when the form was sent
	$chosen_difficulty = strtolower($_POST['difficulty']);
	$chosen_subtopic = $_POST['SUBTOPIC_NAME'];

	

	// Get all questions
	// *ORDER BY rand() - Orders the questions in a random order.
	// *Limit the amount of questions by 10.
	// *Select the difficulty that was chosen by the user.
	// *Select the questions where the subtopic that was chosen by the user on the topics page will appear in the loaded game.


	// Our database object
	$db = new Db();

	// Get the username from the Current User info
	include($_SERVER['DOCUMENT_ROOT'] .'/(name of client)/wp-content/themes/dt-the7-child/includes/get_currentuserinfo.php');

	// Make the username all lowercase
	$userName = strtolower($userName);

	

	// Create dynamic table for each student where the ten questions will be stored.
	// sql to create the (temporary) dynamic table until topic is finished by the player.
	// Drop the table when finished the subtopic.

	$create_table = "CREATE TABLE IF NOT EXISTS `current_users_questions_".$userName."` (
			`current_questionID` INT(2) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			`question_id` INT(11) unsigned NOT NULL,
			`answer` VARCHAR(20) NOT NULL,					
			`question_text` VARCHAR(255) NOT NULL,
			`question_easy` VARCHAR(100) NOT NULL,
			`question_medium` VARCHAR(100) NOT NULL,
			`question_difficult` VARCHAR(100) NOT NULL,
			`topic_name` VARCHAR(50) NOT NULL,
			`subtopic_name` VARCHAR(50) NOT NULL,
			`Is_completed?` VARCHAR(1) DEFAULT 'N',
			`Is_correct?` VARCHAR(1) DEFAULT 'N',
			FOREIGN KEY (`question_id`) REFERENCES `questions2`(`question_id`)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8";
		
	// Here we actually process the query with our Db Class
	$db -> query($create_table);

	// This trigger will limit the amount of rows to ten so there is no double or more entries created.
	$trigger = "CREATE TRIGGER handleTenRows BEFORE INSERT ON `current_users_questions_".$userName."`
				FOR EACH ROW
				BEGIN
					IF (SELECT COUNT(*) FROM `current_users_questions_".$userName."`) = 10 THEN
						DELETE FROM `current_users_questions_".$userName."`
						ORDER BY current_questionID 
						LIMIT 1;
					END IF;    
				END";

	// Here we actually process the trigger query with our Db Class
	$db -> query($trigger);

	
	// Adds the random 10 questions to a temporary table for the student
	// We are getting the details from the questions2 table
	// We'll drop this table after the student has completed this subtopic
	$insert_stmt = "INSERT INTO current_users_questions_".$userName."(question_id, answer, question_text, question_". $chosen_difficulty .", topic_name, subtopic_name)
	 SELECT question_id, answer, question_text, question_". $chosen_difficulty .", topic_name, subtopic_name FROM questions2 WHERE subtopic_name= '" . $chosen_subtopic . "' ORDER BY RAND() LIMIT 10";

	
	// Here we actually process the query with our Db Class
	$db -> query($insert_stmt);

	// Inside massive loop which will go through the 10 questions in the table.
	// will need some foreach here


		// Get the first question from the temporary table and we will display it to the user below
		$select_first = "SELECT question_id, answer, question_text, question_". $chosen_difficulty .", topic_name, subtopic_name FROM current_users_questions_".$userName." ORDER BY current_questionID LIMIT 1";

		// Use our select function in the db class
		$data = $db -> select($select_first);

		// Loop through the data and we will output the correct items
		foreach((array)$data as $key) 
		{
			$question_text = $key["question_text"];
			$question_text = str_replace('\\', '', $question_text);
			$difficulty = $key['question_'.$chosen_difficulty.''];

			//regex to display the equations
			$patternfirst = array();
			$patternfirst[0] = "~(?:\([^\)]+\))(*SKIP)(*F)|\++~";
			$patternfirst[1] = "~(?:\([^\)]+\))(*SKIP)(*F)|\-+~";
			$patternfirst[2] = "~(?:\([^\)]+\)|\<[^\>]+\>|\{[^\}]+\})(*SKIP)(*F)|\/+~";
			$patternfirst[3] = "~(?:\([^\)]+\))(*SKIP)(*F)|x+~";
			$replacementfirst = array();
			$replacementfirst[0] = "<br>+";
			$replacementfirst[1] = "<br>-";
			$replacementfirst[2] = "<br>÷";
			$replacementfirst[3] = "<br>×";
			$difficulty = preg_replace($patternfirst, $replacementfirst, $difficulty);
			$patternsec = array();
			$patternsec[0] = "~(?:\<[^\>]+\>|\{[^\}]+\})(*SKIP)(*F)|\++~";//
			$patternsec[1] = "~(?:\<[^\>]+\>|\{[^\}]+\})(*SKIP)(*F)|\-+~";//
			$patternsec[2] = "~(?:\<[^\>]+\>|\{[^\}]+\})(*SKIP)(*F)|\/+~";
			$patternsec[3] = "~(?:\<[^\>]+\>|\{[^\}]+\})(*SKIP)(*F)|x+~";
			$replacementsec = array();
			$replacementsec[0] = " + ";//
			$replacementsec[1] = " - ";//
			$replacementsec[2] = " ÷ ";
			$replacementsec[3] = " × ";
			$difficulty = preg_replace($patternsec, $replacementsec, $difficulty);
			$patternthree = array();
			$patternthree[0] = "~(?:\<[^\>]+\>)(*SKIP)(*F)|\/+~";
			$patternthree[1] = "/[{]/";
			$patternthree[2] = "/[}]/";
			$replacethree = array();
			$replacethree[0] = "</sup>&frasl;<sub>";
			$replacethree[1] =  "<sup>";
			$replacethree[2] =  "</sub>";
			$difficulty = preg_replace($patternthree, $replacethree, $difficulty);
			$patternfour = array();
			$patternfour[0] = "~(?:\<[^\>]+\>)(*SKIP)(*F)|\*\|+~";
			$patternfour[1] = "~(?:\<[^\>]+\>)(*SKIP)(*F)|\|\*+~";
			$replacefour = array();
			$replacefour[0] = "<sup>";
			$replacefour[1] = "</sup>";
			$difficulty = preg_replace($patternfour, $replacefour, $difficulty);
			$patternfive = array();
			$patternfive[0] = "~(?:\<[^\>]+\>)(*SKIP)(*F)|\^\|+~";
			$patternfive[1] = "~(?:\<[^\>]+\>)(*SKIP)(*F)|\|\^+~";
			$replacefive = array();
			$replacefive[0] = "<math><msqrt><mi>";
			$replacefive[1] = "</mi></msqrt></math>";
			$difficulty = preg_replace($patternfive, $replacefive, $difficulty);

			$topic_name = $key['topic_name'];
			$subtopic_name = $key['subtopic_name'];
			$question_id = $key['question_id'];
		}



		


		
	// Getting the details from the Game Page 
	// and Send to submitted_answers table.
	if (isset($_POST['submit'], $_POST['submitted_answer']) && ($attempts++ < 4))
	{
		include($_SERVER['DOCUMENT_ROOT'] .'/(name of client)/wp-content/themes/dt-the7-child/includes/get_currentuserinfo.php');

		// Hidden values submitted across
		$chosen_topic = ucwords($_POST['TOPIC_NAME']);
		$chosen_subtopic = ucwords($_POST['SUBTOPIC_NAME']);
		$question_text = $_POST['QUESTION_TEXT'];
		$question_id = $_POST['QUESTION_ID'];
		$difficulty = strtolower($_POST['DIFFICULTY_EQUATION']);
		$chosen_difficulty = $_POST['DIFFICULTY_NAME'];
		// We can post this value to the database for each record and count up the amount of attempts made
		$attempts = 1;

		// Sanitize and validate the data passed in
		$userAnswer = filter_input(INPUT_POST, 'submitted_answer', FILTER_SANITIZE_STRING);
		if (!filter_var($userAnswer, FILTER_SANITIZE_STRING)) {
			// Not a valid email
			$error_msg .= '<p class="error">The answer you entered is not valid</p>';
		}

		
		// This trigger will limit the amount of attempts to three so there no more entries are created.
		$answer_trigger = "CREATE TRIGGER handleThreeRows BEFORE INSERT ON `submitted_answers`
					FOR EACH ROW
					BEGIN
						IF (SELECT COUNT(*) FROM `submitted_answers`) = 3 THEN
							DELETE FROM `submitted_answers`
							ORDER BY sub_answerID 
							LIMIT 1;
						END IF;    
					END";

		// Here we actually process the trigger query with our Db Class
		$db -> query($answer_trigger);
		
		// Creating the query for the submitted answer
		$insert_answer = "INSERT INTO submitted_answers (users_answer, username, user_email, user_fname, user_lname, user_id, chosen_topic, chosen_subtopic, question_given, attempts_made, question_id) 
		VALUES ('".$userAnswer."', '".$userName."', '".$userEmail."', '".$userFname."', '".$userLname."', '".$userID."', '".$chosen_topic."', '".$chosen_subtopic."', '".$question_text."', '".$attempts."', ".$question_id.")";

		// Here we are submitting the answer
		$submitted = $db -> query($insert_answer);
		
		if (!$submitted){
			$result  = 'error';
			$message = 'query error';
			//echo $result;
		} else {
			$result  = 'Successfully inserted to submitted_answers table!';
			$message = 'query success';
			//echo $result;
		}

		// Need to do a query here to find out the answer from the database
		$select_answer = "SELECT answer, additional_message, question_text FROM questions2 WHERE question_id= '" . $question_id . "'";

		// We are getting the answer, additional message (if one exists) and the question text
		$correct_answer = $db->select($select_answer);

		if (!$correct_answer){
			$result  = 'error';
			$message = 'query error';
		} else {
			$result  = 'success';
			$message = 'query success';

			// Multidimensional Array and echoed out the topics and subtopics stored in the database.
			foreach ((array)$correct_answer as $key)
			{
						$additional_message = $key['additional_message'];
						$question_text = $key['question_text'];
						$question_text = str_replace('\\', '', $question_text);
						$answer = $key['answer'];
			}

			// Checking to see if the users input is the same as the stored db answer.
			if(($answer === $userAnswer))
			{
				// Need to iterate the Question number
				// $question_no 
				// Insert into new table for current_play.


				// Show the below messages and allow the student to press next to continue to the next question
				if(!empty($additional_message))
				{
					$success_message = '<div class="alert alert-success"><strong>WELL DONE!</strong> The correct answer is '.$answer.'! <p>'.$additional_message.'</p>Click <u>Next</u> to continue.</div>';
					//Show next button to continue
				}else{
					$success_message = '<div class="alert alert-success"><strong>WELL DONE!</strong> The correct answer is '.$answer.'! Click <u>Next</u> to continue.</div>';
					//Show next button to continue
				}
			}else{
				// Can only fail twice then switched to easier questions.
				$failure_message = '<div class="alert alert-warning"><strong>UNLUCKY!</strong>  Please try again.</div>';
				$attempts_made = "UPDATE submitted_answers SET attempts_made where question_id = ".$question_id."";
				$db->query($attempts_made);
				
				// Need to uppercase the username for the query below to work
				$userName = ucfirst($userName);
				// Count the amount of attempts made so far.
				$no_of_attempts = "SELECT COUNT(*) AS overall_attempts 
				FROM `submitted_answers` 
				WHERE username = '".$userName."' 
				AND question_id = ".$question_id." 
				GROUP BY `attempts_made` 
				HAVING COUNT(*) > 1";
				
				$data = $db->select($no_of_attempts);
				// Process the array and assign the value from the count to the variable which we can use on the Game page.
				foreach((array)$data as $key) 
				{
					$attempts = $key['overall_attempts'];
				}
				// Select the amount of times and output to screen.
				
			

				

				// Change the user automatically to the lower level
				// Do another selection for the current question but at a lower difficulty level.
				// echo "We are now changing you to a lower level instead.";
			} 
		}
	}//End of if statement for submitted answer
}// End of submission from Topics Page

?>