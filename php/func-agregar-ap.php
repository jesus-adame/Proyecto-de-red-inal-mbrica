<?php
  include 'conexion.class.php';
  include 'protect.php';
  /* Resibir datos y almacenarlos */
  $edificio = $_POST["edificio"];
  $inventario = strtoupper($_POST["inventario"]);
  $mac1 = $_POST["mac1"];
  $mac2 = $_POST["mac2"];
  $ip = $_POST["ip"];
  $serie = $_POST["serie"];
  $canal1 = $_POST["canal1"];
  $canal2 = $_POST["canal2"];
  $planta = $_POST["planta"];
  $lugar = $_POST["lugar"];

  Conexion::abrirConexion();   // Se abre conexion y se declara la consulta
  $insertar = "INSERT INTO accesspoints (
    EdificioNum, inventario, Mac1,	Mac2,	IP, Serie, Canal1, Canal2, Planta, lugar, fecha
  ) VALUES (
    '$edificio', '$inventario', '$mac1', '$mac2', '$ip', '$serie', '$canal1',
    '$canal2', '$planta', '$lugar', NOW()
  );";
  /* verificar */
  $verificar_inventario = mysqli_query(Conexion::getConexion(), "SELECT * FROM accesspoints WHERE Inventario = '$inventario'");

  if (mysqli_num_rows($verificar_inventario) > 0) {
    echo "<script>
    alert('Ya hay un AP con ese número de inventario');
    window.history.go(-1);
    </script>";
    exit;
  }

  $verificar_ip = mysqli_query(Conexion::getConexion(), "SELECT * FROM accesspoints WHERE IP = '$ip'");

  if (mysqli_num_rows($verificar_ip) > 0) {
   echo "<script>
   alert('Ya hay un AP con ese número IP');
   window.history.go(-1);
   </script>";
   exit;
  }

  $verificar_serie = mysqli_query(Conexion::getConexion(), "SELECT * FROM accesspoints WHERE Serie = '$serie'");

  if (mysqli_num_rows($verificar_serie) > 0) {
   echo "<script>
   alert('Ya hay un AP con ese número de serie');
   window.history.go(-1);
   </script>";
   exit;
  }
  /* ejecutar consulta */
  $resultado = mysqli_query(Conexion::getConexion(), $insertar);

  if (!$resultado) {
   echo '<script>
   alert("Error en los datos de registro");
   window.history.go(-1);
   </script>';
  } else {
   echo '<script>
   window.history.go(-2);
   alert("AP Registrado exitosamente");
   </script>';
  }
  /* cerrar conexión */
  Conexion::cerrarConexion();
?>
