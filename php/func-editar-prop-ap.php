<?php
include_once 'conexion.class.php';
include 'protect.php';
Conexion::abrirConexion();

$id_inventario = $_POST['id_inventario'];
$powera = $_POST['power'];
$lan1 = $_POST['lan1'];
$lan2 = $_POST['lan2'];
$radio1 = $_POST['radio1'];
$radio2 = $_POST['radio2'];
$controladora = $_POST['controladora'];
$ip_switch = $_POST['ip_switch'];
$puerto = $_POST['puerto'];
$informacion = $_POST['informacion'];
$destino = $_SERVER['DOCUMENT_ROOT'].'/wifi/imagenes/aps/';

if (empty($_FILES['imagen']['name'])) {
  $actualizar = "UPDATE propiedades
  SET powera = '$powera', lan1 = '$lan1', lan2 = '$lan2', radio1 = '$radio1', radio2 = '$radio2', controladora = '$controladora',
  ip_switch = '$ip_switch', puerto = '$puerto', informacion = '$informacion', actualizacion = NOW()
  WHERE id_inventario = '$id_inventario';";

  $resultado = mysqli_query(Conexion::getConexion(), $actualizar);

  if ($resultado) {
    echo '<script>
    window.history.go(-2);
    alert("Datos actualizados exitosamente");
    </script>';
  } else {
    echo '<script>
    alert("Seleccione o agregue un switch primero.");
    window.history.go(-1);
    </script>';
  }
} else {
  $imagen_name = $_FILES['imagen']['name'];
  $imagen_size = $_FILES['imagen']['size'];
  $imagen_type = $_FILES['imagen']['type'];
  $old_data = mysqli_query(Conexion::getConexion(), "SELECT imagen FROM propiedades WHERE id_inventario = '$id_inventario'");
  $old_file = mysqli_fetch_array($old_data);
  /* Consulta para actualizar registro en la base de datos */
  $actualizar = "UPDATE propiedades
  SET powera = '$powera', lan1 = '$lan1', lan2 = '$lan2', radio1 = '$radio1', radio2 = '$radio2',
  controladora = '$controladora', ip_switch = '$ip_switch', puerto = '$puerto',
  imagen = '$imagen_name', informacion = '$informacion', actualizacion = NOW()
  WHERE id_inventario = '$id_inventario';";

  $resultado = mysqli_query(Conexion::getConexion(), $actualizar);

  if ($resultado) {
    /* Se elimina el archivo actual y se mueve el nuevo */
    unlink($destino.$old_file['imagen']);
    move_uploaded_file($_FILES['imagen']['tmp_name'], $destino.$imagen_name);

    echo '<script>
    window.history.go(-2);
    alert("Datos actualizados exitosamente");
    </script>';
  } else {
    echo '<script>
    alert("Seleccione o agregue un switch primero.");
    window.history.go(-1);
    </script>';
  }
}

Conexion::cerrarConexion();
?>
