<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/db_final_example/database/anncs.php';

	// Get values from login form
	#echo $_Post;
	$post_time = $_GET['post_time'];
	#$description = $_POST['Description'];
	#echo $post_time;
	// call the class
	#echo $title;
	$anncs = new anncs();
	$result = $anncs->anncs_delete($post_time);
	#echo $result;

	// redirect to the login.php
	header('Location: ' . '/db_final_example/home.php');
?>