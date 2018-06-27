<?php
	include $_SERVER['DOCUMENT_ROOT'] . '/db_final_example/database/register.php';
	
	// Generate captcha
	$captcha_gen = $_GET['Captcha'];
	

	// Get values from register form
	$account = $_POST['account'];
	$name = $_POST['name'];
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
		$email = test_input($_POST["email"]);
		if (!filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			echo "<script>alert('Email格式錯誤!');
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
		}
		// redirect to the home.php
		//header('Location: ' . '/db_final_example/home.php');
	}
?>