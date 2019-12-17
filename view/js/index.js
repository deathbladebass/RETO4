
//Jquery
  $(document).ready(function(){
	  //session nav
	  
	  $.ajax({
			 type:"GET",

			 url: "../Reto4/controller/cNav.php", 
			 dataType: "json",  //type of the result
			    
			 success: function(sessionData){
				 console.log(sessionData);
				 
				 htmlLogin="";
				 htmlRegister="";
				 htmlAdminNav="";
				 
				 if(sessionData.tipoUsu==0){
					 htmlRegister+='<li><a class="white-text waves-effect waves-light modal-trigger" href="#modalRegistrar">Registrarse</a></li>'
					 htmlLogin+='<li><a class="white-text waves-effect waves-light modal-trigger" href="#modalLogin">Log in</a></li>'
						 $('.registerNav').html(htmlRegister);
				 }else{
					 htmlLogin+='<li>Bienvenido <b>'+sessionData.username+'</b></li>'						
				 }
				 
				 $('.loginNav').html(htmlLogin);
				 
				 
				 
				 if(sessionData.tipoUsu==2){
					 htmlAdminNav+='<li><a href="view/admin.php">Panel Admin</a></li>'
						 $('.adminNav').show();
				 }else{
					 $('.adminNav').hide();
				 }
				 
				 $('.adminNav').html(htmlAdminNav);
				 
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
		 url: "../reto4/controller/cIndex.php", 
		 dataType: "json",  //type of the result
		    
		 success: function(result){
			 
			 console.log(result);
			 
			 var equipos= result;
			 
			 var newRow="";
			 
			 $.each(equipos,function(index,info) {
			
			 newRow +='<div class="col s12 m6 l4 center">';
			 	newRow +='<div class="row">';
			 		newRow +='<div class="col s12">';
			 			newRow +='<div class="card">';
			 			newRow +='<div class="card-image">';
			 				newRow +='<img src="view/'+info.imagen+'">';
			 			newRow +='</div>';
			 			newRow +='<div class="card-content ">';
			 				newRow +='<p >Nuestro equipo '+ info.nombreEquipo +' es un equipo de alto rendimiento en el que tenemos gente de varias edades</p>';
			 				newRow +='<br>';
			 				newRow +='<br>';
			 				newRow +='<br>';
			 			newRow +='<div>';
			 			newRow +='<a class="blue darken-4 card-action white-text" value="'+info.idEquipo+'" href="#">Información de '+info.nombreEquipo+'</a>';
			 			newRow +='</div>';
			 			newRow +='</div>';
			 		newRow +='</div>';
			 	newRow +='</div>';
			 newRow +='</div>';
			 newRow +='</div>';
			 
			 });
			 $("#equipos").append(newRow);
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
			data: {"nombre":nombre,"apellido":apellido, "contrasenia":contrasenia, "usuario":usuario, "email":email},
			url: "../reto4/controller/cInsertUsuario.php", 
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
	
	$('#btnLogin').click(function(){
		var usu=$('#usuario').val();
		var pass=$('#pass').val();
		
		if (usu=="") {
			alert("Rellena el usuario")
		}else if (pass==""){
			alert("Rellena la contraseña")
		}else{
			/* Comprobar usu y contraseña*/
			$.ajax({
				 type:"GET",
				 data:{'usuario':usu, 'pass':pass},
				 url: "../Reto4/controller/cLogin.php", 
				 dataType: "json",  //type of the result
				    
				 success: function(result){
					 
					 console.log(sessionData);
					 
					 htmlLogin="";
					 htmlRegister="";
					 htmlAdminNav="";
					 
					 if(sessionData.tipoUsu==0){
						 htmlRegister+='<li><a class="waves-effect waves-light modal-trigger" href="#modalRegistrar">Registrarse</a></li>'
						 htmlLogin+='<li><a class="waves-effect waves-light modal-trigger" href="#modalLogin">Log in</a></li>'
							 $('.registerNav').html(htmlRegister);
					 }else{
						 htmlLogin+='<li>Bienvenido <b>'+sessionData.username+'</b></li>'						
					 }
					 
					 $('.loginNav').html(htmlLogin);
					 
					 
					 
					 if(sessionData.tipoUsu==2){
						 htmlAdminNav+='<li><a href="view/admin.html">Panel Admin</a></li>'
							 $('.adminNav').show();
					 }else{
						 $('.adminNav').hide();
					 }
					 
					 $('.adminNav').html(htmlAdminNav);
	 
				}
					 
			});
			location.reload(true);
		}
	});
	
});