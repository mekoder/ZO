<?php
$nam=$_GET['obj'];
$nam= preg_replace("#[^0-9a-z@_ ]#i","",$nam);
include("conn.php");

$sel=mysqli_query($link,"SELECT * from musicfreaks_users where username LIKE '%$nam%' or mail LIKE '%$nam%' or fname LIKE '%$nam%' or lname LIKE '%$nam%' or fullname LIKE '%$nam%' ORDER BY '$nam%' DESC");
                         
if(mysqli_num_rows($sel)>0)
{ 
echo '
<script src="js/scroll-scripts/scrollbox/jquery.scrollbox.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function($) {
      $(".s_result-container").scrollbox();
    });
</script>
<h4>users</h4>';
  while($arr=mysqli_fetch_array($sel))
  {
     extract($arr);
     {

echo '	
                <li>
                    <a href="u/'.$username.'">
                        <div class="playlist-card user-playlist">
                             <img class="pl-card-art" src="../musicfreaks/assets/u_dp/'.$username.'_dp.jpg" />
                                <div class="playlist-card-info">
                                    <h4 class="playlist-name">'.$fname.'&nbsp;'.$lname.'</h4>
                                </div>
                        </div>
                    </a>
                </li>';
				
        }
  }
  
}else
{
  echo "No user records found";
}

?>