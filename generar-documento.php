<?php
include 'struct/header.php';
?>
<main class="wrapper contenido">
  <form class="formulario" action="php/func-generar-doc.php" method="post">
    <label class="col-xs-1" for="asunto">
      <p>Asunto: </p>
      <input class="col-xs-1" type="text" name="asunto" value="">
    </label><br><br>
    <label class="col-xs-1" for="descripcion">
      <p>Descripción: </p>
      <textarea class="col-xs-1" name="descripcion"></textarea>
    </label><br><br>
    <button class="boton success" type="submit" name="button">Generar</button>
  </form>
</main>
<?php
include 'struct/footer.php';
?>
