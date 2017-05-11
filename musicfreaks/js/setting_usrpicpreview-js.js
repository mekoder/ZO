// Display Picture preview

 var loadFile = function(event) {
    var output = document.getElementById('preview-user-pic');
    output.style.backgroundImage = "url("+ URL.createObjectURL(event.target.files[0]) +")";
  };
  
  // Ends
 //  function ImagePreview() { 
// var PreviewIMG = document.getElementById('preview-user-pic');
//  var UploadFile = document.getElementById('att').files[0]; 
//  var ReaderObj = new FileReader(); 
//  ReaderObj.onloadend = function () { 
//  PreviewIMG.style.backgroundImage = "url("+ ReaderObj.result+")"; } 
 // if (UploadFile) { ReaderObj.readAsDataURL(UploadFile); } 
 // else { PreviewIMG.style.backgroundImage = ""; } }
  