<?php
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
include ("error.php");
include ('conn.php');
{session_start();$sid= $_SESSION['sid'];
if($sid==""){	header("location:home");} else{ header ("");}}

$msg ="";
$dpSucc = "";
$userc = "_c";
$userdp = "_dp";
if(isset($_POST['sub']))
{   
  $fileName = $_FILES["att"]["name"];
  $fileTmpLoc = $_FILES["att"]["tmp_name"];
  $fileType = $_FILES["att"]["type"];
  $fileSize = $_FILES["att"]["size"];
  $fileErrorMsg = $_FILES["att"]["error"];

  function resize_crop_image($max_width, $max_height, $source_file, $dst_dir, $quality = 90){
    $imgsize = getimagesize($source_file);
    $width = $imgsize[0];
    $height = $imgsize[1];
    $mime = $imgsize['mime'];
 
  switch($mime){
        case 'image/png':
            $image_create = "imagecreatefrompng";
            $image = "imagepng";
            $quality = 90;
            break;
 
        case 'image/jpeg':
            $image_create = "imagecreatefromjpeg";
            $image = "imagejpeg";
            $quality = 90;
            break;
 
        default:
            return false;
            break;
    }
     
    $dst_img = imagecreatetruecolor($max_width, $max_height);
    $src_img = $image_create($source_file);
     
    $width_new = $height * $max_width / $max_height;
    $height_new = $width * $max_height / $max_width;
    if($width_new > $width){
        //cut point by height
        $h_point = (($height - $height_new) / 2);
        //copy image
        imagecopyresampled($dst_img, $src_img, 0, 0, 0, $h_point, $max_width, $max_height, $width, $height_new);
    }else{
        //cut point by width
        $w_point = (($width - $width_new) / 2);
        imagecopyresampled($dst_img, $src_img, 0, 0, $w_point, 0, $max_width, $max_height, $width_new, $height);
    }
     
    $image($dst_img, $dst_dir, $quality);
 
    if($dst_img)imagedestroy($dst_img);
    if($src_img)imagedestroy($src_img);
} 


if (!$fileName) {
    $msg = "<img src='images/redtick.png'/><span style='margin-left:7px;'>Browse for a picture before clicking change button.</span>";
    
} else 
{ if(!preg_match("/.(jpg|png)$/i", $fileName) ) {   
     $msg = "<img src='images/redtick.png'/><span style='margin-left:7px;'>Your image was not .jpg. or .png.</span>";
     unlink($fileTmpLoc);
} else 
{if ($fileSize > 1048576) {
    $msg = "<img src='images/redtick.png'/><span style='margin-left:7px;'>Choose file smaller than 1 MB in size.</span>";
    unlink($fileTmpLoc);
} else 
{   if ($fileErrorMsg == 1) {
    $msg = "<img src='images/redtick.png'/><span style='margin-left:7px;'>An error occured while processing the file. Try again.</span>";
}		
        
		
     // unlink("assets/u_c/$sid$userc.jpg");
       $moveResult = resize_crop_image(190, 190, $fileTmpLoc, "assets/u_dp/$sid$userdp.jpg");
	   
     // mysqli_query($link,"DELETE FROM dp WHERE username='$sid'");
//$moveResult = move_uploaded_file($fileTmpLoc, "assets/u_c/$sid$userc.jpg");

unlink($fileTmpLoc); 

//if ($moveResult !== true) {
    //$msg = "<img src='images/redtick.png'/><span style='margin-left:7px;'>File not uploaded. Try again. And your previous dp was also deleted.</span>";
   // unlink($fileTmpLoc);
//}else 
     //{ 
        
              mysqli_query($link,"UPDATE musicfreaks_users SET dp = '1' WHERE username='$sid'");
          
		$dpSucc = "<img src='images/bluetick.png'/><span style='margin-left:7px;'>Your picture has been successfully updated.</span>";
		$updated = md5('updated');
      //header("location:../musicfreaks/settings");
 // }
}
}
}
}
$dpUpd =($_GET['dp']);
switch ($dpUpd)
{
	case '0f81d52e06caaa4860887488d18271c7' : $dpSucc = "<img src='images/bluetick.png'/><span style='margin-left:7px;'>Your picture has been successfully updated.</span>";			      break;}

