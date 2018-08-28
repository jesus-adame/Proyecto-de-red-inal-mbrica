<?php
  include 'conexion.class.php';
  include 'protect.php';
  Conexion::abrirConexion();

  $id_edificio = $_GET['id_edificio'];
  $ruta = $_SERVER['DOCUMENT_ROOT'].'/wifi/imagenes/planos/';

  $old_file = mysqli_query(Conexion::getConexion(), "SELECT * FROM mapa_edificio WHERE id_edificio = '$id_edificio'");
  $mapa_name = mysqli_fetch_array($old_file);

  $eliminar = "DELETE FROM mapa_edificio WHERE id_edificio = '$id_edificio'";
  $execute = mysqli_query(Conexion::getConexion(), $eliminar);

  if (
    $execute ||
    unlink($ruta.$mapa_name['mapa']) ||
    unlink($ruta.$mapa_name['mapa2']) ||
    unlink($ruta.$mapa_name['mapa3'])
  ) {
    echo "<script>
    alert('Se eliminó correctamente');
    window.history.go(-1);
    </script>";
    exit;
  } else {
    echo "<script>
    alert('No se ha podido eliminar');
    window.history.go(-1);
    </script>";
    exit;
  }
?>
