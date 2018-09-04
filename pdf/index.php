<?php
require 'plantilla.php';
include '../php/conexion.class.php';
// Recibo el edificio que deceo examinar.
$edif = $_GET['edif'];
// Se realiza una consulta a la DB.
$query = "SELECT * FROM accesspoints WHERE EdificioNum = $edif";
$querySW = "SELECT * FROM switchs WHERE id_edificio = $edif";

Conexion::abrirConexion();
$execute = mysqli_query(Conexion::getConexion(), $query);
$executeSW = mysqli_query(Conexion::getConexion(), $querySW);
Conexion::cerrarConexion();

$pdf = new PDF('L','mm','A4'); // Se crea el objeto pdf con la clase PDF.
$pdf->AliasNbPages(); // Permite obtener el número de páginas con el caracter {nb}
$pdf->AddPage();  // Se crea la primer página
// Estilo del header de la tabla.
$pdf->SetFont('Arial', 'B', 13);
// Se setear color de fondo y tipo de letra que tomará título de la tabla.
$pdf->Write(10, 'Access Points Edificio - '.$edif);
$pdf->Ln();
/*------------------------------- Tabla 1 -------------------------------*/
$pdf->SetFillColor(232, 232, 232);
$pdf->SetFont('Arial', 'B', 9);
// Encabezado de la tabla de APS.
$pdf->Cell(18, 8, 'INV.', 1, 0, 'C', 1);
$pdf->Cell(26, 8, 'IP', 1, 0, 'C', 1);
$pdf->Cell(50, 8, 'MAC 1', 1, 0, 'C', 1);
$pdf->Cell(50, 8, 'MAC 2', 1, 0, 'C', 1);
$pdf->Cell(30, 8, 'SERIE', 1, 0, 'C', 1);
$pdf->Cell(18, 8, 'RADIO 1', 1, 0, 'C', 1);
$pdf->Cell(18, 8, 'RADIO 2', 1, 0, 'C', 1);
$pdf->Cell(20, 8, 'PLANTA', 1, 0, 'C', 1);
$pdf->Cell(50, 8, 'LUGAR', 1, 0, 'C', 1);
$pdf->Ln();
// Fuente del cuerpo de la tabla.
$pdf->SetFont('Arial', '', 9);
// Cuerpo de la tabla de APS con registros de la DB.
$pdf->SetWidths(array(50, 50));
while ($row = mysqli_fetch_array($execute)) {
  $pdf->Cell(18, 14, $row['inventario'], 1, 0, 'C');
  $pdf->Cell(26, 14, $row['IP'], 1, 0, 'C');
  $pdf->Row(array(
    $row['Mac1'],
    $row['Mac1'],
    ));
    $pdf->Cell(30, 14, $row['Serie'], 1, 0, 'C');
    $pdf->Cell(18, 14, $row['Canal1'], 1, 0, 'C');
    $pdf->Cell(18, 14, $row['Canal2'], 1, 0, 'C');
    $pdf->Cell(20, 14, $row['Planta'], 1, 0, 'C');
    $pdf->Cell(50, 14, utf8_decode($row['lugar']), 1, 0, 'C');
  $pdf->Ln(14);
}
$pdf->Ln();
$h = $pdf->GetPageHeight();
$y = $pdf->GetY();
//$pdf->Write(10, utf8_decode("Alto de página: $h posición actual: $y"));
if ($y >= 145) {
  $pdf->AddPage();
}

/*------------------------------ Tabla 2 ------------------------------*/
// Estilo del header de la tabla SW.
$pdf->SetFont('Arial', 'B', 13);
// Se setear el color de fondo y el tipo de letra que tomará el encabezado.
$pdf->Write(10, 'Switches Edificio - '.$edif);
$pdf->Ln();
$pdf->SetFont('Arial', 'B', 9);
// Encabezado de la tabla de SW.
$pdf->Cell(26, 6, 'ID SWITCH', 1, 0, 'C', 1);
$pdf->Cell(26, 6, 'SYSNAME', 1, 0, 'C', 1);
$pdf->Cell(50, 6, 'MODELO 1', 1, 0, 'C', 1);
$pdf->Cell(50, 6, 'SERIE', 1, 0, 'C', 1);
$pdf->Cell(30, 6, 'FIRMWARE', 1, 0, 'C', 1);
$pdf->Cell(30, 6, utf8_decode('PARTICIÓN'), 1, 0, 'C', 1);
$pdf->Cell(30, 6, 'IP SWITCH', 1, 0, 'C', 1);
$pdf->Cell(38, 6, 'MAC ADDRESS', 1, 0, 'C', 1);
$pdf->Ln();
// Cuerpo de la tabla de SW con registros de la DB.
$pdf->SetFont('Arial', '', 9);
while ($rowSW = mysqli_fetch_array($executeSW)) {
  $pdf->Cell(26, 14, $rowSW['id_switch'], 1, 0, 'C');
  $pdf->Cell(26, 14, $rowSW['sysname'], 1, 0, 'C');
  $pdf->Cell(50, 14, $rowSW['modelo'], 1, 0, 'C');
  $pdf->Cell(50, 14, $rowSW['serie'], 1, 0, 'C');
  $pdf->Cell(30, 14, $rowSW['firmware'], 1, 0, 'C');
  $pdf->Cell(30, 14, $rowSW['particion'], 1, 0, 'C');
  $pdf->Cell(30, 14, $rowSW['ip_switch'], 1, 0, 'C');
    $pdf->Cell(38, 14, $rowSW['mac'], 1, 0, 'C');
  $pdf->Ln(14);
}

$pdf->Output('I', 'Access_Points_Edificio_'.$edif.'.pdf');
?>
