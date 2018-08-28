<?php
  include 'struct/header.php';
  require 'php/conexion.class.php';
?>
<main class="wrapper contenido">
  <img src="imagenes/uaem.jpg" class="maimg">
  <h2>Despliegue de red inalámbrica del Campus Chamilpa</h2>
  <ul class="galeria">
  <?php
    Conexion::abrirConexion();
    $query = mysqli_query(Conexion::getConexion(), "SELECT * FROM edificios");
    while ($row = mysqli_fetch_array($query)) {
      if ($row['estado'] != 'No disponible') { ?>
    <li>
      <a class="boton2 box" style="padding:1px" href="vista-edif.php?edif=<?php echo $row['id_edificio']; ?>">
        <?php echo $row['id_edificio']; ?>
        <img src="data: image/jpg; base64,<?php echo base64_encode($row['imagen']); ?>" width="80" height="50">
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
