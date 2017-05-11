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
   <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js'></script>
    <script type='text/javascript' src='js/dynamicpage.js'></script>
    <script src="js/jquery.ba-hashchange.min.js" type="text/javascript"></script>
<script type="text/javascript" src="followMF.js"></script>

<ul class="u-info">
    <a href="mpplist.php"><li class="mpplist">Playlists</li></a>
  <a href="followers.php"><li class="mpfollowers">Followers</li></a>
  <a href="following.php"><li class="mpfollowing">Following</li></a>
  <a><li class="mpabout">About</li></a>
  <a href="#"><li class="mpnoti right">Notifications</li></a>
  <a href="#"><li class="mpfav right">Favorites</li></a>
    </ul>

<div class="user-body shad"> 
          <div class="content-change">
    <div class="guts">
<div class="following-container">
<?php
$allfollowers = mysqli_query($link, "SELECT * FROM mf_follow WHERE admin ='$sid' AND user IS NOT NULL");
if(mysqli_num_rows($allfollowers) > 0){
while($row = mysqli_fetch_array($allfollowers)) {
  $notiid = $row['id'];
  $following = $row['admin'];
  $followers = $row['user'];
$followersdetail = mysqli_query($link, "SELECT id, username, fullname, dp, usr_followers FROM musicfreaks_users WHERE username='$followers'");
if(mysqli_num_rows($followersdetail) > 0){
while($row = mysqli_fetch_array($followersdetail)) {
  $mfid = $row['id'];
  $username = $row['username'];
  $fullname = $row['fullname'];
  $myfoll = $row['usr_followers'];
  $dp = $row['dp'];
  $userid = $username;
  $userdp = "_dp";
if($dp == "1"){
    $userdp = "_dp";
    $dp =  "assets/u_dp/$followers$userdp.jpg";
      }else{
    $dp = "images/d_up112.png";
  }
if($fullname ==""){
  $userkanaam = ucfirst($username);
}else{
  $userkanaam = ucwords($fullname);
}
    } 
  }

echo '                 <div class="flwr-user-card">
                        <a href="u/'.$followers.'">
                          <div class="flwr-user-card-dp">
                            <img src="'.$dp.'" />
                          </div>    
                          <div class="flwr-user-card-info">
                          <span class="flwr-user-name">'.$userkanaam.'</span>
                                    <p><span class="card-user-flwrs">'.$myfoll.' Followers</span></p>
                                </div>
                                </a>';

$follow_check="SELECT admin, user from mf_follow WHERE admin IS NOT NULL and user='$userid' ";
$user_sql=mysqli_query($link, $follow_check);
$count=mysqli_num_rows($user_sql);
if($count==0){
echo '<div class="flwr-card-actionbtn" id="follow'.$userid.'">
        <button class="flwr-card-follow-btn follow" id="'.$userid.'">Follow</button>
      </div>';
echo '<div class="flwr-card-actionbtn" id="remove'.$userid.'" style="display:none"><button class="flwr-card-unfollow-btn remove" id="'.$userid.'">Following</button></div>';
      } else {
        echo '<div class="flwr-card-actionbtn" id="follow'.$userid.'" style="display:none">
        <button class="flwr-card-follow-btn follow" id="'.$userid.'">Follow</button>
      </div>';
echo '<div class="flwr-card-actionbtn" id="remove'.$userid.'"><button class="flwr-card-unfollow-btn remove" id="'.$userid.'">Following</button></div>';
      }

      echo '</div>';
                
    } 
  }else{
  echo "You're not following anyone.";
}
?>
 </div>