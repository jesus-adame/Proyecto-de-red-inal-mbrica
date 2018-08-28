<?php
include_once 'conexion.class.php';
include 'protect.php';

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
  Conexion::abrirConexion();
  /* Validar que no haya un registro repetido */
  $verificar_inventario = mysqli_query(Conexion::getConexion(), "SELECT * FROM prop-switchs WHERE id_switchs = '$id_switch';");

  if ($verificar_inventario) {
    echo "<script>
    alert('El Switch ya está registrado');
    window.history.go(-2);
    </script>";
    exit;
  } else {
    $insertar = "INSERT INTO prop_switchs (id_switch, imagen) VALUES ($id_switch, '$imagen_name');";
    $resultado = mysqli_query(Conexion::getConexion(), $insertar);

    if ($resultado) {
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
}

Conexion::cerrarConexion();
?>
