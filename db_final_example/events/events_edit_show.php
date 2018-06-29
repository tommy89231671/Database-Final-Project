<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/db_final_example/database/events.php';

	// Get values from login form
	#echo $_Post;
	$id = $_GET['ID'];
	// call the class
	#echo $id;
	$events = new events();
	$result = $events->show($id);
	#var_dump($result);
	// redirect to the login.php
	header('Location: ' . "/db_final_example/events_edit.php?id=".$result[0]['ID']."&name=".$result[0]['name']."&date=".$result[0]['date']."&limit=".$result[0]['team_limit']."&max=".$result[0]['max_team_number']."&min=".$result[0]['min_team_number']."&curr=".$result[0]['signup_num']."&description=".$result[0]['description']);
	
	
	
	?>