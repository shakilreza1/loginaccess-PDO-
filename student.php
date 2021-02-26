<?php
session_start();
include_once('connect_db.php');
if(isset($_SESSION['username'])){
$id=$_SESSION['student_id'];
$fname=$_SESSION['first_name'];
$lname=$_SESSION['last_name'];
$user=$_SESSION['username'];
}else{
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
			<a class="navbar-brand" href="#">Student Dashboard</a>
		</div>
		<ul class="nav navbar-nav">
			<li class="active"><a href="student.php">Home</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>
	</div>
</nav>
<div id="content">
</div>
</body>
</html>