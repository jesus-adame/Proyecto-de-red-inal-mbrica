<?php
include 'constantes/constantes.php';
session_start();
if (!isset($_SESSION['usuario'])) {
  header('location: inicio.php'); // Evita el acceso a usuarios no identificados
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
    <script type="text/javascript" src="apps/jquery.js"></script>
    <script type="text/javascript" src="apps/fontawesome-all.min.js"></script>
  </head>
  <body class='main'>
    <header id="head">
      <div class="row" style="line-height: 50px">
        <a id="log" class="logo" href="index.php"><img src="imagenes/logo/UAEM.png" alt="UAEM"></a>
        <h1 id="tituloH1" class="titulo col-xs-2">Dirección de Tecnologías</h1>
        <a id="btn_menu" class="btn-menu" href="index.php"><strong>Inicio</strong></a>
        <nav class="" id="navbar">
          <ul>
            <li><a class="btn-nav" href="index.php"><i class="fas fa-home"></i></a></li>
            <li><a class="btn-nav" href="javascript:window.history.go(-1);">
              <i class="fas fa-arrow-alt-circle-left"></i></a>
            </li>
            <li><a class="btn-nav" href="javascript:window.history.go(+1);">
              <i class="fas fa-arrow-alt-circle-right"></i></a>
            </li>
          </ul>
        </nav>
      </div>
    </header>
