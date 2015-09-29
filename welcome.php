<?php
session_start();

mysql_connect("localhost", "root", "taslima");
	mysql_select_db("register_db");
//if(isset($_GET['id'])){
$id=$_GET['id'];

if($_SESSION['email']){
	//$id=$_GET['id'];
	$email=$_SESSION['email'];
	
}
	//$check_user="select * from users where user_email='$email'";
	
	//$run = mysql_query("select * from users where user_email='$email'");
	//$get= mysql_fetch_array($run);
	
	//$id=$get[user_name];
	//$user_name=$get[1];
	$run=mysql_query("select * from users 
			where id=$id");
			
			
			$store = mysql_fetch_array($run);
			//echo $store['user_name'];
	
	
	
	
	
?>

<html>
<head>
<link href="welcomeStyle.css" rel="stylesheet" >
<link href="javascripts/jquery.cycle2.min.js" rel="text/javascript" >
<link href="javascripts/jquery-2.1.4.min.js" rel="text/javascript" >
<title>Welcome</title>
</head>


<body >


<div id="wraper">
<form method='post' action='welcome.php'>
	<div id='banner'>
	<h1 >Welcome to our Website</h1>
	</div>
	<div id='navigation'>
		<ul id='nav'>
			<li>Home</li>
			<li>About Us</li>
			<li>Gallery</li>
			<li>Contact Us</li>
			<li>
				
			</li>
		</ul>
	</div>
	
			
			
	<!--<img style='float:right' src="Happy-EID.jpg" >-->
				<div id='content'>
				<font color='purple' size='3' align='right' margin-right='10px'>
				<h5 align='right' margin-right='10px'>Hi, <?php echo $store['user_name'];?> &nbsp; 
				<a href='user_profile.php?id=<?php echo $id; ?>'>My Profile</a></br>
				<a href='logout.php' >Log Out</a></h5>
				</font>

				<font color='purple' family='sans-sarif Arial'><h1>Eid Mubarak to All !!!</h1> 
				</font>
				<img id="frontpic" src="Happy-EID.jpg" >
				<img id='frontpic' src="Eid-Mubarak-2014.jpg" >
				</div>
				<iframe width="420" height="345"
src="http://www.youtube.com/embed/XGSy3_Czz8k">
</iframe>
		<div id='footer'>
		<h3>All rights are reserved.</h3>
		</div>
</form>
</div>


</body>
</html>