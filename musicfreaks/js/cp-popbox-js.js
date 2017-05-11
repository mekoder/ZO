$(function(){

  $("#click-create").click(function() {
	$('.modal-box, .create-playlistbox').css("display","block");
	$('.modal-overlay').fadeIn(300).css("display","block");
    $(".modal-box, .create-playlistbox").addClass('moveUp');
	$(".pl-name").focus();
  });  
  
  
$(".done-playlist").click(function() {
  $(".modal-overlay").fadeOut(300, function() {
	 $(".modal-box, .create-playlistbox").removeClass('moveUp');
	 $('.done-playlistbox').css("display","none");
  		  });
	});


$(".cp-close , .js-modal-close").click(function() {
    $(".modal-box, .done-playlistbox").removeClass('moveUp');
	$('.modal-box').css("display","none");
	$(".modal-overlay").fadeOut(450);
	$('.lock_switch2').removeClass("lockOn");
	});
	
	
});