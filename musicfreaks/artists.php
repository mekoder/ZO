<?php
include ("error.php");
include 'conn.php';
session_start();
$sid= $_SESSION['sid'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href='https://fonts.googleapis.com/css?family=Product+Sans' rel='stylesheet' type='text/css'>
<link rel="icon" type="image/png" href="images/mf-favicon1.png">
<link rel="stylesheet" href="style.css" />
<link rel="stylesheet" href="artis-mf-css-jk786.css" />
<link rel="stylesheet" href="footer.css" />
<link href="//fonts.googleapis.com/css?family=Raleway:100normal,100italic,200normal,200italic,300normal,300italic,400normal,400italic,500normal,500italic,600normal,600italic,700normal,700italic,800normal,800italic,900normal,900italic|Open+Sans:400normal|Lato:400normal|Roboto:400normal|Oswald:400normal|Droid+Sans:400normal|Droid+Serif:400normal|Lobster:400normal|PT+Sans:400normal|Ubuntu:400normal|Playfair+Display:400normal&amp;subset=all" rel="stylesheet" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script async src="js/appendartist_name-js.js" ></script>
<script async="async" src="js/jquery.lazy.min.js"></script>s
<title>All your favourite artists at one place - Musicfreaks</title>
</head>

<body>
<?php
include ("main_nav.php");
?>
<div class="main-player"></div>
<?php
include("category-container.php");
?>
<div class="globalcontainer">
    <div class="body-container">
    
    <section id="artists-page">
<div class="top-layer"></div>
<!--
<div class="search-home">
<input type="text" class="search2" id="search2" placeholder="What would you like to listen to?"/>
</div> -->
<!-- Body here -->

<div class="region-arti shad">
          <ul class="region-categ">
            <a href="#"><li class="region-categ1">HINDI</li></a>
            <a href="#"><li class="region-categ3">ENGLISH</li></a>
            <a href="#"><li class="region-categ2">PUNJABI</li></a>
            <a href="#"><li class="region-categ4">BHOJPURI</li></a>
            <a href="#"><li class="region-categ5">BENGALI</li></a>
            <a href="#"><li class="region-categ6">TAMIL</li></a>
            <a href="#"><li class="region-categ7">TELUGU</li></a>
            <a href="#"><li class="region-categ8">MARATHI</li></a>
            <a href="#"><li class="region-categ9">GUJARATI</li></a>
          </ul>
          
           <ul class="cate-m_f">
       <a href="#"><li class="fl_btn"><span>FEMALE</span></li></a>
       <a href="#"><li class="ml_btn"><span>MALE</span></li></a>
       </ul>
          
       </div>
<div class="artists-main shad">
	<h1 class="artists-head">Artists from your region</h1>

<?php
 $sql = "SELECT * FROM mf_artist ORDER BY ID LIMIT 30";  
 $result = mysqli_query($conn, $sql);  
 $id = '';  
 ?>
<div class="horizontal-line6"></div>
<div class="artists" id="artists">
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                          ?>  
                               <div class="arti-art artif_hin">
                                <a href="artist/<?php echo $row["username"]; ?>">
                                  <div class="artist-img">
                                  <img data-original="<?php
								  $artistUname = $row["username"];
								  $artdp = "_dp.jpg";
							      $filename = "assets/artist_dp/$artistUname$artdp";

								  if (file_exists($filename)) {
    								echo $filename;
									} else {
										echo "images/d_artistdp1.png";
								    }
									?>" class="artist_image"> 

                                    </div>
                                   <div class="overlay-black" title="<?php echo $row["name"]; ?>">
                                    <span id="a-name" class="a-name"><?php echo $row["name"]; ?></span>
                                  </div>
                                </a>
                              </div>
                              <script src="js/jquery.lazyload.js" type="text/javascript"></script>
                              <script>$("img.artist_image").lazyload();</script>

                          <?php  
                               $id = $row["id"];

                  $lazyscript = ' <script>$("img.artist_image").lazyload();</script>';
                          }  
                          ?>
                          <?php echo $lazyscript; ?>
                          <div id="line7" class="horizontal-line7"></div>
                          <div id="remove_row">  
       						<div class="more-artist-btn">
                            	<button type="button" class="loadarti_more" name="btn_more" data-vid="<?php echo $id; ?>" id="btn_more" value="more">
                                	<span>Load more</span>
                                </button>
                            </div>    
<script>
$(document).ready(function(){
	$(".loadarti_more").click(function(event){
		$('html, body').animate({scrollTop: '+=80px'}, 350);
		});
});
</script>
                          </div>



    </div>

                          
<script>  
 $(document).ready(function(){  
      $(document).on('click', '#btn_more', function(){  
           var last_video_id = $(this).data("vid");  
           $('#btn_more').html("Loading...");  
           $.ajax({  
                url:"load_more.php",  
                method:"POST",  
                data:{last_video_id:last_video_id},  
                dataType:"text",  
                success:function(data)  
                {  
                     if(data != '')  
                     {  
                          $('#remove_row , #line7').remove();  
                          $('#artists').append(data); 
                     }  
                     else  
                     {  
                          $('#btn_more').html("no more artists"); 
                          $('#loadarti_more').remove();
						  $('.loadarti_more').addClass("nomore");
						  $('.loadarti_more').prop("disabled",true);
                     }  
                }  
           });  
      });  
 });  
 </script>
</div>
<div id="reset"></div>
</section>
    
    </div>
</div>
<?php 
include ("artists-div.php");
?>
<?php
include ("footer.php");
?>
</body>
</html>