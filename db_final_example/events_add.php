<script language="php">				
		include $_SERVER['DOCUMENT_ROOT'] . '/db_final_example/database/auth.php';
</script>
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
		<link rel="stylesheet" href="css/announce.css">
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
					<?php if($_SESSION['username']==null):?>
						<ul class="nav navbar-nav navbar-link">
							<li><a href="register.php">註冊 <span class="sr-only">(current)</span></a></li>
						</ul>
						<ul class="nav navbar-nav navbar-link">
							<li><a href="login.php">登入 <span class="sr-only">(current)</span></a></li>
						</ul>
					<?php endif?> 
					<?php if($_SESSION['username']!=null):?>
						<?php if($_SESSION['Admin']==1):?>
							<ul class="nav navbar-nav navbar-link">
								<li><a href="status.php">報名狀況 <span class="sr-only">(current)</span></a></li>
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
		<div class="container event-wrapper event-list">
			<h3 class="title">新增活動</h3>
			<form action="events/events_add.php" method="POST">
			<div class="row">
				<div class="col-md-5 col-md-offset-1">
						<label>活動名稱</label>
						<input type="text" name="event_name" class="input-text-control">
				</div>
				<div class="col-md-12">
						<br>
				</div>
				<div class="col-md-5 col-md-offset-1">
						<label>活動日期</label>
						<input type="text" name="date" class="input-text-control">
				</div>
				<div class="col-md-12">
						<br>
				</div>
				<div class="col-md-5 col-md-offset-1">
						<label>描述</label>
						<input type="text" name="description" class="input-text-control">
				</div>
				<div class="col-md-12">
						<br>
				</div>
				<div class="col-md-5 col-md-offset-1">
						<label>隊伍限制</label>
						<input type="text" name="team_limit" class="input-text-control">
				</div>
				<div class="col-md-12">
						<br>
				</div>
				<div class="col-md-5 col-md-offset-1">
						<label>每隊人數上限</label>
						<input type="text" name="max_team_number" class="input-text-control">
				</div>
				<div class="col-md-12">
						<br>
				</div>
				<div class="col-md-5 col-md-offset-1">
						<label>每隊人數下限</label>
						<input type="text" name="min_team_number" class="input-text-control">
				</div>
				<div class="col-md-12">
						<br>
				</div>
				<div class="col-md-6">
				<button class="btn btn-default btn-edit" type="submit">發布</button>
				<button class="btn btn-default btn-edit" ><a href="events.php">取消</a></button>
				</div>
				
			</div>
			</form>
		</div>
	</body>
</html>