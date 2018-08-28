<?php
include 'struct/header.php';
include 'php/conexion.class.php';

$id_edificio = $_REQUEST['id_edificio'];

$query = "SELECT * FROM edificios WHERE id_edificio = $id_edificio";
Conexion::abrirConexion();
$execute = mysqli_query(Conexion::getConexion(), $query);
$row = mysqli_fetch_array($execute);
?>
<section class="wrapper contenido">
  <form class="formulario box" action="php/func-editar-edif.php" method="post" enctype="multipart/form-data">
    <h3>Editar edificio edificio <?php echo $row['id_edificio']; ?></h3>
    <label class="col-xs-1" for="nombre"><p>Nombre</p>
      <input class="col-xs-1" type="text" name="nombre" value="<?php echo $row['nombre']; ?>">
    </label><br><br>
    <label class="col-xs-2" for="id_edificio"><p>Número de edificio</p>
      <input class="col-xs-1" type="text" name="id_edificio" value="<?php echo $row['id_edificio']; ?>">
    </label>
    <label class="col-xs-2" for="estado"><p>Estado</p>
    <select class="col-xs-1" name="estado">
      <option value="<?php echo $row['estado']; ?>">- Editar</option>
      <option value="activo">Activo</option>
      <option value="No disponible">No disponible</option>
    </select>
  </label><br><br>
    <label class="col-xs-1" for="imagen"><p>Imagen</p>
      <img class="min wrapper" src="data:image/jpg;base64,<?php echo base64_encode($row['imagen']); ?>" alt=""><br>
      <input class="col-80" type="file" name="imagen" required>
    </label><br><br>
    <div class="center">
    <button type="submit" name="edificio" class="boton default2">
      <i class="fas fa-share-square"></i> Enviar
    </button>
    </div>
  </form>
</section>
<footer></footer>
</body>
</html>
