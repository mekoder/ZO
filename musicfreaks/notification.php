<?php 
/*
function time_ago($date,$granularity=2) {
    $date = strtotime($date);
    $difference = time() - $date;
    $periods = array('decade' => 315360000,
        'year' => 31536000,
        'month' => 2628000,
        'week' => 604800, 
        'day' => 86400,
        'hour' => 3600,
        'minute' => 60,
        'second' => 1);
    if ($difference < 5) { // less than 5 seconds ago, let's say "just now"
        $retval = "just now.";
        return $retval;
    } else {                            
        foreach ($periods as $key => $value) {
            if ($difference >= $value) {
                $time = floor($difference/$value);
                $difference %= $value;
                $retval .= ($retval ? ' ' : '').$time.' ';
                $retval .= (($time > 1) ? $key.'s' : $key);
                $granularity--;
            }
            if ($granularity == '0') { break; }
        }
        return $retval.' ago.';      
    }
}
*/

?>
<?php
sleep(0.8);
include("conn.php");
include 'error.php';
$userdp = "_dp";
session_start();
$sid= $_SESSION['sid'];

$notifications= $_GET['notifications'];
if($notifications !==""){
 $result4 = "SELECT * FROM musicfreaks_users WHERE username = '$sid'";
$result3 = $conn->query($result4);
if ($result3->num_rows > 0) {
     while($row = $result3->fetch_assoc()) {
		 
	$id= $row['ID'];
}
}
	  
 $sql = "SELECT * FROM noti WHERE reciver = '$id' and seen = 0 ORDER BY id DESC LIMIT 4";  
 $result = mysqli_query($conn, $sql);  
 if(mysqli_num_rows($result) > 0)  
 {  echo "<script>$('.not-time').timeago();</script>
                 <script async='async' src='js/timeago.js'></script>
                 <script async='async' src='noticlick.js'></script>";

      while($row = mysqli_fetch_array($result))  
      {     
          $id2 = $row["id"];
      	   $reciver = $row["reciver"];
           $sender = $row["sender"];
           $cmt_type = $row["cmt_type"];
           $seen = $row["seen"];
           $time_date = $row["time_date"];
           //$time_date = $row['time_date'];
		   
          	$result2 = "SELECT * FROM musicfreaks_users WHERE id = $sender";
            $result3 = $conn->query($result2);
            if ($result3->num_rows > 0) {
                 while($row = $result3->fetch_assoc()) {
                 
				 
              $senderuname= ucfirst($row['username']);
			  $username2 = $row['username'];
               }
            }

	$sql5 = "SELECT dp from musicfreaks_users where username = '$senderuname'";
	$result5 = mysqli_query($conn, $sql5);  
 	if(mysqli_num_rows($result5) > 0)  
 	{  
      while($row = mysqli_fetch_array($result5))  
      {     
    	$dpusername=$row["dp"];
 		 }
	} 

if ($dpusername !=="")
   {
       	$userdp = "_dp";
		$dp1 = "assets/u_dp/$senderuname$userdp.jpg";
		}		
		 else
	                {
	               $dp1 =  "images/d_up112.png";
          	}
				if($cmt_type =="follow")
           {
            $link = '';
           	$follownoti = "
<div id='note$id2'>
  <div class='outer-noti-i'>
            <a href='u/$senderuname'>
              <div class='note' id='$id2'>
              <div class='not-i'>
              <div class='not-i-base'>
                <img class='base-img' src='$dp1' />
              </div>
                              <div class='not-i-info'>
                <p class='name_follower'><span id='follower-username'> $senderuname </span> followed you.</p>
                             </div>                 
                             <div class='not-i-time'>
                 <span class='w-time'><time class='not-time' datetime='$time_date'>$time_date</time>
                 </span>
                             </div>                   
                        </div>
                    </div>
            </a>
              <span class='noti-i-options-bg'><span class='noti-i-options'></span></span>
               <div class='noti-i-more'>
                <a>Follow back</a>
                <a>Block user</a>
               </div>
               <script src='js/noti-i-more.js'></script>
          </div>
</div> ";
            echo $follownoti; }

    $sql5 = "SELECT dp from musicfreaks_users where username = '$senderuname'";
  $result5 = mysqli_query($conn, $sql5);  
  if(mysqli_num_rows($result5) > 0)  
  {  
      while($row = mysqli_fetch_array($result5))  
      {     
      $dpusername=$row["dp"];
     }
  } 

if ($dpusername !=="")
   {
        $userdp = "_dp";
    $dp1 = "assets/u_dp/$senderuname$userdp.jpg";
    }   
     else
                  {
                 $dp1 =  "images/d_up112.png";
            }
// ===============================================================
           if($cmt_type =="song"){
            $follownoti2 = "<div id='note$id2'>
   <div class='outer-noti-i'>
        <a href='u/$senderuname'>
          <div class='note' id='$id2'>
            <div class='not-i'>
              <div class='not-i-base'>
                <img class='base-img' src='$dp1'/>
              </div>
                              <div class='not-i-info'>
                <p class='name_follower'>
                <span id='follower-username'> $senderuname </span> added new song to his playlist.
                </p>
                             </div>                  
              
                <div class='not-i-time'>
                   <span class='w-time'>
                   <time class='not-time' datetime='$time_date'>$time_date</time>
                   </span>
                </div>
            </div>
          </div>
        </a>
    </div>
</div>";
// ==============================================================
            echo $follownoti2;
           }
             
            
      }
     
              
 }  else 
 echo '<div class="no-notification">
	   		<span class="no-noti-icon"></span>
				<p class="no_noti_msg">No notifications yet!</p>
	   </div>
<script>
$(".no-notification").hover(function () {
    $(".smily-smile").animate({
    opacity: 1,
  }, 100, function() {
     $(".smily-smile").toggleClass("smilevisible");
  });
});
</script> ';

 $sql1 = "UPDATE noti SET all_seen = 1 WHERE reciver = '$id'";  
 $result10 = mysqli_query($conn, $sql1); 
}
 ?>