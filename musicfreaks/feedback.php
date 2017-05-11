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
<link rel="icon" type="image/png" href="images/mf-favicon1.png">
<link rel="stylesheet" href="footer.css" />
<link rel="stylesheet" href="style.css" />
<link rel="stylesheet" href="feedb-mf-css-jk786.css" />
<link href="//fonts.googleapis.com/css?family=Raleway:100normal,100italic,200normal,200italic,300normal,300italic,400normal,400italic,500normal,500italic,600normal,600italic,700normal,700italic,800normal,800italic,900normal,900italic|Open+Sans:400normal|Lato:400normal|Roboto:400normal|Oswald:400normal|Droid+Sans:400normal|Droid+Serif:400normal|Lobster:400normal|PT+Sans:400normal|Ubuntu:400normal|Playfair+Display:400normal&amp;subset=all" rel="stylesheet" type="text/css">
<script type="text/javascript" src="functions.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.js" type="text/javascript"></script>
<title>Give us your feedback</title>
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
<section id="feedback-page">
<div class="feedbshadow_45"></div>
<div class="feedb_c45">
<div class="text_feedb45 feedb_fade45"><h2>Hello there.</h2><p>Please let us know how Musicfreaks sounds to you.</p></div>
<script>
$(window).scroll(function(){
    var top = ($(window).scrollTop() > 0) ? $(window).scrollTop() : 1;
    $('.feedb_fade45').stop(true, true).fadeTo(0, 20 / top);
});
</script>
</div>
<div class="feedb_smilys">
<p id="e_45">HOW WAS MUSICFREAKS<font>?</font></p>
<div class="smilys-container">
<a href="#" class="smily_1"><span>Awesome</span></a>
<a href="#" class="smily_2"><span>Good</span></a>
<a href="#" class="smily_3"><span>Average</span></a>
<a href="#" class="smily_4"><span>Bad</span></a>
<a href="#" class="smily_5"><span>Very bad</span></a></div></div>
<div class="feedb-content shad"></div>
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