<?php require_once('inc/top.php');?>
<?php

require_once('fpdf/fpdf.php');
require_once('../inc/db.php');//CONEXION CON BASE DE DATOS 
include ('plantilla_acta_compromiso.php');

//echo 'HOLA';
$_nom_cdi = $_SESSION['tipo_cdi'];
//echo $_nom_cdi;
$_nom_periodo = $_SESSION['periodo_ac'];
//echo $_nom_periodo;

$edit_id_ninio = $_GET['edit'];
//echo $edit_id_ninio;

$query_ei = "SELECT * FROM `tbl_entrevista_inicial`"; 
$resultado_ei1 = mysqli_query($con, $query_ei);
while ($row3 = mysqli_fetch_array($resultado_ei1)){
    $fecha_entrevista = $row3['fecha_entrevista'];
    
 
 }

$sql_repre = "SELECT * FROM `tbl_socio_economica` WHERE  id_ninio_se = $edit_id_ninio"; 
$resultado_repre = mysqli_query($con, $sql_repre);
while ($row3 = mysqli_fetch_array($resultado_repre)){
    $apellidos_rep = $row3['apellidos_se'];
    $nombre_rep = $row3['nombres_se'];
    //echo $apellidos_rep;  
    //echo $nombre_rep;
 }

$sql_cdi = "SELECT * FROM tbl_cdi WHERE id = $_nom_cdi AND id != 100 AND id != 101 AND id != 102";
$resultado_cdi = mysqli_query($con, $sql_cdi);
while ($row2 = mysqli_fetch_array($resultado_cdi)){
   $nombre_cdi = $row2['nombre'];
    //echo $nombre_cdi;
}

$sql_user = "SELECT * FROM tbl_usuario ";
$resultado_user = mysqli_query($con, $sql_user);
while ($row2 = mysqli_fetch_array($resultado_user)){
   $apellidos_us = $row2['apellidos'];
   $nombres_us = $row2['nombres'];
    echo $apellidos_us;
    echo $nombres_us;
}


$sql_user = "SELECT * FROM tbl_entrevista_inicial ";
$resultado_ei1 = mysqli_query($con, $sql_user);
while ($row2 = mysqli_fetch_array($resultado_ei1)){
   $fecha_entrevista = $row2['fecha_entrevista'];
   
    echo $apellidos_us;
    echo $nombres_us;
}



$sql_repre1 = "SELECT * FROM `tbl_socio_economica` WHERE  id_ninio_se = $edit_id_ninio"; 
$resultado_repre1 = mysqli_query($con, $sql_repre1);
while ($row3 = mysqli_fetch_array($resultado_repre1)){
    $num_documide = $row3['num_documide'];
    $apellidos_rep1 = $row3['apellidos_se'];
    $nombre_rep1 = $row3['nombres_se']; 
    }

    
$sql_admin = "SELECT tbl_entrevista_inicial.nombre_entrevistador, tbl_usuario.ci, tbl_usuario.apellidos, tbl_usuario.nombres
FROM tbl_entrevista_inicial
INNER JOIN tbl_usuario
ON tbl_usuario.id_usuario = tbl_entrevista_inicial.nombre_entrevistador
WHERE tbl_entrevista_inicial.id_ninio = $edit_id_ninio"; 
$resultado_admin = mysqli_query($con, $sql_admin);

while ($row_ad = mysqli_fetch_array($resultado_admin)){
    $ci_ad = $row_ad['ci'];
    $apellidos_ad = $row_ad['apellidos'];
    $nombres_ad = $row_ad['nombres'];
    }

$pdf = new PDF_AC();
$pdf -> AliasNbPages();    
$pdf -> AddPage ();

$pdf -> SetFont('Arial', '', 11 );




