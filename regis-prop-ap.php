<?php
  include 'struct/header.php';
  require 'php/conexion.class.php';
  $id_inventario = $_GET['inventario'];
  $edificio = $_GET['edif'];
?>
<section class="wrapper contenido">
  <form id="Formr" class="formulario box" action="php/func-agregar-prop-ap.php" method="post" enctype="multipart/form-data">
    <h2>Registrar AP <?php echo $id_inventario; ?></h2>
    <fieldset>
      <legend>LED</legend>
      <div class="row">
      <label class="col-xs-3 col-md-5" for="[power]">On/Off<br>
        <select class="col-xs-1" name="power">
          <option value="Off">Off</option>
          <option value="Verde">Verde</option>
          <option value="Ambar">Ambar</option>
        </select>
      </label>
      <label class="col-xs-3 col-md-5" for="[lan1]">LAN1<br>
        <select class="col-xs-1" name="lan1">
          <option value="Off">Off</option>
          <option value="Verde">Verde</option>
          <option value="Ambar">Ambar</option>
        </select>
      </label>
      <label class="col-xs-3 col-md-5" for="[lan2]">LAN2<br>
        <select class="col-xs-1" name="lan2">
          <option value="Off">Off</option>
          <option value="Verde">Verde</option>
          <option value="Ambar">Ambar</option>
        </select>
      </label>
      <label class="col-xs-3 col-md-5" for="[radio1]">Radio1 <br>
        <select class="col-xs-1" name="radio1">
          <option value="Off">Off</option>
          <option value="Verde">Verde</option>
          <option value="Ambar">Ambar</option>
        </select>
      </label>
      <label class="col-xs-3 col-md-5" for="[radio2]">Radio2<br>
        <select class="col-xs-1" name="radio2">
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
        <input class="col-xs-1" type="text" name="controladora">
      </label>
      <label class="col-xs-2" for="[switch]">
        <p>Ip Switch</p>
        <select class="col-xs-1" name="ip_switch" require>
          <option>Selecciona IP</option>
          <?php
          Conexion::abrirConexion();
          $option = "SELECT DISTINCT ip_switch FROM switchs WHERE id_edificio = $edificio";
          $query = mysqli_query(Conexion::getConexion(), $option);
          Conexion::cerrarConexion();
          while ($row = mysqli_fetch_array($query)) { ?>
          <option value="<?php echo $row['ip_switch']; ?>"><?php echo $row['ip_switch']; ?></option>
          <?php } ?>
        </select>
      </label>
    </div>
    <label class="col-xs-1" for="[puerto]">
      <p>Puerto</p>
    <input class="col-xs-2" type="text" name="puerto">
  </label><br><br>
    <label class="col-xs-1" for="imagen">
      <input class="col-80" type="file" name="imagen">
    </label><br><br>
    <label class="col-xs-1" for="[informacion]">
      <p>Información</p>
    <textarea class="col-xs-1" name="informacion" rows="4"></textarea>
    </label><br><br>
    <div class="center">
      <button type="submit" name="id_inventario" class="boton default2" value="<?php echo $id_inventario; ?>">
        <i class="fas fa-share-square"></i> Enviar
      </button>
      <button type="button" name="button" onclick="window.history.go(-1)" class="boton default2">
        <i class="fas fa-times"></i> Cancelar
      </button>
    </div>
  </form>
</section>
<?php include 'struct/footer.php'; ?>
