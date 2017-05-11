		<link rel="stylesheet" type="text/css" href="rk-player.css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
		<script src="jquery-ui.min.js"></script>
		<script src="jquery.audioControls.min.js"></script>
		<script>
			$(document).ready(function(){
				var audioInitialVolume = 100;
				var $sliderObj = $("#volumeSlider");
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
						if (value <= 5) {
							volume.css('background-position', '0 0');
						} else if (value <= 40) {
							volume.css('background-position', '0 -25px');
						} else if (value <= 75) {
							volume.css('background-position', '0 -50px');
							}
							else {
							volume.css('background-position', '0 -75px');
							
						}
					}
				});
				$("span.playlist").on("click", function(eve){
					eve.preventDefault();
					$(".playlistContainer").slideToggle("slow");
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








<div class="main-player">
	<div class="progress">
       	<div data-attr="seekableTrack" class="seekableTrack"></div>
		<div class="updateProgress"></div>
    </div>

    <div class="albumArt" style="width: 50px; height: 50px; border: 1px solid transparent; border-radius: 2%;">
    	<img class="albumImg"/>
    </div>
    <div class="titleContainer">
						<p class="title"></p>
					</div>
    <div class="playerControls" style="position: absolute;display: inline-flex;left: 13%;bottom: 6%;">
    	<a title="Show/Hide Playlist" alt="Show/Hide Playlist"><span class="ctrls playlist"></span></a>
					<a title="Previous Song" alt="Previous Song"><span data-attr="prevAudio" class="ctrls previous"></span></a>
					<a title="Play/Pause" alt="Play/Pause"><span data-attr="playPauseAudio" class="ctrls playAudio"></span></a>
					<a title="Next Song" alt="Next Song"><span data-attr="nextAudio" class="ctrls next"></span></a>
					<a title="Repeat Song" alt="Repeat Song"><span data-attr="repeatSong" class="ctrls replay"></span></a>
     </div>
    <div class="volumeControlContainer">
		<div id="volumeSlider">
			<span class="volume"></span>
		</div>
	</div>
	<input style="display:none;" data-attr="rangeVolume" type="range" min="0" max="1" step="0.1" />


</div>
<style type="text/css">
.main-player {
    position: fixed;
    height: 60px;
    width: 100%;
    background-color: #000000;
    z-index: 99999999;
    bottom: 0px;
}
.albumArt img {
	height: 50px;
	width: 50px;
	display: none;

}
</style>