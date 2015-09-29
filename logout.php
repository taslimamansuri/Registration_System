<?php
session_start();
mysql_connect("localhost","root","taslima");
mysql_select_db("register_db");
if($_SESSION['email']){
	$user_email=$_SESSION['email'];
}
$php_timestamp_logout = time();
$php_timestamp_logoutTime = date("Y-m-d H:i:s", $php_timestamp_logout);
$query = "update users set logout_time='$php_timestamp_logoutTime' where user_email='$user_email'";
		mysql_query($query);
		
session_destroy();
header("location: login.php");
?>