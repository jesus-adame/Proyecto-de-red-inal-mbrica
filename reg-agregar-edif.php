<?php
include 'struct/header.php';
?>
<main class="wrapper contenido">
  <form class="formulario box" action="php/func-agregar-edif.php" method="post" enctype="multipart/form-data">
    <h3>Agregar edificio</h3>
    <label class="col-xs-1" for="nombre"><p>Nombre</p>
      <input class="col-xs-1" type="text" name="nombre">
    </label><br><br>
    <label class="col-xs-1" for="id_edificio"><p>Número de edificio #</p>
      <input class="col-xs-2" type="text" name="id_edificio">
    </label><br><br>
    <label class="col-xs-1" for="imagen"><p>Imagen</p>
      <input class="col-80" type="file" name="imagen" required>
    </label><br><br>
    <div class="center">
    <button class="boton default2 col-xs-2" type="submit" name="edificio">
      <i class="fas fa-share-square"></i> Agregar
    </button>
    </div>
  </form>
</main>
<footer></footer>
</body>
</html>
