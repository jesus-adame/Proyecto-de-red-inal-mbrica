<?php
  include 'struct/header.php';
  require 'php/conexion.class.php';
  $id_switch = $_GET['id_switch'];
?>
<main class="wrapper contenido">
  <form class="formulario box" action="php/func-editar-prop-sw.php" method="post" enctype="multipart/form-data">
    <h2>Actualizar switch # <?php echo $id_switch; ?></h2>
    <div class="center">
      <label class="col-xs-1" for="[imagen]">Imagen<br>
        <input class="col-80" type="file" name="imagen">
      </label><br><br>
      <button type="submit" name="id_switch" class="boton default2" value="<?php echo $id_switch; ?>">
        <i class="fas fa-share-square"></i> Enviar
      </button>
    </div>
  </form>
</main>
<footer></footer>
</body>
</html>
