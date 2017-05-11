<!--<link rel="stylesheet" href="js/perfect-scrollbar.css" /> -->
<script type="text/javascript">
$(document).ready(function() {
  $("#loader").hide();
  $("#close-win").click(function() {
     $("#show").hide();
	 $('body').css("overflow-y","scroll");
      })
  })
	</script>

<script type="text/javascript">
$(document).ready(function() {
  $(".main-search").keyup(function() {
    if ($(".main-search").val()=="") {
      $("#loader").hide();
    }else{
    $("#loader").show();
  }
  
    var nam=$(".main-search").val();
          $.ajax({
            type:'GET', url:'search-process/user.php',data:"obj="+nam,success:function(response){
              $("#loader").hide();
            $('#user_result').html(response);
           }
         })

          $.ajax({
            type:'GET', url:'search-process/artist.php',data:"obj="+nam,success:function(response){
              $("#loader").hide();
            $('#artist_result').html(response);
           }
         })

      })
  });
</script>

  <script type="text/javascript">
  /*
  $(document).ready(function() {
   $("#m-search").keyup(function() {
      if ( $("#m-search").val()=="") {
      $("#no_search").show(); 
    }
      else
    { 
     $("#show").hide();
    }
      })
})*/
	</script>


      <div class="s-top">
        <div class="logo"></div>
        <div class="search-box">
          <input type="text" class="main-search" id="m-search" name="m-s" autofocus placeholder="Search"/>
        </div>
        <span class="close-win" id="close-win"></span>
      </div>

<div class="search-result" aria-hidden="true">
<div id="no_search">
  <div id="loader"><img src="images/load2.gif"></div>
  <div class="s-middle">
    <ul>
      <div class="result-box">
        <div class="heading">songs</div>
        <div class="r-body"></div>
      </div>
          <div class="result-box mid">
            <div class="heading">videos</div>
            <div class="r-body"></div>
          </div>                                                                                                     
          <div class="result-box">
            <div class="heading">albums</div>
            <div class="r-body"></div>
          </div>
    </ul>
    <ul>           
    <div class="result-box">
      <div class="heading">playlists</div>
        <div class="r-body">
          <div class="u-card shad">
            <div class="u-card-img">
              <a href="#">
                <img src="assets/images/sonam-kapoor.jpg" />
              </a>
            </div>
            <div class="u-card-info">
              <a href="#" class="linkone">
                <span class="user-name">Sachin Sharma</span>
              </a>
              <p>
                <a href="#" class="linktwo">
                  <span class="user-uname">@badshah</span>
                </a>
              </p>
              <button class='follow-btn follow' id='$userid'>Follow</button>
            </div>
          </div>
        </div>
    </div>
                                                                                                               
    <div class="result-box mid">
      <div class="heading">artists</div>
      <div class="r-body">
        
        <div id="artist_result"></div>
                                                                                                               
      </div>
    </div>
                                                                                                               
    <div class="result-box">
      <div class="heading">users</div>
      <div class="r-body">

        <div id="user_result"></div>

      </div>
    </div>
    </ul>           
   </div>
  </div>                                                                                                    
    </div>
    <script src="js/scroll-scripts/jquery.slimscroll.js"></script>
    <script>
	$('.r-body').slimscroll({
	wrapperClass : 'outer-r-body',
    size: '10px',
	color: '#222',
	borderRadius: '30px',
	railBorderRadius : '30px',
	opacity : .25,
	railVisible : false,
	disableFadeOut : true,
	railOpacity : .05
	  });
	</script>           
