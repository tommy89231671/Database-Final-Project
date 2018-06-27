<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/db_final_example/database/register.php';

	// Get values from register form
	#echo $_Post;
	$account = $_POST['account'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	// call the class
	$register = new register();
	$result = $register->register_add($account, $email, $password);
	echo $result;

	// redirect to the home.php
	header('Location: ' . '/db_final_example/home.php');
?>