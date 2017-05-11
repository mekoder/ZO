<?php
include ('error.php');
session_start();
$sid= $_SESSION['sid'];
$userssid = $_SESSION['userssid'] = $_GET['user'];
if ($sid=="" ){
    $followid="banda logged in hai";
  }
  else
  {   $followid="";
    $same_name= strtolower($userssid);
        $same_name2= strtolower($sid);
    if ($same_name== $same_name2)
    
    {
      header("location:myprofile");
      }
    }
?>
<?php
include('conn.php');
$users= $_GET['user'];
$userssid= strtolower ($userssid);
$sql = "SELECT * from musicfreaks_users where username='$userssid'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
     while($row = $result->fetch_assoc()) {
     
  $sid2= $row['username'];
   $following=$row['usr_following'];
   $followers=$row['usr_followers'];
   
     }
 }else
  { 
    header("location:/musicfreaks/myprofile");
    }
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<base href="//localhost/musicfreaks/" />
<link rel="stylesheet" href="style.css" />
<link rel="stylesheet" href="prof-mf-css-jk786.css" />
<link rel="stylesheet" href="footer.css" />
<link rel="icon" type="image/png" href="images/mf-favicon1.png">
<link href="//fonts.googleapis.com/css?family=Raleway:100normal,100italic,200normal,200italic,300normal,300italic,400normal,400italic,500normal,500italic,600normal,600italic,700normal,700italic,800normal,800italic,900normal,900italic|Open+Sans:400normal|Lato:400normal|Roboto:400normal|Oswald:400normal|Droid+Sans:400normal|Droid+Serif:400normal|Lobster:400normal|PT+Sans:400normal|Ubuntu:400normal|Playfair+Display:400normal&amp;subset=all" rel="stylesheet" type="text/css">
<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js'></script>
<script type="text/javascript" src="followMF.js"></script>
<title><?php echo ucfirst($userssid);?></title>
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
<section id="user-page">
  <div class="profile-cover">
                  <div class="blur-bg" style=" background:url('<?php  
                                   $sql5 = "SELECT dp from musicfreaks_users where username = '$users'";
                                    $result5 = mysqli_query($conn, $sql5);  
                                    if(mysqli_num_rows($result5) > 0)   
                                      {  
                                         while($row = mysqli_fetch_array($result5))  
                                          {     
                                          $dpusername=$row["dp"];
                                         }
                                      } 
                                      if ($dpusername !=="")
                                               {
                                                   $userdp = "_dp";
                                                    echo "assets/u_dp/$users$userdp.jpg";
                                                }   
                                                 else
                                                       {
                                                         echo "assets/images/default-usercover.png";
                                                        }

                                     ?>') center center / 120%; -webkit-filter:blur(<?php 
                                   $sql5 = "SELECT dp from musicfreaks_users where username = '$users'";
                                    $result5 = mysqli_query($conn, $sql5);  
                                    if(mysqli_num_rows($result5) > 0)   
                                      {  
                                         while($row = mysqli_fetch_array($result5))  
                                          {     
                                          $dpusername=$row["dp"];
                                         }
                                      } 
                                      if ($dpusername !=="")
                                               {
                                                   $userdp = "_dp";
                                                    echo "50px";
                                                }   
                                                 else
                                                       {
                                                         echo "0px";
                                                        }

                                     ?> ); filter:blur( <?php 
                                   $sql5 = "SELECT dp from musicfreaks_users where username = '$users'";
                                    $result5 = mysqli_query($conn, $sql5);  
                                    if(mysqli_num_rows($result5) > 0)   
                                      {  
                                         while($row = mysqli_fetch_array($result5))  
                                          {     
                                          $dpusername=$row["dp"];
                                         }
                                      } 
                                      if ($dpusername !=="")
                                               {
                                                   $userdp = "_dp";
                                                    echo "50px";
                                                }   
                                                 else
                                                       {
                                                         echo "0px";
                                                        }

                                     ?>); -moz-filter:blur(<?php  
                                   $sql5 = "SELECT dp from musicfreaks_users where username = '$users'";
                                    $result5 = mysqli_query($conn, $sql5);  
                                    if(mysqli_num_rows($result5) > 0)   
                                      {  
                                         while($row = mysqli_fetch_array($result5))  
                                          {     
                                          $dpusername=$row["dp"];
                                         }
                                      } 
                                      if ($dpusername !=="")
                                               {
                                                   $userdp = "_dp";
                                                    echo "50px";
                                                }   
                                                 else
                                                       {
                                                         echo "0px";
                                                        }

                                     ?>); -ms-filter:blur(<?php 
                                   $sql5 = "SELECT dp from musicfreaks_users where username = '$users'";
                                    $result5 = mysqli_query($conn, $sql5);  
                                    if(mysqli_num_rows($result5) > 0)   
                                      {  
                                         while($row = mysqli_fetch_array($result5))  
                                          {     
                                          $dpusername=$row["dp"];
                                         }
                                      } 
                                      if ($dpusername !=="")
                                               {
                                                   $userdp = "_dp";
                                                    echo "50px";
                                                }   
                                                 else
                                                       {
                                                         echo "0px";
                                                        }

                                     ?>);"></div>
                </div>
