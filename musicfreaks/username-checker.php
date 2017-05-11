
<?php
include 'error.php';
if(isset($_POST["username"]))
{
    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
    die();
    }
    $mysqli = new mysqli('localhost' , 'root', '', 'musicfreaks');
    if ($mysqli->connect_error){
        die('Could not connect to database!');
    }
    $username =($_POST["username"]);
    if (!preg_match("/^[a-zA-Z0-9]*$/",$username)) {
		die ($nameErr = "<span class='error_icon tick cross lnni'></span><span class='errortext lnn'>Only letters and numbers allowed.<script>$(function() {
		$('.lnni').hover(function() { 
    	$('.lnn').css('display','block'); 
	}, function() { 
    	$('.lnn').css('display','none');
	});
		});
  </script></span>"); 
      //die ($nameErr = "<img src='images/redtick.png'/><span style='margin-left:7px;'>Only letters and numbers allowed.</span>"); 
   // die ($nameErr = "<style>#username { border: 1px solid #ff5858;}</style>");
    } 
	    $username1 = explode(" ", $username);
		$acronym = "";
         foreach ($username1 as $w) 
         $acronym = $w[0];
       if (!preg_match('/^[a-zA-Z]*$/',$acronym)){
		   die ($nameErr = "<span class='error_icon tick cross ucsi'></span>  <span class='errortext ucs'>Sorry, username can't be start with a number.</span> <script>$(function() {
		$('.ucsi').hover(function() { 
    	$('.ucs').css('display','block'); 
	}, function() { 
    	$('.ucs').css('display','none');
	});
		});
  </script>"); 
			//die ($nameErr = "<img src='images/redtick.png'/><span style='margin-left:7px;'>Sorry, username can't be start with a number.</span>");
      //die ($nameErr = "<style>#username { border: 1px solid #ff5858;}</style>");
	}
	$namecount = strlen($username);
    if ($namecount > 21)
       {
		   die ($nameErr = "<span class='error_icon tick cross gti'></span>  <span class='errortext gt'>Sorry, this username is too long</span> <script>$(function() {
		$('.gti').hover(function() { 
    	$('.gt').css('display','block'); 
	}, function() { 
    	$('.gt').css('display','none');
	});
		});
  </script>"); 
        //die ($nameErr = "<img src='images/redtick.png'/><span style='margin-left:7px;'>Sorry, username is too long.</span>");
        //die ($nameErr = "<style>#username { border: 1px solid #ff5858;}</style>");
       }
	   else if ($namecount < 1)
	   {
		   die ($nameErr = "<span class='error_icon tick cross foufi'></span>  <span class='errortext fouf'>Please fill out this field</span> <script>$(function() {
		$('.foufi').hover(function() { 
    	$('.fouf').css('display','block'); 
	}, function() { 
    	$('.fouf').css('display','none');
	});
		});
  </script>"); 
		   }
    $username = filter_var($_POST["username"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);
    $username =  strtolower($username);
    $statement = $mysqli->prepare("SELECT username FROM musicfreaks_users WHERE username= '$username'");
    
    $statement->execute();
    $statement->bind_result($username);
    if($statement->fetch()){
        //die('<img src="images/redtick.png"/><span style="margin-left:7px;">Sorry, this username is taken. Try another</span>');
        //die('<style>#username { border: 1px solid #ff5858;}</style>');
		die ($nameErr = "<span class='error_icon tick cross taui'></span>  <span class='errortext tau'>Sorry, this username is taken. Please try another</span> <script>$(function() {
		$('.taui').hover(function() { 
    	$('.tau').css('display','block'); 
	}, function() { 
    	$('.tau').css('display','none');
	});
		});
  </script>"); 
    }else{
        die ($nameErr = "<span class='error_icon tick'></span>"); 
		//die('<style>#username { border: 1px solid #11c106;}</style>');
    }
}
//sleep(5);
?>