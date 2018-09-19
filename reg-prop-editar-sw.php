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
      <label class="col-xs-2" for="[imagen]">
        Imagen<br>
        <input class="col-xs-1" type="file" name="imagen">
      </label>

      <label class="col-xs-2" for="[parte]">
        No. Parte<br>
        <input class="col-xs-1" type="text" name="parte" value="<?php echo $row['parte']; ?>">
      </label><br>

      <fieldset class="div-padding center">
        <legend>Accesorios</legend><br>

        <label class="col-xs-1" for="[sumistack]">
          SUMISTACK<br>
          <input class="col-80" type="text" name="sumistack" value="<?php echo $row['sumistack']; ?>">
        </label><br><br>

        <label class="col-xs-1" for="[xgm3]">
          XGM3-2sf<br>
          <input class="col-80" type="text" name="xgm3" value="<?php echo $row['xgm3']; ?>">
        </label><br><br>

        <label class="col-xs-1" for="[xgm3sb]">
          XGM3SB-4sf<br>
          <input class="col-80" type="text" name="xgm3sb" value="<?php echo $row['xgm3sb']; ?>">
        </label><br><br>

        <label class="col-xs-1" for="[sfp]">
          SFP+_LR<br>
          <input class="col-80" type="text" name="sfp" value="<?php echo $row['sfp']; ?>">
        </label><br><br>

        <label class="col-xs-1" for="[vim]">
          VIM4-40G4x2<br>
          <input class="col-80" type="text" name="vim" value="<?php echo $row['vim']; ?>">
        </label><br><br>
      </fieldset><br>

      <label class="col-xs-1 center" for="[notas]">
        Notas<br>
        <textarea class="col-xs-1" name="notas" rows="3"><?php echo $row['notas']; ?></textarea>
      </label><br><br>

      <input type="hidden" name="id" value="<?php echo $id; ?>">

      <button type="submit" name="submit" class="boton default2">
        <i class="fas fa-share-square"></i> Enviar
      </button>
    </div>
  </form>
</main>
</body>
</html>
