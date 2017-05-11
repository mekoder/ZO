// Share Playlist

$(function(){

  $('.share-btn').click(function() {
	$('.share-overlay_black').fadeIn(200);
	$('.share-popbox').addClass('moveUp');
  });
  
  $(".share-overlay_black").click(function() {
	$('.share-popbox').removeClass('moveUp');  
    $(".share-popbox").fadeOut(200);
	$('.share-overlay_black').fadeOut(300);
	});
  
});