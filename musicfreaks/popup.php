<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>


opens a popup a window with the specified width and height. can be centered in the screen
function openAWindow( pageToLoad, winName, width, height, center)

<script type="text/javascript">
{
    xposition=0; yposition=0;
    if ((parseInt(navigator.appVersion) >= 4 ) && (center)){
        xposition = (screen.width - width) / 2;
        yposition = (screen.height - height) / 2;
    }
	
	//0 => no
	//1 => yes
    var args = "";
    	args += "width=" + width + "," + "height=" + height + ","
		+ "location=0,"
		+ "menubar=0,"
		+ "resizable=0,"
		+ "scrollbars=0,"
		+ "statusbar=false,dependent,alwaysraised,"
		+ "status=false,"
		+ "titlebar=no,"
		+ "toolbar=0,"
		+ "hotkeys=0,"
		+ "screenx=" + xposition + ","  //NN Only
		+ "screeny=" + yposition + ","  //NN Only
		+ "left=" + xposition + ","     //IE Only
		+ "top=" + yposition;           //IE Only
		//fullscreen=yes, add for full screen
    	var dmcaWin = window.open(pageToLoad,winName,args );
    	dmcaWin.focus();
    //window.showModalDialog(pageToLoad,"","dialogWidth:650px;dialogHeight:500px");
}
call the function as openAWindow("home.php","windownamehere",500,600,true);
500 => width
600 => height
true => if you want to place the popup window in the center of the screen

</script>

</body>
</html>