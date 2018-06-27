<script language="php">				
		include $_SERVER['DOCUMENT_ROOT'] . '/db_final_example/events/list.php';
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
					<ul class="nav navbar-nav navbar-link">
						<li><a href="register.php">註冊 <span class="sr-only">(current)</span></a></li>
					</ul>
					<ul class="nav navbar-nav navbar-link">
						<li><a href="login.php">登入 <span class="sr-only">(current)</span></a></li>
					</ul>
				</div>
			</div>
		</nav>
		<script>
							function confirmation(id){
							var del=confirm("Are you sure you want to delete this Event?\n");
							if (del==true){
								
								window.location="events/delete.php?id="+id;
							}
							
							return del;
}
						</script>
		<div class="container event-wrapper event-list">
			<button class="btn btn-default btn-event"><a href="events_add.php">新增公告</a></button>
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
					<td><a href="signup.php"><button class="btn btn-default btn-event">報名</button></a></td>
					<td>
					<a href="events/edit_show.php?ID=<?php echo $events_list[$i]['ID']?>"><button class="btn btn-default btn-event">修改</button></a>
					<a href="signup.php"><button class="btn btn-default btn-event">報名狀況</button></a>
					
					<button class="btn btn-default btn-event" onclick='confirmation(<?php echo '"'. $events_list[$i]['ID'].'"'?>)'>刪除</button>
					</a>
					</td>
				</tr>
				<script language="php">				
				}
				</script>	
			</table>
		</div>
	</body>
</html>