var miAplicacion = angular.module('miAplicacion', []);

miAplicacion.controller('jugadores', function ($scope, $http) {
$scope.jugador = [];
	$http({
	method: "get",
	url: "../controller/cJugadoresCategoriasJ.php",
}).then(function mySuccess(result){
	console.log(result);
	$scope.jugadores=result.data;
	$scope.jugadoresCard="true";

}, function myError(response) {
        $scope.jugador = response.statusText;

    });

});

miAplicacion.controller('equipos', function ($scope, $http) {
	$scope.equipo = [];
		$http({
		method: "get",
		url: "../controller/cJugadoresCategoriasE.php",
	}).then(function mySuccess(result){
		console.log(result);
		$scope.equipos=result.data;
		$scope.equiposCards="true";
	
	}, function myError(response) {
			$scope.equipo = response.statusText;
	
		});
	
});

miAplicacion.controller('categorias', function ($scope, $http) {
	$scope.categoria = [];
		$http({
		method: "get",
		url: "../controller/cJugadoresCategoriasC.php",
	}).then(function mySuccess(result){
		console.log(result);
		$scope.categorias=result.data;
		$scope.categoriasCards="true";
		
	}, function myError(response) {
			$scope.categoria = response.statusText;
	});
		
});