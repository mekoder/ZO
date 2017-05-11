<?php
//include "error.php";
include 'conn.php';
session_start();
include 'session.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href='https://fonts.googleapis.com/css?family=Product+Sans' rel='stylesheet' type='text/css'>
<link href="//fonts.googleapis.com/css?family=Raleway:100normal,100italic,200normal,200italic,300normal,300italic,400normal,400italic,500normal,500italic,600normal,600italic,700normal,700italic,800normal,800italic,900normal,900italic|Open+Sans:400normal|Lato:400normal|Roboto:400normal|Oswald:400normal|Droid+Sans:400normal|Droid+Serif:400normal|Lobster:400normal|PT+Sans:400normal|Ubuntu:400normal|Playfair+Display:400normal&amp;subset=all" rel="stylesheet" type="text/css">
<link rel="icon" type="image/png" href="images/mf-favicon1.png">
<link rel="stylesheet" href="style.css" type="text/css"/>
<link rel="stylesheet" href="playlist-mf-css-jk786.css" />
<link rel="stylesheet" href="footer.css" />
<script src="js/jquery.form.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<title>Playlist name</title>
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
   <?php
    $plisttitle = "Make Playlist Private";
	$favoritetitle ="Add to Favorites";
	$user_uname = " (**)&)*&U(*U(*/--*+*-/)(*( ";
    $privacy = '1';
    $favoritestyle = "";
    $plist = $_GET['plist'];
    $result1 = "SELECT * from playlist_favorite WHERE plist_id= '$plist' AND my_id = (SELECT ID from musicfreaks_users where username = '$sid' )";
    $result1 = $conn->query($result1);
    if ($result1->num_rows > 0) {
		$favoritetitle ="Remove from Favorites";
        $favoritestyle = "<style type='text/css'>
			.add-fav-btn {background-position: -24px -22px;}
        </style>";
    }


    $result = "SELECT * FROM playlist WHERE id = '$plist' AND deleted = 0";
    $result2 = $conn->query($result);
    if ($result2->num_rows > 0) {
     while($row = $result2->fetch_assoc()) {
         
    $user_uname=$row['user_uname'];
    $plist_id = $row['id'];
    $privacy=$row['privacy'];
    $dp = $row['plist_dp'];
    $plist_name=$row['plist_name'];
    $user_id= $row['user_id'];
    if($privacy == '1'){
		$plisttitle = "Make Playlist Public";
        $lock = '<style type="text/css"> 
					.lock-btn {background-position: -141px -22px;}
                    </style>';
        }else {
            $lock = ""; }
            
        if($dp == '1'){
            $dp = "assets/plist_dp/".$user_id."_".$user_uname."_".$plist_name."_".$plist_id.".jpg";
        }else {
            $dp = "assets/images/noPhotoPlaylist_bg.png";
        }
      }
} elseif ($plist = $_GET['plist']) {
   $result = "SELECT * FROM playlist WHERE plist_name = '$plist' AND deleted = 0";
    $result2 = $conn->query($result);
    if ($result2->num_rows > 0) {
     while($row = $result2->fetch_assoc()) {
         
    $user_uname=$row['user_uname'];
    $plist_id = $row['id'];
    $privacy=$row['privacy'];
    $dp = $row['plist_dp'];
    $plist_name=$row['plist_name'];
    $user_id= $row['user_id'];
    if($privacy == '1'){
		$plisttitle = "Make Playlist Public";
        $lock = '<style type="text/css">
					.lock-btn {background-position: -140px -22px;}
                    </style>';
        }else {
            $lock = ""; }
            
        if($dp == '1'){
            $dp = "assets/plist_dp/".$user_id."_".$user_uname."_".$plist_name.".jpg";
        }else {
            $dp = "assets/images/noPhotoPlaylist_bg.png";
        }
      }
}
}
else {
    $user_uname = "(**)&)*&U(*U(*/--*+*-/)(*(";
    $privacy = '1';
    }
