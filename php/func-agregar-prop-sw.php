<?php
include_once 'conexion.class.php';
include 'protect.php';
include_once 'rep_prop_switchs.php';

Conexion::abrirConexion();
$id_switch = $_POST['id_switch'];
$destino = $_SERVER['DOCUMENT_ROOT'].'/wifi/imagenes/switchs/';

if (empty($_FILES['imagen']['name'])) {
  $imagen_name = '';
} else {
  $imagen_name = $_FILES['imagen']['name'];
  $imagen_size = $_FILES['imagen']['size'];
  $imagen_type = $_FILES['imagen']['type'];
}
/* Se crea el objeto PropSwitchs */
$prop_sw = new PropSwitchs(
  $imagen_name,
  $_POST['sumistack'],
  $_POST['xgm3'],
  $_POST['xgm3sb'],
  $_POST['sfp'],
  $_POST['vim'],
  $_POST['notas'],
  $_POST['parte']
);

/* Validar que no haya un registro repetido */
$verificar_inventario = mysqli_query(Conexion::getConexion(),
"SELECT * FROM prop_switchs WHERE id_switchs = '$id_switch';");

if ($verificar_inventario) {
  echo "<script>
  alert('El Switch ya está registrado');
  window.history.go(-2);
  </script>";
  exit;
} else {
  if ($_FILES['imagen']['name'] != '') {
    $subirImagen = move_uploaded_file($_FILES['imagen']['tmp_name'], $destino.$imagen_name);
  } else {
    $subirImagen = 1;
  }

  if ($subirImagen) {
    $insertar = $prop_sw-> insertar(Conexion::getConexion(), $id_switch);

    if ($insertar) {
      echo '<script>
      window.history.go(-2);
      alert("Datos actualizados exitosamente");
      </script>';
    } else {
      echo '<script>
      alert("Error al agregar Switch.");
      window.history.go(-1);
      </script>';
    }
  } else {
    echo '<script>
    alert("No se pudo subir la imagen.");
    window.history.go(-1);
    </script>';
  }
}
Conexion::cerrarConexion();
?>
