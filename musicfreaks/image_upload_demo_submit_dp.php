<?php
session_start();
$sid= $_SESSION['sid'];
include('./functions.php');
include 'conn.php';
/*defined settings - start by webtechball*/
ini_set("memory_limit", "99M");
ini_set('post_max_size', '20M');
ini_set('max_execution_time', 600);
define('IMAGE_MEDIUM_DIR', './assets/u_dp/');
define('IMAGE_MEDIUM_SIZE', 190);
/*defined settings - end by webtechball*/

if(isset($_FILES['image_upload_file'])){
$output['status']=FALSE;
set_time_limit(0);

  $fileName = $_FILES['image_upload_file']["name"];
  $fileTmpLoc = $_FILES['image_upload_file']["tmp_name"];
  $fileType = $_FILES['image_upload_file']["type"];
  $fileSize = $_FILES['image_upload_file']["size"];
  $fileErrorMsg = $_FILES['image_upload_file']["error"];

$allowedImageType = array("image/gif",   "image/jpeg",   "image/pjpeg",   "image/png",   "image/x-png"  );


if  ( $_FILES['image_upload_file']["size"] == "") {
    $output['error'] = "<img src='images/redtick.png'/><span style='margin-left:7px;color: rgba(255,65,65,0.9);'>Browse for a picture before clicking change button.</span>";
} elseif (!in_array($_FILES['image_upload_file']["type"], $allowedImageType)) {
     $output['error'] = "<img src='images/redtick.png'/><span style='margin-left:7px;color: rgba(255,65,65,0.9);'>Your image was not .jpg. or .png.</span>";
     unlink($fileTmpLoc);
} elseif ( $_FILES['image_upload_file']["size"] > 1048576) {
    $output['error'] = "<img src='images/redtick.png'/><span style='margin-left:7px;color: rgba(255,65,65,0.9);'>Choose file smaller than 1 MB in size.</span>";
    unlink($fileTmpLoc);
} elseif ( $_FILES['image_upload_file']["error"] > 0) {
    $output['error'] = "<img src='images/redtick.png'/><span style='margin-left:7px;color: rgba(255,65,65,0.9);'>An error occured while processing the file. Try again.</span>";
} else {
/*create directory with 777 permission if not exist - start by webtechball*/
createDir(IMAGE_MEDIUM_DIR);
/*create directory with 777 permission if not exist - end by webtechball*/
$path[0] = $_FILES['image_upload_file']['tmp_name'];
$file = pathinfo($_FILES['image_upload_file']['name']);
$fileType = $file["extension"];
$desiredExt='_dp.jpg';
$fileNameNew = rand(333, 999) . time() . "$desiredExt";
$fileNameNew2 = $sid . "$desiredExt";
$path[1] = IMAGE_MEDIUM_DIR . $fileNameNew;
$path[2] = IMAGE_MEDIUM_DIR . $fileNameNew2;
createThumb($path[0], $path[2], $fileType, IMAGE_MEDIUM_SIZE, IMAGE_MEDIUM_SIZE,IMAGE_MEDIUM_SIZE);
if (createThumb($path[0], $path[1], $fileType, IMAGE_MEDIUM_SIZE, IMAGE_MEDIUM_SIZE,IMAGE_MEDIUM_SIZE)) {

$output['status']=TRUE;
$output['image_medium']= $path[1];
 mysqli_query($link,"UPDATE musicfreaks_users SET dp = '1' WHERE username='$sid'");
 $output['error'] = "<img src='images/bluetick.png'/><span style='margin-left:7px;color: rgba(59, 136,195, 1);'>Your picture has been successfully updated.</span>";
}
}
echo json_encode($output);
}
?>