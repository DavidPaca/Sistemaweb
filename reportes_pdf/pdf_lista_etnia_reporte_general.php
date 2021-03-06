<?php require_once('inc/top.php');?>
<?php

require_once('fpdf/fpdf.php');
require_once('../inc/db.php');//CONEXION CON BASE DE DATOS 
include ('plantilla_reportes_procesos.php');


$_nom_cdi = $_SESSION['tipo_cdi'];
//echo $_nom_cdi;
$_nom_periodo = $_SESSION['periodo_ac'];
//echo $_nom_periodo;

$repor_id = $_GET['edit'];
//echo $repor_id;

$query = "SELECT tbl_datos_personales_ninio.id_etnia, tbl_etnia.detalle AS detalle_etn,  COUNT(*) AS Etniasss
FROM tbl_datos_personales_ninio
INNER JOIN tbl_etnia
ON tbl_etnia.id_etnia = tbl_datos_personales_ninio.id_etnia
WHERE tbl_datos_personales_ninio.estado = 'Activo' AND tbl_datos_personales_ninio.id_cdi = $_nom_cdi
GROUP BY detalle_etn"; 
$resultado = mysqli_query($con, $query);


$query = "SELECT tbl_datos_personales_ninio.id_ninio, tbl_datos_personales_ninio.numero_docide, tbl_datos_personales_ninio.apellidos, 
tbl_datos_personales_ninio.nombres, tbl_cdi.nombre, tbl_periodo.inicio, tbl_periodo.fin
FROM tbl_datos_personales_ninio
INNER JOIN tbl_cdi ON tbl_cdi.id = tbl_datos_personales_ninio.id_cdi
INNER JOIN tbl_periodo ON tbl_periodo.id_periodo = tbl_datos_personales_ninio.id_periodo_ninio
WHERE tbl_datos_personales_ninio.id_cdi = $_nom_cdi AND tbl_datos_personales_ninio.id_periodo_ninio = $_nom_periodo 
AND tbl_datos_personales_ninio.estado = 'Activo' ORDER BY apellidos ASC "; 
$resultado2 = mysqli_query($con, $query);

$pdf = new PDF_repor_proc();
$pdf -> AliasNbPages();
$pdf -> AddPage ();

$pdf -> SetFont('Arial', 'B', 10 );
$pdf -> Cell(120, 10, 'CDI:' );
$pdf -> Ln(5);
$pdf -> Cell(120, 10, 'Periodo:' );
while ($row1 = mysqli_fetch_array($resultado2)){
$cdi_nomb = $row1['nombre'];
$inic = $row1['inicio']; 
$finc = $row1['fin'];
$pdf -> Cell(-110); 
$pdf -> SetFont('Arial', '', 10 );
$pdf -> Cell(10, 0, $cdi_nomb, 0, 0, 0 );

}
$pdf -> Ln(15);
$pdf -> Cell(61, -20, "$inic $finc", 0, 0, 0);
//}
$pdf -> Ln(-3);

$pdf -> Ln(-3);
$pdf -> SetFont('Arial', 'B', 13 ); 
$pdf -> Cell(30);  
$pdf -> Cell(120, 10, utf8_decode(' Reporte General de las Étnia'), 0, 0, 'C');  
$pdf -> Ln(10);


$pdf -> SetFillColor (232, 232, 232);
$pdf -> Setx (60);
$pdf -> SetFont ('Arial', 'B', 12);
$pdf -> Cell(10, 6, 'Nro', 1, 0, 'C', 1 );
$pdf -> Cell(40, 6, utf8_decode('Étnia'), 1, 0, 'C', 1 );
$pdf -> Cell(30, 6, utf8_decode('Cantidad'), 1, 1, 'C', 1 );

$pdf -> SetFont ('Arial', '', 10);

$cont = 0;
while ($row = mysqli_fetch_array($resultado)){
    $cont++;
    $detalle_etn = $row['detalle_etn'];
    $Etniasss = $row['Etniasss'];
  $pdf -> Setx (60);
  $pdf -> Cell(10, 6, $cont, 1, 0, 1 );
  $pdf -> Cell(40, 6, utf8_decode($detalle_etn), 1, 0, 1 );
  $pdf -> Cell(30, 6, utf8_decode($Etniasss), 1, 1, 1 );
}

ob_end_clean();
$pdf -> Output ();

?>


