<?php
  include 'conexion.class.php';
  include 'protect.php';
  include_once 'rep_ap.php';

  $id_ap = $_POST['actualizar'];

  $ap = new Ap(
    $edificio = $_POST["edificio"],
    $inventario = strtoupper($_POST['inventario']),
    $mac1 = $_POST["mac1"],
    $mac2 = $_POST["mac2"],
    $ip = $_POST["ip"],
    $serie = $_POST['serie'],
    $canalr1 = $_POST["canalr1"],
    $canalr2 = $_POST["canalr2"],
    $planta = $_POST["planta"],
    $lugar = $_POST["lugar"]
  );

  Conexion::abrirConexion();
  $resultado = $ap-> editar(Conexion::getConexion(), $id_ap);
  Conexion::cerrarConexion();

  if ($resultado) {
    // te muestra un mensaje y regresa
    echo '<script>
    window.history.go(-2);
    alert("Editado exitosamente");
    </script>';

  } else {
    echo '<script>
    alert("Ya hay un AP con ese número de inventario");
    window.history.go(-1);
    </script>';
  }
?>
