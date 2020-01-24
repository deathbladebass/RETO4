 $(document).ready(function(){
    $('select').formSelect();
    //Submit
    $( "#fsubmit" ).click(function() {
    	  var fnombre=$('#fnombre').val();
    	  var femail=$('#femail').val();
    	  var ftipo=$('#ftipo').val();
    	  var fasunto=$('#fasunto').val();
    	  var fmensaje=$('#fmensaje').val();
    	  
    	  var contador=0;
    	  
    	  if(fnombre.length==0){ 
    		  $(".grid-nombre").css({"background-color": 'tomato'});
    	  }else{
    		  $('.grid-nombre').css({ "background-color": "rgba(255, 255, 255, 0.3)"});
    		  contador++;
    	  }
    	  if(femail.length==0){
    		  $(".grid-email").css({"background-color": 'tomato'}); 		  
    	  }else if(!isValidEmailAddress(femail)){
    		  $(".grid-email").css({"background-color": 'tomato'}); 
    	  }else{
    		  $('.grid-email').css({ "background-color": "rgba(255, 255, 255, 0.3)"});
    		  contador++;
    	  }
    	  if(fasunto.length==0){
    		  $(".grid-asunto").css({"background-color": 'tomato'}); 		  
    	  }else{
    		  $('.grid-asunto').css({ "background-color": "rgba(255, 255, 255, 0.3)"});
    		  contador++;
    	  }
    	  if(fmensaje.length==0){
    		  $(".grid-mensaje").css({"background-color": 'tomato'}); 		  
    	  }else{
    		  $('.grid-mensaje').css({ "background-color": "rgba(255, 255, 255, 0.3)"});
    		  contador++;
    	  }
    	  
    	  if(contador==4){
    		  $.ajax({
    		       	type:"GET",
    		       	data:{'nombre':fnombre, 'email':femail, 'tipo':ftipo, 'asunto':fasunto, 'mensaje':fmensaje},
    		       	url: "http://uno.fpz1920.com/Reto4/controller/cMensaje.php", 
    		    	dataType: "text",  //type of the result
    		       	
    		    	success: function(result){  
    		    		
    		       		alert(result)
    		       		location.reload();
    		    		
    				},
    		       	error : function(xhr) {
    		   			alert("An error occured: " + xhr.status + " " + xhr.statusText);
    		   		}
    			});
    		  
    		  	
    	  }else{
    		  alert("Rellena todos los datos por favor")
    	  }
   
    });
    
  });
 
 //Validar Email
 function isValidEmailAddress(emailAddress) {
	    var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
	    return pattern.test(emailAddress);
	}
      