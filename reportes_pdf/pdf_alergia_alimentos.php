<?php require_once('inc/top.php');?>
<?php

require_once('fpdf/fpdf.php');
require_once('../inc/db.php');//CONEXION CON BASE DE DATOS 
include ('plantilla.php');

//echo 'HOLA';
$_nom_cdi = $_SESSION['tipo_cdi'];
//echo $_nom_cdi;
$_nom_periodo = $_SESSION['periodo_ac'];
//echo $_nom_periodo;


$query = "SELECT tbl_datos_personales_ninio.id_ninio, tbl_datos_personales_ninio.numero_docide, tbl_datos_personales_ninio.apellidos, 
tbl_datos_personales_ninio.nombres, tbl_cdi.nombre, tbl_periodo.inicio, tbl_periodo.fin
FROM tbl_datos_personales_ninio
INNER JOIN tbl_cdi ON tbl_cdi.id = tbl_datos_personales_ninio.id_cdi
INNER JOIN tbl_periodo ON tbl_periodo.id_periodo = tbl_datos_personales_ninio.id_periodo_ninio
WHERE tbl_datos_personales_ninio.id_cdi = $_nom_cdi AND tbl_datos_personales_ninio.id_periodo_ninio = $_nom_periodo ORDER BY apellidos ASC "; 
$resultado = mysqli_query($con, $query);

$pdf = new PDF();
$pdf -> AliasNbPages();
$pdf -> AddPage ();

$pdf -> SetFont('Arial', 'B', 10 );
$pdf -> Cell(-1);  
$pdf -> Cell(120, 10, 'CDI:', 0, 0);
//while ($row1 = mysqli_fetch_array($resultado)){
//if($row1 == mysqli_fetch_array($resultado)){
    $cdi_nomb = $row1['nombre'];
    $inic = $row1['inicio']; 
    $finc = $row1['fin'];
    $pdf -> Cell(-110); 
    $pdf -> Cell(10, 6, $cdi_nomb, 1, 0, 1 );
    //$pdf -> Cell(30, 6, $num_ci, 1, 0, 1 );                                             
//}
//}
$pdf -> Ln(10);

$pdf -> SetFillColor (232, 232, 232);
$pdf -> SetFont ('Arial', 'B', 12);
$pdf -> Cell(10, 6, 'Nro', 1, 0, 'C', 1 );
$pdf -> Cell(30, 6, utf8_decode('Cédula'), 1, 0, 'C', 1 );
$pdf -> Cell(70, 6, 'Apellidos', 1, 0, 'C', 1 );
$pdf -> Cell(70, 6, 'Nombres', 1, 1, 'C', 1 );

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
    $idninio = $row['id_ninio'];
    $num_ci = $row['numero_docide'];
    $apellidos = $row['apellidos'];
    $nombres = $row['nombres'];

  $pdf -> Cell(10, 6, $cont, 1, 0, 1 );
  $pdf -> Cell(30, 6, $num_ci, 1, 0, 1 );
  $pdf -> Cell(70, 6, utf8_decode($apellidos), 1, 0, 1 );
  $pdf -> Cell(70, 6, utf8_decode($nombres), 1, 1, 1 );
}

/*while ($get_row = mysqli_fetch_array($resultado)) {
    $alimento_id = $get_row['id_ninio'];
    $detalleali_name = $get_row['numero_docide'];
}*/

/*echo $alimento_id;
echo ($detalleali_name);*/
ob_end_clean();
$pdf -> Output ();

?>


