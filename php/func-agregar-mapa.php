<?php
include 'conexion.class.php';
include 'protect.php';
Conexion::abrirConexion();

$id_edificio = $_POST['id_edificio'];
$descripcion = $_POST['descripcion'];
$ruta = $_SERVER['DOCUMENT_ROOT'].'/wifi/imagenes/planos/';

if (empty($_FILES['mapa']['name'])) {
  $mapa_name = null;
} else {
  $mapa_name = $_FILES['mapa']['name'];
  $mapa_type = $_FILES['mapa']['type'];
  $mapa_size = $_FILES['mapa']['size'];
}

if (empty($_FILES['mapa2']['name'])) {
  $mapa2_name = null;
} else {
  $mapa2_name = $_FILES['mapa2']['name'];
  $mapa2_type = $_FILES['mapa2']['type'];
  $mapa2_size = $_FILES['mapa2']['size'];
}

if (empty($_FILES['mapa3']['name'])) {
  $mapa3_name = null;
} else {
  $mapa3_name = $_FILES['mapa3']['name'];
  $mapa3_type = $_FILES['mapa3']['type'];
  $mapa3_size = $_FILES['mapa3']['size'];
}

$query = "INSERT INTO mapa_edificio (
  id_edificio, mapa, descripcion, mapa2, mapa3
) VALUES (
  $id_edificio, '$mapa_name', '$descripcion', '$mapa2_name', '$mapa3_name'
);";

$execute = mysqli_query(Conexion::getConexion(), $query);
Conexion::cerrarConexion();

if ($execute && move_uploaded_file($_FILES['mapa']['tmp_name'], $ruta.$mapa_name)) {
  echo "<script>
  window.history.go(-2);
  alert('Se agregó correctamente');
  </script>";
} else {
  echo "<script>
  alert('Error al agregar');
  window.history.go(-2);
  </script>";
}
?>
