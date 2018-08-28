<?php
  include 'conexion.class.php';
  include 'protect.php';
  /* resibir datos y almacenarlos */
  $id_switch = $_POST["id_switch"];
  $sysname = $_POST['sysname'];
  $modelo = $_POST["modelo"];
  $serie = $_POST["serie"];
  $firmware = $_POST['firmware'];
  $particion = $_POST['particion'];
  $ip_switch = $_POST["ip_switch"];
  $mac = $_POST['mac'];
  $id_edificio = $_POST["edificio"];

  /* Consulta insertar */
  Conexion::abrirConexion();
   $insertar = "INSERT INTO switchs (
    id_switch, sysname, modelo,
    serie, firmware, particion,
    ip_switch, mac,
    id_edificio, actualizacion
   ) VALUES (
    '$id_switch', '$sysname', '$modelo',
    '$serie', '$firmware', '$particion',
    '$ip_switch', '$mac',
    '$id_edificio', NOW()
   );";
   /* verificar */
   $verificar_id = mysqli_query(Conexion::getConexion(), "SELECT * FROM switchs WHERE id_switch = '$id_switch'");

   if (mysqli_num_rows($verificar_id) > 0) {
     echo "<script>
     alert('Ya hay un switch con ese número de inventario');
     window.history.go(-1);
     </script>";
     exit;
   }

   $verificar_serie = mysqli_query(Conexion::getConexion(), "SELECT * FROM switchs WHERE serie = '$serie'");

   if (mysqli_num_rows($verificar_serie) > 0) {
     echo "<script>
     alert('Ya hay un switch con ese número de serie');
     window.history.go(-1);
     </script>";
     exit;
   }
   /* ejecutar consulta */
   $resultado = mysqli_query(Conexion::getConexion(), $insertar);

   if (!$resultado) {
     echo '<script>
     alert("Error en los datos");
     window.history.go(-1);
     </script>';
   } else {
     echo '<script>
     window.history.go(-2);
     alert("Switch registrado correctamente");
     </script>';
   }
   /* cerrar conexión */
   mysqli_close(Conexion::getConexion());
?>
