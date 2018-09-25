<?php
include 'struct/header.php';
include 'php/conexion.class.php';

$id_edificio = $_GET['edif'];
Conexion::abrirConexion();

$query = "SELECT * FROM edificios INNER JOIN mapa_edificio
ON edificios.id_edificio = mapa_edificio.id_edificio WHERE edificios.id_edificio = $id_edificio";

$execute = mysqli_query(Conexion::getConexion(), $query);
$row = mysqli_fetch_array($execute);
?>
<main class="wrapper contenido">
  <hgroup>
    <h2>Planos del edifico <?php echo $id_edificio; ?></h2>
    <h3><?php echo $row['nombre']; ?></h3>
  </hgroup>
  <article>
    <?php
    if (!$row) {
    ?>
    <div class="center" style="height:300px;">
      <h3>No hay planos de AP disponibles.</h3>
      <p>Por el momento no hay mas datos disponible.</p>
      <?php if ($_SESSION['tipo'] == 1) { ?>
      <p>Agregar los datos faltantes.</p><br>
      <a class="boton default2" href="reg-agregar-mapa.php?id_edificio=<?php echo $id_edificio; ?>">
        Agregar Plano
      </a>
      <?php } ?>
    </div><?php
    } else { ?>
    <div class="wrapper" style="padding: 0 4em">
      <p style="font-size:95%;"><?php echo nl2br($row['descripcion']); ?></p>
      <br>
      <img class="wrapper borde" src="imagenes/planos/<?php echo $row['mapa']; ?>" alt=""><br>
      <?php if (!empty($row['mapa2'])) { ?>
      <img class="wrapper borde" src="imagenes/planos/<?php echo $row['mapa2']; ?>" alt=""><br>
      <?php } ?>
      <?php if (!empty($row['mapa3'])) { ?>
      <img class="wrapper borde" src="imagenes/planos/<?php echo $row['mapa3']; ?>" alt=""><br>
      <?php } ?>
      <?php if ($_SESSION['tipo'] == 1) { ?>
    </div><br>
    <div class="center">
      <a class="boton default2" href="reg-editar-mapa.php?id_edificio=<?php echo $id_edificio; ?>">
        <i class="fas fa-edit"></i> Editar
      </a>
      <a class="boton danger" href="php/func-eliminar-mapa.php?id_edificio=<?php echo $id_edificio; ?>">
        <i class="fas fa-times"></i> Eliminar
      </a>
    </div>
    <?php } } ?>
  </article>
</main>
<?php
include 'struct/footer.php';
?>
