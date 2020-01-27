var userType=0;  
$(document).ready(function(){
	  //Inicia script de imagenes
	  
	  
	  
	  
	  //Ajax Img
	  $.ajax({
			 type:"GET",

			 url: "http://uno.fpz1920.com/Reto4/controller/cNav.php", 
			 dataType: "json",  //type of the result
			    
			 success: function(sessionData){
 
			 userType=sessionData.tipoUsu;
			
	
				 console.log('Tipo: '+userType);
				 var publico="";
				 var privado="";
				 
				 //Llama al controlador para conseguir imagenes
				 $.ajax({
					 type:"GET",

					 url: "http://uno.fpz1920.com/Reto4/controller/cGaleria.php", 
					 dataType: "json",  //type of the result
					    
					 success: function(result){
	 
						 console.log(result);
						
						 for (var i = 0; i < result.length; i++) {
							 if (result[i].privada==0) {
								 publico+='<div class="col l4 m6 s12">'
										publico+='<img class="materialboxed imgGaleria" src="http://uno.fpz1920.com/Reto4/imagenes/publicas/'+result[i].ruta+'">'
										publico+='</div>'
							}
						}
						 
						 $('#publicas').html(publico);
						 
						 
						 if (userType==0 || userType==1) {
							 privado+='<h2 class="red-text center-align">ACCESO DENEGADO</h2>'
						} else {
							for (var i = 0; i < result.length; i++) {
								 if (result[i].privada==1) {
									 privado+='<div class="col l4 m6 s12">'
										 privado+='<img class="materialboxed imgGaleria" src="http://uno.fpz1920.com/Reto4/imagenes/privadas/'+result[i].ruta+'">'
										 privado+='</div>'
								}
							}
						}
						 
						 $('#privadas').html(privado);	 
						 $('.materialboxed').materialbox(); 
					}
						 
				});
			}
				 
		});
	  
  });
