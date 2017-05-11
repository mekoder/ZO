<?php
include ("error.php");
include 'conn.php';
$link=mysqli_connect("localhost","root","","musicfreaks") or die("Not connect to mysql");	
if (!$link)
{
die('Could not connect: ' . mysql_error());
}
{session_start();
  $sid= $_SESSION['sid'];
}

$artist= $_GET['artist'];
$sql = "select * from mf_artist where username='$artist'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
     while($row = $result->fetch_assoc()) {
  $id=$row['id'];
  $name=$row['name'];  
  $username= $row['username'];
  $sex=$row['sex'];
  $hindi=$row['hindi'];
  $english=$row['english'];
  $punjabi=$row['punjabi'];
  $bhojpuri=$row['bhojpuri'];
  $bengali=$row['bengali'];
  $tamil=$row['tamil'];
  $telugu=$row['telugu'];
  $marathi=$row['marathi'];
  $gujarati=$row['gujarati'];
  $malayalam=$row['malayalam'];
  $kannada=$row['kannada'];
  $pahadi=$row['pahadi'];
  $urdu=$row['urdu'];
  $oriya=$row['oriya'];
  $assamese=$row['assamese'];
  $rajasthani=$row['rajasthani'];
  $haryanvi=$row['haryanvi'];
  
  
  $ghazal=$row['ghazal'];
  $filmi=$row['filmi'];
  $bhajan=$row['bhajan'];
  $indian_pop=$row['indian_pop'];
  $hindi_pop=$row['hindi_pop'];
  $bhangra=$row['bhangra'];
  $qawwali=$row['qawwali'];
  $indian_rock=$row['indian_rock'];
  $ihh=$row['indian_hip_hop'];
  $ic=$row['indian_classical'];
  $ifm=$row['indian_folk_music'];
  $pfm=$row['punjabi_folk_music'];
  $about=$row['about'];
    }
 }else
 
  { 
    header("location:/musicfreaks/artists");
    } 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<base href="//localhost/musicfreaks/" />
<link href='https://fonts.googleapis.com/css?family=Product+Sans' rel='stylesheet' type='text/css'>
<link rel="icon" type="image/png" href="images/mf-favicon1.png">
<link rel="stylesheet" href="style.css" />
<link rel="stylesheet" href="artistp-mf-css-jk786.css" />
<link rel="stylesheet" href="footer.css" />
<link href="//fonts.googleapis.com/css?family=Raleway:100normal,100italic,200normal,200italic,300normal,300italic,400normal,400italic,500normal,500italic,600normal,600italic,700normal,700italic,800normal,800italic,900normal,900italic|Open+Sans:400normal|Lato:400normal|Roboto:400normal|Oswald:400normal|Droid+Sans:400normal|Droid+Serif:400normal|Lobster:400normal|PT+Sans:400normal|Ubuntu:400normal|Playfair+Display:400normal&amp;subset=all" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script async="async" src="js/readmore-js.js"></script>
<title><?php echo $name; ?></title>
</head>

<body>
<?php
include ("main_nav.php");
?>
<div class="player-container"></div>
<?php
include("category-container.php");
?>
<div class="globalcontainer">
<div class="body-container">
<section id="artist-profile-page">
	   	<div class="header-bg">
        	<div class="blur-bg" style="background-image:url('<?php
       $artDP = '_dp';
            $filename = "assets/artist_dp/$username$artDP.jpg";
             if (file_exists($filename)) {
                echo $filename;
            } else {
                echo "";
                
            }

        ?>');"></div>
        </div>
	   <div class="header-overlay">
       <img class="artist-image" src="<?php
       $artDP = '_dp';
            $filename2 = "assets/artist_dp/$username$artDP.jpg";
             if (file_exists($filename2)) {
                echo $filename2;
            } else {
                echo "images/d_artistdp2.png";

            }
        ?>"/>
       <div class="artist-info">
       <h1><?php echo $name; ?></h1>
       <div class="genres"><?php 

  if ($ghazal== "1"){
    echo "<span>Ghazal</span>";}

  if($filmi=="1"){
    echo "<span>Filmi</span>";}

  if($bhajan=="1"){
    echo "<span>Bhajan</span>";}

  if($indian_pop=="1"){
    echo "<span>Indian Pop</span>";}
    
  if($hindi_pop=="1"){
    echo "<span>Hindi Pop</span>";}
    
  if($bhangra=="1"){
    echo "<span>Bhangra</span>";}
    
  if($qawwali=="1"){
    echo "<span>Qawwali</span>";}
    
  if($indian_rock=="1"){
    echo "<span>Indian Rock</span>";}
    
  if($ihh=="1"){
    echo "<span>Indian Hip-Hop</span>";}
    
  if($ic=="1"){
    echo "<span>Indian Classical</span>";}
    
  if($ifm=="1"){
    echo "<span>Indian Folk Music</span>";}
    
  if($pfm=="1"){
    echo "<span>Punjabi Folk Music</span>";}
    

       ?></div>
       <div class="actions">
       <span class="ttip" data-ttip="Start artist radio"><button class="other-btn artist-radio icon"></button></span>
       <span class="ttip" data-ttip="Add to favorite"><button class="other-btn artist-addfav icon2"></button></span>
       <button class="playall-btn">Play</button>
       <span class="ttip" data-ttip="Share"><button class="other-btn artist-share icon2"></button></span>
       <span class="ttip" data-ttip="Copy link"><button class="other-btn artist-copylink icon2"></button></span>
       </div>
       </div>
	   </div>     
			<div class="artist-suggestion">
            	<p class="artist-sugg-msg">suggested artists</p>
           			<span class="suggestion-cross-btn"></span>
						<span class="scroll-left">Left</span> 
                    		<span class="scroll-right">Right</span>
            					<div class="suggestion-box"></div>
            </div>
