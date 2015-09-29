<?php
mysql_connect("localhost", "root", "taslima");
mysql_select_db("register_db");

$delete_id=$_GET['del'];

$query = "delete from users where id='$delete_id'";

if(mysql_query($query)){
	echo 
	"<script>window.open('view_users.php?deleted=user has been deleted!!', '_self')</script>";
}

?>