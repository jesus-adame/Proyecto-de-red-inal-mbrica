<?php
class Usuario
{
  private $usuario;
  private $nombre;
  private $pass;
  private $tipo;
  private $descripcion;

  public function __construct($usuario = 0, $nombre = 0, $pass = 0, $tipo = 0, $desc = 0){
    $this-> usuario = $usuario;
    $this-> nombre = $nombre;
    $this-> pass = $pass;
    $this-> tipo = $tipo;
    $this-> descripcion = $desc;
  }

  public function verificar($con)
  {
    $us = $this-> usuario;
    $query = "SELECT id_usuario FROM usuarios WHERE usuario = '$us'";

    $exe = mysqli_query($con, $query);

    if (mysqli_num_rows($exe)) {
      return 1;
    } else {
      return 0;
    }
  }

  public function insertarUsuario($con)
  {
    $u = $this-> usuario;
    $n = $this-> nombre;
    $p = $this-> pass;
    $t = $this-> tipo;
    $d = $this-> descripcion;

    $query = "INSERT INTO usuarios (
    usuario, nombre, pass, tipo, imagen, descripcion) VALUES ('$u', '$n', '$p', $t, '', '$d');";

    $execute = mysqli_query($con, $query);

    if ($execute) {
      return 1;
    } else {
      return 0;
    }
  }

  public function editar($con, $id, $img)
  {
    $u = $this-> usuario;
    $n = $this-> nombre;
    $p = $this-> pass;
    $t = $this-> tipo;
    $d = $this-> descripcion;

    if ($img == '') {
      $query = "UPDATE usuarios
      SET usuario = '$u', nombre = '$n', pass = '$p', tipo = '$t',
      descripcion = '$d' WHERE id_usuario = '$id';";
    } else {
      $query = "UPDATE usuarios
      SET usuario = '$u', nombre = '$n', pass = '$p', tipo = '$t', descripcion = '$d',
      imagen = '$img' WHERE id_usuario = '$id';";
    }

    $execute = mysqli_query($con, $query);
    if ($execute) {
      return 1;
    } else {
      return 0;
    }
  }

  public function eliminar($con, $id)
  {
    $query = "DELETE FROM usuarios WHERE id_usuario = $id;";
    $execute = mysqli_query($con, $query);

    if ($execute) {
      return 1;
    } else {
      return 0;
    }
  }

  public function mostrar($con, $id)
  {
    $query = "SELECT * FROM usuarios WHERE id_usuario = $id;";
    $execute = mysqli_query($con, $query);
    if ($execute) {
      return $execute;
    }
  }

  public function mostrarTodos($con)
  {
    $query = "SELECT * FROM usuarios;";
    $execute = mysqli_query($con, $query);
    if ($execute) {
      return $execute;
    }
  }

  public function iniciarSesion($con, $pass)
  {
    $usu = $this-> usuario;

    $execute = array();
    $query = "SELECT * FROM usuarios WHERE usuario = '$usu' AND pass = '$pass'";
    $execute = mysqli_query($con, $query);

    $row = mysqli_fetch_array($execute);

    if ($row) {
      $_SESSION['usuario'] = $row['usuario'];
      $_SESSION['id'] = $row['id_usuario'];
      $_SESSION['tipo'] = $row['tipo'];

      return 1;
    } else {
      return 0;
    }
  }

  public function validarUsuarioClave($con, $pass)
  {
    $usu = $this-> usuario;

    $query = "SELECT * FROM usuarios WHERE usuario = '$usu' AND pass = '$pass'";
    $execute = mysqli_query($con, $query);

    if (mysqli_num_rows($execute) > 0) {
      return 1;
    } else {
      return 0;
    }
  }

  public function cambiarPass($con, $pass1)
  {
    $usu = $this-> usuario;
    $query = "UPDATE usuarios SET pass = '$pass1' WHERE usuario = '$usu'";
    $execute = mysqli_query($con, $query);

    if ($execute) {
      return 1;
    } else {
      return 0;
    }
  }
}
?>
