jQuery(function(){
    var minimized_elements = $('.a-name');
    minimized_elements.each(function(){    
        var t = $(this).text();        
        if(t.length < 20) return;
        
        $(this).html(
            t.slice(0,18)+'<i>..</i>'
        );
    }); 
});