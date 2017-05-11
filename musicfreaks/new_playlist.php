<?php
//include 'error.php';
include 'conn.php';

session_start();
$sid= $_SESSION['sid'];
include('./functions.php');
echo $randomName = rand(333, 999) . time();
$fileNameNew =  $randomName.".jpg";

/*defined settings - start by webtechball*/
$form = $_GET['form'];
if ($form == 'ďĎčČċù÷ö'){
ini_set("memory_limit", "99M");
ini_set('post_max_size', '20M');
ini_set('max_execution_time', 600);
define('IMAGE_SMALL_DIR', './uploades/small/');
define('IMAGE_SMALL_SIZE', 2);
define('IMAGE_MEDIUM_DIR', './uploades/medium/');
define('IMAGE_MEDIUM_SIZE', 240);
/*defined settings - end by webtechball*/

if(isset($_FILES['image_upload_file'])){
$output['status']=FALSE;
set_time_limit(0);
$allowedImageType = array("image/gif",   "image/jpeg",   "image/pjpeg",   "image/png",   "image/x-png"  );

if ($_FILES['image_upload_file']["error"] > 0) {
$output['error']= "Error in File";
}
elseif (!in_array($_FILES['image_upload_file']["type"], $allowedImageType)) {
$output['error']= "You can only upload JPG, PNG and GIF file";
}
elseif (round($_FILES['image_upload_file']["size"] / 1024) > 949096) {
$output['error']= "You can upload file size up to 4 MB";
} else {
/*create directory with 777 permission if not exist - start by webtechball*/
createDir(IMAGE_SMALL_DIR);
createDir(IMAGE_MEDIUM_DIR);
/*create directory with 777 permission if not exist - end by webtechball*/
$path[0] = $_FILES['image_upload_file']['tmp_name'];
$file = pathinfo($_FILES['image_upload_file']['name']);
$fileType = $file["extension"];
$desiredExt='jpg';

$fileNameNew =  "$randomName.$desiredExt";
$path[1] = IMAGE_MEDIUM_DIR . $fileNameNew;
$path[2] = IMAGE_SMALL_DIR . $fileNameNew;

if (createThumb($path[0], $path[1], $fileType, IMAGE_MEDIUM_SIZE, IMAGE_MEDIUM_SIZE,IMAGE_MEDIUM_SIZE)) {

if (createThumb($path[1], $path[2],"$desiredExt", IMAGE_SMALL_SIZE, IMAGE_SMALL_SIZE,IMAGE_SMALL_SIZE)) {
$output['status']=TRUE;
$output['image_medium']= $path[1];
$output['image_small']= $path[2];
}
}
}
echo json_encode($output);
}

}




$list = $_GET["list"];
if($list == "ďĎčČċù÷ö"){ 
$result = "SELECT * FROM musicfreaks_users WHERE username = '$sid'";
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
}else
$privacy = '1';
	$sel = mysqli_query($link, "INSERT INTO playlist (plist_name, user_id, user_uname, plist_date, privacy) VALUES ('$plist','$id','$uname',now(),'$privacy')");

$ext = '.jpg';
//$filename = 'uploades/medium/'.$randomName.'.jpg';
$filename = $fileNameNew;

if (file_exists($filename)) {
    $sel2 = mysqli_query($link, "UPDATE playlist SET plist_dp = 1 where user_id = '$id' AND plist_name = '$plist'");
    rename($filename, "assets/plist_dp/".$id."_".$sid."_".$plist.".jpg");
} else {
    $sel2 = mysqli_query($link, "UPDATE playlist SET plist_dp = 0 where user_id = '$id' AND plist_name = '$plist'");
}

}
echo 'uploades/medium/'.$randomName.'.jpg';
?>