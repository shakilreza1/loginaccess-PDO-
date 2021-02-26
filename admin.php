<?php
session_start();
include_once('connect_db.php');

if(isset($_SESSION['username'])){
	$id=$_SESSION['admin_id'];
	$user=$_SESSION['username'];
}
else
{
	header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.php");
exit();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>User Login Type</title>
	<link rel="stylesheet" type="text/css" href="style/mystyle.css">
	<link rel="stylesheet" type="text/css" href="style/bootstrap.min.css">
	<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" />
	<script src="js/function.js" type="text/javascript"></script>
<style>
#left_column{
	height: 470px;
}
</style>
</head>
<body>
<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="#">Admin Dashboard</a>
		</div>
			<ul class="nav navbar-nav">
				<li class="active"><a href="admin.php">Home</a></li>
				<li><a href="admin_teacher.php">Teacher</a></li>
				<li><a href="admin_student.php">Student</a></li>
				<li><a href="admin_faculty.php">Faculty</a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
	</div>
</nav>
<div id="content">
	<div id="main">
		<div style="margin-left: 180px;">
			<a href="admin.php" class="dashboard-module">
				<img src="images/dashboard.png" width="75" height="75" alt="edit" />
			<span>Dashboard</span>
			</a>
			<a href="admin_teacher.php" class="dashboard-module">
				<img src="images/teacher.png"  width="75" height="75" alt="edit" />
			<span>Teacher</span>
			</a>
			<a href="admin_student.php" class="dashboard-module">
				<img src="images/student.png"  width="75" height="75" alt="edit" />
			<span>Student</span>
			</a>
			<a href="admin_faculty.php" class="dashboard-module">
				<img src="images/faculty.png" width="75" height="75" alt="edit" />
			<span>Faculty</span>
			</a>				  
		</div>
	</div>
</div>
</body>
</html>