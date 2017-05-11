<?php
include ("error.php");
$link=mysqli_connect("localhost","root","","musicfreaks") or die("Not connect to mysql");	
if (!$link)
{
die('Could not connect: ' . mysql_error());
}
{session_start();
		 $sid= $_SESSION['sid'];

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href='https://fonts.googleapis.com/css?family=Product+Sans' rel='stylesheet' type='text/css'>
<link rel="icon" type="image/png" href="images/mf-favicon1.png">
<link rel="stylesheet" href="style.css" />
<link rel="stylesheet" href="albu-mf-css-jk786.css" />
<link rel="stylesheet" href="footer.css" />
<script type="text/javascript" src="functions.js"></script>
<title>All Albums - Musicfreaks</title>
</head>

<body>
<?php
include ("main_nav.php");
?>
<div class="main-player"></div>
<?php
include("category-container.php");
?>
<div class="globalcontainer">
<div class="body-container">
<section id="albums-page">
<!-- Body here -->
</section>
</div>
</div>
<?php 
include ("artists-div.php");
?>
<?php
include ("footer.php");
?>
</body>
</html>