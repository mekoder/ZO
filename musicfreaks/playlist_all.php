<?php
include 'conn.php';

session_start();
$sid= $_SESSION['sid'];
$user = $_GET['user'];
if($sid == $user){
	header("location:my_playlist?smart=yes");
}


$usercheck = "SELECT * FROM musicfreaks_users WHERE username = '$user'";
$usercheck2 = $conn->query($usercheck);
if ($usercheck2->num_rows == 0) {
	echo "There is no such user..";
	exit();
}


$result = "SELECT * FROM playlist WHERE privacy = 0 AND user_uname = '$user'";
$result2 = $conn->query($result);
if ($result2->num_rows > 0) {
     while($row = $result2->fetch_assoc()) {
		 
	$id= $row['id'];
	echo '<a href="playlist?plist='.$row['plist_name'].'">'.ucfirst($row["plist_name"]).'</a>';
	$user_id=$row['user_id'];
    $user_uname=$row['user_uname'];
    $plist_date=$row['plist_date'];
    $privacy=$row['privacy'];
    echo '</br>';
	
}
}else{
	echo 'No playlist created by <b>'.$user.'</b> or it maybe private';
}


?>