var miAplicacion = angular.module('miAplicacion', []);
miAplicacion.controller('equipo', function ($scope, $http) {
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
    

});
miAplicacion.controller('jugador', function ($scope, $http) {
    $scope.jugador = [];
    $http({
        method: "get",
        url: "../controller/cAdminJugador.php",
    }).then(function mySucces(result) {
        console.log(result);
        //alert(result.data);
        $scope.jugador = result.data;
    }, function myError(response) {
        $scope.jugador = response.statusText;

    });
});

miAplicacion.controller('categoria', function ($scope, $http) {
    $scope.categoria = [];
    $http({
        method: "get",
        url: "../controller/cAdminCategoria.php",
    }).then(function mySucces(result) {
        console.log(result);
        //alert(result.data);
        $scope.categoria = result.data;
    }, function myError(response) {
        $scope.categoria = response.statusText;

    });
});