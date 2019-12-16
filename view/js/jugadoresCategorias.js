var miAplicacion = angular.module('miAplicacion', []);

miAplicacion.controller('jugadores', function ($scope, $http) {
$scope.jugador = [];
	$http({
	method: "get",
	url: "../controller/cJugadoresCategoriasJ.php",
}).then(function mySuccess(result){
	console.log(result);
	$scope.jugadores=result.data;

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
		$scope.categorias=result.data;
		
	}, function myError(response) {
			$scope.categoria = response.statusText;
	});
		
});
miAplicacion.controller('loginRegi', function ($scope, $http){


	$scope.showPlayer= function (){
		$scope.jugadores="true";
		$scope.equipos="false";
		$scope.categoria="false";
	}
	$scope.showTeam=function(){
		$scope.jugadores="false";
		$scope.equipos="true";
		$scope.categoria="false";
	}
	$scope.showCategoria=function(){
		$scope.jugadores="false";
		$scope.equipos="false";
		$scope.categoria="true";
	}
	
$scope.modalLogin=function(){
	alert("Login");
		 var elems = document.querySelectorAll('.modal');
		 var instance = M.Modal.init(elems);

		 instance.openModal();
}
$scope.modalRegistrar=function(){
	alert("Regitrar");
	

}
$scope.aniadir=function(){
	
	$http({url:'controller/cInsertUsuario.php', 
    		method: "GET",
    		params: {usuario:$scope.usuarioReg, nombre:$scope.nombreReg, apellido:$scope.apellidoReg, contraseña:$scope.passReg, email:$scope.emailReg}
    }).then(function(respuesta){
            console.log(respuesta); 
    });
}
});