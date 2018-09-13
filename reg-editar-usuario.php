<?php
$id = $_GET['id'];
if ($id == '1' || $id == 2 || $id == 3) {
  echo "<script>
  alert('Este usuario no se puede editar');
  history.go(-1);
  </script>";
  exit;
}
include 'struct/header.php';
include 'php/conexion.class.php';
include 'php/rep_usuario.php';
Conexion::abrirConexion();

$usuario = new Usuario();
$datos = $usuario->mostrar(Conexion::getConexion(), $id);
Conexion::cerrarConexion();
$row = mysqli_fetch_array($datos);
?>
<main class="contenido">
  <form class="formulario" action="php/editar-usuario.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
    <label class="col-xs-2" for="nombre">Usuario <br>
      <input class="col-xs-1" type="text" name="usuario" value="<?php echo $row['usuario']; ?>">
    </label>
    <label class="col-xs-2" for="nombre">Nombre <br>
      <input class="col-xs-1" type="text" name="nombre" value="<?php echo $row['nombre']; ?>">
    </label>
    <label class="col-xs-2" for="pass">Contraseña <br>
      <input class="col-xs-1" type="password" name="pass" value="">
    </label>
    <label class="col-xs-2" for="pass2">Repetir contraseña <br>
      <input class="col-xs-1" type="password" name="pass2" value="">
    </label>
    <label class="col-xs-2" for="[tipo]">Tipo <br>
      <select class="col-xs-1" name="tipo">
        <option value="<?php echo $row['tipo']; ?>">Editar</option>
        <option value="1">Administrador</option>
        <option value="0">Monitor</option>
        <option value="2">Editor</option>
      </select>
    </label>
    <label class="col-xs-2" for="imagen">Imagen <br>
      <input class="col-xs-1" type="file" name="imagen" value="">
    </label>
    <label class="col-xs-1" for="descripcion">Descripción <br>
      <textarea class="col-xs-1" name="descripcion" rows="4"><?php echo $row['descripcion']; ?></textarea>
    </label><br><br>
    <button class="boton default2" type="submit" name="button"><i class="fas fa-share-square"></i> Actualizar</button>
  </form>
</main>
</body>
</html>
