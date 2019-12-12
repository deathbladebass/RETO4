
<!DOCTYPE html>
<html lang="en" ng-app="miAplicacion">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Inicio</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <script src="https://kit.fontawesome.com/661afcc94b.js"></script>
  <script src="lib/angular.min.js" type="text/javascript"></script>
  <link rel="shortcut icon" type="image/png" href="view/img/paradox.png"/>
</head>
<body>
  <nav class="blue darken-4" role="navigation">
    <div class="nav-wrapper container ">
      <a id="logo-container" href="../index.html" class="brand-logo"><img src="img/paradox.png" width="130px"></a>
      <ul class="right hide-on-med-and-down">
        <li><a class="white-text" href="#!">Registrarse</a></li>
        <li><a class="white-text waves-effect waves-light btn modal-trigger" href="#modalLogin">Log in</a></li>
    	<li>
        <a class="white-text dropdown-trigger" href="#" data-target='dropdown1'>Opciones</a>
        </li>
        </ul>
        <!-- Dropdown Menu -->
        <ul id='dropdown1' class='dropdown-content'>
    		<li><a href="#!">Jugadores</a></li>
    		<li><a href="#!">Categorias</a></li>		
    		<li><a href="view/contacto.php">Sugerencias</a></li>
      	</ul>

      <ul id="nav-mobile" class="sidenav">
        <li><a href="#">Navbar Link</a></li>
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>
<!-- sidenav -->
  <ul id="slide-out" class="sidenav ">
  <div width="100%" class="center-align blue darken-4">  <img src="img/paradox.png" width="130px"></div>

    <li><a class="waves-effect" href="#!"><i class="material-icons">account_circle</i>Jugadores</a></li>
    <li><a class="waves-effect" href="#!"><i class="material-icons">list</i>Categorias</a></li>
    <li><a class="waves-effect" href="#!"><i class="material-icons">supervised_user_circle</i>Equipos</a></li>
    <li><div class="divider"></div></li>
    <li><a class="subheader">Links</a></li>
    <li><a class="waves-effect" href="#!">Third Link With Waves</a></li>
  </ul>
<!-- trigger sidenav -->

  <a class="btn-floating btn-large waves-effect waves-light blue darken-4 sidenav-trigger sidenavBoton" data-target="slide-out"><i class="material-icons">menu</i></a>
  
 
  
<!--   contenido -->
	<div class="container">
<div class="container" >
<div class="jugadores" ng-controller="jugadores">
<div ng-repeat="x in jugador">
<div class="col s12 m7">
    <h3 class="header">{{x.nombre}} "{{x.nickname}}" {{x.apellido}}</h3>
    <div class="card horizontal">
      <div class="card-image">
        <img src="https://lorempixel.com/100/190/nature/6">
      </div>
      <div class="card-stacked">
        <div class="card-content">
          <p>I am a very simple card. I am good at containing small bits of information.</p>
        </div>
        <div class="card-action">
          <a href="#">This is a link</a>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<div class="equipos" ng-controller="equipos">
<div ng-repeat="x in jugador">
</div>
</div>
<div class="categorias" ng-controller="categorias">
<div ng-repeat="x in jugador">
</div>
</div>
</div>
  <a class="btn-floating btn-large waves-effect waves-light blue darken-4 sidenav-trigger" data-target="slide-out"><i class="material-icons">menu</i></a>
>>>>>>> branch 'master' of https://github.com/deathbladebass/RETO4.git
	
	
	</div>
	
  <footer class="page-footer blue darken-4">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Sobre Nosotros</h5>
          <p class="grey-text text-lighten-4">
          	Paradox es un club de deportes electronicos de alta categoria, nos dedicamos a gestionar equipos en diferentes plataformas y videojuegos.
          	Forjamos nuestras victorias.
          
          
          </p>


        </div>
        <div class="col l6 s12">
          <h5 class="white-text">RRSS</h5>
          <ul>
            <a class="white-text iconosrrss" href="https://www.instagram.com/"><i class="fab fa-instagram fa-2x"></i></a>
            <a class="white-text iconosrrss" href="https://www.facebook.es/"><i class="fab fa-facebook-square fa-2x"></i></a>
            <a class="white-text iconosrrss" href="https://www.twitter.com/"><i class="fab fa-twitter-square fa-2x"></i></a>
            <a class="white-text iconosrrss" href="https://www.youtube.es/"><i class="fab fa-youtube-square fa-2x"></i></a>
            <a class="white-text iconosrrss" href="https://twitch.tv/"><i class="fab fa-twitch fa-2x"></i></a>
            <a class="white-text iconosrrss" href="https://discordapp.com/"><i class="fab fa-discord fa-2x"></i></a>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright blue darken-4">
      <div class="container center-align">
      <i class="far fa-copyright"></i>Grupo 1 2019
      </div>
    </div>
  </footer>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
  <script src="js/jugadoresCategorias.js"></script>

  </body>
</html>