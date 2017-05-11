<?php
session_start();
$sid= $_SESSION['sid'];
include('./functions.php');
/*defined settings - start by webtechball*/
ini_set("memory_limit", "99M");
ini_set('post_max_size', '2M');
ini_set('max_execution_time', 600);
define('IMAGE_MEDIUM_DIR', './uploades/medium/');
define('IMAGE_MEDIUM_SIZE', 240);
/*defined settings - end by webtechball*/

if(isset($_FILES['image_upload_file'])){
$output['status']=FALSE;
set_time_limit(0);
$allowedImageType = array("image/gif",   "image/jpeg",   "image/pjpeg",   "image/png",   "image/x-png"  );

if ($_FILES['image_upload_file']["error"] > 0) {
$output['error']= "Something went wrong. Please try again.";
}
elseif (!in_array($_FILES['image_upload_file']["type"], $allowedImageType)) {
$output['error']= "You can only upload JPG, PNG and GIF file";
}
elseif ($_FILES['image_upload_file']["size"] > 1048576) {
$output['error']= "Choose a photo less than 1MB in size.";
} else {
/*create directory with 777 permission if not exist - start by webtechball*/

createDir(IMAGE_MEDIUM_DIR);
/*create directory with 777 permission if not exist - end by webtechball*/
$path[0] = $_FILES['image_upload_file']['tmp_name'];
$file = pathinfo($_FILES['image_upload_file']['name']);
$fileType = $file["extension"];
$desiredExt='.jpg';
$fileNameNew = rand(333, 999) . time() . "$desiredExt";
$fileNameNew2 = $sid . ".jpg";
$path[1] = IMAGE_MEDIUM_DIR . $fileNameNew;
$path[2] = IMAGE_MEDIUM_DIR . $fileNameNew2;
createThumb($path[0], $path[2], $fileType, IMAGE_MEDIUM_SIZE, IMAGE_MEDIUM_SIZE,IMAGE_MEDIUM_SIZE);
if (createThumb($path[0], $path[1], $fileType, IMAGE_MEDIUM_SIZE, IMAGE_MEDIUM_SIZE,IMAGE_MEDIUM_SIZE)) {

$output['status']=TRUE;
$output['image_medium']= $path[1];

}
}
echo json_encode($output);
}
?>