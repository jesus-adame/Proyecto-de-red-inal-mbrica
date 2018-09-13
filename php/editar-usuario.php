<?php
include 'conexion.class.php';
include 'rep_usuario.php';

$pass = $_POST['pass'];
$pass2 = $_POST['pass2'];
$id = $_POST['id'];
$ruta = $_SERVER['DOCUMENT_ROOT'].'/wifi/imagenes/usuarios/';

if (isset($_FILES['imagen']['name']) && !empty($_FILES['imagen']['name'])) {
  $imagen = $_FILES['imagen']['name'];
} else {
  $imagen = '';
}

if ($pass == $pass2 && (!empty($pass) && !empty($pass2))) {
  Conexion::abrirConexion();
  $usuario = new Usuario(
    $_POST['usuario'],
    $_POST['nombre'],
    $pass,
    $_POST['tipo'],
    $_POST['descripcion']
  );
  $result = $usuario->editar(Conexion::getConexion(), $id, $imagen);
  Conexion::cerrarConexion();
  if ($result) {
    move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta.$imagen);

    echo "<script>
    history.go(-2);
    alert('Se ha editado correctamente');
    </script>";
  } else {
    echo "<script>
    alert('Hubo un error al editar');
    history.go(-1);
    </script>";
  }
} else {
  echo "<script>
  alert('Las contraseñas deben coincidir');
  history.go(-1);
  </script>";
}


?>
