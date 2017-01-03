function sendcommand(){
	$.post("terminal.php",
        {
          command: $('#line').val()
        },
        function(data){
			var text = "<div id = 'result'>";
			var divclose = "</div>";
            thedata = text.concat(data,divclose);
            data.replace("\n", "<br>")
            $("body").append(data);
            newline();
   
       
       
        });
			 
			  
	
	
	
	
	
}

function newline(){
	
	
        var newdiv = $("<input id='line' style='border:none'>");
        $("body").append(newdiv);
	    start();
	
	
	
	
	
}
function start(){
	
$('#line').focus();
    $('#line').keypress(function (e){
    
    if(e.keyCode == 13){
	    
       sendcommand();
       var oldline = "<pre>".concat($(this).val(),"</pre>");
     	$(this).attr('id','oldline');
        $(this).replaceWith(oldline);
     	
      
    }
 });
	
	
	
	
	
}
$(document).ready(function(){
	start();
	
});
