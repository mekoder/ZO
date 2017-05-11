<?php
if(isset($_POST["mail"]))
{
    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND ($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
    die();
    }
    $mysqli = new mysqli('localhost' , 'root', '', 'musicfreaks');
    if ($mysqli->connect_error){
        die('Could not connect to database!');
    }
    $mail =($_POST["mail"]);
    if ($mail > 1)
       {
           die ($mailava = "<span class='error_icon tick cross mfoufi'></span>  <span class='errortext mfouf'>Please fill out this field</span> <script>$(function() {
        $('.mfoufi').hover(function() { 
        $('.mfouf').css('display','block'); 
    }, function() { 
        $('.mfouf').css('display','none');
    });
        });
  </script>"); 
           }
    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
      //die ($mailava = "<img src='images/redtick.png'/><span style='margin-left:7px;'>Enter a valid e-mail address.</span>");
      //die ($mailava = "<style>#mail { border: 1px solid #ff5858;}</style>"); 
	  die ($mailava = "<span class='error_icon cross evei'></span> <span class='errortext eve'>Please enter a valid email address</span><script>$(function() {
		$('.evei').hover(function() { 
    	$('.eve').css('display','block'); 
	}, function() { 
    	$('.eve').css('display','none');
	});
		});
  </script>");
    }
    $mail = filter_var($_POST["mail"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);
    $statement = $mysqli->prepare("SELECT mail FROM musicfreaks_users WHERE mail= '$mail'");
    
    $statement->execute();
    $statement->bind_result($username);
    if($statement->fetch()){
        //die('<style>#mail { border: 1px solid #ff5858;}</style>');
		die ("<span class='error_icon cross owni'></span><span class='errortext own'>This email address belongs to an existing account</span><script>$(function() {
		$('.owni').hover(function() { 
    	$('.own').css('display','block'); 
	}, function() { 
    	$('.own').css('display','none');
	});
		});
  </script>");
    }else{
       // die('<style>#mail { border: 1px solid #11c106;}</style>');
		die ("<span class='error_icon tick'></span>");
    }
}
?>