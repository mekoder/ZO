<?php
session_start();
include_once'session.php';
include_once("conn.php");
$user_ok = false;
$log_id = "";
$log_username = "";
$log_password = "";
// User Verify function
function evalLoggedUser($conx,$id,$u,$p){
	$sql = "SELECT ip FROM musicfreaks_users WHERE username='$id' AND mail= '$u' AND pass='$p' LIMIT 1";
    $query = mysqli_query($conx, $sql);
    $numrows = mysqli_num_rows($query);
	if($numrows > 0){
		return true;
	}
}
if(isset($_SESSION["sid"]) && isset($_SESSION["mail"]) && isset($_SESSION["pass"])) {
	$log_id = preg_replace('#[^a-z0-9]#', '', $_SESSION['sid']);
	$log_username = preg_replace('#[^a-z0-9]#i', '', $_SESSION['mail']);
	$log_password = preg_replace('#[^a-z0-9]#i', '', $_SESSION['pass']);
	// Verify the user
	$user_ok = evalLoggedUser($conn,$log_id,$log_username,$log_password);

} else if(isset($_COOKIE["id"]) && isset($_COOKIE["user"]) && isset($_COOKIE["content"])){
	$_SESSION['id'] = preg_replace('#[^0-9]#', '', $_COOKIE['id']);
    $_SESSION['user'] = preg_replace('#[^a-z0-9]#i', '', $_COOKIE['user']);
    $_SESSION['content'] = preg_replace('#[^a-z0-9]#i', '', $_COOKIE['content']);
	$log_id = $_SESSION['sid'];
	$log_username = $_SESSION['mail'];
	$log_password = $_SESSION['pass'];
	// Verify the user
	$user_ok = evalLoggedUser($conn,$log_id,$log_username,$log_password);
	
	/*if($user_ok == true){
		// Update their lastlogin datetime field
		$sql = "UPDATE users SET lastlogin=now() WHERE id='$log_id' LIMIT 1";
        $query = mysqli_query($conn, $sql);
	}*/
}
?>