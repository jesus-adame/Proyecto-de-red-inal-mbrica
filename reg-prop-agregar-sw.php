<?php
  include 'struct/header.php' ;
  require 'php/conexion.class.php';
  $id_switch = $_GET['id_switch'];
?>
<section class="main wrapper contenido">
    <form id="Formr" class="formulario box" action="php/func-agregar-prop-sw.php"
    method="post" enctype="multipart/form-data">
      <div class="center">
        <h2>Switch # <?php echo $id_switch; ?></h2>

        <label class="col-xs-2" for="[imagen]">
          Imagen<br>
          <input class="col-xs-1" type="file" name="imagen">
        </label>

        <label class="col-xs-2" for="[parte]">
          Parte<br>
          <input class="col-xs-1" type="text" name="parte">
        </label><br>

        <fieldset class="div-padding center">
          <legend>Accesorios</legend><br>

          <label class="col-xs-1" for="[sumistack]">
            SUMISTACK<br>
            <input class="col-80" type="text" name="sumistack">
          </label><br><br>

          <label class="col-xs-1" for="[xgm3]">
            XGM3-2sf<br>
            <input class="col-80" type="text" name="xgm3">
          </label><br><br>

          <label class="col-xs-1" for="[xgm3sb]">
            XGM3SB-4sf<br>
            <input class="col-80" type="text" name="xgm3sb">
          </label><br><br>

          <label class="col-xs-1" for="[sfp]">
            SFP+_LR<br>
            <input class="col-80" type="text" name="sfp">
          </label><br><br>

          <label class="col-xs-1" for="[vim]">
            VIM4-40G4x2<br>
            <input class="col-80" type="text" name="vim">
          </label><br><br>
        </fieldset><br>

        <label class="col-xs-1 center" for="[notas]">
          Notas<br>
          <textarea class="col-xs-1" name="notas" rows="3"></textarea>
        </label><br><br>

        <input type="hidden" name="id_switch" value="<?php echo $id_switch; ?>">

        <button type="submit" name="submit" class="boton default2">
          <i class="fas fa-share-square"></i> Enviar
        </button>
      </div>
    </form>
</section>
</body>
</html>
