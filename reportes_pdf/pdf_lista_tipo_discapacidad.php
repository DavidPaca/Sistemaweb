<?php require_once('inc/top.php');?>
<?php

require_once('fpdf/fpdf.php');
require_once('../inc/db.php');//CONEXION CON BASE DE DATOS 
include ('plantilla_reportes_procesos.php');

//echo 'HOLA';
//$id_alimento_repo = $REQUEST['id_alimentos'];
//echo $id_alimento_repo;

$_nom_cdi = $_SESSION['tipo_cdi'];
//echo $_nom_cdi;
$_nom_periodo = $_SESSION['periodo_ac'];
//echo $_nom_periodo;
$repor_id = $_GET['edit'];
//echo $repor_id;

$query = "SELECT tbl_datos_personales_ninio.numero_docide, tbl_datos_personales_ninio.apellidos, tbl_datos_personales_ninio.nombres, 
tbl_tipos_discapacidad.id_tipo_discapacidad, tbl_tipos_discapacidad.detalle AS detalle_tdiscapacidades
FROM tbl_datos_personales_ninio 
INNER JOIN tbl_tipos_discapacidad
ON tbl_tipos_discapacidad.id_tipo_discapacidad = tbl_datos_personales_ninio.id_tipo_discapacidad
WHERE tbl_datos_personales_ninio.id_tipo_discapacidad = $repor_id AND tbl_datos_personales_ninio.id_cdi = $_nom_cdi AND tbl_datos_personales_ninio.id_periodo_ninio = $_nom_periodo ORDER BY apellidos ASC"; 
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
$pdf -> Cell(120, 10, utf8_decode('Tipo de discapacidad'), 0, 0, 'C');  
$pdf -> Ln(10);

$pdf -> SetFillColor (232, 232, 232);
$pdf -> SetFont ('Arial', 'B', 12);
$pdf -> Cell(10, 6, 'Nro', 1, 0, 'C', 1 );
$pdf -> Cell(30, 6, utf8_decode('Cédula'), 1, 0, 'C', 1 );
$pdf -> Cell(75, 6, 'Apellidos/Nombres', 1, 0, 'C', 1 );
$pdf -> Cell(65, 6, utf8_decode('Detalle'), 1, 1, 'C', 1 );

$pdf -> SetFont ('Arial', '', 10);

/*while ($row = $resultado -> fetch_assoc()){
    $pdf -> Cell(70, 6, $resultado['id_ninio'], 1, 0, 'c', 1 );
    $pdf -> Cell(20, 6, $resultado['numero_docide'], 1, 0, 'c', 1 );
    $pdf -> Cell(70, 6, $resultado['apellidos'], 1, 0, 'c', 1 );
}*/
//echo 'Hola';
$cont = 0;
while ($row = mysqli_fetch_array($resultado)){
    $cont++;
    $id_ninio = $row['id_ninio'];
    $numero_docide = $row['numero_docide'];
    $apellidos = $row['apellidos'];
    $nombres = $row['nombres'];
    $id_detalles = $row['id_tipo_discapacidad'];
    $detalle_tdiscapacidades = $row['detalle_tdiscapacidades'];

  $pdf -> Cell(10, 6, $cont, 1, 0, 1 );
  $pdf -> Cell(30, 6, $numero_docide, 1, 0, 1 );
  $pdf -> Cell(75, 6, utf8_decode("$apellidos $nombres"), 1, 0, 1 );
  $pdf -> Cell(65, 6, utf8_decode($detalle_tdiscapacidades), 1, 1, 1 );
}

ob_end_clean();
$pdf -> Output ();

?>


