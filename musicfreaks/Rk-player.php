		<link rel="stylesheet" type="text/css" href="rk-player.css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
		<script src="jquery-ui.min.js"></script>
		<script src="jquery.audioControls.min.js"></script>
		<script>
			$(document).ready(function(){
				var audioInitialVolume = 100;
				var $sliderObj = $(".volumeSlider");
				var $toolTipObj = $(".tooltip");
				var volRange = $("input[type='range']");

				volRange.attr("value",(audioInitialVolume / 100));
				var getBGImage = function(index){
				
				<!-- Banner Space -->
					return backgroundBanners[index];
				}

				$sliderObj.slider({
					range: "min",
					min: 0,
					max : 100,
					value: audioInitialVolume,
					start: function (event, ui) {
						$toolTipObj.fadeIn('slow');
					},
					stop: function (event, ui) {
						$toolTipObj.fadeOut('slow');
					},
					slide: function(eve, ui){
						var value = $sliderObj.slider('value');
						$toolTipObj.css('fixed', value).text(ui.value);
					},
					change: function(eve, ui){
						volRange.attr("value",(ui.value / 100));
						volRange.trigger("change");
					}
				});
             
				$("#playlist").audioControls({
					audioVolume: (audioInitialVolume / 100),
					shuffled: false,
					onAudioChange: function(response){
						if(response.title.length > 0){
							$(".titleContainer p").text(response.title);
							$(".albumImg").css({
								"background-image": "url(" + getBGImage(response.index) + ")",
								"display": "block"
							});
						}
					},
					onPlay: function(){
						$("p.title").addClass("animated pulse");
					},
					onPause: function(){
						$("p.title").removeClass("animated pulse");
					},
				
					onVolumeChange: function(value){
						volume = $('.volume');
						if (value <= 0) {
							volume.css('background-position', '-104px -27px');
						}
						  else if (value <= 5) {
							volume.css('background-position', '-74px -27px');
						} else if (value <= 60) {
							volume.css('background-position', '-74px -27px');
						} else if (value <= 75) {
							volume.css('background-position', '-34px -27px');
							}
							else {
							volume.css('background-position', '-34px -27px');
							
						}
					}
				});
				$("span.playlist").on("click", function(eve){
					eve.preventDefault();
					$(".playlistContainer").slideToggle("slow");
				});
				
					$(".volume_hover").on('mouseenter mouseleave', function(e) {
       					 if (e.type == 'mouseenter') {
           					$('.volumeContainer-parent').fadeIn(100);
        						}
       					 else {
           					$('.volumeContainer-parent').fadeOut(100);
        						}
					});
			});
		</script>
	</head>
	<body>
    <div class="wrap">	
        <div class="mainContainer">
			<div class="twoColumn">
				

				<div class="col-1 toolsPane">
					<!-- PLAYER CONTROLLS   -->
              
				</div>


				<div id="audioPlayer" class="col-2 container">
					<div class="playlistContainer" >
						
						<ul id="playlist" style="overflow-y:hidden; overflow-x: scroll; white-space:nowrap;">
                        
                        <?php
						switch ($_REQUEST['station'])
						
						{
							case 'hip-hop': include("playlist1.php");
							break;
							case 'tribute-to-bob-marley': include("playlist2.php");
							break;
						}
					?>
						</ul>




						<div class="tracks">
                    	<div class="track">
                        	<ul>
                                <li class="column-1">1</li>
                                <li class="column-2">Tu meri janat</li>
                                <li class="column-3">Pata nahi kon tha</li>
                                <li class="column-4">Unreleased but leaked</li>
                                <li class="column-5">4:10</li>
                        	</ul>
                        	<ul>
                                <li class="column-1">1</li>
                                <li class="column-2">Tu meri janat</li>
                                <li class="column-3">Pata nahi kon tha</li>
                                <li class="column-4">Unreleased but leaked</li>
                                <li class="column-5">4:10</li>
                        	</ul>
                        </div>
                    </div>
<style type="text/css">
.album_rk-player{background-image:url(assets/artist_dp/abhijeet_bhattacharya_dp.jpg); width:80px; height:80px; margin-left:20px;}
.ss{ display:block; margin-top:30px;}
</style>
                    	<div class="album_rk-player"></div>
                        <span id="ss">Khub kaha kisi ne</span>
                    
					</div>
				</div>
			</div>
		</div>
        </div>





<style type="text/css">
.main-player { position: fixed; padding:0; width: 100%; color:#111; background-color: #f2f2f2; z-index: 99999999; bottom: 0px; text-align:center;}
.main-player ul{display:inline-block; padding:8px 10px;}
.albumArt img {
	height: 35px;
	width: 35px;
	display: none; background-size:cover;

}
.progress-parent{width:52%; margin-bottom:7px;}
.player-controls{}
.main-player li{ display:inline-block; margin:0 3px; list-style:none; cursor:pointer;}
.ctrls{ width: 30px; height: 30px; display: inline-block; cursor: pointer; }
.hiddenVolslider{width:118px; height:4px; background:#F32E31; position:absolute;}
</style>


<div class="main-player">
	<ul class="player-controls">
        <li><span data-attr="prevAudio" class="ctrls previous" title="Previous Song"></span></li>
        <li><span data-attr="playPauseAudio" class="ctrls playAudio"></span></li>
        <li><span data-attr="nextAudio" class="ctrls next" title="Next Song"></span></li>
    </ul>
    
    <ul class="progress-parent">
        <div class="progress">
            <div data-attr="seekableTrack" class="seekableTrack"></div>
                <div class="updateProgress"></div>
        </div>
    </ul>
    
    <ul>
    <li>
    	<div class="albumArt">
            <img class="albumImg"/>
        </div>
    </li>
    <li>
        <div class="titleContainer">
        	<p class="title"></p>
        </div>
    </li>
    </ul>
    
    
    <ul>
    <li>
    	<span data-attr="repeatSong" class="ctrls replay" title="Replay current song"></span>
    </li>
    <li class="volume_hover">
    	<span class="volume"></span>
        <div class="volumeContainer-parent">
            <div class="volumeControlContainer">
            	<!--<div class="hiddenVolslider"></div>-->
                <div class="volumeSlider"></div>
            </div>
            <input style="display:none;" data-attr="rangeVolume" type="range" min="0" max="1" step="0.1" />
        </div>
    </li>
    <li>
    	<span class="ctrls addfav-song" title="Add to Favorite"></span>
    </li>
    </ul>

</div>