//setlocale(LC_TIME, "spanish");
//$pdf -> MultiCell(190, 6, 'Ciudad de México a ' . date('j') . ' de ' . date('M') . ' del ' . date('Y'));
//$pdf->Cell(190, 5,'Municipio, Estado , a '. date('d') . ' de '. utf8_decode(date('F')). ' de '. date('Y'), 0,1,'C');
$pdf -> MultiCell(180, 6, utf8_decode('En la ciudad de Riobamba, '.$fecha_entrevista.', se procede a suscribir el presente Acta de Compromiso ante la Administradora del '
.$nombre_cdi.', atreves  del cual él/la Señor(a): '."$apellidos_rep $nombre_rep".' se compromete a cumplir si está de acuerdo, con todo lo establecido  en este documento, en favor del bienestar bio psico social del niño o niña.
                  
1.	Entregar todos los documentos personales e información requerida por el Centro Infantil:
    -	Copia de la cédula del niño/niña y/o partida de nacimiento.
    -	Copia de la cédula de los padres.
    -	Copia actualizada del carnet de vacunas.
    -	5 fotos del niño niña tamaño carnet
    -	Certificado Médico adjunto examen coproparasitario.
    -	Copia de un servicio básico.
2.	Proveer la lista de materiales didácticos y aseo solicitados por el Centro Infantil (cambio de cepillo de dientes cada 3 meses con su respectiva pasta dental).
3.	Es obligación de madre, padre o adulto responsable, realizar la actualización de la información cuando exista cambios de la misma.
4.	Cumplir con el horario establecido en el proceso de adaptación del niño o niña.
5.	Cumplir con el horario establecido de entrada de 08h10 hasta 08h30 y salida de los niños y niñas a las 14h00.
6.	En caso de que por alguna razón el niño o niña tenga que faltar al '.$nombre_cdi.' siempre deberá justificar su inasistencia.
7.	Al tercer día de inasistencia del niño o niña, no justificado, la Administradora del '.$nombre_cdi.', procederá a contactarse con la familia, para establecer acuerdos de su continuidad o egreso del '.$nombre_cdi.'.
8.	Traer diariamente al niño o niña en optimas condiciones de higiene corporal y bucal (peinado, ropa limpia, baño diario, uñas cortadas, cepillado de dientes, etc.)
9.	Enviar diariamente los pañales necesarios para mantener le higiene del niño o niña durante su permanencia en el '.$nombre_cdi.' (los que usen pañal).
10.	En caso de que el niño o niña se encuentre enfermo, no podrá asistir al Centro Infantil, la misma que para poder reintegrarse a sus actividades deberá presentar el certificado médico, en el que confirme que el niño o niña, ha superado su problema de salud y así evitar contagio entre niños.
11.	El personal que labora en el Centro Infantil no podrá suministrar medicamentos al niño o niña, salvo prescripción médica y con la receta correspondiente.
12.	No enviar al niño o niña con joyas, dinero, objetos de valor, juguetes, nos deslindamos de responsabilidad.
13.	No enviar al niño o niña con alimentos y/o golosinas que interfieren en la jornada diaria del Centro de Desarrollo Infantil.
14.	Cumplir con los controles de salud y odontológicos requeridos por el Ministerio de Salud Pública, acordes a la edad del niño o niña.
15.	Mantener respeto, consideración y normas básicas de CONVIVENCIA con todo el personal del Centro de Desarrollo Infantil y con toda la comunidad educativa.
16.	En caso de que por algún motivo el niño o niña no pueda ser retirado del '.$nombre_cdi.' por el padre, madre o representante, comunicar previamente a la maestra responsable de su hijo/a, la persona autorizada para el retiro del niño o niña.
17.	Ejecutar mi derecho a conformar el Comité de Padres de Familia en el Centro de Desarrollo Infantil. Rendir y solicitar cuentas.
18.	Asistir los Padres de familia, a todas las reuniones convocadas por el '.$nombre_cdi.'.
19.	Participar en las actividades programadas y consensuadas en el '.$nombre_cdi.', para fomentar la integración y corresponsabilidad a través de elaboración y ejecución del plan participativo de mejoras, talleres, mingas de limpieza, encuentros, formación, etc.
20.	Los padres de familia deben reforzar el proceso de aprendizaje de los niños y niñas en la casa, para potenciar su desarrollo integral.
21.	Los Padres de familia tienen derecho a exigir a las maestras, maestros responsables de sus hijos e hijas a que reciban una atención de calidad, basado en cada uno de los componentes de acción que oferta la Institución.
22.	Solicitar información sobre el desarrollo de mi hijo o hija.
23.	Los Padres de familia tienen el derecho de realizar sugerencias o recomendaciones respecto al trabajo desarrollado con sus hijos/hijas en la Institución.
24.	No enviar a personas menores de edad a retirar a sus hijos o hijas del Centro de Desarrollo Infantil.
25.	Los niños y niñas deben asistir diariamente al Centro de Desarrollo Infantil, con el respectivo uniforme.

En caso de incumplimiento se enviará un informe a la Dirección de Gestión de Desarrollo Social y Humano, para su respectivo conocimiento y resolución.

De forma libre y voluntaria aceptamos todo los establecido en la presente ACTA DE COMPROMISO, comprometiéndonos a su cumplimiento, puesto que estamos consientes de que contribuirá al adecuado Desarrollo Infantil Integral.

Para su constancia, firman las partes: 

'), 0, "J");

$pdf -> SetFillColor (255, 255, 255);
$pdf -> SetFont ('Arial', 'B', 11);
$pdf -> Cell(90, 30, '', 1, 0, 'C', 1 );
$pdf -> Cell(90, 30, '', 1, 1, 'C', 1 );
$pdf -> Cell(90, 6, 'ADMINISTRADORA DE CDI:', 1, 0, 'C', 1 ); 
$pdf -> Cell(90, 6, utf8_decode('REPRESENTANTE DEL NIÑO(A):'), 1, 1, 'C', 1 ); 
$pdf -> SetFont ('Arial', '', 10);
$pdf -> Cell(90, 6,utf8_decode('Nombre: '."$apellidos_ad $nombres_ad".''), 1, 0, 'J', 1 ); 
$pdf -> Cell(90, 6, utf8_decode('Nombre: '."$apellidos_rep1 $nombre_rep1".''), 1, 1, 'J', 1 ); 
$pdf -> Cell(90, 6, 'C.C: '.$ci_ad.'', 1, 0, 'J', 1 ); 
$pdf -> Cell(90, 6, 'C.C: '.$num_documide.'', 1, 1, 'J', 1 ); 



ob_end_clean();
$pdf -> Output ();

?>



