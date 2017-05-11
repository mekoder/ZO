<style type="text/css">
@font-face {
    font-family: 'IcoMoon-Free';
    src: url('js/IcoMoon-Free.ttf') format('truetype');
    font-weight: normal;
    font-style: normal; 
}
.notificationContainer a{color:#bbb; font-family:"Segoe UI",Arial,sans-serif;}
.notificationContainer {display: none; background-color:#fff; border-radius:1px; /*border:1px solid #ddd;*/ -webkit-box-shadow: 0px 3px 6px 0px rgba(0,0,0,0.15); box-shadow:0px 8px 16px 0px rgba(0,0,0,0.2); overflow:visible; position: absolute; top: 34px; right: 60px; width:330px; z-index: 9999; font-family:'Raleway' !important; color:#cbcbcb;}
/*.notificationContainer:before { content: ''; display: block; position: absolute; width: 0; height: 0; color: transparent; border: 10px solid black; border-color: transparent transparent #f1f1f1; margin-top: -20px; margin-left: 234px;}*/
/*.noti-arrow-down{position:relative;}
.noti-arrow-down::after{z-index:1; content: ""; position: absolute; width: 0; height: 0; top: 1px; left: 14.52em; box-sizing: border-box; border: .57em solid #383c45; transform-origin: 0 0; transform: rotate(-45deg);}
.noti-arrow-down-bline{  position: absolute; width: 0; height: 0; top:0; left: 14.52em; box-sizing: border-box; border: .57em solid #ddd; transform-origin: 0 0; transform: rotate(-45deg);}*/
.notificationContainerShow{ display:block; -webkit-animation: more-slide-up 0.3s; animation: more-slide-up 0.3s;}
.no-notification{padding:40px 40px 55px 40px; text-align:center; color:#999; background-color:#f5f5f5;}
.no-noti-icon{display:inline-block; background:url(assets/images/gzboy_noworry.png); background-size:cover; background-repeat:no-repeat; width:156px; height:112px;}
.smily-smile{ background-image:url(assets/images/no-noti-smily-smile.png); width:15px; height:6px; position:absolute; top:96px; left:151px; display:none; }
.smilevisible{ display:none/*block*/;}
p.no_noti_msg{ display:inline-block; margin-top:11px; padding:6px 19px 4px 19px; background-color:#fff; border-radius:2px; font-weight:600; -webkit-box-shadow:0 1px 3px rgba(0,0,0,0.14); box-shadow:0 1px 3px rgba(0,0,0,0.14); -ms-box-shadow:0 1px 4px 0 rgba(0,0,0,0.14); font-size:15px;}
.no-notification img{margin:0 auto; opacity:.8;}

.notificationsBody::-webkit-scrollbar{width:8px;} 
.notificationsBody::-webkit-scrollbar-thumb{background-color:rgba(0,0,0,.22);}
.notificationsBody::-webkit-scrollbar-thumb:hover{background-color:rgba(0,0,0,.28);}
.notificationsBody::-webkit-scrollbar-track{background-color:#f5f5f5;}


.notificationsBody{position: relative; max-height:260px; height:auto; /*padding:3px 0;*/ overflow:auto; background-color:#eee;}
.notificationTitle { position:relative; border-radius:1px 1px 0 0; /*border-bottom:1px solid #e1e1e1;*/ z-index: 1000; height: 52px; font-size: 15px; background-color: #fff; color:#555; font-weight:700; width: 330px; text-align: left; /*box-shadow: 0 1px 2px 0 rgba(0,0,0,.1);*/ } 
.notificationTitle p{ position:absolute; top:18px; left:20px;}

.notificationFooter {border:0; height:auto; text-align:center; display:none;}
.notificationFooter span{box-shadow: 0 2px 5px 0px rgba(0,0,0,.26); background-color: #437def; padding: 5px 20px; border-radius: 2px; color: #fff; font-weight: 600; font-family: "Segoe UI",Arial,sans-serif; cursor:pointer;}
.inner-noti-footer{position:relative; top:0px; padding:15px 0; margin:0 auto; bottom:0; background-color:#eee; text-align: center; font-size: 13px; /*border-top:1px solid #e1e1e1;*/ border-bottom:none; border-radius:0 0 1px 1px;/*box-shadow: 0px -2px 5px rgba(50,50,50,.1); */ } 

/*.inner-noti-footer:hover{background-color:#3f434d;}*/

.outer-noti-i{position:relative; /*margin:0 2.5%;*/}
.outer-noti-i:hover .not-i{background-color:#eee;}
.not-i{ position:relative; font-family: 'Raleway' !important; /*width:94%; margin:7px 0;*/ border-bottom:1px solid #e4e4e4; /*box-shadow: 0 1px 2px rgba(0,0,0,.2); -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.2); -moz-box-sizing: 0 1px 2px rgba(0,0,0,.2); -ms-box-sizing: 0 1px 2px rgba(0,0,0,.2);*/ height:70px; background-color:#f5f5f5; overflow:hidden; text-align:left;}
.not-i-base{ left:0; position:absolute; padding:15px 15px; text-align:center; font-family: 'IcoMoon-Free';  font-weight: normal; font-style: normal; color:#fff; font-size:12px;}
.base-img{width:38px; height:38px; border-radius:50%; border: 1px solid #ddd;}
/*.base-icon{ display:inline-block; padding:13px 13px; background-color:#F36; border-radius:50%;}
.base-icon:before{content:'\e971'; position:absolute; right:29px; top:29px;}*/
.not-i-info{/*position:relative;*/ margin-left:70px; margin-top:16px; /*width:180px;*/ font-size:14px;}
 p.name_follower{/*width:175px;*/ height:auto; color:#444; line-height:17px; font-weight: 500;} 
span#follower-username{font-weight:600;}
.not-i-time{/*position:relative; width:120px;*/ margin-top:1px; margin-left:71px;}
span.w-time{font-size:12px; font-family:tahoma; font-weight:400; color:#aaa;}
.not-i-time-icon{font-family: 'IcoMoon-Free';  font-weight: normal; font-style: normal; font-size:9px; color:#bbb;}
.not-i-time-icon:before{content:'\e94e';}
/* --LOADER--  .xx_load{animation: spinner 1s linear infinite; -webkit-animation: spinner 1s linear infinite;}*/
.noti-i-options-bg{ z-index:1; position:absolute; float:right; right:11px; top:13px; padding:3px 8px; background-color:rgba(0,0,0,0); border-radius:3px; opacity:1; cursor:pointer; transition: all 400ms;}
.noti-i-options-bg:hover{background-color:#aaa;}
.noti-i-options-bg:hover .noti-i-options, .noti-i-options:after, .noti-i-options:before{background-color:#fff;}
.noti-i-options{ width: 3px; height: 3px;  background: #aaa; position: relative; border-radius: 50%; display: block;}
.noti-i-options:after{right:5px; }
.noti-i-options:before{left:5px;}
.noti-i-options:after, .noti-i-options:before{content: ""; position: absolute; width: 3px; height: 3px; background: inherit; border-radius: 50%;}
.bgColor{background-color:rgba(0,0,0,.5);}
/* noti-i more dropdown */
.noti-i-more{ display:none;  z-index:2; top:20px; right:10px; background-color:#fff; border:1px solid #d8d8d8; position:absolute; padding:7px 0; font-size:11px; font-weight:600; border-radius:3px; font-family: "Segoe UI",Arial,sans-serif;}
.noti-i-more a{padding:5px 20px 5px 15px; display:block; color:#555; cursor:pointer;} .noti-i-more a:hover{background-color: rgba(51,51,51,.08); color:#555;}
.show{ display:block;  -webkit-animation: more-slide-up 0.3s; animation: more-slide-up 0.3s;}

/*-- LOADER -- @keyframes spinner { to {transform: rotate(360deg);} }
@-webkit-keyframes spinner {to {-webkit-transform: rotate(360deg);} }*/

@-webkit-keyframes more-slide-up {
  from {
    opacity: 0;
    -webkit-transform: translateY(30px);
            transform: translateY(30px); }
  to {
    opacity: 1;
    -webkit-transform: translateY(0);
            transform: translateY(0); } }
@keyframes more-slide-up {
  from {
    opacity: 0;
    -webkit-transform: translateY(30px);
            transform: translateY(30px); }
  to {
    opacity: 1;
    -webkit-transform: translateY(0);
            transform: translateY(0); } }
</style>
<script type="text/javascript" src="js/2.2.0_jquery.js"></script>
<div class="after">
<div class="noti_icon-"></div>
					<div class="notificationContainer">
                        <div class="noti-arrow-down"></div>
                          <!--<div class="noti-arrow-down-bline"></div>-->
                            <div class="notificationTitle">
                                <p>Notifications</p>
                            </div>
                                <div class="notificationsBody notifications">
                                    <div class="333_load" style="padding:15px 40px; text-align:center;">
                                        <img class="loader-notification xx_load" src="assets/images/ajax-loader.png" width="100px" height="100px">
                                    </div>
                                      <script src='js/noti-i-more.js'></script>
                                </div>
                                        <div class="notificationFooter">
                                                    <div class="inner-noti-footer">
                                                        <span>See older</span>
                                                    </div>
                                        </div>
					</div>
							<div id="notiupdate"></div>						
<div class="nav-user-pic">
<a href="myprofile">
<div class="u-navp" style="background-size:100%; background-image:url('<?php	
                                    $sql5 = "SELECT dp from musicfreaks_users where username = '$sid'";
                                    $result5 = mysqli_query($conn, $sql5);  
                                    if(mysqli_num_rows($result5) > 0)   
                                      {  
                                         while($row = mysqli_fetch_array($result5))  
                                          {     
                                          $dpusername=$row["dp"];
                                         }
                                      } 

                                      if ($dpusername !=="")
                                               {
                                                   $userdp = "_dp";
                                                    echo "assets/u_dp/$sid$userdp.jpg";
                                                }   
                                                 else
                                                       {
                                                         echo "images/d_up112.png";
                                                        }
?>');"></div>
</a>
</div>
<div class="dropdown">
<button class="dropbtn" id="dropbtn1"></button>
  <div id="mainDropdown" class="down-content">
    <!--<div class="dmenu-arrow-down"></div>
     <div class="dmenu-arrow-down-bline"></div>-->
     	<div class="udp-moresection">
        	<div class="udp-more" style="background-size:100%; background-image:url('<?php	
                                    $sql5 = "SELECT dp from musicfreaks_users where username = '$sid'";
                                    $result5 = mysqli_query($conn, $sql5);  
                                    if(mysqli_num_rows($result5) > 0)   
                                      {  
                                         while($row = mysqli_fetch_array($result5))  
                                          {     
                                          $dpusername=$row["dp"];
                                         }
                                      } 

                                      if ($dpusername !=="")
                                               {
                                                   $userdp = "_dp";
                                                    echo "assets/u_dp/$sid$userdp.jpg";
                                                }   
                                                 else
                                                       {
                                                         echo "images/d_up112.png";
                                                        }
									?>');"></div>
        <span class="uname-more"><?php /*fetch first and lastname of loged In user*/
$sql = "SELECT fname from musicfreaks_users where username = '$sid'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()){

    $fname = $row['fname'];
  }
} 
if ($fname !==""){
echo $fname;
}
else

echo ucfirst($sid);
 ?></span>
        </div>
        	<div class="moresection-list">
                <a href="myprofile">My profile</a>
                <a href="#upgrade" id="upgrd_last">Upgrade</a>
                <a href="settings">Mobile apps</a>
                <a href="settings" id="hel_last">Help center</a>
                <a href="settings">Settings</a>
                <a href="logout" id="log_last">Logout</a>
            </div>
  </div>
</div>
</div>


<script async src="js/main_nav-dropdown-js.js" type="text/javascript"></script>

<script>
$(document).ready(function(){
	
var removeClass = true;
$(".noti_icon-").click(function () {
    $(".notificationContainer").toggleClass('notificationContainerShow');
	$(".noti_icon-").toggleClass('noti_icon-bgColor');
    removeClass = false;
});

$(".notificationContainer").click(function() {
    removeClass = false;
});

$("html").click(function () {
    if (removeClass) {
        $(".notificationContainer").removeClass('notificationContainerShow');
		$(".noti_icon-").removeClass('noti_icon-bgColor');
    }
    removeClass = true;
});


});
</script>


<script type="text/javascript">
var auto_refresh = setInterval(
function ()
{
$('#notiupdate').load('notiupdate.php?noti=fuckoff');
}, 100); // refresh every 10000 milliseconds
</script>
<script>  
 $(document).ready(function(){
	 $('.333_laod').hide();
  $(".alert_noti- , #noti_icon , .noti_icon-").click(function() {
             $('.333_laod').toggle();
           $.ajax({  
                url:"notification.php?notifications=notifications",  
                type:"GET",  
                success:function(data)  
                { 
                      $('.notifications').html(data);
                     
					  }  
                  
           });  
      });  
 });  
</script>