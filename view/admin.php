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

<body  ng-controller="informacion">
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
        <div class="header"><label>Equipo</label>
            <div class="buscador ">
                <form class="col s12 ">
                    <div class="row">
                        <div class="input-field col s12">
                            <input type="search" class="validate" placeholder="buscar Equipo...">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <table class="striped" >
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
                    <td><input type="button" value="borrar"></td>
                    <td><input type="button" value="modificar"></td>
                </tr>
            </tbody>
        </table>

        <div class="header"><label>Jugadores</label>
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
            <tbody ng-repeat="item in lista| filter:TEXTObusqueda">
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><input type="button" value="borrar"></td>
                    <td><input type="button" value="modificar"></td>
                </tr>
            </tbody>
        </table>

        <div class="header"><label>cuerpo técnico</label>
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
            <tbody ng-repeat="item in lista| filter:TEXTObusqueda">
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><input type="button" value="borrar"></td>
                    <td><input type="button" value="modificar"></td>
                </tr>
            </tbody>
        </table>

        <div class="header"><label>Categorías</label>
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
        <table class="striped">
            <thead>
                <td>nombre</td>
            </thead>
            <tbody ng-repeat="item in lista| filter:TEXTObusqueda">
                <tr>
                    <td></td>
                    <td><input type="button" value="borrar"></td>
                    <td><input type="button" value="modificar"></td>
                </tr>
            </tbody>
        </table>

        <div class="header"><label>Comentarios</label>
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
        <table class="striped">
            <thead>
                <td>tipo</td>
                <td>nombre</td>
                <td>mensaje</td>
            </thead>
            <tbody ng-repeat="item in lista| filter:TEXTObusqueda">
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><input type="button" value="borrar"></td>
                    <td><input type="button" value="modificar"></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>