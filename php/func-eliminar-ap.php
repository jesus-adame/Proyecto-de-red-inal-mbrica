<?php
  include 'conexion.class.php';
  include 'protect.php';
  include 'rep_ap.php';

  $ap = new Ap();

  $id_ap = $_GET['id'];
  $inv = $_GET['i'];
  Conexion::abrirConexion();

  $eliminarImagen = $ap-> eliminarImagen(Conexion::getConexion(), $inv);
  if ($eliminarImagen) {
    $resultado = $ap-> eliminar(Conexion::getConexion(), $id_ap);

    if ($resultado) {
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
  } else {
    echo "<script>
    alert('No se eliminó la imagen del AP del servidor');
    window.history.go(-1);
    </script>";
    exit;
  }


?>
