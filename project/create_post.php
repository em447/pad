<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"> 
	<head>
		<title>Create Post</title>
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
	if(isset($_SESSION['pad_member']) || isset($_SESSION['pad_admin'])){
?>
<?php 
if(isset($_SESSION['pad_member'])){
	print("<div id='welcome'><p>Welcome, ".$_SESSION['pad_member'].".</div><br/>"); 
}else if(isset($_SESSION['pad_admin'])){
	print("<div id='welcome'><p>Welcome, ".$_SESSION['pad_admin'].".</div><br/>");
}
?>
	<h1>Create New Post</h1>
<?php
	if(isset($_POST['submit_post'])){
		// nl2br adds <br/> lines to the line breaks in the textarea for the post.
		$post = nl2br($_POST['post']);
		require('mysql.config.inc');
		$mysqli = new mysqli($host, $username, $password, $db);
		$query= "INSERT INTO Post VALUES('', '".$_POST['location']."', '".$_POST['title']."', \"".$post."\", NOW(), NOW())";
		//print($query);
		$result=$mysqli->query($query);
	}
?>
	<form action="create_post.php" method="post">
	<p><label>Select Location: </label><select name="location">
	<option value="select_location">--Select Location--</option>
	<option value="member_announcements">Member Announcements</option>
	<option value="rush">Rush</option>
	<option value="pad_events">PAD Events</option>
	</select><span class="red">*</span></p>
	<p><label>Title: </label><input type="text" name="title" size="62"><span class="red">*</span></p>
	<p><label>Post: </label><textarea type="text" name="post" rows="10" cols="45"></textarea><span class="red">*</span></p>
	<input type="submit" name="submit_post" value="Submit"/>
	<input type="submit" name="cancel" value="Cancel"/>
	</form>
	<p><span class="red">*Required Fields</span></p>
	
	
	
<?php
	}else{
		print("<p>You must be logged in to view this page</p>");
	}
?>
	</div>
<?php
	if(isset($_SESSION['pad_member']) || isset($_SESSION['pad_admin'])){
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
