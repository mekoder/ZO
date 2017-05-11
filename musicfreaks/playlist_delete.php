<?php
include 'conn.php';
include "error.php";
session_start();
$sid= $_SESSION['sid'];

$pdelete = $_GET['plistdelete'];
if($pdelete !== ""){
		mysqli_query($link, "UPDATE playlist SET deleted = 1 WHERE id = '$pdelete' AND user_uname = '$sid' ");
		$sql2 = "SELECT * from playlist WHERE id= '$pdelete' AND user_uname = '$sid' AND deleted = 0 ";
	$result4 = $conn->query($sql2);
    if ($result4->num_rows > 0) {
    	echo "Playlist not deleted.";
    }else{
    	echo "playlist deleted.";
    }
    
	}

?>