var userType=0;  
$(document).ready(function(){
	  //Inicia script de imagenes
	  
	var PHPSESSID=localStorage.getItem('PHPSESSID');
	  
	  
	  //Ajax Img
	  $.ajax({
			 type:"GET",
			 data: {PHPSESSID:PHPSESSID || ''},
			 url: "http://uno.fpz1920.com/Reto4/controller/cNav.php", 
			 dataType: "json",  //type of the result
			    
			 success: function(sessionData){
 
			 userType=sessionData.tipoUsu;
		
				 
			 $('.logOutNav').hide();
			 
			 htmlLogin="";
			 htmlRegister="";
			 htmlAdminNav="";
			 htmlLogOutNav="";
			 htmlBanner="";
			 
			 if(sessionData.tipoUsu==0){
				 htmlRegister+='<li><a class="white-text waves-effect waves-light modal-trigger" href="#modalRegistrar">Registrarse</a></li>'
				 htmlLogin+='<li><a class="white-text waves-effect waves-light modal-trigger" href="#modalLogin">Log in</a></li>'
					 $('.registerNav').html(htmlRegister);
			 }else{
				 htmlBanner+='<div class="container">'
					 htmlBanner+='<a href="view/votacion.html">'
						 htmlBanner+='<img src="view/img/banner.jpg" alt="" width="100%" height="80px"/>'
					 htmlBanner+='</a>'
				 htmlBanner+='</div>'
			  
				 htmlLogin += '<li id="bienvenido"><a href="perfil.html">Bienvenido <b>' + sessionData.username + '</b></a></li>'			
				 htmlLogOutNav+='<li class="LogOutButton"><a href="#">Log Out</a></li>'
					 $('.logOutNav').show();
			 }
			 
			 $('.loginNav').html(htmlLogin);
	
			 
			 if(sessionData.tipoUsu==2){
				 htmlAdminNav+='<li><a href="view/admin.html">Panel Admin</a></li>'
					 
					 $('.adminNav').show();
			 }else{
				 $('.adminNav').hide();
			 }
			 $('.votaciones').html(htmlBanner);
			 $('.adminNav').html(htmlAdminNav);
			 $('.logOutNav').html(htmlLogOutNav);
			 
			 $('.LogOutButton').click(function(){
				alert("LogOut");
				$.ajax({
					type:"GET",
					url: "http://uno.fpz1920.com/Reto4/controller/cLogOut.php", 
					data:{'PHPSESSID':PHPSESSID},
				   
					success: function(result){  
						localStorage.removeItem("PHPSESSID");		
						localStorage.removeItem("username");	
						localStorage.removeItem("admin");	

						window.location.reload();
					},
					error : function(xhr) {
						alert("An error occured: " + xhr.status + " " + xhr.statusText);
					}
				});
			});

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
                                     privado+='<img class="materialboxed imgGaleria" src="http://uno.fpz1920.com/Reto4/imagenes/privadas/'+result[i].ruta+'?PHPSESSID='+PHPSESSID+'">'
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