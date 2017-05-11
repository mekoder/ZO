<html>
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" type="image/png" href="images/radiostation_favicon.png">
		<title>Radio Station</title>
		<link href="jquery-ui.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="theme-1.css" />
		<script src="jquery.js"></script>
		<script src="jquery-ui.min.js"></script>
		<script src="jquery.audioControls.min.js"></script>
		<script>
			$(document).ready(function(){
				var audioInitialVolume = 75;
				var $sliderObj = $("#volumeSlider");
				var $toolTipObj = $(".tooltip");
				var $listemsg = $(".liste-msg");
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
							$("body").css({
								"background-image": "url(" + getBGImage(response.index) + ")",
								"background-size": "cover",
								"background-repeat": "no-repeat",
								"background-attachment": "fixed",
								"background-position": "20% 20%"
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
    <div class="se-pre-con"></div>
    <div class="shadowtop" style="height: 218px;"></div>
    <div class="shadow" style="height: 218px;"></div>
	
        <div class="mainContainer">
			<div class="twoColumn">
				<div class="col-1 toolsPane">
					<a title="Show/Hide Playlist" alt="Show/Hide Playlist"><span class="ctrls playlist"></span></a>
					<a title="Previous Song" alt="Previous Song"><span data-attr="prevAudio" class="ctrls previous"></span></a>
					<a title="Play/Pause" alt="Play/Pause"><span data-attr="playPauseAudio" class="ctrls playAudio"></span></a>
					<a title="Next Song" alt="Next Song"><span data-attr="nextAudio" class="ctrls next"></span></a>
					<a title="Repeat Song" alt="Repeat Song"><span data-attr="repeatSong" class="ctrls replay"></span></a>
           <a class="tooltip1" href="station"><span>Back to Radio Station</span><div data-attr="radiostation" class="ctrls radio"></div></a>
              
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
					</div>
					<div class="progress">
			        	<div data-attr="seekableTrack" class="seekableTrack"></div>
						<div class="updateProgress"></div>
                        </div>
                    <img src="images/main-mf-logo1.png" width="120" height="30" align="right" style="margin-right:6px;"/>
					<div class="volumeControlContainer">
						<span class="tooltip"></span>
						<div id="volumeSlider">
						<span class="volume"></span></div>
                        <!--<div class="liste-msg" id="liste-msg" draggable="true"><h4>Listening in high volume may affect your ears.</h4></div>-->
					</div>
					<div class="titleContainer">
						<p class="title"></p>
					</div>
					<input style="display:none;" data-attr="rangeVolume" type="range" min="0" max="1" step="0.1" />
				</div>
			</div>
		</div>
        </div>
	</body>
</html>
