<?php
	session_start();
	
	if (isset($_SESSION['pad_member'])) {
		unset($_SESSION['pad_member']);
		session_destroy();
	}
	if (isset($_SESSION['pad_admin'])) {
		unset($_SESSION['pad_admin']);
		session_destroy();
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"> 
	<head>
		<title>Logout</title>
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
	<p>You have successfully logged out. <a href="index.php">Click Here</a> to return to the Home page.</p>
	</div>
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