<div class="mf-page-content">              
            			<div class="artist-navigator shad">
                        <ul class="a-nav">
                        <a href="#"><li>Overview</li></a>
                        <a href="#"><li>Songs</li></a>
                        <a href="#"><li>Albums</li></a>
                      <!--  <a href="#"><li class="right">About</li></a>-->
                        <a href="#"><li class="right">Similar artists</li></a>
                        </ul>
						</div>
             <div class="artist-body shad">
          <div class="about">
             													<?php
																if($about !=="")
																{ echo '<div class="info">
																<h1>About</h1>
             													<p>'.$about.'</p>
                                                                <div class="credit_wiki">
                                    							<span>Source: <a href="https://en.wikipedia.org" target="_blank">Wikipedia</a></span>
             													</div>
             													</div>';
             						}else
                                    {
                                               echo  '<div class="artist-info_else">
                                           		 <span>No information available.</span>
                                                 </div>'; }  ?>     
<script>
$('.info p').readmore({ 
speed: 175, 
lessLink: '<a class="moreless" href="javascript:void(0);">Less<i class="_arrow up"></i></a>', 
collapsedHeight:72
});
</script>
             </div>
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
<script>
$(document).ready(function() {
   window.setTimeout("loadasContent();", 5000); //call fade in 3 seconds
 }
)

function loadasContent() {
   //$('.artist-suggestion').delay(450).animate({opacity:1},500);	
   $('.suggestion-box').delay(450).fadeIn(500);
   $('.mf-page-content').animate({'margin-top':'0px'},700);
   $('.suggestion-box').load("mf-artist-suggestive-material.php");
}
/*
function hideasContent() {
	$('.artist-suggestion').delay(200).animate({opacity:0},300);
   $('.mf-page-content').delay(280).animate({'margin-top':'-190px'},700);
}
$('.suggestion-cross-btn').click(function() {
    hideasContent();
});
*/
</script>
<script type="text/javascript">
var BoxCount = 4;
var BoxWidth = 1062;
var ScrollDistance = BoxWidth; //It can be any other value if you like.
var ScrollButtonWidth = 50;

$('.scroll-left').click(function() {
  var current = parseInt($('.suggestion-box').css("margin-left"));
  var end = $(window).width() - BoxWidth;
  var move = ScrollDistance;
  if(current < end){
    if((end - current) < BoxWidth)
      move = end - current;
    $('.suggestion-box').animate({ marginLeft: "+=" + move }, "slow");
  }
  else{
    $('.suggestion-box').animate({ marginLeft: end }, "slow");
  }
 });

$('.scroll-right').click(function() {
  var current = parseInt($('.suggestion-box').css("margin-left"));
  var end = - (BoxWidth * (BoxCount - 1));
  var move = ScrollDistance;
  if(current > end){
    if((current - end) < BoxWidth)
      move = current - end;
    $('.suggestion-box').animate({ marginLeft: "-=" + move }, "slow");
  }
  else{
    $('.suggestion-box').animate({ marginLeft: end }, "slow");
  }
 });
</script>
<script>
function hideasContent() {
	$('.suggestion-box').delay(200).fadeOut(500);
	$('.artist-suggestion').delay(200).animate({opacity:0},400);
   $('.mf-page-content').delay(280).animate({'margin-top':'-220px'},680);
}
$('.suggestion-cross-btn').click(function() {
    hideasContent();
});
</script>  
<style>
.artist-suggestion{height:220px; box-sizing: border-box; padding:20px 0 10px 0; margin-right:5.5%; margin-left:6%;  overflow:hidden; white-space: nowrap; }
.scroll-left{ position:absolute; float:left;}
.scroll-right{ position:relative; float:right;}
.artist-sugg-msg{ padding:0 7px 4px 8px; font-size:12px; text-transform:uppercase; color:#aaa; text-align:left;}
.suggestion-box{height:192px; display:none;}
.suggestion-cross-btn{ position:absolute; top:330px; right:15px; width:35px; height:35px; background-image:url(assets/images/cross-icon-22-1282.png); background-size: cover; cursor:pointer; opacity:.6;}
.suggestion-cross-btn:hover{opacity:1;}
.artist-suggestion li{list-style:none; display:inline-block; border:1px solid #eee; margin:0 5px 0 5px;}
.flwr-user{ width:161px; padding:15px 0; text-align:center; background-color:#fff;}
.flwr-user img{width:70px; height:70px; border-radius:50%; border:1px solid #eee;}
.as-user-name{font-size:14px; padding:9px 0 9px 0; color:#333;}
.action-btn{padding:0;}
.flw-btn_two{width:120px; height:24px; margin:0 auto; border:1px solid #437def; color:#3b71dd; text-transform:uppercase; font-family:"Open Sans", "Lucida Grande", "Helvetica Neue", Helvetica, Arial, Sans-serif; font-size:10px; outline:none; cursor:pointer; border-radius:2px; background:transparent; /*text-shadow:0 -1px 0 #999; box-shadow: 0 1px 3px 0 rgba(0,0,0,.26);*/}
.flw-btn_two:hover{border:1px solid #295abc; color:#295abc;}
</style>
</body>
</html>