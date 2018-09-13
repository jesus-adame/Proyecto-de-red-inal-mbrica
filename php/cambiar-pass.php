<?php
include 'rep_usuario.php';
include 'conexion.class.php';
Conexion::abrirConexion();

$usu = $_GET['us'];
$pass = $_POST['pass'];
$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];

$usuario = new Usuario($usu);
$validarUsuario = $usuario-> validarUsuarioClave(Conexion::getConexion(), $pass);

if ($validarUsuario) {
  if ($pass1 == $pass2) {
    $actualizar = $usuario-> cambiarPass(Conexion::getConexion(), $pass1);

    if ($actualizar) {
      echo "<script>
      alert('La clave se actualizó exitosamente');
      history.go(-1);
      </script>";
    } else {
      echo "<script>
      alert('Hubo un error al cambiar la contraseña');
      history.go(-1);
      </script>";
    }
  } else {
    echo "<script>
    alert('Las contraseñas no coinciden');
    history.go(-1);
    </script>";
  }
} else {
  echo "<script>
  alert('Contraseña incorrecta');
  history.go(-1);
  </script>";
}

?>
