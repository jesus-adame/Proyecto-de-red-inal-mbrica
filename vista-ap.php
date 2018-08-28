<?php
  include 'struct/header.php';
  include 'php/conexion.class.php';

  $inventario = $_REQUEST['inventario'];
  $edificio = $_GET['edif'];

  if (!isset($inventario)) {
    header('location: index.php');
  }

  $query = "SELECT * FROM accesspoints INNER JOIN propiedades
  ON accesspoints.inventario = propiedades.id_inventario
  WHERE inventario = '$inventario'";

  Conexion::abrirConexion();
  $result = mysqli_query(Conexion::getConexion(), $query);
  Conexion::cerrarConexion();
  $row = mysqli_fetch_array($result);
?>
<main class="wrapper contenido">
  <div class="row">
    <div class="img-ap col-xs-1 col-sm-2 box div-ap">
      <h3>Localización</h3>
      <img class="thumb" src="imagenes/aps/<?php echo $row['imagen']; ?>" alt="No se puede mostrar la imagen">
    </div>
    <div class="propiedades col-xs-1 col-sm-2 box div-ap">
      <h3 class="wrapper">Edificio <?php echo $edificio; ?></h3><br>
      <p class="txt wrapper">Inventario</p>
      <p class="wrapper"><?php echo $inventario; ?></p>
      <br>
      <div class="col-lg-1 center box" style="border-radius: 0px 0px 6px 6px">
        <p class="txt">- Estado -</p>
        <div class="col-xs-5 col-sm-3 col-md-5">
          <p>On/Off</p>
          <div title="Estado del AP:
> Verde - El AP está funcionando correctamente.
> Ambar - Indica que está reseteando.
> Gris - Se encuetra apagado."
          class="circulo <?php echo $row['powera']; ?>">
          </div>
        </div>
        <div class="content col-xs-5 col-sm-3 col-md-5">
          <p>Lan1</p>
          <div title="LED de LAN 1:
> Verde - El AP está funcionando correctamente.
> Ambar - Indica que está reseteando.
> Gris - Se encuetra apagado."
          class="circulo <?php echo $row['lan1']; ?>">
          </div>
        </div>
        <div class="col-xs-5 col-sm-3 col-md-5">
          <p>Lan2</p>
          <div title="LED de LAN 2:
> Verde - El AP está funcionando correctamente.
> Ambar - Indica que está reseteando.
> Gris - Se encuetra apagado."
          class="circulo <?php echo $row['lan2']; ?>">
          </div>
        </div>
        <div class="col-xs-5 col-sm-3 col-md-5">
          <p>5Ghz</p>
          <div title="Radio 1:
> Verde - El AP está funcionando correctamente.
> Ambar - Indica que está reseteando.
> Gris - Se encuetra apagado."
          class="circulo <?php echo $row['radio1']; ?>">
          </div>
        </div>
        <div class="col-xs-5 col-sm-3 col-md-5">
          <p>2.4Ghz</p>
          <div title="Radio 2:
> Verde - El AP está funcionando correctamente.
> Ambar - Indica que está reseteando.
> Gris - Se encuetra apagado."
          class="circulo <?php echo $row['radio2']; ?>">
          </div>
        </div>
      </div><br><br>
      <p class="txt">Controladora</p>
      <p><?php echo $row['controladora']; ?></p><br>
      <fieldset>
        <legend style="font-family: arial">Switch</legend>
        <div class="row">
          <p class="txt" style="line-height: 35px">IP Switch:</p>
          <a class="boton2" href="filtro-sw.php?ip_switch=<?php echo $row['ip_switch']; ?>"><?php echo $row['ip_switch']; ?></a>
          <p style="line-height: 35px" class="txt">Puerto:</p>
          <p style="line-height: 35px"><?php echo $row['puerto']; ?></p>
        </div>
      </fieldset><br>
      <p class="txt">Fecha de Registro</p>
      <p><?php echo $row['fecha']; ?></p><br>
      <p class="txt">Última edición</p>
      <p><?php echo $row['actualizacion']; ?></p><br>
      <p class="txt">Información</p>
      <p><?php echo $row['informacion']; ?></p><br>
      <?php
      if ($_SESSION['tipo'] == 1) {
        if ($row['id_inventario'] > 0) { ?>
          <a href="regis-prop-editar-ap.php?inventario=<?php echo $inventario; ?>&edif=<?php echo $edificio; ?>" class="boton2"><i class="fas fa-edit"></i> Actualizar</a>
          <?php
        } else { ?>
          <a href="regis-prop-ap.php?inventario=<?php echo $inventario; ?>&edif=<?php echo $edificio; ?>" class="boton2"><i class="fas fa-arrow-up"></i> Registrar datos</a>
      <?php } } ?>
    </div>
  </div>
</main>
<?php
 include 'struct/footer.php';
?>
