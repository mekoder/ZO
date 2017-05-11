<?php
/* $host='localhost';
$username='root';
$password='';
$dbname='musicfreaks';

$connection=mysql_connect($host, $username, $password) or die("Not connect to mysql");
$database = mysql_select_db($dbname) or die(mysql_error());
?>
<?php
include ('error.php');
session_start();
$sid= $_SESSION['sid'];


if($_POST['user_id'])
{
$user_id=$_POST['user_id'];
$user_id = mysql_escape_String($user_id);



$sql_in = mysql_query("DELETE from mf_follow Where admin='$sid' and user='$user_id'");

/*$sql_in2 = "UPDATE musicfreaks_users SET usr_followers = usr_followers-1 where username = '$user_id'";
mysql_query( $sql_in2);

$sql_in3 = "UPDATE musicfreaks_users SET usr_following = usr_following-1 where username = '$sid'";
mysql_query( $sql_in3);
*/

?>


<?php
$host='localhost';
$username='root';
$password='';
$dbname='musicfreaks';

$connection=mysql_connect($host, $username, $password) or die("Not connect to mysql");
$database = mysql_select_db($dbname) or die(mysql_error());
?>
<?php
//include ('error.php');
include ('conn.php');
session_start();
$sid= $_SESSION['sid'];


if(filter_var($_POST['user_id'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH))
{
$user_id=$_POST['user_id'];
$user_id = mysql_escape_String($user_id);

$sql_in = mysql_query("DELETE from mf_follow Where admin='$sid' and user='$user_id'");

$sql_in2 = "UPDATE musicfreaks_users SET usr_followers = usr_followers - 1 where username = '$user_id'";
mysql_query( $sql_in2);
$sql_in3 = "UPDATE musicfreaks_users SET usr_following = usr_following - 1 where username = '$sid'";
mysql_query( $sql_in3);

$sql = "select * from musicfreaks_users where username='$sid'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
     while($row = $result->fetch_assoc()) {
		 
	$sidID= $row['ID'];
}
}
$sql = "select * from musicfreaks_users where username='$user_id'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
     while($row = $result->fetch_assoc()) {
		 
	$userID= $row['ID'];
}
}

$sql = mysql_query("DELETE from noti Where sender='$sidID' and reciver='$userID'");

}

?>