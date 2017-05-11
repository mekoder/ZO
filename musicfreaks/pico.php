<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title></title>
        <script type="text/javascript">
            var picPaths = ["music-art/hate.png","music-art/naina.png","music-art/saanson.png","music-art/hamdard.png"];
            var curPic = -1;
            //preload the images for smooth animation
            var imgO = new Array();
            for(i=0; i < picPaths.length; i++) {
                imgO[i] = new Image();
                imgO[i].src = picPaths[i];
            }

            function swapImage() {
                curPic = (++curPic > picPaths.length-1)? 0 : curPic;
                imgCont.src = imgO[curPic].src;
                setTimeout(swapImage,2000);
            }

            window.onload=function() {
                imgCont = document.getElementById('imgBanner');
                swapImage();
            }



         document.addEventListener("DOMContentLoaded", function() {

    var fadeComplete = function(e) { stage.appendChild(arr[0]); };

    var stage = document.getElementById("picPaths");
    var arr = stage.getElementsByTagName("img");
    for(var i=0; i < arr.length; i++) {
      arr[i].addEventListener("webkitAnimationEnd", fadeComplete, false);
      arr[i].addEventListener("animationend", fadeComplete, false);
      arr[i].addEventListener("MSAnimationEnd", fadeComplete, false);
    }

  }, false);
  
  
  
        </script>

<style type="text/css">
body
{
	margin:0px;}
#imgBanner
{
	height:200px;
	width:200px;
	}
	
	
  .pics img:nth-of-type(1) {
    -webkit-animation-name: fader;
    -webkit-animation-delay: 4s;
    -webkit-animation-duration: 1s;
    -moz-animation-name: fader;
    -moz-animation-delay: 4s;
    -moz-animation-duration: 1s;
    -ms-animation-name: fader;
    -ms-animation-delay: 4s;
    -ms-animation-duration: 1s;
    z-index: 20;
  }
  .pics img:nth-of-type(2) { z-index: 10; }
  .pics img:nth-of-type(n+3) { display: none; }

  @-webkit-keyframes fader {
    from { opacity: 1.0; }
    to   { opacity: 0.0; }
  }
  @-moz-keyframes fader {
    from { opacity: 1.0; }
    to   { opacity: 0.0; }
  }
  @-ms-keyframes fader {
    from { opacity: 1.0; }
    to   { opacity: 0.0; }
  }

.header1
{
	position:fixed;
	width:100%;
	height:80px;
	background-color:#0000FF;
	z-index:1;}
</style>
    </head>
    <body>
    
    <div class="header1">
    </div>

        <div class="pics">
            <img id="imgBanner" src="" alt="" />
        </div>
        
        
<style type="text/css">
#image {
    position: absolute;
    left: 0px;
    top: 300px;
    z-index: -1;
	height:300px;
width:300px;
}

#image:hover
{
	transform:scale(2.5);}
	
.img2:hover
{
	-webkit-transform:scale(1.5);}
h4
{ position: absolute;
    left: 20px;
    top: 305px;
    z-index:0;}
	
h4:hover
{
	color:#F00;}

</style>
<h4>This is a <br> headhdscb kjhduisdhfuismefhse8ufm sjeufg</h4>
<div id="image" class="img2">
<img src="music-art/hate.png">
</div>
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />

    </body>
</html>