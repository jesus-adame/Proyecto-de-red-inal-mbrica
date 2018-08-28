<?php
  include 'struct/header.php';
  include 'php/conexion.class.php';

  $id_inventario = $_GET['inventario'];
  $edificio = $_GET['edif'];

  $squery = "SELECT * FROM propiedades WHERE id_inventario = '$id_inventario'";
  Conexion::abrirConexion();
  $sresult = mysqli_query(Conexion::getConexion(), $squery);
  Conexion::cerrarConexion();
  $srow = mysqli_fetch_array($sresult);
?>
  <section class="wrapper contenido">
    <form id="Formr" class="formulario box" action="php/func-editar-prop-ap.php" method="post" enctype="multipart/form-data">
      <h2>Editar AP <?php echo $id_inventario; ?></h2>
      <fieldset>
        <legend>LED</legend>
      <div class="row">
        <label class="col-xs-3 col-md-5" for="[power]">On/Off<br>
          <select class="col-xs-1" name="power">
            <option value="<?php echo $srow['powera']; ?>">- <?php echo $srow['powera']; ?></option>
            <option value="Off">Off</option>
            <option value="Verde">Verde</option>
            <option value="Ambar">Ambar</option>
          </select>
        </label>
        <label class="col-xs-3 col-md-5" for="[lan1]">LAN1<br>
          <select class="col-xs-1" name="lan1">
            <option value="<?php echo $srow['lan1']; ?>">- <?php echo $srow['lan1']; ?></option>
            <option value="Off">Off</option>
            <option value="Verde">Verde</option>
            <option value="Ambar">Ambar</option>
          </select>
        </label><br>
        <label class="col-xs-3 col-md-5" for="[lan2]">LAN2 <br>
          <select class="col-xs-1" name="lan2">
            <option value="<?php echo $srow['lan2']; ?>">- <?php echo $srow['lan2']; ?></option>
            <option value="Off">Off</option>
            <option value="Verde">Verde</option>
            <option value="Ambar">Ambar</option>
          </select>
        </label>
        <label class="col-xs-3 col-md-5" for="[radio1]">Radio1 <br>
          <select class="col-xs-1" name="radio1">
            <option value="<?php echo $srow['radio1']; ?>">- <?php echo $srow['radio1']; ?></option>
            <option value="Off">Off</option>
            <option value="Verde">Verde</option>
            <option value="Ambar">Ambar</option>
          </select>
        </label>
        <label class="col-xs-3 col-md-5" for="[radio2]">Radio2 <br>
          <select class="col-xs-1" name="radio2">
            <option value="<?php echo $srow['radio2']; ?>">- <?php echo $srow['radio2']; ?></option>
            <option value="Off">Off</option>
            <option value="Verde">Verde</option>
            <option value="Ambar">Ambar</option>
          </select>
        </label>
      </div>
    </fieldset><br>
      <div class="row">
        <label class="col-xs-2" for="[controladora]">
          <p>Controladora</p>
          <input class="col-xs-1" type="text" name="controladora" value="<?php echo $srow['controladora'] ?>">
        </label>
        <label class="col-xs-2" for="[switch]">
          <p>IP switch</p>
          <select class="col-xs-1" name="ip_switch">
            <option value="<?php echo $srow['ip_switch']; ?>">- <?php echo $srow['ip_switch']; ?></option>
            <?php
              Conexion::abrirConexion();
              $option = "SELECT DISTINCT ip_switch FROM switchs WHERE id_edificio = $edificio";
              $query = mysqli_query(Conexion::getConexion(), $option);
              Conexion::cerrarConexion();
              while ($row = mysqli_fetch_array($query)) {
             ?>
             <option value="<?php echo $row['ip_switch']; ?>"><?php echo $row['ip_switch']; ?></option>
             <?php } ?>
          </select>
        </label>
      </div>
      <label class="col-xs-1" for="[puerto]">
        <p>Puerto</p>
        <input class="col-xs-2" type="text" name="puerto" value="<?php echo $srow['puerto']; ?>">
      </label><br><br>
      <label class="col-xs-1" for="imagen">
        <p>Imagen</p>
        <input class="col-80" type="file" name="imagen">
      </label><br><br>
      <label class="col-xs-1" for="[informacion]">
        <p>Información</p>
        <textarea class="col-xs-1" name="informacion" rows="4"><?php echo $srow['informacion']; ?></textarea>
      </label><br><br>
      <button type="submit" name="id_inventario" class="boton default2" value="<?php echo $id_inventario; ?>">
        <i class="fas fa-share-square"></i> Enviar
      </button>
      <button type="button" name="button" onclick="window.history.go(-1)" class="boton default2">
        <i class="fas fa-times"></i> Cancelar
      </button>
    </form>
  </section>


<?php include 'struct/footer.php' ?>
