<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Contacto</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <script src="https://kit.fontawesome.com/661afcc94b.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Teko:300&display=swap" rel="stylesheet">
  <link rel="icon" type="image/png" href="img/paradox.png">
</head>
<body>
<div class="background-contacto">
  <nav class="blue darken-4" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="../index.php" class="brand-logo"><img src="img/paradox.png" width="130px"></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="#" class="white-text">Navbar Link</a></li>
      </ul>

      <ul id="nav-mobile" class="sidenav">
        <li><a href="#">Navbar Link</a></li>
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  <h1 class="center-align tituloContacto">FORMULARIO DE CONTACTO</h1>
  <div class="grid-container">
    <div class="grid-nombre">      
		<strong>Nombre: </strong><input type="text" id="fnombre" required >
    </div>
    <div class="grid-email">      
		<strong>Email: </strong><input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" id="femail" required >
    </div>
    <div class="grid-tipo">      
		<strong>Tipo:</strong> 
		<select id="ftipo">
  			<option value="sugerencia">Sugerencia</option>
  			<option value="queja">Queja</option>
  			<option value="comentario">Comentario</option>
		</select>
    </div>
    <div class="grid-asunto">      
		<strong>Asunto:</strong> <input type="text" id="fasunto" required >
    </div>
    <div class="grid-mensaje">      
		<strong>Mensaje:</strong><br> <textarea id="fmensaje" maxlength="200" required></textarea>
    </div>
    <div class="grid-submit">      
		<button id="fsubmit" class="waves-effect waves-light btn blue darken-4">Enviar</button>
    </div>
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
</div>

  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>
  <script src="js/contacto.js"></script>
  </body>
</html>