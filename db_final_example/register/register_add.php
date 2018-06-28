<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/db_final_example/database/register.php';

	// Get values from register form
	$account = $_POST['account'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$confirm = $_POST['confirm_passwprd'];
	$captcha_in = $_POST['captcha_in'];
	
	if($password!=$confirm)
	{
		echo "<script>alert('密碼與確認不符!');
		location.href = '/db_final_example/register.php';</script>";
	}
	elseif($captcha_in!=$_SESSION['captcha'])
	{
		echo "<script>alert('驗證碼錯誤!');
		location.href = '/db_final_example/register.php';</script>";
	}
	elseif(!filter_var($email, FILTER_VALIDATE_EMAIL))
	{
		echo "<script>alert('Email格式錯誤!');
		location.href = '/db_final_example/register.php';</script>";
	}

	$register = new register();
	$exist = $register->check_account_exist($account);
	if($exist)
	{
		echo "<script>alert('帳號已存在!');
		location.href = '/db_final_example/register.php';</script>";
	}
	else
	{
		$register = new register();
		$result = $register->register_add($account, $name, $email, $password);
		if(result)
		{
			echo "<script>alert('註冊成功!');
			location.href = '/db_final_example/login.php';</script>";
		}
		else{
			echo "<script>alert('註冊失敗!');
			location.href = '/db_final_example/register.php';</script>";
		}
	}
?>