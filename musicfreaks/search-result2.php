

<script type="text/javascript">
$(document).ready(function() {
  $(".mainhead-search").keyup(function() {
    if ($(".mainhead-search").val()=="") {
      $("#loader").hide();
    }else{
    $("#loader").show();
  }
  
    var nam=$(".mainhead-search").val();
          $.ajax({
            type:'GET', url:'search-process/user.php',data:"obj="+nam,success:function(response){
              $("#loader").hide();
            $('#s_result-container').html(response);
           }
         })

      })
  });
</script>
<script type="text/javascript">
	$('.search-overlay_black, .mf-main-nav').click(function() {
        $('#s_result-container').hide();
		$('.search-overlay_black').hide();
    });    
</script>

<style type="text/css">
body{margin:0;}
.search_globalContainer{ z-index:3;}
.search-overlay_black{position: fixed; top:57px; left: 0; right:0; z-index: 5600; width: 100%; height: 100%; background: rgba(0,0,0,.11) !important; display:none;}
.s_result-container{ position:fixed; width:595px; height:230px; background-color:#fff; margin:0 auto; /*box-shadow:0 6px 23px rgba(0,0,0,.4);*/ z-index:9999; top:57px; left:377px; overflow:auto; outline:none;}
.s_result-container li{display:inline-block; list-style:none;}
.showUp{ display:block;}

/* Playlist code */
.playlist-container{padding:0 25px;}
.playlist-card{position:relative; width:140px; height:140px; display:inline-block; margin:10px 10px 10px 11px; border:none;  /*-webkit-box-shadow:0 1px 2px 0 rgba(0,0,0,0.24); box-shadow:0 1px 2px 0 rgba(0,0,0,0.24);*/  font-family:'Raleway' !important; text-align:left; color:#333; }
.create-playlist{background-size:100%; width:150px; height:150px; position:relative; top:-10px;}
.create-playlist:before{content:''; width:150px; height:150px; background:url(assets/images/gzv-playlist_bg-image.png) no-repeat; position:absolute; background-size:100%; top:-4px; right:4px;}
.user-playlist::before{content:''; width:150px; height:150px; background:url(assets/images/gzv-playlist_bg-image.png) no-repeat; position:absolute; background-size:100%; top:-4px; right:-6px;}
.playlist-card a{text-decoration:none; color:#888; }
.playlist-card a:hover{color:#666;}
.pl-card-art{position:absolute; top:0; right:0; left:0; width:140px; object-fit:cover; border:1px solid #ddd; border-radius:3px;}
.playlist-card-info{ margin-top:150px; padding:2px 0;}
h4.playlist-name{margin:0; font-weight:600; font-family:'Raleway' !important; white-space:nowrap; overflow:hidden; font-size:15px;}
.create-card-art{ position:absolute; top:102px; left:20px; font-weight:600; color:#888; font-size:15px;}
.create-playlist{cursor:pointer;}
.light-color { color: #fff;}
</style>
<div class="search_globalContainer">
	<div class="search-overlay_black"></div>
        <div class="s_result-container" id="s_result-container">
        </div>
</div>