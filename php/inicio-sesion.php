<?php
include 'conexion.class.php';
session_start();
Conexion::abrirConexion();

$usuario = $_POST['usuario'];
$pass = $_POST['pass'];

$query = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND pass = '$pass'";
$execute = mysqli_query(Conexion::getConexion(), $query);
$row = mysqli_fetch_array($execute);

if ($row) {
  $_SESSION['usuario'] = $row['usuario'];
  $_SESSION['tipo'] = $row['tipo'];
  header('location: ../index.php');
  echo 'iniciando session...';
} else {
  echo "<script>
  alert('Usuario o contraseña no válidas');
  window.history.go(-1);
  </script>";
}

Conexion::cerrarConexion();
?>
