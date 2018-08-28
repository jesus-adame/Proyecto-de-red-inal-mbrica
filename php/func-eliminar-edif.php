<?php
  include 'conexion.class.php';
  include 'protect.php';
  
  $id_edificio = $_GET['id_edificio'];

  $eliminar = "DELETE FROM edificios WHERE id_edificio = '$id_edificio'";
  Conexion::abrirConexion();
  $resultado = mysqli_query(Conexion::getConexion(), $eliminar);

  if ($resultado) {
    echo "<script>
    window.history.go(-1);
    alert('Se eliminó correctamente');
    </script>";
    exit;
  } else {
    echo "<script>
    alert('No se ha podido eliminar');
    window.history.go(-1);
    </script>";
    exit;
  }
?>
