<?php
  include_once 'struct/header.php';
  $edificio = $_GET['edif'];
?>
  <div class="wrapper contenido">
    <form id="Formr" class="formulario box" action="php/func-agregar-ap.php" method="post" enctype="multipart/form-data">
      <h3>Registro de AP</h3>
      <label class="col-xs-2" for="[inventario]">
        <p>Inventario</p>
        <input class="col-xs-1" type="text" name="inventario" required>
      </label>
      <label class="col-xs-2" for="[ip]">
        <p>IP</p>
        <input class="col-xs-1" type="text" name="ip" required>
      </label><br>
      <label class="col-xs-1" for="[mac1]">
        <p>Mac Address 1</p>
        <textarea class="col-xs-1" rows="2" type="text" name="mac1" required></textarea>
      </label><br>
      <label class="col-xs-1" for="[mac2]">
        <p>Mac Address 2</p>
        <textarea class="col-xs-1" rows="2" type="text" name="mac2" required></textarea>
      </label><br><br>
      <label class="col-xs-2" for="[canal1]">
        <p>Canal 1</p>
        <input class="col-xs-1" type="text" name="canal1" required>
      </label>
      <label class="col-xs-2" for="[canal2]">
        <p>Canal 2</p>
        <input class="col-xs-1" type="text" name="canal2" required>
      </label><br>
      <label class="col-xs-2" for="[serie]">
        <p>Serie</p>
        <input class="col-xs-1" type="text" name="serie" required>
      </label>
      <label class="col-xs-2" for="[planta]">
        <p>Selecciona una Planta</p>
        <select class="col-xs-1" name="planta" required>
          <option value="Baja">Baja</option>
          <option value="Alta">Alta</option>
          <option value="Nivel 1">Nivel 1</option>
          <option value="Nivel 2">Nivel 2</option>
          <option value="Nivel 3">Nivel 3</option>
          <option value="Nivel 4">Nivel 4</option>
          <option value="Nivel 5">Nivel 5</option>
          <option value="Nivel 6">Nivel 6</option>
          <option value="Mezzanine">Mezannine</option>
        </select>
      </label><br>
      <label class="col-xs-1" for="[edificio]">
        <input class="" type="hidden" name="edificio" value='<?php echo intval(preg_replace('/[^0-9]+/', '', $edificio), 10); ?>' required>
      </label>
      <div class="center">
        <button type="submit" name="submit" class="boton default2">
          <i class="fas fa-share-square"></i> Enviar
        </button>
        <button type="button" name="button" onclick="window.history.go(-1)" class="boton default2">
          <i class="fas fa-times"></i> Cancelar
        </button>
      </div>
    </form>
  </div>
<?php include 'struct/footer.php'; ?>
