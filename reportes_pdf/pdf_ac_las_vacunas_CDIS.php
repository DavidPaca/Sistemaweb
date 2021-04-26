<?php require_once('inc/top.php');?>
<?php

require_once('fpdf/fpdf.php');
require_once('../inc/db.php');//CONEXION CON BASE DE DATOS 
include ('plantilla_las_vacunas.php');

$num_cdi = $_REQUEST['numcdi'];
//echo $num_cdi;
$num_per = $_REQUEST['numper'];
//echo $num_per;
$id_alimento = $_GET['edit'];
//echo $id_alimento;
$edit_id = $_GET['edit'];

$query = "SELECT tbl_datos_personales_ninio.id_ninio, tbl_datos_personales_ninio.numero_docide, tbl_datos_personales_ninio.apellidos, 
tbl_datos_personales_ninio.nombres, tbl_cdi.nombre, tbl_periodo.inicio, tbl_periodo.fin
FROM tbl_datos_personales_ninio
INNER JOIN tbl_cdi ON tbl_cdi.id = tbl_datos_personales_ninio.id_cdi
INNER JOIN tbl_periodo ON tbl_periodo.id_periodo = tbl_datos_personales_ninio.id_periodo_ninio
WHERE tbl_datos_personales_ninio.id_ninio = $edit_id"; 
$resultado = mysqli_query($con, $query);


$query = "SELECT tbl_inter_ei_vacunas.id_inter_ei_vacunas, tbl_inter_ei_vacunas.fecha_vac, tbl_inter_ei_vacunas.obcervaciones_vac,
tbl_datos_personales_ninio.id_ninio, tbl_vacunas.id_vacunas, tbl_vacunas.detalle AS detalle_vacunas
FROM tbl_inter_ei_vacunas
INNER JOIN tbl_datos_personales_ninio
ON tbl_datos_personales_ninio.id_ninio = tbl_inter_ei_vacunas.id_ninio_vac
INNER JOIN tbl_vacunas
ON tbl_vacunas.id_vacunas = tbl_inter_ei_vacunas.id_vacunas_vac
WHERE tbl_inter_ei_vacunas.id_ninio_vac = $edit_id ORDER BY detalle ASC ";                
$resultado12a = mysqli_query($con, $query);


$query = "SELECT tbl_datos_personales_ninio.id_ninio, tbl_datos_personales_ninio.numero_docide, tbl_datos_personales_ninio.apellidos, 
tbl_datos_personales_ninio.nombres, tbl_cdi.nombre, tbl_periodo.inicio, tbl_periodo.fin
FROM tbl_datos_personales_ninio
INNER JOIN tbl_cdi ON tbl_cdi.id = tbl_datos_personales_ninio.id_cdi
INNER JOIN tbl_periodo ON tbl_periodo.id_periodo = tbl_datos_personales_ninio.id_periodo_ninio
WHERE tbl_datos_personales_ninio.id_cdi = $num_cdi AND tbl_datos_personales_ninio.id_periodo_ninio = $num_per 
AND tbl_datos_personales_ninio.estado = 'Activo' ORDER BY apellidos ASC "; 
$resultado2 = mysqli_query($con, $query);

$pdf = new PDF_VAC();
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

$pdf -> SetFont ('Arial', 'B', 13);
while ($row = mysqli_fetch_array($resultado)){
    $id_ninio = $row['id_ninio'];
    $numero_docide = $row['numero_docide'];
    $apellidos = $row['apellidos'];
    $nombres = $row['nombres'];
 $pdf -> Cell(60, 10, utf8_decode("$apellidos $nombres"), 0, 1, 'C');  
}

$pdf -> SetFillColor (232, 232, 232);
$pdf -> SetFont ('Arial', 'B', 9);
$pdf -> Cell(80, 8, utf8_decode('Nombre de la vacuna'), 0, 0, '', 1 );
$pdf -> Cell(20, 8, utf8_decode('Fecha'), 0, 0, '', 1 );
$pdf -> Cell(90, 8, utf8_decode('Obcervación'),0, 1, '', 1 );

while ($row = mysqli_fetch_array($resultado12a)){
    $detalle_vacunas = $row['detalle_vacunas'];
    $fecha_vac = $row['fecha_vac'];
    $obcervaciones_vac = $row['obcervaciones_vac'];

  $pdf -> SetFont ('Arial', '', 9);
  $pdf -> Cell(80, 6, utf8_decode($detalle_vacunas), 0, 0, 1 );
  $pdf -> Cell(20, 6, utf8_decode($fecha_vac), 0, 0, 1 );
  $pdf -> MultiCell(90, 6, utf8_decode($obcervaciones_vac), 0 );
}

ob_end_clean();
$pdf -> Output ();

?>


