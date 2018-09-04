<?php
include_once 'conexion.class.php';
include 'protect.php';

$id_inventario = $_POST['id_inventario'];
$destino = $_SERVER['DOCUMENT_ROOT'].'/wifi/imagenes/aps/';

$powera = $_POST['power'];
$lan1 = $_POST['lan1'];
$lan2 = $_POST['lan2'];
$radio1 = $_POST['radio1'];
$radio2 = $_POST['radio2'];
$controladora = $_POST['controladora'];
$ip_switch = $_POST['ip_switch'];
$puerto = $_POST['puerto'];
$informacion = $_POST['informacion'];

if (empty($_FILES['imagen']['name'])) {
  $imagen_name = null;
} else {
  $imagen_name = $_FILES['imagen']['name'];
  $imagen_size = $_FILES['imagen']['size'];
  $imagen_type = $_FILES['imagen']['type'];
}

$insertar = "INSERT INTO propiedades (
  id_inventario, powera, lan1, lan2, radio1, radio2, controladora, ip_switch, puerto,
  imagen, informacion, actualizacion
) VALUES (
  '$id_inventario', '$powera', '$lan1', '$lan2',
  '$radio1', '$radio2', '$controladora', '$ip_switch' ,'$puerto', '$imagen_name', '$informacion', NOW()
);";

Conexion::abrirConexion();
//verificar
$verificar_inventario = mysqli_query(Conexion::getConexion(), "SELECT * FROM propiedades WHERE id_inventario = '$id_inventario'");

if (mysqli_num_rows($verificar_inventario)>0){
  echo "<script>
  alert('El AP ya está registrado');
  window.history.go(-2);
  </script>";
  exit;
} else {
  $resultado = mysqli_query(Conexion::getConexion(), $insertar);
  if ($resultado) {
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