$userc = "_c";
$userdp = "_dp";
if(isset($_POST['del']))
	{
    $filename = 'assets/u_dp/'.$sid.'_dp.jpg';

if (file_exists($filename)) {

	mysqli_query($link,"UPDATE musicfreaks_users SET dp = '' WHERE username='$sid'");
	unlink("assets/u_dp/$sid$userdp.jpg");
   // unlink("assets/u_c/$sid$userc.jpg");
	$dpSucc = "<img src='images/bluetick.png'/>	<span style='margin-left:7px;'>Your picture has been successfully deleted.</span>";
	}else {
    $dpSucc = "<img src='images/redtick.png'/> <span style='margin-left:7px; color:#c33;'>You haven't uploaded your display picture.</span>";
  }

}
?>
<html>
  <head> 
    <title>Settings</title>
	<head>
    <link rel="stylesheet" href="settingstyle.css">
    <link href="//fonts.googleapis.com/css?family=Raleway:100normal,100italic,200normal,200italic,300normal,300italic,400normal,400italic,500normal,500italic,600normal,600italic,700normal,700italic,800normal,800italic,900normal,900italic|Open+Sans:400normal|Lato:400normal|Roboto:400normal|Oswald:400normal|Droid+Sans:400normal|Droid+Serif:400normal|Lobster:400normal|PT+Sans:400normal|Ubuntu:400normal|Playfair+Display:400normal&amp;subset=all" rel="stylesheet" type="text/css">
    <script src="js/2.2.0_jquery.js" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js" type="text/javascript"></script>
    <script src="js/jquery.form.js"></script>
    <script async src="js/setting_scrollshadow-js.js" language="javascript"></script>
    <!-- <script type="text/javascript">
    function unloadJS(scriptName) {
        var head = document.getElementsByTagName(‘head’).item(0);
        var js = document.getElementById(scriptName);
        js.parentNode.removeChild(js);
        }

        function unloadAllJS() {
        var jsArray = new Array();
        jsArray = document.getElementsByTagName(‘script’);
        for (i = 0; i < jsArray.length; i++){ if (jsArray[i].id){ unloadJS(jsArray[i].id) }else{ jsArray[i].parentNode.removeChild(jsArray[i]); } } } [/js] Related posts:

  </script> -->
    <?php
	if(isset($_POST['sub']))
{
   echo "<script>
                   $(document).ready(function() {
                   $('html, body').animate({scrollTop: '+=70px'}, 400);
				   });
				   </script>";
}
	?>
	<body>
    <div class="setting-noti-box" id="setting-noti-box-id"></div>
 <section class="settings-page">
    <div class="stt_head-" id="header_set"><p id="header-line">IT'S ALL YOURS</p></div>
    <div class="sett_content-jk">
    
    <div class="sett_selectAJAX-">
      <li class="profile_btn">Profile</li>
      <li class="privacy_btn">Privacy</li>
      <li class="preference_btn">Preference</li>
    </div> <script>
$(document).ready(function(){
$(".profile-setting").show();
    $(".profile_btn").addClass('BarActive');
    $(".profile_btn").css("background-color","#f1f1f1");
	$(".privacy-setting , .preference-setting").hide();
    
	$(".profile_btn").click(function() {
		$(".profile_btn").addClass('BarActive');
		$(".privacy_btn, .preference_btn").removeClass('BarActive');
		$(".profile_btn").css("background-color","#f1f1f1");
		$(".privacy_btn , .preference_btn").css("background-color","#f1f1f1");
		$(".privacy_btn , .preference_btn").css("background-color","#f9f9f9");
    });
    $(".privacy_btn").click(function(){
		$(".privacy_btn").addClass('BarActive');
		$(".profile_btn, .preference_btn").removeClass('BarActive');
		$(".privacy_btn").css("background-color","#f1f1f1");
		$(".preference_btn , .profile_btn").css("background-color","#f9f9f9");
     });
	$(".preference_btn").click(function(){
		$(".preference_btn").addClass('BarActive');
		$(".profile_btn, .privacy_btn").removeClass('BarActive');
		$(".preference_btn").css("background-color","#f1f1f1");
		$(".privacy_btn , .profile_btn").css("background-color","#f9f9f9");
   });
    $(".profile_btn").click(function(){
	   $(".profile-setting").show();
	   $(".preference-setting , .privacy-setting").hide();
   });
   $(".privacy_btn").click(function(){
	   $(".profile-setting , .preference-setting").hide();
	   $(".privacy-setting").show();
   });
   
   $(".preference_btn").click(function(){
	   $(".profile-setting , .privacy-setting").hide();
	   $(".preference-setting").show();
	});
});
</script>