?>
<section id="albums-page">
		<div class="playlist-header">
        		
                                               <?php
                                               echo $favoritestyle;
                                               
                                                if($user_uname !== $sid && $privacy == '1'){
                                                ?>
                                                <div class="playlist-info">
                                                <h1 class="playlist-title" style="color:black;">THIS PLAYLIST IS PRIVATE OR YOU DON'T HAVE PERMISSION TO SEE THIS.</h1>
                                                </div>
                                                
                                                <?php }
												  elseif($sid == ""){
												?>
                                                <div class="playlist-bg">
                                                	<div class="playlist-blur-bg" style="background:url('<?php echo $dp; ?>') center center / 120%;"></div>
                                                </div>
                                                    <div class="playlist-overlay">
                                                        <div class="playlist-art">
                                                            <img class="playlist-art-img" src="<?php echo $dp; ?>"/>
                                                        </div>
                                                <div class="playlist-info">
                                                <h1 class="playlist-title"><?php echo ucfirst($plist_name); ?></h1>
                                                <p class="playlist-subtitle">Created by <a href="u/<?php echo $user_uname; ?>">
												<?php echo ucfirst($user_uname); ?> </a> | 50 Tracks</p>
                                                <!--<p class="playlist-trackinfo">20 songs | 37:28</p>-->
                                                </div>

                                              <div class="action-buttons2">
                                              	<button class="playall-btn">play</button>
                                                <button class="pl-btn add-fav-btn gz-icons" id="favorite" title="<?php echo $favoritetitle; ?>"></button>
                                                <button class="pl-btn share-btn gz-icons" title="Share"></button>
                                                <button class="pl-btn downloadpl-btn gz-icons" title="Download"></button>
                                                <button class="pl-btn moreopt-btn gz-icons"></button>
                                                <div id="moreOptions" class="moreOptions-content">
                                                  <a><!--<i class="icon2 share-icon"></i>--> <span>Share</span></a>
                                              	  <a><!--<i class="icon2 report-icon"></i>--> <span>Report</span></a>
                                                </div>
                                              </div>


                                                    <?php } elseif($sid !== $user_uname)
                                                    {
                                                    ?>
                                                    <div class="playlist-bg">
                                                		<div class="playlist-blur-bg" style="background:url('<?php echo $dp; ?>') center center / 120%;"></div>
                                                	</div>
                                                    <div class="playlist-overlay">
                                                        <div class="playlist-art">
                                                            <img class="playlist-art-img" src="<?php echo $dp; ?>"/>
                                                        </div>
                                                <div class="playlist-info">
                                                <h1 class="playlist-title"><?php echo ucfirst($plist_name); ?></h1>
                                                <p class="playlist-subtitle">Created by <a href="u/<?php echo $user_uname; ?>">
												<?php echo ucfirst($user_uname); ?></a> | 50 Tracks</p>
                                                <!--<p class="playlist-trackinfo">20 songs | 37:28</p>-->
                                                </div>


                                          <div class="action-buttons2">
                                            	<button class="playall-btn">play</button>
                                                <button class="pl-btn add-fav-btn gz-icons" id="favorite" title="<?php echo $favoritetitle; ?>"></button>
                                                <button class="pl-btn share-btn gz-icons" title="Share"></button>
                                                <button class="pl-btn downloadpl-btn gz-icons" title="Download"></button>
                                                <button class="pl-btn moreopt-btn gz-icons"></button>
                                                <div id="moreOptions" class="moreOptions-content">
                                                  <a><!--<i class="icon2 share-icon"></i>--> <span>Share</span></a>
                                              	  <a><!--<i class="icon2 report-icon"></i>--> <span>Report</span></a>
                                                </div>
                                          </div>

                                                 
                                                  <?php   } elseif($sid == $user_uname){
                                                        ?>
                                                <div class="playlist-bg">
                                                	<div class="playlist-blur-bg" style="background:url('<?php echo $dp; ?>') center center / 120%;"></div>
                                                </div>
                                                    <div class="playlist-overlay">
                                                        <div class="playlist-art">
                                                            <img class="playlist-art-img" src="<?php echo $dp; ?>"/>
                                                        </div>
                                                        <div class="playlist-info">
                                                        <h1 class="playlist-title"><?php echo ucfirst($plist_name); ?></h1>
                                                        <p class="playlist-subtitle">Created by <a href="myprofile">
														<?php echo ucfirst($user_uname); ?></a> | 50 Tracks</p>
                                                        <!--<p class="playlist-trackinfo">20 songs | 37:28</p>-->
                                                        </div>

                                             <div class="action-buttons"> 
                                             	<button class="playall-btn">play</button>
                                                <button id="edit-playlist-btn" class="edit-playlist-btn">edit</button>
                                                <div class="func-btns">
                                                	<button class="pl-btn add-fav-btn gz-icons" id="favorite" title="<?php echo $favoritetitle; ?>"></button>
                                                    <button class="pl-btn share-btn gz-icons" title="Share"></button>
                                                    <?php echo $lock; ?>
                                                    <button id="plistlock" class="pl-btn lock-btn gz-icons" title="<?php echo $plisttitle; ?>"></button>
                                                    <button id="plistdelete" class="pl-btn delete-btn gz-icons" title="Delete Playlist"></button>
                                                </div>
                                            </div>
                                                
                                                        <?php
                                                    } 
                                                    ?>
                                                                                                                                        </div>
        </div>
