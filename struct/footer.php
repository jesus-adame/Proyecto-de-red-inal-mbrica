<footer>
  <div style="display: flex; justify-content: space-between;">
    <address>Copyright© 2018 jesus.adame.sand@gmail.com</address>
    <?php
    if (isset($_SESSION['usuario'])) { ?>
    <ul><?php
      if ($_SESSION['tipo'] == 1 || $_SESSION['tipo'] == 2) { ?>
      <li>
        <a class="boton" href="control-usuarios.php">
          <i class="fas fa-users"></i> Usuarios
        </a>
      </li>
    <?php
      } ?>
      <li>
        <a class="boton" href="php/cerrar-sesion.php">
          <i class="fas fa-sign-out-alt"></i> Salir
        </a>
      </li>
    </ul><?php
    } ?>
  </div><br>
</footer>
<script type="text/javascript" src="apps/main.js"></script>
</body>
</html>
