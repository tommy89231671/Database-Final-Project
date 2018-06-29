<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/db_final_example/database/events.php';

	// Get values from login form
	#echo $_Post;
	$team_id = $_GET['team_id'];
	$event_id = $_GET['event_id'];
	$type = $_GET['type'];
	
	// call the class
	#echo $name;
	$events = new events();
	$events->signup_delete($team_id,$event_id);
	
	#echo $name;
	

	// redirect to the login.php
	if($type==0){
		header('Location: ' . "/db_final_example/events.php");
	}
	else{
		header('Location: ' . "/db_final_example/status.php");
	}
	
?>