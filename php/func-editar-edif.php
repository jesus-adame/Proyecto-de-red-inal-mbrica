<?php
  require 'conexion.class.php';
  include 'protect.php';
  Conexion::abrirConexion();

  $id = $_REQUEST['id_edificio'];
  $destino = $_SERVER['DOCUMENT_ROOT'].'/wifi/imagenes/edificios/';

  $nombre = $_POST['nombre'];
  $estado = $_POST['estado'];

  if (empty($_FILES['imagen']['name'])) {
    $query = "UPDATE edificios
    SET id_edificio = $id, nombre = '$nombre', estado = '$estado'
    WHERE id_edificio = '$id'";
  } else {
    $imagen_name = $_FILES['imagen']['name'];
    $imagen_size = $_FILES['imagen']['size'];
    $imagen_type = $_FILES['imagen']['type'];

    $old_data = mysqli_query(Conexion::getConexion(), "SELECT img_edif FROM edificios WHERE id_edificio = $id");
    $old_file = mysqli_fetch_array($old_data);
    if ($old_file['img_edif'] =! ('' || 1)) {
      unlink($destino.$old_file['img_edif']);
    }

    $query = "UPDATE edificios
    SET id_edificio = $id, nombre = '$nombre', img_edif = '$imagen_name', estado = '$estado'
    WHERE id_edificio = '$id'";

    move_uploaded_file($_FILES['imagen']['tmp_name'], $destino.$imagen_name);
  }

  if ($estado == "activo") {
    $estado = null;
  }

  $resultado = mysqli_query(Conexion::getConexion(), $query);
  Conexion::cerrarConexion();

  if ($resultado) {
    /* te muestra un mensaje y regresa */
    echo '<script>
    window.history.go(-2);
    alert("Editado exitosamente");
    </script>';
  } else {
    echo '<script>
    alert("Error al editar el edificio");
    window.history.go(-1);
    </script>';
  }
?>
