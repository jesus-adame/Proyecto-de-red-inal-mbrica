<?php
include 'struct/header.php';
require 'php/conexion.class.php';

if (!isset($_REQUEST['ip_switch'])) {
  header('Location: index.php');
}
$ip_switch = $_REQUEST['ip_switch'];
?>
<section class="wrapper contenido">
  <div style="overflow-x:auto;">
    <table class="box radius">
      <thead class="h1tabla">
        <tr>
          <th class="id">Inventario</th>
          <th>Modelo</th>
          <th class='id'>Serie</th>
          <th class='id'>IP</th>
          <th class='id'>Edificio</th>
        </tr>
      </thead>
      <tbody>
        <?php
        Conexion::abrirConexion();
        $mostrar = "SELECT * FROM switchs WHERE ip_switch = '$ip_switch';";
        $resultado = mysqli_query(Conexion::getConexion(), $mostrar);
        Conexion::cerrarConexion();

        if (mysqli_num_rows($resultado) <= 0) {
          echo "<script>
            alert:('No se ha encontrado algún switch con ese IP');
          </script>";
        }

        while ($row = mysqli_fetch_array($resultado)) {
          ?>
        <tr>
          <td>
            <a href="vista-sw.php?switch=<?php echo $row['id_switch']; ?>" class="boton2 col-xs-1"><?php echo $row['id_switch']; ?></a>
          </td>
          <td><?php echo $row['modelo']; ?></td>
          <td><?php echo $row['serie']; ?></td>
          <td><?php echo $row['ip_switch']; ?></td>
          <td><?php echo $row['id_edificio']; ?></td>
        </tr><?php
      } ?>
      </tbody>
    </table>
  </div><br><br>
</section>
<?php
include 'struct/footer.php';
?>
