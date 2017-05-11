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
   // <img src='images/redtick.png'/>
    $nameErr = "<span style='margin-left:7px;'>Choose a username.</span>";
  } else {
    $username = test_input($_POST["username"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z0-9]*$/",$username)) {
      $nameErr = "<span style='margin-left:7px;'>Only letters and numbers allowed.</span>"; 
    } else 
  { 
      $username1 = explode(" ", $username);
    $acronym = "";
         foreach ($username1 as $w) 
         $acronym .= $w[0];
       if (!preg_match('/^[a-zA-Z]*$/',$acronym)){
      $nameErr = "<span style='margin-left:7px;'>Sorry, username can't be start with a number.</span>";
  }
  else
    { 
      $username= strtolower ($username);  
      $sel=mysqli_query($link,"select username from musicfreaks_users where username='$username'");
      if(mysqli_num_rows($sel)>=1) {
      $nameErr="<span style='margin-left:7px;'>Sorry, this username is taken. Try another</span>";
    }else
    $nameErr1="<img src='images/bluetick.png'/>";
   }
  }
  }
  if (empty($_POST["mail"])) {
    $mailErr = "<span style='margin-left:7px;'>Enter an e-mail address.</span>";
  } else {
    $mail = test_input($_POST["mail"]);
    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
      $mailErr = "<span style='margin-left:7px;'>Enter a valid e-mail address.</span>"; 
    }else 
    {  $mail= strtolower ($mail); 
     $sel=mysqli_query($link,"select mail from musicfreaks_users where mail='$mail'");
     if(mysqli_num_rows($sel)>=1) {
     $mailErr="<span style='margin-left:7px;'>Enter e-mail address which you own.</span>";
    }
    else
    $mailErr1="<img src='images/bluetick.png'/>";
   }
  } 
    if (empty($_POST["pass"])) {
    $passErr = "<span style='margin-left:7px;'>Enter password.</span>";
  } else {
    $pass = test_input($_POST["pass"]);
    $passcount = strlen($pass);
    if ($passcount < 5)
    {
      $passErr="<span style='margin-left:7px;'>Enter password at least 5 characters long.</span>";
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
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>New Signup</title>
<script src="js/2.2.0_jquery.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<link href="//fonts.googleapis.com/css?family=Raleway:100normal,100italic,200normal,200italic,300normal,300italic,400normal,400italic,500normal,500italic,600normal,600italic,700normal,700italic,800normal,800italic,900normal,900italic|Open+Sans:400normal|Lato:400normal|Roboto:400normal|Oswald:400normal|Droid+Sans:400normal|Droid+Serif:400normal|Lobster:400normal|PT+Sans:400normal|Ubuntu:400normal|Playfair+Display:400normal&amp;subset=all" rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href="signlog.css" rel="stylesheet" type="text/css">
</head>
<body>
	<!--<div class="useracc-nav"></div>-->
    	<div class="box-container">
        	<div class="signup-box">
            <div class="gz-logo"><img src="assets/images/mainnnnnnn_logo.png" /></div>
            	<p class="cck-msg">Sign up and make your own free playlists.</p>
                	<button class="fb_login" name="fb_login"><span>Signup with Facebook</span></button>
                    	<div class="hr">
                        	<p class="or">or</p>
                        </div>
<form id="form1" name="form1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
	<div>
    	<input type="text" class="un_field text_box" id="username" name="username"  placeholder="Username" value="<?php echo 						$username; ?>" <?php echo $focusuname; ?> autocomplete="off"/>
        <div class="userava" ID="user-result"> </div>
    </div>
    <div>
    	<input type="text" class="em_field text_box" id="mail" name="mail" autocomplete="off"  placeholder="Email" value="<?php echo $mail; ?>" <?php echo $focusmail; ?>/>
        <div id="mailava"></div>
    </div>
    <div>
    	<input type="password" class="pass_field text_box" id="pass" name="pass" autocomplete="off"  placeholder="Password" <?php echo $focuspass; ?>/>
        <div id="passava"></div>
    </div>
    <input type="submit" class="signup-btn" id="rbutton" name="rbutton" value="Sign up">
</form>
                               
<!-- <div class="error-msg">
	<div class="userava" id="user-result" style="color: rgba(255,65,65,0.9);"></div>
		<div id="nameErr" style="color: rgba(255,65,65,0.9);"><?php echo $nameErr;?> <?php echo $nameErr1;?> </div>
        <script> $("#username").keyup(function(){ $("#nameErr").fadeOut(800); });</script>
			<div class="mailava" id="mailava" style="color: rgba(255,65,65,0.9);"></div>
            <div id="mailErr" style="color: rgba(255,65,65,0.9);"><?php echo $mailErr;?> <?php echo $mailErr1;?> </div><script> $("#mail").keyup(function(){ $("#mailErr").fadeOut(800); });</script>
				<div id="passErr" style="color: rgba(255,65,65,0.9);"><?php echo $passErr;?></div><script> $("#pass").keyup(function(){ $("#passErr").fadeOut(800); });</script>
				</div> -->
                                <p class="agree-msg">By signing up, you agree to our 
                                    <a href="#" class="bold-link">Privacy Policy</a>
                                </p>
            </div>
            	<div class="goformf">
                	<p class="goformf-msg">Already have a freak account? <a href="login" class="link">LOG IN</a></p>
                </div>
        </div>
<script>
$(document).ready(function(e) {
    $('.signup-btn').click(function(e) {
       $('.error-msg').css('display','block'); 
    });
});
</script>

<script type="text/javascript">
       $(document).ready(function() {
        $("#username").on('keyup change blur',function(){
       /*if ( $("#username").val()==""){
       $("#user-result").hide();
       }else
       {
        $("#user-result").show();
       }*/
         var x_timer;    
         $("#username").keyup(function (e){
        clearTimeout(x_timer);
        var user_name = $(this).val();
        x_timer = setTimeout(function(){
            check_username_ajax(user_name);
        }, 1000);
    });
        function check_username_ajax(username){
        //$("#user-result").html('<span><img src="images/load2.gif" class="loadgif"></span>');
        $.post('username-checker.php', {'username':username}, function(data) {
        $("#user-result").html(data);
     });
    }
   }); 
  });
  </script>
  <script type="text/javascript">
       $(document).ready(function() {
        $("#mail").on('keyup change blur', function(){
        /*if ( $("#mail").val()==""){
       $("#mailava").hide();
       }else
       {
        $("#mailava").show();
       }*/
         var x_timer;    
         $("#mail").keyup(function (e){
        clearTimeout(x_timer);
        var user_name = $(this).val();
        x_timer = setTimeout(function(){
            check_mail_ajax(user_name);
        }, 1000);
    }); 
        function check_mail_ajax(mail){
       // $("#mailava").html('<img src="images/load2.gif">');
        $.post('mail-checker.php', {'mail':mail}, function(data) {
        $("#mailava").html(data);
     });
    }
   }); 
   });
  </script>
   <script type="text/javascript">
       $(document).ready(function() {
        $("#pass").on('keyup change blur', function(){
         var x_timer;    
         $("#pass").keyup(function (e){
        clearTimeout(x_timer);
        var user_name = $(this).val();
        x_timer = setTimeout(function(){
            check_mail_ajax(user_name);
        }, 1000);
    }); 
        function check_mail_ajax(pass){
       // $("#mailava").html('<img src="images/load2.gif">');
        $.post('pass-checker.php', {'pass':pass}, function(data) {
        $("#passava").html(data);
     });
    }
   }); 
   });
  </script>
   
</body>
</html>