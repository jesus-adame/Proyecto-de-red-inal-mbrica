<?php
include 'php/conexion.class.php';

Conexion::abrirConexion();

if (Conexion::getConexion()){
  echo 1;
} else {
  echo 0;
}
?>
