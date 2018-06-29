<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/db_final_example/database/events.php';

	// Get values from login form
	#echo $_Post;
	$id = $_GET['id'];
	#$description = $_POST['Description'];
	#echo $post_time;
	// call the class
	#echo $id;
	$events = new events();
	$result = $events->events_delete($id);
	#echo $result;

	// redirect to the login.php
	header('Location: ' . '/db_final_example/events.php');
?>