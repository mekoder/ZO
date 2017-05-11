<html>
<head>
<style type="text/css">
body{background:#666666;}
div{border:1px solid red;}
</style>
</head>
<body>
<?php

$con = mysql_connect("localhost","root","");
if (!$con)
{
die('Could not connect: ' . mysql_error());
}

mysql_select_db("musicfreaks", $con);

$result = mysql_query("SELECT * FROM musicfreaks_users");

while($row = mysql_fetch_array($result))
//$pass==$arr['pass'];
// $pass=md5($pass);
{

// echo '<img src="'.$row['name'].'" />';  
//echo "<div>".$row['name']."</div>";
echo "<div>".$row['username']."</div>";
echo "<div>".$row['mail']."</div>";
echo "<div>".$row['pass']."</div>";
echo "<br />";
}

mysql_close($con);

?>
</body>
</html>