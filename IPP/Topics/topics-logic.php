<?php

// We need to first get the user to click on a link (subtopic).
// Then the user will get a modal window to show the difficulty levels.
// When they select the difficulty and click Play we will change the page and load up the questions for that subtopic.
// We will also display the equation from the level chosen.


// Database details
// The constants below come from the wp-config.php
$db_server   = DB_HOST;
$db_username = DB_USER;
$db_password = DB_PASSWORD;
$db_name     = DB_NAME;

// Connect to database
$db_connection = mysqli_connect($db_server, $db_username, $db_password, $db_name);
if (mysqli_connect_errno()){
	$result  = 'error';
	$message = 'Failed to connect to database: ' . mysqli_connect_error();
}
// Get all subtopics
$query = "SELECT DISTINCT topic_name, subtopic_name FROM questions2 ORDER BY topic_name";
$query = mysqli_query($db_connection, $query);
if (!$query){
	$result  = 'error';
	$message = 'query error';
} else {
	$result  = 'success';
	$message = 'query success';
	while ($topics = mysqli_fetch_array($query)){
		$mysql_data[] = array(
			"topic_name"		=> $topics['topic_name'],
			"subtopic_name"		=> $topics['subtopic_name']
		);
	}
}
?>

<?php 
//Below we will populate lists with the topics and subtopics
// Close database connection
 mysqli_close($db_connection);

// Prepare data
$data = array(
  "result"  => $result,
  "message" => $message,
  "data"    => $mysql_data
);?>
				

<ul class="topics-list">
<?php
// Multidimensional Array and echoed out the topics and subtopics stored in the database.
foreach ($data as $key)
{
	// group the data
	$groupedData = array();
	foreach ((array)$key as $item)
	{ 
		if (is_array($item)){
			$topic_name = $item['topic_name'];
			$subtopic_name = ucwords($item['subtopic_name']);
			$groupedData[$topic_name][] = $subtopic_name;
		}
	}
	// grouped output
	foreach ((array)$groupedData as $topic_name => $subtopic_names) 
	{
		echo '<div class="the_topic">';
		echo '<div class="panel panel-default"><!-- START TOPIC CONTAINER -->';
		echo '<a data-toggle="collapse" href="#'.$topic_name .'" class="title_link">';
		echo '<div class="panel-heading accordion_heading">';
		echo '<h2 class="panel-title">' . $topic_name . '   <i class="fa fa-angle-up" aria-hidden="true"></i></h2>';
		echo '</div>';
		echo '</a><!-- END PANEL HEADING -->';
		echo '<!-- TOPIC CONTAINER TITLE/NAME -->';
		echo '<div id="'.$topic_name .'" class="panel-collapse collapse">';
		echo '<div class="panel-body accordion_body">';
		foreach ($subtopic_names as $subtopic_name) 
		{
			echo '<li class="subtopic_name col-lg-3"><a href="#" data-toggle="modal" data-target="#lvlModal"><h3 class="subtopics">';//Trigger the modal with a link
			echo $subtopic_name;
			echo '</h3></a></li>';
		}
		echo '</div><!-- END PANEL BODY -->';
		echo '</div><!-- END COLAPSE 1 -->';  
		echo '</div><!-- END PANEL DEFAULT -->';
	} 
}
?>