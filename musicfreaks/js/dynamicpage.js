$(function() {

    var newHash      = "",
        $mainContent = $(".content-change"),
        $pageWrap    = $(".user-body"),
        baseHeight   = 0,
        $el;
        
    $pageWrap.height($pageWrap.height());
    baseHeight = $pageWrap.height() - $mainContent.height();
    
    $(".u-info").delegate("a", "click", function() {
        window.location.hash = $(this).attr("href");
        return false;
    });
    
    $(window).bind('hashchange', function(){
    
        newHash = window.location.hash.replace("#","");
        
        if (newHash) {
            $mainContent
                .find(".guts")
                .fadeOut(200, function() {
                    $mainContent.hide().load(newHash + " .guts", function() {
                        $mainContent.fadeIn(200, function() {
                            $pageWrap.animate({
                                height: baseHeight + $mainContent.height() + "px"
                            });
                        });
                        $(".u-info a").removeClass("current");
                        $(".u-info a[href="+newHash+"]").addClass("current");
                    });
                });
        };
        
    });
    
    $(window).trigger('hashchange');

});