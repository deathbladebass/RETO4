var miAplicacion = angular.module('miAplicacion', []);
miAplicacion.controller('jugadores', function ($scope, $http) {
$http({
	method: "get",
	url: "../controller/cJugadoresCategorias.php",
}).then(function mySuccess(result){
	console.log(result);
	$scope.list=result;

}, function myError(response) {
        $scope.list = response.statusText;

    });

});