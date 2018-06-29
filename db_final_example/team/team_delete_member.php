<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/db_final_example/database/events.php';

	// Get values from login form
	#echo $_Post;
	$team_id = $_GET['id'];
	$student_id = $_GET['student_id'];
	$event_id = $_GET['event_id'];
	$team_name = $_GET['team_name'];
	#$description = $_POST['Description'];
	#echo $post_time;
	// call the class
	#echo $id;
	
	$event = new events();
	$event->team_delete($team_id,$student_id);
	$result = $event->show($event_id);
	#echo $result;

	// redirect to the login.php
	header('Location: ' . "/db_final_example/events_signup.php?init=0&id=".$result[0]['ID']."&name=".$result[0]['name']."&date=".$result[0]['date']."&limit=".$result[0]['team_limit']."&max=".$result[0]['max_team_number']."&min=".$result[0]['min_team_number']."&curr=".$result[0]['signup_num']."&description=".$result[0]['description']."&Team_ID=".$team_id."&Team_name=".$team_name);
?>