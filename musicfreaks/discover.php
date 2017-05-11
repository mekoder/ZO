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
<link rel="stylesheet" href="disc-mf-css-jk786.css" />
<link rel="stylesheet" href="footer.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<title>Discover Songs, Stations, Artists & More... - Musicfreaks</title>
</head>

<body>
<?php
include ("main_nav.php");
?>
<div class="main-player">
</div>
<?php
include("category-container.php");
?>
<div class="globalcontainer">
    <div class="body-container">
    
    <section id="discover-page">
<div class="top-layer"></div>
<!--
<div class="search-home">
<input type="text" class="search2" id="search2" placeholder="What would you like to listen to?"/>
</div> -->
						<div class="discover shad">
                        <h1 id="discover-headline"><font>Discover genres, playlists, stations & more</font></h1>
                        <div class="d-horizontal_line"></div>
                        	<ul>
                                    <li>
                                    <a href="#">
                                    <div class="d-img"><img src="assets/images/discover-images/station-img63x63.jpg"/></div>
                                    <div class="d-overlay">
                                    <span>stations</span>
                                    </div>
                                    </a>
                                    </li>
                                    <li>
                                    <a href="#">
                                    <div class="d-img"><img src="assets/images/discover-images/trending-img63x63.jpg"/></div>
                                    <div class="d-overlay">
                                    <span>trending</span>
                                    </div>
                                    </a>
                                    </li>
                                    <li>
                                    <a href="#">
                                    <div class="d-img"><img src="assets/images/discover-images/featured-img63x63.jpg"/></div>
                                    <div class="d-overlay">
                                    <span>featured</span>
                                    </div>
                                    </a>
                                    </li>
                                     
                           </ul> 
                           <ul>
                                    <li>
                                    <a href="#">
                                    <div class="d-img"><img src="assets/images/discover-images/atf-img63x63.jpg"/></div>
                                    <div class="d-overlay">
                                    <span>all time favourite</span>
                                    </div>
                                    </a>
                                    </li>
                                    <li>
                                    <a href="#">
                                    <div class="d-img"><img src="assets/images/discover-images/bollywoodb-img63x63.jpg"/></div>
                                    <div class="d-overlay">
                                    <span>bollywood best</span>
                                    </div>
                                    </a>
                                    </li>
                                    <li>
                                    <a href="#">
                                    <div class="d-img"><img src="assets/images/discover-images/romance-img63x63.jpg"/></div>
                                    <div class="d-overlay">
                                    <span>romance</span>
                                    </div>
                                    </a>
                                    </li>
                         </ul>  
                         <ul>
                                    <li>
                                    <a href="#">
                                    <div class="d-img"><img src="assets/images/discover-images/hiphop-img63x63.jpg"/></div>
                                    <div class="d-overlay">
                                    <span>hip - hop</span>
                                    </div>
                                    </a>
                                    </li>
                                    <li>
                                    <a href="#">
                                    <div class="d-img"><img src="assets/images/discover-images/workout-img63x63.jpg"/></div>
                                    <div class="d-overlay">
                                    <span>workout</span>
                                    </div>
                                    </a>
                                    </li>
                                    <li>
                                    <a href="#">
                                    <div class="d-img"><img src="assets/images/discover-images/pp-img63x63.jpg"/></div>
                                    <div class="d-overlay">
                                    <span>popular playlists</span>
                                    </div>
                                    </a>
                                    </li>
                         </ul>         
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