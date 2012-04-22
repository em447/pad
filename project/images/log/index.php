<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"> 
	<head>
		<title>CourseLog</title>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>

	</head>
	<body>
	<div id="container">
	
	<!--Main Logo-->
	<div id="title_bar">
	<img src="images/logo.gif"  alt="title bar" height= "40" width="175"/>
	</div>

<?php
	require("menu_bar.php");
?>
	
	<div id="main">
	<div id="side_bar">
	
	</div>
<?php
	require("classes.php");
	$course = new Course("INFO 3300", "9:05am", "9:55am", "Monday");
	print($course->getTitle());
	print($course->getStartTime());
	print($course->getEndTime());
	print($course->getDay());
	
	$schedule = new Schedule();
	//$schedule->addClass(
?>
	
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
	Phi Alpha Delta &copy; 2011
	<!--<br/>
	"Service to the Student, the School, the Profession, and the Community."-->
	</center>
	</body>
</html>
