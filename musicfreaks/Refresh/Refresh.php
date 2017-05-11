<?php
// Turn off error reporting
error_reporting(0);

// Report runtime errors
error_reporting(E_ERROR | E_WARNING | E_PARSE);

// Report all errors
error_reporting(E_ALL);

// Same as error_reporting(E_ALL);
ini_set("error_reporting", E_ALL);

// Report all errors except E_NOTICE
error_reporting(E_ALL & ~E_NOTICE);
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Without Refresh</title>


<script type="text/javascript" src="functions.js"></script>

</head>
<body>
<a href="Refresh.php?con=li" style="margin-top:10px; text-decoration:none;"><font size="+3" face="Verdana, Geneva, sans-serif">Login </a> |   
<a href="Refresh.php?con=su" style="text-decoration:none;">Signup</font></a><br />
<br >

<div style="height:500px; margin-bottom:0px;">
 <?php
 
 switch($_REQUEST['con'])
	   {
		    
		 case 'su' : include("signup.php");
		              break;
		  case 'li' : include("login.php");
		              break;
					  
	   }
	   ?>
 </div>      
</body>
</html>