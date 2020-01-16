var miAplicacion = angular.module('miAplicacion', []);
	
miAplicacion.controller('votacion', function ($scope, $http) {
	
	//EquiposJugadores
	$http({
		method: "get",
		url: "../../Reto4/controller/cJugadoresCategoriasE.php",
	}).then(function mySuccess(result){
		console.log(result);
		$scope.equipos=result.data;
			
			
	}, function myError(response) {
		$scope.equipo = response.statusText;
		
	});
	//Fin equiposjugadores
	
	//Jugadores
	$http({
		method: "get",
		url: "../controller/cJugadoresCategoriasJ.php",
	}).then(function mySuccess(result){
		console.log(result);
		$scope.jugadores=result.data;

	
	}, function myError(response) {
        $scope.jugador = response.statusText;

    });
	//Fin Jugadores
	
	$scope.votar=function(id){
		alert(id);
	}
	
	
});