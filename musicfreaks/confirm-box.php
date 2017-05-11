<style type="text/css">
.confirm-overlay_black{position: fixed; top:0; left: 0; right:0; z-index: 5600; width: 100%; height: 100%; background:rgba(40,40,40,.5) !important; display:none;}
.confirm-box{ position:fixed; left:35%; top:14%; z-index:9999; width:400px; height:140px; background-color:#fff; font-family:'Raleway' !important; box-shadow: 0 8px 10px 1px rgba(0,0,0,0.12), 0 3px 14px 2px rgba(0,0,0,0.12), 0 5px 5px -3px rgba(0,0,0,0.12);font-family:'Raleway' !important;}
.confirm-pop-header{ width:inherit; height:55px; font-size:16px; background-color:#f1f1f1; font-weight: 600;}
.confirm-heading{padding:20px; color:#555; margin:0;}
.confirm-body{}
.btnss{float:right; position:relative; top:35px; right:25px;}
.btnn{width: 86px; height: 33px; border: none; border-radius: 3px;  font-size: 12px; font-weight: 600; cursor: pointer; outline: none; box-shadow: 0 2px 5px 0px rgba(0,0,0,.26); margin-right: 3px; font-family: 'Raleway' !important; text-transform: uppercase;}
.confirm-del-btn{background-color: #5d93fe; color: #fff;}
.confirm-canc-btn{ background-color:#eee; color:#555; box-shadow:none; -webkit-box-shadow:none; font-weight:700;}
.delete-define_icon{background-image:url(assets/images/gzv_iconsCharacters.png); background-repeat:no-repeat; width:40px; height:40px; display:block; position:absolute; top:85px; left:72px;}
</style>
<script type="text/javascript" src="js/delete-playlist-js.js"></script>
<div class="confirm-overlay_black"></div>
    <div class="confirm-box">
        <div class="confirm-pop-header">
        	<p class="confirm-heading">Do you really want to delete this playlist?</p>
        </div>
        	<div class="confirm-body">
            <span class="delete-define_icon"></span>
            	<div class="btnss">
            	<button class="confirm-del-btn btnn">delete</button>
                <button class="confirm-canc-btn btnn">leave</button>
                </div>
            </div>
    </div>
    
<script>
$(document).ready(function() {
   $(".confirm-del-btn").click(function(){
   $.ajax({
   	type:'GET', url:'playlist_delete.php?plistdelete=<?php echo $_GET['url']; ?>',success:function(response){
                        $('.plistresult').html(response);
                        $(".plistresult").css("display","block").animate({'bottom':'46px'},450);
                        $("#plistresult").delay(1500).animate({'bottom':'-70px'},450).fadeOut(200);
                        window.location="myprofile";

                       }
          })
      })
 });
 </script>
    
    