<script>
$(document).on('click', '#sub', function () {
	 $(".bar").css("display","block");
//var progressBar = $('.progressBar'), bar = $('.progressBar .bar'), percent = $('.progressBar .percent');
$('#image_upload_form').ajaxForm({
beforeSend: function() {
},
uploadProgress: function(event, position, total, percentComplete) {
},
success: function(html, statusText, xhr, $form) {
obj = $.parseJSON(html);
if(obj.status){
if($("#imgArea>img").prop('src',obj.image_medium)) {
  $(".bar").css("display","none");
  $(".dpresult").html(obj.error);
  var deldp = (obj.image_medium);
  $.ajax({
        type:'GET', 
        url:'temp_del.php',data:"objdp="+deldp,success:function(response){
        }
      });
}
} else {
$(".dpresult").html(obj.error);
}
},
complete: function(xhr) {
progressBar.fadeOut();
}
}).submit();

});
</script>

								    <div class="sett_innerAJAX-">
                                        <div class="profile-setting" ><div class="usr_details">
                                        <div class="sep-line"></div>
                                        <p id="displayp_s_head-">display picture</p>
                                     <p id="dp_notice-">In most places, this would be your profile/display picture.<br/>Picture will be resized and square cropped from the center.</p>
                                     <div id="imgArea" class="set-user-pic"><img src="<?php	
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

                                     ?>" >
                                     <div class="bar"><img class="loader" src="assets/images/ajax-loader.png"></div>
                                     </div>
                                    	                                        
<form enctype="multipart/form-data" action="image_upload_demo_submit_dp.php" method="post" name="image_upload_form_anything_hgn" id="image_upload_form">
  <input type="file" accept="image/*" name="image_upload_file" id="image_upload_file" class="custom-file-input">
<section class="settaction_btns-">
      <input type="submit" name="sub" id="sub" value="change">
</form>

        <input type="button" name="del" id="del" value="delete profile picture">
      </section>

<script>
$(document).ready(function(){
  $("#sub").click(function(){
	 if( document.getElementById("image_upload_file").files.length == 0 ){
		var close = 11;
	  }
          
        $.ajax({
        type:'GET', url:'null_dp.php',data:"obj4="+close,success:function(response){
		$(".dpresult").html(response);
		$(".bar").css("display","none");
     }
   })
 });
});
		  
</script>

<script>
$(document).ready(function(){
  $("#del").click(function(){
	  $(".bar").css("display","block");
      var close = 1;
          
        $.ajax({
        type:'GET', url:'dp_del.php',data:"obj4="+close,success:function(response){ 
        $("#imgArea>img").prop('src','images/d_up112.png');
		$(".bar").css("display","none");
		$(".dpresult").html(response);
     }
   })
 });
});
		  
</script>
                                            <div id="error_sett-"><p id="error_"></p></div>
                                           <div class="dpresult" id="dpresult" style=" width:500px;position: absolute;margin-top: 3px;margin-left: 428px;display: block;font-family: Segoe UI, Tahoma, sans-serif;font-weight: 600;font-size: 14px; text-align:center;"></div>
                                            <div class="sep-line2"></div> 
                                            <p id="basicd_s_head-">basic details</p>
                                            <section class="details_section-">
                                            <?php                                    
                                          /*fetch first and lastname of logged In user*/
                                    $sql = "SELECT fname, lname from musicfreaks_users where username = '$sid'";
                                    $result = $link->query($sql);
                                    if ($result->num_rows > 0) {
                                      while($row = $result->fetch_assoc()){
                                    
                                        $fname=$row['fname'];
                                        $lname=$row['lname'];
                                    
                                      }
                                    }
                                    $conn->close();
                                            
                                            ?>
                                             <form method="post" enctype="multipart/form-data">                                    
                                            <li id="fstnam_last"><span class="name-head-">First Name</span>
