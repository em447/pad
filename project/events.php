<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"> 
	<head>
		<title>PAD Events</title>
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

	<h1>Upcoming PAD Events</h1>
<?php
if(isset($_POST['delete_post'])){
	require('mysql.config.inc');
	$mysqli = new mysqli($host, $username, $password, $db);
	$query2 = "DELETE FROM Post WHERE pid =".$_POST['postId']."";
	$result2 = $mysqli->query($query2);
}
	require('mysql.config.inc');
	$mysqli = new mysqli($host, $username, $password, $db);
	$query = "SELECT* FROM Post WHERE Location = 'pad_events' ORDER BY Created DESC LIMIT 5";
	$result = $mysqli->query($query);
	if($result->num_rows == 0){
			print("<div id='no_post'>Stay tuned for upcoming PAD events.</div>");
		}
	while($array=$result->fetch_assoc()){
		if(isset($_SESSION['pad_admin'])){
		print("<h2>".$array['Title']."</h2><div id='post'><p>".$array['Post']."</p><p id='date_posted'>Date Posted: ".$array['datePosted']."</p></div>");
	?>
	<form action='events.php' method='post' onSubmit="return confirm('Delete this Post?');"><INPUT TYPE='submit' name='delete_post' value='Delete Post' ><input type='hidden' name='postId' value=<?php print("'".$array['pid']."'")?>/></form>

<?php
		}else{
			print("<h2>".$array['Title']."</h2><div id='post'><p>".$array['Post']."</p><p id='date_posted'>Date Posted: ".$array['datePosted']."</p></div>");
		}
		print("<hr/>");
	}
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
	Phi Alpha Delta &copy; 2010
	<!--<br/>
	"Service to the Student, the School, the Profession, and the Community."-->
	</center>
	</div>
	</body>
</html>
