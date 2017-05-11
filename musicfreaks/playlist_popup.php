<link rel="stylesheet" type="text/css" href="playlist_popup.css">
<script src="js/jquery.form.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $(".create-pl").click(function() {
      //$(".empty-name").val("");
      //$("#currdp").css("display","none");
      $("#cplphoto").css("display","block");
      $('.playlist-name').val("");
      $("#percent").css("display","none");
      $("#imgArea>img").prop('src',"assets/images/total_trans_photo.png");
      $('.pl-name').val("");
     document.getElementById("empty-name").innerHTML ="&nbsp;";
      })
      
  });
</script>
<script>
$(document).on('change', '#image_upload_file', function () {
var progressBar = $('.progressBar'), bar = $('.progressBar .bar'), percent = $('#percent'), cplPhoto = $('#cplPhoto');

$('#image_upload_form').ajaxForm({
beforeSend: function() {
progressBar.fadeIn();
//percent.fadeOut();
//cplPhoto.fadeOut();
//var percentVal = '0%';
//bar.width(percentVal)
//percent.html(percentVal);
},
uploadProgress: function(event, position, total, percentComplete) {
var percentVal = percentComplete + '%';
bar.width(percentVal)
//percent.html(percentVal);
},
success: function(html, statusText, xhr, $form) {
obj = $.parseJSON(html);
if(obj.status){
//var percentVal = '100%';
//bar.width(percentVal)
//percent.html(percentVal);

if($("#imgArea>img").prop('src',obj.image_medium)) {
  var deldp = (obj.image_medium);
  $.ajax({
        type:'GET', 
        url:'temp_del.php',data:"objdp="+deldp,success:function(response){
        }
      });
}
}
else{
	$("#percent").css("display","none");
	$(".empty-name").css({opacity: 0}).animate({opacity: 1}, 200);
$(".empty-name").html(obj.error);
}
},
complete: function(xhr) {
progressBar.fadeOut();
//cplPhoto.fadeIn();
//percent.fadeIn();
//cplPhoto.css("display","none");
//percent.css("display","none");
  $("#percent").css("display","block");
}
}).submit();

});
</script>
<script>
$(document).on('change', '#image_upload_file', function () {
    $(".icon_bg").hover(function() {
    $("#cplPhoto").css("display","block");
    });
    $(".icon_bg").mouseleave(function() {
      $("#cplPhoto").css("display","none");
    });
  
});
</script>


<div class='modal-overlay js-modal-close'></div>
<div id="popup" class="modal-box">
  <div class="create-playlistbox">  
    <header></header>
    			<div class="modal-box-header-overlay">
                			<div class="create-benefits">
                            	<img class="cp-gzboy" src="assets/images/gzboy-create-playlist.png">
                                <li><i class="cb-icons c-p"></i> Create Playlist</li>
                                <li><i class="cb-icons a-s"></i> Add favorite songs</li>
                                <li><i class="cb-icons s-p"></i> Share your collection</li>
      						</div>
                </div>
    <div class="modal-body">
       <p class="playlist-title">Playlist name</p>
        	<input type="text" class="pl-name" id="pl-name" autofocus />
      			<div class="empty-name" id="empty-name">
                	&nbsp;
                </div>
    </div>
    	<form enctype="multipart/form-data" action="image_upload_demo_submit.php" method="post" name="image_upload_form" id="image_upload_form">
      		<div class="pl-img">
            	<div id="imgArea">
                	<img src="assets/images/total_trans_photo.png" id="currdp">
                </div>
         	    	<input type="file" accept="image/*" name="image_upload_file" class="pl-image" id="image_upload_file">
          				<div class="icon_bg">
            				<i class="cpl-icons2 pl-photo" id="cplPhoto"></i>
            					<div class="percent" id="percent"></div>
         				</div>
     		</div>
   		</form>
      		<div class="progressBar">
				<div class="bar">
                	<img class="loader" src="assets/images/20x20-load.gif" />
                </div>
			</div>
            	<footer class="pl-footer">
              		<label>
               			<input type="checkbox" name="pl-checkbox" class="playlist-lock" id="check-private">
              		 		<div class="lock_switch2"></div>
              		</label>
              			<span class="question-mark"></span>
                     		<div class="cp-infor">
                     			Locking will make this playlist private. No one will be able to see it until you make it public.
                     				<div class="arrow-down"></div>
                        				<div class="arrow-down-bline"></div>
                     						<span class="cross-btn"></span>
                     		</div>
        						<button class="save-playlist" onclick="showInput();">Create</button>
        							<button class="cp-close">leave</button>
  				</footer>
  </div>  
  	<div class="done-playlistbox">
    	<div class="donemodal-body">
        	<i class="cb-icons done"></i>
            	<p class="donepl-msg" id="donepl-msg"></p>
  		</div>
        	<footer class="donepl-footer">
            	<button class="done-playlist">Okay</button>
            </footer>
    </div>

