<?php
session_start();
$_SESSION = array();
// Expire their cookie files
if(isset($_COOKIE["id"])) {
	setcookie("id", '', strtotime( '-5 days' ), '/');
    setcookie("user", '', strtotime( '-5 days' ), '/');
	setcookie("content", '', strtotime( '-5 days' ), '/');
}

session_destroy();
header("location:home");
?>