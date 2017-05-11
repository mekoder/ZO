// Header Scroll Shadow

$(window).scroll(function() {     
    var scroll = $(window).scrollTop();
    if (scroll > 0) {
        $("#header_set").addClass("active");
    }
    else {
        $("#header_set").removeClass("active");
    }
});
