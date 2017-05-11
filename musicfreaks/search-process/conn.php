<?php
$host='localhost';
$username='root';
$password='';
$dbname='musicfreaks';

$link=mysqli_connect($host, $username, $password, $dbname) or die("Not connect to mysql");

$conn= new mysqli ($host, $username, $password, $dbname);
	
if (!$link && !$conn)
{
die('Could not connect: ' . mysql_error());
}
//$conn && $link ->close();
//mysqli_close($link);
?>




