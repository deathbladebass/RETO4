<?php 
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Inicio</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="view/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="view/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <script src="https://kit.fontawesome.com/661afcc94b.js"></script>
  <link rel="shortcut icon" type="image/png" href="view/img/paradox.png"/>
  
</head>
<body>
<!-- <h1><?php echo $_SESSION["username"]; ?></h1> -->
  <nav class="blue darken-4" role="navigation">
    <div class="nav-wrapper container ">
      <a id="logo-container" href="#" class="brand-logo"><img src="view/img/paradox.png" width="130px"></a>
      <ul class="right hide-on-med-and-down">
        <li><a class="white-text waves-effect waves-light modal-trigger" href="#modalRegistrar">Registrarse</a></li>
        <li><a class="white-text waves-effect waves-light modal-trigger" href="#modalLogin">Log in</a></li>
    	<li>
        <a class="white-text dropdown-trigger waves-effect waves-light " href="#" data-target='dropdown1'>Opciones</a>
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
	
	 <!-- Modal Login -->

  <div id="modalLogin" class="modal">
    <div class="modal-content">
      <h4>LOGIN</h4>
      <p>Introduzca su usuario y contraseña</p>
      <!--  usuario -->
      <div class="row">
        <div class="input-field col s12">
          <input id="usuario" type="text" class="validate">
          <label for="usuario">Usuario</label>
        </div>
      </div>
      <!--  contrasena -->
      <div class="row">
        <div class="input-field col s12">
          <input id="pass" type="password" class="validate">
          <label for="pass">Contraseña</label>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button id="btnLogin" class="modal-close waves-effect waves-green btn-flat">Login</button>
    </div>
  </div>
  
  
  <!--              Modal Register                  -->
  
  <div id="modalRegistrar" class="modal">
    <div class="modal-content">
      <h4>REGISTRO</h4>
      <p>Introduzca sus datos</p>
      <!--  usuario -->
      <div class="row">
        <div class="input-field col s12">
          <input id="usuarioReg" type="text" class="validate">
          <label for="usuario">Usuario</label>
        </div>
      </div>
      <!--  nombre -->
      <div class="row">
        <div class="input-field col s12">
          <input id="nombreReg" type="text" class="validate">
          <label for="nombreReg">Nombre</label>
        </div>
      </div>
      <!--  apellido -->
      <div class="row">
        <div class="input-field col s12">
          <input id="apellidoReg" type="text" class="validate">
          <label for="apellidoReg">Apellido</label>
        </div>
      </div>
      <!--  contraseña -->
      <div class="row">
        <div class="input-field col s12">
          <input id="passReg" type="password" class="validate">
          <label for="passReg">Contraseña</label>
        </div>
      </div>
      <!--  email -->
      <div class="row">
        <div class="input-field col s12">
          <input id="emailReg" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" class="validate">
          <label for="emailReg">Email</label>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button id="btnRegistrar" class="modal-close waves-effect waves-green btn-flat">Registrar</button>
    </div>
  </div>
  <!--              Fin Modal Register                  -->
  
	<!--              Carrousel                  -->
	<div class="container">
 		<div class="carousel carousel-slider">
    		<a class="carousel-item" href="#one!"><img class="tamanoImagen" src="view/img/carrousel1.jpg" ></a>
    		<a class="carousel-item" href="#two!"><img class="tamanoImagen" src="view/img/carrousel2.jpg"></a>
    		<a class="carousel-item" href="#three!"><img class="tamanoImagen" src="view/img/carrousel3.jpg"></a>
    		<a class="carousel-item" href="#four!"><img class="tamanoImagen" src="view/img/carrousel4.jpg"></a>
  		</div>
  	</div>
	<!--             Fin  Carrousel                  -->

     <!--             Cards datos                  -->
  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center brown-text"><img src="view/img/iconoGamepad.png" width="50px"></h2>
            <h5 class="center">¿Qué son los E-sports?</h5>

            <p class="light">
 			Competiciones de videojuegos que se han convertido en eventos de gran popularidad. Por lo general los 
 			deportes electrónicos son competiciones de videojuegos multijugador, particularmente entre jugadores 
 			profesionales. Los géneros más comunes en los videojuegos asociados a los esports son: estrategia en 
 			tiempo real, disparos en primera persona y arenas de batalla multijugador online (mejor conocido por 
 			sus siglas en inglés MOBA,
 			</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center brown-text"><img src="view/img/iconoLol.svg"></h2>
            <h5 class="center">¿Qué es el League of legends?</h5>

            <p class="light">League of Legends es un juego competitivo en línea de ritmo frenético, que fusiona la 
            velocidad y la intensidad de la estrategia en tiempo real (ETR) con elementos de juegos de rol. Dos 
            equipos de poderosos campeones, cada uno con un diseño y estilo de juegos únicos, compiten cara a cara
             a través de diversos campos de batalla y modos de juego.</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center brown-text"><img class="iconoColor" src="view/img/iconoCS.svg"></h2>
            <h5 class="center">¿Qué es el CS:GO?</h5>

            <p class="light">Counter-Strike: Global Offensive (CS:GO) es un videojuego de disparos en primera persona
             desarrollado por Valve Corporation en cooperación con Hidden Path Entertainment, y es el cuarto juego 
             de la saga Counter-Strike, sin contar Counter-Strike: Online. Fue lanzado al mercado el 21 de agosto de
             2012 para las plataformas de Microsoft Windows, Mac OS X y Xbox 360, mientras que sufrió un retraso en 
             PlayStation 3.</p>
          </div>
        </div>
      </div>

    </div>
  </div>
  <!--             Fin Cards datos                  -->

	<!--             Imagen Con video                  -->
  <div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
      <div class="container">
        <div class="row center">
          <video class="responsive-video" controls>
    		<source src="view/video/eSportTournament.mp4" type="video/mp4">
  		</video>
        </div>
      </div>
    </div>
    <div class="parallax"><img src="view/img/world.jpg" alt="Unsplashed background img 2"></div>
  </div>
  <!--             Fin Imagen Con video                  -->

	<!--             Nuestros equipos                  -->
  <div class="container">
    <p class="col s12 "><h4 class="center-align light">Nuestros equipos</h4></p>

      <div id="equipos" class="row">
    </div>
  </div>
	<!--             Fin Nuestros equipos                  -->

    <!--             Slogan                  -->
  <div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
      <div class="container">
        <div class="row center">
          <h3 class="header col s12 text-pink darken-4">¡En Paradox Forjamos las victorias!</h3>
        </div>
      </div>
    </div>
    <div class="parallax"><img src="view/img/world.jpg" alt="Unsplashed background img 3"></div>
  </div>
  <!--             Fin Slogan                  -->


<!--             Footer                  -->
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
  <!--             Fin Footer                  -->


  <!--  Scripts-->
  <!-- JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="view/js/materialize.js"></script>
  <script src="view/js/init.js"></script>
  <script src="view/js/index.js"></script>

  </body>
</html>
