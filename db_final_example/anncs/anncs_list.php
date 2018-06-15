<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/db_final_example/database/anncs.php';

	// Get values from login form
	#echo $_Post;
	

	// call the class
	
	$anncs = new anncs();
	$anncs_list = $anncs->list_show();
	#echo $anncs[0]['Title'];
	#echo '<pre>';
	#var_dump($anncs);
	#echo '</pre>';

	// redirect to the login.php
	#header('Location: ' . '/db_final_example/home.php');
?>