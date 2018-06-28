<?php session_start(); ?>
<script language="php">				
		include $_SERVER['DOCUMENT_ROOT'] . '/db_final_example/anncs/anncs_list.php';
</script>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Home</title>
		<meta name="description" content="">
		<meta name="keywords" content="">
		<link href="" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/home.css">
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
					</button>
					<a class="navbar-brand" href="#">N C T U &nbsp;&nbsp; S p o r t s</a>
				</div>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-link">
						<li class="active"><a href="home.php">首頁 <span class="sr-only">(current)</span></a></li>
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
		
		<div class="container announce-wrapper">
		<?php if($_SESSION['Admin']!=null && $_SESSION['Admin']==1):?>
			<button class="btn btn-default btn-event"><a href="anncs_add.php">新增公告</a></button>
		<?php endif?> 
			<h3 class="title">最新公告</h3>
			<div class="row">
			
			<!--<form action="anncs/anncs_show.php" method="POST">-->
				<table class="table">
<script language="php">				
				$rowcount=count($anncs_list);
				#echo $rowcount;
				for($i=0;$i<$rowcount;$i++){
</script>
					<tr>
						<script>
							function confirmation(post_time){
							var del=confirm("Are you sure you want to delete this annoucement?\n"+post_time);
							if (del==true){
								
								window.location="anncs/anncs_delete.php?post_time="+post_time;
							}
							
							return del;
}
						</script>
						
						<td class="td-date"><script language="php">echo $anncs_list[$i]['Post_Time']</script></td>
						
						<td><a href="anncs/anncs_show.php?Post_Time=<?php echo $anncs_list[$i]['Post_Time'].'&Title='.$anncs_list[$i]['Title'].'&Description='.$anncs_list[$i]['Description']?>"><script language="php">echo $anncs_list[$i]['Title']</script></a></td>
						
						<!--<td><a href="anncs/anncs_show.php?Post_Time=<?#php echo $anncs_list[$i]['Post_Time'].'&Title='.$anncs_list[$i]['Title'].'&Description='.$anncs_list[$i]['Description']?>"><script language="php">echo $anncs_list[$i]['Title']</script></a></td>-->
						<!--<form action="anncs/anncs_show.php" method="POST">
						</form>-->
						
						<?php if($_SESSION['Admin']!=null && $_SESSION['Admin']==1):?>
							<td><button class="btn btn-default btn-event" onclick='confirmation(<?php echo '"'. $anncs_list[$i]['Post_Time'].'"'?>)'>刪除</button></td>
						<?php endif?> 
					
					</tr>
				
				
					
<script language="php">				
				}
</script>				

				</table>
			<!--</form>-->
			
			</div>
		</div>
	</body>
</html>