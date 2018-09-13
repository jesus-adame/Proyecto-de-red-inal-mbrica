<?php
include_once 'conexion.class.php';
include 'rep_prop_switchs.php';
include 'protect.php';
Conexion::abrirConexion();

$id_switch = $_POST['id'];
$destino = $_SERVER['DOCUMENT_ROOT'].'/wifi/imagenes/switchs/';

if (empty($_FILES['imagen']['name'])) {
  $imagen_name = '';
} else {
  $imagen_name = $_FILES['imagen']['name'];
  $imagen_size = $_FILES['imagen']['size'];
  $imagen_type = $_FILES['imagen']['type'];

  /* Se busca el archivo antiguo */
  $old_data = mysqli_query(Conexion::getConexion(), "SELECT imagen FROM prop_switchs WHERE id_switch = '$id_switch';");
  $old_file = mysqli_fetch_array($old_data);
  /* Se elimina el archivo antiguo */
  if ($old_file['imagen']) {
    unlink($destino.$old_file['imagen']);
  }
}
/* Se crea el objeto PropSwitchs */
$prop_sw = new PropSwitchs(
  $imagen_name,
  $_POST['sumistack'],
  $_POST['xgm3'],
  $_POST['xgm3sb'],
  $_POST['sfp'],
  $_POST['vim']
);
/* Se insertan los datos */
$insertar = $prop_sw-> editar(Conexion::getConexion(), $id_switch);

if ($insertar) {
  /* Se agrega el nuevo archivo */
  move_uploaded_file($_FILES['imagen']['tmp_name'], $destino.$imagen_name);

  echo '<script>
  window.history.go(-2);
  alert("Datos actualizados exitosamente");
  </script>';
} else {
  echo '<script>
  alert("No se pudo editar");
  window.history.go(-1);
  </script>';
}
Conexion::cerrarConexion();
?>
