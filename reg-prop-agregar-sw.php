<?php
  include 'struct/header.php' ;
  require 'php/conexion.class.php';
  $id_switch = $_GET['id_switch'];
?>
<section class="main wrapper contenido">
    <form id="Formr" class="formulario box" action="php/func-agregar-prop-sw.php" method="post" enctype="multipart/form-data">
      <div class="center">
        <h2>Switch # <?php echo $id_switch; ?></h2>
        <label class="col-xs-1" for="[imagen]">Imagen<br>
          <input class="col-80" type="file" name="imagen">
        </label><br><br>
        <input type="hidden" name="id_switch" value="<?php echo $id_switch ?>">
        <button type="submit" name="submit" class="boton default2">
          <i class="fas fa-share-square"></i> Enviar
        </button>
      </div>
    </form>
</section>
<footer></footer>
</body>
</html>
