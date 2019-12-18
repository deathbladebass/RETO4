var fecha = "";
var miAplicacion = angular.module('miAplicacion', []);
miAplicacion.controller('equipo', function ($scope, $http) {
    $scope.equipo = [];

    $http({
        method: "get",
        url: "../controller/cAdminEquipo.php",
    }).then(function mySucces(result) {
        $scope.equipo = result.data;
        console.log($scope.equipo);
    }, function myError(response) {
        $scope.equipo = response.statusText;
    });

    $scope.borrar = function (x) {
        console.log(x);

        $http({
            method: "get",
            url: "../controller/cBorrarEquipo.php",
            params: { id: x }
        }).then(function () {
            location.reload();
        }, function myError(response) {
            $scope.jugador = response.statusText;

        });
    }


});
miAplicacion.controller('jugador', function ($scope, $http) {
    $scope.nombre = '';
    $scope.nickname = '';
    $scope.apellido = '';
    $scope.dni = '';
    $scope.fechaNacimiento = '';
    $scope.numTel = '';
    $scope.rol = '';
    $scope.direccion = '';
    $scope.email = '';
    $scope.modificarJugadorDiv = false;
    $scope.aniadirJugador = false;
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
    $scope.btnAniadir = function () {
        $scope.aniadirJugador = true;
        $scope.modificarJugadorDiv = false;
    }
    $scope.aniadir = function () {
       
        var idEquipo = -1;
        if ($scope.rol == "Top laner" || $scope.rol == "Jungler" || $scope.rol == "Mid laner" || $scope.rol == "Bot laner" || $scope.rol == "Support") {
            idEquipo = 1;
        } else if ($scope.rol == "AWPer" || $scope.rol == "Rifle") {
            idEquipo = 2;
        } else {
            idEquipo = 3;
        }

        if ($scope.nombre == "") {
            alert("Escribe un nombre por favor");
        } else if ($scope.nickname == "") {
            alert("escribe un nickname por favor");
        } else if ($scope.apellido == "") {
            alert("escribe un apellido por favor");
        } else if ($scope.dni == "") {
            alert("necesitamos tu dni por favor");
        } else if ($scope.fechaNacimiento == "") {
            alert("escribe en qué día naciste por favor");
        } else if ($scope.numTel == "") {
            alert("necesitamos tu teléfono para contactar contigo");
        } else if ($scope.rol == "") {
            alert("tienes que elegir un rol por favor");
        } else if ($scope.direccion == "") {
            alert("Escribe tu dirección por favor");
        } else if ($scope.email == "") {
            alert("Escribe tu email por favor");
        } else {
            fechaElegida = new Date($scope.fechaNacimiento);
            fechaActual = new Date();
            diff = new Date(fechaActual - fechaElegida);
            años = (days = diff / 1000 / 60 / 60 / 24 / 30 / 12);
            diffint = parseInt(años);
            if (diffint <= 0) {
                alert("Tu fecha de nacimiento, no concuerda con nuestras exigencias, por favor, no pongas la fecha actual o que vayas a nacer");
            } else if (diffint < 16) {
                alert("No fichamos a menores de 16 años");
            } else {
                mes = fechaElegida.getMonth() + 1;
                fecha = fechaElegida.getFullYear() +"-"+ mes + "-" + fechaElegida.getDate();
                var insertDatos = { 
                    nombre: $scope.nombre, 
                    nickname: $scope.nickname, 
                    apellido: $scope.apellido, dni: $scope.dni, fechaNacimiento: fecha, numTel: $scope.numTel, rol: $scope.rol, direccion: $scope.direccion, email: $scope.email, activo: 0, idEquipo: idEquipo };
                //En la llamada de http para el insert en params llamarlo dataJugador
                var insertJson = JSON.stringify(insertDatos);
                $http({
                    method: "get",
                    url: "../controller/cInsertJugador.php",
                    params: { dataJugador: insertJson }
                }).then(function (response) {
                    console.log(response);
                    // $scope.jugador.push(id:response.id)
                    location.reload();
                }, function myError(response) {
                    $scope.jugador = response.statusText;
                    console.log(response.statusText);
                });
            }
        }



        //for (i=0;i<= 9;i++ ){
        //fechaString += $scope.fechaNacimiento;
        //}


    }

    $scope.modificar = function (item) {
        $scope.aniadirJugador = false;
        $scope.datos = [];
        $scope.modificarJugadorDiv = true;
        console.log(item);
        $scope.datos.id = item.id;
        $scope.datos.nombre = item.nombre;
        $scope.datos.nickname = item.nickname;
        $scope.datos.apellido = item.apellido;
        $scope.datos.dni = item.dni;
        $scope.datos.fechaNacimiento = item.fechaNacimiento;
        $scope.datos.numTel = item.numTel;
        $scope.datos.rol = item.rol;
        $scope.datos.direccion = item.direccion;
        $scope.datos.email = item.email;
        $scope.datos.activo=item.activo;

    }

    $scope.modificarJugador = function () {
        var idEquipo = -1;
        if ($scope.rol == "Top laner" || $scope.rol == "Jungler" || $scope.rol == "Mid laner" || $scope.rol == "Bot laner" || $scope.rol == "Support") {
            idEquipo = 1;
        } else if ($scope.rol == "AWPer" || $scope.rol == "Rifle") {
            idEquipo = 2;
        } else {
            idEquipo = 3;
        }
        if ($scope.nombre == "") {
            alert("Escribe un nombre por favor");
        } else if ($scope.nickname == "") {
            alert("escribe un nickname por favor");
        } else if ($scope.apellido == "") {
            alert("escribe un apellido por favor");
        } else if ($scope.dni == "") {
            alert("necesitamos tu dni por favor");
        } else if ($scope.fechaNacimiento = "") {
            alert("escribe en qué día naciste por favor");
        } else if ($scope.numTel == "") {
            alert("necesitamos tu teléfono para contactar contigo");
        } else if ($scope.rol == "") {
            alert("tienes que elegir un rol por favor");
        } else if ($scope.direccion == "") {
            alert("Escribe tu dirección por favor");
        } else if ($scope.email == "") {
            alert("Escribe tu email por favor");
        } else {
            fechaElegida = new Date($scope.datos.fechaNacimiento);
            fechaActual = new Date();
            diff = new Date(fechaActual - fechaElegida);
            años = (days = diff / 1000 / 60 / 60 / 24 / 30 / 12);
            diffint = parseInt(diff);
            fecha = fechaElegida.getFullYear() +"-"+ mes + "-" + fechaElegida.getDate();
            if (diffint <= 0) {
                alert("Tu fecha de nacimiento, no concuerda con nuestras exigencias, por favor, no pongas la fecha actual o que vayas a nacer");
            } else if (diffint < 16) {
                alert("No fichamos a menores de 16 años");
            } else {
                $http({
                    method: "get",
                    url: "../controller/cModificarJugador.php",
                    params: { id: $scope.datos.id, nombre: $scope.datos.nombre, nickname: $scope.datos.nickname, apellido: $scope.datos.apellido, dni: $scope.datos.dni, fechaNacimiento:fecha, numTel: $scope.datos.numTel, rol: $scope.datos.rol, direccion: $scope.datos.direccion, email: $scope.datos.email, idEquipo:idEquipo}
                }).then(function () {
                    //location.reload();
                }, function myError(response) {
                    $scope.jugador = resopnse.statusText;
                });
            }
        }

    }


    $scope.borrar = function (x) {
        console.log(x);

        $http({
            method: "get",
            url: "../controller/cBorrarJugador.php",
            params: { id: x }
        }).then(function () {
            location.reload();
        }, function myError(response) {
            $scope.jugador = response.statusText;

        });
    }

    $scope.cancelar = function () {
        $scope.aniadirJugador = false;
        $scope.modificarJugadorDiv = false;
    }
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
    $scope.borrar = function (x) {
        console.log(x);

        $http({
            method: "get",
            url: "../controller/cBorrarCategoria.php",
            params: { id: x }
        }).then(function () {
            location.reload();
        }, function myError(response) {
            $scope.jugador = response.statusText;

        });
    }
});

