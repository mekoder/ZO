<!DOCTYPE html>
<html>
<head>
<style>
.loader {
  border: 8px solid #f3f3f3;

  border-radius: 50%;


  border-top: 8px solid #000;
border-top-style:dotted;

border-right: 8px solid #292929;
border-right-style:dotted;

border-bottom: 8px solid #292929;
border-bottom-style:dotted;

border-left: 8px solid #292929;
border-left-style:dotted;
  width: 30px;
  height: 30px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 1.5s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
</head>
<body>

<h2>How To Create A Loader</h2>
<p><strong>Note:</strong> The -webkit- and -ms- prefixes are for browsers that do not support animation and transform properties.</p>

<div class="loader"></div>

</body>
</html>
