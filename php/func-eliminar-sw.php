<?php
  include 'conexion.class.php';
  include 'protect.php';

  if (!isset($_REQUEST['switch'])) {
    echo "<script>
    alert('Switch no valido');
    window.history.go(-1);
    </script>";
  } else {
    $id_switch = $_REQUEST['switch'];
  }

  $eliminar = "DELETE FROM switchs WHERE id_switch = '$id_switch'";
  Conexion::abrirConexion();
  $resultado = mysqli_query(Conexion::getConexion(), $eliminar);

  if ($resultado) {
    echo "<script>
    window.history.go(-1);
    alert('Se eliminó correctamente');
    </script>";
    header('refresh:0');
    exit;
  } else {
    echo "<script>
    alert('Ese switch ya ha sido eliminado');
    window.history.go(-1);
    </script>";
  }
?>
