<ul>
		<li><a href="members.php">Announcements</a></li>
		<li><a href="calendar.php">Calendar</a></li>
		<li><a href="search_notes.php">Search Minutes</a></li>
<?php
	if(isset($_SESSION['pad_admin'])){
		print("<li><a href='upload_notes.php'>Upload Notes</a></li>");
	}
	if(isset($_SESSION['pad_admin'])){
		print("<li><a href='create_post.php'>Create Post</a></li>");
	}else {
		print("<li><a href='admin_login.php'>Admin Login</a></li>");
	}
?>
		<li><a href="logout.php">Logout</a></li>
		</ul>