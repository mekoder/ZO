
var removeClass = true;
$(".dropbtn").click(function () {
    $(".down-content").toggleClass('show');
    removeClass = false;
});

$(".down-content").click(function() {
    removeClass = false;
});

$("html").click(function () {
    if (removeClass) {
        $(".down-content").removeClass('show');
    }
    removeClass = true;
});

$(".noti_icon-").click(function () {
    if (removeClass) {
        $(".down-content").removeClass('show');
    }
    removeClass = true;
});