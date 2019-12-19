var miAplicacion = angular.module('miAplicacion', []);
	
miAplicacion.controller('jugadoresCategoria', function ($scope, $http) {

	
	//EquiposJugadores
	$http({
		method: "get",
		url: "../controller/cJugadoresCategoriasE.php",
	}).then(function mySuccess(result){
		//console.log(result);
		$scope.equipos=result.data;
			
		
	//Visibilidad
	$scope.jugadoresCards="false";
	$scope.equiposCards="true";
	$scope.categoriasCards="false";
			
	}, function myError(response) {
		$scope.equipo = response.statusText;
		
	});
	//Fin equiposjugadores
	
	//Jugadores
	$http({
		method: "get",
		url: "../controller/cJugadoresCategoriasJ.php",
	}).then(function mySuccess(result){
		//console.log(result);
		$scope.jugadores=result.data;

	
	}, function myError(response) {
        $scope.jugador = response.statusText;

    });
	//Fin Jugadores

	
	//Categoria
	$http({
		method: "get",
		url: "../controller/cJugadoresCategoriasC.php",
	}).then(function mySuccess(result){
		//console.log(result);
		$scope.categorias=result.data;
		
	}, function myError(response) {
			$scope.categoria = response.statusText;
	});
	//Fin Categoria
	
	//Jugadores
	$scope.showJugadores=function(){

		//Visibilidad
		$scope.jugadoresCards="true";
		$scope.equiposCards="false";
		$scope.categoriasCards="false";

	}
	
	//Categorias
	$scope.showCategorias=function(){

		//Visibilidad
		$scope.jugadoresCards="false";
		$scope.equiposCards="false";
		$scope.categoriasCards="true";

	}
	
	//Equipos
	$scope.showEquipos=function(){
			
		//Visibilidad
		$scope.jugadoresCards="false";
		$scope.equiposCards="true";
		$scope.categoriasCards="false";

	}
		
});