<div class="u_overlay">
<div class="usrinfo-jk">
	<div class="section-dp_name">
        <img class="usr-dpic" src="<?php  
                                           $sql5 = "SELECT dp from musicfreaks_users where username = '$users'";
                                            $result5 = mysqli_query($conn, $sql5);  
                                            if(mysqli_num_rows($result5) > 0)   
                                              {  
                                                 while($row = mysqli_fetch_array($result5))  
                                                  {     
                                                  $dpusername=$row["dp"];
                                                 }
                                              } 
                                              if ($dpusername !=="")
                                                       {
                                                           $userdp = "_dp";
                                                            echo "assets/u_dp/$users$userdp.jpg";
                                                        }   
                                                         else
                                                               {
                                                                 echo "images/d_up112.png";
                                                                }
        
                                             ?>" />
         <div class="usr-name"><?php /*fetch first and lastname of loged In user*/
        $sql = "SELECT fullname from musicfreaks_users where username = '$users'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()){
            $fullname = $row['fullname'];
          }
        } 
        if ($fullname !==""){
        echo $fullname;
        }
        else echo ucfirst ($users); 
        $conn->close
        (); ?><?php
        $sel=mysqli_query($link,"SELECT * from v_user where verified='$users'");
         if(mysqli_num_rows($sel)>=1){
            include ("verified.php");
            }   
             else
              {
                echo"";
                  }
        ?></div>
	</div> 
    	<div class="section-user_details"> 
            <div class="flw-uflw-info">
            <div class="usr-following">
            <div id="fol-num">
            <?php 
            $result2 = mysqli_query($link, "SELECT admin FROM mf_follow WHERE admin='$users' AND user IS NOT NULL");
            $num_rows2 = mysqli_num_rows($result2);
            
            echo "$num_rows2";?></div>
            <div id="fol-text">following</div>
            </div>
            	<div class="usr-follower">
				  <?php
                  $result3 = mysqli_query($link, "SELECT user FROM mf_follow WHERE user='$users' AND admin IS NOT NULL");
                  $num_rows3 = mysqli_num_rows($result3); ?>
                <div id="fol-num" class="folnum"><?php echo $num_rows3; ?></div>
                <script>
                    $(document).ready(function(){
                  $(".follow , .remove").click(function() {
                    $(".remove , .follow").css("cursor","no-drop");
                    $('.remove , .follow').prop('disabled', true);
                      $.ajax( {type:'GET', url:'add_follow_userMF.php?user=<?php echo($users); ?>',success:function(response) {
                        var mytrim = (response);
                        $('.folnum').html(mytrim.trim());
                        $('.remove , .follow').prop('disabled', false);
                        $(".remove , .follow").css("cursor","pointer");
                        
                      }
                      } )
                    
                  })
                })
                </script>
                <div id="fol-text">followers</div>
                </div>
                <div class="usr-playlists">
				 <div id="pl-num" class="plnum">
				 <?php 
         $result4= mysqli_query($link, "SELECT COUNT(user_uname) as 'totalplist' FROM playlist WHERE user_uname = '$userssid' AND deleted = 0");
            if(mysqli_num_rows($result4) > 0 ){
              while($row = mysqli_fetch_array($result4)) {
              $totalplist = $row['totalplist'];
                } 
            }

         echo $totalplist; ?>
                 </div>
                 <div id="pl-text">playlists</div>
            	 </div>
            </div>
            	<div id="sep_"></div>
            <?php
            if($followid =="banda logged in hai")
              {
                echo " <a href='login?u=$users' > <button class='flw-btn' >Follow</button></a>";
              }
              else
              {
            /*$command=mysqli_query($link, "SELECT * from musicfreaks_users where username='$users'");
            while($data=mysqli_fetch_row($command))
            {
              */
            
            $userid = $users;
            
            // }
            
            $follow_check="SELECT admin, user from mf_follow WHERE admin='$sid' and user='$userid' ";
            //$userid = base64_encode($userid);
            $user_sql=mysqli_query($link, $follow_check);
            $count=mysqli_num_rows($user_sql);
            if($count==0)
            {
echo "<div id='follow$userid'><a class='follow' id='$userid'><button class='flw-btn'><span>Follow</span></button></a></div>";

echo"<div id='remove$userid' style='display:none'>  <a class='remove' id='$userid'><button class='unflw-btn'><span>Following</span></button></a></div>";
}
else
{
echo "<div id='follow$userid' style='display:none'><a class='follow' id='$userid'><button class='flw-btn'><span>Follow</span></button></a></div>";

echo"<div id='remove$userid'><a  class='remove' id='$userid'><button class='unflw-btn'><span>Following</span></button></a></div>";
}
            }
            ?>
            			<div class="user-details_more">
                        	<span class="circle-shape"></span>
                        </div>
</div>
	</div>
</div>

  <div class="u-infobar shad">
  <ul class="u-info">
  <a><li class="upplist">Playlists</li></a>
  <a><li class="upfollowers">Followers</li></a>
  <a><li class="upfollowing">Following</li></a>
  <a><li class="right">Favorites</li></a>
  </ul>
  </div>
    <div class="user-body shad">
    </div>

<script>
//==================================================================================================
        $(document).ready(function() {
            $(".upplist").click(function(){
                   $.ajax({
                       type:'GET', url:'user_details.php?up=upplist&id=<?php echo base64_encode($userssid);?>',success:function(response){
                        $('.user-body').html(response);
                       }
                           })
                })

            $(".upfollowers").click(function(){
                   $.ajax({
                       type:'GET', url:'user_details.php?up=upfollowers&id=<?php echo base64_encode($userssid);?>',success:function(response){
                        $('.user-body').html(response);
                       }
                           })
                })

            $(".upfollowing").click(function(){
                   $.ajax({
                       type:'GET', url:'user_details.php?up=upfollowing&id=<?php echo base64_encode($userssid);?>',success:function(response){
                        $('.user-body').html(response);
                       }
                           })
                })

            $(".upabout").click(function(){
                   $.ajax({
                       type:'GET', url:'user_details.php?up=upabout&id=<?php echo base64_encode($userssid);?>',success:function(response){
                        $('.user-body').html(response);
                       }
                           })
                })


            })
//===================================================================================================================
    </script>
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
</body>
</html>