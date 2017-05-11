<?php
include 'login_status.php';
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
include ("error.php");
include'conn.php';
{ session_start();$sid= $_SESSION['sid'];
if($sid==""){ header("");} else    {     header ("location:home");}}
if($sid=="")
{
  $sid="";
}
// define variables and set to empty values
$nameErr = $mailErr = $nameErr1 = $mailErr1 = $passErr = "";
$username = $mail  = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["username"])) {
    $nameErr = "<img src='images/redtick.png'/><span style='margin-left:7px;'>Choose a username.</span>";
  } else {
    $username = test_input($_POST["username"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z0-9]*$/",$username)) {
      $nameErr = "<img src='images/redtick.png'/><span style='margin-left:7px;'>Only letters and numbers allowed.</span>"; 
    } else 
  { 
      $username1 = explode(" ", $username);
    $acronym = "";
         foreach ($username1 as $w) 
         $acronym .= $w[0];
       if (!preg_match('/^[a-zA-Z]*$/',$acronym)){
      $nameErr = "<img src='images/redtick.png'/><span style='margin-left:7px;'>Sorry, username can't be start with a number.</span>";
  }
  else
    { 
      $username= strtolower ($username);  
      $sel=mysqli_query($link,"select username from musicfreaks_users where username='$username'");
      if(mysqli_num_rows($sel)>=1) {
      $nameErr="<img src='images/redtick.png'/><span style='margin-left:7px;'>Sorry, this username is taken. Try another</span>";
    }else
    $nameErr1="<img src='images/bluetick.png'/>";
   }
  }
  }
  if (empty($_POST["mail"])) {
    $mailErr = "<img src='images/redtick.png'/><span style='margin-left:7px;'>Enter an e-mail address.</span>";
  } else {
    $mail = test_input($_POST["mail"]);
    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
      $mailErr = "<img src='images/redtick.png'/><span style='margin-left:7px;'>Enter a valid e-mail address.</span>"; 
    }else 
    {  $mail= strtolower ($mail); 
     $sel=mysqli_query($link,"select mail from musicfreaks_users where mail='$mail'");
     if(mysqli_num_rows($sel)>=1) {
     $mailErr="<img src='images/redtick.png'/><span style='margin-left:7px;'>Enter e-mail address which you own.</span>";
    }
    else
    $mailErr1="<img src='images/bluetick.png'/>";
   }
  } 
    if (empty($_POST["pass"])) {
    $passErr = "<img src='images/redtick.png'/><span style='margin-left:7px;'>Enter password.</span>";
  } else {
    $pass = test_input($_POST["pass"]);
    $passcount = strlen($pass);
    if ($passcount < 5)
    {
      $passErr="<img src='images/redtick.png'/><span style='margin-left:7px;'>Enter password at least 5 characters long.</span>";
    }
  }
      $pass = base64_encode($pass);
    $pass = md5($pass);
    $pass = substr($pass, 8,8);
  $msg1 = $nameErr;
  $msg2 = $mailErr; 
  $msg3 = $passErr;
    if($msg1=="" && $msg2 == "" && $msg3 == "")
  {
    mysqli_query($link,"INSERT into musicfreaks_users (username,mail,pass,ondateregister) VALUES('$username','$mail','$pass',now() )");
  
    header("location:login.php?id=$username&uf=focus");
  

  }

}

if (empty($_POST["username"])) {
   $focusuname = "autofocus";
   //exit();
 }
 if ($nameErr !=="") {
    $focusuname = "autofocus";
}


