<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/db_final_example/database/register.php';

	// Get values from login form
	#echo $_Post;
	$account = $_POST['Title'];
	$email = $_POST['Description'];
	$password = $_POST['Password'];
	
	// call the class
	#echo $title;
	$anncs = new register();
	$result = $register->register_add($account, $email, $password);
	echo $result;

	// redirect to the home.php
	header('Location: ' . '/db_final_example/home.php');
?>