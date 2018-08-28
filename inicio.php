<?php
session_start();
if (isset($_SESSION['usuario'])) {
  header('location: index.php');
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Red UAEM</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/master.css">
    <link rel="stylesheet" href="css/fa-svg-with-js.css">
  </head>

  <body class='main'>
    <header>
      <div class="row" style="line-height:50px">
        <img class="logo" src="imagenes/logo/UAEM.png" alt="UAEM">
        <h1 class="titulo" style="margin-top:15px"> Dirección de Tecnologías</h1>
        <nav class="col-xs-3" id="navbar">
        </nav>
      </div>
    </header>

    <main class="wrapper contenido"><br><br>
      <form class="formulario box" action="php/inicio-sesion.php" method="POST">
        <h3>Acceso al sistema</h3>
        <label class="col-xs-1" for="usuario">Usuario <br>
          <input class="col-80" type="text" name="usuario">
        </label><br><br>
        <label class="col-xs-1" for="pass">Contraseña <br>
          <input class="col-80" type="password" name="pass" placeholder="*******">
        </label><br><br>
        <button class="boton success" type="submit" name="button">Ingresar</button>
      </form><br><br><br>
    </main>
    <footer></footer>
  </body>
</html>
