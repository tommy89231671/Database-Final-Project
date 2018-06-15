<?php
	#include $_SERVER['DOCUMENT_ROOT'] . '/db_final_example/database/anncs.php';

	// Get values from login form
	#echo $_Post;
	

	// call the class
	
	#$anncs = new anncs();
	#$anncs_show = $anncs->anncs_show();
	
	$post_time=$_GET['Post_Time'];
	$title=$_GET['Title'];
	$description=$_GET['Description'];
	#echo $title;
	#echo $anncs[0]['Title'];
	#echo '<pre>';
	#var_dump($anncs);
	#echo '</pre>';

	// redirect to the login.php
	header('Location: ' . '/db_final_example/anncs.php'.'?Post_Time='.$post_time.'&Title='.$title.'&Description='.$description);
	
?>