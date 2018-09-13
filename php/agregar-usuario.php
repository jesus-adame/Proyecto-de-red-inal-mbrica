<?php
include 'conexion.class.php';
include 'rep_usuario.php';

$pass = $_POST['pass'];
$pass2 = $_POST['pass2'];
//$imagen = $_FILES['imagen']['name'];

if ($pass == $pass2 && (!empty($pass) && !empty($pass2))) {
  Conexion::abrirConexion();
  $usuario = new Usuario(
    $_POST['usuario'],
    $_POST['nombre'],
    $pass,
    $_POST['tipo'],
    $_POST['descripcion']
  );

  $verificar = $usuario->verificar(Conexion::getConexion());
  if ($verificar) {
    echo "<script>
    alert('Ya hay un registro con ese nombre de usuario');
    history.go(-1);
    </script>";
  } else {
    $insertar = $usuario->insertarUsuario(Conexion::getConexion());

    if ($insertar) {
      echo "<script>
      history.go(-2);
      alert('El usuario se registró correctamente');
      </script>";
    } else {
      echo "<script>
      alert('Hubo un error');
      history.go(-1);
      </script>";
    }
  }
} else {
  echo "<script>
  alert('Las contraseñas deben coincidir');
  history.go(-1);
  </script>";
}
?>
