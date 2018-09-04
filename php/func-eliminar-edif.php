<?php
  include 'conexion.class.php';
  include 'protect.php';
  Conexion::abrirConexion();

  $id = $_GET['id_edificio'];
  $destino = $_SERVER['DOCUMENT_ROOT'].'/wifi/imagenes/edificios/';

  $old_data = mysqli_query(Conexion::getConexion(), "SELECT img_edif FROM edificios WHERE id_edificio = $id");
  $old_file = mysqli_fetch_array($old_data);

  $eliminar = "DELETE FROM edificios WHERE id_edificio = '$id'";
  $resultado = mysqli_query(Conexion::getConexion(), $eliminar);

  if ($resultado) {
    unlink($destino.$old_file['img_edif']);
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
