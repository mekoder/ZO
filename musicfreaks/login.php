<?php
include 'login_status.php';
include "error.php";
include 'conn.php';
session_start();
include 'session.php';

if($sid=="" && $smail == "" && $spass == ""){
  header(""); 
}
 else{ 
       header ("location:home");
      } 
      
$id= $_GET['id'];

 // USER IP ADDRESS
      if (!empty($_SERVER ["HTTP_CLIENT_IP"]) ){
$ip = $_SERVER["HTTP_CLIENT_IP"];
}
elseif (!empty($_SERVER ["HTTP_X_FORWARDED_FOR"]) ){
   $ip =$_SERVER ["HTTP_X_FORWARDED_FOR"];
}
  else{
       $ip = $_SERVER ["REMOTE_ADDR"];
    }

$msg = "";
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

$focuspass="";
$focusmail="";
$focusmail2="";

extract($_POST);
if(isset($lbutton))
{
  if (!empty($_POST["usermail"]) && !empty($_POST["pass"])) {


//WHEN USER ENTER EMAIL ID
    $usermail = test_input($_POST["usermail"]);
    if (filter_var($usermail, FILTER_VALIDATE_EMAIL)) 
  {
      $pass = test_input($_POST["pass"]);
      $usermail= strtolower ($usermail);
      $sel=mysqli_query($link,"SELECT username, mail, pass from musicfreaks_users where mail='$usermail'");
      $arr=mysqli_fetch_array($sel);
      $pass = base64_encode($pass);
      $pass = md5($pass);
      $pass = substr($pass, 8,8);
      if($usermail==$arr['mail'] and $pass==$arr['pass'])
      {
      session_start();
      $sid = $_SESSION['sid']=$arr['username'];
      $smail = $_SESSION['mail']=$arr['mail'];
      $spass = $_SESSION['pass']=$arr['pass'];
      setcookie("id", $sid, strtotime( '+30 days' ), "/", "", "", TRUE);
      setcookie("user", $smail, strtotime( '+30 days' ), "/", "", "", TRUE);
      setcookie("content", $spass, strtotime( '+30 days' ), "/", "", "", TRUE);
      mysqli_query($link,"UPDATE musicfreaks_users SET ip = '$ip' WHERE username = '$sid'");
      $_SESSION['sid']=$arr['username'];
      $user = $_GET['u'];
      if ($user == "")
      header("location:home?$ip");
      else
      header("location:u/$user");
    }
    if($usermail==$arr['mail'] and $pass !==$arr['pass']) {
    $msg = "<span style='margin-left:7px;'>Incorrect password.</span>";
      if(empty($_POST["usermail"])){
      $focusmail2="autofocus";
       }
       else
       $focuspass="autofocus";
    }
    else
      $msg = "<span style='margin-left:7px;'>Sorry, no user exists with this email address.</span>";
  }


//WHEN USER ENTER USERNAME
     $usermail = test_input($_POST["usermail"]);
    if (preg_match("/^[a-zA-Z0-9_]*$/",$usermail)) {
      $pass = test_input($_POST["pass"]);
      $usermail= strtolower ($usermail);
      $sel=mysqli_query($link,"SELECT username, pass, mail from musicfreaks_users where username='$usermail'");
    $arr=mysqli_fetch_array($sel);
    $pass = base64_encode($pass);
    $pass = md5($pass);
    $pass = substr($pass, 8,8);
    if($usermail==$arr['username'] and $pass==$arr['pass']) {
      

      // USER IP ADDRESS

      session_start();
      $sid = $_SESSION['sid']=$arr['username'];
      $smail = $_SESSION['mail']=$arr['mail'];
      $spass = $_SESSION['pass']=$arr['pass'];
      setcookie("id", $sid, strtotime( '+30 days' ), "/", "", "", TRUE);
      setcookie("user", $smail, strtotime( '+30 days' ), "/", "", "", TRUE);
      setcookie("content", $spass, strtotime( '+30 days' ), "/", "", "", TRUE);
      mysqli_query($link,"UPDATE musicfreaks_users SET ip = '$ip' WHERE username = '$sid'");


      $_SESSION['sid']=$arr['username'];
      $user = $_GET['u'];
      if ($user == "")
      header("location:home?$ip");
      else
      header("location:u/$user");
     } if($usermail==$arr['username'] and $pass !==$arr['pass']) {
      $msg = "<span style='margin-left:7px;'>Incorrect password.</span>";
      if(empty($_POST["usermail"])){
      $focusmail2="autofocus";
       }
       else
       $focuspass="autofocus";
       }
       else
        $msg ="<span style='margin-left:7px;'>Sorry, no such user exists with this username.</span>";
    }
} else
    {
      $msg = "<span style='margin-left:7px;'>Fill out all the fields.</span>";
      if(empty($_POST["usermail"])){
      $focusmail2="autofocus";
       }
       else
       $focuspass="autofocus";
     }
   if ($msg =="")
   {
    $msg = "<span style='margin-left:7px;'>No such e-mail/username.</span>";
    $focusmail2="autofocus";
   } 
}
/*
$msg1 = "";
if($msg1=="")
$focusmail3="autofocus";*/
if($msg=="<span style='margin-left:7px;'>Sorry, no such user exists with this username.</span>")
  $focusmail3="autofocus";
  if($msg=="<span style='margin-left:7px;'>No such e-mail/username.</span>")
 $focusmail3="autofocus";
 
 if($id !=""){
       $focuspass="autofocus";
  }
  
 if ($msg =="" && $sid=="")
    $focusmail3="autofocus";
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>New Signup</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<link href="//fonts.googleapis.com/css?family=Raleway:100normal,100italic,200normal,200italic,300normal,300italic,400normal,400italic,500normal,500italic,600normal,600italic,700normal,700italic,800normal,800italic,900normal,900italic|Open+Sans:400normal|Lato:400normal|Roboto:400normal|Oswald:400normal|Droid+Sans:400normal|Droid+Serif:400normal|Lobster:400normal|PT+Sans:400normal|Ubuntu:400normal|Playfair+Display:400normal&amp;subset=all" rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href="signlog.css" rel="stylesheet" type="text/css">
</head>

<body>
	<!--<div class="useracc-nav"></div>-->
    	<div class="box-container">
        	<div class="login-box">
            <div class="gz-logo"><img src="assets/images/mainnnnnnn_logo.png" /></div>
            	<p class="cck-msg">Log in to get access to your playlists.</p>
            	<form id="form1" name="form1" method="post">
            	<input type="text" class="un_field text_box" id="usermail" name="usermail"  placeholder="Username or Email" value="<?php if ($id==""){echo $usermail;} else echo $id;?>" <?php echo $focusmail2; ?> <?php echo $focusmail; ?> <?php echo $focusmail3; ?> />
            	<input type="password" class="pass_field text_box" id="pass" name="pass"  placeholder="Password"  <?php echo $focuspass; ?>/>
            	<input type="submit" class="login-btn" id="lbutton" name="lbutton" value="Log in">
            	</form>
                	<div class="hr">
                    	<p class="or">or</p>
                    </div>
                    	<button class="fb_login" name="fb_login"><span>Login with Facebook</span></button>
                        	<div class="fg-pass">Forgot Password?</div>
                        	<div class="error-msg"><?php echo $msg; ?></div>                                
            </div>
            	<div class="goformf">
                	<p class="goformf-msg">Don't have a freak account? <a href="signup" class="link">SIGN UP</a></p>
                </div>
        </div>
<script>
$(document).ready(function(e) {
    $('.login-btn').click(function(e) {
       $('.error-msg').css('display','block'); 
    });
});
</script>
</body>
</html>