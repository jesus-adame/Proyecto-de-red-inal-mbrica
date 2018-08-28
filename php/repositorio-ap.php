<?php
class RepositorioAp{
  public static function agregarAp($conexion,$ap){
    $ap_agregado = false;

    if (isset($conexion)) {
      $edificio-> obtener_edificio();
      $inventario-> obtener_inventario();
      $ip-> obtener_ip();
      $mac1-> obtener_mac1();
      $mac2-> obtener_mac2();
      $serie-> obtener_serie();
      $canal1-> obtener_canal1();
      $canal2-> obtener_canal2();
      $planta-> obtener_planta();
      $fecha-> obtener_fecha();
       $insertar = "INSERT INTO accesspoints (
         EdificioNum, inventario, Mac1,	Mac2,	IP, Serie, Canal1, Canal2, Planta, fecha
       ) VALUES (
         'SELF::$edificio','SELF::$inventario','SELF::$mac1','$mac2','SELF::$ip','SELF::$serie','SELF::$canal1','SELF::$canal2','SELF::$planta',NOW()
       )";

      try {
        //verificar
        $verificar_inventario = mysqli_query(Conexion::getConexion(), "SELECT * FROM accesspoints WHERE Inventario = 'SELF::$inventario'");
        if (mysqli_num_rows($verificar_inventario) > 0) {
          echo "<script>
          alert('Ya hay un AP con ese número de inventario');
          window.history.go(-1);
          </script>";
        }
        $verificar_ip = mysqli_query(Conexion::getConexion(), "SELECT * FROM accesspoints WHERE IP = 'SELF::$ip'");
        if (mysqli_num_rows($verificar_ip) > 0) {
          echo "<script>
          alert('Ya hay un AP con ese número IP');
          window.history.go(-1);
          </script>";
        }
        $verificar_serie = mysqli_query(Conexion::getConexion(), "SELECT * FROM accesspoints WHERE Serie = 'SELF::$serie'");
        if (mysqli_num_rows($verificar_serie) > 0) {
          echo "<script>
          alert('Ya hay un AP con ese número de serie');
          window.history.go(-1);
          </script>";
        }
        //ejecutar consulta
        $ap_agregado = mysqli_query(Conexion::getConexion(), $insertar);
        //cerrar conexión
        mysqli_close(Conexion::getConexion());
      } catch (\Exception $e) {
        print 'Error'.$e-> getMessage();
      }
    }
    return $ap_agregado;
  }
    public function editarAp($id_ap, $inventario, $ip, $canal1, $canal2, $planta, $edificio){
      $this -> actualizar = $id_ap;
      $this -> inventario = $inventario;
      $this -> ip = $ip;
      $this -> canalr1 = $canal1;
      $this -> canalr2 = $canal2;
      $this -> planta = $planta;
      $this -> edificio = $edificio;

      $query = "UPDATE accesspoints SET inventario = '$inventario', IP = '$ip', Canal1 = '$canal1', Canal2 = '$canal2', Planta = '$planta', EdificioNum = '$edificio'
                WHERE id_ap = '$id_ap'";
      Conexion::abrirConexion();
      $resultado = mysqli_query(Conexion::getConexion(), $query);
      Conexion::cerrarConexion();
      if ($resultado) {
        // te muestra un mensaje y regresa
        echo '<script>
        alert("Editado exitosamente");
        window.history.go(-2);
        </script>';

      } else {
        echo '<script>
        alert("Error al editar el AP");
        window.history.go(-1);
        </script>';
      }
    }
}
 ?>
