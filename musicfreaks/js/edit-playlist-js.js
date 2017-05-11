// Edit Playlist

$(function(){

  $('#edit-playlist-btn').click(function() {
	$('.modal-overlay').fadeIn(300).css("display","block");
    $(".edit-modal-box, .edit-playlist").css("display","block").animate({'top':'106px'},200);
  });
  
  $(".cancel-edit-playlist, .js-modal-close").click(function() {
  $(".modal-overlay").fadeOut(450);
    $(".edit-modal-box, .edit-playlist").animate({'top':'800px'},100).fadeOut(300);
	});
  
  
  
});