<?php
include 'conexion.class.php';
include 'protect.php';
Conexion::abrirConexion();

$id_edificio = $_POST['id_edificio'];
$descripcion = $_POST['descripcion'];
$ruta = $_SERVER['DOCUMENT_ROOT'].'/wifi/imagenes/planos/';

if (empty($_FILES['mapa']['name'])) {
  if (!isset($_FILES['mapa2']['name']) || empty($_FILES['mapa2']['name'])) {
    if (!isset($_FILES['mapa3']['name']) || empty($_FILES['mapa3']['name'])) {
      $query = "UPDATE mapa_edificio
      SET descripcion = '$descripcion'
      WHERE id_edificio = $id_edificio";
    } else {
      $mapa3 = $_FILES['mapa3']['name'];
      move_uploaded_file($_FILES['mapa3']['tmp_name'], $mapa3);

      $query = "UPDATE mapa_edificio
      SET mapa3 = '$mapa3', descripcion = '$descripcion'
      WHERE id_edificio = $id_edificio";
    }
  } else {
    $mapa2 = $_FILES['mapa2']['name'];
    move_uploaded_file($_FILES['mapa2']['tmp_name'], $mapa2);

    if (!isset($_FILES['mapa3']['name']) || empty($_FILES['mapa3']['name'])) {
      $query = "UPDATE mapa_edificio
      SET mapa2 = '$mapa2', descripcion = '$descripcion'
      WHERE id_edificio = $id_edificio";
    } else {
      $mapa3 = $_FILES['mapa3']['name'];
      move_uploaded_file($_FILES['mapa3']['tmp_name'], $ruta.$mapa);

      $query = "UPDATE mapa_edificio
      SET mapa3 = '$mapa3', mapa2 = '$mapa2',
      descripcion = '$descripcion'
      WHERE id_edificio = $id_edificio";
    }
  }
} else {
  $mapa = $_FILES['mapa']['name'];
  move_uploaded_file($_FILES['mapa']['tmp_name'], $ruta.$mapa);

  if (!isset($_FILES['mapa2']['name']) || empty($_FILES['mapa2']['name'])) {
    if (!isset($_FILES['mapa3']['name']) || empty($_FILES['mapa3']['name'])) {
      $query = "UPDATE mapa_edificio
      SET mapa = '$mapa', descripcion = '$descripcion'
      WHERE id_edificio = $id_edificio";
    } else {
      $mapa3 = $_FILES['mapa3']['name'];
      move_uploaded_file($_FILES['mapa3']['tmp_name'], $mapa);

      $query = "UPDATE mapa_edificio
      SET mapa = '$mapa', mapa3 = '$mapa3',
      descripcion = '$descripcion'
      WHERE id_edificio = $id_edificio";
    }
  } else {
    $mapa2 = $_FILES['mapa2']['name'];
    move_uploaded_file($_FILES['mapa2']['tmp_name'], $mapa);

    if (!isset($_FILES['mapa3']['name']) || empty($_FILES['mapa3']['name'])) {
      $query = "UPDATE mapa_edificio
      SET mapa = '$mapa', mapa2 = '$mapa2',
      descripcion = '$descripcion'
      WHERE id_edificio = $id_edificio";
    } else {
      $mapa3 = $_FILES['mapa3']['name'];
      move_uploaded_file($_FILES['mapa3']['tmp_name'], $ruta.$mapa3);

      $query = "UPDATE mapa_edificio
      SET mapa = '$mapa', mapa2 = '$mapa2', mapa3 = '$mapa3',
      descripcion = '$descripcion'
      WHERE id_edificio = $id_edificio";
    }
  }
}

$execute = mysqli_query(Conexion::getConexion(), $query);

if ($execute) {
  echo "<script>
  window.history.go(-2);
  alert('Se editó correctamente');
  </script>";
} else {
  echo "<script>
  alert('Error en la consulta');
  window.history.go(-2);
  </script>";
}
Conexion::cerrarConexion();
?>
