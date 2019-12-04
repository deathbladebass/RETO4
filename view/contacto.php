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
</head>
<body>
<div class="background-contacto">
  <nav class="blue darken-4" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="#" class="brand-logo"><img src="img/paradox.png" width="13%"></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="#" class="white-text">Navbar Link</a></li>
      </ul>

      <ul id="nav-mobile" class="sidenav">
        <li><a href="#">Navbar Link</a></li>
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  <h1 class="center-align">FORMULARIO DE CONTACTO</h1>
  <div class="grid-container">
    <div class="grid-nombre">      
		<strong>Nombre: </strong><input type="text" name="fnombre">
    </div>
    <div class="grid-email">      
		<strong>Email: </strong><input type="text" name="femail">
    </div>
    <div class="grid-tipo">      
		<strong>Tipo:</strong> 
		<select name="ftipo">
  			<option value="sugerencia">Sugerencia</option>
  			<option value="queja">Queja</option>
  			<option value="comentario">Comentario</option>
		</select>
    </div>
    <div class="grid-asunto">      
		<strong>Asunto:</strong> <input type="text" name="fasunto">
    </div>
    <div class="grid-mensaje">      
		<strong>Mensaje:</strong><br> <textarea name="fmensaje"></textarea>
    </div>
    <div class="grid-submit">      
		<button name="fsubmit" class="waves-effect waves-light btn blue darken-4">Enviar</button>
    </div>
  </div>

  <footer class="page-footer blue darken-4">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Company Bio</h5>
          <p class="grey-text text-lighten-4">We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.</p>


        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Settings</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Connect</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      Made by <a class="brown-text text-lighten-3" href="http://materializecss.com">Materialize</a>
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