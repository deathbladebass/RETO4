//Materialize
//Hace que el carrousel se mueva
$('.carousel').carousel({
    padding: 200    
});
autoplay();

function autoplay() {
    $('.carousel').carousel('next');
    setTimeout(autoplay, 4500);
}

//Hace que el dropdown de opciones se despliegue
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.dropdown-trigger');
    var instances = M.Dropdown.init(elems, options);
  });
  // Or with jQuery
  $('.dropdown-trigger').dropdown();
  
  
  //Jquery
  $(document).ready(function(){
	  
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
			
			 newRow +='<div class="col s12 m4 center">';
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
		 }
	
  		});
  });