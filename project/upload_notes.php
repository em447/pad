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
	<h1>Upload Meeting Notes</h1>
	<form action="upload_notes.php" method="post"enctype="multipart/form-data">
	<label>Title:</label><input type="text" name="Title"/><span class="red">*</span><br/>
	<label for="file">Filename:</label><br/>
	<label>Category:</label><select name="category">
	<option value="select">--Select Category--</option>
	<option value="General">General</option>
	<option value="Speaker">Speaker</option>
	<option value="Activity">Activity</option>
	<option value="Miscellaneous">Miscellaneous</option>
	</select><span class="red">*</span><br/>
	<label>File:</label><input type="file" name="file" id="file" /><span class="red">*</span>
	<br />
	<input type="submit" name="submit_notes" value="Submit" />
	</form>

	<p><span class="red">*Required Fields</span></p>
<?php
	if(isset($_POST['submit_notes'])){
	if ($_FILES["file"]["error"] > 0){
  		echo "Error: " . $_FILES["file"]["error"] . "<br />";
  	}else{
  		echo "Upload: " . $_FILES["file"]["name"] . "<br />";
  		echo "Type: " . $_FILES["file"]["type"] . "<br />";
  		echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
  		echo "Stored in: " . $_FILES["file"]["tmp_name"];
  	
	if (file_exists("notes/" . $_FILES["file"]["name"])){
      	echo $_FILES["file"]["name"] . " already exists. ";
     }else{
      	move_uploaded_file($_FILES["file"]["tmp_name"],
      	"notes/" . $_FILES["file"]["name"]);
      	echo "Stored in: " . "notes/" . $_FILES["file"]["name"];
      		}
  	}
  	  	
	 require('mysql.config.inc');
     $mysqli = new mysqli($host, $username, $password, $db);
     $query = "INSERT INTO Notes (title, category, path, date) VALUES('".$_POST['Title']."', '".$_POST['category']."', 'notes/".$_FILES["file"]["name"]."', NOW())";
	 $result = $mysqli->query($query);
	}
?>

	
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
