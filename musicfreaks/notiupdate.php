<?php
include("conn.php");
//include 'error.php';
session_start();
$sid= $_SESSION['sid'];

$noti = $_GET['noti'];
$all_seen = '9999';
if($noti !=="")
{


$sql = "SELECT all_seen FROM noti where reciver = (SELECT ID FROM musicfreaks_users WHERE username = '$sid')";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
     while($row = $result->fetch_assoc()) {
  $all_seen=$row['all_seen'];
  }
}
//mysqli_close($conn);
//mysqli_close($link);
  if ($all_seen=='0')
  {
    echo "<span class='alert_noti-'></span>";
  }
}else 

exit();
?>

