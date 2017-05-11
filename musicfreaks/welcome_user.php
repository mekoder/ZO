<?php
include ("error.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="wlcmusrstyle.css" />
<link rel="icon" type="image/png" href="images/mf-favicon1.png">
<META HTTP-EQUIV=Refresh CONTENT="5; URL=login.php">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="functions.js"></script>
<title>Welcome <?php echo $_GET ['id']; ?>!</title>
</head>
<body>
<div class="full-container-jk">
<div class="header"><center><img src="images/main-mf-logo1.png" height="40" width="165" /></center></div>
<center><p id="wlcm-msg-jk">Hello <?php echo $_GET ['id']; ?>,<br /> Welcome to Musicfreaks</p>
<div id="rdct-msg">
<p id="wlcm-timer-jk">Now you're redirecting to login page within <span id="timer-jk">5</span> seconds.</p></div></center>
</div>
</body>
</html>