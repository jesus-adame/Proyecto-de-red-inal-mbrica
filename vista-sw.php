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
    <div class="div-ap col-xs-1 col-sm-2 box">
      <h3 class="wrapper div-head">Localización</h3><br>
      <div class="div-padding">
        <img style="max-height: 20em; width: 100%"
        src="imagenes/switchs/<?php
        if ($srow['imagen'] != '') {
          echo $srow['imagen'];
        } else {
          echo 'default-sw.png';
        } ?>" alt="<?php echo $srow['imagen']; ?>"><br>
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
                <td><?php echo $srow['sumistack']; ?></td>
                <td><?php echo $srow['xgm3']; ?></td>
                <td><?php echo $srow['xgm3sb']; ?></td>
                <td><?php echo $srow['sfp']; ?></td>
                <td><?php echo $srow['vim']; ?></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="div-ap col-xs-1 col-sm-2 box">
      <h3 class="wrapper div-head">Edificio <?php echo $row['id_edificio']; ?></h3><br>
      <div class="div-padding">
        <p>Inventario: <b> <?php echo $row['id_switch']; ?></b></p><br>
        <p>Sysname: <b> <?php echo $row['sysname']; ?></b></p><br>
        <p>Modelo: <b> <?php echo $row['modelo']; ?></b></p><br>
        <p>Serie: <b> <?php echo $row['serie']; ?></b></p><br>
        <p>Firmware: <b> <?php echo $row['firmware']; ?></b></p><br>
        <p>Partición: <b> <?php echo $row['particion']; ?></b></p><br>
        <p>IP Switch: <b> <?php echo $row['ip_switch']; ?></b></p><br>
        <p>Mac Address: <b> <?php echo $row['mac']; ?></b></p><br>
        <p>No. Parte: <b> <?php echo $srow['parte']; ?></b></p><br>
        <p>Notas: <b> <?php echo $srow['notas']; ?></b></p><br><?php
        if ($_SESSION['tipo'] == 1) {
           if ($srow['id_switch'] <= 0) { ?>
              <a class='boton2' href='reg-prop-agregar-sw.php?id_switch=<?php echo $row['id_switch']; ?>'>
                <i class="fas fa-arrow-up"></i> Registrar datos
              </a><br><?php
            } else { ?>
              <a class="boton2" href="reg-prop-editar-sw.php?id_switch=<?php echo $row['id_switch']; ?>">
                <i class="fas fa-edit"></i> Actualizar datos
              </a><?php
            } } ?>
        <p class="txt">Última actualización</p>
        <p><?php echo $row['actualizacion']; ?></p>
      </div>
      <br>
    </div>
  </div>
</main>
<?php
include 'struct/footer.php';
?>
