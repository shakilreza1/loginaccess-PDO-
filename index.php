<?php
include_once 'connect_db.php';
if(isset($_POST['submit']))
{
	$username=$_POST['username'];
	$password=$_POST['password'];
	$position=$_POST['position'];

switch($position)
{
case 'Admin':
	$result=mysql_query("SELECT admin_id, username FROM admin WHERE username='$username' AND password='$password'");

	$row=mysql_fetch_array($result);

if($row>0)
{
session_start();
	$_SESSION['admin_id']=$row[0];
	$_SESSION['username']=$row[1];

header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/admin.php");
}
else
{
	$message="<font color=red>Invalid login Try Again</font>";
}
break;

case 'Teacher':

	$result=mysql_query("SELECT teacher_id, first_name,last_name,username FROM teacher WHERE username='$username' AND password='$password'");
	$row=mysql_fetch_array($result);

if($row>0)
{
session_start();
	$_SESSION['teacher_id']=$row[0];
	$_SESSION['first_name']=$row[1];
	$_SESSION['last_name']=$row[2];
	$_SESSION['username']=$row[3];

header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/teacher.php");
}
else
{
	$message="<font color=red>Invalid login Try Again</font>";
}
break;

case 'Faculty':

	$result=mysql_query("SELECT faculty_id, first_name,last_name,username FROM faculty WHERE username='$username' AND password='$password'");

	$row=mysql_fetch_array($result);
if($row>0)
{
session_start();
	$_SESSION['faculty_id']=$row[0];
	$_SESSION['first_name']=$row[1];
	$_SESSION['last_name']=$row[2];
	$_SESSION['username']=$row[3];

header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/faculty.php");
}
else
{
	$message="<font color=red>Invalid login Try Again</font>";
}
break;
case 'Student':
	$result=mysql_query("SELECT student_id, first_name,last_name,username FROM student WHERE username='$username' AND password='$password'");
	$row=mysql_fetch_array($result);
if($row>0)
{
session_start();
	$_SESSION['student_id']=$row[0];
	$_SESSION['first_name']=$row[1];
	$_SESSION['last_name']=$row[2];
	$_SESSION['username']=$row[3];

header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/student.php");
}
else
{
	$message="<font color=red>Invalid login Try Again</font>";
}
break;
}}
?>
<!DOCTYPE html>
<html>
<head>
<title>User Login Type</title>
<link rel="stylesheet" type="text/css" href="style/bootstrap.min.css">
<style>
#content {
height: auto;
}
#main{
height: auto;}
</style>
</head>
<body>
<h1 align="center">User Login Type</h1>
<div class="container">
  <h2 align="center">Login Here</h2><hr>
  <?php $message; ?>
  <form method="post" action="index.php">
    <div class="form-group">
      <label for="username">Username:</label>
      <input type="text" name="username" class="form-control" id="username" placeholder="Enter Username">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" name="password" class="form-control" id="pwd" placeholder="Enter Password">
    </div>
	<div>
	<select name="position">
			<option>--Select position--</option>
			<option>Admin</option>
			<option>Teacher</option>
			<option>Student</option>
			<option>Faculty</option>
	</select>
	</div><br>
    <button type="submit" name="submit" class="btn btn-default">Submit</button>
  </form><br>
</div>
</body>
</html>