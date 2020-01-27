$( document ).ready(function() {
    //Nexus
    $.ajax({
        type:"GET",
        url: "http://uno.fpz1920.com/app/controller/cVotosNexus.php", 
     dataType: "JSON",  //type of the result
     
     success: function(result){ 
         
        console.log(result);

         var jugadorNexus="";
        //saca el MVP, que por defecto es el primero de la lista
        jugadorNexus+='<div class="col-sm cardVotoMVP">'        
        jugadorNexus+='<div class="row">'
        jugadorNexus+='<div class="col-4">'
        jugadorNexus+='<img src="'+result[0].img+'">'
        jugadorNexus+='</div>'
        jugadorNexus+='<div class="col-8 jugadorList">'
        jugadorNexus+='<div class="row">'
        jugadorNexus+='<div class="col">'
        jugadorNexus+='<p><b>'+result[0].nombre+' "'+result[0].nickname+'" '+result[0].apellido+' (MVP)</b></p>'
        jugadorNexus+='</div>'
        jugadorNexus+='</div>'
        jugadorNexus+='<div class="row">'
        jugadorNexus+='<div class="col">'
        jugadorNexus+='<p>Rol: '+result[0].rol+'</p>'
        jugadorNexus+='<p>Equipo: '+result[0].nombreEquipo+'</p>'                  
        jugadorNexus+='</div>'    
        jugadorNexus+='</div>'
        jugadorNexus+='<div class="row">'
        jugadorNexus+='<div class="col">'
        jugadorNexus+='<p>Cantidad de votos: '+result[0].puntuacion+'</p>'
        jugadorNexus+='</div>'    
        jugadorNexus+='</div>'
        jugadorNexus+='</div>'
        jugadorNexus+='</div>'
        jugadorNexus+='</div>'    

        //saca los demas jugadores con votos

        for (let index = 1; index < result.length; index++) {
            const datos = result[index];

            jugadorNexus+='<div class="col-sm cardVoto shadow">'        
            jugadorNexus+='<div class="row">'
            jugadorNexus+='<div class="col-4">'
            jugadorNexus+='<img src="'+datos.img+'">'
            jugadorNexus+='</div>'
            jugadorNexus+='<div class="col-8 jugadorList">'
            jugadorNexus+='<div class="row">'
            jugadorNexus+='<div class="col">'
            jugadorNexus+='<p><b>'+datos.nombre+' "'+datos.nickname+'" '+datos.apellido+'</b></p>'
            jugadorNexus+='</div>'
            jugadorNexus+='</div>'
            jugadorNexus+='<div class="row">'
            jugadorNexus+='<div class="col">'
            jugadorNexus+='<p>Rol: '+datos.rol+'</p>'
            jugadorNexus+='<p>Equipo: '+datos.nombreEquipo+'</p>'                 
            jugadorNexus+='</div>'    
            jugadorNexus+='</div>'
            jugadorNexus+='<div class="row">'
            jugadorNexus+='<div class="col">'
            jugadorNexus+='<p>Cantidad de votos: '+datos.puntuacion+'</p>'
            jugadorNexus+='</div>'    
            jugadorNexus+='</div>'
            jugadorNexus+='</div>'
            jugadorNexus+='</div>'
            jugadorNexus+='</div>'
        }

        $('.jugadoresVotosNexus').html(jugadorNexus);

    },
    error : function(xhr) {
        alert("An error occured: " + xhr.status + " " + xhr.statusText);
    }	
});
        //Strike
    $.ajax({
        type:"GET",
        url: "http://uno.fpz1920.com/app/controller/cVotosStrike.php", 
     dataType: "JSON",  //type of the result
     
     success: function(result){ 
         
        console.log(result);

         var jugadorStrike="";
        //saca el MVP, que por defecto es el primero de la lista
        jugadorStrike+='<div class="col-sm cardVotoMVP">'        
        jugadorStrike+='<div class="row">'
        jugadorStrike+='<div class="col-4">'
        jugadorStrike+='<img src="'+result[0].img+'">'
        jugadorStrike+='</div>'
        jugadorStrike+='<div class="col-8 jugadorList">'
        jugadorStrike+='<div class="row">'
        jugadorStrike+='<div class="col">'
        jugadorStrike+='<p><b>'+result[0].nombre+' "'+result[0].nickname+'" '+result[0].apellido+' (MVP)</b></p>'
        jugadorStrike+='</div>'
        jugadorStrike+='</div>'
        jugadorStrike+='<div class="row">'
        jugadorStrike+='<div class="col">'
        jugadorStrike+='<p>Rol: '+result[0].rol+'</p>'
        jugadorStrike+='<p>Equipo: '+result[0].nombreEquipo+'</p>'                 
        jugadorStrike+='</div>'    
        jugadorStrike+='</div>'
        jugadorStrike+='<div class="row">'
        jugadorStrike+='<div class="col">'
        jugadorStrike+='<p>Cantidad de votos: '+result[0].puntuacion+'</p>'
        jugadorStrike+='</div>'    
        jugadorStrike+='</div>'
        jugadorStrike+='</div>'
        jugadorStrike+='</div>'
        jugadorStrike+='</div>'    

        //saca los demas jugadores con votos

        for (let index = 1; index < result.length; index++) {
            const datos = result[index];

            jugadorStrike+='<div class="col-sm cardVoto shadow">'        
            jugadorStrike+='<div class="row">'
            jugadorStrike+='<div class="col-4">'
            jugadorStrike+='<img src="'+datos.img+'">'
            jugadorStrike+='</div>'
            jugadorStrike+='<div class="col-8 jugadorList">'
            jugadorStrike+='<div class="row">'
            jugadorStrike+='<div class="col">'
            jugadorStrike+='<p><b>'+datos.nombre+' "'+datos.nickname+'" '+datos.apellido+'</b></p>'
            jugadorStrike+='</div>'
            jugadorStrike+='</div>'
            jugadorStrike+='<div class="row">'
            jugadorStrike+='<div class="col">'
            jugadorStrike+='<p>Rol: '+datos.rol+'</p>'
            jugadorStrike+='<p>Equipo: '+datos.nombreEquipo+'</p>'                 
            jugadorStrike+='</div>'    
            jugadorStrike+='</div>'
            jugadorStrike+='<div class="row">'
            jugadorStrike+='<div class="col">'
            jugadorStrike+='<p>Cantidad de votos: '+datos.puntuacion+'</p>'
            jugadorStrike+='</div>'    
            jugadorStrike+='</div>'
            jugadorStrike+='</div>'
            jugadorStrike+='</div>'
            jugadorStrike+='</div>'
        }

        $('.jugadoresVotosStrike').html(jugadorStrike);
    },
    error : function(xhr) {
        alert("An error occured: " + xhr.status + " " + xhr.statusText);
    }	
});

        //Siege
    $.ajax({
        type:"GET",
        url: "http://uno.fpz1920.com/app/controller/cVotosSiege.php", 
     dataType: "JSON",  //type of the result
     
     success: function(result){ 
         
        console.log(result);

         var jugadorSiege="";
        //saca el MVP, que por defecto es el primero de la lista
        jugadorSiege+='<div class="col-sm cardVotoMVP">'        
        jugadorSiege+='<div class="row">'
        jugadorSiege+='<div class="col-4">'
        jugadorSiege+='<img src="'+result[0].img+'">'
        jugadorSiege+='</div>'
        jugadorSiege+='<div class="col-8 jugadorList">'
        jugadorSiege+='<div class="row">'
        jugadorSiege+='<div class="col">'
        jugadorSiege+='<p><b>'+result[0].nombre+' "'+result[0].nickname+'" '+result[0].apellido+' (MVP)</b></p>'
        jugadorSiege+='</div>'
        jugadorSiege+='</div>'
        jugadorSiege+='<div class="row">'
        jugadorSiege+='<div class="col">'
        jugadorSiege+='<p>Rol: '+result[0].rol+'</p>'
        jugadorSiege+='<p>Equipo: '+result[0].nombreEquipo+'</p>'                 
        jugadorSiege+='</div>'    
        jugadorSiege+='</div>'
        jugadorSiege+='<div class="row">'
        jugadorSiege+='<div class="col">'
        jugadorSiege+='<p>Cantidad de votos: '+result[0].puntuacion+'</p>'
        jugadorSiege+='</div>'    
        jugadorSiege+='</div>'
        jugadorSiege+='</div>'
        jugadorSiege+='</div>'
        jugadorSiege+='</div>'    

        //saca los demas jugadores con votos

        for (let index = 1; index < result.length; index++) {
            const datos = result[index];

            jugadorSiege+='<div class="col-sm cardVoto shadow">'        
            jugadorSiege+='<div class="row">'
            jugadorSiege+='<div class="col-4">'
            jugadorSiege+='<img src="'+datos.img+'">'
            jugadorSiege+='</div>'
            jugadorSiege+='<div class="col-8 jugadorList">'
            jugadorSiege+='<div class="row">'
            jugadorSiege+='<div class="col">'
            jugadorSiege+='<p><b>'+datos.nombre+' "'+datos.nickname+'" '+datos.apellido+'</b></p>'
            jugadorSiege+='</div>'
            jugadorSiege+='</div>'
            jugadorSiege+='<div class="row">'
            jugadorSiege+='<div class="col">'
            jugadorSiege+='<p>Rol: '+datos.rol+'</p>'
            jugadorSiege+='<p>Equipo: '+datos.nombreEquipo+'</p>'                 
            jugadorSiege+='</div>'    
            jugadorSiege+='</div>'
            jugadorSiege+='<div class="row">'
            jugadorSiege+='<div class="col">'
            jugadorSiege+='<p>Cantidad de votos: '+datos.puntuacion+'</p>'
            jugadorSiege+='</div>'    
            jugadorSiege+='</div>'
            jugadorSiege+='</div>'
            jugadorSiege+='</div>'
            jugadorSiege+='</div>'
        }

        $('.jugadoresVotosSiege').html(jugadorSiege);

     },
        error : function(xhr) {
            alert("An error occured: " + xhr.status + " " + xhr.statusText);
        }	
    });



});