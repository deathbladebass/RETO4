var miAplicacion = angular.module('miAplicacion', []);


//Comienzo controllador
miAplicacion.controller('jugadoresCategoria', function ($scope, $http) {

    $http({
		method: "get",
		url: "../controller/cVotacionCategoria.php",
		responseType:'json'
	}).then(function mySuccess(result){
		console.log(result);
		$scope.categoria=result;
    });
    
    $http({
		method: "get",
		url: "../controller/cAdminJugador.php",
		responseType:'json'
	}).then(function mySuccess(result){
		console.log(result);
		$scope.jugador=result;
    });
    
    $scope.vote=function(idJugador, idUsuario){
        $http({
            method: "get",
            url: "../controller/cVotar.php",
        }).then(function mySuccess(){

            location.reload();
        })
    }; 
});