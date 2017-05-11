<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Musicfreaks - Signup</title>

<style type="text/css">
a {
  position: relative;
  color: #b1b1b1;
  text-decoration: none;
}

 a:hover {
  color: #333;
}
a:before {
  content: "";
  position: absolute;
  width: 100%;
  height: 1px;
  bottom: 0;
  left: 0;
  background-color: #333;
  visibility: hidden;
  -webkit-transform: scaleX(0);
  transform: scaleX(0);
  -webkit-transition: all 0.3s ease-in-out 0s;
  transition: all 0.2s ease-in-out 0s;
}
a:hover:before {
  visibility: visible;
  -webkit-transform: scaleX(1);
  transform: scaleX(1);
}


form#form1 {
	padding-top:0px;
	padding-bottom:0px;
	padding-left: 0px;
	}
.formsize1 {
padding-top:0px;
padding-bottom:0px;
margin-left:0%;
padding-right:0%;
left:0;
top:10%;
text-align:center;
	
	}
		

.regisform {
	padding-bottom:0%;
	padding-top:0px;
	padding-left:0%;
	padding-right:0%;
	}
	.regisform input[type="password"]{
		color:#0ecedb;
	}
	
	
	#log-with-fb-btn:hover{
	background-color:#2b457d;
	}
	#log-with-fb-btn:focus{
	background-color:#2b457d;
	}
	#log-with-fb-btn{
		color:#FFFFFF;
		font-size:15px;
		background-repeat:no-repeat;
		font-weight:normal;
		margin-left:4px;
		margin-top:10px;
		font-family:Tahoma;
		background-image:url(images/fb2.png);
		background-color:#3B5998;
		width:30%;
		height:45px;
		border-radius:25px;
		border: 0px solid transparent;
		outline:none;
		cursor:pointer;
		}
	.regisform input[id="lbutton"]{
	font-size:15px;
	font-family:Arial, Helvetica, sans-serif;
	font-style:normal;
	text-align:center;
	box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    width: 96%;
	height:35px;
    padding:2%;
	padding-left:10px;
    background: #868686;
    border-bottom: 0px solid transparent;
    border-top-style: none;
	border-radius:25px;
    border-right-style: none;
    border-left-style: none;    
    color: #fff;
	cursor:pointer;
	outline:none; }
	.regisform input[type="submit"]:hover {
		background-color:#0ecedb;}
		.regisform input[type="submit"]:focus {
		background-color:#0ecedb;}
	
	.loginfields {
	padding-top:0%;
	padding-bottom:0%;
	left:60px;
	right:0%;
	outline:none;
	text-align:center;
	padding-left:0%;	
		}
		::-webkit-input-placeholder {
         color: #d8d8d8;
	}
		
			input#usermail {
		text-align:center;
		padding:8px 13px;
		border:1px solid #d7d7d7;
		color:#0ecedb;
		font-family:Arial, Helvetica, sans-serif;
		font-style:italic;
		font-size:16px;
		padding-left:12px;
		width:90%;
    	 border-radius:25px;
		background-color: #FFF;
		outline:none;
		box-shadow:inset 0 1px 0.5px 0.5px rgba(0,0,0,.07);
		}
	input#pass {
		text-align:center;
		padding:8px 13px;
		border:1px solid #d7d7d7;
		font-family:Arial, Helvetica, sans-serif;
		font-style:italic;
		font-size:16px;
		padding-left:12px;
    	border-radius:25px;
		width:90%;
		background-color: #FFF;
		outline:none;
		box-shadow:inset 0 1px 0.5px 0.5px rgba(0,0,0,.07);
	}
	
	.copyright
{
	padding-bottom:0px;
	padding-top:0px;
	margin-top: 50px;
	margin-left: 1160px;
	margin-bottom:10px;
	padding-right:0px;
}


	/*
    h4.small.with-line:before{
			background:#eee;
			background:;
			width:300px;
			content:'';
			height:1px;
			position:absolute;
			left:38.7%;
			right:0;
			top:13.2%;
			z-index:100
			}
	h4.small.with-line strong{
		position:relative;
		z-index:101;
				}
	h4.small.with-line strong{
		font-weight:inherit;
		padding:0 12px
		}
		h4.small.with-line strong:not(.btn),h4.small.with-line strong.btn:not(:hover)
		{
		background:#fff
			}
		h4.small.with-line.left,h4.small.with-line.with-btn
		{
		text-align:left;
				}
		h4.small.with-line.left strong,h4.small.with-line.with-btn strong
		{
		font-weight:100;
		padding-left:0!important;
					}
				*/
		
</style>

</head>

<body>
<center>
  <center><img src="images/footer-logo.png" width="270" height="50" style="margin-left:18px;" /></center>
  <div> </div>
<center>
   <img src="images/loginline.PNG" style="margin-top:20px; margin-right:5px;" />
</center>
  <div class="regisform">
<div class="formsizel" style=" background:rgb(255,255,255); width:30%; height:20% border=9%;">
   <center>
   <form id="form1" name="form1" method="post">
<div class="loginfields">
      <input type="text" name="usermail" id="usermail" placeholder="Username or Email" onfocus="this.placeholder = ''" onblur="this.placeholder='Username or Email'" required  />
        <br /> <br />
      
      <input type="password" name="pass" id="pass" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder='Password'" required/>
      <br /> <br />
      
      <input type="submit" name="lbutton" id="lbutton" value="LOG IN" />
  </form> 
 </center>

</div>
<center>
  <img src="images/orline.png"/>
</center>
 <input type="submit" name="log-with-fb-btn" id="log-with-fb-btn" value="Login with facebook"/>

 <p> <font color="#b1b1b1" face="Circular,Helvetica,Arial,sans-serif" size="2px" style="font-weight:normal;">Don't have an freak account? <a href="signup.php"><font color="#666666">SIGN UP</font></a></font> </p>
<div class="copyright" style="width:150px;">
<font color="#b1b1b1" face="Circular,Helvetica,Arial,sans-serif" size="2px" style="font-weight:normal;">
&copy; 2015 Musicfreaks.</font>

</body>

</html>