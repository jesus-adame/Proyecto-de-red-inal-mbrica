<?php
include 'struct/header.php';
?>
<main class="contenido">
  <form class="formulario" action="index.html" method="post">
    <label class="col-xs-2" for="nombre">Nombre <br>
      <input class="col-xs-1" type="text" name="nombre" value="">
    </label>
    <label class="col-xs-2" for="[tipo]">Tipo <br>
      <select class="col-xs-1" name="tipo">
        <option value="1">Administrador</option>
        <option value="0">Monitor</option>
        <option value="2">Editor</option>
      </select>
    </label>
    <label class="col-xs-2" for="pass1">Contraseña <br>
      <input class="col-xs-1" type="password" name="pass1" value="">
    </label>
    <label class="col-xs-2" for="pass2">Repetir contraseña <br>
      <input class="col-xs-1" type="password" name="pass2" value="">
    </label>
    <label class="col-xs-1" for="descripcion">Descripción <br>
      <textarea class="col-xs-1" name="name" rows="4"></textarea>
    </label><br><br>
    <button class="boton default2" type="submit" name="button"><i class="fas fa-share-square"></i> Subir</button>
  </form>
</main>
<footer></footer>
</body>
</html>
