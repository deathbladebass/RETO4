var miAplicacion = angular.module('miAplicacion', []);


miAplicacion.controller('votacion', function ($scope, $http) {
	var datos;
	var votos=0;
	$scope.equipos;
	//Si has votado te redirirecciona al index
	if (votos==3){
		window.location.replace("../index.html");
	}
	
	
	//Session
	$http({
		method: "get",
		url: "../controller/cNav.php",
	}).then(function mySuccess(result){
		
		console.log(result);
		$scope.user=result.data;
		
		datos=parseInt($scope.user.idUsuario);
		//alert(datos);
		
		$scope.usuarioData(datos);
		if($scope.user.tipoUsu==0){
			window.location.replace("../index.html");
		}
	},function myError(response) {
		$scope.categoria = response.statusText;
	});
	//Fin session
	
	
	//Cargas Los Datos
	$scope.loadData=function(){
	//Equipos Categorias
	$http({
		method: "get",
		url: "../controller/cJugadoresCategoriasE.php",
	}).then(function mySuccess(result){
		
		console.log(result);
		$scope.equipos=result.data;
		
		
		//var listaEquipos=parseInt($scope.equipos.length);
		//alert($scope.equipos.length);
		//var longitud= $scope.equipos.length;
		
		for (i = 0; i < $scope.equipos.length; i++) {
			//alert(i);
            for(x = 0; x < $scope.votacion.length; x++){
            	//alert(x);
            	if ($scope.equipos[i].idCategoria==$scope.votacion[x].idCategoria) {
            		$scope.equipos.splice(i,1);
            		i--;
            		x=$scope.votacion.length;
            	}
            }

        }
		if ($scope.equipos.length==0){
			window.location.replace("../index.html");
		}
		//alert($scope.equipos.length)
	},function myError(response) {
		$scope.categoria = response.statusText;
	});
	//Fin Equipos Categorias
	}
	//Fin Cargas Los Datos
    
	//Categorias
		$http({
			method: "get",
			url: "../controller/cJugadoresCategoriasJ.php",
		}).then(function mySuccess(result){
			
			console.log(result);
			$scope.jugadores=result.data;
			//$scope.usuarioData();
			
		}, function myError(response) {
				$scope.categoria = response.statusText;
		});
	//Fin Categorias
		
		
		$scope.usuarioData=function(datos){
		//Comprobacion si has votado
			$http({
				method: "get",
				params: {data:datos},
				url: "../controller/cVotacionUsuario.php",
			}).then(function mySuccess(result){
			
				console.log(result);
				$scope.votacion=result.data;
				
				$scope.loadData();
	
			}, function myError(response) {
				$scope.categoria = response.statusText;
			});
		}
		//Tener un contador por cada voto suma hasta 3 y luego redirecciona
	
		
		//Insert Voto
		$scope.votar=function(idJugador){
			var datos={usuario:$scope.user.idUsuario};
			datos.idJugador=idJugador;
			console.log(datos);
			$http({
				method: "GET",
				params: {data:datos},
				url: "../controller/cVotar.php",
			}).then(function mySuccess(){

				//Ocultar los botones o todo el bloque
				
				location.reload();
			})
		}; 
		//Fin Insert Voto
	
});