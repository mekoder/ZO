<footer class="site-footer">
                    <div class="footer-inner">
                            <div class="footer-logo">
                            <img src="assets/images/mainnnnnnn_logo.png"/>  
                            </div>
                    <div class="horizontal-line1"></div>
                    			<div class="footer-stuff">
                                <ul id="social">
                                <?php

								if($sid=="")
								{
								include ("before-login-footer.php");
								}		
		 						else
	        			        {
	                			include ("after-login-footer.php");
                				}
								?>
                                </ul>
                                <ul>
                                <li><a href="home">Home</a></li>
                                <li><a href="about">About</a></li> 
                                <li><a href="#">Blog</a></li>
                                <li><a href="feedback">Feedback</a></li>
                                </ul>
                                <ul>
                                <li><a href="support">Help center</a></li>
    							<li><a href="#">Privacy policy</a></li>
 							    <li><a href="#">Terms of use</a></li>
                                </ul>
                                <ul id="social">
   <p class="stay-w-u"><font><i>STAY TUNED</i></font></p>
   <a href="https://www.facebook.com/wemusicfreaks" title="Musicfreaks - Facebook">
   <li class="footer_social fb">
   <i class="iconsf logo_fb"></i>
   </li>   
   </a>
   <a href="https://www.instagram.com/wemusicfreaks" title="Musicfreaks - Instagram">
   <li class="footer_social insta">
   <i class="iconsf logo_insta"> </i>
   </li>
   </a>
   <a href="https://www.twitter.com/wemusicfreaks" title="Musicfreaks - Twitter">
   <li class="footer_social twit">
   <i class="iconsf logo_twit"></i>
   </li>
   </a> 
                                </ul>
                                <div class="copyright">
								&copy; 2016 Musicfreaks
								</div>
                                </div>
                    
                    </div>
</footer>





