// Delete Playlist

 $(function(){

  $(".delete-btn").click(function() {
	$('.confirm-overlay_black, .confirm-box').fadeIn(200);
  });
  
  $(".confirm-canc-btn, .confirm-overlay_black").click(function() {
    $(".confirm-box").fadeOut(200);
	$('.confirm-overlay_black').fadeOut(300);
	});
  
});