miAplicacion.controller('mensaje', function ($scope, $http) {

    $scope.mensaje = [];
    $http({
        method: "get",
        url: "../controller/cAdminMensaje.php",
    }).then(function mySucces(result) {
        console.log(result);
        //alert(result.data);
        $scope.mensaje = result.data;
    }, function myError(response) {
        $scope.mensaje = response.statusText;

    });
    $scope.borrar = function (x) {
        console.log(x);

        $http({
            method: "get",
            url: "../controller/cBorrarMensaje.php",
            params: { id: x }
        }).then(function () {
            location.reload();
        }, function myError(response) {
            $scope.jugador = response.statusText;

        });
    }
});

miAplicacion.controller('cuerpoTecnico', function ($scope, $http) {

    $scope.cuerpoTecnico = [];
    $http({
        method: "get",
        url: "../controller/cAdminCuerpoTecnico.php",
    }).then(function mySucces(result) {
        console.log(result);
        //alert(result.data);
        $scope.cuerpoTecnico = result.data;
    }, function myError(response) {
        $scope.cuerpoTecnico = response.statusText;

    });

    $scope.modificar = function (item) {
        $scope.datos = [];
        $scope.modificarCuerpoTecnicoDiv = true;
        console.log(item);
        $scope.datos.id = item.idCuerpoTecnico;
        $scope.datos.nombre = item.nombre;
        $scope.datos.apellido = item.apellido;
        $scope.datos.dni = item.dni;
        $scope.datosfechaNacimiento = item.fechaNacimiento;
        $scope.datos.numTel = item.numTel;
        $scope.datos.rol = item.rol;
        $scope.datos.direccion = item.direccion;
        $scope.datos.email = item.email;

    }

    $scope.btnModificar = function () {
        $http({
            method: "get",
            url: "../controller/cModificarCuerpoTecnico.php",
            params: { id: $scope.datos.idCuerpoTecnico, nombre: $scope.datos.nombre, apellido: $scope.datos.apellido, dni: $scope.datos.dni, fechaNacimiento: $scope.datos.fechaNacimiento, numTel: $scope.datos.numTel, rol: $scope.datos.rol, direccion: $scope.datos.direccion, email: $scope.datos.email },
        }).then(function mySucces() {
            location.reload();
        }), function myError(response) {
            $scope.cuerpoTecnico = response.statusText;
        }
    }
});