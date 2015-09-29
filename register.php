<html>
<head>
<link href="loginStyle.css" rel="stylesheet" >
<title>Registration</title>
</head>
<body>
<form method='post' action='register.php'>
<table width='400' align='center' border='3' margin-top='50px'>
	<tr>
		<td colspan='5' align='center'><h1>Registration</h1></td>
	</tr>
	<tr>
		<td align='center'>Name:</td>
		<td><input type='text' name='name'/></td>
	</tr>
	<tr>
		<td align='center'>Email:</td>
		<td><input type='text' name='email'/></td>
	</tr>
	<tr>
		<td align='center'>Password:</td>
		<td><input type='password' name='pass'/></td>
		
	</tr>
	<tr>
		<td colspan='5' align='center'><input type='submit' name='submit' value='Sign Up'/></td>
	</tr>

</table>
<h3 align='center' style='color:red;'>Already Registered? <a href='login.php'>Login here</a></h3>
</form>
</body>
</html>
<?php

mysql_connect("localhost","root","taslima");
	mysql_select_db("register_db");

if (isset($_POST['submit'])){
	
	$user_name = $_POST['name'];
	$user_email = $_POST['email'];
	$user_pass = $_POST['pass'];
	
	if($user_name == ''){
		echo "<script>alert('Please enter your name!')</script>";
		exit();
	}
	if($user_email == ''){
		echo "<script>alert('Please enter your Email!')</script>";
		exit();
	}
	if($user_pass == ''){
		echo "<script>alert('Please enter your Password!')
		</script>";
		exit();
	}
	$check_email = "select * from users where user_email='$user_email'";
	
	$run = mysql_query($check_email);
	
	if(mysql_num_rows($run)>0){
		echo "<script>alert('Email already exist in our database
		Please try another one!!!')</script>";
		exit();
	}
	$query = "insert into users (user_name, user_email, user_pass)
	values ('$user_name', '$user_email', '$user_pass')";
	
	if(mysql_query($query)){
		echo "<script>alert('You are successfully Registered!!!')</script>";
	}
}
?>