<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="indexstyle.css" />
<link href='https://fonts.googleapis.com/css?family=Lato:400,700italic' rel='stylesheet' type='text/css'>
<script src="functions.js"></script>
<script src="js/2.2.0_jquery.js"></script>
<script  src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.js" type="text/javascript"></script>
<script  src="js/jquery.cycle.all.js" type="text/javascript"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Musicfreaks – Be a freak</title>
</head>
<body>
<div class="index-container">
<script>
$(window).scroll(function() {     
    var scroll = $(window).scrollTop();
    if (scroll > 0) {
        $("#nav_scroll").addClass("active");
    }
    else {
        $("#nav_scroll").removeClass("active");
    }
});

</script>
<div class="ind_nav45" id="nav_scroll"></div>
<div class="display-a1">
<div class="msg_45"><h1>Stay tuned</h1><h2>for</h2>
<ul>
<li><strong>Latest :</strong> Go for the latest in your city.</li>
<li><strong>Playlists :</strong> Create your own playlists of the songs you love.</li>
<li><strong>Best experience :</strong> Get the best experience with no interruptive ads.</li>
</ul>
<button class="signupin-btn" id="signupin-btn"><span>SIGNUP</span></button>
<button class="explorein-btn" id="explorein-btn"><span>EXPLORE</span></button>
<script type="text/javascript">
$('#explorein-btn').click(function()
{
	window.location.href = '/musicfreaks/home';
	
});
</script>
<div class="down_div"></div>
</div>
<div class="display_imgs">
<div class="icol_11">
<div class="subcol_11">
<img src="images/Index-images/revival.jpg"/>
<img src="images/Index-images/antirihana.jpg" />
<img src="images/Index-images/purposejustin.jpg" />
<img src="images/Index-images/pillowtalk.jpg" />
<img src="images/Index-images/ts1989.jpg" /></div>
<script>
$('.subcol_11').cycle({ 
    fx:    'fade', 
	speed:  5000,
	delay : 1000,
	pause: 1
 });</script>
<div class="subcol_12">
<div class="subcol1_img1"></div>
<div class="subcol1_img2"></div>
</div>
</div>
<div class="icol_12">
<div class="subcol_21">
<div class="subcol2_img1"></div>
<div class="subcol2_img2"></div></div>

<div class="subcol_22">
<img src="images/Index-images/fitoor.jpg" />
<img src="images/Index-images/bbsalman.jpg" />
<img src="images/Index-images/pk.jpg"/>
<img src="images/Index-images/herofilm.jpg" />
<img src="images/Index-images/phantombolly.jpg" />
</div>  
<script>
$('.subcol_22').cycle({ 
    fx:    'fade', 
	speed:  3500,
	delay:  2000,
	pause: 1
 });</script>
</div>
</div>
</div>
<div class="display-a2"></div>
<script>
$(".down_div").click(function() {
    $('html,body').animate({
        scrollTop: $(".display-a2").offset().top},
        'slow');
});
</script>
</div>
</body>
</html>