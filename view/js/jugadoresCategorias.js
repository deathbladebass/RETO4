var miAplicacion = angular.module('miAplicacion', []);

/*miAplicacion.service('dataService', function() {
	  // private variable
	  var _dataObj = {};
	  
	  this.dataObj = _dataObj;
	})

	
	$rootScope.jugadoresCard="true";
	$scope.equiposCards="true";
	$scope.categoriasCards="true";
*/
	
miAplicacion.factory('visible',function(){
	return 
})
miAplicacion.controller('jugadores', function ($scope, $http) {
$scope.jugador = [];
	$http({
	method: "get",
	url: "../controller/cJugadoresCategoriasJ.php",
}).then(function mySuccess(result){
	console.log(result);
	$scope.jugadores=result.data;
	//Visibilidad
	$scope.jugadoresCards="true";
	$scope.equiposCards="true";
	$scope.categoriasCards="true";
	
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
		
		//Visibilidad
		$scope.jugadoresCards="true";
		$scope.equiposCards="true";
		$scope.categoriasCards="true";
		
	}, function myError(response) {
			$scope.equipo = response.statusText;
	
		});
	
		$scope.showEquipos=function(){
			
		}
});

miAplicacion.controller('categorias', function ($scope, $http) {
	$scope.categoria = [];
		$http({
		method: "get",
		url: "../controller/cJugadoresCategoriasC.php",
	}).then(function mySuccess(result){
		console.log(result);
		$scope.categorias=result.data;
		
		//Visibilidad
		$scope.jugadoresCards="true";
		$scope.equiposCards="true";
		$scope.categoriasCards="true";
		
	}, function myError(response) {
			$scope.categoria = response.statusText;
	});
		
});