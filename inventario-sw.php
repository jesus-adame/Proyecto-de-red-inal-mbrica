<?php
  include '../header.php';
  include 'conexion.class.php';
  $edificio = $_REQUEST['edif'];

  if (!isset($edificio)) {
    header('Location: index.php');
  }
?>
<main class="wrapper contenido" id="wrapper">
  <h1><?php echo $edificio; ?></h1><br>
  <img src="imagenes/<?php echo $edificio; ?>.png" alt="Imagen" class="maimg">
  <div>
    <a href="reg-agregar-sw.php?edif=<?php echo $edificio; ?>" class="boton">Agregar Switch</a>
  </div>
  <table class="box">
    <thead class="h1tabla">
      <tr>
        <td class="id">Inventario</td>
        <td class=''>Modelo</td>
        <td class='id'>Serie</td>
        <td class='id'>IP</td>
        <td class='id'>Edificio</td>
        <td class='id'>Imagen</td>
        <td class='id'>Editar</td>
      </tr>
    </thead>
    <tbody>
      <?php
      Conexion::abrirConexion();
      $mostrar = "SELECT * FROM switchs WHERE id_edificio = '$edificio'";
      $resultado = mysqli_query(Conexion::getConexion(), $mostrar);
      Conexion::cerrarConexion();
      while ($row = $resultado->fetch_assoc()) { ?>
      <tr>
        <td>
          <form class="" action="vista-sw.php" method="get">
            <input class="boton2 col-xs-4 wrapper" type="submit" name="inventario" value="<?php echo $row['id_switch']; ?>">
          </form>
        </td>
        <td><?php echo $row['modelo']; ?></td>
        <td><?php echo $row['serie']; ?></td>
        <td><?php echo $row['ip_switch']; ?></td>
        <td><?php echo $row['id_edificio']; ?></td>
        <td><?php echo $row['imagen']; ?></td>
        <td>
          <form class="wrapper" action="reg-editar-sw.php" method="post">
            <button class="boton col-xs-4" type="submit" name="button" value="<?php echo $row['id_switch']; ?>">Editar</button>
          </form>
          <form class="wrapper" action="php/func-eliminar-sw.php" method="post">
            <button class="boton col-xs-4" type="submit" name="button" value="<?php echo $row['id_switch']; ?>">Eliminar</button>
          </form>
        </td>
      </tr><?php
      } ?>
    </tbody>
  </table>
</main>
<?php
include '../footer.php';
?>
