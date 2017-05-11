<?php
include 'error.php';
include 'conn.php';

session_start();
$sid= $_SESSION['sid'];

$smart = $_GET['smart'];
	if($smart !==""){
		echo "";
	}
?>
<link href="//fonts.googleapis.com/css?family=Raleway:100normal,100italic,200normal,200italic,300normal,300italic,400normal,400italic,500normal,500italic,600normal,600italic,700normal,700italic,800normal,800italic,900normal,900italic|Open+Sans:400normal|Lato:400normal|Roboto:400normal|Oswald:400normal|Droid+Sans:400normal|Droid+Serif:400normal|Lobster:400normal|PT+Sans:400normal|Ubuntu:400normal|Playfair+Display:400normal&amp;subset=all" rel="stylesheet" type="text/css">
<style type="text/css">
.playlist-card{position:relative; width:140px; height:210px; display:inline-block; margin:10px 10px 10px 10px; -webkit-box-shadow:0 1px 4px 0 rgba(0,0,0,0.14); box-shadow:0 1px 4px 0 rgba(0,0,0,0.14); font-family:"Open Sans", "Lucida Grande", "Helvetica Neue", Helvetica, Arial, Sans-serif;}
.playlist-card a{text-decoration:none;}
.pl-card-art{position:absolute; top:0; right:0; left:0; width:140px; object-fit:cover; background-color:#f5f5f5;}
.playlist-card-info{position:absolute; bottom:0; left:0; right:0; padding:5px 8px; height:60px;}
h4.playlist-name{margin:0; font-weight:300;
white-space:pre-wrap; overflow:hidden; font-size:15px;}
.create-card-base{position:absolute; bottom:0; left:0; right:0; width:140px; height:70px;}
.create-card-art{padding:100px 0 20px 0; font-size:14px; font-weight:600; color:#888; text-align:center;}
.create-card-art span{display:block;}
.create-playlist{cursor:pointer;}
.linea-icons{font-family: "linea"; font-weight:normal; font-style:normal; font-size:25px;}
.playlist-icon:before{content: "\e03b";}
</style>
<div class="playlist-container">
            <div class="playlist-card create-playlist">
                            <div class="create-card-art pl-card-art">
                            	<span class="linea-icons playlist-icon"></span>
                                	<span>+ Create Playlist</span>
                            </div>
                                <div class="create-card-base"></div>
            </div>
<?php 

$result = "SELECT * FROM playlist WHERE user_uname = '$sid' AND deleted = 0";
$result2 = $conn->query($result);
if ($result2->num_rows > 0) {
     while($row = $result2->fetch_assoc()) {
	 
	$plist_id= $row['id'];
	$plist_name=$row['plist_name'];
	$user_id=$row['user_id'];
    $user_uname=$row['user_uname'];
    $plist_date=$row['plist_date'];
    $privacy=$row['privacy'];
	
	 $dp = $row['plist_dp'];
	if($dp == '1'){
            $dp = "assets/plist_dp/".$user_id."_".$user_uname."_".$plist_name."_".$plist_id.".jpg";
        }else {
            $dp = "assets/images/default-playlist-bg-image.png";
        }	
	echo '';
	echo '
    	<div class="playlist-card user-playlist">
            	<img class="pl-card-art" src="'.$dp.'" data-adaptive-background="1" />
            		<div class="playlist-card-info">
                    	<a href="playlist?plist='.$row["id"].'?'.$row["plist_name"].'"><h4 class="playlist-name">'.ucfirst($row["plist_name"]).'</h4></a>
                    </div>
        </div>
    ';
	
}
} else{
	echo 'No playlist created by <b>'.$sid.'</b> or it maybe private';
}

?>
</div>
<script src="js/adaptive-backgrounds.js"></script>
<script>AdaptiveBackgrounds();</script>
<script type="text/javascript">
var rgb = $('.playlist-card').css('background-color').replace('rgb(', '').replace(')','' ).split(',').map(Number);
 var o = Math.round(((rgb[0] * 299) + (rgb[1] * 587) + (rgb[2] * 114)) /1000);
 if(o > 125) {
   $('.playlist-card > playlist-card-info > a').css('color', 'rgb(0,0,0)');
 } else {
   $('.playlist-card > playlist-card-info > a').css('color', 'rgb(255,255,255)');
 }
</script>   
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>    