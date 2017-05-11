<?php
include 'conn.php';
session_start();
$sid= $_SESSION['sid'];

$result = "SELECT ID, username FROM musicfreaks_users WHERE username = '$sid'";
$result2 = $conn->query($result);
if ($result2->num_rows > 0) {
     while($row = $result2->fetch_assoc()) {
		 
	$id= $row['ID'];
	$uname = $row['username'];	
  }
}
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
$plist= test_input($_GET['obj']);
$privacy = test_input($_GET['obj2']);

if($privacy == '0'){
  $privacy = '';
    } else{
      $privacy = '1';
    }
        	$sel = mysqli_query($link, "INSERT INTO playlist (plist_name, user_id, user_uname, plist_date, privacy) VALUES ('$plist',(SELECT ID from musicfreaks_users where username = '$sid'),'$sid',now(),'$privacy')");

        $result3 = "SELECT id from playlist WHERE user_id = '$id' AND plist_name = '$plist'";
                    $result3 = $conn->query($result3);
                if ($result3->num_rows > 0) {
                  while($row = $result3->fetch_assoc()) {
                   
                 $plist_id= $row['id'];
                  "<a href='playlist?plist=".$plist_id."'>".ucwords($plist)."</a>";
                echo "Playlist <font id='donepl-name' class='donepl-name'><a href='playlist?plist=".$plist_id."'>".ucwords($plist)."</a></font> successfully created.";
          }
       }


$ext = '.jpg';
$filename = 'uploades/medium/'.$sid.'.jpg';

if (file_exists($filename)) {
    $sel2 = mysqli_query($link, "UPDATE playlist SET plist_dp = 1 where user_id = '$id' AND plist_name = '$plist'");
    rename("uploades/medium/".$sid.".jpg", "assets/plist_dp/".$id."_".$sid."_".$plist."_".$plist_id.".jpg");
} else {
    $sel2 = mysqli_query($link, "UPDATE playlist SET plist_dp = 0 where user_id = '$id' AND plist_name = '$plist'");
}
/*
 if(is_dir("./uploades/medium/'$sid''$ext'"))
   {
   $sel2 = mysqli_query($link, "UPDATE playlist SET plist_dp = 1 where user_id = '$id' AND plist_name = '$plist'");
   }
   else
   {
     $sel2 = mysqli_query($link, "UPDATE playlist SET plist_dp = 0 where user_id = '$id' AND plist_name = '$plist'");
   }
	//$sel2 = mysqli_query($link, "UPDATE playlist SET plist_dp = 1 where user_id = '$id' AND plist_name = '$plist'");
*/
?>