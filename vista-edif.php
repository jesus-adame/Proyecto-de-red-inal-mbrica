<?php
include 'struct/header.php';
$edificio = $_REQUEST['edif'];

if (!isset($edificio)) {
  header('Location: index.php');
}

require 'php/conexion.class.php';
Conexion::abrirConexion();
$mostrar = "SELECT * FROM accesspoints WHERE EdificioNum = $edificio ORDER BY planta ASC LIMIT 200";
$resultado = mysqli_query(Conexion::getConexion(), $mostrar);

$query = "SELECT * FROM edificios WHERE id_edificio = $edificio LIMIT 200";
$edif = mysqli_query(Conexion::getConexion(), $query);

Conexion::cerrarConexion();
$edifrow = mysqli_fetch_array($edif);
?>
<main class="wrapper contenido">
  <h2><?php echo $edificio.'. '.$edifrow['nombre']; ?></h2>
  <img src="imagenes/edificios/<?php echo $edifrow['img_edif']; ?>" alt="<?php echo $edifrow['nombre']; ?>" class="maimg">
  <div class="center">
    <a class="boton success" href="vista-plano.php?edif=<?php echo $edificio; ?>">
      <i class="far fa-map"></i> Ubicación
    </a>
    <a class="boton success" href="pdf/imp_inventario.php?edif=<?php echo $edificio; ?>">
      <i class="fas fa-print"></i> Imprimir
    </a> <br><br>
  </div>
  <div style="overflow-x: auto; margin: auto">
    <table class="box radius">
      <thead>
        <tr>
          <th rowspan="2" style="width: 7%">Inv.</th>
          <th rowspan="2" class='id'>IP</th>
          <th colspan="2">Mac Address</th>
          <th rowspan="2" class='id'>Serie</th>
          <th colspan="2">Canales</th>
          <th rowspan="2" >Planta</th>
          <th rowspan="2" style="width: 14%">Ubicación</th>
        <?php if ($_SESSION['tipo'] == 1 || $_SESSION['tipo'] == 3) { ?>
          <th rowspan="2" class="id">
            <a class="boton default2" href="regis-agregar-ap.php?edif=<?php echo $edificio; ?>">
              <i class="fas fa-plus-circle"></i> Agregar
            </a>
          </th>
        <?php } ?>
        </tr>
        <tr>
          <th>Radio 1</th>
          <th>Radio 2</th>
          <th>Rad1</th>
          <th>Rad2</th>
        </tr>
      </thead>
      <tbody>
      <?php
      while ($row = mysqli_fetch_array($resultado)) {
      ?>
        <tr>
          <td>
            <a class="boton2 col-xs-1" href="vista-ap.php?edif=<?php echo $edificio; ?>&inventario=<?php echo $row['inventario']; ?>">
              <?php echo $row['inventario']; ?>
            </a>
          </td>
          <td><?php echo $row['IP']; ?></td>
          <td><?php echo nl2br($row['Mac1']); ?></td>
          <td><?php echo nl2br($row['Mac2']); ?></td>
          <td><?php echo $row['Serie']; ?></td>
          <td><?php echo $row['Canal1']; ?></td>
          <td><?php echo $row['Canal2']; ?></td>
          <td><?php echo $row['Planta']; ?></td>
          <td><?php echo $row['lugar'] ?></td>
          <?php if ($_SESSION['tipo'] == 1 || $_SESSION['tipo'] == 3){ ?>
          <td style="width: 10%; min-width: 5px; max-width: 20px">
            <a class="boton default2 col-xs-1" style="margin-bottom: .2em" href="regis-editar-ap.php?id_ap=<?php echo $row['id_ap']; ?>">
              <i class="fas fa-edit"></i> Editar
            </a><br>
            <a class="boton danger col-xs-1" href="php/func-eliminar-ap.php?id=<?php echo $row['id_ap']; ?>&i=<?php echo $row['inventario']; ?>">
              <i class="fas fa-times"></i> Eliminar
            </a>
          </td>
        <?php } ?>
        </tr>
      <?php } ?>
      </tbody>
    </table>
  </div><br>
  <div class="radius" style="overflow-x: auto; margin: auto">
    <table class="box">
      <thead>
        <tr>
          <th class="id">Inventario</th>
          <th class=''>Modelo</th>
          <th class=''>Serie</th>
          <th class='id'>IP</th>
          <th class='id'>Edificio</th>
          <?php if ($_SESSION['tipo'] == 1 || $_SESSION['tipo'] == 3) { ?>
          <th class="id">
            <a class="boton default2" href="reg-agregar-sw.php?edif=<?php echo $edificio; ?>">
              <i class="fas fa-plus-circle"></i> Agregar
            </a>
          </th>
        <?php } ?>
        </tr>
      </thead>
      <tbody>
        <?php
        Conexion::abrirConexion();
        $mostrar = "SELECT * FROM switchs WHERE id_edificio = '$edificio'";
        $resultado = mysqli_query(Conexion::getConexion(), $mostrar);
        Conexion::cerrarConexion();
        while($row = $resultado ->fetch_assoc()) {
        ?>
        <tr>
          <td>
            <a class="boton2 col-xs-1" href="vista-sw.php?switch=<?php echo $row['id_switch']; ?>"><?php echo $row['id_switch']; ?></a>
          </td>
          <td><?php echo $row['modelo']; ?></td>
          <td><?php echo $row['serie']; ?></td>
          <td><?php echo $row['ip_switch']; ?></td>
          <td><?php echo $row['id_edificio']; ?></td>
          <?php if ($_SESSION['tipo'] == 1 || $_SESSION['tipo'] == 3) { ?>
          <td>
            <a class="boton default2 col-xs-1" style="margin-bottom: .2em" href="reg-editar-sw.php?switch=<?php echo $row['id_switch']; ?>">
              <i class="fas fa-edit"></i> Editar
            </a><br>
            <a class="boton danger col-xs-1" href="php/func-eliminar-sw.php?switch=<?php echo $row['id_switch']; ?>">
              <i class="fas fa-times"></i> Eliminar
            </a>
          </td>
        <?php } ?>
        </tr><?php
        } ?>
      </tbody>
    </table>
  </div>
</main>
<?php include 'struct/footer.php'; ?>
