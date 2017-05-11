<?php
include 'conn.php';

session_start();
$sid= $_SESSION['sid'];
$ext = '.jpg';
echo $sid.$ext.'</br>';
$dirPath2 = ("uploades/medium/$sid");
$dirPath = ("uploades/medium/$sid/");
$filename = 'uploades/medium/'.$sid.'.jpg';

if (file_exists($filename)) {
    echo "Yes";
} else {
    echo "No";
}

    
    $files = ($dirPath);

    foreach ($files as $file) {
        if (is_dir($file)) {
            self::deleteDir($file);
        } else {
            unlink($file);
        }
    }
    rmdir($dirPath2);

/*
if(is_dir("uploades/medium/$sid.jpg"))
   {
   echo 'yes';
   //$sel2 = mysqli_query($link, "UPDATE playlist SET plist_dp = 1 where user_id = '$id' AND plist_name = '$plist'");
   }
   else
   {
   	echo 'no';
     //$sel2 = mysqli_query($link, "UPDATE playlist SET plist_dp = 0 where user_id = '$id' AND plist_name = '$plist'");
   }
*/
   ?>