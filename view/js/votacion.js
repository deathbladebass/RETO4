var miAplicacion = angular.module('miAplicacion', []);


miAplicacion.controller('votacion', function ($scope, $http) {
	var datos="";
	var votos=0;
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
		
		datos={usuario:$scope.user.idUsuario};
		if($scope.user.tipoUsu==0){
			window.location.replace("../index.html");
		}
	},function myError(response) {
		$scope.categoria = response.statusText;
	});
	//Fin session
	
	//Jugadores
	$http({
		method: "get",
		url: "../controller/cJugadoresCategoriasE.php",
	}).then(function mySuccess(result){
		
		console.log(result);
		$scope.equipos=result.data;
		
	},function myError(response) {
		$scope.categoria = response.statusText;
	});
	//Fin jugadores
	
    
	//Categorias
		$http({
			method: "get",
			url: "../controller/cJugadoresCategoriasJ.php",
		}).then(function mySuccess(result){
			
			console.log(result);
			$scope.jugadores=result.data;
			
		}, function myError(response) {
				$scope.categoria = response.statusText;
		});
	//Fin Categorias
		
		//Comprobacion si has votado
		
		$http({
			method: "get",
			params: {data:datos},
			url: "../controller/cVotacionUsuario.php",
		}).then(function mySuccess(result){
			
			console.log(result);
			$scope.votacion=result.data;
			
			
			
		}, function myError(response) {
				$scope.categoria = response.statusText;
		});
		
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