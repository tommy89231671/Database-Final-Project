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
			function confirmation(id){
				var del=confirm("Are you sure you want to delete this Event?\n");
				if (del==true){
					window.location="events/events_delete.php?id="+id;
				}
				return del;
			}
		</script>
		<script>
			function check_limit(id, limit, curr, login){
				if (limit<=curr){
					alert("報名已額滿\n");
				}
				else if(login==null){
					alert("請先登入以報名\n");
				}
				else{
					window.location="events/events_sign_up.php?ID="+id;
				}
			}
		</script>
		<div class="container event-wrapper event-list">
			<?php if($_SESSION['Admin']!=null && $_SESSION['Admin']==1):?>
				<button class="btn btn-default btn-edit"><a href="events_add.php">新增活動</a></button>
			<?php endif?> 
			<h3 class="title">活動列表</h3>
			<br>
			<table class="table text-center">
				<tr>
					<th class="text-center">項目</th>
					<th class="text-center">規則</th>
					<th class="text-center">報名</th>
					<th class="text-center">操作</th>
				</tr>
				<script language="php">				
				$rowcount=count($events_list);
				#echo $rowcount;
				for($i=0;$i<$rowcount;$i++){
				</script>
				<tr>
					<td><?php echo $events_list[$i]['name']?></td>
					<td><?php echo $events_list[$i]['description']?></td>
					<td><button class="btn btn-default btn-event" onclick='check_limit(<?php echo $events_list[$i]['ID']?>,<?php echo $events_list[$i]['team_limit']?>,<?php echo $events_list[$i]['signup_num']?>,<?php echo $_SESSION['username']?>)'>報名</button></td>
					<td>
					<?php if($_SESSION['Admin']!=null && $_SESSION['Admin']==1):?>
					<a href="events/events_edit_show.php?ID=<?php echo $events_list[$i]['ID']?>"><button class="btn btn-default btn-edit">修改</button></a>
					<button class="btn btn-default btn-remove" onclick='confirmation(<?php echo '"'. $events_list[$i]['ID'].'"'?>)'>刪除</button>
					</a>
					<?php endif?> 
					</td>
				</tr>
				<script language="php">				
				}
				</script>	
			</table>
		</div>
	</body>
</html>