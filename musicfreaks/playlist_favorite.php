<?php
include 'conn.php';
include "error.php";
session_start();
$sid= $_SESSION['sid'];

$favorite = $_GET['favoriteme'];
if($favorite !== ""){
$result = "SELECT * from playlist_favorite WHERE plist_id= '$favorite' AND my_id = (SELECT ID from musicfreaks_users where username = '$sid' )";
$result = $conn->query($result);
    if ($result->num_rows > 0) {
		
		while($row = $result->fetch_assoc()) {
			    $plist_name=$row['plist_name'];
				$plist_name = ucfirst($plist_name);
     	mysqli_query($link, "DELETE FROM playlist_favorite WHERE plist_id= '$favorite' AND my_id = (SELECT ID from musicfreaks_users where username = '$sid' )");
		echo "<b>".$plist_name."</b> removed from your favorite playlist.<style type='text/css'>
					.add-fav-btn {background-position: 1px -22px;
					</style>
					<script>document.getElementById('favorite').setAttribute('title', 'Add to Favorites');</script>";
     	exit();
					}
					} else {
    		$result2 = "SELECT * from playlist WHERE id = '$favorite' AND deleted = 0";
          	$result2 = $conn->query($result2);
    		if ($result2->num_rows > 0) {
     			while($row = $result2->fetch_assoc()) {
			     
			     $user_uname=$row['user_uname'];
			   $plist_id = $row['id'];
			   $privacy=$row['privacy'];
			    $dp = $row['plist_dp'];
			    $plist_name=$row['plist_name'];
			    $user_id= $row['user_id'];

mysqli_query($link, "INSERT INTO playlist_favorite (plist_id,plist_name,plist_owner,plist_owner_id,my_id,my_uname,ondate) VALUES ('$plist_id','$plist_name','$user_uname','$user_id',(SELECT ID from musicfreaks_users where username = '$sid'),'$sid',now() )");
$plist_name = ucfirst($plist_name);
echo "<b>".$plist_name."</b> added as your favorite playlist.<style type='text/css'>
					.add-fav-btn {background-position: -24px -22px;
					</style>
					<script>document.getElementById('favorite').setAttribute('title', 'Remove from Favorites');</script>";
exit();
}
			     } else{
			     	echo "";
			     }
			 }
		}

//COPY RESULT//
$plistlink = $_GET['plistlink'];
if($plistlink !==""){
	if($plistlink == "copylink"){
		echo 'Playlist link copied to the clipboard.';
		exit();
	}
}else{
	echo "Something went wrong.";
	exit();
}


$plistlock = $_GET['plistlock'];
if($plistlock !== ""){
	$sql1 = "SELECT * from playlist WHERE id= '$plistlock' AND user_uname = '$sid' AND deleted = 0 ";
	$result3 = $conn->query($sql1);
    if ($result3->num_rows > 0) {
     	while($row = mysqli_fetch_array($result3)) {
     		$privacy=$row["privacy"];
     		$plist_name=$row["plist_name"];
     		if($privacy == '1'){
     			echo 'Playlist<b> '.ucwords($plist_name).'</b> is now <b>public</b>.<style type="text/css">
						.lock-btn {background-position: -166px -22px;}					
					</style>
					<script>document.getElementById("plistlock").setAttribute("title", "Make Playlist Private");</script>';

					mysqli_query($conn, "UPDATE playlist SET privacy = 0 WHERE id = '$plistlock' AND user_uname = '$sid' ");
					exit();
     		} elseif ($privacy == '0') {
     			echo 'Playlist<b> '.ucwords($plist_name).'</b> is now <b>private</b>.<style type="text/css">
					.lock-btn {background-position: -141px -22px;}
					</style>
					<script>document.getElementById("plistlock").setAttribute("title", "Make Playlist Public");</script>';
					mysqli_query($conn, "UPDATE playlist SET privacy = 1 WHERE id = '$plistlock' AND user_uname = '$sid' ");
					exit();
     		}
     	}
          }else{
          	echo "This playlist has been deleted. You can't edit now.";
          	exit();
          }
}

     ?>