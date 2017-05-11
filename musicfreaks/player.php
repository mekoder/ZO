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
				
				<!-- var backgroundBanners = ["images/eminem.gif","images/rain.gif","images/rihana.gif","images/lana_del_rey.gif","images/5.jpg","images/kick1.jpg"]; -->
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
								"background-position": "center center"
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
						} else if (value <= 25) {
							volume.css('background-position', '0 -25px');
						} else if (value <= 75) {
							volume.css('background-position', '0 -50px');
							$listemsg.hide('slow');
							}
							else if (value >= 85){
								$listemsg.show('200ms');
								}
							else {
							volume.css('background-position', '0 -75px');
						}
					}
				});
				$("span.playlist").on("click", function(eve){
					eve.preventDefault();
					$(".playlistContainer").slideToggle("fast");
				});
				
			});
		</script>
	</head>
	<body>
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
           <a class="tooltip1" href="../musicfreaks/radio_station.php"><span>Back to Radio Station</span><div data-attr="radiostation" class="ctrls radio"></div></a>
              
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
							<!-- <li data-src="music/Anaconda-Label-Intro-Outro-Version-Dirty.mp3">
								<a href="#">
									<img src="images/11.png" />
									&nbsp; Anaconda - Nicki Minaj &nbsp;
								</a>
							</li>
							<li data-src="https://storage.googleapis.com/9lessonsdemos/songs/Everything%20But%20Mine.mp3">
								<a href="#">
									<img src="images/pop-2.jpg" />
									 &nbsp;Dil da mamla - Gurdass Maan &nbsp;
								</a>
							</li>
							<li data-src="https://storage.googleapis.com/9lessonsdemos/songs/Linkin%20Park%20-%20Numb.mp3">
								<a href="#">
									<img src="images/zaynm.gif" />
									&nbsp; Bhande kali - Punjabi Classic &nbsp;
								</a>
							</li>
							<li data-src="https://storage.googleapis.com/9lessonsdemos/songs/love-the-way-you-lie-rihanna-feat-eminem.mp3">
								<a href="#">
									<img src="images/44.png" />
									&nbsp; Kaala shah kala - Favorite &nbsp;
								</a>
							</li>
							<li data-src="https://storage.googleapis.com/9lessonsdemos/songs/when-i-was-your-man-bruno-mars.mp3">
								<a href="#">
									<img src="images/pop-2.jpg" />
									&nbsp; Bruno - When I Was Your Man &nbsp;
								</a>
							</li>
                            <li data-src="https://storage.googleapis.com/9lessonsdemos/songs/rolling-in-the-deep-adele.mp3">
								<a href="#">
									<img src="images/kick.jpg" />
									&nbsp; Tu hi tu - KICK &nbsp;
								</a>
							</li>
                            <li data-src="music/Kick-Tu_Hi_Tu.mp3">
								<a href="#">
									<img src="images/kick.jpg" />
									&nbsp; Tu hi tu - KICK &nbsp;
								</a>
							</li>
                            <li data-src="music/Kick-Tu_Hi_Tu.mp3">
								<a href="#">
									<img src="images/kick.jpg" />
									&nbsp; Tu hi tu - KICK &nbsp;
								</a>
							</li>
                            <li data-src="music/Kick-Tu_Hi_Tu.mp3">
								<a href="#">
									<img src="images/kick.jpg" />
									&nbsp; Tu hi tu - KICK &nbsp;
								</a>
							</li>
                            <li data-src="music/Kick-Tu_Hi_Tu.mp3">
								<a href="#">
									<img src="images/kick.jpg" />
									&nbsp; Tu hi tu - KICK &nbsp;
								</a>
							</li>
                            <li data-src="music/Kick-Tu_Hi_Tu.mp3">
								<a href="#">
									<img src="images/kick.jpg" />
									&nbsp; Tu hi tu - KICK &nbsp;
								</a>
							</li>
                            <li data-src="music/Kick-Tu_Hi_Tu.mp3">
								<a href="#">
									<img src="images/kick.jpg" />
									&nbsp; Tu hi tu - KICK &nbsp;
								</a>
							</li>
                            <li data-src="music/Kick-Tu_Hi_Tu.mp3">
								<a href="#">
									<img src="images/kick.jpg" />
									&nbsp; Tu hi tu - KICK &nbsp;
								</a>
							</li> -->
						</ul>
					</div>
					<div class="progress">
			        	<div data-attr="seekableTrack" class="seekableTrack"></div>
						<div class="updateProgress"></div>
                        </div>
                    <img src="images/player-logo.png" width="132" height="25" align="right" style="margin-right:5px;"/>
					<div class="volumeControlContainer">
						<span class="tooltip"></span>
						<div id="volumeSlider">
						<span class="volume"></span></div>
                        <div class="liste-msg" id="liste-msg"><h4>Listening in high volume may affect your ears.</h4></div>
					</div>
					<div class="titleContainer">
						<p class="title"></p>
					</div>
					<input style="display:none;" data-attr="rangeVolume" type="range" min="0" max="1" step="0.1" />
				</div>
			</div>
		</div>
        
	</body>
</html>
