 <?php
include 'struct/header.php';
include 'php/conexion.class.php';

$id_edificio = $_GET['id_edificio'];
Conexion::abrirConexion();
$query = "SELECT * FROM mapa_edificio WHERE id_edificio = $id_edificio";
$execute = mysqli_query(Conexion::getConexion(), $query);
Conexion::cerrarConexion();
$row = mysqli_fetch_array($execute);
?>
<section class="wrapper contenido">
  <form class="formulario" action="php/func-editar-mapa.php" method="post" enctype="multipart/form-data">
    <h3>Imágenes Edificio <?php echo $id_edificio; ?></h3>
    <label class="col-xs-1" for="mapa">Descripción: <br>
      <textarea class="col-xs-1" name="descripcion" rows="3"><?php echo $row['descripcion']; ?></textarea>
    </label><br><br>
    <label class="col-xs-1" for="mapa">Plano 1 <br>
      <img class="min wrapper" src="imagenes/planos/<?php echo $row['mapa'];?>" alt=""><br>
      <input class="col-80" type="file" name="mapa">
    </label><br><br>
    <label class="col-xs-1" for="mapa">Plano 2 (opcional) <br>
      <img class="min wrapper" src="imagenes/planos/<?php echo $row['mapa2'];?>" alt=""><br>
      <input class="col-80" type="file" name="mapa2">
    </label><br><br>
    <label class="col-xs-1" for="mapa3">Plano 3 (opcional) <br>
      <img class="min wrapper" src="imagenes/planos/<?php echo $row['mapa3'];?>" alt=""><br>
      <input class="col-80" type="file" name="mapa3">
    </label><br><br>
    <input type="hidden" name="id_edificio" value="<?php echo $id_edificio; ?>">
    <div class="center">
      <button class="boton default2" type="submit" name="button">
        <i class="fas fa-share-square"></i> Actualizar
      </button>
      <button type="button" name="button" onclick="window.history.go(-1)" class="boton default2">
        <i class="fas fa-times"></i> Cancelar
      </button>
    </div>
  </form>
</section>
<?php
include 'struct/footer.php';
?>
