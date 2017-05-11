<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>None of your business.</title>
</head>
<body>
		<h1>Get out of bound (Restricted Area).</h1>
<?php
//include ("error.php");
include ('conn.php');

$link=mysqli_connect("localhost","root","","musicfreaks") or die("Not connect to mysql"); 
if (!$link){die('Could not connect: ' . mysql_error());}
{session_start();$sid= $_SESSION['sid'];
if($sid==""){   header("location:home.php");} else {header ("");}}

$errMsg = "";
$artistdp = "_dp";
$artistc = "_c";
if(isset($_POST['save']))
{
        if(!empty($_POST['artist_name']) && !empty($_POST['artist_uname']) && !empty($_POST['gender']))
        {
                $artName = $_POST['artist_name'];
                $artUname = $_POST['artist_uname'];

                $dp = $_FILES["dp_photo"]["name"];
                $cp = $_FILES["c_photo"]["name"];
                
                $gender = ($_POST["gender"]);
                if($gender == 'male')
                {
                    $gender='1';
                }else
                $gender = '';
				
                  $fileTmpLoc = $_FILES["dp_photo"]["tmp_name"];
                  $fileTmpLoc2 = $_FILES["c_photo"]["tmp_name"];

  function resize_crop_image($max_width, $max_height, $source_file, $dst_dir, $quality = 90){
    $imgsize = getimagesize($source_file);
    $width = $imgsize[0];
    $height = $imgsize[1];
    $mime = $imgsize['mime'];
 
  switch($mime){
        case 'image/png':
            $image_create = "imagecreatefrompng";
            $image = "imagepng";
            $quality = 9;
            break;
 
        case 'image/jpeg':
            $image_create = "imagecreatefromjpeg";
            $image = "imagejpeg";
            $quality = 90;
            break;
 
        default:
            return false;
            break;
    }
     
    $dst_img = imagecreatetruecolor($max_width, $max_height);
    $src_img = $image_create($source_file);
     
    $width_new = $height * $max_width / $max_height;
    $height_new = $width * $max_height / $max_width;
    if($width_new > $width){
        $h_point = (($height - $height_new) / 5);
        imagecopyresampled($dst_img, $src_img, 0, 0, 0, $h_point, $max_width, $max_height, $width, $height_new);
    }else{
        $w_point = (($width - $width_new) / 2);
        imagecopyresampled($dst_img, $src_img, 0, 0, $w_point, 0, $max_width, $max_height, $width_new, $height);
    }
    $image($dst_img, $dst_dir, $quality);
    if($dst_img)imagedestroy($dst_img);
    if($src_img)imagedestroy($src_img);
}
resize_crop_image(200, 200, $fileTmpLoc, "assets/artist_dp/$artUname$artistdp.jpg");


/*======COVER===========*/


  function resize_crop_image2($max_width, $max_height, $source_file, $dst_dir, $quality = 90){
    $imgsize = getimagesize($source_file);
    $width = $imgsize[0];
    $height = $imgsize[1];
    $mime = $imgsize['mime'];
 
  switch($mime){
        case 'image/png':
            $image_create = "imagecreatefrompng";
            $image = "imagepng";
            $quality = 9;
            break;
 
        case 'image/jpeg':
            $image_create = "imagecreatefromjpeg";
            $image = "imagejpeg";
            $quality = 90;
            break;
 
        default:
            return false;
            break;
    }
     
    $dst_img = imagecreatetruecolor($max_width, $max_height);
    $src_img = $image_create($source_file);
     
    $width_new = $height * $max_width / $max_height;
    $height_new = $width * $max_height / $max_width;
    if($width_new > $width){
        $h_point = (($height - $height_new) / 4);
        imagecopyresampled($dst_img, $src_img, 0, 0, 0, $h_point, $max_width, $max_height, $width, $height_new);
    }else{
        $w_point = (($width - $width_new) / 2);
        imagecopyresampled($dst_img, $src_img, 0, 0, $w_point, 0, $max_width, $max_height, $width_new, $height);
    }
     
    $image($dst_img, $dst_dir, $quality);
    if($dst_img)imagedestroy($dst_img);
    if($src_img)imagedestroy($src_img);
}
resize_crop_image2(1200.61, 250, $fileTmpLoc2, "assets/artist_c/$artUname$artistc.jpg");
unlink($fileTmpLoc);
unlink($fileTmpLoc2);


/*=======LANGUAGE=========*/
if(isset($_POST['hindi'])) { $hindi = '1';}else $hindi ='';
if(isset($_POST['english'])) { $english = '1';}else $english ='';
if(isset($_POST['punjabi'])) { $punjabi = '1';}else $punjabi ='';
if(isset($_POST['bhojpuri'])) { $bhojpuri = '1';}else $bhojpuri ='';
if(isset($_POST['bengali'])) { $bengali = '1';}else $bengali ="";
if(isset($_POST['tamil'])) { $tamil = '1';}else $tamil ="";
if(isset($_POST['telugu'])) { $telugu = '1';}else $telugu ="";
if(isset($_POST['marathi'])) { $marathi = '1';}else $marathi ="";
if(isset($_POST['gujarati'])) { $gujarati = '1';}else $gujarati ="";
if(isset($_POST['malayalam'])) { $malayalam = '1';}else $malayalam ="";
if(isset($_POST['kannada'])) { $kannada = '1';}else $kannada ="";
if(isset($_POST['pahadi'])) { $pahadi = '1';}else $pahadi ="";
if(isset($_POST['urdu'])) { $urdu = '1';}else $urdu ="";
if(isset($_POST['oriya'])) { $oriya = '1';}else $oriya ="";
if(isset($_POST['assamese'])) { $assamese = '1';}else $assamese ="";
if(isset($_POST['rajasthani'])) { $rajasthani = '1';}else $rajasthani ="";
if(isset($_POST['haryanvi'])) { $haryanvi = '1';}else $haryanvi ="";

if(isset($_POST['ghazal'])) { $ghazal = '1';}else $ghazal ='';
if(isset($_POST['filmi'])) { $filmi = '1';}else $filmi ='';
if(isset($_POST['bhajan'])) { $bhajan = '1';}else $bhajan ='';
if(isset($_POST['indian_pop'])) { $indian_pop = '1';}else $indian_pop ='';
if(isset($_POST['hindi_pop'])) { $hindi_pop = '1';}else $hindi_pop ='';
if(isset($_POST['bhangra'])) { $bhangra = '1';}else $bhangra ='';
if(isset($_POST['qawwali'])) { $qawwali = '1';}else $qawwali ='';
if(isset($_POST['indian_rock'])) { $indian_rock = '1';}else $indian_rock ='';
if(isset($_POST['indian_hip_hop'])) { $indian_hip_hop = '1';}else $indian_hip_hop ='';
if(isset($_POST['indian_classical'])) { $indian_classical = '1';}else $indian_classical ='';
if(isset($_POST['indian_folk_music'])) { $indian_folk_music = '1';}else $indian_folk_music ='';
if(isset($_POST['punjabi_folk_music'])) { $punjabi_folk_music = '1';}else $punjabi_folk_music ='';
$aboutartist = ($_POST['aboutartist']);
if( mysqli_query($link,"INSERT INTO mf_artist (name,username,sex,hindi,english,punjabi,bhojpuri,bengali,tamil,telugu,marathi,gujarati,malayalam,kannada,pahadi,urdu,oriya,assamese,rajasthani,haryanvi,ghazal,filmi,bhajan,indian_pop,hindi_pop,bhangra,qawwali,indian_rock,indian_hip_hop,indian_classical,indian_folk_music,punjabi_folk_music,about,ondate) VALUES ('$artName','$artUname','$gender','$hindi','$english','$punjabi','$bhojpuri','$bengali','$tamil','$telugu','$marathi','$gujarati','$malayalam',
'$kannada','$pahadi','$urdu','$oriya','$assamese','$rajasthani','$haryanvi','$ghazal','$filmi','$bhajan','$indian_pop','$hindi_pop','$bhangra','$qawwali','$indian_rock','$indian_hip_hop','$indian_classical',
'$indian_folk_music','$punjabi_folk_music','$aboutartist',now() )")) { $errMsg = "Data inserted successfully."; } else $errMsg = "Data not insert.";

     }else
        $errMsg = " Field with * are must required.";
}

?>
						                          <font color="red"><?php echo $errMsg; ?></font>					<div>
                                                <form enctype="multipart/form-data" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                                <input type="text" placeholder="Name of artist" name="artist_name" id="artist-name"/><font color="red">*</font>
                                                <input type="text" placeholder="Username of artist" name="artist_uname" id="artist-uname"/><font color="red">*</font>                                        <p>Display pic
                                                <input type="file" name="dp_photo" id="dp-photo"/><font color="red">*</font></p>
                                                <p>Cover pic
                                                <input type="file" name="c_photo" id="c-photo" /><font color="red">*</font></p>
                                                <p>Gender</p>
                                                Male<input type="radio" value="male" name="gender"/>|
                                                Female<input type="radio" value="female" name="gender"/><font color="red">*</font>
                                                <p>Category</p>
                                                Ghazal<input type="checkbox" value="1" name="ghazal" />|
                                                Filmi<input type="checkbox" value="1" name="filmi" />|
                                                Indian Pop<input type="checkbox" value="1" name="indian_pop" />|
                                                Hindi Pop<input type="checkbox" value="1" name="hindi_pop" />|
                                                Bhajan<input type="checkbox" value="1" name="bhajan" />|
                                                Indian Rock<input type="checkbox" value="1" name="indian_rock" />|
                                                Indian Hip-Hop<input type="checkbox" value="1" name="indian_hip_hop" />|
                                                Bhangra<input type="checkbox" value="1" name="bhangra" />|
                                                Qawwali<input type="checkbox" value="1" name="qawwali" />|
                                                Indian Classical<input type="checkbox" value="1" name="indian_classical" />|
                                                Indian Folk Music<input type="checkbox" value="1" name="indian_folk_music" />|
                                                Punjabi Folk Music<input type="checkbox" value="1" name="punjabi_folk_music" />|
                                                <p>Languages</p>
                                                Hindi<input type="checkbox" value="1" name="hindi" />|
                                                English<input type="checkbox" value="1" name="english" />|
                                                Punjabi<input type="checkbox" value="1" name="punjabi" />|
                                                Bhojpuri<input type="checkbox" value="1" name="bhojpuri" />|
                                                Bengali<input type="checkbox" value="1" name="bengali" />|
                                                Tamil<input type="checkbox" value="1" name="tamil" />|
                                                Telugu<input type="checkbox" value="1" name="telugu" />|
                                                Oriya<input type="checkbox" value="1" name="oriya" />|
                                                Marathi<input type="checkbox" value="1" name="marathi" />|
                                                Gujarati<input type="checkbox" value="1" name="gujarati" />|
                                                Malayalam<input type="checkbox" value="1" name="malayalam" />|
                                                Kannada<input type="checkbox" value="1" name="kannada" />|
                                                Pahadi<input type="checkbox" value="1" name="pahadi" />|
                                                Urdu<input type="checkbox" value="1" name="urdu" />|
                                                Oriya<input type="checkbox" value="1" name="oriya" />|
                                                Assamese<input type="checkbox" value="1" name="assamese" />|
                                                Rajasthani<input type="checkbox" value="1" name="rajasthani" />|
                                                Haryanvi<input type="checkbox" value="1" name="haryanvi" />|
                                                <p>About</p>
                                                <textarea style="height:90px; width:700px;" rows="90" cols="200" name="aboutartist" placeholder="About Artist"></textarea>

                                                <input type="submit" value="Submit" name="save" />
                                                </form>
							      </div>
</body>
</html>