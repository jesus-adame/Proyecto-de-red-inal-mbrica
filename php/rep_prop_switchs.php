<?php
/**
 *
 */
class PropSwitchs
{
  private $imagen;
  private $sumistack;
  private $xgm3;
  private $xgm3sb;
  private $sfp;
  private $vim;

  function __construct($imagen = 0, $sumistack = 0, $xgm3 = 0, $xgm3sb = 0, $sfp = 0, $vim = 0)
  {
    $this-> imagen = $imagen;
    $this-> sumistack = $sumistack;
    $this-> xgm3 = $xgm3;
    $this-> xgm3sb = $xgm3sb;
    $this-> sfp = $sfp;
    $this-> vim = $vim;    // code...
  }

  public function insertar($con)
  {
    $imagen = $this-> imagen;
    $sumistack = $this-> sumistack;
    $xgm3 = $this-> xgm3;
    $xgm3sb = $this-> xgm3sb;
    $sfp = $this-> sfp;
    $vim = $this-> vim;

    $query = "INSERT INTO prop_switchs (imagen, sumistack, xgm3, xgm3sb, sfp, vim)
    VALUES ('$imagen', '$sumistack', '$xgm3', '$xgm3sb', '$sfp', '$vim')";

    $execute = mysqli_query($con, $query);
    if ($execute) {
      return 1;
    } else {
      return 0;
    }
  }

  public function editar($con, $id)
  {
    $imagen = $this-> imagen;
    $sumistack = $this-> sumistack;
    $xgm3 = $this-> xgm3;
    $xgm3sb = $this-> xgm3sb;
    $sfp = $this-> sfp;
    $vim = $this-> vim;

    if ($imagen == '') {
      $query = "UPDATE prop_switchs SET sumistack = '$sumistack',
      xgm3 = '$xgm3sb', xgm3sb = '$xgm3', sfp = '$sfp', vim = '$vim'
      WHERE id_switch = $id";
    } else {
      $query = "UPDATE prop_switchs SET imagen = '$imagen', sumistak = '$sumistack',
      xgm3 = '$xgm3sb', xgm3sb = '$xgm3', sfp = '$sfp', vim = '$vim'
      WHERE id_switch = $id";
    }

    $execute = mysqli_query($con, $query);
    if ($execute) {
      return 1;
    } else {
      return 0;
    }
  }

  public function mostrar($con, $id)
  {
    $query = "SELECT * FROM prop_switchs WHERE id_switch = $id";

    $execute = mysqli_query($con, $query);
    $datos = mysqli_fetch_array($execute);
    if ($execute) {
      return $datos;
    } else {
      return 0;
    }
  }
}

?>
