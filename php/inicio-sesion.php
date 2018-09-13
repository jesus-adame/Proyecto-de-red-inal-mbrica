<?php
include 'conexion.class.php';
include 'rep_usuario.php';
session_start();
Conexion::abrirConexion();

$usu = $_POST['usuario'];
$pass = $_POST['pass'];

$usuario = new Usuario($usu);
$execute = $usuario->iniciarSesion(Conexion::getConexion(), $pass);

if ($execute) {
  header('location: ../index.php');
  echo 'iniciando session...';
} else {
  echo "<script>
  alert('Usuario o contraseña no válidas');
  history.go(-1);
  </script>";
}

Conexion::cerrarConexion();
?>
