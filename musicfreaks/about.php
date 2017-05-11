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
<link rel="stylesheet" href="style.css" />
<link rel="stylesheet" href="abou-mf-css-jk786.css" />
<link rel="stylesheet" href="footer.css" />
<link href="//fonts.googleapis.com/css?family=Raleway:100normal,100italic,200normal,200italic,300normal,300italic,400normal,400italic,500normal,500italic,600normal,600italic,700normal,700italic,800normal,800italic,900normal,900italic|Open+Sans:400normal|Lato:400normal|Roboto:400normal|Oswald:400normal|Droid+Sans:400normal|Droid+Serif:400normal|Lobster:400normal|PT+Sans:400normal|Ubuntu:400normal|Playfair+Display:400normal&amp;subset=all" rel="stylesheet" type="text/css">
<script type="text/javascript" src="functions.js"></script>
<script src="js/2.2.0_jquery.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.js" type="text/javascript"></script>
<title>About Musicfreaks</title>
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
<section id="about-page">
<div class="ashadow_45"></div>
<div class="a_c45">
<div class="text_c45 a_fade45">We are Musicfreaks</div>
<p id="quote_c45" class="multi_">Music doesn't lie. If there is something to be changed in this world, then it can only happen through music.<br/><font>- Jimi Hendrix</font>
</p>
<p id="quote_c45" class="multi_">One good thing about music, when it hits you, you feel no pain.<br/><font>- Bob Marley</font>
</p>
<p id="quote_c45" class="multi_">Without music, life would be a mistake.<br/><font>- Friedrich Nietzsche</font>
</p>
<p id="quote_c45" class="multi_">Music is the mediator between the spiritual and the sensual life.<br/><font>- Ludwig van Beethoven</font>
</p>
<p id="quote_c45" class="multi_">Music is moonlight in the gloomy night of life.<br/><font>- Jean Paul</font>
</p>
<p id="quote_c45" class="multi_">Music washes away from the soul the dust of everyday life.<br/><font>- Berthold Auerbach</font>
</p>
<p id="quote_c45" class="multi_">After silence, that which comes nearest to expressing the inexpressible is music.<br/><font>- Aldous Huxley</font>
</p><script type="text/javascript">
(function() {

    var quotes = $(".multi_");
    var quoteIndex = -1;
    
    function showNextQuote() {
        ++quoteIndex;
        quotes.eq(quoteIndex % quotes.length)
            .fadeIn(2000)
            .delay(4000)
            .fadeOut(2000, showNextQuote);
    }
    
    showNextQuote();
    
})();</script><script>
$(window).scroll(function(){
    var top = ($(window).scrollTop() > 0) ? $(window).scrollTop() : 1;
    $('.a_fade45').stop(true, true).fadeTo(0, 20 / top);       
});
</script>
</div>
<div class="aboutus shad">
<div class="about"><h1>About us</h1>
<h2>About</h2>
<p>Here at musicfreaks.com we provide you the collection of millions of songs – from old 80s, 90s to the latest hits.
Just hit on any song you like to start streaming.
</p>
<li><i>Explore –</i> explore millions of songs and your favorite artists.</li>
<li><i>Fast & Smooth –</i> we're more faster than others just to provide you a smooth experience.</li>
<li><i>Listen anywhere –</i> we provide you an environment that can be created according to your need.</li>
<h2>Our focus</h2>
<p>Our prior interest is to provide you a smily experience. Unlike others, we don't sell Interruptive ads as we believe mood is everything and we don't want to spoil it by selling some ads.</p>
<div class="end_smile"></div><div class="smile_"></div></div>
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