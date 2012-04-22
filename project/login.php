<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"> 
	<head>
		<title>Member Login</title>
		<!--<link rel="stylesheet" type="text/css" href="css/style.css"/>-->
	</head>
<style>
body{
	background-color: #999999;
}

#container {
	position:relative;
  width:900px;
  min-height: 500px;
  margin-left:auto;
  margin-right:auto;
  background:#000000; 
  padding-left:0px;
  padding-right:0px; 
  padding-top:10px; 
  padding-bottom:0px;
  margin-top: -8px;
  margin-bottom: 10px;
  border: black 2px solid;
}

h1{
	text-align: center;
}

#title_bar{
	margin: 0px;
	margin-top: -11px;
}

#menu_bar{
	margin: 0px;
	margin-top: -3px;
}
#title{
	margin-top: 10px;
	margin-bottom: 10px;
	margin-left: 10px;
}


#text{
	background-color: #FFFFFF;
	padding: 10px;
	width: 620px;
	min-height: 400px;
	margin-top: 0px;
	font-family: "Trebuchet MS",Arial,Helvetica,sans-serif;
	font-size: 14px;
	
}

#text_members{
	float: left;
	margin-right: 40px;
	background-color: #FFFFFF;
	padding: 10px;
	width: 620px;
	min-height: 400px;
	margin-top: 0px;
	font-family: "Trebuchet MS",Arial,Helvetica,sans-serif;
	font-size: 14px;
	
}
#bottom_bar{
	clear: left;
	margin: 0px;
	margin-top: 0px;
	margin-bottom:0px;
	background-image: url('images/bottom_bar2.gif');
	width: 900px;
	height: 40px;
	padding-top: 8px;
	color: #FFFFFF;
	font-size: 13px;
}

#bottom_bar a {
	text-decoration: none;
	color: #FFFFFF;
}

#side_bar{
	width: 240px;
	height: 540px;
	background-image: url("../images/purple.jpg");
	float: left;
}

#nav ul
{ margin: 0px;
  padding: 0px;
  list-style: none;
  z-index : 100; 
  }
  
#nav ul li 
{ position: relative;
  float: left;
  width: 120px; 
  z-index : 100;}
  
#nav li ul 
{ position: absolute;
  top: 35px;
  display: none;
  z-index : 100;  }
  
 div#nav a {
 	color: #FFCC00;
 	font-weight: bold;
 }

#nav ul li a
{ display: block;
  position : relative;
  text-decoration: none;
  line-height: 25px;
  color: #FFFFFFF;
  padding-top: 5px;
  padding-left: 14px;
  margin:0px;
  //border-right : black 1px solid;
  z-index : 100; }

#nav ul li ul li 
{ border:1px solid black;
  width:118px;
  text-align:left;
 z-index : 100;  }

#nav ul li a:hover { color: #FFFFFF;}

#nav /* nav bar */
{ margin-left:0px;
  margin-right:0px;
  padding-left:0px;
  padding-right:0px;
  width: 900px;
  height:35px;
  font-size:16px;
  background-image : url('../images/menu_bar.gif');
  font-family: "Trebuchet MS",Arial,Helvetica,sans-serif;
  text-align:center;
  z-index: 100;
  margin-bottom:0px;
  margin-top:-5px;
  padding-bottom:0px; }
  
#officer{
	font-size: 13px;
}

#committee{
	font-size: 13px;
}

#bold{
	font-weight: bold;
	font-size: 14px;
}

.red{
	color: #FF0000;
}

#nav_members{
	color: #FFFFFF;
	line-height: 25px;
}

div#nav_members ul{
	list-style: none;
}

div#nav_members a{
	text-decoration: underline;
	color: #FFFFFF;
}

#login{
	margin-left: 115px;
	margin-top: 45px;
}
label{
	display: inline-block;
	width: 100px;
	line-height: 35px;
}

#table td{
	
	width: 150px;
	text-align: left;
}

#table th{
	text-align: left;
}

#founding_officers{
	float: left;
	margin-right: 150px;
	margin-bottom: 20px;
}

#founding_fathers{
	clear:left;
}

#advisor{
	padding-top: 1px;
}
  
	</style>

	<body>
<?php
	if(isset($_SESSION['pad_member'])){
		print("<meta HTTP-EQUIV='REFRESH' content='0; url=members.php'>");
	}
?>
	<div id="container">
	<img id="title_bar" src="images/title_bar.gif" height="100" width="900" alt="title bar" />
<?php
	require("menu_bar.php");
?>
	<div id="text">
	<h2>Member Login</h2>
	<p>This portion of the site is for PAD members only. Members may log in below to gain access.</p>
<?php
	if(!isset($_POST['submit'])) { 
?>
	<div id="login">
		<form action="login.php" method="post">
		<p><label>Username: </label><input type="text" name="username"/><br/>
		<label>Password: </label><input type="password" name="password"/><br/>
		<input type="submit" name="submit" value="Login" /></p>
		</form>
	</div>

<?php
}else{
	require('mysql.config.inc');
	$mysqli = new mysqli($host, $username, $password, $db);
	$query = "SELECT * FROM Users WHERE Username = '".$_POST['username']."' AND Password = '".hash("sha256", $_POST['password'])."'";
	$result = $mysqli->query($query); 
		if ($result->num_rows == 1) { 
		$array = $result->fetch_assoc();
		print("<meta HTTP-EQUIV='REFRESH' content='0; url=members.php'>");
		//print("<div id='login'>Welcome, ".$array['Userame'].".");
		//print("<form action='logout.php' method='post'><fieldset><input type='submit' name='Logout' value='Logout'/></fieldset></form></div>");
		$_SESSION['pad_member'] = $array['Username'];
		} else {
			print "<div id='login'><div class='red'>Invalid Login</div>";
?>
			
		<form action="login.php" method="post">
		<p><label>Username: </label><input type="text" name="username"/><br/>
		<label>Password: </label><input type="password" name="password"/><br/>
		<input type="submit" name="submit" value="Login" /></p>
		</form>
	</div>
<?php
		}
	$mysqli->close();
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
