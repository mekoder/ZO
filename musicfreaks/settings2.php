<?php
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
//include ("error.php");
include ('conn.php');
{session_start();$sid= $_SESSION['sid'];
if($sid==""){	header("location:home.php");} else    { 	   header ("");}}

$msg ="";
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
            $quality = 7;
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


//unlink("users/dp_$sid.jpg");


if (!$fileTmpLoc) {
    $msg = "ERROR: Please browse for a file before clicking the upload button.";
    
} else 
{ if(!preg_match("/.(jpg|png)$/i", $fileName) ) {   
     $msg = "ERROR: Your image was not .jpg. or .png.";
     unlink($fileTmpLoc);
} else 
{if ($fileSize > 1048576) {
    $msg = "ERROR: Your file was larger than 1 Megabytes in size.";
    unlink($fileTmpLoc);
} else 
{   if ($fileErrorMsg == 1) {
    $msg = "ERROR: An error occured while processing the file. Try again.";
}
      unlink("users/$sid.jpg");
       resize_crop_image(190, 190, $fileTmpLoc, "assets/u_dp/$sid_dp.jpg");
      mysqli_query($link,"DELETE FROM dp WHERE username='$sid'");
$moveResult = move_uploaded_file($fileTmpLoc, "assets/u_c/$sid_c.jpg");
unlink($fileTmpLoc); 

if ($moveResult != true) {
    $msg = "ERROR: File not uploaded. Try again. And your previous dp was also deleted.";
    unlink($fileTmpLoc);
}else 
     { 
      
     

      $sel=mysqli_query($link,"select * from dp where username='$sid'");
        if(mysqli_num_rows($sel)>=1)
          {
              mysqli_query($link,"UPDATE dp SET username ='$sid' WHERE username='$sid'");
          }else
      {
        mysqli_query($link,"insert into dp (username) VALUES('$sid')");
      }

      header("location:../musicfreaks/settings");
  }
}
}
}
}



	
if(isset($_POST['del']))
	{
	mysqli_query($link,"DELETE FROM dp WHERE username='$sid'");
	unlink("assets/u_dp/$sid_dp.jpg");
  unlink("users/u_c/$sid_c.jpg");
	}
?>
<html>
  <head> 
    <title>Settings</title>
	<head>
    <link rel="stylesheet" href="settingstyle.css">
    <script src="js/2.2.0_jquery.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script async src="js/setting_scrollshadow-js.js" language="javascript"></script>
    <?php
	if(isset($_POST['sub']))
{
   echo "<script>
                   $(document).ready(function() {
                   $('html, body').animate({scrollTop: '+=80px'}, 400);
				   });
				   </script>";
}
	?>
	<body>
    <div class="stt_head-" id="header_set"><p id="header-line">IT'S ALL YOURS</p></div>
    <div class="sett_content-jk">
    
    <div class="sett_selectAJAX-">
      <li class="profile_btn"><span>Profile</span></li>
      <li class="privacy_btn"><span>Privacy</span></li>
      <li class="preference_btn"><span>Preference</span></li>
    </div> <script>
