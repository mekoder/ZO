<?php
include ("error.php");
include 'conn.php';

session_start();
$sid= $_SESSION['sid'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href='https://fonts.googleapis.com/css?family=Product+Sans' rel='stylesheet' type='text/css'>
<link href="//fonts.googleapis.com/css?family=Raleway:100normal,100italic,200normal,200italic,300normal,300italic,400normal,400italic,500normal,500italic,600normal,600italic,700normal,700italic,800normal,800italic,900normal,900italic|Open+Sans:400normal|Lato:400normal|Roboto:400normal|Oswald:400normal|Droid+Sans:400normal|Droid+Serif:400normal|Lobster:400normal|PT+Sans:400normal|Ubuntu:400normal|Playfair+Display:400normal&amp;subset=all" rel="stylesheet" type="text/css">
<link rel="icon" type="image/png" href="images/mf-favicon1.png">
<link rel="stylesheet" href="style.css" />
<link rel="stylesheet" href="radios-mf-css-jk786.css"/>
<link rel="stylesheet" href="footer.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
<script async="async" type="text/javascript" src="functions.js"></script>
<title>Stations made only for you - Musicfreaks</title>
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
    
    <section id="station-page">
<div class="top-layer"></div>
<!--
<div class="search-home">
<input type="text" class="search2" id="search2" placeholder="What would you like to listen to?"/>
</div> -->

<div class="stations shad">
<h1 id="rstation_headline-"><font>Click on any station you like to start Radio</font></h1>
<div class="horizontal-line2"></div>
         
<div class="stations-ul">
    <ul>
      <li class="td1 station"><a href="radio.php?station=hip-hop"><img src="images/album/title-1.png"/></a></li>
      <li class="td2 station"><a href="radio.php?station=tribute-to-bob-marley"><img src="images/album/title-2.png"/></a></li>
      <li class="td3 station"><a href="#"><img src="images/album/title-3.png"/></a></li>
      <li class="td4 station"><a href="#"><img src="images/album/title-4.png"/></a></li>
    </ul>
    <ul>
      <li class="td5 station"><a href="#"><img src="images/album/title-5.png"/></a></li>
      <li class="td6 station"><a href="#"><img src="images/album/title-6.png"/></a></li>
      <li class="td7 station"><a href="#"><img src="images/album/title-7.png"/></a></li>
      <li class="td8 station"><a href="#"><img src="images/album/title-8.png"/></a></li>
    </ul>
    <ul>
      <li class="td9 station"><a href="#"><img src="images/album/title-9.png"/></a></li>
      <li class="td10 station"><a href="#"><img src="images/album/title-10.png"/></a></li>
      <li class="td11 station"><a href="#"><img src="images/album/title-11.png"/></a></li>
      <li class="td12 station"><a href="#"><img src="images/album/title-12.png"/></a></li>
    </ul>
    <ul>
      <li class="td13 station"><a href="#"><img src="images/album/title-13.png"/></a></li>
      <li class="td14 station"><a href="#"><img src="images/album/title-14.png"/></a></li>
      <li class="td15 station"><a href="#"><img src="images/album/title-15.png"/></a></li>
      <li class="td16 station"><a href="#"><img src="images/album/title-16.png"/></a></li>
    </ul>
    <ul>
      <li class="td17 station"><a href="#"><img src="images/album/title-17.png"/></a></li>
      <li class="td18 station"><a href="#"><img src="images/album/title-18.png"/></a></li>
      <li class="td19 station"><a href="#"><img src="images/album/title-19.png"/></a></li>
      <li class="td20 station"><a href="#"><img src="images/album/title-20.png"/></a></li>
    </ul>
</div> 
</div>
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