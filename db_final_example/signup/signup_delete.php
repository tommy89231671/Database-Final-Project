<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/db_final_example/database/events.php';

	// Get values from login form
	#echo $_Post;
	$team_id = $_GET['team_id'];
	$event_id = $_GET['event_id'];
	
	// call the class
	#echo $name;
	$events = new events();
	$events->signup_delete($team_id,$event_id);
	
	#echo $name;
	

	// redirect to the login.php
	header('Location: ' . "/db_final_example/events.php");
?>