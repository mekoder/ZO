<?php
$nam=$_GET['obj'];
$nam= preg_replace("#[^0-9a-z@_ ]#i","",$nam);
include("conn.php");

$Overview = '';
$Overview = 'Overview';
$sel=mysqli_query($link,"select * from mf_artist where name LIKE '%$nam%' or username LIKE '%$nam%' ORDER BY name");
                         
if(mysqli_num_rows($sel)>0)
{ 
  while($arr=mysqli_fetch_array($sel))
  {
     extract($arr);
     {

echo ' <div class="a-card shad">
          <div class="a-card-img">
            <a href="artist/'.$username.'">
              <img src="assets/artist_dp/'.$username.'_dp.jpg">
            </a>
          </div>
          <div class="a-card-info">
            <a href="artist/'.$username.'">
              <span class="artist-name">'.$name.'</span>
            </a>
            <a href="artist/'.$username.'">
              <button class="artistlink-btn" id="'.$id.'">profile</button>
            </a>
          </div>
        </div>';

      }
  }
  }else
     {
      echo "No artist records found";
     }

?>