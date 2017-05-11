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
 
<link rel="stylesheet" href="prof-mf-css-jk786.css" />
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