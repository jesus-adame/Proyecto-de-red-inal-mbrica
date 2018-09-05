<?php
include_once 'struct/header.php';
include 'php/conexion.class.php';

$id_switch = $_REQUEST['switch'];
$query = "SELECT * FROM switchs WHERE id_switch = '$id_switch'";
$squery="SELECT * FROM prop_switchs WHERE id_switch = '$id_switch'";

Conexion::abrirConexion();
$result = mysqli_query(Conexion::getConexion(), $query);
$sresult = mysqli_query(Conexion::getConexion(), $squery);
Conexion::cerrarConexion();

$row = mysqli_fetch_array($result);
$srow = mysqli_fetch_array($sresult);
?>
<main class="wrapper contenido">
  <div class="row">
    <div class=" div-ap img-ap col-xs-1 col-md-2 box"><br>
      <h3>Localización</h3>
      <img style="max-height: 20em; width: 100%" class="wrapper"
      src="imagenes/switchs/<?php echo $srow['imagen']; ?>" alt="<?php echo $row['sysname']; ?>"><br>
      <div style="overflow-x: auto; margin: auto;">
        <table class="radius">
          <thead>
            <tr>
              <th style="width: 7%">Sumistack</th>
              <th style="">XGM3-2sf</th>
              <th>XGM3SB-4sf</th>
              <th>SFP+_LR</th>
              <th>VIM4-40G4x2</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><?php echo $row['sysname']; ?></td>
              <td><?php echo $row['modelo']; ?></td>
              <td><?php echo $row['sysname']; ?></td>
              <td><?php echo $row['sysname']; ?></td>
              <td><?php echo $row['sysname']; ?></td>
            </tr>
          </tbody>
        </table>
      </div>
      <br><br>
    </div>
    <div class="div-ap propiedades col-xs-1 col-md-2 box">
      <h3 class="wrapper">Edificio <?php echo $row['id_edificio']; ?></h3><br>
      <p><b>Inventario:</b> <?php echo $row['id_switch']; ?></p><br>
      <p><b>Sysname:</b> <?php echo $row['sysname']; ?></p><br>
      <p><b>Modelo:</b> <?php echo $row['modelo']; ?></p><br>
      <p><b>Serie:</b> <?php echo $row['serie']; ?></p><br>
      <p><b>Firmware:</b> <?php echo $row['id_switch']; ?></p><br>
      <p><b>Partición:</b> <?php echo $row['particion']; ?></p><br>
      <p><b>IP Switch:</b> <?php echo $row['ip_switch']; ?></p><br>
      <p><b>Mac Address:</b> <?php echo $row['mac']; ?></p><br>
      <?php if ($srow['id_switch'] <= 0) { ?>
      <a class='boton2' href='reg-prop-agregar-sw.php?id_switch=<?php echo $row['id_switch']; ?>'>
        <i class="fas fa-arrow-up"></i> Registrar datos
      </a><br>
      <?php } else { ?>
      <a class="boton2" href="reg-prop-editar-sw.php?id_switch=<?php echo $row['id_switch']; ?>">
        <i class="fas fa-edit"></i> Actualizar datos
      </a>
      <?php } ?>
      <p class="txt">Última actualización</p>
      <p><?php echo $row['actualizacion']; ?></p><br>
    </div>
  </div>
</main>
<?php
include 'struct/footer.php';
?>
