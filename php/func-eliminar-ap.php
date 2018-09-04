<?php
  include 'conexion.class.php';
  include 'protect.php';
  $id_ap = $_GET['id'];
  $inv = $_GET['i'];
  $destino = $_SERVER['DOCUMENT_ROOT'].'/wifi/imagenes/edificios/';
  Conexion::abrirConexion();

  $old_data = mysqli_query(Conexion::getConexion(), "SELECT imagen FROM propiedades WHERE id_inventario = $inv");
  $old_file = mysqli_fetch_array($old_data);
  if ($old_file['imagen'] =! ('' || 1)) {
    unlink($destino.$old_file['imagen']);
  }

  $eliminar = "DELETE FROM accesspoints WHERE id_ap = '$id_ap'";
  $resultado = mysqli_query(Conexion::getConexion(), $eliminar);

  if ($resultado) {
    echo "<script>
    window.history.go(-1);
    alert('Se eliminó correctamente');
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
