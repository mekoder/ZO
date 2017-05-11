// Append video name

jQuery(function(){
    var minimized_elements = $('.vid_nam');
    minimized_elements.each(function(){    
        var t = $(this).text();        
        if(t.length < 70) return;
        
        $(this).html(
            t.slice(0,59)+'<span style=" font-size:27px; color:#444;"> ...</span>'
        );
    }); 
});