<?php
session_start();
?>

<html>
<head>
<link href="loginStyle.css" rel="stylesheet" >
<title>Admin Login</title>
</head>

<body >
<form method='post' action='admin_login.php'>
<div id='wrapper'>
<table  align='center'  >
	<tr>
		<td colspan='5' align='center'><h1>Admin Login</h1><hr height='2'></td>
	</tr>
	
	<tr>
		<td align='center'>Admin Email:</td>
		<td><input type='text' name='admin_email'/></td>
	</tr>
	<tr>
		<td align='center'>Admin Password:</td>
		<td><input type='password' name='admin_pass'/></td>
		
	</tr>
	<tr>
		<td colspan='5' align='center'><input type='submit' name='admin_login' value='Login'/></td>
	</tr>

</table>
</div>
<center>

<a href='login.php' >User Login</a>

</center>
</form>

</body>
</html>
<?php
mysql_connect("localhost","root","taslima");
mysql_select_db("register_db");

if(isset($_POST['admin_login'])){
	
	$email=$_POST['admin_email'];
	$pass=$_POST['admin_pass'];
	
	$query="select * from admin where admin_email='$email' AND admin_pass='$pass'";
	
	$run= mysql_query($query);
	
	$get= mysql_fetch_assoc($run);
	
	$admin_id = $get['id'];
	//$admin_email=$get['admin_email'];
	//$admin_pass=$get['admin_pass'];
	
	
	if (mysql_num_rows($run)==1){
		
		$_SESSION['admin_email']=$email;
		
		echo"<script>window.open('view_users.php?adminid=$admin_id', '_self')</script>";
	}
	else{
		echo"<script>alert('Admin information is incorrect!!')</script>";
	}
	
	
}
?>