<?php
include 'conn.php';
?>
<li><a href="myprofile">
<div data-title="It's you, baby." class="u-footerp tooltip" style="background-size:100%; background-image:url('<?php	
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
?>');"></div></li></a>
<style type="text/css">
.u-footerp{ width:35px; height:35px; position:relative; top:30px; border-radius:50%; background-repeat:no-repeat; background-color:#ededed;} .u-footerp:hover{ filter:brightness(85%); -webkit-filter:brightness(85%); -ms-filter:brightness(85%); -moz-filter:brightness(85%);}

.tooltip:before {  transform: scale3d(.2,.2,1); /*transition: all .2s ease-in-out;*/}
.tooltip:after { transform: translate3d(0,6px,0); /*transition: all .1s ease-in-out;*/}
.tooltip:hover:before,
.tooltip:hover:after {opacity: 1; transform: scale3d(1,1,1); /*transition: all .2s .1s ease-in-out;*/}
.tooltip{position: relative;}
.tooltip:before, .tooltip:after { display: block; opacity: 0; pointer-events: none; position: absolute;}
.tooltip:after {border-right: 6px solid transparent; border-bottom: 6px solid rgba(0,0,0,.9);  border-left: 6px solid transparent; content: ''; height: 0; top: 40px; left: 12px; width: 0;}
.tooltip:before {background: rgba(0,0,0,.9); border-radius: 3px; color:#fff; content: attr(data-title);  font-size: 13px; padding: 6px 10px; top: 46px; white-space: nowrap; font-weight:100;}
</style>
