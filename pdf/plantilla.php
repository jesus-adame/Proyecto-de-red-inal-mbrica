<?php
require 'fpdf/fpdf.php';  // Se incluye en plugin de la libreria FPDF para crear archivos .pdf

class PDF extends FPDF  // Se crea la clase PDF que hereda los métodos de la clase FPDF.
{
  function Header()
  {
    $this->image('../imagenes/logo/UAEM.png', 15, 6, 26);
    $this->Cell(30);
    $this->SetFont('Arial', 'B', 15);
    $this->Cell(220, 10, 'REPORTE DE INVENTARIO', 0, 0, 'C');
    $this->SetFont('Arial', 'I', 11);
    date_default_timezone_set("America/Mexico_City");
    $dia_semana = date('w');
    switch ($dia_semana) {
      case 1:
        $dia_semana = 'Lunes'; // code...
      break;
      case 2:
        $dia_semana = 'Martes';// code...
      break;
      case 3:
        $dia_semana = 'Miercoles';// code...
      break;
      case 4:
        $dia_semana = 'Jueves';// code...
      break;
      case 5:
        $dia_semana = 'Viernes';// code...
      break;
      case 6:
        $dia_semana = 'Sabado';// code...
      break;
      case 7:
        $dia_semana = 'Domingo';// code...
      break;
    }
    $this->Cell(10, 10, $dia_semana.date(' / d / m / Y'), 0, 0, 'C');

    $this->Ln(20);
  }

  function Footer()
  {
    $this->SetY(-15);
    $this->SetFont('Arial', 'I', 12);
    $this->Cell(0, 10, utf8_decode('Página ').$this->PageNo().'/{nb}', 0, 0, 'C');
  }

  /*--------- Inicio de la extención MultiCell ---------*/
  var $widths;
	var $aligns;

	function SetWidths($w)
	{
		// Inicia un array con el ancho de las columnas
		$this->widths = $w;
	}

	function SetAligns($a)
	{	//Set the array of column alignments
		$this->aligns = $a;
	}

	function Row($data)
	{ // Calcula el ancho de la fila
		$nb = 0;

		for ($i = 0; $i < count($data); $i++)
			$nb = max($nb, $this->NbLines($this->widths[$i], $data[$i]));
		$h = 7 * $nb;
		// Realiza un salto de página si es necesario
		$this->CheckPageBreak($h);
		// Dibuja las celdas en la linea
		for ($i = 0; $i < count($data); $i++) {
			$w = $this->widths[$i];
			$a = isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
			// Guarda la posición actual
			$x = $this->GetX();
			$y = $this->GetY();
			// Dibuja el borde
			$this->Rect($x, $y, $w, $h);
			//Print the text
			$this->MultiCell($w, 7, $data[$i], 0, $a);
			//Put the position to the right of the cell
			$this->SetXY($x + $w, $y);
		}
		// Salta a la siguiete fila
		//$this->Ln($h);
	}

	function CheckPageBreak($h)
	{
		//If the height h would cause an overflow, add a new page immediately
		if ($this->GetY() + $h > $this->PageBreakTrigger) {
      $this->AddPage($this->CurOrientation);
    }
	}

	function NbLines($w, $txt)
	{
		// Computes the number of lines a MultiCell of width w will take
		$cw = &$this->CurrentFont['cw'];

		if ($w == 0)
			$w = $this->w - $this->rMargin - $this->x;
		$wmax = ($w - 2 * $this->cMargin) * 1000 / $this->FontSize;
		$s = str_replace("\r", '', $txt);
		$nb = strlen($s);

		if ($nb > 0 and $s[$nb - 1] == "\n")
			$nb--;
		$sep = -1;
		$i = 0;
		$j = 0;
		$l = 0;
		$nl = 1;

		while ($i < $nb) {
			$c = $s[$i];

			if($c == "\n") {
				$i++;
				$sep = -1;
				$j = $i;
				$l = 0;
				$nl++;
				continue;
			}

			if ($c == ' ')
				$sep = $i;
			$l += $cw[$c];

			if ($l > $wmax) {
				if ($sep == -1) {
					if ($i == $j)
						$i++;
				}
				else {
          $i = $sep + 1;
        }
				$sep = -1;
				$j = $i;
				$l = 0;
				$nl++;
			}
			else {
        $i++;
      }
		}
		return $nl;
	}
  /*------------ Final de la extención MultiCell ------------*/
}
?>
