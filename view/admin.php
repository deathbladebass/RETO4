<!DOCTYPE html>
<html lang="en" ng-app="miAplicacion">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link rel="stylesheet" href="css/admin.css">
    <script src="lib/angular.min.js" type="text/javascript"></script>
    <script src="js/admin.js" type="text/javascript"></script>
    <title>Document</title>
</head>

<body>
    <nav class="blue darken-4" role="navigation">
        <div class="nav-wrapper container">
            <a id="logo-container" href="#" class="brand-logo">Logo</a>
            <ul class="right hide-on-med-and-down">
                <li><a href="#">Navbar Link</a></li>
            </ul>

            <ul id="nav-mobile" class="sidenav">
                <li><a href="#">Navbar Link</a></li>
            </ul>
            <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        </div>
    </nav>
    <div class="container">
        <div ng-controller="equipo">
            <div class="header"><label>Equipo</label>
                <form class="col s12 ">
                    <div class="row">
                        <div class="input-field col s12">
                            <input type="search" class="validate" placeholder="buscar Equipo...">
                        </div>
                    </div>
                </form>
            </div>
            <table class="striped">
                <thead>
                    <tr>
                        <td>nombre</td>
                        <td>Categoría</td>
                        <td>abreviatura</td>
                    </tr>
                </thead>
                <tbody ng-repeat="item in equipo">
                    <tr>
                        <td>{{item.nombreEquipo}}</td>
                        <td>{{item.objCategoria.nombre}}</td>
                        <td>{{item.objCategoria.abreviatura}}</td>
                        <td><input class="waves-effect waves-light btn blue darken-3" ng-click="borrar(item.idEquipo)"
                                type="button" value="borrar"></td>
                        <td><input class="waves-effect waves-light btn blue darken-3" type="button" value="modificar">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- Jugadores -->
        <div ng-controller="jugador">
            <div class="header"><label>Jugadores</label>
                <input class="waves-effect waves-light btn blue darken-3" type="button" value="añadir jugador"
                    ng-click="btnAniadir()">
                <div class="buscador">
                    <div class="row">
                        <form class="col s12 ">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input type="search" class="validate" placeholder="buscar...">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Tabla Usuarios -->
            <table class="striped">
                <thead>
                    <tr>
                        <td>Nombre</td>
                        <td>Nickname</td>
                        <td>apellido</td>
                        <td>DNI</td>
                        <td>fecha de nacimiento</td>
                        <td>número de teléfono</td>
                        <td>rol del jugador</td>
                        <td>dirección</td>
                        <td>email</td>
                        <td>activo</td>
                    </tr>
                </thead>
                <tbody ng-repeat="item in jugador">
                    <tr>
                        <td>{{item.nombre}}</td>
                        <td>{{item.nickname}}</td>
                        <td>{{item.apellido}}</td>
                        <td>{{item.dni}}</td>
                        <td>{{item.fechaNacimiento}}</td>
                        <td>{{item.numTel}}</td>
                        <td>{{item.rol}}</td>
                        <td>{{item.direccion}}</td>
                        <td>{{item.email}}</td>
                        <td>{{item.activo}}</td>
                        <td><input class="waves-effect waves-light btn blue darken-3" ng-click="borrar(item.id)"
                                type="button" value="borrar"></td>
                        <td><input class="waves-effect waves-light btn blue darken-3" type="button"
                                ng-click="modificar(item)" value="modificar"></td>
                    </tr>
                </tbody>
            </table>
            <!-- Añadir jugadores -->
            <div ng-show="aniadirJugador" class="anadirJugador">
                <input type="text" id="nombre" placeholder="nombre..." ng-model="nombre">
                <input type="text" id="nickname" placeholder="nickname..." ng-model="nickname">
                <input type="text" id="apellido" placeholder="apellido..." ng-model="apellido">
                <input type="text" id="dni" placeholder="DNI..." ng-model="dni">
                <div class="fecha">
                    <input type="text" id="fecha" name="trip-start" placeholder="YYYY-MM-DD" ng-model="fechaNacimiento">
                </div>
                <input type="text" id="numTel" placeholder="número teléfono..." ng-model="numTel">
                <select ng-model="rol" id="rol">
                    <option value="Top laner">Top laner</option>
                    <option value="Jungler">Jungler</option>
                    <option value="Mid laner">Mid laner</option>
                    <option value="Bot Laner">Bot laner</option>
                    <option value="Support">Support</option>
                    <option value="Rifle">Rifle</option>
                    <option value="AWPer">AWPer</option>
                </select>
                <input type="text" placeholder="dirección..." ng-model="direccion" id="direccion">
                <input type="text" placeholder="email..." ng-model="email" id="email">
                <input type="button" value="Añadir jugador" ng-click="aniadir()"
                    class="waves-effect waves-light btn blue darken-3" id="botonAgregar">
                <input type="button" value="cancelar" ng-click="cancelar()"
                    class="waves-effect waves-light btn blue darken-3" id="botonCancelar">
            </div>
            <!-- Modificar jugador -->
            <div ng-show="modificarJugadorDiv" class="modificarJugador">
                <input type="text" id="nombre" ng-model="datos.nombre">
                <input type="text" id="nickname" ng-model="datos.nickname">
                <input type="text" id="apellido" ng-model="datos.apellido">
                <input type="text" id="dni" ng-model="datos.dni">
                <div class="fecha">
                    <input type="text" id="fecha" name="trip-start" ng-model="fechaNacimiento">
                </div>
                <input type="text" id="numTel" ng-model="datos.numTel">
                <select ng-model="datos.rol" id="rol">
                    <option value="Top laner">Top laner</option>
                    <option value="Jungler">Jungler</option>
                    <option value="Mid laner">Mid laner</option>
                    <option value="Bot Laner">Bot laner</option>
                    <option value="Support">Support</option>
                    <option value="Rifle">Rifle</option>
                    <option value="AWPer">AWPer</option>
                </select>
                <input type="text" ng-model="datos.direccion" ng-model="direccion" id="direccion">
                <input type="text" ng-model="datos.email" id="email">
                <input type="button" value="modificar jugador" ng-click="modificarJugador()"
                    class="waves-effect waves-light btn blue darken-3" id="botonModificar">
                <input type="button" value="cancelar" ng-click="cancelar()"
                    class="waves-effect waves-light btn blue darken-3" id="botonCancelar">
            </div>

        </div>



        <!-- cuerpo técnico -->
        <div ng-controller="cuerpoTecnico">
            <div class="header"><label>cuerpo técnico</label>
                <div class="buscador">
                    <div class="row">
                        <form class="col s12 ">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input type="search" class="validate" placeholder="buscar...">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <table class="striped">
                <thead>
                    <td>nombre</td>
                    <td>apellido</td>
                    <td>DNI</td>
                    <td>fecha de nacimiento</td>
                    <td>número de teléfono</td>
                    <td>rol del cuerpo técnico</td>
                    <td>dirección</td>
                    <td>email</td>
                </thead>
                <tbody ng-repeat="item in cuerpoTecnico">
                    <tr>
                        <td>{{item.nombre}}</td>
                        <td>{{item.apellido}}</td>
                        <td>{{item.dni}}</td>
                        <td>{{item.fechaNacimiento}}</td>
                        <td>{{item.numTel}}</td>
                        <td>{{item.rol}}</td>
                        <td>{{item.direccion}}</td>
                        <td>{{item.email}}</td>
                        <td><input class="waves-effect waves-light btn blue darken-3" type="button" value="borrar"></td>
                        <td><input class="waves-effect waves-light btn blue darken-3" type="button"
                                ng-click="modificar(item)" value="modificar"></td>
                    </tr>
                </tbody>
            </table>
            <!-- Modificar cuerpo técnico -->
            <div ng-show="modificarCuerpoTecnicoDiv">
                <input type="text" ng-model="datos.nombre">
                <input type="text" ng-model="datos.apellido">
                <input type="text" ng-model="datos.dni">
                <div class="fecha">
                    <label>Fecha de Nacimiento</label>
                    <input type="date" id="fecha" name="trip-start" ng-model="datos.fechaNacimiento">
                </div>
                <input type="text" ng-model="datos.numTel">
                <select ng-model="datos.rol" id="rol">
                    <option value="Top laner">Top laner</option>
                    <option value="Jungler">Jungler</option>
                    <option value="Mid laner">Mid laner</option>
                    <option value="Bot Laner">Bot laner</option>
                    <option value="Support">Support</option>
                    <option value="Rifle">Rifle</option>
                    <option value="AWPer">AWPer</option>
                </select>
                <input type="text" ng-model="datos.numTel">
                <input type="text" ng-model="datos.email">
                <input type="button" value="modificar jugador" ng-click="modificarJugador()"
                    class="waves-effect waves-light btn blue darken-3" id="botonModificar">
                <input type="button" value="cancelar" ng-click="cancelar()"
                    class="waves-effect waves-light btn blue darken-3" id="botonCancelar">
            </div>
        </div>
        <div ng-controller="categoria">
            <div class="header"><label>Categorías</label>
                <div class="buscador">
                    <div class="row">
                        <form class="col s12 ">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input type="search" class="validate" placeholder="buscar...">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <table class="striped">
                <thead>
                    <td>nombre</td>
                    <td>abreviatura</td>
                </thead>
                <tbody ng-repeat="item in categoria">
                    <tr>
                        <td>{{item.nombreCategoria}}</td>
                        <td>{{item.abreviatura}}</td>
                        <td><input ng-click="borrar(item.idCategoria)"
                                class="waves-effect waves-light btn blue darken-3" type="button" value="borrar"></td>
                        <td><input class="waves-effect waves-light btn blue darken-3" type="button" value="modificar">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div ng-controller="mensaje">
            <div class="header"><label>Comentarios</label>
                <div class="buscador">
                    <div class="row">
                        <form class="col s12 ">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input type="search" class="validate" placeholder="buscar...">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <table class="striped">
                <thead>
                    <td>nombre</td>
                    <td>email</td>
                    <td>fecha</td>
                    <td>tipo</td>
                    <td>mensaje</td>
                </thead>
                <tbody ng-repeat="item in mensaje">
                    <tr>
                        <td>{{item.nombre}}</td>
                        <td>{{item.email}}</td>
                        <td>{{item.fecha}}</td>
                        <td>{{item.tipo}}</td>
                        <td>{{item.mensaje}}</td>
                        <td><input ng-click="borrar(item.idMensaje)" class="waves-effect waves-light btn blue darken-3"
                                type="button" value="borrar"></td>
                        <td><input class="waves-effect waves-light btn blue darken-3" type="button" value="modificar">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>