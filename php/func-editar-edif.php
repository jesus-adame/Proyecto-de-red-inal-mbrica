<?php
  require 'conexion.class.php';
  include 'protect.php';

  $id_edificio = $_REQUEST['id_edificio'];
  $nombre = $_POST['nombre'];
  $estado = $_POST['estado'];

  if (empty($_FILES['imagen']['tmp_name'])) {
    $imagen = null;
  } else {
    $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
  }

  if ($estado == "activo") {
    $estado = null;
  }

  $query = "UPDATE edificios
  SET id_edificio = $id_edificio, nombre = '$nombre', imagen = '$imagen', estado = '$estado'
  WHERE id_edificio = '$id_edificio'";
  
  Conexion::abrirConexion();
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
