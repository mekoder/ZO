<?php
//include ('error.php');
include('conn.php');
session_start();
$sid= $_SESSION['sid'];

if($sid==""){
	header("location:login");
	}
 else { 
	   header ("");
      }

$sql = "SELECT * from musicfreaks_users where username='$sid'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
     while($row = $result->fetch_assoc()) {
	$sid2= $row['username'];
	 $following=$row['usr_following'];
	 $followers=$row['usr_followers'];
     }}
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
<script src="js/dynamicpage.js" type="text/javascript"></script>
<script src="js/jquery.ba-hashchange.min.js" type="text/javascript"></script>
<title><?php echo ucfirst($sid);?></title>
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
                                   $sql5 = "SELECT dp from musicfreaks_users where username = '$sid'";
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
                                                    echo "assets/u_dp/$sid$userdp.jpg";
                                                }   
                                                 else
                                                       {
                                                         echo "assets/images/default-usercover.png";
                                                        }

                                     ?>') center center / 120%; -webkit-filter:blur(<?php	
                                   $sql5 = "SELECT dp from musicfreaks_users where username = '$sid'";
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
                                                    echo "30px";
                                                }   
                                                 else
                                                       {
                                                         echo "0px";
                                                        }

                                     ?>); filter:blur(<?php	
                                   $sql5 = "SELECT dp from musicfreaks_users where username = '$sid'";
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
                                                    echo "30px";
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
                                           $sql5 = "SELECT dp from musicfreaks_users where username = '$sid'";
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
                                                            echo "assets/u_dp/$sid$userdp.jpg";
                                                        }   
                                                         else
                                                               {
                                                                 echo "images/d_up112.png";
                                                                }
        
                                             ?>"  />
             <div class="usr-name"><?php /*fetch first and lastname of loged In user*/
            $sql = "SELECT fullname from musicfreaks_users where username = '$sid'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()){
            
                $fullname = $row['fullname'];
              }
            } 
            if ($fullname !==""){
            echo $fullname;

            }
            else
            
            echo ucfirst($sid); $conn->close();
             ?><?php
            $sel=mysqli_query($link,"SELECT * from v_user where verified='$sid'");
             if(mysqli_num_rows($sel)>=1)
               {
                
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
            $result2 = mysqli_query($link, "SELECT usr_following, usr_followers FROM musicfreaks_users WHERE username = '$sid'");
            if(mysqli_num_rows($result2) > 0 ){
              while($row = mysqli_fetch_array($result2)) {
              $newf = $row['usr_following'];
              $newf2 = $row['usr_followers'];
                } 
            }
             echo $newf;?></div>
            <div id="fol-text">following</div>
            </div>
            <div class="usr-follower">
                <div id="fol-num" class="folnum">
                  <?php echo $newf2; 
            // ================================================================= 
            ?></div>
                  <div id="fol-text">followers</div>
            </div>
            <div class="usr-playlists">
				 <div id="pl-num" class="plnum">
				 <?php 
         $result3 = mysqli_query($link, "SELECT COUNT(user_uname) as 'totalplist' FROM playlist WHERE user_uname = '$sid' AND deleted = 0");
            if(mysqli_num_rows($result3) > 0 ){
              while($row = mysqli_fetch_array($result3)) {
              $totalplist = $row['totalplist'];
                } 
            }

         echo $totalplist; ?>
                 </div>
                 <div id="pl-text">playlists</div>
            </div>    
            </div>
            	<div id="sep_"></div>
                    <a href="settings"><button class="redirect_edit-profile">Edit profile</button></a>
        </div>             
</div>
</div>
    <div class="u-infobar shad">
  <ul class="u-info">
  <a ui-sref="myprofile.playlists" ui-sref-active="beOn" class="mpplist">Playlists</a>
  <a href="mpfollowers.php" class="mpplist">Followers</a>
  <a href="mpfollowing.php" class="mpplist">Following</a>
  <a href="#" class="mpplist right">Notifications</a>
  <a href="#" class="mpplist right">Favorites</a>
    </ul>
    </div>
        <div class="user-body shad"> 
          <div class="content-dynamo">
            <!--<div class="guts">likik</div>-->
            <div autoscroll="false" ui-view></div>
          </div>
       </div>
<script>
/*
//==================================================================================================
        $(document).ready(function() {
            $(".mpplist").click(function(){
                   $.ajax({
                       type:'GET', url:'myprofile_details.php?mp=mpplist',success:function(response){
                        $('.guts').html(response);
                       }
                           })
                })

            $(".mpfollowers").click(function(){
                   $.ajax({
                       type:'GET', url:'myprofile_details.php?mp=mpfollowers',success:function(response){
                        $('.guts').html(response);
                       }
                           })
                })

            $(".mpfollowing").click(function(){
                   $.ajax({
                       type:'GET', url:'myprofile_details.php?mp=mpfollowing',success:function(response){
                        $('.guts').html(response);
                       }
                           })
                })

            $(".mpabout").click(function(){
                   $.ajax({
                       type:'GET', url:'myprofile_details.php?mp=mpabout',success:function(response){
                        $('.user-body').html(response);
                       }
                           })
                })


            }) */
    </script> 
</section>
</div>
</div>

<?php 
include 'artists-div.php';
?>
<?php
include 'footer.php';
?>
</body>
</html>