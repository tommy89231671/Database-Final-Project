<script language="php">				
		include $_SERVER['DOCUMENT_ROOT'] . '/db_final_example/database/auth.php';
</script>
<!DOCTYPE html>
<html>
	<script language="JavaScript">
		setInterval(function() {
			var myImageElement = document.getElementById('captcha_img');
			myImageElement.src = 'register/captcha.png?rand=' + Math.random();
		}, 10);
	</script>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Events</title>
		<meta name="description" content="">
		<meta name="keywords" content="">
		<link href="" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/home.css">
		<link rel="stylesheet" href="css/register.css">
		<script src="register/register_captcha_generate.php"></script>
	</head>
	<body>
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">N C T U &nbsp;&nbsp; S p o r t s</a>
				</div>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-link">
						<li><a href="home.php">首頁 <span class="sr-only">(current)</span></a></li>
					</ul>
					<ul class="nav navbar-nav navbar-link">
						<li><a href="events.php">活動列表 <span class="sr-only">(current)</span></a></li>
					</ul>
					<?php if($_SESSION['username']==null):?>
						<ul class="nav navbar-nav navbar-link">
							<li class="active"><a href="login.php">註冊 <span class="sr-only">(current)</span></a></li>
						</ul>
						<ul class="nav navbar-nav navbar-link">
							<li><a href="login.php">登入 <span class="sr-only">(current)</span></a></li>
						</ul>
					<?php endif?> 
					<?php if($_SESSION['username']!=null):?>
						<?php if($_SESSION['Admin']==1):?>
							<ul class="nav navbar-nav navbar-link">
								<li><a href="events.php">報名狀況 <span class="sr-only">(current)</span></a></li>
							</ul>		
							<ul class="nav navbar-nav navbar-link">
								<li><a href="./auth/logout.php" onclick="return confirm('是否確定要登出？');">Admin登出 <span class="sr-only">(current)</span></a></li>
							</ul>
						<?php endif?>
						<?php if($_SESSION['Admin']==0):?>
							<ul class="nav navbar-nav navbar-link">
								<li><a href="./auth/logout.php" onclick="return confirm('是否確定要登出？');">登出 <span class="sr-only">(current)</span></a></li>
							</ul>
						<?php endif?> 			
					<?php endif?> 
				</div>
			</div>
		</nav>
		<div class="container register-wrapper">
			<h3 class="title">註冊</h3>
			<form action="register/register_add.php" method="POST">
			<div class="row">
				<div class="col-md-5 col-md-offset-1">
						<label>學號</label>
						
						<input type="text" name="account" class="form-control">
				</div>
				<div class="col-md-12">
						<br>
				</div>
				<div class="col-md-5 col-md-offset-1">
						<label>姓名</label>
						<input type="text" name="name" class="form-control">
				</div>
				<div class="col-md-12">
						<br>
				</div>
				<div class="col-md-5 col-md-offset-1">
						<label>信箱</label>
						<input type="text" name="email" class="form-control">
				</div>
				<div class="col-md-12">
						<br>
				</div>
				<div class="col-md-5 col-md-offset-1">
						<label>密碼</label>
						<input type="password" name="password" class="form-control">
				</div>
				<div class="col-md-12">
						<br>
				</div>
				<div class="col-md-5 col-md-offset-1">
						<label>確認密碼</label>
						<input type="password" name="confirm_passwprd" class="form-control">
				</div>
				<div class="col-md-12">
						<br>
				</div>
				<div class="col-md-5 col-md-offset-1">
						<label>驗證碼</label><br>
						<img src="register/captcha.png" id = "captcha_img" />
						<input type="text" name="captcha_in" class="form-control">
				</div>
				<div class="col-md-12">
						<br>
				</div>
				<div class="col-md-6">
				<button class="btn btn-default btn-register" type="submit">註冊</button>
				<button class="btn btn-default btn-register" ><a href="home.php">取消</a></button>
				</div>
				
			</div>
			</form>
		</div>
	</body>
</html>