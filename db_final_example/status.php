<?php session_start(); ?>
<script language="php">				
		include $_SERVER['DOCUMENT_ROOT'] . '/db_final_example/events/events_list.php';
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
						<li><a href="events.php">活動列表 <span class="sr-only">(current)</span></a></li>
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
								<li class="active"><a href="status.php">報名狀況 <span class="sr-only">(current)</span></a></li>
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
			<h3 class="title">報名狀況</h3>
			<br>
			<script language="php">				
				$eventcount=count($events_list);
				for($i=0;$i<$eventcount;$i++){
			</script>
				<div class="event-wrapper">
					<label><?php echo $events_list[$i]['name']?></label>
				</div>
				<script language="php">				
					if($events_list[$i]['signup_num']<1){
				</script>
					<div class="row">尚無人報名</div>
				<script language="php">				
					}
					else{
				</script>
					<table class="table text-center">
					<tr>
						<th class="text-center">隊伍名稱</th>
						<th class="text-center">隊伍成員</th>
					</tr>
					<script language="php">
						$teams_list=team_lists($events_list[$i]['ID']);
						$teamcount=count($teams_list);
						for($j=0;$j<$teamcount;$j++){
							$members_list=member_lists($teams_list[$j]['Team_ID']);
							$membercount=count($members_list);
					</script>
						<tr>
		　					<td><?php echo $teams_list[$j]['Team_name']?></td>
		　					<td>
								<?php echo $members_list[0]['student_ID']." ".$members_list[0]['student_name']?>
								<script language="php">
									for($k=1;$k<$membercount;$k++){
								</script>
										<br>
										<?php echo $members_list[$k]['student_ID']." ".$members_list[$k]['student_name']?>
								<script language="php">
									}
								</script>
							</td>
		　				</tr>
					<script language="php">				
						}
					</script>
					</table>
				<script language="php">				
					}
				</script>
			<script language="php">
				}
			</script>
		</div>
	</body>
</html>