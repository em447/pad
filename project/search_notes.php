<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"> 
	<head>
		<title>Search Minutes</title>
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
	if(isset($_SESSION['pad_member']) || (isset($_SESSION['pad_admin']))){
?>
	<h1>Search Minutes</h1>
	<div id="member_search">
		<form action="search_notes.php" method="post">
		<p><label>Title: </label><input type="text" name="title"/><br/>
		<label>Category:</label><select name="category">
		<option value="select">--Select Category--</option>
		<option value="General">General</option>
		<option value="Speaker">Speaker</option>
		<option value="Activity">Activity</option>
		<option value="Miscellaneous">Miscellaneous</option>
		</select><br/>
		<label>Date (YYYY-MM-DD): </label><input type="text" name="date"/><br/>
		<input type="submit" name="submit" value="Search" /></p>
		</form>
	</div>
	<h2>Search Results</h2>
<?php
	if(isset($_POST['submit'])){
	require('mysql.config.inc');
	$mysqli = new mysqli($host, $username, $password, $db);
	if($_POST['title'] != "" && $_POST['category'] == "select" && $_POST['date'] == ""){
	$query = "SELECT * FROM Notes WHERE title LIKE '%".$_POST['title']."%'";
	}
	if($_POST['title'] != "" && $_POST['category'] != "select" && $_POST['date'] == ""){
	$query = "SELECT * FROM Notes WHERE title LIKE '%".$_POST['title']."%' AND category = '".$_POST['category']."'";
	}
	if($_POST['title'] == "" && $_POST['category'] != "select" && $_POST['date'] == ""){
	$query = "SELECT * FROM Notes WHERE category = '".$_POST['category']."'";
	}
	if($_POST['title'] == "" && $_POST['category'] != "select" && $_POST['date'] != ""){
	$query = "SELECT * FROM Notes WHERE category = '".$_POST['category']."' AND date = '".$_POST['date']."'";
	}
	if($_POST['title'] == "" && $_POST['category'] == "select" && $_POST['date'] != ""){
	$query = "SELECT * FROM Notes WHERE date = '".$_POST['date']."'";
	}
	if($_POST['title'] != "" && $_POST['category'] != "select" && $_POST['date'] != ""){
	$query = "SELECT * FROM Notes WHERE title LIKE '%".$_POST['title']."%' AND category = '".$_POST['category']."' AND date = '".$_POST['date']."'";
	}
	if($_POST['title'] == "" && $_POST['category'] == "select" && $_POST['date'] == ""){
		$query = "SELECT * FROM Notes";
	}
	$result = $mysqli->query($query); 
	if ($result->num_rows != 0) { 
		print("<table id='table'>");
		print("<tr>");
		print("<th>Title</th>");
		print("<th>Category</th>");
		print("<th>Date Posted</th>");
		print("</tr>");
		while ($array = $result->fetch_assoc()) { 
		print("<tr><td><a href='".$array['path']."'>".$array['title']."</a></td><td>".$array['category']."</td><td>".$array['date']."</td><td></tr>");
		}
		print("</table>");
	}else{
		print("No Matches Found");
	}
	}
?>
<?php
	}else{
		print("<p>You must be logged in to view this page</p>");
	}
?>
	</div>
<?php
	if(isset($_SESSION['pad_member']) || (isset($_SESSION['pad_admin']))){
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
