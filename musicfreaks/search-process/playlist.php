<?php
$nam=$_GET['obj'];
$nam= preg_replace("#[^0-9a-z@_ ]#i","",$nam);
include("conn.php");          

echo'   <div class="u-card shad">
            <div class="u-card-img">
              <a href="#">
                <img src="assets/images/sonam-kapoor.jpg">
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
              <button class="follow-btn follow" id="$userid">Follow</button>
            </div>
          </div>';

?>