<?php
include("conn.php");
//include 'error.php';

session_start();
$sid= $_SESSION['sid'];

$noticlick = "";
$noticlick = $_REQUEST["noticlick"];
 $sql1 = "UPDATE noti SET seen = 1 WHERE id = '$noticlick'";
 $result10 = mysqli_query($conn, $sql1); 
 ?>