<?php
error_reporting(0);
session_start();
include_once('connect_db.php');
if(isset($_SESSION['username'])){
$id=$_SESSION['admin_id'];
$username=$_SESSION['username'];
}else{
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.php");
exit();
}
if(isset($_POST['submit'])){
$fname=$_POST['first_name'];
$lname=$_POST['last_name'];
$postal=$_POST['postal_address'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$user=$_POST['username'];
$pas=$_POST['password'];
$sql1=mysql_query("SELECT * FROM teacher WHERE username='$user'")or die(mysql_error());
 $result=mysql_fetch_array($sql1);
if($result>0){
$message="<font color=blue>sorry the username entered already exists</font>";
 }else{
$sql=mysql_query("INSERT INTO teacher(first_name,last_name,postal_address,phone,email,username,password,date)
VALUES('$fname','$lname','$postal','$phone','$email','$user','$pas',NOW())");
if($sql>0) {header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/admin_teacher.php");
}else{
$messages="<font color=red>Registration Failed, Try again</font>";
}
	}}
?>
<!DOCTYPE html>
<html>
<head>
<title>User Login Type</title>
<link rel="stylesheet" type="text/css" href="style/mystyle.css">
<link rel="stylesheet" type="text/css" href="style/bootstrap.min.css">
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" />
<script src="js/function.js" type="text/javascript"></script>
<script>
function validateForm()
{
var str=document.form1.first_name.value;
	var valid="abcdefghijklmnopqrstuvwxyz ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	for(i=0;i<str.length;i++)
	{
	if(valid.indexOf(str.charAt(i))==-1)
	{
	alert("First Name Cannot Contain Numerical Values");
	document.form1.first_name.value="";
	document.form1.first_name.focus();
	return false;
	}}
	
if(document.form1.first_name.value=="")
{
alert("Name Field is Empty");
return false;
}

var str=document.form1.last_name.value;
	var valid="abcdefghijklmnopqrstuvwxyz ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	for(i=0;i<str.length;i++)
	{
	if(valid.indexOf(str.charAt(i))==-1)
	{
	alert("Last Name Cannot Contain Numerical Values");
	document.form1.last_name.value="";
	document.form1.last_name.focus();
	return false;
	}}
	

if(document.form1.last_name.value=="")
{
alert("Name Field is Empty");
return false;
}

}
</script>
   <style>#left-column {height: 477px;}
 #main {height: 477px;}
</style>
</head>
<body>
<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="#">Admin Dashboard</a>
		</div>
		<ul class="nav navbar-nav">
			<li><a href="admin.php">Home</a></li>
			<li class="active"><a href="admin_teacher.php">Teacher</a></li>
			<li><a href="admin_student.php">Student</a></li>
			<li><a href="admin_faculty.php">Faculty</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>
	</div>
</nav>
<div id="content">
<div id="main">
<div id="tabbed_box" class="tabbed_box"><br>
    <h4>Manage Teacher</h4><hr/>	
    <div class="tabbed_area">  
      
        <ul class="tabs">  
            <li><a href="javascript:tabSwitch('tab_1', 'content_1');" id="tab_1" class="active">View User</a></li>  
            <li><a href="javascript:tabSwitch('tab_2', 'content_2');" id="tab_2">Add Teacher</a></li>  
              
        </ul>  
          
        <div id="content_1" class="content">  
		<?php
        include_once('connect_db.php');
       $result = mysql_query("SELECT * FROM teacher")or die(mysql_error());
        echo "<table border='1' class='table'>";
        echo "<tr> <th>ID</th><th>Firstname </th> <th>Lastname </th> <th>Username<th>Delete</th></tr>";
        while($row = mysql_fetch_array( $result )) {
                echo "<tr>";
                echo '<td>' . $row['teacher_id'] . '</td>';
                echo '<td>' . $row['first_name'] . '</td>';
				echo '<td>' . $row['last_name'] . '</td>';
				echo '<td>' . $row['username'] . '</td>';
				?>
				<td><a href="delete_teacher.php?teacher_id=<?php echo $row['teacher_id']?>" class="btn btn-primary">Delete</a></td>
				<?php echo "<tr>";
		 }
        echo "</table>";
?> 
        </div> 
        <div id="content_2" class="content">
				  	   <?php
				echo $message;
				echo $messages;
			  ?>
		  <form name="form1" onsubmit="return validateForm(this);" action="admin_teacher.php" method="post" align="center">
    <div class="form-group">
      <label for="first_name">Firstname:</label>
	  <input name="first_name" type="text" style="width:170px" placeholder="First Name" required="required" id="first_name" />
    </div>
	<div class="form-group">
      <label for="last_name">Lastname:</label>
	  <input name="last_name" type="text" style="width:170px" placeholder="Last Name" required="required" id="last_name" />
    </div>
	<div class="form-group">
      <label for="postal_address">Postal Address:</label>
	  <input name="postal_address" type="text" style="width:170px" placeholder="Postal Address" required="required" id="postal_address" />
    </div>
	<div class="form-group">
      <label for="phone">Phone:</label>
	  <input name="phone" type="text" style="width:170px" placeholder="Phone" required="required" id="phone" />
    </div>
	<div class="form-group">
      <label for="email">Email:</label>
	  <input name="email" type="email" style="width:170px" placeholder="Email" required="required" id="email" />
    </div>
	<div class="form-group">
      <label for="username">Username:</label>
	  <input name="username" type="text" style="width:170px" placeholder="Username" required="required" id="username" />
    </div>
	<div class="form-group">
      <label for="password">Password:</label>
	  <input name="password" type="password" style="width:170px" placeholder="Password" required="required" id="password" />
    </div>
    <div class="form-group">
      <input name="submit" type="submit" value="Submit"/>
    </div>
  </form>
        </div>
    </div>  
</div>
</div>
</div>
</body>
</html>
