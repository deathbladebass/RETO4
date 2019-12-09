var miAplicacion = angular.module('miAplicacion', []);
miAplicacion.controller('informacion', function ($scope, $http) {
    $scope.equipo = [];
    $http({
        method: "get",
        url: "../controller/cAdminEquipo.php",
    }).then(function mySucces(result) {
        console.log(result);
        $scope.equipo = result.data;
    }, function myError(response) {
        $scope.equipo = response.statusText;
    });
    $scope.jugador = [];
    $http({
        method: "get",
        url: "../controller/cAdminJugador.php",
    }).then(function mySucces(result) {
        console.log(result);
        $scope.jugador = result.data;
    }, function myError(response) {
        $scope.jugador = response.statusText;
     
});
})