<input type="text" name="usr_nmebox" id="firstname_txtbox-" autocomplete="off" value="<?php echo $fname; ?>" class="usr_nmebox-"/>
											</li>
                                            <li>
                                            	<span class="name-head-">Last Name</span>
 <input type="text" name="usr_nmebox" id="lastname_txtbox-" autocomplete="off" value="<?php echo $lname; ?>" class="usr_nmebox-"/>
 										    </li>
                                            <section class="chnage_btn">
                                            <input type="button" name="change" id="save_change" value="change" >
                                            </section>
                                            </form>
 
 <div id="fname-result" style=" width:100%; padding:0;margin:25px 0 0 0;display: block;font-family: Segoe UI, Tahoma, sans-serif;font-weight: 600; font-size: 14px; text-align:center;"></div>
                                            </section>
<script type="text/javascript">
$(document).ready(function() {

  $("#save_change").click(function() {
      var nam1 = $("#lastname_txtbox-").val();
      var nam = $("#firstname_txtbox-").val();
          $.ajax({
        type:'GET', 
        url:'fname-checker.php',data:"obj="+nam+"&obj2="+nam1+"&name=ďĎčČċù÷ö&pass=ds",success:function(response){
          $('#fname-result').html(response);
           }
         })
   })
});
</script>

<script type="text/javascript">
$(document).ready(function() {

  $(".save_password").click(function() {
      var nam2 = $("#oldpass_txtbox").val();
      var nam3 = $("#newpass_txtbox").val();
      var nam4 = $("#confirmpass_txtbox").val();
          $.ajax({
        type:'GET', 
        url:'fname-checker.php',data:"obj3="+nam2+"&obj4="+nam3+"&obj5="+nam4+"&pass=ďĎčČċù÷ö΅΄˝ΙΪΫ&name=21",success:function(response){
          $('#fnameErr').html(response);
           }
         })
   })
});
</script>
<div class="sep-line3"></div> 
                                            <p id="paswrd_s_head-">password</p>
                                            <section class="password_section-">
                                            <form method="post" enctype="multipart/form-data">
                <li id="oldpass_last">
                	<span class="pass-head-">Current Password</span>
                    	<input type="password" name="passbox" id="oldpass_txtbox" class="pass_box-"/>
                </li>
                <li>
                	<span class="pass-head-">New Password</span>
                    	<input type="password" name="passbox2" id="newpass_txtbox" class="pass_box-"/>
                </li>
                <li>
                	<span class="pass-head-">Confirm New Password</span>
                		<input type="password" name="passbox3" id="confirmpass_txtbox" class="pass_box-"/>
                </li>
              
                              <section class="chnage_btn">
                                       <input type="button" name="Passchange" id="save_change" class="save_password" value="change">
                                       </section>                                       
                                          </form>
                  <div class="fnameErr" id="fnameErr" style=" width:100%; padding:0;margin:25px 0 0 0;display: block;font-family: Segoe UI, Tahoma, sans-serif;font-weight: 600; font-size: 14px; text-align:center;"></div> 
                                            </section>                                    
                                        <div class="sep-line4"></div>
                                        </div>
                                        </div>
                                        
                                        
                                        <div class="privacy-setting">
                                            <div class="sep-line7"></div>
                                              <p id="setprivacy_s_head-">set privacy</p>
                                              <div class="playlists_lock">
                                                <div class="inline-a"><p id="plalistlock-note">Lock your playlists.</p></div>
                                                 <div class="inline-b">
                                                   <span class="hint_lock"></span>
                                                   <div class="cp-infor">
                                                    Locking will prevent others from seeing your playlists.
                                                        <div class="arrow-down"></div>
                                                            <div class="arrow-down-bline"></div>
                                                                <span class="cross-btn"></span>
                                                   </div>
                                                 </div>
                                                 
                                          <?php                                    
                                    $sqllock = "SELECT plist_name from playlist where user_uname = '$sid' AND privacy = 0";
                                    $resultlock = $link->query($sqllock);
                                    if ($resultlock->num_rows == 0) {
										$lock_playlist = "checked";
									}else {
										$lock_playlist = "";}
										  ?>
                                                <div class="inline-c">       
                                                  <label>
                                                  		<input type="checkbox" name="pl-checkbox" class="playlist-lock" id="lock_playlist" <?php echo $lock_playlist; ?>>
                                                      <div class="lock_switch"></div>
                                                  </label>
                                                </div>
                                                <div id="privacy-rec" style="margin-top: 50px;position: absolute;margin-left: 300px;text-align: center;"></div>
                                              </div> 
																											
                                                      <div class="sep-line8"></div>
                                        </div>
                                        
										
