<?php
session_start();
$sid = $_SESSION['sid'];
include 'conn.php';
include 'error.php';

$sql = "SELECT * FROM language WHERE user_uname = '$sid'";
$result = mysqli_query($conn, $sql);
 if(mysqli_num_rows($result) == 0) 
 	{
 		mysqli_query($conn , "INSERT INTO `language`(`user_id`, `user_uname`, `hindi`, `english`) VALUES ((SELECT ID from musicfreaks_users WHERE username = '$sid'),'$sid',1,1)");
 	} 

$hindi = $_GET['obj'];
if($hindi !=="") {
if($hindi == '1'){
 mysqli_query($conn, "UPDATE language SET hindi = '1' where user_uname = '$sid' ");
 echo '<b>Hindi</b> added to profile.';
   } elseif ($hindi == '0') {
    mysqli_query($conn, "UPDATE language SET hindi = '' where user_uname = '$sid' ");
    echo '<b>Hindi</b> removed from profile.';
      }
   }


$english = $_GET['obj2'];
if($english !=="") {
if($english == '1'){
 mysqli_query($conn, "UPDATE language SET english = '1' where user_uname = '$sid' ");
 echo '<b>English</b> added to profile.';
   } elseif ($english == '0') {
    mysqli_query($conn, "UPDATE language SET english = '' where user_uname = '$sid' ");
    echo '<b>English</b> removed from profile.';
      } 
   }


$punjabi = $_GET['obj3'];
if($punjabi !=="") {
if($punjabi == '1'){
 mysqli_query($conn, "UPDATE language SET punjabi = '1' where user_uname = '$sid' ");
 echo '<b>Punjabi</b> added to profile.';
   } elseif ($punjabi == '0') {
    mysqli_query($conn, "UPDATE language SET punjabi = '' where user_uname = '$sid' ");
    echo '<b>Punjabi</b> removed from profile.';
      } 
   }


$bhojpuri = $_GET['obj4'];
if($bhojpuri !=="") {
if($bhojpuri == '1'){
 mysqli_query($conn, "UPDATE language SET bhojpuri = '1' where user_uname = '$sid' ");
 echo '<b>Bhojpuri</b> added to profile.';
   } elseif ($bhojpuri == '0') {
    mysqli_query($conn, "UPDATE language SET bhojpuri = '' where user_uname = '$sid' ");
    echo '<b>Bhojpuri</b> removed from profile.';
      } 
   }


$tamil = $_GET['obj5'];
if($tamil !=="") {
if($tamil == '1'){
 mysqli_query($conn, "UPDATE language SET tamil = '1' where user_uname = '$sid' ");
 echo '<b>Tamil</b> added to profile.';
   } elseif ($tamil == '0') {
    mysqli_query($conn, "UPDATE language SET tamil = '' where user_uname = '$sid' ");
    echo '<b>Tamil</b> removed from profile.';
      } 
   }

$telugu = $_GET['obj6'];
if($telugu !=="") {
if($telugu == '1'){
 mysqli_query($conn, "UPDATE language SET telugu = '1' where user_uname = '$sid' ");
 echo '<b>Telugu</b> added to profile.';
   } elseif ($telugu == '0') {
    mysqli_query($conn, "UPDATE language SET telugu = '' where user_uname = '$sid' ");
    echo '<b>Telugu</b> removed from profile.';
      } 
   }

$marathi = $_GET['obj7'];
if($marathi !=="") {
if($marathi == '1'){
 mysqli_query($conn, "UPDATE language SET marathi = '1' where user_uname = '$sid' ");
 echo '<b>Marathi</b> added to profile.';
   } elseif ($marathi == '0') {
    mysqli_query($conn, "UPDATE language SET marathi = '' where user_uname = '$sid' ");
    echo '<b>Marathi</b> removed from profile.';
      } 
   }

$gujarati = $_GET['obj8'];
if($gujarati !=="") {
if($gujarati == '1'){
 mysqli_query($conn, "UPDATE language SET gujarati = '1' where user_uname = '$sid' ");
 echo '<b>Gujarati</b> added to profile.';
   } elseif ($gujarati == '0') {
    mysqli_query($conn, "UPDATE language SET gujarati = '' where user_uname = '$sid' ");
    echo '<b>Gujarati</b> removed from profile.';
      } 
   }

$bengali = $_GET['obj9'];
if($bengali !=="") {
if($bengali == '1'){
 mysqli_query($conn, "UPDATE language SET bengali = '1' where user_uname = '$sid' ");
 echo '<b>Bengali</b> added to profile.';
   } elseif ($bengali == '0') {
    mysqli_query($conn, "UPDATE language SET bengali = '' where user_uname = '$sid' ");
    echo '<b>Bengali</b> removed from profile.';
      }
   }
?>