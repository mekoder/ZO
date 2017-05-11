<?php
session_start();
$sid = $_SESSION['sid'];
$close = $_GET['obj4'];
if($close == '1'){
	unlink ('uploades/medium/'.$sid.'.jpg');
	}
	
$deldp = $_GET['objdp'];
if($deldp !==""){
sleep(1);
unlink($deldp);
}
?>