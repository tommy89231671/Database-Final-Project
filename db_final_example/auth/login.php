<?php session_start(); ?>
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
	//用sql內建的password函式加密
	//$password = password($password);

	$auth = new Auth();
	$login = $auth->login($account, $password);
	if($login)
	{
		$_SESSION['username'] = $account;
		echo "登入成功!"
	}	
	else
		echo "登入失敗!"

	// redirect to the login.php
	header('Location: ' . '/db_final_example/home.php');
?>