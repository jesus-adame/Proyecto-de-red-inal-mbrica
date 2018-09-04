<?php
  require 'conexion.class.php';
  include 'protect.php';

  $id_edificio = $_POST['id_edificio'];
  $destino = $_SERVER['DOCUMENT_ROOT'].'/wifi/imagenes/edificios/';

  $nombre = $_POST['nombre'];

  if (empty($_FILES['imagen']['name'])) {
    $imagen_name = null;
  } else {
    $imagen_name = $_FILES['imagen']['name'];
    $imagen_size = $_FILES['imagen']['size'];
    $imagen_type = $_FILES['imagen']['type'];
  }

  $query = "INSERT INTO edificios (id_edificio, nombre, img_edif, imagen) VALUES ($id_edificio, '$nombre', '$imagen_name', 'imagen')";

  Conexion::abrirConexion();
  /* Verificar que el edificio no esté agregado. */
  $verificar = mysqli_query(Conexion::getConexion(), "SELECT id_edificio FROM edificios WHERE id_edificio = '$id_edificio'");

  if (mysqli_num_rows($verificar) > 0) {
    echo "<script>
    alert('El edificio ya ha sido registrado');
    </script>";
    header('location:inventario-edif.php');
    exit;
  }
  /* Ejecutar consulta */
  $resultado = mysqli_query(Conexion::getConexion(), $query);

  if (!$resultado) {
    echo '<script>
    alert("Error en los datos de registro");
    window.history.go(-1);
    </script>';
  } else {
    move_uploaded_file($_FILES['imagen']['tmp_name'], $destino.$imagen_name);
    echo '<script>
    window.history.go(-2);
    alert("Edificio agregado exitosamente");
    </script>';
  }

  Conexion::cerrarConexion(); //cerrar conexión
 ?>
