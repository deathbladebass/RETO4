
//Jquery
  $(document).ready(function(){
	  
	  //session nav
	  var PHPSESSID=localStorage.getItem('PHPSESSID');
	  $.ajax({
			 type:"GET",
			 data: {'PHPSESSID':PHPSESSID},
			 url: "http://uno.fpz1920.com/Reto4/controller/cNav.php", 
			 dataType: "json",  //type of the result
			    
			 success: function(sessionData){
				 console.log(sessionData);
				 
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
		  		
					 htmlLogin+='<li id="bienvenido">Bienvenido <b>'+sessionData.username+'</b></li>'			
					 htmlLogOutNav+='<li id="LogOutButton"><a href="#">Log Out</a></li>'
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
				 
				 $('#LogOutButton').click(function(){
					alert("LogOut");
					$.ajax({
						type:"GET",
						url: "http://uno.fpz1920.com/Reto4/controller/cLogOut.php", 
						datatype: "text",  //type of the result
					   
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
			}
		});
	  
	  
	  
	//Materialize
	//Hace que el carrousel se mueva
	$('.carousel').carousel({
	    padding: 200    
	});
	autoplay();

	function autoplay() {
	    $('.carousel').carousel('next');
	    setTimeout(autoplay, 6000);
	}

	//Hace que el dropdown de opciones se despliegue
	document.addEventListener('DOMContentLoaded', function() {
	    var elems = document.querySelectorAll('.dropdown-trigger');
	    var instances = M.Dropdown.init(elems, options);
	  });
	  // Or with jQuery
	  $('.dropdown-trigger').dropdown();
	  
	  //Muestra todos los modales
	  $('.modal').modal();
	  
	//Llama al controlador para recivir los datos de los equipos
	$.ajax({
		 type:"GET",
		 data: {'PHPSESSID':PHPSESSID},
		 url: "http://uno.fpz1920.com/Reto4/controller/cIndex.php", 
		 dataType: "json",  //type of the result
		    
		 success: function(result){
			 
			 console.log(result);
			 
			 var mensajes= result;
			 
			 var newRow="";
			 
			 $.each(mensajes,function(index,info) {
			
			 newRow +='<div class="col s12 m6 l4 center">';
			 	newRow +='<div class="row">';
			 		newRow +='<div class="col s12">';
			 			newRow +='<div class="card">';
			 			newRow +='<div class="card-content ">';
			 				newRow +='<p > '+ info.asunto +' </p>';
			 				newRow +='<p > '+ info.fecha +' </p>';
			 				newRow +='<p > '+ info.nombre +' </p>';
			 				newRow +='<p > '+ info.mensaje +' </p>';
			 				newRow +='<br>';
			 				newRow +='<br>';
			 				newRow +='<br>';
			 			newRow +='</div>';
			 		newRow +='</div>';
			 	newRow +='</div>';
			 newRow +='</div>';
			 newRow +='</div>';
			 
			 });
			 $("#mensajes").append(newRow);
		 },
  		});
	

	
	$('#btnRegistrar').click(function(){
		
		//Datos a insertar
		var usuario= $("#usuarioReg").val();
		var nombre = $("#nombreReg").val();
		var apellido= $("#apellidoReg").val();
		var contrasenia= $("#passReg").val();
		var email =$("#emailReg").val();
		
		alert(usuario);

		$.ajax({
			type:"GET",
			data: {'PHPSESSID':PHPSESSID,"nombre":nombre,"apellido":apellido, "contrasenia":contrasenia, "usuario":usuario, "email":email},
			url: "http://uno.fpz1920.com/Reto4/controller/cInsertUsuario.php", 
			datatype: "json",  //type of the result
	   	
			success: function(result){  
				//alert(result);
				console.log(result);
				alert(result);
				//location.reload(true)
	   
			},
			error : function(xhr) {
				alert("An error occured: " + xhr.status + " " + xhr.statusText);
			}
		}); 
	});
	
	$('#btnLogin').click(function () {
		var usu = $('#usuario').val();
		var pass = $('#pass').val();

		if (usu == "") {
			alert("Rellena el usuario")
		} else if (pass == "") {
			alert("Rellena la contraseña")
		} else {
			/* Comprobar usu y contraseña*/
			$.ajax({
				type: "GET",
				data: { 'PHPSESSID':PHPSESSID, 'usuario': usu, 'pass': pass },
				url: "http://uno.fpz1920.com/Reto4/controller/cLogin.php",
				dataType: "json",  //type of the result

				success: function (result) {
					//alert(result);
					//result='['+result+']';
					//var resultado=JSON.parse(result);
					//console.log(result);

					htmlLogin = "";
					htmlRegister = "";
					htmlAdminNav = "";

					if (result.tipoUsu == 0) {
						htmlRegister += '<li><a class="waves-effect waves-light modal-trigger" href="#modalRegistrar">Registrarse</a></li>'
						htmlLogin += '<li><a class="waves-effect waves-light modal-trigger" href="#modalLogin">Log in</a></li>'
						$('.registerNav').html(htmlRegister);
					} else {
						htmlLogin += '<li>Bienvenido <b>' + result.username + '</b></li>'
					}

					$('.loginNav').html(htmlLogin);
					localStorage.setItem("PHPSESSID", result.PHPSESSID);
					localStorage.setItem("usuario", result.username);
					localStorage.setItem("admin", result.tipoUsu);	


					if (result.tipoUsu == 2) {
						htmlAdminNav += '<li><a href="view/admin.html">Panel Admin</a></li>'
						$('.adminNav').show();
					} else {
						$('.adminNav').hide();
					}

					$('.adminNav').html(htmlAdminNav);


					window.location.reload();
				},
				error : function(xhr) {
					alert("An error occured: " + xhr.status + " " + xhr.statusText);
				}

			});
			
		}
		
	});
	
});

