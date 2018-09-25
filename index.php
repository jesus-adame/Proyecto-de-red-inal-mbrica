<?php
  include 'struct/header.php';
  include 'sql/repositorio_edificios.php';
  include 'php/conexion.class.php';
?>
<section class="maimg contenido">
  <img src="imagenes/uaem.jpg">
</section><hr style="color:#c1c1c1"><br>
<main class="wrapper">
  <h2>Despliegue de red inalámbrica del Campus Chamilpa</h2>
  <ul class="galeria">
  <?php
    Conexion::abrirConexion();
    $edificios = new Edificio();
    $query = $edificios->mostrarTodos(Conexion::getConexion());
    Conexion::cerrarConexion();
    while ($row = mysqli_fetch_array($query)) {
      if ($row['estado'] != 'No disponible') { ?>
    <li>
      <a class="boton2 box" style="padding:1px" href="vista-edif.php?edif=<?php echo $row['id_edificio']; ?>">
        <?php echo $row['id_edificio']; ?>
        <img src="imagenes/edificios/<?php echo $row['img_edif']; ?>" width="80" height="50">
      </a>
    </li>
  <?php } } ?>
  </ul>
  <div class="center">
  <a class='boton default2' href="inventario-edif.php"><i class="fas fa-cog fa-spin"></i> Control Edificios</a>
  </div>
</main>
<?php
include 'struct/footer.php';
?>
