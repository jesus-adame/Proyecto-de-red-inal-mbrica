<?php
include 'struct/header.php';
include 'php/conexion.class.php';
include 'php/rep_usuario.php';
if (!isset($_SESSION['tipo'])) {
  header('location: inicio.php'); // Evita el acceso a usuarios no identificados
}
Conexion::abrirConexion();
$usuario = new Usuario ();
$datos = $usuario-> mostrar(Conexion::getConexion(), $_SESSION['id']);
$miUsuario = mysqli_fetch_array($datos);
?>
<main class="contenido wrapper">
  <h3>Mi usuario</h3>
  <section class="row">
    <div class="col-xs-2" style="border: solid 1px #c1c1c1;
    border-radius:4px; overflow: hidden; display: flex;">
      <img style="max-width: 300px; margin:auto;"
      src="imagenes/usuarios/<?php
      if ($miUsuario['imagen'] != '') {
        echo $miUsuario['imagen'];
      } else {
        echo 'default-user.png';
      } ?>" alt="<?php echo $miUsuario['usuario']; ?>">
    </div>
    <div class="col-xs-2">
      <p style="line-height: 28px">Usuario : <strong><?php echo $miUsuario['usuario']; ?></strong></p>
      <p style="line-height: 28px">Nombre : <strong><?php echo $miUsuario['nombre']; ?></strong></p>
      <p style="line-height: 28px">Rol de usuario : <strong><?php
      switch ($miUsuario['tipo']) {
        case 1: echo "Control Total";
        break;
        case 0: echo "Lectura";
        break;
        case 2: echo "Escritura";
        break; } ?></strong></p><br>
      <fieldset style="padding:10px; border-radius:4px;">
        <form class="" action="php/cambiar-pass.php?us=<?php echo $miUsuario['usuario']; ?>" method="post">
          <label class="col-xs-1" for="pass">Contraseña :<br>
            <input id="pass" class="col-xs-1" type="password" name="pass" required>
          </label><br><br>
          <label class="col-xs-2" for="pass1">Nueva contraseña :<br>
            <input id="pass1" class="col-xs-1" type="password" name="pass1" required>
          </label>
          <label class="col-xs-2" for="pass2">Repetir nueva contraseña :<br>
            <input id="pass2" class="col-xs-1" type="password" name="pass2" required>
          </label>
          <button class="success boton" type="submit" name="button">Actualizar</button>
        </form>
      </fieldset>
    </div>
  </section><br><br><hr style="color: #c1c1c1"><br>
  <!--- SECCIÓN DOS --->
  <?php if (($_SESSION['tipo'] == 1 || $_SESSION['tipo'] == 2)) { ?>
  <h3>Control de usuarios</h3>
  <table>
    <thead>
      <tr>
        <th class="id">ID</th>
        <th>Usuario</th>
        <th>Nombre</th>
        <th>Roles</th>
        <th>Descripción</th>
        <th>Imagen</th>
        <?php if ($_SESSION['tipo'] == 1) { ?>
        <th><a class="boton default2" href="reg-agregar-usuario.php">
          <i class="fas fa-plus-circle"></i> Agregar</a>
        </th><?php } ?>
      </tr>
    </thead>
    <tbody>
      <?php
      $execute = $usuario-> mostrarTodos(Conexion::getConexion());
      while ($row = mysqli_fetch_array($execute)) { ?>
      <tr>
        <td><?php echo $row['id_usuario']; ?></td>
        <td><?php echo $row['usuario']; ?></td>
        <td><?php echo $row['nombre']; ?></td>
        <td><?php
        switch ($row['tipo']) {
          case '1':
            echo "Control total";// code...
            break;

          case '2':
            echo "Escritura / lectura";// code...
            break;

          case '0':
            echo "Lectura";// code...
            break;

          default:
            echo "Undefined";// code...
            break;
        } ?></td>
        <td><?php echo $row['descripcion']; ?></td>
        <td class="id"><img style="max-width:50%; margin:auto" src="imagenes/usuarios/<?php
        if ($row['imagen'] != '') {
          echo $row['imagen'];
        } else {
          echo 'default-user.png';
        } ?>" alt="<?php echo $row['usuario']; ?>"></td>
        <?php if ($_SESSION['tipo'] == 1) { ?>
        <td class="id">
          <a class="boton default2" style="margin-bottom: .2em;" href="reg-editar-usuario.php?id=<?php echo $row['id_usuario']; ?>">
            <i class="fas fa-edit"></i> Editar
          </a><br>
          <a class="boton danger" href="php/eliminar-usuario.php?id=<?php echo $row['id_usuario']; ?>">
            <i class="fas fa-times"></i> Eliminar
          </a>
        </td><?php } ?>
      </tr><?php
      } ?>
    </tbody>
  </table>
  <?php } ?>
</main>
<?php
include 'struct/footer.php';
?>
