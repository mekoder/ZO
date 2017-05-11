<?php
$nam=$_GET['obj'];
$nam= preg_replace("#[^0-9a-z@_ ]#i","",$nam);
include("conn.php");

$sel=mysqli_query($link,"SELECT * from musicfreaks_users where username LIKE '%$nam%' or mail LIKE '%$nam%' or fname LIKE '%$nam%' or lname LIKE '%$nam%' or fullname LIKE '%$nam%' ORDER BY '$nam%' DESC");
                         
if(mysqli_num_rows($sel)>0)
{ 
  while($arr=mysqli_fetch_array($sel))
  {
     extract($arr);
     {

echo ' <!--  USERS ------- -->
        <div class="u-card shad">
          <div class="u-card-img">
            <a href="u/'.$username.'">
              <img src="assets/u_dp/'.$username.'_dp.jpg">
            </a>
          </div>
        <div class="u-card-info">
          <a href="u/'.$username.'">
            <span class="user-name">'.$fname.'&nbsp;'.$lname.'</span>
          </a>
          <p>
            <a href="u/'.$username.'">
              <span class="user-uname">@'.$username.'</span>
            </a>
          </p>
          <button class="follow-btn follow" id="'.$ID.'">Follow</button>
        </div>
        </div>';

        }
  }
  
}else
{
  echo "No user records found";
}
?>