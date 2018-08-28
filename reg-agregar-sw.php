<?php
  include 'struct/header.php';
  $edificio = $_GET['edif'];
?>
<section class="wrapper contenido">
  <form id="Formr" class="formulario box" action="php/func-agregar-sw.php" method="post" enctype="multipart/form-data">
    <h3>Registro de switch</h3>
    <label class="col-xs-2" for="[id_switch]">Inventario <br>
      <input class="col-xs-1" type="text" name="id_switch" required>
    </label>
    <label class="col-xs-2" for="[sysname]">Sysname <br>
      <input class="col-xs-1" type="text" name="sysname" required>
    </label>
    <label class="col-xs-2" for="[modelo]">Modelo <br>
      <input class="col-xs-1" type="text" name="modelo">
    </label>
    <label class="col-xs-2" for="[serie]">Serie <br>
      <input class="col-xs-1" type="text" name="serie" required>
    </label>
    <label class="col-xs-2" for="[firmware]">Firmware <br>
      <input class="col-xs-1" type="text" name="firmware" required>
    </label>
    <label class="col-xs-2" for="[particion]">Partición <br>
      <input class="col-xs-1" type="text" name="particion" required>
    </label>
    <label class="col-xs-2" for="[ip_switch]">IP Switch <br>
      <input class="col-xs-1" type="text" name="ip_switch">
    </label>
    <label class="col-xs-2" for="[mac]">Mac Address <br>
      <input class="col-xs-1" type="text" name="mac" required>
    </label><br>
    <input class="col-xs-1" type="hidden" name="edificio" value='<?php echo intval(preg_replace('/[^0-9]+/', '', $edificio), 10); ?>'>
    <div class="center">
      <button class="boton default2" type="submit" name="submit"><i class="fas fa-share-square"></i> Enviar</button>
    </div>
  </form>
</section>
<footer></footer>
</body>
</html>
