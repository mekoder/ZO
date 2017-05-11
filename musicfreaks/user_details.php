<?php
include 'conn.php';
$userssid = base64_decode($_GET['id']);
session_start();
$sid= $_SESSION['sid'];
if($sid == ""){
  echo "Please login.";
  exit();
}



$upplist = $_GET['up'];
if($upplist == "upplist"){
  ?>
 <div class="playlist-container">
                             
<?php
$result11 = "SELECT * FROM playlist WHERE user_uname = '$userssid' AND deleted = 0";
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
            $dp = "assets/images/default-playlist-bg-image.png";
        }
  echo '
    <a href="playlist?plist='.$row["id"].'&'.urlencode($row["plist_name"]).'">
      <div class="playlist-card user-playlist">
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
<?php
        }
?>


<?php
$upfollowers = $_GET['up'];
if($upfollowers == "upfollowers"){
  ?>
<script type="text/javascript" src="followMF.js"></script>
<div class="followers-container">
<?php
$allfollowers = mysqli_query($link, "SELECT * FROM mf_follow WHERE user ='$userssid' AND admin IS NOT NULL");
if(mysqli_num_rows($allfollowers) > 0){
while($row = mysqli_fetch_array($allfollowers)) {
  $notiid = $row['id'];
  $following = $row['admin'];
  $followers = $row['user'];
$followersdetail = mysqli_query($link, "SELECT id, username, fullname, dp, usr_followers FROM musicfreaks_users WHERE username='$following'");
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
    $dp =  "assets/u_dp/$following$userdp.jpg";
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

echo '<div class="flwr-user-card">
                        <a href="u/'.$following.'">
                          <div class="flwr-user-card-dp">
                              <img src="'.$dp.'" />
                            </div>    
                              <div class="flwr-user-card-info">
                              <span class="flwr-user-name">'.$userkanaam.'</span>
                                    <p><span class="card-user-flwrs">'.$myfoll.' Followers</span></p>
                                </div></a>';

$follow_check="SELECT admin, user from mf_follow WHERE admin IS NOT NULL and user='$following' ";
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
  } else{
  echo 'No one is following you.';
}
?>
 </div>
<?php
        }
?>


<?php
$upfollowing = $_GET['up'];
if($upfollowing == "upfollowing"){
  ?>
<script type="text/javascript" src="followMF.js"></script>
<div class="following-container">
<?php
$allfollowers = mysqli_query($link, "SELECT * FROM mf_follow WHERE admin ='$userssid' AND user IS NOT NULL");
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
<?php
        }
?>



<?php
$upabout = $_GET['up'];
if($upabout == "upabout"){
  ?>
<script type="text/javascript" src="followMF.js"></script>
<div class="about-container">
<?php
 echo "Nothing to show... We r thinking to delete this 'about' option..";
?>
 </div>
<?php
        }
?>