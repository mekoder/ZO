<?php 
$directoryURI = $_SERVER['REQUEST_URI'];
$path = parse_url($directoryURI, PHP_URL_PATH);
$components = explode('/', $path);
$first_part = $components[2];
?>
<div class="category-container" id="category-container" >
<ul id="category">
<!--<h4>MAIN</h4>-->
<a class="a-link more_" data-ttip="More"><li><i class="main_icons45 fotu_m"></i><span class="cc_span"></span></li></a>
<a class="a-link home_" data-ttip="Home" href="home"><li><i class="main_icons45 fotu_h"></i><span class="cc_span"></span></li></a>
<a class="a-link artists_" href="artists"><li><i class="main_icons45 fotu_a"></i><span class="cc_span"></span></li></a>
<!--<a href="videos"><li><i class="main_icons45 fotu_v"></i><span>Videos</span></li></a> -->
<a class="a-link browse_" href="browse"><li><i class="main_icons45 fotu_b"></i><span class="cc_span"></span></li></a>
<a class="a-link discover_" href="discover"><li><i class="main_icons45 fotu_d"></i><span class="cc_span"></span></li></a>
<a class="a-link radio_" href="station"><li><i class="main_icons45 fotu_s"></i><span class="cc_span"></span></li></a>
</ul>
<div class="horizontal-line"></div>
<!--
<ul id="category2">
<h4>LATEST</h4>
<a href="#"><li id="<?php if ($first_part==""){echo "active";} else{echo "inactive";}?>"><i class="main_icons45 fotu_f" id="<?php if ($first_part==""){echo "active";} else{echo "inactive";}?>"></i><span id="<?php if ($first_part==""){echo "active";} else{echo "inactive";}?>">Featured</span></li></a>
<a href="#"><li id="<?php if ($first_part==""){echo "active";} else{echo "inactive";}?>"><i class="main_icons45 fotu_n" id="<?php if ($first_part==""){echo "active";} else{echo "inactive";}?>"></i><span id="<?php if ($first_part==""){echo "active";} else{echo "inactive";}?>">New releases</span></li></a>
<a href="#"><li id="<?php if ($first_part==""){echo "active";} else{echo "inactive";}?>"><i class="main_icons45 fotu_w" id="<?php if ($first_part==""){echo "active";} else{echo "inactive";}?>"></i><span id="<?php if ($first_part==""){echo "active";} else{echo "inactive";}?>">Weekly top</span></li></a>
</ul>
-->
<ul id="category3">
<?php
if($sid =="")
{
  ?>
	<a class="a-link create-pl_" href="login"><li class="create-pl" id="click-create"><i class="main_icons45 fotu_cp"></i><span class="cc_span"></span></li></a>
<?php
}else
{
	?>
<a class="a-link create-pl_"><li class="create-pl" id="click-create"><i class="main_icons45 fotu_cp"></i> <span class="cc_span"></span></li></a>
<?php
}
?>
<a class="a-link gopro_"><li class="uprade-contai-btn pro-color"><i class="main_icons45 fotu_p pro-color"></i> <span class="cc_span"></span></li></a>
</ul>
<?php include "tooltip-page.php"; ?>
</div>
<!-- C - P -->

<?php
if($sid !==""){
  include "playlist_popup.php";
}

?>
<!--<script type="text/javascript" src="js/category_drawer-js.js"></script>
<script>
$(document).ready(function() {
    $('.more_').click(function(){
		$('.category-container').toggleClass('widthIncrease');
		//$('.cc_span').toggleClass('spanVisibility');
		$('.fotu_m').toggleClass('ileft');
		})
});
</script>
<script>
$(document).ready(function() {
		$('.more_').click(function() { 
    	$('.cc_span').removeClass('spanVisibility');
	}, function() { 
    	$('.cc_span').addClass('spanVisibility');
	});
		});
</script> -->
  