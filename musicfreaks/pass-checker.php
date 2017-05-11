<?php
if(isset($_POST["pass"]))
{
    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND ($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
    die();
    }
    $mysqli = new mysqli('localhost' , 'root', '', 'musicfreaks');
    if ($mysqli->connect_error){
        die('Could not connect to database!');
    }
    $pass =($_POST["pass"]);
	$pass = strlen($pass);

  if ($pass < 1)
       {
       die ($nameErr = "<span class='error_icon tick cross fofpi'></span>  <span class='errortext fofp'>Please fill out this field</span> <script>$(function() {
    $('.fofpi').hover(function() { 
      $('.fofp').css('display','block'); 
  }, function() { 
      $('.fofp').css('display','none');
  });
    });
  </script>");
       }
    else if ($pass > 200)
       {
		   die ($nameErr = "<span class='error_icon tick cross gti'></span>  <span class='errortext gt'>Too long.</span> <script>$(function() {
		$('.gti').hover(function() { 
    	$('.gt').css('display','block'); 
	}, function() { 
    	$('.gt').css('display','none');
	});
		});
  </script>");
       }
	   else if ($pass < 5)
	   {
		   die ($nameErr = "<span class='error_icon tick cross fofi'></span>  <span class='errortext fof'>Password must be atleast 6 characters long</span> <script>$(function() {
		$('.fofi').hover(function() { 
    	$('.fof').css('display','block'); 
	}, function() { 
    	$('.fof').css('display','none');
	});
		});
  </script>"); 
	   }
else{
       // die('<style>#mail { border: 1px solid #11c106;}</style>');
		die ("<span class='error_icon tick'></span>");
    }
}
?>