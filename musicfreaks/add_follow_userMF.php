<?php
include 'error.php';
include 'conn.php';
session_start();
$sid= $_SESSION['sid'];
$userID="";
$user_id = "";
$user_id = filter_var($_REQUEST["user_id"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);
if($user_id == "")
{ }else {
$sql_in3 = "INSERT into mf_follow (admin,user,ondate) values ('$sid','$user_id',now() )";
mysqli_query($link, $sql_in3);

$sql_in2 = "UPDATE musicfreaks_users SET usr_followers = usr_followers + 1 where username = '$user_id'";
mysqli_query($link, $sql_in2);

$sql_in1 = "UPDATE musicfreaks_users SET usr_following = usr_following + 1 where username = '$sid'";
mysqli_query($link, $sql_in1);

$sql = "SELECT * from musicfreaks_users where username='$sid'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
     while($row = $result->fetch_assoc()) {
 $sidID= $row['ID'];
}
}
$sql = "SELECT * from musicfreaks_users where username='$user_id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
     while($row = $result->fetch_assoc()) {
    $userID= $row['ID'];
}
}
$sql = mysqli_query($link, "INSERT INTO noti (sender, reciver, cmt_type, time, ondate, time_date) VALUES  ('$sidID','$userID','follow',now(),now(),now() )");
}


if($nam=filter_var($_GET['user'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH))
{
$result2 = mysqli_query($link, "SELECT * FROM mf_follow WHERE user='$nam' AND admin IS NOT NULL");
echo $num_rows2 = mysqli_num_rows($result2);
}
?>



<?php
/*
include ('error.php');
session_start();
$sid= $_SESSION['sid'];

if($_POST['user_id'])
{
$user_id=$_POST['user_id'];
$user_id = mysql_escape_String($user_id);

$sql_in3 = "INSERT into mf_follow (admin,user) values ('$sid','$user_id')";
mysql_query( $sql_in3);

/*$sql_in2 = "UPDATE musicfreaks_users SET usr_followers = usr_followers + 1 where username = '$user_id'";
mysql_query( $sql_in2);

$sql_in1 = "UPDATE musicfreaks_users SET usr_following = usr_following + 1 where username = '$sid'";
mysql_query( $sql_in1);*/

?>

<?php
/*
if($users= $_GET['user'])
{
    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND ($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
    die();
    }
   error_reporting(E_ALL ^ E_DEPRECATED); $link = mysql_connect("localhost", "root", "");
   mysql_select_db("musicfreaks", $link);
    

    $users = filter_var($_GET['user'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);
    $statement = mysql_query("SELECT admin FROM mf_follow WHERE user='$users' and user is not null", $link);
    
    $num_rows4 = mysql_num_rows($statement);
    
    die ('' . $users);
}*/
?>

<?php  
/* $nam=$_GET['user'];

error_reporting(E_ALL ^ E_DEPRECATED);
$link = mysql_connect("localhost", "root", "");
mysql_select_db("musicfreaks", $link);

$result2 = mysql_query("SELECT * FROM mf_follow WHERE user='$nam' AND admin IS NOT NULL", $link);
$num_rows2 = mysql_num_rows($result2);

echo "$num_rows2";
*/
?>
