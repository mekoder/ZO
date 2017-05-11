<?php 
$directoryURI = $_SERVER['REQUEST_URI'];
$path = parse_url($directoryURI, PHP_URL_PATH);
$components = explode('/', $path);
$first_part = $components[2];
?>
<div class="category-drawer" id="category-drawer">
<ul id="category">
<!--<h4>MAIN</h4>-->
<a class="a-link more_"><li><i class="main_icons45 fotu_m"></i><span class="cc_span"></span></li></a>
<a class="a-link" ui-sref="home" ui-sref-active="beActive"><li><i class="main_icons45 fotu_h"></i><span class="cc_span">Home</span></li></a>
<a class="a-link" ui-sref="artists" ui-sref-active="beActive"><li><i class="main_icons45 fotu_a"></i><span class="cc_span">Artists</span></li></a>
<!--<a href="videos"><li><i class="main_icons45 fotu_v"></i><span>Videos</span></li></a> -->
<a class="a-link" ui-sref="browse" ui-sref-active="beActive"><li><i class="main_icons45 fotu_b"></i><span class="cc_span">Browse</span></li></a>
<a class="a-link" ui-sref="discover" ui-sref-active="beActive"><li><i class="main_icons45 fotu_d"></i><span class="cc_span">Discover</span></li></a>
<a class="a-link" ui-sref="station" ui-sref-active="beActive"><li><i class="main_icons45 fotu_s"></i><span class="cc_span">Radio station</span></li></a>
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
	<a class="a-link" href="login"><li class="create-pl" id="click-create"><i class="main_icons45 fotu_cp"></i><span class="cc_span">Create playlist</span></li></a>
<?php
}else
{
	?>
<a class="a-link"><li class="create-pl" id="click-create"><i class="main_icons45 fotu_cp"></i> <span class="cc_span">Create playlist</span></li></a>
<?php
}
?>
<a class="a-link"><li class="uprade-contai-btn pro-color"><i class="main_icons45 fotu_p pro-color"></i> <span class="cc_span">Go Pro</span></li></a>
</ul>
</div>
<!-- C - P -->

<?php
if($sid !==""){
  include "playlist_popup.php";
}

?>