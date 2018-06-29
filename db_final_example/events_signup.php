<?php session_start(); ?>
<script language="php">				
		include $_SERVER['DOCUMENT_ROOT'] . '/db_final_example/team/team_member_list.php';
</script>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Sign up</title>
		<meta name="description" content="">
		<meta name="keywords" content="">
		<link href="" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/home.css">
		<link rel="stylesheet" href="css/event.css">
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
		<script>
			function check_member(max, min, count){
				if (count>max){
					alert("人數超過限制\n");
				}
				else if(count<min){
					alert("人數低於限制\n");
				}
				else{
					window.location="events.php";
				}
			}
		</script>
		<div class="container event-wrapper">
		<script language="php">				
			if($_GET['init']==1){
		</script>
				<div class="signup-form">
					<h3 class="text-center">活動報名：<?php echo $_GET['name']?></h3>
					<div class="description">
						<p>每隊人數上限：<?php echo $_GET['max']?></p>
						<p>每隊人數下限：<?php echo $_GET['min']?></p>
						<p>隊伍上限：<?php echo $_GET['limit']?></p>
						<p>已報名隊伍：<?php echo $_GET['curr']?>隊</p>
						<p class="warning">尚可報名：<?php echo $_GET['limit']-$_GET['curr']?>隊</p>
					</div>
					<br>
					<form action="signup/signup_add.php" method="POST">
						<input type="hidden" name="event_id" value=<?php echo $_GET['id']?>>
						<label class="text-center" for="team_name">隊伍名稱</label>
						<input type="text" id="name" name="name" class="form-control">
						<br>
						<label class="text-center" for="team_name">隊伍人員</label>
						<table class="table">
							<tr>
								<th class="student-id">隊員學號</th>
								<th>姓名</th>
								<th></th>
							</tr>
							<tr>
								<td class="student-id"><input type="text" name="student_id" class="form-control"></td>
								<td></td>
								<td class="text-right"><button class="btn btn-new" style="margin-right:30px" type="submit">新增隊員</button></td>
							</tr>
						</table>
					</form>
					<div class="text-left form-bottom">
						<button class="btn btn-default">提交報名表</button>
						<button class="btn btn-default"><a href="events.php"?>取消</button>
					</div>
				</div>
		<script language="php">				
			}
			else{
		</script>
				<div class="signup-form">
					<h3 class="text-center">活動報名：<?php echo $_GET['name']?></h3>
					<div class="description">
						<p>每隊人數上限：<?php echo $_GET['max']?></p>
						<p>每隊人數下限：<?php echo $_GET['min']?></p>
						<p>隊伍上限：<?php echo $_GET['limit']?></p>
						<p>已報名隊伍：<?php echo $_GET['curr']-1?>隊</p>
						<p class="warning">尚可報名：<?php echo $_GET['limit']-$_GET['curr']+1?>隊</p>
					</div>
					<br>
					<form action="team/team_add_member.php" method="POST">
						<input type="hidden" name="event_id" value=<?php echo $_GET['id']?>>
						<input type="hidden" name="team_id" value=<?php echo $_GET['Team_ID']?>>
						<label class="text-center" for="team_name">隊伍名稱</label>
						<input type="text" id="name" name="name" class="form-control" value=<?php echo $_GET['Team_name']?>>
						<br>
						<label class="text-center" for="team_name">隊伍人員</label>
						<table class="table">
							<tr>
								<th class="student-id">隊員學號</th>
								<th>姓名</th>
								<th></th>
							</tr>
							<?php
								$member_list=list_members($_GET['Team_ID']);
								$rowcount=count($member_list);
								#echo $rowcount;
								for($i=0;$i<$rowcount;$i++){
							?>
								<tr>
									<td class="student-id"><?php echo $member_list[$i]['student_ID']?></td>
									<td><?php echo $member_list[$i]['student_name']?></td>
									<td class="text-right"><button class="btn btn-remove"><a href="team/team_delete_member.php?id=<?php echo $_GET['Team_ID'].'&student_id='.$member_list[$i]['student_ID'].'&event_id='.$_GET['id'].'&team_name='.$_GET['Team_name']?>">取消</button></td>
								</tr>
							<?php			
								}
							?>
							<tr>
								<td class="student-id"><input type="text" name="student_id" class="form-control"></td>
								<td></td>
								<td class="text-right"><button class="btn btn-new" style="margin-right:30px" type="submit">新增隊員</button></td>
							</tr>
						</table>
					</form>
					<div class="text-left form-bottom">
						<button class="btn btn-default" onclick='check_member(<?php echo $_GET['max']?>,<?php echo $_GET['min']?>,<?php echo $rowcount?>)'>提交報名表</button>
						<button class="btn btn-default"><a href="signup/signup_delete.php?type=0&team_id=<?php echo $_GET['Team_ID'].'&event_id='.$_GET['id']?>">取消</button>
					</div>
				</div>
		<script language="php">				
			}
		</script>
		</div>
	</body>
</html>