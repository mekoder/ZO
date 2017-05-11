<?php
include ("error.php");
include ('conn.php');
session_start();$sid= $_SESSION['sid'];

$close = $_GET['obj4'];
if($close == '1'){
$userc = "_c";
$userdp = "_dp";
    $filename = 'assets/u_dp/'.$sid.'_dp.jpg';

if (file_exists($filename)) {

	mysqli_query($link,"UPDATE musicfreaks_users SET dp = '' WHERE username='$sid'");
	unlink("assets/u_dp/$sid$userdp.jpg");
   // unlink("assets/u_c/$sid$userc.jpg");
	//$dpSucc = 
	echo "<img src='images/bluetick.png'/>	<span style='margin-left:7px;color: rgba(59, 136,195, 1);'>Your picture has been successfully deleted.</span>";
	}else {
    //$dpSucc =
	echo "<img src='images/redtick.png'/> <span style='margin-left:7px; color:#c33;'>You haven't uploaded your display picture.</span>";
  }

}

?>