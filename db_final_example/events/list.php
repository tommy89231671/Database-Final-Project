<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/db_final_example/database/events.php';

	// Get values from login form
	#echo $_Post;
	

	// call the class
	
	$events = new events();
	$events_list = $events->list_show();
	#echo $anncs[0]['Title'];
	#echo '<pre>';
	#var_dump($events_list);
	#echo '</pre>';

	// redirect to the login.php
	#header('Location: ' . '/db_final_example/home.php');
?>