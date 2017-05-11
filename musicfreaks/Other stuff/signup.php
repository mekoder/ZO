<?php
include_once('conn.php');
if(isset($_POST['rbutton']))
{
$uname = $_POST['username'];
$email = $_POST['mail'];
$password = $_POST['pass'];
	$password=md5($password);// encript
mysql_query("insert into musicfreaks_users (username,mail,pass) VALUES ('$uname','$email','$password')");
 
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Musicfreaks - Signup </title>
<link rel="stylesheet" href="nav.css">
<link rel="stylesheet" href="footer.css">
</head>

<body bgcolor="#f0f0f0" >
<nav id="nav-main">
 <div class="hmlogo">
  <div class="lxl"> <a href="home.php"><img src="images/homelogo.png" width="57" height="52" /> </a> </div>
 <div class="lxm"> <a href="home.php"> <img src="images/titlelogo.png" width="192" height="29" />  </a> </div> 
 </div>



<div class="light">
  <form style="
    width: 0px;
    height: 0px;
">
	<span>
    <input type="text" class="search rounded" placeholder="Search" onfocus="this.placeholder = 'Bohemia, Arijit Singh, Rock..'" onblur="this.placeholder = 'Search'"/>
   </span>
  </form>
</div>  
<div class="ls">
<ul>
<li id="logb">
<a href="login.php" style="padding: 0px 0px; color:#FFF">Login</a> 
</li>
<li id="signb">
<a href="signup.php" style="padding: 0px 0px; color: #FFF">Signup</a>
</li>
</ul>
</div>
</nav>
 
<center>

  <div class="regisform">
  <img src="images/Vaise/musique.png" id="musicpic" width="600" height="280" align="left"/>
   <form class="logocenter" style=" background:rgb(255,255,255); width:30%; border=9%;">
    <span class="logocenter1" style=" background:rgb(255,255,255); width:30%; border=9%;"><img src="images/logo4.png" width="199" height="36" />
   <font face="Leelawadee UI" size=4><p id="sloganl">Play all your favorites just at one click.</p></font></span>
  </form><br><br>  
<div class="formsize" style=" background:rgb(255,255,255); width:30%; height: 20%; border=9%;">
  

  <form id="form1" name="form1" method="post">
  <center>
      <p><font color="#999999" size="+3" face="Leelawadee UI" >Sign up</font></p>
</center>
  <center>
    <div class="regisfields">  
      <p>
        <label for="username"></label>
        <input type="text" name="username" id="username" placeholder="Choose a username" required/>
      </p>
      <p>&nbsp; </p>
      <p>
        <label for="mail"></label>
      <input type="text" name="mail" id="mail" placeholder="Enter your e-mail" required/>
  </p>
      <p>&nbsp;</p>
    <p>
      <input type="password" name="pass" id="pass" placeholder="Password" required/>
    </p>
    <p>&nbsp;</p>
    <p>
      <label for="cpass"></label>
      <input type="password" name="cpass" id="cpass" placeholder="Re-enter password" required/>
    </p>
    <p>&nbsp; </p>
    <p>
      <input type="submit" name="rbutton" id="rbutton" value="Sign Up" />
    </p> </div>
  </form> 
 </center>

</div>
</div>
<p>
</center>



<style type="text/css">

.logocenter {
	padding-top:5px;
padding-bottom:45px;
height:45px;
margin-left:50%;
padding-right:0%;
left:0;
text-align:center;
text-color:#0ecedb;
}

form#form1 {
	padding-top:0px;
	padding-bottom:0px;
	padding-left: 0px;
	}
.formsize {
padding-top:25px;
padding-bottom:25px;
margin-left:50%;
padding-right:0%;
left:0;
top:10%;
text-align:center;
border-top: 2px solid #0ecedb;
	
	}
	
#musicpic{
	margin-top:120px;
	}	