$(document).ready(function(){
$(".profile-setting").show();
	$(".privacy-setting , .preference-setting").hide();
		
	$(".profile_btn").css("background-color","#f4f4f4");
    $(".profile_btn").click(function() {
		$(".profile_btn").css("background-color","#f4f4f4");
		$(".privacy_btn , .preference_btn").css("background-color","#f4f4f4");
		$(".privacy_btn , .preference_btn").css("background-color","#fff");
    });
    $(".privacy_btn").click(function(){
		$(".privacy_btn").css("background-color","#f4f4f4");
		$(".preference_btn , .profile_btn").css("background-color","#fff");
     });
	$(".preference_btn").click(function(){
		$(".preference_btn").css("background-color","#f4f4f4");
		$(".privacy_btn , .profile_btn").css("background-color","#fff");
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
    <div class="sett_innerAJAX-">
    <div class="profile-setting" ><div class="usr_details">
    <div class="sep-line"></div>
    <p id="displayp_s_head-">display picture</p>
 <p id="dp_notice-">In most places, this would be your profile/display picture.<br/>Picture will be fully adjusted, no crop would take place.</p>
 <div id="preview-user-pic" class="set-user-pic" style="background-size:<?php
   $link=mysqli_connect("localhost","root","","musicfreaks") or die("Not connect to mysql");	
$sel=mysqli_query($link,"select username from dp where username='$sid'");
 if(mysqli_num_rows($sel)>=1)
   {
    
		echo "170%";
		}		
		 else
	                {
	               echo "100%";
          	}
					?>; background-image:url('<?php
   $link=mysqli_connect("localhost","root","","musicfreaks") or die("Not connect to mysql");	
$sel=mysqli_query($link,"select username from dp where username='$sid'");
 if(mysqli_num_rows($sel)>=1)
   {
    
		echo "users/dp_$sid.jpg";
		}		
		 else
	                {
	               echo "images/d_up11.jpg";
          	}
					?>');" ></div>
<form method="post" enctype="multipart/form-data" accept=".someext,image/*">
<input name="att" type="file" id="att" class="custom-file-input" onChange="loadFile(event)">
<section class="settaction_btns-"><input type="submit" name="sub" id="sub" value="change">
        <input type="submit" name="del" id="del" value="delete profile picture"></section>
        </form>
        <div id="error_sett-"><p id="error_"><?php echo $msg; ?></p></div>
        <div class="sep-line2"></div> 
        <p id="basicd_s_head-">basic details</p>
        <section class="details_section-">
        <?php
        $fnameErr ="";
        $lnameErr ="";
        $fnameErr0 = "";


		if(isset($_POST['change']))
		{
			 echo "<script>
                   $(document).ready(function() {
                   $('html, body').animate({scrollTop: '+=490px'}, 400);
				   });
				   </script>"; 
			$usr_nmebox = ucfirst (test_input($_POST["usr_nmebox"]));
      $usr_nmebox2 = ucfirst (test_input($_POST["usr_nmebox2"]));

		   if(!empty($_POST["usr_nmebox"]) && !empty($_POST["usr_nmebox2"]))
		   {
			 if (!preg_match("/^[a-zA-Z]*$/", $usr_nmebox))
			      {       
                    $fnameErr = "<img src='images/redtick.png'/> Only letters are allowed.";
                  } 
	                else
                  {
                    if (!preg_match("/^[a-zA-Z]*$/", $usr_nmebox2))
                    {
                      $fnameErr = "<img src='images/redtick.png'/> Only letters are allowed.";
                    }else
                    {   
                  mysqli_query($link,"UPDATE musicfreaks_users SET fname ='$usr_nmebox' WHERE username='$sid'");
                  mysqli_query($link,"UPDATE musicfreaks_users SET lname ='$usr_nmebox2' WHERE username='$sid'");
                    echo $usr_nmebox2;
                   $fnameErr0 = "<img src='images/bluetick.png'/> Your name has been successfully updated.";
               
                  }

                  } 

	          
                  }  
       
       else
         $fnameErr = "<img src='images/redtick.png'/> Both first and last name must be filled out.";
           
		  }

      /*fetch first and lastname of loged In user*/
if ($conn->connect_error) {
  die("connection failed: " . $conn->connect_error);
}
$sql = "SELECT fname, lname from musicfreaks_users where username = '$sid'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()){

    $fname=$row['fname'];
    $lname=$row['lname'];

  }
}
$conn->close();
		
		?>
        <form method="post" enctype="multipart/form-data">
              <div class="fnameErr" id="fnameErr" style=" width:auto;position: absolute;margin-top: 239px;margin-left: 156px;display: block;color: rgba(255,65,65,0.9);font-family: Segoe UI, Tahoma, sans-serif;font-weight: 600;
    font-size: 15px;"><?php echo $fnameErr; ?></div>
    <div id="fnameErr" style=" width:auto;position: absolute;margin-top: 239px;margin-left: 220px;display: block;color: rgba(59, 136, 195, 1);font-family: Segoe UI, Tahoma, sans-serif;font-weight: 600;
    font-size: 15px;"><?php echo $fnameErr0; ?></div>

        <li id="fstnam_last"><p>First Name</p>
        <input type="text" name="usr_nmebox" id="firstname_txtbox-" value="<?php echo $fname; ?>" class="usr_nmebox-"/></li>
        <li><p>Last Name</p>
        <input type="text" name="usr_nmebox2" id="lastname_txtbox-" value="<?php echo $lname; ?>" class="usr_nmebox-"/></li>
        <!--<li ><p>Username</p><font id="username_chng-">musicfreaks.com/user/</font><div class="usrnam_change_box"><input type="text" name="usrname_box" id="username_txtbox-" class="usrnam_box-" placeholder="<?php $uname= strtolower($sid); echo $uname;    ?>"/></div></li>--></section>
        <section class="chnage_btn">
        <input type="submit" name="change" id="save_change" value="change"></section>
        </form>
        <script type="text/javascript">
       $(document).ready(function() {
        $("#firstname_txtbox-").keyup(function(){
        if ( $("#firstname_txtbox-").val()==""){
       $("#fname-result").hide();
       }else
       {
        $("#fname-result").show();
       }
         var x_timer;    
         $("#firstname_txtbox-").keyup(function (e){
        clearTimeout(x_timer);
        var user_name = $(this).val();
        x_timer = setTimeout(function(){
            check_fname_ajax(user_name);
        }, 1000);
    });
        function check_fname_ajax(usr_nmebox){
        $("#fname-result").html('<img src="images/load2.gif" class="loadgif">');
        $.post('fname-checker.php', {'usr_nmebox':usr_nmebox}, function(data) {
        $("#fname-result").html(data);
     });
    }
   }); 
  });
  </script>
        <script type="text/javascript">
       $(document).ready(function() {
        $("#lastname_txtbox-").keyup(function(){
        if ( $("#lastname_txtbox-").val()==""){
       $("#lname-result").hide();
       }else
       {
        $("#lname-result").show();
       }
         var x_timer;    
         $("#lastname_txtbox-").keyup(function (e){
        clearTimeout(x_timer);
        var user_name = $(this).val();
        x_timer = setTimeout(function(){
            check_fname_ajax(user_name);
        }, 1000);
    });
        function check_fname_ajax(usr_nmebox){
        $("#lname-result").html('<img src="images/load2.gif" class="loadgif">');
        $.post('fname-checker.php', {'usr_nmebox':usr_nmebox}, function(data) {
        $("#lname-result").html(data);
     });
    }
   }); 
  });
  </script>

        <?php
            $passErr = "";
            $passSucc = "";
            if(isset($_POST['Passchange']))
          { 
            echo "<script>
                  $(document).ready(function() {
                  $('html, body').animate({scrollTop: '+=880px'}, 400);
                  });
                  </script>";
            if(!empty($_POST['passbox']) && !empty($_POST['passbox2']) && !empty($_POST['passbox2']))
            {
              $pass1 = test_input($_POST['passbox']);
              $pass2 = test_input($_POST['passbox2']);
              $pass3 = test_input($_POST['passbox3']);
                $sel=mysqli_query($link,"select pass from musicfreaks_users where username='$sid'");
                $arr=mysqli_fetch_array($sel);
                $pass1=md5($pass1);$pass1=md5($pass1);
                if($pass1==$arr['pass'])
                 {
                  $passcount = strlen($pass2);
                  if ($passcount < 5)
                  {
                    $passErr="<img src='images/redtick.png'/> Minimum 5 characters.";
                  }else
                  {
                    if($pass2 == $pass3)
                    {
                      $pass2 = md5($pass2);$pass2 = md5($pass2);
                      $link=mysqli_connect("localhost","root","","musicfreaks") or die("Not connected to mysql"); 
                      mysqli_query($link,"UPDATE musicfreaks_users SET pass ='$pass2' WHERE username='$sid'");
                      echo $pass2;
                      $passSucc = "Password Successfully updated.";
                    }else 
                    {
                      $passErr = "<img src='images/redtick.png'/> Confirm New password dose't match.";
                    }
                  }
                 }else
                 {
                   $passErr = "<img src='images/redtick.png'/> Current password was wrong.";
                 }


            } else
              
            {
                $passErr = "<img src='images/redtick.png'/> Fill all fields.";
            }
          }

        ?>


        <div class="sep-line3"></div> 
        <p id="paswrd_s_head-">password</p>
        <section class="password_section-">
        <form method="post" enctype="multipart/form-data">
        <li id="oldpass_last"><p>Old Password</p><input type="password" name="passbox" id="oldpass_txtbox" class="pass_box-"/></li>
        <li><p>New Password</p><input type="password" name="passbox2" id="newpass_txtbox" class="pass_box-"/></li>
        <li><p>Confirm New Password</p><input type="password" name="passbox3" id="confirmpass_txtbox" class="pass_box-"/></li>
        </section>
        <div class="fnameErr" id="fnameErr" style=" width:auto;position: absolute;margin-top: 59px;margin-left: 596px;display: block;color: rgba(255,65,65,0.9);font-family: Segoe UI, Tahoma, sans-serif;font-weight: 600;
    font-size: 15px;"><?php echo $passErr; ?></div>
    <div class="fnameErr" id="fnameErr" style=" width:auto;position: absolute;margin-top: 59px;margin-left: 596px;display: block;color: rgba(59, 136, 195, 1);font-family: Segoe UI, Tahoma, sans-serif;font-weight: 600;
    font-size: 15px;"><?php echo $passSucc; ?></div>


     <section class="chnage_btn">
      <input type="submit" name="Passchange" id="save_change" value="change"></section>
        </form>
        <div class="sep-line4"></div>
        <!-- Save all buttons here -->
    </div></div>
    <div class="privacy-setting">
    <div class="sep-line7"></div>
    <p id="setprivacy_s_head-">set privacy</p>
    <div class="playlists_lock">
    <p id="plalistlock-note">Lock your playlists.</p><a name="Locking will prevent others from seeing your playlists." class="pl_hint"><p id="hint_lock"></p></a>
    <label>
<input type="checkbox" name="pl-checkbox" class="playlist-lock" id="lock_playlist" />
<div class="lock_switch"></div>
</label></div> <script>
$(document).ready(function(){
$('.lock_switch').click(function(){
$(this).toggleClass("lockOn");
});
});
</script>
<div class="sep-line8"></div></div>
    </div>
    
    
    
    <div class="preference-setting" >
    <div class="sep-line5"></div>
    <p id="setlang_s_head-">set languages</p>
        <div class="lang-pref">
<li class="pref-switch">
    <input type="checkbox" name="pcheckbox" class="prefcheckbox" id="switch_hindi" checked>
    <label class="switch-label" for="switch_hindi">
       <span class="onoffswitch-hindi" id="onoffswitch-inners"></span>
        <span class="btn"></span></label>
 </li>  
 <li class="pref-switch">
    <input type="checkbox" name="pcheckbox" class="prefcheckbox" id="switch_english" checked>
    <label class="switch-label" for="switch_english">
        <span class="onoffswitch-english" id="onoffswitch-inners"></span>
        <span class="btn"></span></label>
 </li>    
  <li class="pref-switch">
    <input type="checkbox" name="pcheckbox" class="prefcheckbox" id="switch_punjabi" checked>
    <label class="switch-label" for="switch_punjabi">
        <span class="onoffswitch-punjabi" id="onoffswitch-inners"></span>
        <span class="btn"></span></label>
 </li>  
   <li class="pref-switch">
    <input type="checkbox" name="pcheckbox" class="prefcheckbox" id="switch_bhojpuri">
    <label class="switch-label" for="switch_bhojpuri">
        <span class="onoffswitch-bhojpuri" id="onoffswitch-inners"></span>
        <span class="btn"></span></label>
 </li>  
   <li class="pref-switch">
    <input type="checkbox" name="pcheckbox" class="prefcheckbox" id="switch_tamil">
    <label class="switch-label" for="switch_tamil">
        <span class="onoffswitch-tamil" id="onoffswitch-inners"></span>
        <span class="btn"></span></label>
 </li>  
   <li class="pref-switch">
    <input type="checkbox" name="pcheckbox" class="prefcheckbox" id="switch_telugu">
    <label class="switch-label" for="switch_telugu">
        <span class="onoffswitch-telugu" id="onoffswitch-inners"></span>
        <span class="btn"></span></label>
 </li> 
  <li class="pref-switch">
    <input type="checkbox" name="pcheckbox" class="prefcheckbox" id="switch_marathi">
    <label class="switch-label" for="switch_marathi">
        <span class="onoffswitch-marathi" id="onoffswitch-inners"></span>
        <span class="btn"></span></label>
 </li> 
 <li class="pref-switch">
    <input type="checkbox" name="pcheckbox" class="prefcheckbox" id="switch_gujarati">
    <label class="switch-label" for="switch_gujarati">
        <span class="onoffswitch-gujarati" id="onoffswitch-inners"></span>
        <span class="btn"></span></label>
 </li>  
 <li class="pref-switch">
    <input type="checkbox" name="pcheckbox" class="prefcheckbox" id="switch_bengali">
    <label class="switch-label" for="switch_bengali">
        <span class="onoffswitch-bengali" id="onoffswitch-inners"></span>
        <span class="btn"></span></label>
 </li> 
</div>
<div class="sep-line6"></div></div>
<section class="saveall_btns"><form method="post" enctype="multipart/form-data">
     <input type="submit" name="saveall" id="save_all" value="Done">
        </form>
</section>
    </div>
   </div>
</body>
</html>	