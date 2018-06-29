<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/db_final_example/database/team.php';

	// Get values from login form
	#echo $_Post;
	

	// call the class
	function list_members($team_id) {
		$team = new team();
		return $team->list_member($team_id);
	}
	#echo $anncs[0]['Title'];
	#echo '<pre>';
	#var_dump($events_list);
	#echo '</pre>';

	// redirect to the login.php
	#header('Location: ' . '/db_final_example/home.php');
?>