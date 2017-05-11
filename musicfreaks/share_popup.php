<style type="text/css">
.share-overlay_black{position: fixed; top:0; left: 0; right:0; z-index: 5600; width: 100%; height: 100%; background:rgba(40,40,40,.5) !important; display:none;}
.share-popbox{ position:fixed; left:35%; top:14%; z-index:9999; width:400px; height:205px; background-color:#fff; font-family:'Raleway' !important; box-shadow: 0 8px 10px 1px rgba(0,0,0,0.12), 0 3px 14px 2px rgba(0,0,0,0.12), 0 5px 5px -3px rgba(0,0,0,0.12); font-family:'Raleway' !important;}
.share-pop-header{ width:inherit; height:55px; font-size:20px; background-color:#f1f1f1; font-weight: 600;}
.share-heading{padding:20px; color:#555;}
.share-links{padding:30px 10px; text-align:center;}
.share-links li{ width:45px; height:45px; background-color:#eee; border-radius:50%; list-style:none; display:inline-block; margin:0 5px; cursor:pointer;}
li#fb-link_art{background-image:url(assets/images/fb_link-smallpicture.jpg);}
li#twitter-link_art{background-image:url(assets/images/twitter_link-smallpicture.jpg);}
li#gplus-link_art{background-image:url(assets/images/gplus_link-smallpicture.jpg);}
li#blogger-link_art{background-image:url(assets/images/blogger_link-smallpicture.jpg);}
li#tumblr-link_art{background-image:url(assets/images/tumblr_link-smallpicture.jpg);}
li#linkedin-link_art{background-image:url(assets/images/linkedin_link-smallpicture.jpg);}
.copy-link_art{text-transform:uppercase; background-color:#eee; padding:11px 3px; border:none; display:block; width:120px; margin:10px 0 0 127px; font-weight:700; font-size:14px; border-radius:3px; cursor:pointer;} 
</style>
<script type="text/javascript" src="js/copy-link.js"></script>
<script>
		$(document).ready(function() {
            $("#copyButton").click(function(){
                   $.ajax({
                       type:'GET', url:'playlist_favorite.php?plistlink=copylink',success:function(response){
                        $('.copyresult').html(response);
                        $(".copyresult").css("display","block").animate({'bottom':'46px'},450);
                        $("#copyresult").delay(1500).animate({'bottom':'-70px'},450).fadeOut(200);
                       }
                           })
                })
            });
    </script>
    
<?php $url = "http://www.gozovo.com/playlist?plist=".$_GET['url']."&".urlencode($_GET['name']); ?>

<div class="share-overlay_black"></div>
    <div class="share-popbox">
        <div class="share-pop-header">
        	<p class="share-heading">Share</p>
        </div>
        	<div class="share-links">
            	<li id="fb-link_art" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php echo $url;?>','sharer','toolbar=0,status=walalalalalaalal,width=580,height=400');" title="Facebook"></li>
                <li id="twitter-link_art" onclick="window.open('https://twitter.com/intent/tweet?url=<?php echo $url;?>&text=1 of my favorite playlist&via=GOZOVO.COM&hashtags=musicfreaks,music,songs,playlist','tweety','toolbar=0,status=0,width=550,height=450');"
';" title="Twitter"></li>
                <li id="gplus-link_art" onclick="window.open('https://plus.google.com/share?url=<?php echo $url;?>','share','toolbar=0,status=0,width=550,height=450');" title="Google+"></li>
                
                <li id="blogger-link_art" onclick="window.open('https://www.blogger.com/blog-this.g?u=<?php echo $url;?>&n=My favotite music site&t=blablabla','share','toolbar=0,status=0,width=550,height=450');" title="Blogger"></li>
                <li id="tumblr-link_art" onclick="window.open('https://www.tumblr.com/widgets/share/tool?canonicalUrl=<?php echo $url;?>&title=My favorite music site&tags=music, songs, playlist&summary=kuch nhi&caption=Create your own playlist, follow your friends, artists','share','toolbar=0,status=0,width=550,height=450');" title="Tumblr"></li>
                <li id="linkedin-link_art" onclick="window.open('https://www.linkedin.com/shareArticle?url=<?php echo $url;?>&title=title likh do','share','toolbar=0,status=0,width=550,height=450');" title="Linkedin"></li>
          			<div id="copyTarget" style="display:none;" msg='<?php echo $url; ?>'></div>

                	<span class="copy-link_art" id="copyButton">copy link</span>
            </div>
    </div>
<script type="text/javascript" src="js/share-playlist-js.js"></script>