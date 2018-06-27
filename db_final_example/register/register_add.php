<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/db_final_example/database/register.php';

	// Get values from register form
	#echo $_Post;
	$account = $_POST['account'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$confirm = $_POST['confirm_passwprd'];
	$captcha = $_POST['captcha'];
	
	if($password!=$confirm)
	{
		echo "<script>alert('密碼與確認不符!');
		location.href = '/db_final_example/register.php';</script>";
	}
	else
	{
		// call the class
		$register = new register();
		$result = $register->register_add($account, $email, $password);
		
		if(result)
		{
			echo "<script>alert('註冊成功!');
			location.href = '/db_final_example/home.php';</script>";
		}
		else{
			echo "<script>alert('註冊失敗!');
			location.href = '/db_final_example/home.php';</script>";
		}

		// redirect to the home.php
		//header('Location: ' . '/db_final_example/home.php');
	}
?>