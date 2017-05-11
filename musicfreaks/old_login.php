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
    $msg = "<img src='images/redtick.png'/><span style='margin-left:7px;'>Incorrect password.</span>";
	  if(empty($_POST["usermail"])){
	  $focusmail2="autofocus";
       }
	   else
	   $focuspass="autofocus";
	}
    else
      $msg = "<img src='images/redtick.png'/><span style='margin-left:7px;'>Sorry, no user exists with this email address.</span>";
  }
     

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
      $msg = "<img src='images/redtick.png'/><span style='margin-left:7px;'>Incorrect password.</span>";
	  if(empty($_POST["usermail"])){
	  $focusmail2="autofocus";
       }
	   else
	   $focuspass="autofocus";
       }
       else
        $msg = "<img src='images/redtick.png'/><span style='margin-left:7px;'>Sorry, no such user exists with this username.</span>";
    }
} else
    {
      $msg = "<img src='images/redtick.png'/><span style='margin-left:7px;'>Fill out all the fields.</span>";
	  if(empty($_POST["usermail"])){
	  $focusmail2="autofocus";
       }
	   else
	   $focuspass="autofocus";
     }
   if ($msg =="")
   {
    $msg = "<img src='images/redtick.png'/><span style='margin-left:7px;'>No such e-mail/username.</span>";
	$focusmail2="autofocus";
   } 
}
/*
$msg1 = "";
if($msg1=="")
$focusmail3="autofocus";*/
if($msg=="<img src='images/redtick.png'/><span style='margin-left:7px;'>Sorry, no such user exists with this username.</span>")
  $focusmail3="autofocus";
  if($msg=="<img src='images/redtick.png'/><span style='margin-left:7px;'>No such e-mail/username.</span>")
 $focusmail3="autofocus";
 
 if($id !=""){
	   $focuspass="autofocus";
  }
  
 if ($msg =="" && $sid=="")
    $focusmail3="autofocus";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" type="image/png" href="images/mf-favicon1.png">
<title>Login into Musicfreaks</title>
<script type="text/javascript" src="functions.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.leanModal.min.js"></script>
<link rel="stylesheet" href="loginstyle.css">
</head>

<body>
<center>
<a href="home"><div class="mf-login-logo" title="Home"></div></a>
  <div class="sepline-jk-1"></div>
    <p id="login-tagline">Login and get access to your playlists.</p>
<div class="loginline"></div>
<div class="error-msg-jk"><?php echo $msg; ?></div><p/>
  <div class="regisform">
<div class="formsizel" style=" background:transparent; width:30%; height:139px;">
   <center>
   <form id="form1" name="form1" method="post">
<div class="loginfields">
    <input type="text" name="usermail" id="usermail" placeholder="Username or E-mail" value="<?php if ($id==""){echo $usermail;} else echo $id;?>" 
    <?php echo $focusmail2; ?> <?php echo $focusmail; ?> <?php echo $focusmail3; ?> />
    <br/>
     <input type="password" name="pass" id="pass" class="remember-chk" placeholder="Password" <?php echo $focuspass; ?> />
      <br/>
      <input type="submit" name="lbutton" id="lbutton" value="Log in" />
  </form> 
 </center>
</div>
  <div class="orline"></div>
 <button type="submit" name="log-with-fb-btn" id="log-with-fb-btn" /><span>Login through facebook</span></button>
<h4><a id="popup-click" href="#forgotpassword"><font  id="fg-pass-jk">Forgot password?</font></a></h4>
 <p><font color="#b1b1b1" face="Trebuchet MS, Arial, Helvetica, sans-serif" size="2px" style="font-weight:normal;">Don't have a freak account?&nbsp;&nbsp; <a href="signup"><font color="#666666">SIGN UP</font></a></font></p>
<div class="copyright" style="width:150px;">
<font color="#b1b1b1" face="Circular,Helvetica,Arial,sans-serif" size="2px" style="font-weight:normal;">
&copy; 2016 Musicfreaks.</font></div>
</center>
<!-- Forgot password popup -->
<div id="forgotpassword" class="fp-container" style="display:none;">
		<section class="popupBody">
			<span>Forgot your password?</span>
            <div class="fg-sepline"></div>
            <p id="fp-msg">Enter your registered email address and we'll send your old password.</p>
            <input class="fp-textb45" name="forgot" type="text" placeholder="Email address"/>
            <input type="button" class="fp-button" value="Get your password" />
            <input type="button" class="_close" value="Close" />
		</section>
</div>
<script type="text/javascript">$("#popup-click").leanModal({top : 160, overlay : .8, closeButton: "._close" });</script>
<!-- Forgot password popup ends -->
</body>

</html>