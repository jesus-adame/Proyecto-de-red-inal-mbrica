<?php
  include 'struct/header.php';
  require 'php/conexion.class.php';
  include 'php/rep_prop_switchs.php';
  $id = $_GET['id_switch'];
  Conexion::abrirConexion();
  $prop_sw = new PropSwitchs();
  $row = $prop_sw-> mostrar(Conexion::getConexion(), $id);
?>
<main class="wrapper contenido">
  <form class="formulario box" action="php/func-editar-prop-sw.php" method="post" enctype="multipart/form-data">
    <h2>Actualizar switch # <?php echo $id; ?></h2>
    <div class="">
      <input type="hidden" name="id" value="<?php echo $id; ?>">
      <label class="col-xs-1" for="[imagen]">Imagen<br>
        <input class="col-xs-1" type="file" name="imagen">
      </label><br><br>
      <fieldset class="div-padding center">
        <legend>Accesorios</legend><br>
        <label class="col-xs-1" for="[sumistack]">sumistack<br>
          <input class="col-80" type="text" name="sumistack" value="<?php echo $row['sumistack']; ?>">
        </label><br><br>
        <label class="col-xs-1" for="[xgm3]">xgm3<br>
          <input class="col-80" type="text" name="xgm3" value="<?php echo $row['xgm3']; ?>">
        </label><br><br>
        <label class="col-xs-1" for="[xgm3sb]">xgm3sb<br>
          <input class="col-80" type="text" name="xgm3sb" value="<?php echo $row['xgm3sb']; ?>">
        </label><br><br>
        <label class="col-xs-1" for="[sfp]">sfp<br>
          <input class="col-80" type="text" name="sfp" value="<?php echo $row['sfp']; ?>">
        </label><br><br>
        <label class="col-xs-1" for="[vim]">vim<br>
          <input class="col-80" type="text" name="vim" value="<?php echo $row['vim']; ?>">
        </label><br><br>
      </fieldset><br>
      <button type="submit" name="submit" class="boton default2">
        <i class="fas fa-share-square"></i> Enviar
      </button>
    </div>
  </form>
</main>
</body>
</html>
