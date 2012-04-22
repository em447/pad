<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"> 
	<head>
		<title>Admin Login</title>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
	</head>
	<style type="text/css">
	/* Remove margins from the 'html' and 'body' tags, and ensure the page takes up full screen height */
	html, body {height:100%; margin:0; padding:0;}
	/* Set the position and dimensions of the background image. */
	#page-background {position:fixed; top:0; left:0; width:100%; height:100%;}
	/* Specify the position and layering for the content that needs to appear in front of the background image. Must have a higher z-index value than the background image. Also add some padding to compensate for removing the margin from the 'html' and 'body' tags. */
	#content {position:relative; z-index:1; padding:10px;}
	</style>

	<style type="text/css">
	html {overflow-y:hidden;}
	body {overflow-y:auto;}
	#page-background {position:absolute; z-index:-1;}
	#content {position:static;padding:10px;}
	</style>
	<body>
	<div id="container">
	<img id="title_bar" src="images/title_bar.gif" height="100" width="800" alt="title bar" />
<?php
	require("menu_bar.php");
?>
	<div id="text_members">
<?php
	if(isset($_SESSION['pad_member'])){
?>
<h2>Admin Login</h2>
<p>This potion of the site is restricted to admin users only. Admin users may log in below to gain access to administrative privileges.</p>
<?php
	if(!isset($_POST['submit'])) { 
?>
	
	
	<div id="login">
		<form action="admin_login.php" method="post">
		<p><label>Username: </label><input type="text" name="username"/><br/>
		<label>Password: </label><input type="password" name="password"/><br/>
		<input type="submit" name="submit" value="Login" /></p>
		</form>
	</div>

<?php
}else{
	require('mysql.config.inc');
	$mysqli = new mysqli($host, $username, $password, $db);
	$query = "SELECT * FROM Users NATURAL JOIN Admin WHERE Username = '".$_POST['username']."' AND Password = '".hash("sha256", $_POST['password'])."'";
	$result = $mysqli->query($query); 
		if ($result->num_rows == 1) { 
		$array = $result->fetch_assoc();
		print("<meta HTTP-EQUIV='REFRESH' content='0; url=members.php'>");
		//print("<div id='login'>Welcome, ".$array['Userame'].".");
		//print("<form action='logout.php' method='post'><fieldset><input type='submit' name='Logout' value='Logout'/></fieldset></form></div>");
		$_SESSION['pad_admin'] = $array['Username'];
		unset($_SESSION['pad_member']);
		} else {
			print "<div id='login'><div class='red'>Invalid Login</div>";
?>
			
		<form action="admin_login.php" method="post">
		<p><label>Username: </label><input type="text" name="username"/><br/>
		<label>Password: </label><input type="password" name="password"/><br/>
		<input type="submit" name="submit" value="Login" /></p>
		</form>

	</div>
<?php
		}
	$mysqli->close();
}
 
?>
<?php
	}else{
		print("<p>You must be logged in to view this page</p>");
	}
?>
	</div>
<?php
	if(isset($_SESSION['pad_member'])){
?>
		<div id="nav_members">
<?php
	require("side_links.php");
?>
		
	</div>
<?php
}
?>

	<!--<img id="bottom_bar" src="images/bottom_bar2.gif" height="50" width="900" alt="bottom bar" />-->
	<center id="bottom_bar">
	<a href="index.html">Home</a>
	|
	<a href="about.php">About PAD</a>
	|
	<a href="brothers.php">Brothers</a>
	|
	<a href="rush.php">Rush</a>
	|
	<a href="events.php">PAD Events</a>
	|
	<a href="contact.php">Contact Us</a>
	|
	<a href="login.php">Members Only</a>
	<br/>
	Phi Alpha Delta &copy; 2010
	<!--<br/>
	"Service to the Student, the School, the Profession, and the Community."-->
	</center>
	</div>
	</body>
</html>
