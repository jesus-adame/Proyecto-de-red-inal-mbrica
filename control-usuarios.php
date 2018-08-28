<?php
include 'struct/header.php';
include 'php/conexion.class.php';
Conexion::abrirConexion();
?>
<main class="contenido wrapper">
  <h3>Control de usuarios</h3>
  <table>
    <thead>
      <tr>
        <th class="id">ID</th>
        <th>Nombre</th>
        <th>Tipo</th>
        <th>Descripción</th>
        <th><a class="boton default2" href="reg-agregar-usuario.php"><i class="fas fa-plus-circle"></i> Agregar</a></th>
      </tr>
    </thead>
    <tbody>
      <?php
      $query = "SELECT * FROM usuarios;";
      $execute = mysqli_query(Conexion::getConexion(),$query);
      while ($row = mysqli_fetch_array($execute)) { ?>
      <tr>
        <td><?php echo $row['id_usuario']; ?></td>
        <td><?php echo $row['usuario']; ?></td>
        <td><?php echo $row['tipo']; ?></td>
        <td><?php echo $row['descripcion']; ?></td>
        <td class="id">
          <a class="boton default2" style="margin-bottom: .2em;" href="#">
            <i class="fas fa-edit"></i> Editar
          </a><br>
          <a class="boton danger" href="#">
            <i class="fas fa-times"></i> Eliminar
          </a>
        </td>
      </tr><?php
      } ?>
    </tbody>
  </table>
</main>
<?php
include 'struct/footer.php';
?>
