<base href="//localhost/musicfreaks/" />
<link  rel="stylesheet" href="search-style.css"/>
<script type="text/javascript" src="js/2.2.0_jquery.js"></script>
<div class="mf-main-nav">
<div class="nav-options">
	<div class="mainhead-logo" id="mainhead-logo">
		<a href="home"><img src="assets/images/mainnnnnnn_logo.png"/></a>
	</div>
		<div class="header-search" id="header-search">
			<input type="text" class="mainhead-search" name="mainhead_search" id="mainhead_search" placeholder="Search"/>
            	<span class="blank-textbox-btn"></span>
		</div>
<div class="usr-acc_logsign">
<?php

if($sid=="")
		{
		include ("before_login.php");
		}		
		 else
		 {
	       include ("after_login.php");	
		}
?>
 </div>
</div>
</div>
<script src='js/timeago.js'></script>
<script>
$(document).ready(function() {
    $(".blank-textbox-btn").click(function(){
		$(".mainhead-search").val("");
		$(".mainhead-search").focus();
		$(".blank-textbox-btn").css("display","none");
	});	
	
	$(".mainhead-search").keyup(function() {
	if ($(this).val().length==0)
		$(".blank-textbox-btn").css("display","none");
	else
		$(".blank-textbox-btn").css("display","inline-block");  
    });
});
</script>
<!--<script>
var removeClass = true;
$("#mainhead_search").focus(function () {
    $(".search_globalContainer").addClass('showUp');
    removeClass = false;
});

$(".s_result-container, #mainhead_search").click(function() {
    removeClass = false;
});

$("html").click(function () {
    if (removeClass) {
        $(".search_globalContainer").removeClass('showUp');
    }
    removeClass = true;
});
</script>-->    
<script type="text/javascript">
$(document).ready(function() {
  $("#mainhead_search").click(function() {
          var nam = $("#mainhead_search").val();
          $.ajax({
			  type:'GET', url:'search-result2.php',data:"obj="+nam,success:function(response){
			  $('#show').html(response);
			  $('.search-overlay_black').fadeIn(300).css("display","block");
           }
         })
      })
});
	
</script>
<div id="show"></div>