<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/db_final_example/database/anncs.php';

	// Get values from login form
	#echo $_Post;
	$title = $_POST['Title'];
	$description = $_POST['Description'];
	
	// call the class
	#echo $title;
	$anncs = new anncs();
	$result = $anncs->anncs_add($title, $description);
	echo $result;

	// redirect to the login.php
	header('Location: ' . '/db_final_example/home.php');
?>