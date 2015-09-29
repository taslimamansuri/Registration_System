<?php 
session_start();
$admin_id = $_GET['adminid'];
if($_SESSION['admin_email']){
	//$admin_id = $_GET['adminid'];
	$email = $_SESSION['admin_email'];
}

?>
<html>
<head>
<title>View of all the Users</title>
</head>
<style type="text/css">
body {
	background:url('blueBack.jpg');
}
</style>
<body>
<form method='post' action='view_users.php'>
<center><h1>All Users Information:</h1></center></br>
<h3 color='green' align='right'>Welcome, <?php echo $email; ?></h3>
<font size='5' color='red' >
<?php echo @$_GET['deleted']; ?>
</font>



<table width='800' align='center' border='5'>
	<tr bgcolor='yellowgreen'>
		<th>No</th>
		<th>User Name</th>
		<th>User Email</th>
		<th>User Password</th>
		<th>Delete User</th>
	</tr>
	
	<tr>
	<?php
	mysql_connect("localhost", "root", "taslima");
	mysql_select_db("register_db");
$query="select * from users";
	
	$run=mysql_query($query);
	
	while($row=mysql_fetch_array($run)){
		//$admin_email = $_SESSION['admin_email'];
		$user_id = $row[0];
		$user_name = $row[1];
		$user_email= $row[3];
		$user_pass = $row[4];
	?>
	
		<td><?php echo $user_id ; ?></td>
		<td><a href='admin_user_profile.php?id=<?php echo $user_id; ?>'><?php echo $user_name ; ?></td>
		<td><?php echo $user_email ; ?></td>
		<td><?php echo $user_pass ; ?></td>
		<td><a href='delete.php?del=<?php echo $user_id ; ?>'>Delete</a></td>
	
	</tr>
	<?php } ?>

</table>
</form>
</body>
</html>