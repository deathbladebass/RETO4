var miAplicacion = angular.module('miAplicacion', []);
miAplicacion.controller('jugadores', function ($scope, $http) {
$scope.jugador = [];
	$http({
	method: "get",
	url: "../controller/cJugadoresCategoriasJ.php",
}).then(function mySuccess(result){
	console.log(result);
	$scope.jugador=result;

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
		$scope.equipo=result;
	
	}, function myError(response) {
			$scope.equipo = response.statusText;
	
		});
	
	});

	miAplicacion.controller('categorias', function ($scope, $http) {
		$scope.equipo = [];
			$http({
			method: "get",
			url: "../controller/cJugadoresCategoriasC.php",
		}).then(function mySuccess(result){
			console.log(result);
			$scope.categoria=result.data;
		
		}, function myError(response) {
				$scope.categoria = response.statusText;
		
			});
		
		});