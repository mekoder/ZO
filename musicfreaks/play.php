
<html>
<head>
<style type="text/css">
div#video_player_box{width:1174px; background-color:rgba(0,0,0,.8); margin:0px 0px;}
#fullscreenbtn{width:45px; font-size:18px; height:22px; padding-bottom:20px; background:transparent; border:none; color:#333; border-radius:1px; outline:none; cursor:pointer; }#fullscreenbtn:hover{color:#FFF;}
#widescreenbtn{width:45px; margin-left:5px; font-size:18px; height:22px; padding-bottom:20px; background:transparent; border:none; color:#333; border-radius:1px; outline:none; cursor:pointer;}#widescreenbtn:hover{color:#FFF;}
#playpausebtn{width:30px; background:url(pics/play2.png); background-repeat:no-repeat; height:25px;  border:none;  outline:none; cursor:pointer; }
#mutebtn{width:30px; height:25px; background:url(pics/speaker.png); background-repeat:no-repeat; border:none;  outline:none; cursor:pointer;}
div#video_controls_bar{ background: #f94242; padding:6px 11px; color:#521313; font-weight:700; font-size:13px; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif; height:34px;}
input#volumeslider{ width: 50px; padding-bottom:0px; cursor:pointer; }
input#seekslider{ width:760px; padding-bottom:0px; margin-left:5px; cursor:pointer; }
#curtimetext{margin-left:15px;}
#video_heading{color:#1a1a1a; text-shadow:0px 1px 0px #484848; visibility:visible; font-size:26px; padding:10px 0px; font-family:Arial, Helvetica, sans-serif;} 
button{ text-decoration:none; outline:none;}
input[type='range'] {-webkit-appearance: none !important; -ms-appearance: none !important; -moz-appearance: none !important; background: #9a2828; height:3px;  outline:none; border-radius:25px; } input[type='range']::-webkit-slider-thumb:active{background:#000; height:15px; width:15px;} input[type='range']::-webkit-slider-thumb { transition:  width 200ms ease-in-out, height 200ms ease-in-out; -ms-transition:  width 200ms ease-in-out, height 200ms ease-in-out; -moz-transition:  width 200ms ease-in-out, height 200ms ease-in-out;
    -webkit-appearance: none !important;
	-ms-appearance: none !important;
	-moz-appearance: none !important;
	box-shadow: 0 0px 0px 1px rgba(34, 25, 25, 0.4);
	margin-top:0.5px;
	margin-bottom:1px;
    background: #333;
    height:8px;
    width:8px;
	border-radius:100%;
	cursor:pointer;
}
</style>
<script>
var vid, playbtn, seekslider, curtimetext, durtimetext, mutebtn, volumeslider, fullscreenbtn, widescreenbtn;
function intializePlayer(){
	// Set object references
	vid = document.getElementById("my_video");
	playbtn = document.getElementById("playpausebtn");
	seekslider = document.getElementById("seekslider");
	curtimetext = document.getElementById("curtimetext");
	durtimetext = document.getElementById("durtimetext");
	mutebtn = document.getElementById("mutebtn");
	volumeslider = document.getElementById("volumeslider");
	fullscreenbtn = document.getElementById("fullscreenbtn");
	widescreenbtn = document.getElementById("widescreenbtn");
	video_heading = document.getElementById("video_heading");
	seekslider = document.getElementById("seekslider");
	video_controls_bar = document.getElementById("video_controls_bar");
	video_player_box = document.getElementById("video_player_box");
	// Add event listeners
	playbtn.addEventListener("click",playPause,false);
	seekslider.addEventListener("change",vidSeek,false);
	vid.addEventListener("timeupdate",seektimeupdate,false);
	mutebtn.addEventListener("click",vidmute,false);
	volumeslider.addEventListener("change",setvolume,false);
	fullscreenbtn.addEventListener("click",toggleFullScreen,false);
	widescreenbtn.addEventListener("click",togglewideScreen,false);
	volumeslider.addEventListener("mousemove", setvolume);
}
window.onload = intializePlayer;
function playPause(){
	if(vid.paused){
		vid.play();
		playbtn.style.background = "url(pics/pause2.png) no-repeat";
	} else {
		vid.pause();
		playbtn.style.background = "url(pics/play2.png) no-repeat";
	}
}
function vidSeek(){
	var seekto = vid.duration * (seekslider.value / 100);
	vid.currentTime = seekto;
}
function seektimeupdate(){
	var nt = vid.currentTime * (100 / vid.duration);
	seekslider.value = nt;
	var curmins = Math.floor(vid.currentTime / 60);
	var cursecs = Math.floor(vid.currentTime - curmins * 60);
	var durmins = Math.floor(vid.duration / 60);
	var dursecs = Math.floor(vid.duration - durmins * 60);
	if(cursecs < 10){ cursecs = "0"+cursecs; }
	if(dursecs < 10){ dursecs = "0"+dursecs; }
	if(curmins < 10){ curmins = "0"+curmins; }
	if(durmins < 10){ durmins = "0"+durmins; }
	curtimetext.innerHTML = curmins+":"+cursecs;
	durtimetext.innerHTML = durmins+":"+dursecs;
}
function vidmute(){
	if(vid.muted){
		vid.muted = false;
		mutebtn.style.background = "url(pics/speaker.png) no-repeat";
	} else {
		vid.muted = true;
		mutebtn.style.background = "url(pics/mute.png) no-repeat";
	}
}
function setvolume(){
	vid.volume = volumeslider.value / 100;
}
function togglewideScreen(){
	if(widescreenbtn.click){
		video_heading.style.visibility = "hidden";
		video_heading.style.transition = ".8s ease-out";
		video_player_box.style.margin = "0px 0px";
		video_player_box.style.width = "1174px";
		video_heading.remove();
		vid.style.width = "1174px";
		vid.style.height = "570px";
		}
	}
function toggleFullScreen(){
	if(vid.requestFullScreen){
		vid.requestFullScreen();
	} else if(vid.webkitRequestFullScreen){
		vid.webkitRequestFullScreen();
	} else if(vid.mozRequestFullScreen){
		vid.mozRequestFullScreen();
	}
}
</script>
</head>
<div id="video_player_box">
<center>
<p id="video_heading" class="video_heading">Have you seen what's new in bollywood yet?</p>
<video id="my_video" width="600" height="300" onClick="playPause()" onDblClick="toggleFullScreen()" allowfullscreen>
    <source src="audios/Mere_Bare_-_Garry_Sandhu.mp4" >
  </video>
  </center>
  <div id="video_controls_bar">
    <button class="playpausebtn" id="playpausebtn" title="Play/Pause"></button>
    <input id="seekslider" type="range" min="0" max="100" value="0" step="1">
    <span id="curtimetext">00:00</span> / <span id="durtimetext">00:00</span>
    <button id="mutebtn" title="Mute/Unmute"></button>
    <input id="volumeslider" type="range" min="0" max="100" value="100" step="1">
    <button id="widescreenbtn" title="Wide Screen"><img src="images/wide_screens_big1.png" width="30" height="25"/></button>
    <button id="fullscreenbtn" title="Full Screen"><img src="images/wide_screenb_big1.png" width="20" height="20"/></button>
  </div>
</div>
