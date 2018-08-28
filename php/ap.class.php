<?php
  /**Objeto accespoint
   *
   */
  class AccessPoint
  {
    private $edificio;
    private $inventario;
    private $ip;
    private $mac1;
    private $mac2;
    private $serie;
    private $canal1;
    private $canal2;
    private $planta;
    private $fecha;

    public function __construct($inventario,$ip,$mac1,$mac2,$serie,$canal1,$canal2,$planta,$edificio){
      $this -> Inventario = $inventario;
      $this -> ip = $ip;
      $this -> mac1 = $mac1;
      $this -> mac2 = $mac2; // code...
      $this -> serie = $serie;
      $this -> canal1 = $canal1;
      $this -> canal2 = $canal2;
      $this -> planta = $planta;
      $this -> edificio = $edificio;
    }

    public function obtener_edificio(){
      return $this -> edificio;
    }
    public function obtener_inventario(){
      return $this -> inventario;
    }
    public function obtener_ip(){
      return $this -> ip;
    }
    public function obtener_mac1(){
      return $this -> mac1;
    }
    public function obtener_mac2(){
      return $this -> mac2;
    }
    public function obtener_serie(){
      return $this -> serie;
    }
    public function obtener_canal1(){
      return $this -> canal1;
    }
    public function obtener_canal2(){
      return $this -> canal2;
    }
    public function obtener_planta(){
      return $this -> planta;
    }
    public function obtener_fecha(){
      return $this -> fecha;
    }

    public function getAtributo($atributo,$id_ap){
      if (isset($atributo)&& isset($id_ap)) {
        $query = "SELECT $atributo FROM accesspoints WHERE id='$id_ap'";
        $get=mysqli_query(Conexion::getConexion(),$query);
        $atributo = mysqli_fetch_array($get);
        return $atributo;     // code...
      }
      if ($atributo==$inventario) {
        return $id;     // code...
      }
      if ($atributo==$ip) {
        return $id;     // code...
      }
      if ($atributo==$mac1) {
        return $id;     // code...
      }
      if ($atributo==$mac2) {
        return $id;     // code...
      }
    }
  }
?>
