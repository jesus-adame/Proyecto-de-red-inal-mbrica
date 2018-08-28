<?php
  include 'conexion.class.php';
  include 'protect.php';

  $id = $_POST['id_switch'];
  $sysname = $_POST['sysname'];
  $modelo = $_POST['modelo'];
  $serie = $_POST["serie"];
  $firmware = $_POST['firmware'];
  $particion = $_POST['particion'];
  $ip_switch = $_POST["ip_switch"];
  $mac = $_POST['mac'];

  $query = "UPDATE switchs
  SET sysname = '$sysname', modelo = '$modelo',
  serie = '$serie', firmware = '$firmware', particion = '$particion',
  ip_switch = '$ip_switch', mac = '$mac',
  actualizacion = NOW()
  WHERE id_switch = '$id';";

  Conexion::abrirConexion();
  $resultado = mysqli_query(Conexion::getConexion(), $query);
  Conexion::cerrarConexion();

  if ($resultado) {
    // te muestra un mensaje y regresa
    echo '<script>
    window.history.go(-2);
    alert("Editado exitosamente");
    </script>';
  } else {
    echo '<script>
    alert("Error al editar el switch");
    window.history.go(-1);
    </script>';
  }

?>