if (empty($_POST['mail'])) {
   $focusmail = "autofocus";
  // exit();
}
if ($mailErr !== "") {
  $focusmail = "autofocus";
}

 if (empty($_POST['pass'])) {
   $focuspass = "autofocus";
  //exit(); 
}
if ($passErr !=="") {
  $focuspass = "autofocus";
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" type="image/png" href="images/mf-favicon1.png">
<link rel="stylesheet" href="signupstyle.css">
<script type="text/javascript" src="functions.js"></script>
<script src="js/2.2.0_jquery.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<title>Sign up for Musicfreaks</title>
</head>

<body>
<center>
  <center><a href="home"><div class="mf-signup-logo" title="Home"></div></a></center>
   <div class="sepline-jk-1"></div>
<center>
   <p id="signup-tagline">Sign up and make your own free playlists.</p>
</center>
<div class="signline"></div>
<script type="text/javascript">
       $(document).ready(function() {
        $("#username").keyup(function(){
        if ( $("#username").val()==""){
       $("#user-result").hide();
       }else
       {
        $("#user-result").show();
       }
         var x_timer;    
         $("#username").keyup(function (e){
        clearTimeout(x_timer);
        var user_name = $(this).val();
        x_timer = setTimeout(function(){
            check_username_ajax(user_name);
        }, 1000);
    });
        function check_username_ajax(username){
        $("#user-result").html('<img src="images/load2.gif" class="loadgif">');
        $.post('username-checker.php', {'username':username}, function(data) {
        $("#user-result").html(data);
     });
    }
   }); 
  });
  </script>
  <script type="text/javascript">
       $(document).ready(function() {
        $("#mail").keyup(function(){
        if ( $("#mail").val()==""){
       $("#mailava").hide();
       }else
       {
        $("#mailava").show();
       }
         var x_timer;    
         $("#mail").keyup(function (e){
        clearTimeout(x_timer);
        var user_name = $(this).val();
        x_timer = setTimeout(function(){
            check_mail_ajax(user_name);
        }, 1000);
    }); 
        function check_mail_ajax(mail){
        $("#mailava").html('<img src="images/load2.gif">');
        $.post('mail-checker.php', {'mail':mail}, function(data) {
        $("#mailava").html(data);
     });
    }
   }); 
   });
  </script>
 <div class="error-msg-jk" id="error-msg-jk"><?php ?></div> <p/>
<div class="" style=" position:absolute;margin: -15px 665px;height:20px; width:20px; "></div>
  <div class="regisform">
<div class="formsize" style=" background:rgb(255,255,255); width:30%; height: 214px; border=0%;">
  <form id="form1" name="form1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
  <center>
    <div class="regisfields">  
        <input type="text" name="username" id="username" placeholder="Choose a username" maxlength="22" size="5" autocomplete="off" value="<?php echo $username; ?>" <?php echo $focusuname; ?>  />
        <div class="userava" id="user-result" style="width:500px; position: absolute;margin-top: -29px;margin-left: 365px;display: block;color: rgba(255,65,65,0.9);font-family: Segoe UI, Tahoma, sans-serif;font-weight: 600; font-size: 13px; text-align:left;"></div>
    <div id="nameErr" style=" width:500px;position: absolute;margin-top: -29px;margin-left: 365px;display: block;color: rgba(255,65,65,0.9);font-family: Segoe UI, Tahoma, sans-serif;font-weight: 600; font-size: 13px; text-align:left;"><?php echo $nameErr;?> <?php echo $nameErr1;?> </div><script> $("#username").keyup(function(){ $("#nameErr").fadeOut(800); });</script>
    <br/>
     
       <input type="text" name="mail" id="mail" placeholder="E-mail address"  maxlength="54" size="5" value="<?php echo $mail; ?>" <?php echo $focusmail; ?>/>
      <div class="mailava" id="mailava" style="width:500px; position:absolute;margin:-29px 365px;display: block;color: rgba(255,65,65,0.9);font-family: Segoe UI, Tahoma, sans-serif;font-weight: 600;font-size: 13px; text-align:left;"></div>
      <div id="mailErr" style="width:500px; position:absolute;margin:-29px 365px;display: block;color: rgba(255,65,65,0.9);font-family: Segoe UI, Tahoma, sans-serif;font-weight: 600;font-size: 13px; text-align:left;"><?php echo $mailErr;?> <?php echo $mailErr1;?> </div><script> $("#mail").keyup(function(){ $("#mailErr").fadeOut(800); });</script>
      <br/>
      <input type="password" name="pass" id="pass" placeholder="Password" <?php echo $focuspass; ?>/>
      <br/>
      <div id="passErr" style="width:500px; position:absolute;margin:-29px 365px;display: block;color: rgba(255,65,65,0.9);font-family: Segoe UI, Tahoma, sans-serif;font-weight: 600;font-size: 13px; text-align:left;"><?php echo $passErr;?></div><script> $("#pass").keyup(function(){ $("#passErr").fadeOut(800); });</script>
     <input id="pass-show-jk" type="button" onclick="togglePassword()" style="background:url(images/pass-show.png); background-repeat:no-repeat;" title="Show/Hide Password">
     <script>
     function togglePassword() {
	var pass = document.getElementById('pass');
	var toggleBtn = document.getElementById('pass-show-jk');
        if(pass.type == "password"){
		pass.type = "text";
		toggleBtn.style.background = "url(images/pass-showactive.png) no-repeat";
		pass.style.color = "#444";
	} else {
		pass.type = "password";
		toggleBtn.style.background = "url(images/pass-show.png) no-repeat";
		pass.style.color = "#444";
	}
}
     </script>
   <br />
      <input type="submit" name="rbutton" id="rbutton" value="Sign up" onclick="myFunction()"/>
    </div>
  </form> 
 </center>

</div>
</div>
<center>
  <div class="orline"></div>
</center>
 <button type="submit" name="sign-with-fb-btn" id="sign-with-fb-btn"/><span>Signup with facebook</span></button>
 <p> <font color="#b1b1b1" face="Trebuchet MS, Arial, Helvetica, sans-serif" size="2px" style="font-weight:normal;"> By signing up you agree to our <a href="#"><font color="#777">Privacy Policy.</font></a></font> </p>
 <p> <font color="#b1b1b1" face="Trebuchet MS, Arial, Helvetica, sans-serif" size="2px" style="font-weight:normal;">Already have a freak account?&nbsp;&nbsp; <a href="login"><font color="#666666">LOG IN</font></a></font> </p>
<div class="copyright" style="width:150px;">
<font color="#b1b1b1" face="Circular,Helvetica,Arial,sans-serif" size="2px" style="font-weight:normal;">
&copy; 2016 Musicfreaks.</font></div>
</body>
</html>