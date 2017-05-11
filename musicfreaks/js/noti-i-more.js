// Noti-i-More Dropdown
	
  $(document).ready(function() {
var removeClass = true;
$(".noti-i-options-bg, .noti-i-options").click(function () {
   //$(".noti-i-more").toggleClass('show');
    $(".noti-i-options-bg, .noti-i-options, .noti-i-more").css("display","block");
	$(".noti-i-options-bg").toggleClass('bgColor');
    removeClass = false;
});

$(".noti-i-more").click(function() {
    removeClass = false;
});

$("html").click(function () {
    if (removeClass) {
        $(".noti-i-more").removeClass('show');
		$(".noti-i-options-bg").removeClass('bgColor');
    }
    removeClass = true;
});

 });