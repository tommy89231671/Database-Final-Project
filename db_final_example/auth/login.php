<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/db_final_example/database/auth.php';

	// Get values from login form
	#echo $_Post;
	$account = $_POST['account'];
	$password = $_POST['password'];

	if ($account == '' || $password == '')
	{
	// No login information
		echo "未輸入完全!";
    	header('Location: ' . '/db_final_example/login.php');
	}
	// call the class
	
	$auth = new Auth();
	$login = $auth->login($account, $password);
	

	// redirect to the login.php
	header('Location: ' . '/db_final_example/home.php');
?>