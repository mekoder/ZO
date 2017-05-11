<?php
include ("error.php");
include ('conn.php');
session_start();
		 $sid= $_SESSION['sid'];


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href='https://fonts.googleapis.com/css?family=Product+Sans' rel='stylesheet' type='text/css'>
<link rel="icon" type="image/png" href="images/mf-favicon1.png">
<link rel="stylesheet" href="style.css" />
<link rel="stylesheet" href="vid-mf-css-jk786.css" />
<link rel="stylesheet" href="footer.css" />
<link href="myplayer/video-js.css" rel="stylesheet" />
<link href='https://fonts.googleapis.com/css?family=Lato:400,700italic' rel='stylesheet' type='text/css'>
<script src="js/2.2.0_jquery.js"></script>
<script  src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.js" type="text/javascript"></script>
<title>Videos - Musicfreaks</title>
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
<section id="videos-page">
<div class="parnt_vidcont-jk">
<div class="vid_content-jk">
<div class="viddis_sect">
<section class="video-play">
<video id="my-video" class="video-js" controls preload="auto" width="852" height="480" data-setup="{}" autoplay="autoplay">
                                        <script>
										$(document).ready(function() {
											$('.video-js').bind('contextmenu', function(event){
												event.preventDefault();
												$('.custom-menu').css({"top": event.pageY - 44 + "px","left": event.pageX - 148 + "px"}).fadeIn(80);
												
											});
											$(document).bind('click', function(){
												$('.custom-menu').fadeOut(200);
												})
                                        });
										</script>
    <source src="myplayer/in.mp4" type='video/mp4'>
  </video>
  </section>
</div>
</div>
<ul class="custom-menu">
  <li><i class="vicon ishare"></i> Share</li>
  <li><i class="vicon icopylink"></i> Copy video link</li>
  <li><i class="vicon ifavorite"></i> Add to favorite</li>
  <li>Third thing</li>
  </ul>
<div class="vidab">
<div class="ab-content">
<div class="vid-title"><span class="vid_nam">Kudiya toh bach ke ft. Panjabi MC - Full Video Song First video sample</span></div>
</div>
</div>
<div class="vidcmt shad">
</div>

</div>
<div class="vid_rytcont">
<div class="on_trend-sec shad"><span>Suggested</span></div>
<div class="suggested_vids shad"></div>

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
<script src="myplayer/videojs-ie8.min.js" type="text/javascript"></script>
<script src="myplayer/video.js" type="text/javascript"></script>
</body>
</html>