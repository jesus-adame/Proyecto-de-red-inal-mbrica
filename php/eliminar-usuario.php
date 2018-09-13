<?php
$id = $_GET['id'];
if ($id == '1' || $id == 2 || $id == 3) {
  echo "<script>
  alert('Este usuario no se puede eliminar');
  history.go(-1);
  </script>";
  exit;
}
include 'conexion.class.php';
include 'rep_usuario.php';
Conexion::abrirConexion();

$usuario = new Usuario();
$ruta = $_SERVER['DOCUMENT_ROOT'].'/wifi/imagenes/usuarios/';
$id = $_GET['id'];

$old_file = mysqli_query(Conexion::getConexion(), "SELECT imagen FROM usuarios WHERE id_usuario = $id");
$row = mysqli_fetch_array($old_file);

$resultado = $usuario->eliminar(Conexion::getConexion(), $id);
if ($resultado) {
  if ($row['imagen'] != '') {
    unlink($ruta.$row['imagen']);
  }
  echo "<script>
  history.go(-1);
  alert('Se eliminó correctamente');
  </script>";
} else {
  echo "<script>
  alert('Hubo un error');
  history.go(-1);
  </script>";
}
?>