</div>
  <script type="text/javascript" src="js/cp-popbox-js.js"></script>
  
  <!-- C - P - E-->
  
<script type="text/javascript">
$(document).ready(function() {

  $(".save-playlist").click(function() {
  if(document.getElementById('check-private').checked) {
        var privacy = 1;
          } else {
                  var privacy = 0;
                }

  if($('.pl-image').val("")){
      var nam2 = ($('.pl-image').val()=="");
        }else
           {
            var nam2 = document.getElementById("pl-image").value;
           }

  if( $(".pl-name").val()==""){
      $(".empty-name").css({opacity: 0, content: "Please enter a name for your playlist"}).animate({opacity: 1}, 200);
	  document.getElementById('empty-name').innerHTML = "Please enter a name for your playlist";
	  }
	  else
	  {
		  var nam=$(".pl-name").val();
	  
     $.ajax({
			  type:'GET', url:'plist.php',data:"obj="+nam+"&obj2="+privacy+"&obj3="+nam2,success:function(response){
          $('#donepl-msg').html(response);
		  	  $(".create-playlistbox").hide();
			  $('.done-playlistbox').fadeIn(350);
			  }
      })
	  }
  })
});
</script>
<script>
$(document).ready(function(){
$('.percent').click(function() {
      var close = 1;
       $("#imgArea>img").prop('src',"assets/images/total_trans_photo.png");
        $('.percent').css("display","none");
    
          $.ajax({
        type:'GET', url:'temp_del.php',data:"obj4="+close,success:function(response){ 
      }
    })
  });
});
</script>
  
<script type="text/javascript">
/*
function showInput() {
    var message_entered =  document.getElementById("pl-name").value;

    document.getElementById('donepl-name').innerHTML="<a href='playlist?plist="+message_entered+"'>"+message_entered+"</a>";
}
*/
</script>

<script>$('.pl-photo').click(function(){ $('input[type=file]').click(); return false;});</script>
  <script type="text/javascript">
  $(":file").change(function(){
   /*  $(".pl-photo").css("color","#222"); */
  	  /* $(".pl-photo").css("display","none");*/
    });
  </script>
  
  <!-- Lock Button Playlist Dialog Box -->
  
  <script>
  $(document).ready(function(){
       $('.lock_switch2').click(function(){
       $(this).toggleClass("lockOn");
           });
  });
  </script>
  
  <!-- create playlist information -->
<script>
$(document).ready(function() {
var removeClass = true;
$(".question-mark").click(function () {
    $(".cp-infor").toggleClass('cp-infor-display');
	$('.question-mark').toggleClass("question-mark-addClass");
    removeClass = false;
});

$(".cp-infor").click(function() {
    removeClass = false;
});

$("html, .cross-btn").click(function () {
    if (removeClass) {
        $(".cp-infor").removeClass('cp-infor-display');
		$('.question-mark').removeClass("question-mark-addClass");
    }
    removeClass = true;
});
});
  </script>