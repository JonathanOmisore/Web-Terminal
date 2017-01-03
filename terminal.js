function sendcommand(){
	$.post("terminal.php",
        {
          command: $('#line').val()
        },
        function(data){
			
            $("#terminalapp").append(data);
            newline();
   
       
       
        });
			 
			  
	
	
	
	
	
}

function begin(){
	$.post("terminal.php",
        {
			
			getdir:''
		},
        function(data){
			
          var line =   $("<span id='directory' class='text'>" + data + " ]$&emsp;</span><input id='line' class='text'>");
          $(line).prependTo("#terminalapp");
          moveoldlineaway();
       
        });
	
	
	
	
}

function newline(){
	
	   $.post("terminal.php",
        {
			
		getdir:''
		},
        function(data){
			
        var newdiv = $("<span id='directory' class='text'>" + data + " ]$&emsp;</span><input id='line' class = 'text'>");
        $('#terminalapp').append(newdiv);
           moveoldlineaway();  
       
        });
	
       
        
    
	
	
	

	   
	  
	
	
}	

	

function moveoldlineaway(){
	
$('#line').focus();
    $('#line').keypress(function (e){
    
    
    if(e.keyCode == 13){
	 
	  
       sendcommand();
      
       var oldline = "<span id='oldline' class='text'>".concat($(this).val(),"</span>");
     	$(this).attr('id','oldline');
        $(this).replaceWith(oldline);
     	
      
    
 }});
	
	
	
	
	
}

function login(){
	
	$('#terminalapp').append("<span class = 'login'>Username:</span><input id = 'username' name = 'username' class='text' type='text' value=''><br>");
	$('#username').focus();
	$('#username').keypress(function (e){
    
    if(e.keyCode == 13){
		var user = $('#username').val();
		$('#terminalapp').append("<span class = 'login'>Password:<input id = 'password' name = 'password' class='text' value = '' type='password'>");
		$('#password').focus();
		$('#password').keypress(function (e){
    
    if(e.keyCode == 13){
		var pass = $('#password').val();
	 $.post("terminal.php",
        {
		
		username:user,
		password:pass
		},
        function(data){
			
		
        if(data != "<pre id = 'output' class = 'login'>Login incorrect.</pre>" ){
          
           $('#username').remove();
           $('#password').remove();
           $('.login').remove();
            begin();
       }
       else{
		   $("#terminalapp").append(data);
		   $('#username').remove();
           $('#password').remove();
           
		   login();
	   }
        })}});
	
		
		}});
	
	
	
	
	
	
	
	
	
	
	
}
$(document).ready(function(){

	 login();
	

});
