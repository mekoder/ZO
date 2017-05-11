$(function() {
$(".note").click(function()  {
var noticlick = $(this).attr("id");
var datastring = 'noticlick='+ noticlick ;
 $.ajax({
   type: "POST",
   url: "noticlick.php",
   data: datastring,
   success: function(html){}
 }); 
    $("#note"+noticlick).fadeOut(50);
    //$("remove"+user_id).show();
    //return false;
});
});