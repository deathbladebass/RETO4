var miAplicacion = angular.module('miAplicacion', []);
miAplicacion.controller('informacion', function ($scope, $http) {
    $scope.equipo = [];
    $http({
        method: "get",
        url: "../controller/cAdmin.php",
    }).then(function mySucces(result) {
        console.log(result);
        $scope.equipo = result.data;
    }, function myError(response) {
        $scope.equipo = response.statusText;
    });
});