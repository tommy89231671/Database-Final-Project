<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/db_final_example/database/events.php';

	// Get values from login form
	#echo $_Post;
	#echo $_POST['id'];
	$id=$_POST['id'];
	$name = $_POST['event_name']; 
	$date = $_POST['date'];
	$team_limit = $_POST['team_limit'];
	$max_team_number = $_POST['max_team_number'];
	$min_team_number = $_POST['min_team_number'];
	$description=$_POST['description'];
	#$description = $_POST['Description'];
	#echo $post_time;
	// call the class
	#echo $id;
	$events = new events();
	$result = $events->events_edit($id,$name,$date,$team_limit,$max_team_number,$min_team_number,$description);
	#echo $result;

	// redirect to the login.php
	header('Location: ' . '/db_final_example/events.php');
?>