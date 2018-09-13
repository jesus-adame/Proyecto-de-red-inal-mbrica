<?php
class Switchs
{
  private $sys;
  private $mod;
  private $serie;
  private $firm;
  private $part;
  private $ip;
  private $edif;
  private $mac;

  public function __construct($sys = 0, $mod = 0, $serie = 0, $firm = 0,
  $part = 0, $ip = 0, $edif = 0, $mac = 0)
  {
    $this-> sys = $sys;
    $this-> mod = $mod;
    $this-> serie = $serie;
    $this-> firm = $firm;
    $this-> part = $part;
    $this-> ip = $ip;
    $this-> edif = $edif;
    $this-> mac = $mac;
  }

  public function insertar($con)
  {
    $sys = $this-> sys;
    $mod = $this-> mod;
    $serie = $this-> serie;
    $firm = $this-> firm;
    $part = $this-> part;
    $ip = $this-> ip;
    $edif = $this-> edif;
    $mac = $this-> mac;

    $query = "INSERT INTO switchs (sysname, modelo, serie, firmware,
    particion, ip_switch, id_edificio, actualizacion, mac)
    VALUES ('$sys', '$mod', '$serie', '$firm', '$part', '$ip', '$edif', NOW(), '$mac')";

    $execute = mysqli_query($con, $query);

    if ($execute) {
      return 1;
    } else {
      return 0;
    }
  }

  public function actualizar($con, $id)
  {
    $sys = $this-> sys;
    $mod = $this-> mod;
    $serie = $this-> serie;
    $firm = $this-> firm;
    $part = $this-> part;
    $ip = $this-> ip;
    $edif = $this-> edif;
    $mac = $this-> mac;

    $query = "UPDATE switchs SET sysname = $sys, modelo = $mod, serie = $serie, firmware = $firm,
    particion = $part, ip_switch = $ip, id_edificio = $edif, actualizacion = NOW(), mac = $mac";

    $execute = mysqli_query($con, $query);

    if ($execute) {
      return 1;
    } else {
      return 0;
    }
  }
}
?>
