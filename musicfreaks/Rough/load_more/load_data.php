<?php  
 $output = '';  
 $video_id = '';  
 //sleep(5);  
 $connect = mysqli_connect("localhost", "root", "", "musicfreaks");  
 $sql = "SELECT * FROM tbl_video WHERE video_id > ".$_POST['last_video_id']." LIMIT 4";  
 $result = mysqli_query($connect, $sql);  
 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {  
           $video_id = $row["video_id"];  
           $output .= '  
                <tbody>  
                <tr>  
                     <td>'.$row["video_title"].'</td> 
                     <td><img src="'.$row["img_src"].'"/></td>  
                </tr></tbody>';  
      }  
      $output .= '  
                <tbody><tr id="remove_row">  
                     <td><button type="button" name="btn_more" data-vid="'. $video_id .'" id="btn_more" class="btn btn-success form-control">more</button></td>  
                </tr></tbody>  
      ';  
      echo $output;  
 }  
 ?> 