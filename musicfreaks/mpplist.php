<?php
include 'conn.php';
session_start();
$sid= $_SESSION['sid'];
if($sid == ""){
  echo "Please login.";
  exit();
}

//$mpplist = $_GET['mp'];
//if($mpplist == "mpplist"){
  ?>
  <!-- <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js'></script>
    <script type='text/javascript' src='js/dynamicpage.js'></script>
    <script src="js/jquery.ba-hashchange.min.js" type="text/javascript"></script> 
    
	<ul class="u-info">
  <a href="mpplist.php"><li class="mpplist">Playlists</li></a>
  <a href="followers.php"><li class="mpfollowers">Followers</li></a>
  <a href="following.php"><li class="mpfollowing">Following</li></a>
  <a href="#"><li class="mpnoti right">Notifications</li></a>
  <a href="#"><li class="mpfav right">Favorites</li></a>
    </ul>

<div class="user-body shad"> 
          <div class="content-change">
    <div class="guts">
-->
 <div class="playlist-container">
                    <h3 class="main-container-heading">Playlists</h3>
                            <div class="playlist-card create-playlist">
                                 <div class="create-card-art">
                                 	<span class="add-icon">+</span>
                                 	<span>Create Playlist</span>
                                 </div>
                            </div>
                            
<?php
$result11 = "SELECT * FROM playlist WHERE user_uname = '$sid' AND deleted = 0";
$result22 = mysqli_query($conn, $result11);
if (mysqli_num_rows($result22) > 0) {
while($row = mysqli_fetch_array($result22)){
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
            $dp = "assets/images/noPhotoPlaylist_bg.png";
        }
  echo '
    <a class="playlist-link" href="playlist?plist='.$row["id"].'&'.urlencode($row["plist_name"]).'">
      <div class="playlist-card user-playlist">
	  <div class="playlist-overlay-btn">
	  <span class="play-now olay-btn-design"></span>
	  <span class="share-now olay-btn-design"></span>
	  <span class="tracks-count">50 Tracks</span>
	  </div>
        <img class="pl-card-art" src="'.$dp.'" />
          <div class="playlist-card-info">
            <h4 class="playlist-name">'.ucfirst($row["plist_name"]).'</h4>
          </div>
      </div>
    </a>
    ';
  }
} else{
  echo "You haven't created any playlist.";
}

?>
</div>
<!--
</div>
</div> -->
