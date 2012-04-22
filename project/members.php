<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"> 
	<head>
		<title>Member's Page</title>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
	</head>
	<body>
	<div id="container">
	<div id="title_bar">
	<img src="images/emblem.png"  alt="title bar" />
	<img src="images/title_bar.gif" height="80" width="600" alt="title bar" />
	</div>

<?php
	require("menu_bar.php");
?>
<?php
	if((!isset($_SESSION['pad_member'])) && (!isset($_SESSION['pad_admin']))){
?>
<?php

	if(!isset($_POST['submit'])) { 
?>
	<div id="main">
	<div id="side_bar">

	<!--RSO Feed-->
	<script language="JavaScript" src="http://itde.vccs.edu/rss2js/feed2js.php?src=http%3A%2F%2Fwww.law.com%2Fjsp%2Frss%2Frss_newswire.jsp&chan=y&num=5&desc=0&date=y&targ=y" type="text/javascript"></script>

	<noscript>
	<a href="http://itde.vccs.edu/rss2js/feed2js.php?src=http%3A%2F%2Fwww.law.com%2Fjsp%2Frss%2Frss_newswire.jsp&chan=y&num=5&desc=0&date=y&targ=y&html=y">View RSS feed</a>
	</noscript>

	<script language="JavaScript" src="http://itde.vccs.edu/rss2js/feed2js.php?src=http%3A%2F%2Fwww.law.com%2Fjsp%2Frss%2Frss_nlj_ls.jsp&chan=y&num=5&desc=0&date=y&targ=y" type="text/javascript"></script>

	<noscript>
	<a href="http://itde.vccs.edu/rss2js/feed2js.php?src=http%3A%2F%2Fwww.law.com%2Fjsp%2Frss%2Frss_nlj_ls.jsp&chan=y&num=5&desc=0&date=y&targ=y&html=y">View RSS feed</a>
	</noscript>
	<!--RSO Feed-->

</div>

	<h2>Member Login</h2>
	<p>This portion of the site is for PAD members only. Members may log in below to gain access.</p>
	<div id="login">
		<form action="members.php" method="post">
		<p><label>Username: </label><input type="text" name="username"/><br/>
		<label>Password: </label><input type="password" name="password"/><br/>
		<input type="submit" name="submit" value="Login" /></p>
		</form>
	</div>
	</div>

<?php
}else{
	require('mysql.config.inc');
	$mysqli = new mysqli($host, $username, $password, $db);
	$query = "SELECT * FROM Users WHERE Username = '".$_POST['username']."' AND Password = '".hash("sha256", $_POST['password'])."'";
	$result = $mysqli->query($query); 
		if ($result->num_rows == 1) { 
		$array = $result->fetch_assoc();
		//print("<meta HTTP-EQUIV='REFRESH' content='0; url=members.php'>");
		//print("<div id='login'>Welcome, ".$array['Userame'].".");
		//print("<form action='logout.php' method='post'><fieldset><input type='submit' name='Logout' value='Logout'/></fieldset></form></div>");
		$_SESSION['pad_member'] = $array['Username'];
		} else {
?>
<div id="text">
	<h2>Member Login</h2>
	<p>This portion of the site is for PAD members only. Members may log in below to gain access.</p>
<?php
			print "<div id='login'><div class='red'>Invalid Login</div>";
?>
			
		<form action="members.php" method="post">
		<p><label>Username: </label><input type="text" name="username"/><br/>
		<label>Password: </label><input type="password" name="password"/><br/>
		<input type="submit" name="submit" value="Login" /></p>
		</form>
		</div>
		</div>
		
<?php
		}
	$mysqli->close();
}
?>

<?php

	}
?>

	
<?php
	if(isset($_SESSION['pad_member']) || isset($_SESSION['pad_admin'])){
?>
<div id="text_members">
<?php 
/*if(isset($_SESSION['pad_member'])){
	print("<div id='welcome'><p>Welcome, ".$_SESSION['pad_member'].".</div><br/>"); 
}else if(isset($_SESSION['pad_admin'])){
	print("<div id='welcome'><p>Welcome, ".$_SESSION['pad_admin'].".</div><br/>");
}*/
?>
	<h1>PAD Announcements</h1>
<?php
if(isset($_POST['delete_post'])){
	require('mysql.config.inc');
	$mysqli = new mysqli($host, $username, $password, $db);
	$query2 = "DELETE FROM Post WHERE pid =".$_POST['postId']."";
	$result2 = $mysqli->query($query2);
}
	require('mysql.config.inc');
	$mysqli = new mysqli($host, $username, $password, $db);
	$query = "SELECT* FROM Post WHERE Location = 'member_announcements' ORDER BY Created DESC LIMIT 5";
	$result = $mysqli->query($query);
	$counter=0;
	while($array=$result->fetch_assoc()){
		if(isset($_SESSION['pad_admin'])){
		print("<h2>".$array['Title']."</h2><div id='post'><p>".$array['Post']."</p><p id='date_posted'>Date Posted: ".$array['datePosted']."</p></div>");
	?>
	<form action='members.php' method='post' onSubmit="return confirm('Delete this Post?');"><INPUT TYPE='submit' name='delete_post' value='Delete Post' ><input type='hidden' name='postId' value=<?php print("'".$array['pid']."'")?>/></form>

<?php
		}else{
			print("<h2>".$array['Title']."</h2><div id='post'><p>".$array['Post']."</p><p id='date_posted'>Date Posted: ".$array['datePosted']."</p></div>");
		}
		print("<hr/>");
	}
	$mysqli->close();
?>	</div>

<?php
	}
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
