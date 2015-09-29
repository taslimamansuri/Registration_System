html>
<head>
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