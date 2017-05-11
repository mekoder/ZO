<?php
include ("error.php");
include 'conn.php';
session_start();
$sid= $_SESSION['sid'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--<META HTTP-EQUIV=Refresh CONTENT="10; URL=home.php">-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href='https://fonts.googleapis.com/css?family=Product+Sans' rel='stylesheet' type='text/css'>
<link href="//fonts.googleapis.com/css?family=Raleway:100normal,100italic,200normal,200italic,300normal,300italic,400normal,400italic,500normal,500italic,600normal,600italic,700normal,700italic,800normal,800italic,900normal,900italic|Open+Sans:400normal|Lato:400normal|Roboto:400normal|Oswald:400normal|Droid+Sans:400normal|Droid+Serif:400normal|Lobster:400normal|PT+Sans:400normal|Ubuntu:400normal|Playfair+Display:400normal&amp;subset=all" rel="stylesheet" type="text/css">
<link rel="icon" type="image/png" href="images/mf-favicon2.png">
<!-- EVERY PAGE STYLE -->
<link rel="stylesheet" href="style.css" />
<link rel="stylesheet" href="hom-mf-css-jk786.css" />
<link rel="stylesheet" href="disc-mf-css-jk786.css" />
<link rel="stylesheet" href="radios-mf-css-jk786.css"/>
<link rel="stylesheet" href="footer.css" />

<script src="js/2.2.0_jquery.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<!-- Angular Script -->
<script src="http://code.angularjs.org/1.2.13/angular.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/angular-ui-router/0.2.8/angular-ui-router.min.js"></script>
<script src="js/app.js"></script>

<title>Home - Musicfreaks</title>
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
    	<section id="home-page">
<!--<div class="top-layer"></div>-->
<!--
<div class="search-home">
<input type="text" class="search2" id="search2" placeholder="What would you like to listen to?"/>
</div> -->
<div>
<div class="vsugg-h shad"></div>
<main class="inline-div-content">
<div class="home-box-left-jk shad"></div>
<div class="home-box-middle-jk2 shad"></div>
<div class="allright-box">
<div class="home-box-right-jk shad"></div>
<div class="home-box-right-jk2 shad"></div>
</div>
</main>
</div>
<div id="reset"></div>
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