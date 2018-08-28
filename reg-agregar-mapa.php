<?php
include 'struct/header.php';

$id_edificio=$_GET['id_edificio'];
?>
<main class="wrapper contenido">
  <form class="formulario" action="php/func-agregar-mapa.php" method="post" enctype="multipart/form-data">
    <h3>Imágenes Edificio <?php echo $id_edificio; ?></h3>
    <label class="col-xs-1" for="mapa">Descripción: <br>
      <textarea class="col-xs-1" name="descripcion" rows="3"></textarea>
    </label><br><br>
    <label class="col-xs-1" for="mapa">Plano 1 <br>
      <input class="col-80" type="file" name="mapa" required>
    </label><br><br>
    <label class="col-xs-1" for="mapa2">Plano 2(opcional) <br>
      <input class="col-80" type="file" name="mapa2">
    </label><br><br>
    <label class="col-xs-1" for="mapa3">Plano 3(opcional) <br>
      <input class="col-80" type="file" name="mapa3">
    </label><br><br>
    <input type="hidden" name="id_edificio" value="<?php echo $id_edificio; ?>">
    <div class="center">
    <button class="boton default2" type="submit" name="button">
      <i class="fas fa-share-square"></i> Registrar
    </button>
    <button type="button" name="button" onclick="window.history.go(-1)" class="boton default2">
      <i class="fas fa-times"></i> Cancelar
    </button>
    </div>
  </form>
</main>
<footer></footer>
</body>
</html>
