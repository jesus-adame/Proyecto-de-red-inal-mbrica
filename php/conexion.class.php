<?php
class Conexion
{
  private static $conexion;

  public static function abrirConexion() {
    if (!isset(self::$conexion)) {
      try {
        include 'conexion.inc.php';
        self::$conexion = mysqli_connect($host, $user, $pass, $db);
      } catch (\Exception $e) {
        print 'Error: '.$e ->getMessage().'<br>';
      }
    }
  }

  public static function cerrarConexion() {
    if (isset(self::$conexion)) {
      self::$conexion = null;
    }
  }

  public static function getConexion() {
    return self::$conexion;
  }
}
?>
