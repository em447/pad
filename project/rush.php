<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"> 
	<head>
		<title>Rush</title>
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

	<script language="JavaScript" src="http://itde.vccs.edu/rss2js/feed2js.php?src=http%3A%2F%2Fwww.law.com%2Fjsp%2Frss%2Frss_nlj_sc.jsp&chan=y&num=5&desc=0&date=y&targ=y" type="text/javascript"></script>

	<noscript>
	<a href="http://itde.vccs.edu/rss2js/feed2js.php?src=http%3A%2F%2Fwww.law.com%2Fjsp%2Frss%2Frss_nlj_sc.jsp&chan=y&num=5&desc=0&date=y&targ=y&html=y">View RSS feed</a>
	</noscript>

	<script language="JavaScript" src="http://itde.vccs.edu/rss2js/feed2js.php?src=http%3A%2F%2Fwww.law.com%2Fjsp%2Frss%2Frss_nlj_ls.jsp&chan=y&num=5&desc=0&date=y&targ=y" type="text/javascript"></script>

	<noscript>
	<a href="http://itde.vccs.edu/rss2js/feed2js.php?src=http%3A%2F%2Fwww.law.com%2Fjsp%2Frss%2Frss_nlj_ls.jsp&chan=y&num=5&desc=0&date=y&targ=y&html=y">View RSS feed</a>
	</noscript>


</div>

	<h1>Rush</h1>
	<?php
	if(isset($_POST['delete_post'])){
	require('mysql.config.inc');
	$mysqli = new mysqli($host, $username, $password, $db);
	$query2 = "DELETE FROM Post WHERE pid =".$_POST['postId']."";
	$result2 = $mysqli->query($query2);
}
	require('mysql.config.inc');
	$mysqli = new mysqli($host, $username, $password, $db);
	$query = "SELECT* FROM Post WHERE Location = 'rush' ORDER BY Created DESC LIMIT 5";
	$result = $mysqli->query($query);
	if($result->num_rows == 0){
			print("<div id='no_post'>Stay tuned for upcoming Rush Events.</div>");
		}
	while($array=$result->fetch_assoc()){
		if(isset($_SESSION['pad_admin'])){
		print("<h2>".$array['Title']."</h2><div id='post'><p>".$array['Post']."</p><p id='date_posted'>Date Posted: ".$array['datePosted']."</p></div>");
	?>
	<form action='rush.php' method='post' onSubmit="return confirm('Delete this Post?');"><INPUT TYPE='submit' name='delete_post' value='Delete Post' ><input type='hidden' name='postId' value=<?php print("'".$array['pid']."'")?>/></form>

<?php
		}else{
			print("<h2>".$array['Title']."</h2><div id='post'><p>".$array['Post']."</p><p id='date_posted'>Date Posted: ".$array['datePosted']."</p></div>");
		}
	print("<hr/>");
	}
?>
	
	<h1>Why Join Pad?</h1>
	<p>PAD is the largest co-ed professional law fraternity in the United States of America and is proud to be the first and only law fraternity 
	that has a special program just for Pre-Law students. There are many pre-law undergraduate chapters of PAD all over the country, and students 
	at Cornell were very surprised when they found out we did not have one. This is why we have decided to make a change and incorporate our own 
	chapter into the Cornell campus.</p>

	<p>Why join PAD you might wonder...</p>

	<p>Phi Alpha Delta has many law-related benefits which one cannot find anywhere else. First, it has an alumni network of over 270,000 members, 
	including university students, law school students, lawyers, judges, senators, and even former presidents. Statistically, <span class="red"><b><u>approximately one 
	out of six attorneys in the United States is a member of PAD</u></b></span>. Therefore, PAD is able to connect students and teachers with members of the 
	Bench, Bar, law firms, and corporations. Moreover, the undergraduate PAD chapter will be able to connect with students of Cornell Law School's 
	own prominent PAD chapter, which will be able to supply its resources and unite law and pre-law students.</p> 

	<p>Thinking about taking the LSAT? PAD provides pre-law students with <span class="red"><b><u>significant discounts on LSAT courses and textbooks</u></b></span>. PAD members are 
	also entitled to a <span class="red"><b><u>10% discount on any T-Mobile rate plan, waived activation fees and special discounts on wireless handsets</u></b></span>. These are just 
	some of the gains in joining... And who can forget how great it would be to be titled a "Founding Father" (everyone in the first chapter of PAD) 
	of a fraternity that is highly functional at every reputable law school?</p> 

	<p>Like any other academically oriented fraternity, we plan on being a prominent force on campus. We will have a lot of contact with Cornell 
	Law School, attend regional and national PAD events, and stay connected with pre-law and law students across the nation.</p>

	

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
