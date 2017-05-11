<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php


isset($click);
$email = $_POST['mail'];
$lmail = ("sd@gmail.com");
{
if ($lmail == $email)
// Validate email
if (!filter_var($lmail, FILTER_VALIDATE_EMAIL) === false) {
      $msg = "$email is a valid email address";
} else {
     $msg= "$email is not a valid email address";
}
   }



?>
<body>

<form id="form1" name="form1" method="post" action="">
  <label for="email"></label>
  <label for="email2"></label>
  <input type="text" name="email" id="email2" />
  <input type="submit" name="click" id="click" value="Submit" />
</form>
</body>
</html>