<span id="copyTarget" style="display:none;"><?php $plistlink = $_SERVER["PHP_SELF"].'?plist='.$plist; echo $plistlink;?></span>
<!-- ///////////////////CODE FOR ALL PLAYLIST BUTTON FROM HERE\\\\\\\\\\\\\\\\\\\\\ -->
<div class="share_popboxresult"></div>
<div class="confirm-delete"></div>
<div class="plistresult" id="plistresult"></div>
<div class="favoriteresult" id="favoriteresult"></div>
<div class="lockresult" id="lockresult"></div>
<div id="copyresult" class="copyresult"></div>
<style type="text/css">
.plistresult, .favoriteresult, .lockresult, .copyresult{padding:8px 16px 8px 33px; background-color:#40a5fb; right:40px; bottom:-70px; color:#fff; font-size:14px; font-family:"Open Sans", "Lucida Grande", "Helvetica Neue", Helvetica, Arial, Sans-serif; position:fixed; z-index:9999; display:none;  -webkit-box-shadow:0 1px 4px 0 rgba(0,0,0,0.24); box-shadow:0 1px 4px 0 rgba(0,0,0,0.24); background-image:url(assets/images/white-tick15x15.png); background-position:13px 11px; background-repeat:no-repeat;}
</style>
<script>
        $(document).ready(function() {
            $("#favorite").click(function(){
                   $.ajax({
                       type:'GET', url:'playlist_favorite.php?favoriteme=<?php echo $plist_id; ?>',success:function(response){
                        $('.favoriteresult').html(response);
                        $(".favoriteresult").css("display","block").animate({'bottom':'46px'},450);
                        $("#favoriteresult").delay(1500).animate({'bottom':'-70px'},450).fadeOut(200);
                       }
                           })
                })
            });
</script>
<script>/*
		$(document).ready(function(e) {
            $('#favorite').click(function(){
				setTimeout(
            function() {
                $('.share-btn').click();
            },
            1800);
				});
        });*/
</script>
<script>
        $(document).ready(function() {
            $("#plistlock").click(function(){
                   $.ajax({
                       type:'GET', url:'playlist_favorite.php?plistlock=<?php echo $plist_id; ?>',success:function(response){
                        $('.lockresult').html(response);
                        $(".lockresult").css("display","block").animate({'bottom':'46px'},450);
                        $("#lockresult").delay(1500).animate({'bottom':'-70px'},450).fadeOut(200);
                       }
                           })
                })
            })
    </script>        

             	<div class="playlist-body shad">
            	<div class="trackinfo-bar">
                	<ul>
                    	<li class="column-1">#</li>
                        <li class="column-2">track</li>
                        <li class="column-3">artist</li>
                        <li class="column-4">album</li>
                        <li class="column-5">time</li>
                    </ul>
                </div>
                	<div class="tracks">
                    	<div class="track">
                        	<ul>
                                <li class="column-1">1</li>
                                <li class="column-2">Sanam teri kasam</li>
                                <li class="column-3">Arijit Singh</li>
                                <li class="column-4">Sanam Teri Kasam</li>
                                <li class="column-5">4:10</li>
                        	</ul>
                        </div>
                        <div class="track2">
                        	<ul>
                                <li class="column-1">2</li>
                                <li class="column-2">Main hoon hero tera</li>
                                <li class="column-3">Salman Khan</li>
                                <li class="column-4">Hero</li>
                                <li class="column-5">3:50</li>
                        	</ul>
                        </div>
                        <div class="track">
                        	<ul>
                                <li class="column-1">3</li>
                                <li class="column-2">Tu meri janat</li>
                                <li class="column-3">Pata nahi kon tha</li>
                                <li class="column-4">Unreleased but leaked</li>
                                <li class="column-5">5:50</li>
                        	</ul>
                        </div>
                    </div>
            </div>
</section>
</div>
</div>
<!--//////////////////// SHARE PLAYLIST CODE FROM HERE//////////////////-->

<script type="text/javascript">
$(document).ready(function() {
  $(".share-btn").click(function() {
          $.ajax({
			  type:'GET', url:'share_popup.php?url=<?php echo $_GET['plist']."&name=". urlencode($plist_name); ?>',success:function(response){
				  $(".share_popboxresult").html(response);
				  $('.share-overlay_black').fadeIn(200);
				  $('.share-popbox').addClass('moveUp');
           }
         })
      })
});
</script>


<!--///////////////////DELETE CONFIRM POPUP\\\\\\\\\\\\\\\\\\\\\-->    
    
<script type="text/javascript">
$(document).ready(function() {
  $(".delete-btn").click(function() {
          $.ajax({
			  type:'GET', url:'confirm-box.php?url=<?php echo $_GET['plist']."&name=". urlencode($plist_name); ?>',success:function(response){
				  $(".confirm-delete").html(response);
				  $('.confirm-overlay_black').fadeIn(200);
				  $('.confirm-box').addClass('moveUp');
           }
         })
      })
});
</script>


<!--///////////////////EDIT PLAYLIST CODE FROM HERE\\\\\\\\\\\\\\\\\\\\\-->

<div class="editpl-modal-overlay js-modal-close"></div>
    <div id="edit-popup" class="edit-modal-box">
        <div class="edit-playlist">
            <header class="edit-playlist-header">
                <span>Edit Playlist</span>
            </header>
                <div class="edit-playlist-body">
                    <p class="edit-playlist-title">Playlist name</p>     
                        <input type="text" class="edit-pl-name" id="edit-pl-name" value="<?php echo ucfirst($plist_name); ?>" />
                            <div class="editpl-empty-name" id="editpl-empty-name" style="color:rgba(255,65,65,0.9); font-size:14px; padding:3px 0;">
                            &nbsp;
                            </div>
                </div>

                    <form enctype="multipart/form-data" action="image_upload_demo_submit.pp" method="post" name="edit-image_upload_form" id="edit-image_upload_form">
                        <div class="edit-pl-img">
                            <div id="editpl-imgArea">
                                <img src="<?php echo $dp;  ?>" id="editpl-currdp">
                            </div>
                                <input type="file" accept="image/*" name="edit-image_upload_file" class="edit-pl-image" id="edit-image_upload_file">
                                    <div class="editpl-icon_bg">
                                        <i class="cpl-icons2 edit-pl-photo" id="editpl-cplPhoto"></i>
                                            <div class="editpl-percent" id="editpl-percent"></div>
                                    </div>
                        </div>
                    </form>
                        <div class="editpl-progressBar">
                            <div class="editpl-bar">
                                <img class="editpl-loader" src="assets/images/20x20-load.gif" />
                            </div>
                        </div>
                            <div class="edit-playlist-footer">
                                <button class="save-edit-playlist">save</button>
                                <button class="cancel-edit-playlist">leave</button>
                            </div>
        </div>
    </div>

<!-- //////////////////EDIT PLAYLIST CODE END HERE\\\\\\\\\\\\\\\\\\\\\\\\ -->

<style type="text/css">
.editpl-modal-overlay { position: fixed; top: 0; left: 0; z-index: 5600; width: 100%; height: 100%; background: rgba(40,40,40,.5) !important; display:none;}
.edit-modal-box { font-family:'Raleway' !important; display:none; width:400px; position:fixed; top:800px; left:35%; z-index: 5700; background: white; box-shadow: 0 8px 10px 1px rgba(0,0,0,0.12),0 3px 14px 2px rgba(0,0,0,0.12),0 5px 5px -3px rgba(0,0,0,0.12);}

.edit-playlist-header{ height:36px; background-image:url(assets/images/edit_playlist-bg.jpg); padding: 3.2em 1.5em 0 1.5em;}
.edit-playlist-header span{font-size: 18px; color: #555; font-weight:600;}
.edit-playlist-body{padding: 1.5em 1.5em 0 1.5em;}
.edit-playlist-footer{padding: .5em 1.5em 1em 1.5em; text-align: right;}
.save-edit-playlist{width:90px; height:33px; background-color:#5d93fe; border:none; border-radius:3px; color:#fff; font-size:12px; cursor:pointer; outline:none; box-shadow:0 2px 5px 0px rgba(0,0,0,.26); font-weight:600; font-family:'Raleway' !important; text-transform:uppercase; margin-right:3px;}
.save-edit-playlist:hover{}
.cancel-edit-playlist{width:90px; height:33px; background-color:#eee; border-radius:3px; border:none; font-size:12px; font-weight:700; cursor:pointer; color:#555; outline:none; font-family:'Raleway' !important; text-transform:uppercase;}
.cancel-edit-playlist:hover{}s
.edit-pl-name{width:65%; padding:9px 10px; outline:none; font-size:15px; border:none; background-color:#eee; color:#666; font-family:arial; border-radius:4px;}
.edit-pl-name:focus{}
p.edit-playlist-title{ font-family:Arial, Helvetica, sans-serif; font-size:15px; color:#777; padding-bottom:5px; margin-top:17px;}
.edit-pl-img{ float:right; position:absolute; top:122px; left:294px; width:80px; height:80px; border-radius:4px;}
input[name="image_upload_file"]{visibility:hidden; display:none; width:23px;}
.edit-pl-photo:before{ display:block; content:"\e90f"; font-size:15px; cursor:pointer;}
.edit-pl-photo:hover:before{ color:#000;}
span.selected{ display:block; color:#4cd964; font-size:11px; font-weight:600; visibility:hidden; position:relative; top:13px; left:3px;}
.edit-pl-photo{position: absolute; padding:12px; cursor:pointer; background-color:rgba(255,255,255,.9); border-radius:50%; top:19px; left:20px; color:#222; box-shadow:0 2px 3px rgba(0,0,0,.1);}
.edit-pl-photo:hover{box-shadow:0 2px 3px rgba(0,0,0,.2);}
#editpl-imgArea{/*display: none;*/ background-color:#d8d8d8; border-radius:4px;}
#editpl-imgArea img{width: 80px; height: 80px;}
.editpl-icon_bg { width: 80px; height: 80px; position: absolute; top:0px;}
.editpl-icon_bg:hover {background-color: rgba(255,255,255,0);}

#edit-cplPhoto {}
#editpl-percent{display:none;}
.icon_bg:hover #editpl-cplPhoto{display:block;}
.icon_bg:hover #editpl-percent{display:block;}


.editpl-progressBar { right: 55px; position: absolute; top: 152px; display: none;}
.editpl-progressBar .editpl-percent{
display: inline-block;
left: 0;
position: absolute;
text-align: center;
top: -37px;
width: 100%;
visibility: ;
}

.editpl-percent{float: right; margin: 4px 4px; cursor: pointer; width: 8px; padding: 3px; height: 8px; border-radius: 50%; background-color: rgba(255,255,255,1); background-image: url(assets/images/close_btn3.png); background-repeat: no-repeat; background-position: 4px 4px; background-size: 48%; box-shadow:0 1px 2px rgba(0,0,0,.2);}
/*.loader { animation:spinner 1s linear infinite; -webkit-animation:spinner 1s linear infinite;}
@keyframes spinner{to {transform:rotate(360deg);} }
@-webkit-keyframes spinner{to {-webkit-transform:rotate(360deg);} }
*/
</style>




<?php 
include ("artists-div.php");
?>
<?php
include ("footer.php");
?>
<!-- <script src="js/jquery.sticky.js"></script>
<script>
$('.action-buttons').sticky({
  topSpacing:44
});
</script>
<script>
 $(window).scroll(function(){
      if ($(this).scrollTop() > 350	) {
		  $(".back-btns-bg").css({opacity: 1, visibility: "visible"}).animate({opacity: 1}, 350);
		  $(".back-btns-overlay").css("background-color","rgba(0,0,0,.8)");
      } else {
           	  $(".back-btns-bg").css({opacity: 1, visibility: "hidden"}).animate({opacity: 1}, 350);
			  $(".back-btns-overlay").css("background-color","rgba(0,0,0,0)");
      }
  });
</script> -->
<script>
$(document).ready(function() {

var removeClass = true;
$(".moreopt-btn").click(function () {
    $(".moreOptions-content").toggleClass('display');
	$(".moreOptions-content").toggleClass('mslideup');
    removeClass = false;
});

$(".moreOptions-content").click(function() {
    removeClass = false;
});

$("html").click(function () {
    if (removeClass) {
        $(".moreOptions-content").removeClass('display');
		$(".moreOptions-content").removeClass('mslideup');
    }
    removeClass = true;
});


});
</script> 
<script type="text/javascript" src="js/edit-playlist-js.js"></script>

</body>
</html>