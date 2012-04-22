<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"> 
	<head>
		<title>About PAD</title>
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
<h1>Chapter Information</h1>
<h3>Chapter Founding: December 10, 2008</h3>

<div id="founding_officers">
<h3>Founding Officers</h3>
	<div id="officer">
	<ul><span id="bold">President</span> - Rebecca Stein</ul>
	<ul><span id="bold">Vice President</span> - Brianna Lederman</ul>
	<ul><span id="bold">Secretary</span> - Matthew Rotbart</ul>
	<ul><span id="bold">Treasurer</span> - Matthew Bisland</ul>
	</div>
</div>
<div id="advisor">
<h3>Chapter Advisor</h3>
	<div id="officer">
	<ul>Jennifer Gerner</ul>
	</div>
</div>

<div id="founding_fathers">
<h3>Founding Fathers</h3>
	<ul>
		<li>Vincent Andrews</li>
		<li>Amudha Balaraman</li>
		<li>Matthew Bisland</li>
		<li>Colleen Brisport</li>
		<li>Amanda Broitman</li>
		<li>Gracielle Cabungcal</li>
		<li>Jonathan Castellanos</li>
		<li>Kenyon Cory</li>
		<li>Emily Cusick</li>
		<li>Neresa De Biasi</li>
		<li>Courtney Eisner</li>
		<li>Ryan Fanelli</li>
		<li>Roxanna Farshchi</li>
		<li>Daniel Freshman</li>
		<li>Jason Georges</li>
		<li>Meghan Holleran</li>
		<li>Jared Kaplan</li>
		<li>Alex Latella</li>
		<li>Yin Law</li>
		<li>Briana Lederman</li>
		<li>Michael Linhorst</li>
		<li>Jacquelene Marcott</li>
		<li>Lindsay McAleer</li>
		<li>Debra McElligott</li>
		<li>Stefani Meltzer</li>
		<li>Darius Niknamfard</li>
		<li>Joanna Pagones</li>
		<li>Anetta Pietrzak</li>
		<li>Sophia Qasir</li>
		<li>Julie Ann Rosenberg</li>
		<li>Matthew Rotbart</li>
		<li>Lyla Rudgers</li>
		<li>Rebecca Stein</li>
		<li>Alex Tarantino</li>
		<li>Jake Walter-Warner</li>
		<li>Eric Zember</li>
		
	</ul>
</div>

	
			
		
</div>
<div id="nav_members">
		<ul>
		<li><a href="about.php">National Information</a></li>
		<li><a href="chapter.php">Chapter Information</a></li>
		</ul>
		
	</div>
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
