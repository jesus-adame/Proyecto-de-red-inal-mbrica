<?php
class Edificio
{
  public static function mostrarTodos($conexion) {
    if (isset($conexion)) {
      try {
        $query = mysqli_query($conexion, "SELECT * FROM edificios");

        return $query;
      } catch (\Exception $e) {
        echo "Error: " . $e->getMessage();
      }
    }
  }
}

?>
