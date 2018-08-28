<?php
  include 'conexion.class.php';
  include 'protect.php';
  $id_ap = $_POST['button'];

  $eliminar = "DELETE FROM accesspoints WHERE id_ap = '$id_ap'";
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
