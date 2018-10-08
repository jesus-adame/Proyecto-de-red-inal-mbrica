<?php
  include 'struct/header.php';
  require 'php/conexion.class.php';

  $id_ap = $_REQUEST['id_ap'];

  $mostrar = "SELECT * FROM accesspoints WHERE id_ap = '$id_ap'";
  Conexion::abrirConexion();
  $resultado = mysqli_query(Conexion::getConexion(), $mostrar);
  $row = $resultado -> fetch_assoc();
?>
    <section class="wrapper contenido">
      <form class="formulario box" action="php/func-editar-ap.php" method="post" enctype="multipart/form-data">
        <h3>Actualizar AP <?php echo $row['inventario']; ?></h3>
        <label class="col-xs-2" for="[inventario]">
          <p>Inventario</p>
          <input class="col-xs-1" type="text" name="inventario" value="<?php echo $row['inventario']; ?>" required>
        </label>
        <label class="col-xs-2" for="[ip]">
          <p>IP</p>
          <input class="col-xs-1" type="text" name="ip" value="<?php echo $row['IP']; ?>" required>
        </label><br>
        <label class="col-xs-1" for="[mac1]">
          <p>Mac Address 1</p>
          <textarea class="col-xs-1" rows="3" type="text" name="mac1" required><?php echo $row['Mac1']; ?></textarea>
        </label><br>
        <label class="col-xs-1" for="[mac2]">
          <p>Mac Address 2</p>
          <textarea class="col-xs-1" rows="3" type="text" name="mac2" required><?php echo $row['Mac2']; ?></textarea>
        </label><br><br>
        <label class="col-xs-1" for="[serie]">
          <p>Serie</p>
          <input class="col-xs-1" type="text" name="serie" value="<?php echo $row['Serie']; ?>" required>
        </label><br><br>
        <label class="col-xs-2" for="[canalr1]">
          <p>Canal 1</p>
          <input class="col-xs-1" type="text" name="canalr1" value="<?php echo $row['Canal1']; ?>" required>
        </label>
        <label class="col-xs-2" for="[canalr2]">
          <p>Canal 2</p>
          <input class="col-xs-1" type="text" name="canalr2" value="<?php echo $row['Canal2']; ?>" required>
        </label><br>
        <label class="col-xs-2" for="[planta]">
          <p>Planta</p>
          <select class="col-xs-1" name="planta" required>
            <option value="<?php echo $row['Planta']; ?>">- <?php echo $row['Planta']; ?> -</option>
            <option value="Alta">Alta</option>
            <option value="Baja">Baja</option>
            <option value="Nivel 1">Nivel 1</option>
            <option value="Nivel 2">Nivel 2</option>
            <option value="Nivel 3">Nivel 3</option>
            <option value="Nivel 4">Nivel 4</option>
            <option value="Nivel 5">Nivel 5</option>
            <option value="Nivel 6">Nivel 6</option>
            <option value="Mezzanine">Mezannine</option>
          </select>
        </label>
        <label class="col-xs-2" for="[edificio]">
          <p>Edificio</p>
          <input class="col-xs-1" type="text" placeholder="Numero de edificio" name="edificio" value="<?php echo $row['EdificioNum']; ?>" required>
        </label><br>
        <label class="col-xs-1" for="lugar">
          <p>Ubicación</p>
          <textarea class="col-xs-1" name="lugar" rows="4" cols="20"><?php echo $row['lugar']; ?></textarea>
        </label><br><br>
        <div class="center">
          <button type="submit" name="actualizar" value="<?php echo $id_ap; ?>" class="boton default2">
            <i class="fas fa-share-square"></i> Actualizar
          </button>
          <button type="button" name="button" onclick="window.history.go(-1)" class="boton default2">
            <i class="fas fa-times"></i> Cancelar
          </button>
        </div>
      </form>
    </section>
<?php include 'struct/footer.php'; ?>
