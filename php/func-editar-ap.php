<?php
  include 'conexion.class.php';
  include 'protect.php';

  $id_ap = $_POST['actualizar'];
  $inventario = strtoupper($_POST['inventario']);
  $mac1 = $_POST["mac1"];
  $mac2 = $_POST["mac2"];
  $ip = $_POST["ip"];
  $canalr1 = $_POST["canalr1"];
  $canalr2 = $_POST["canalr2"];
  $planta = $_POST["planta"];
  $edificio = $_POST["edificio"];
  $lugar = $_POST["lugar"];

  $query = "UPDATE accesspoints
  SET inventario = '$inventario', IP = '$ip', Mac1 = '$mac1', Mac2 = '$mac2', Canal1 = '$canalr1',
  Canal2 = '$canalr2', Planta = '$planta', EdificioNum = '$edificio', lugar = '$lugar'
  WHERE id_ap = '$id_ap'";
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
    alert("Error al editar el AP");
    window.history.go(-1);
    </script>';
  }
?>
