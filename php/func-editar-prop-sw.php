<?php
include_once 'conexion.class.php';
include 'protect.php';
Conexion::abrirConexion();

$id_switch = $_POST['id_switch'];
$destino = $_SERVER['DOCUMENT_ROOT'].'/wifi/imagenes/switchs/';

if (empty($_FILES['imagen']['name'])) {
  echo '<script>
  alert("Debes elegir una imagen.");
  window.history.go(-1);
  </script>';
} else {
  $imagen_name = $_FILES['imagen']['name'];
  $imagen_size = $_FILES['imagen']['size'];
  $imagen_type = $_FILES['imagen']['type'];

  $old_data = mysqli_query(Conexion::getConexion(), "SELECT imagen FROM prop_switchs WHERE id_switch = '$id_switch';");
  $old_file = mysqli_fetch_array($old_data);

  $insertar = "UPDATE prop_switchs SET imagen = '$imagen_name' WHERE id_switch = '$id_switch';";
  /* Ejecuta la consulta */
  $resultado = mysqli_query(Conexion::getConexion(), $insertar);

  if ($resultado) {
    /* Se elimina el archivo axtual y se agrega el nuevo */
    unlink($destino.$old_file['imagen']);
    move_uploaded_file($_FILES['imagen']['tmp_name'], $destino.$imagen_name);

    echo '<script>
    window.history.go(-2);
    alert("Datos actualizados exitosamente");
    </script>';
  } else {
    echo '<script>
    alert("El archivo es muy pesado.");
    window.history.go(-1);
    </script>';
  }
}

Conexion::cerrarConexion();
?>
