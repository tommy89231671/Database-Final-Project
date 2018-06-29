<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/db_final_example/database/events.php';

	// Get values from login form
	#echo $_Post;
	$team_name = $_POST['name'];
	$student_id = $_POST['student_id'];
	$event_id = $_POST['event_id'];
	

	// call the class
	#echo $name;
	$events = new events();
	$Team_ID = $events->signup_add($event_id,$team_name, $student_id);
	$result = $events->show($event_id);
	#echo $name;
	

	// redirect to the login.php
	header('Location: ' . "/db_final_example/events_signup.php?init=0&id=".$result[0]['ID']."&name=".$result[0]['name']."&date=".$result[0]['date']."&limit=".$result[0]['team_limit']."&max=".$result[0]['max_team_number']."&min=".$result[0]['min_team_number']."&curr=".$result[0]['signup_num']."&description=".$result[0]['description']."&Team_ID=".$Team_ID."&Team_name=".$team_name);
?>