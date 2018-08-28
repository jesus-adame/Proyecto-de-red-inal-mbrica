<?php
include 'struct/header.php';
include 'php/conexion.class.php';
?>
<main class="wrapper contenido" id="wrapper">
  <h2>Control de Edificios</h2><br>
  <div class="radius" style="overflow-x:auto; margin:auto">
    <table class="box">
      <thead class="h1tabla">
        <tr>
          <th style="width: 10%">Número</th>
          <th style="width: 50%">nombre</th>
          <th style="max-width: 100px">Imagen</th>
          <?php if ($_SESSION['tipo'] == 1) { ?>
          <th class='id'>
            <a href="reg-agregar-edif.php" class="boton default"><i class="fas fa-plus-circle"></i> Agregar</a>
          </td>
          <?php } ?>
        </tr>
      </thead>
      <tbody>
      <?php
        Conexion::abrirConexion();
        $mostrar = "SELECT * FROM edificios";
        $resultado = mysqli_query(Conexion::getConexion(), $mostrar);
        Conexion::cerrarConexion();
        while ($row = mysqli_fetch_array($resultado)) { ?>
        <tr>
          <td>
            <a class="center boton2 col-xs-1" href="vista-edif.php?edif=<?php echo $row['id_edificio']; ?>"><?php echo $row['id_edificio']; ?></a>
          </td>
          <td><?php echo $row['nombre']; ?></td>
          <td style="position:relative">
            <img src="data:image/jpg; base64,<?php echo base64_encode($row['imagen']); ?>" alt="Edificio" style="max-width:130px; max-height:90px; margin:auto">
            <p class="cartel"><?php echo $row['estado']; ?></p>
          </td>
          <?php
          if ($_SESSION['tipo'] == 1) { ?>
          <td>
            <a class="center boton default2 col-xs-1" style="margin-bottom: .5em;" href="reg-editar-edif.php?id_edificio=<?php echo $row['id_edificio']; ?>">
              <i class="fas fa-edit"></i> Editar
            </a><br>
            <a class="center boton danger col-xs-1" href="php/func-eliminar-edif.php?id_edificio=<?php echo $row['id_edificio']; ?>">
              <i class="fas fa-times"></i> Eliminar
            </a>
          </td><?php
          } ?>
        </tr><?php
        } ?>
      </tbody>
    </table>
  </div>
</main>
<?php
include 'struct/footer.php';
?>