<script>
$(function(){
  $(".playlist-lock").change(function() {
    $(".lock_switch").toggleClass("lockOn", this.checked)
  }).change();
})
</script>
                                          <?php                                    
                                    $sql = "SELECT * from language where user_uname = '$sid'";
                                    $result = $link->query($sql);
                                    if ($result->num_rows > 0) {
                                      while($row = $result->fetch_assoc()){
                                    
                                        
                                        if($row['hindi'] == "1"){
                                          $hindi= "checked";
                                        }
                                        if($row['english'] == "1"){
                                        $english= "checked";
                                      }
                                      if($row['punjabi'] == "1"){
                                        $punjabi= "checked";
                                      }
                                        if($row['bhojpuri'] == "1" ){
                                          $bhojpuri= "checked";
                                        }
                                        if($row['tamil'] == "1" ){
                                          $tamil= "checked";
                                        }
                                        if($row['telugu'] == "1" ){
                                          $telugu= "checked";
                                        }
                                        if($row['marathi'] == "1" ){
                                          $marathi= "checked";
                                        }
                                        if($row['gujarati'] == "1" ){
                                          $gujarati= "checked";
                                        }
                                        if($row['bengali'] == "1" ){
                                          $bengali= "checked";
                                        }
                                    
                                      }
                                    }                                     
                                            ?>


                                                                                                        
                                            <div class="preference-setting" >
                                            <div class="sep-line5"></div>
                                            <p id="setlang_s_head-">set languages</p>
                                                <div class="lang-pref">
                                        <li class="pref-switch">
                                            <input type="checkbox" name="pcheckbox" class="prefcheckbox" id="switch_hindi" <?php echo $hindi; ?> >
                                            <label class="switch-label" for="switch_hindi">
                                               <span class="onoffswitch-hindi" id="onoffswitch-inners"></span>
                                                <span class="btn"></span></label>
                                         </li>  
                                         <li class="pref-switch">
                                            <input type="checkbox" name="pcheckbox" class="prefcheckbox" id="switch_english" <?php echo $english; ?>>
                                            <label class="switch-label" for="switch_english">
                                                <span class="onoffswitch-english" id="onoffswitch-inners"></span>
                                                <span class="btn"></span></label>
                                         </li>    
                                          <li class="pref-switch">
                                            <input type="checkbox" name="pcheckbox" class="prefcheckbox" id="switch_punjabi"  <?php echo $punjabi; ?> >
                                            <label class="switch-label" for="switch_punjabi">
                                                <span class="onoffswitch-punjabi" id="onoffswitch-inners"></span>
                                                <span class="btn"></span></label>
                                         </li>  
                                           <li class="pref-switch">
                                            <input type="checkbox" name="pcheckbox" class="prefcheckbox" id="switch_bhojpuri" <?php echo $bhojpuri; ?> >
                                            <label class="switch-label" for="switch_bhojpuri">
                                                <span class="onoffswitch-bhojpuri" id="onoffswitch-inners"></span>
                                                <span class="btn"></span></label>
                                         </li>  
                                           <li class="pref-switch">
                                            <input type="checkbox" name="pcheckbox" class="prefcheckbox" id="switch_tamil" <?php echo $tamil; ?> >
                                            <label class="switch-label" for="switch_tamil">
                                                <span class="onoffswitch-tamil" id="onoffswitch-inners"></span>
                                                <span class="btn"></span></label>
                                         </li>  
                                           <li class="pref-switch">
                                            <input type="checkbox" name="pcheckbox" class="prefcheckbox" id="switch_telugu" <?php echo $telugu; ?> >
                                            <label class="switch-label" for="switch_telugu">
                                                <span class="onoffswitch-telugu" id="onoffswitch-inners"></span>
                                                <span class="btn"></span></label>
                                         </li> 
                                          <li class="pref-switch">
                                            <input type="checkbox" name="pcheckbox" class="prefcheckbox" id="switch_marathi" <?php echo $marathi; ?> >
                                            <label class="switch-label" for="switch_marathi">
                                                <span class="onoffswitch-marathi" id="onoffswitch-inners"></span>
                                                <span class="btn"></span></label>
                                         </li> 
                                         <li class="pref-switch">
                                            <input type="checkbox" name="pcheckbox" class="prefcheckbox" id="switch_gujarati" <?php echo $gujarati; ?> >
                                            <label class="switch-label" for="switch_gujarati">
                                                <span class="onoffswitch-gujarati" id="onoffswitch-inners"></span>
                                                <span class="btn"></span></label>
                                         </li>  
                                         <li class="pref-switch">
                                            <input type="checkbox" name="pcheckbox" class="prefcheckbox" id="switch_bengali" <?php echo $bengali; ?> >
                                            <label class="switch-label" for="switch_bengali">
                                                <span class="onoffswitch-bengali" id="onoffswitch-inners"></span>
                                                <span class="btn"></span></label>
                                         </li> 
                                        </div>
                                        		<div class="sep-line9"></div>
                                     <div id="lang-rec" style="margin-top: 10px;position: absolute;margin-left: 585px;text-align: center;"></div>
                                        </div>

                                        
