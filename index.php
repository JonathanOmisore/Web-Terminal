<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script src="terminal.js"></script>
<script>

$(document).ready(function(){
		 $('#textcolor').keypress(function (e){
		 
		 if(e.keyCode == 13){
		  $(".text").css("color",$('#textcolor').val());
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
	 }});
	

});
</script>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<input id='textcolor'> 
<div id="terminalapp"></div>

</body>
</html>
