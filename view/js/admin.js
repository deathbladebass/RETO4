var fecha = "", categorias = [];
var miAplicacion = angular.module('miAplicacion', []);
miAplicacion.controller('equipo', function ($scope, $http) {
	var PHPSESSID=localStorage.getItem('PHPSESSID');
	$http({
        method: "get",
        params: {PHPSESSID:PHPSESSID || ''},
		url: "http://uno.fpz1920.com/Reto4/controller/cNav.php",
	}).then(function mySuccess(result){
		var user=result.data;
		
		if(user.tipoUsu==0){
			window.location.replace("../index.html");
		}
	});
	
    $scope.equipo = [];
    $scope.nombre = "";
    $scope.categoria = [];
    $http({
        method: "get",
        url: "http://uno.fpz1920.com/Reto4/controller/cAdminCategoria.php",
    }).then(function mySucces(result) {


        $scope.categoria = result.data;
        console.log($scope.categoria);
    }), function myError(response) {
        $scope.categoria = response.statusText;



    }
    $http({
        method: "get",
        url: "http://uno.fpz1920.com/Reto4/controller/cAdminEquipo.php",
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
            url: "http://uno.fpz1920.com/Reto4/controller/cBorrarEquipo.php",
            params: { id: x }
        }).then(function () {
            location.reload();
        }, function myError(response) {
            $scope.jugador = response.statusText;

        });
    }
    $scope.modificar = function (item) {
        $scope.modificarEquipoDiv = true;
        $scope.nombre = item.nombreEquipo;
        $scope.idEquipo = item.idEquipo;
        $scope.idCategoria = item.idCategoria;
        $scope.nombreCategoria = item.objCategoria.nombre;
    }
    $scope.cancelar = function () {
        $scope.modificarEquipoDiv = false;
    }
    $scope.modificarEquipo = function () {

        num = -1
        console.log($scope.categoria);
        for (i in $scope.categoria) {
            if ($scope.nombreCategoria == $scope.categoria[i].nombreCategoria) {
                num = $scope.categoria[i].idCategoria;
            }
        }
        if (num != -1) {
            $http({
                method: "get",
                url: "http://uno.fpz1920.com/Reto4/controller/cModificarEquipo.php",
                params: { nombre: $scope.nombre, categoria: num, id: $scope.idEquipo }
            }).then(function (response) {

                location.reload();

            }, function myError(response) {
                $scope.equipo = response.statusText;

            });
        } else {
            alert("Te equivocaste al escribir el nombre de la categoría, prueba escribiéndo la primera letra de cada palabra en mayúsculas");
        }
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
        url: "http://uno.fpz1920.com/Reto4/controller/cAdminJugador.php",
    }).then(function mySucces(result) {
        console.log(result);
        $scope.jugador = result.data;
    }, function myError(response) {
        $scope.jugador = response.statusText;

    });
    $scope.btnAniadir = function () {
        $scope.aniadirJugador = true;
        $scope.modificarJugadorDiv = false;
    }
    $scope.aniadir = function () {
        var re = /\S+@\S+\.\S+/;
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
        } else if (re.test($scope.email)) {
            alert("Tu email no es correcto, vuelve a intentarlo");
        } else {
            fechaElegida = new Date($scope.fechaNacimiento);
            fechaActual = new Date();
            diff = new Date(fechaActual - fechaElegida);
            años = (days = diff / 1000 / 60 / 60 / 24 / 30 / 12);
            diffint = parseInt(años);
            if (diffint <= 0) {
                alert("Tu fecha de nacimiento, no concuerda con nuestras exigencias, por favor, pon tu verdadera fecha de nacimiento");
            } else if (diffint < 16) {
                alert("No fichamos a menores de 16 años");
            } else if (diffint >= 100) {
                alert("Eres demasiado mayor");
            } else {
                mes = fechaElegida.getMonth() + 1;
                fecha = fechaElegida.getFullYear() + "-" + mes + "-" + fechaElegida.getDate();
                var insertDatos = {
                    nombre: $scope.nombre,
                    nickname: $scope.nickname,
                    apellido: $scope.apellido, dni: $scope.dni, fechaNacimiento: fecha, numTel: $scope.numTel, rol: $scope.rol, direccion: $scope.direccion, email: $scope.email, idEquipo: idEquipo
                };
                //En la llamada de http para el insert en params llamarlo dataJugador
                var insertJson = JSON.stringify(insertDatos);
                $http({
                    method: "get",
                    url: "http://uno.fpz1920.com/Reto4/controller/cInsertJugador.php",
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
        $scope.datos.activo = item.activo;

    }

    $scope.modificarJugador = function () {
        var idEquipo = -1;
        var re = /\S+@\S+\.\S+/;
        if ($scope.datos.rol == "Top laner" || $scope.datos.rol == "Jungler" || $scope.datos.rol == "Mid laner" || $scope.datos.rol == "Bot laner" || $scope.datos.rol == "Support") {
            idEquipo = 1;
        } else if ($scope.datos.rol == "AWPer" || $scope.datos.rol == "Rifle") {
            idEquipo = 2;
        } else {
            idEquipo = 3;
        }
        if ($scope.datos.nombre == "") {
            alert("Escribe un nombre por favor");
        } else if ($scope.datos.nickname == "") {
            alert("escribe un nickname por favor");
        } else if ($scope.datos.apellido == "") {
            alert("escribe un apellido por favor");
        } else if ($scope.datos.dni == "") {
            alert("necesitamos tu dni por favor");
        } else if ($scope.datos.fechaNacimiento == "") {
            alert("escribe en qué día naciste por favor");
        } else if ($scope.datos.numTel == "") {
            alert("necesitamos tu teléfono para contactar contigo");
        } else if ($scope.datos.rol == "") {
            alert("tienes que elegir un rol por favor");
        } else if ($scope.datos.direccion == "") {
            alert("Escribe tu dirección por favor");
        } else if ($scope.datos.email == "") {
            alert("Escribe tu email por favor");
        } else if (re.test($scope.datos.email)) {
            alert("Tu email no es correcto, vuelve a intentarlo");
        } else {
            fechaElegida = new Date($scope.datos.fechaNacimiento);
            fechaActual = new Date();
            diff = new Date(fechaActual - fechaElegida);
            años = (days = diff / 1000 / 60 / 60 / 24 / 30 / 12);
            diffint = parseInt(años);
            mes = fechaElegida.getMonth() + 1;
            fecha = fechaElegida.getFullYear() + "-" + mes + "-" + fechaElegida.getDate();

            if (diffint <= 0) {
                alert("Tu fecha de nacimiento, no concuerda con nuestras exigencias, por favor, pon tu verdadera fecha de nacimiento");
            } else if (diffint < 16) {
                alert("No fichamos a menores de 16 años");
            } else if (diffint >= 100) {
                alert("Eres demasiado mayor");
            } else {
                $http({
                    method: "get",
                    url: "http://uno.fpz1920.com/Reto4/controller/cModificarJugador.php",
                    params: { id: $scope.datos.id, nombre: $scope.datos.nombre, nickname: $scope.datos.nickname, apellido: $scope.datos.apellido, dni: $scope.datos.dni, fechaNacimiento: fecha, numTel: $scope.datos.numTel, rol: $scope.datos.rol, direccion: $scope.datos.direccion, email: $scope.datos.email, idEquipo: idEquipo }
                }).then(function () {
                    location.reload();
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
            url: "http://uno.fpz1920.com/Reto4/controller/cBorrarJugador.php",
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
        url: "http://uno.fpz1920.com/Reto4/controller/cAdminCategoria.php",
    }).then(function mySucces(result) {
        console.log(result);
        $scope.categoria = result.data;
        categorias.push($scope.categoria.nombreCategoria);
    }, function myError(response) {
        $scope.categoria = response.statusText;

    });
    $scope.borrar = function (x) {
        console.log(x);

        $http({
            method: "get",
            url: "http://uno.fpz1920.com/Reto4/controller/cBorrarCategoria.php",
            params: { id: x }
        }).then(function () {
            location.reload();
        }, function myError(response) {
            $scope.jugador = response.statusText;

        });
    }
    $scope.modificar = function (item) {
        $scope.modificarCategoriaDiv = true;
        $scope.nombre = item.nombreCategoria;
        $scope.id = item.idCategoria;
        $scope.abreviatura = item.abreviatura;
    }
    $scope.modificarCategoria = function () {
        $http({
            method: "get",
            url: "http://uno.fpz1920.com/Reto4/controller/cModificarCategoria.php",
            params: { id: $scope.id, nombre: $scope.nombre, abreviatura: $scope.abreviatura },
        }).then(function () {
            location.reload();
        }, function myError(response) {
            $scope.jugador = response.statusText;

        });
    }
    $scope.cancelar = function () {
        $scope.modificarCategoriaDiv = false;
    }
});

miAplicacion.controller('mensaje', function ($scope, $http) {
    $scope.id = "";
    $scope.nombre = "";
    $scope.tipo = "";
    $scope.mensajeAngular = "";
    $scope.email = "";
    $scope.asunto = "";
    $scope.mensaje = [];
    $http({
        method: "get",
        url: "http://uno.fpz1920.com/Reto4/controller/cAdminMensaje.php",
    }).then(function mySucces(result) {
        console.log(result);
        $scope.mensaje = result.data;
    }, function myError(response) {
        $scope.mensaje = response.statusText;

    });
    $scope.borrar = function (x) {
        console.log(x);

        $http({
            method: "get",
            url: "http://uno.fpz1920.com/Reto4/controller/cBorrarMensaje.php",
            params: { id: x }
        }).then(function () {
            location.reload();
        }, function myError(response) {
            $scope.jugador = response.statusText;

        });
    }
    $scope.modificar = function (x) {
        $scope.modificarMensajeDiv = true;
        $scope.id = x.idMensaje;
        $scope.nombre = x.nombre;
        $scope.fechaMensaje = x.fecha;
        $scope.tipo = x.tipo;
        $scope.mensajeAngular = x.mensaje;
        $scope.email = x.email;
        $scope.asunto = x.asunto;
    }
    $scope.cancelar = function () {
        $scope.modificarMensajeDiv = false;
    }
    $scope.modificarMensaje = function () {
        fecha = new Date($scope.fechaMensaje);
        mes = fecha.getMonth() + 1;
        fechaString = fecha.getFullYear() + "-" + mes + "-" + fecha.getDate();
        fechaActual = new Date();
        diff = new Date(fechaActual - fecha);
        años = (days = diff / 1000 / 60 / 60 / 24 / 30 / 12);
        diffint = parseInt(años);
        if (fecha.getFullYear()==fechaActual.getFullYear()&&fecha.getMonth()==fechaActual.getMonth()&& fechaActual.getDate()<fecha.getDate()) {
            alert("Pon una fecha que ya haya pasado por favor");
        }else if(fechaActual.getFullYear()<fecha.getFullYear()){
            alert("Pon una fecha que ya haya pasado por favor");
        }else {
            $http({
                method: "get",
                url: "http://uno.fpz1920.com/Reto4/controller/cModificarMensaje.php",
                params: { id: $scope.id, nombre: $scope.nombre, tipo: $scope.tipo, mensaje: $scope.mensajeAngular, email: $scope.email, fecha: fechaString, asunto: $scope.asunto },
            }).then(function () {
                location.reload();
            }, function myError(response) {
                $scope.jugador = response.statusText;

            });
        }
    }
});

miAplicacion.controller('cuerpoTecnico', function ($scope, $http) {

    $scope.cuerpoTecnico = [];
    $http({
        method: "get",
        url: "http://uno.fpz1920.com/Reto4/controller/cAdminCuerpoTecnico.php",
    }).then(function mySucces(result) {
        console.log(result);
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
        $scope.fechaNacimiento = item.fecha;
        $scope.datos.numTel = item.numTel;
        $scope.datos.rol = item.rol;
        $scope.datos.direccion = item.direccion;
        $scope.datos.email = item.email;

    }

    $scope.modificarCuerpoTecnico = function () {
        if ($scope.datos.nombre == "") {
            alert("Escribe un nombre por favor");
        } else if ($scope.datos.apellido == "") {
            alert("escribe un apellido por favor");
        } else if ($scope.datos.dni == "") {
            alert("necesitamos tu dni por favor");
        } else if ($scope.fechaNacimiento == "") {
            alert("escribe en qué día naciste por favor");
        } else if ($scope.datos.numTel == "") {
            alert("necesitamos tu teléfono para contactar contigo");
        } else if ($scope.datos.rol == "") {
            alert("tienes que elegir un rol por favor");
        } else if ($scope.datos.direccion == "") {
            alert("Escribe tu dirección por favor");
        } else if ($scope.datos.email == "") {
            alert("Escribe tu email por favor");
        } else {
            fechaElegida = new Date($scope.fechaNacimiento);

            fechaActual = new Date();
            diff = new Date(fechaActual - fechaElegida);
            años = (days = diff / 1000 / 60 / 60 / 24 / 30 / 12);
            diffint = parseInt(años);
            mes = fechaElegida.getMonth() + 1;
            fecha = fechaElegida.getFullYear() + "-" + mes + "-" + fechaElegida.getDate();
            if (diffint <= 0) {
                alert("Tu fecha de nacimiento, no concuerda con nuestras exigencias, por favor, no pongas la fecha actual o que vayas a nacer");
            } else if (diffint < 16) {
                alert("No fichamos a menores de 16 años");
            } else if (diffint >= 100) {
                alert("Eres demasiado mayor");
            } else {
                $http({
                    method: "get",
                    url: "http://uno.fpz1920.com/Reto4/controller/cModificarCuerpoTecnico.php",
                    params: { id: $scope.datos.id, nombre: $scope.datos.nombre, apellido: $scope.datos.apellido, dni: $scope.datos.dni, fechaNacimiento: fecha, numTel: $scope.datos.numTel, rol: $scope.datos.rol, direccion: $scope.datos.direccion, email: $scope.datos.email },
                }).then(function mySucces() {
                    location.reload();
                }), function myError(response) {
                    $scope.cuerpoTecnico = response.statusText;
                }
            }
        }
    }
    $scope.borrar = function (x) {
        $http({
            method: "get",
            url: "http://uno.fpz1920.com/Reto4/controller/cBorrarCuerpoTecnico.php",
            params: { id: x }
        }).then(function () {
            location.reload();
        }, function myError(response) {
            $scope.jugador = response.statusText;

        });
    }
});
function validar(e) {
    var key = window.Event ? e.which : e.keyCode
    return (key >= 48 && key <= 57)
}
function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
    return pattern.test(emailAddress);
}