</div>
			<section class="saveall_btns">
     					<button id="save_all">Done</button>
			</section>
    </div>
  </section>
         											<script>
													$(document).ready(function(){
												$("span#onoffswitch-inners , label.switch-label , span.btn , .lock_switch").click(function(){
												//$("#sett_selectAJAX").stop();
												$(".setting-noti-box").css("display","block").animate({'bottom':'46px'},450);
												$("#setting-noti-box-id").delay(2200).animate({'bottom':'-70px'},450).fadeOut(200);
															
														
															});
														});
													</script>
                                           
                                                      <script>
                                                      $(document).ready(function(){
                                                        $("#lock_playlist").click(function(){
                                                        if(document.getElementById('lock_playlist').checked) {
                                                        var privacy = 1;
                                                            } else {
                                                              var privacy = 0;
                                                                }

                                                          $.ajax({
                                                            type:'GET', url:'username-privacy.php',data:"obj="+privacy,success:function(response){
                                                              $('#setting-noti-box-id').html(response);
                                                               }
                                                             })
                                                        })
                                                      })
                                                      </script>

                                                      
                                                      <script>
                                                      $(document).ready(function(){

                                                       $(document).on('change', '#switch_hindi', function() {
                                                        if(document.getElementById('switch_hindi').checked) {
                                                        var hindi = 1;
                                                            } else {
                                                              var hindi = 0;
                                                                }
                                                        $.ajax({
                                                            type:'GET', url:'username-preference.php',data:"obj="+hindi,success:function(response){
                                                              $('#setting-noti-box-id').html(response);
                                                               }
                                                             })
                                                      })


                                                      $(document).on('change', '#switch_english', function() {
                                                        if(document.getElementById('switch_english').checked) {
                                                        var english = 1;
                                                            } else {
                                                              var english = 0;
                                                                }
                                                         $.ajax({
                                                            type:'GET', url:'username-preference.php',data:"obj2="+english,success:function(response){
                                                              $('#setting-noti-box-id').html(response);
                                                               }
                                                             })
                                                      })


                                                      $(document).on('change', '#switch_punjabi', function() {
                                                      if(document.getElementById('switch_punjabi').checked) {
                                                        var punjabi = 1;
                                                            } else {
                                                              var punjabi = 0;
                                                                }
                                                                 $.ajax({
                                                            type:'GET', url:'username-preference.php',data:"obj3="+punjabi,success:function(response){
                                                              $('#setting-noti-box-id').html(response);
                                                               }
                                                             })
                                                      })

                                                      $(document).on('change', '#switch_bhojpuri', function() {
                                                       if(document.getElementById('switch_bhojpuri').checked) {
                                                        var bhojpuri = 1;
                                                            } else {
                                                              var bhojpuri = 0;
                                                                }
                                                       $.ajax({
                                                            type:'GET', url:'username-preference.php',data:"obj4="+bhojpuri,success:function(response){
                                                              $('#setting-noti-box-id').html(response);
                                                               }
                                                             })
                                                      })

                                                      $(document).on('change', '#switch_tamil', function() {
                                                      if(document.getElementById('switch_tamil').checked) {
                                                        var tamil = 1;
                                                            } else {
                                                              var tamil = 0;
                                                                }
                                                       $.ajax({
                                                            type:'GET', url:'username-preference.php',data:"obj5="+tamil,success:function(response){
                                                              $('#setting-noti-box-id').html(response);
                                                               }
                                                             })
                                                      })

                                                      $(document).on('change', '#switch_telugu', function() {
                                                       if(document.getElementById('switch_telugu').checked) {
                                                        var telugu = 1;
                                                            } else {
                                                              var telugu = 0;
                                                                }
                                                       $.ajax({
                                                            type:'GET', url:'username-preference.php',data:"obj6="+telugu,success:function(response){
                                                              $('#setting-noti-box-id').html(response);
                                                               }
                                                             })
                                                      })

                                                      $(document).on('change', '#switch_marathi', function() {
                                                      if(document.getElementById('switch_marathi').checked) {
                                                        var marathi = 1;
                                                            } else {
                                                              var marathi = 0;
                                                                }
                                                       $.ajax({
                                                            type:'GET', url:'username-preference.php',data:"obj7="+marathi,success:function(response){
                                                              $('#setting-noti-box-id').html(response);
                                                               }
                                                             })
                                                      })

                                                      $(document).on('change', '#switch_gujarati', function() {
                                                      if(document.getElementById('switch_gujarati').checked) {
                                                        var gujarati = 1;
                                                            } else {
                                                              var gujarati = 0;
                                                                }
                                                       $.ajax({
                                                            type:'GET', url:'username-preference.php',data:"obj8="+gujarati,success:function(response){
                                                              $('#setting-noti-box-id').html(response);
                                                               }
                                                             })
                                                      })
                                                      $(document).on('change', '#switch_bengali', function() {
                                                      if(document.getElementById('switch_bengali').checked) {
                                                        var bengali = 1;
                                                            } else {
                                                              var bengali = 0;
                                                                }
                                                       $.ajax({
                                                            type:'GET', url:'username-preference.php',data:"obj9="+bengali,success:function(response){
                                                              $('#setting-noti-box-id').html(response);
                                                               }
                                                             })
                                                      })    
                                                    })
                                                      </script>
<script async>
$(document).ready(function() {
    
$('#save_all').click(function() {
	 history.go(-1); return false; 
});
	});
</script>
<script>
$(document).ready(function() {
var removeClass = true;
$(".hint_lock").click(function () {
    $(".cp-infor").toggleClass('cp-infor-display');
	$('.hint_lock').toggleClass("hint_lock-display");
    removeClass = false;
});

$(".cp-infor").click(function() {
    removeClass = false;
});

$("html, .cross-btn").click(function () {
    if (removeClass) {
        $(".cp-infor").removeClass('cp-infor-display');
		$('.hint_lock').removeClass("hint_lock-display");
    }
    removeClass = true;
});
});
</script>
</body>
</html>