.regisform {
	padding-bottom:15%;
	padding-top:10%;
	padding-left:0%;
	padding-right:0%;
	}
	.regisform input[type="password"]{
		color:#0ecedb;
	}
	.regisform input[type="submit"]{
		font-size:20px;
		font-family:Arial, Helvetica, sans-serif;
		font-style:italic;
	box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    width: 60%;
    padding:2%;
    background: #0ecedb;
    border-bottom: 3px solid #099da7;
    border-top-style: none;
	border-radius:25px;
    border-right-style: none;
    border-left-style: none;    
    color: #fff;
	cursor:pointer;
	outline:none; }
	.regisform input[type="submit"]:hover {
		background-color:#1699a2;}
	
	.regisfields {
	padding-top:5%;
	padding-bottom:0%;
	left:60px;
	right:0%;
	text-align:center;
	padding-left:0%;	
		}
		input#username {
		padding:7px 13px;
		font-family:Arial, Helvetica, sans-serif;
		font-style:italic;
		font-size:16px;
		padding-left:12px;
		border-radius:15px;
		width:50%;
		background-color:#FFF;
		outline:none;
		border:transparent;
			}
			input#mail {
		padding:7px 13px;
		font-family:Arial, Helvetica, sans-serif;
		font-style:italic;
		font-size:16px;
		padding-left:12px;
		width:50%;
    	 border-radius:15px;
		background-color: #FFF;
		outline:none;
		border:transparent;}
	input#pass {
		padding:7px 13px;
		font-family:Arial, Helvetica, sans-serif;
		font-style:italic;
		font-size:16px;
		padding-left:12px;
    	border-radius:15px;
		width:50%;
		background-color: #FFF;
		outline:none;
		border:transparent;
	}
	input#cpass {
		padding:7px 13px;
		font-family:Arial, Helvetica, sans-serif;
		font-style:italic;
		font-size:16px;
		padding-left:12px;
		width:50%;
		border-radius:15px;
		background-color: #FFF;
		outline:none;
		border:transparent;
		}
</style>


<div class="page-wrap"> 
</div>

</body>

<footer class="site-footer">



<div class="footer-inner">
<div class="forcefully"> 
<div class="footer-logo">
 <img src="images/footer-logo.png" width="210" height="40" />  
</div>
<div class="horizontal-line"></div>

<nav class="menu" style="width:1100px;">
<ul class="footerUL2" style="width:1100px;">

<li class="list1"> <a href="#">Sign Up</a>
    <ul style="margin-top:5px;"><a href="#">Log In</a></ul>
</li>
<li class="sb1" style="width:180px;">
<div id="footer-follow"><p style="width:150px;"><font face="Arial, Helvetica, sans-serif" size="-1" color="#9c9c9c"><i> &nbsp;&nbsp;STAY TUNED:</i><p /></font></div>
       <ul>
         <div id="footer-follow1"><span class="fbsmallicon"><a href="https://www.facebook.com/Musicfreaksdotin"><img src="images/beforefblogo.png"           width="30" height="30" title="Musicfreaks - Facebook"/></a></span>&nbsp;<span class="instasmallicon"><a href="https://www.instagram.com/Musicfreaks"><img src="images/beforeinstlogo.png" width="30" height="30" title="Musicfreaks - Instagram"/></a></span>&nbsp;<span class="twitsmallicon"><a href="https://www.twitter.com/Musicfreaks"><img src="images/beforetwitlogo.png" width="30" height="30" title="Musicfreaks - Twitter"/></a></span> 
         </div> 
       </ul>
</li>
 
</ul>
</nav>

<nav class="menu1" style="width:500px;">
<ul class="footerUL">

<li class="list2" style="width:230px;"><a href="#">Home</a>
   <ul style="margin-top:5px;"><a href="about.php">About</a></ul> 
   <ul style="margin-top:5px;"><a href="#">Blog</a></ul>
   <ul style="margin-top:5px;"><a href="#">Feedback</a></ul>
   
</li>
<li class="list3" style="width:205px;"><a href="#">Help Center</a>
    <ul style="margin-top:5px;"><a href="#">Privacy</a></ul>
    <ul style="margin-top:5px;"><a href="#">Terms</a></ul>
</li>

<li>
<div class="copyright" style="width:150px;">
<font color="#b1b1b1" face="Circular,Helvetica,Arial,sans-serif" size="2px" style="font-weight:normal;">
&copy; 2015 Musicfreaks.</font>
</div>

</li>

</ul>

</nav>
</div>
</div>

</footer>

</html>