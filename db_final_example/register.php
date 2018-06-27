<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Events</title>
		<meta name="description" content="">
		<meta name="keywords" content="">
		<link href="" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/home.css">
		<link rel="stylesheet" href="css/event.css">
		<link rel="stylesheet" href="css/register.css">
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
						<li class="active"><a href="events.php">活動列表 <span class="sr-only">(current)</span></a></li>
					</ul>
					<ul class="nav navbar-nav navbar-link">
						<li><a href="register.php">註冊 <span class="sr-only">(current)</span></a></li>
					</ul>
					<ul class="nav navbar-nav navbar-link">
						<li><a href="login.php">登入 <span class="sr-only">(current)</span></a></li>
					</ul>
				</div>
			</div>
		</nav>
		<div class="container event-wrapper event-list">
			<h3 class="title">註冊</h3>
			<form action="register/register.php" method="POST">
			<div class="row">
				<div class="col-md-5 col-md-offset-1">
						<label>學號</label>
						
						<input type="text" name="account" class="input-text-control">
				</div>
				<div class="col-md-12">
						<br>
				</div>
				<div class="col-md-5 col-md-offset-1">
						<label>信箱</label>
						<input type="text" name="email" class="input-text-control">
				</div>
				<div class="col-md-12">
						<br>
				</div>
				<div class="col-md-5 col-md-offset-1">
						<label>密碼</label>
						<input type="password" name="password" class="input-text-control">
				</div>
				<div class="col-md-12">
						<br>
				</div>
				<div class="col-md-5 col-md-offset-1">
						<label>確認密碼</label>
						<input type="password" name="confirm_passwprd" class="input-text-control">
				</div>
				<div class="col-md-12">
						<br>
				</div>
				<div class="col-md-5 col-md-offset-1">
						<label>驗證碼</label>
						<input type="text" name="varification" class="input-text-control">
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