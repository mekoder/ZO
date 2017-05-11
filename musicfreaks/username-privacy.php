<?php
session_start();
$sid = $_SESSION['sid'];
include 'conn.php';
include 'error.php';

$sqlcheck = "SELECT plist_name from playlist where user_uname = '$sid'";
$resultcheck = $link->query($sqlcheck);
if ($resultcheck->num_rows == 0) {
	echo "You haven't created any <b>playlist</b>.";
		} else{
		
									
$privacy = $_GET['obj'];
if($privacy !=="") {
$sql = "SELECT id FROM playlist WHERE user_uname = '$sid'";
$result = mysqli_query($conn, $sql);
 if(mysqli_num_rows($result) > 0) 
 	{ 
 		if($privacy == '1'){
 		mysqli_query($conn, "UPDATE playlist SET privacy = '1' where user_uname = '$sid' ");
 		echo '<b>Playlists</b> made private.';
          } elseif ($privacy == '0') {
          	mysqli_query($conn, "UPDATE playlist SET privacy = '' where user_uname = '$sid' ");
          	echo '<b>Playlists</b> made public.';
          } else {
          	Echo "You don't have permission"; 
          }
             
     } else {
     	echo "You haven't created any <b>playlist</b>.";
     }
  }
		}

?>