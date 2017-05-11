<?php
$link=mysqli_connect("localhost","root","","musicfreaks") or die("Not connect to mysql");

         session_start();
$sid=$_SESSION['sid'];
// for blank session
if($sid=="")
{
	header("location:index.php");
}
		  
	/*{	
		
		  session_start();
		 $usermail= $_SESSION['usermail'];
		  //$_SESSION['sid']=$arr['usermail'];
		 // $sid= $_SESSION['usermail'];
//$sid=$_SESSION['usermail'];
//$sql = "SELECT username FROM MyGuests";

$sel=mysqli_query($link,"select username from musicfreaks_users where username='$usermail' OR mail='$usermail'");
		//$sel=mysqli_query($link,"select username from musicfreaks_users where mail='$usermail' or username='$usermail'");
		$arr=mysqli_fetch_array($sel);
		
		
		
		$mail= implode($arr);
		//$username= $mail;
		}	

*/




if($sid=="")
{
	header("location:index.php");
}
		  	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Musicfreaks - MyProfile</title>
</head>
<script type="text/javascript" src="functions.js"></script>
<link rel="stylesheet" href="nav.css">
<link rel="stylesheet" href="footer.css">
<body bgcolor="#f0f0f0">

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
<a href="home.php" style="padding: 0px 0px; color:#FFF">Home</a> 
<!-- <a href="login.php" style="padding: 0px 0px; color:#FFF">Login</a> -->
</li>
<li id="signb">
<!-- <a href="signup.php" style="padding: 0px 0px; color: #FFF">Signup</a> -->
</li>
</ul>
</div>
  </nav>
  
  
  <div class="container">
  <div class="pcover">
  <div class="header-name" align="center">
  <h1 align="center" style=" font-size:35px;"><font face="Arial, Helvetica, sans-serif" 
  style="font-style:italic; 
  color:#FFFFFF;"><?php echo $sid;?> <?php echo str_repeat("&nbsp;", 3);?>
<a href="logout.php">Logout</a></font> <a title="Verified Artist" class="tooltip"><span title=""><img src="images/verified-logo7.png" width="16" height="16" /></span></a> </h1> 
  </div>
   <div align="center" class="profile-pic">
   <img src="images/sdh3.jpg"
    style="width:170px; 
    height:170px; 
    border-radius: 50%;
    margin-top:3.2%;
    box-shadow: 0px 0.8px 0.4px 0.8px #D2D2D2;" />
   
  </div>
  </div>
</div>

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
    <ul style="margin-top:5px;"><a href="#">Privacy Policy</a></ul>
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