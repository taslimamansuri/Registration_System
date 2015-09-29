<?php
session_start();
mysql_connect("localhost", "root", "taslima");
	mysql_select_db("register_db");
	$id=$_GET['id'];
	
	if($_SESSION['email']){
		
		//$id=$_GET['id'];
	$email=$_SESSION['email'];
	}
	//$query="select * from users 
			//where user_email = $email";
			
			$run=mysql_query("select * from users 
			where id=$id");
			
			
			$store = mysql_fetch_array($run);
			
			
			
				
?>


<html>
<head>
<link href="style.css" rel="stylesheet" >
<title>Profile</title>
</head>
<body>
<form method='post' action='user_profile.php?id=<?php echo $id;?>' enctype='multipart/form-data'>
<font color='gray' size='4' align='center'>
User Name: <?php echo $store['user_name']; ?>
<br>
User Email: <?php echo $_SESSION['email']; ?>
</font>
<table id='tblmain' align='center' border='0'>
	<tr>
		<td colspan='5' align='center'><h1>My Profile</h1><hr height='2' color='#000'></td>
	</tr>
	
	<tr>
		<td>
			<table id='tbl1'>
				<tr>
					<td style="width:350; height:200">
						<img id='profile' align='center' src='upload/<?php echo $store['user_photo']; ?>' >
						
					</td>
				</tr>
				<tr>
					<td>
					<input type='file' name='file' >
					</td>
				</tr>
				
			</table>
		</td>
		<td>
			<table id='tbl2'>
				<tr >
					<td width='200px' align='center'>Name:</td>
					<td><input type='text' name='name' value='<?php echo $store['user_name']; ?>'></td>
				</tr>
				<tr>
					<td align='center'>Email:</td>
					<td><input type='text' name='email' value='<?php echo $store['user_email']; ?>'/></td>
				</tr>
				<tr>
					<td align='center'>Password:</td>
					<td><input type='text' name='pass' value='<?php echo $store['user_pass']; ?>'/></td>
					
				</tr>
				<tr>
					<td align='center'>Address:</td>
					<td><input type='text' name='address' value='<?php echo $store['address']; ?>'/></td>
					
				</tr>
				<tr>
					<td align='center'>City:</td>
					<td><input type='text' name='city' value='<?php echo $store['city']; ?>'/></td>
					
				</tr>
				<tr>
					<td align='center'>Country:</td>
					<td><input type='text' name='country' value='<?php echo $store['country']; ?>'/></td>
					
				</tr>
						</table>
					</td>
				</tr>
				
				<tr>
					<td colspan='5' align='center'><input type='submit' name='update' value='Update'/></td>
				</tr>

			</table>
</form>
</body>
</html>
<?php

if(isset($_POST['update']))
{
	
	$oldpic = $store ['user_photo'];
	$newpic = $_FILES['file']['name'];
			if($newpic)
			{
			
				if(($_FILES['file'] ['type'] == 'image/gif')
					|| ($_FILES['file'] ['type'] == 'image/jpeg')
					|| ($_FILES['file'] ['type'] == 'image/png')
					&& ($_FILES['file'] ['size'] < 200000))
					{
						if ($_FILES['file'] ['error'] > 0)
						{
							echo "return code:". $_FILES['file'] ['error'];
						}
						
						else if (file_exists('upload/'.$_FILES['file']['name']))
						{
							echo $_FILES['file']['name']."Already Exists";
						}
						
						else if(move_uploaded_file($_FILES['file']['tmp_name'], 'upload/'.$_FILES['file']['name']))
							{
							unlink('upload/'.$oldpic);
							
							$new_name = $_POST['name'];
							$new_email = $_POST['email'];
							$new_pass = $_POST['pass'];
							$new_address = $_POST['address'];
							$new_city = $_POST['city'];
							$new_country = $_POST['country'];
							
							$update_query = "UPDATE users 
												SET 
												user_name = '$new_name', 
												user_photo= '$newpic',
												user_email = '$new_email', 
												user_pass = '$new_pass', 
												address = '$new_address', 
												city = '$new_city', 
												country = '$new_country' 
												WHERE id=$id";
							
							//$sql = mysql_query($update_query)
							
									if(mysql_query($update_query)==true){
										echo "<script>alert('You have successfully updated your profile!!!')</script>";

										//echo "<script>alert('Your Profile has not been updated!!!')</script>";
									
										}
									else{
											die('Could not update data: ' . mysql_error());
										}
							
							
							}
							 
					}
						
						
				}
			
			
			else{
					$new_name = $_POST['name'];
					$new_email = $_POST['email'];
					$new_pass = $_POST['pass'];
					$new_address = $_POST['address'];
					$new_city = $_POST['city'];
					$new_country = $_POST['country'];
					
					$update_query = "UPDATE users 
										SET 
										user_name = '$new_name', 
										
										user_email = '$new_email', 
										user_pass = '$new_pass', 
										address = '$new_address', 
										city = '$new_city', 
										country = '$new_country' 
										WHERE id=$id";
					
					//$sql = mysql_query($update_query)
					
							if(mysql_query($update_query)==true){
								echo "<script>alert('You have successfully updated your profile!!!')</script>";

								//echo "<script>alert('Your Profile has not been updated!!!')</script>";
							
								}
							else{
									die('Could not update data: ' . mysql_error());
								}
				}
				
}



?>		