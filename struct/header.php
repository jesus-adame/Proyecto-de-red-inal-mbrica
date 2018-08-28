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
    <script type="text/javascript" src="apps/header.js"></script>
    <script type="text/javascript" src="apps/fontawesome-all.min.js"></script>
  </head>
  <body class='main'>
    <header>
      <div class="row" style="line-height: 50px">
        <a class="logo" href="index.php"><img src="imagenes/logo/UAEM.png" alt="UAEM"></a>
        <h1 class="titulo" style="margin-top: 15px">Dirección de Tecnologías</h1>
        <nav class="" id="navbar">
          <ul>
            <li><a class="btn-nav" href="index.php"><i class="fas fa-home"></i></a></li>
            <li><a class="btn-nav" href="javascript:window.history.go(-1);"><i class="fas fa-arrow-alt-circle-left"></i></a></li>
            <li><a class="btn-nav" href="javascript:window.history.go(+1);"><i class="fas fa-arrow-alt-circle-right"></i></a></li>
          </ul>
        </nav>
      </div>
    </header>
