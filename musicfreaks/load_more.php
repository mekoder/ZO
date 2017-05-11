<?php  
include 'conn.php';
 $output = '';  
 $id = '';  
 $artdp = "_dp.jpg"; 
 $sql = "SELECT * FROM mf_artist WHERE id > ".$_POST['last_video_id']." LIMIT 45";  
 $result = mysqli_query($link, $sql);  
 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {  
           $id = $row["id"];  
		   $artistUname = $row["username"];
		   $filename = "assets/artist_dp/$artistUname$artdp";
		   if (file_exists($filename)) {
    								$filename = $filename;
									} else {
										$filename = "images/d_artistdp1.png";
								    }
									
           $output .= '  
                <div class="arti-art artif_hin">
                                <a href="artist/'.$row["username"].'">
                                  <div class="artist-img">
                                  <img data-original="'. $filename .'" class="artist_image">
								    
									</div>
                                   <div class="overlay-black" title="'.$row["name"].'">
                                    <span id="a-name" class="a-name">'.$row["name"].'</span>
                                  </div>
                                </a>
                              </div>';  
      }  
      $output .= ' <div id="line7" class="horizontal-line7"></div> 
                               <div id="remove_row">  
								   <div class="more-artist-btn">
										<button type="button" class="loadarti_more" name="btn_more" data-vid="'. $id .'" id="btn_more">
											<span>Load more</span>
										</button>
									</div>
                          	   </div>
                   <script async src="js/appendartist_name-js.js" ></script>
                   <script src="js/jquery.lazyload.js" type="text/javascript"></script>
                   <script>$("img.artist_image").lazyload();</script>
				   <script>
				   $(document).ready(function(){
					   $(".loadarti_more").click(function(event){
						   $("html, body").animate({scrollTop: "+=80px"}, 350);
						   });
					   });
			       </script>';  
      echo $output;  
 } 
 ?>