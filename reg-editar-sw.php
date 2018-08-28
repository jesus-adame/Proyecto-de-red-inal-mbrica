<?php
  include 'struct/header.php';
  require 'php/conexion.class.php';

  $id_switch = $_REQUEST['switch'];

  $mostrar = "SELECT * FROM switchs WHERE id_switch = '$id_switch'";
  Conexion::abrirConexion();
  $resultado = mysqli_query(Conexion::getConexion(), $mostrar);
  $row = $resultado -> fetch_assoc();
?>
<div class="main wrapper contenido">
  <form id="Formr" class="formulario box" action="php/func-editar-sw.php" method="post" enctype="multipart/form-data">
    <h3>Editar Switch <?php echo $row['id_switch']; ?></h3>
    <label class="col-xs-2" for="[sysname]">Sysname <br>
      <input class="col-xs-1" type="text" name="sysname" value="<?php echo $row['sysname']; ?>">
    </label>
    <label class="col-xs-2" for="[modelo]">Modelo <br>
      <input class="col-xs-1" type="text" name="modelo" value="<?php echo $row['modelo']; ?>">
    </label>
    <label class="col-xs-2" for="[serie]">Serie <br>
      <input class="col-xs-1" type="text" name="serie" value="<?php echo $row['serie']; ?>">
    </label>
    <label class="col-xs-2" for="[firmware]">Firmware <br>
      <input class="col-xs-1" type="text" name="firmware" value="<?php echo $row['firmware']; ?>">
    </label>
    <label class="col-xs-2" for="[particion]">Partición <br>
      <input class="col-xs-1" type="text" name="particion" value="<?php echo $row['particion']; ?>">
    </label>
    <label class="col-xs-2" for="[ip_switch]">IP switch <br>
      <input class="col-xs-1" type="text" name="ip_switch" value="<?php echo $row['ip_switch']; ?>">
    </label>
    <label class="col-xs-2" for="[mac]">Mac address <br>
      <input class="col-xs-1" type="text" name="mac" value="<?php echo $row['mac']; ?>">
    </label>
    <input type="hidden" name="id_switch" value="<?php echo $row['id_switch']; ?>"><br>
    <div class="center">
      <button type="submit" name="actualizar" class="boton default2">
        <i class="fas fa-share-square"></i> Actualizar
      </button>
      <button class="boton default2" type="button" name="button" onclick="history.go(-1)">
        <i class="fas fa-times"></i> Cancelar
      </button>
    </div>
  </form>
</div>
<footer></footer>
</body>
</html>
