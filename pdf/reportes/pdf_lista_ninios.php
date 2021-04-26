<?php
require_once('../lib/pdf/mpdf.php');

$mpdf = new mPDF('c', 'A4');
$mpdf = writeHTML('<div>HOLA Reporte PDF.....</div>');
$mpdf = Output('reporte.pdf', 'I');

echo 'HOLA';


?>



    <?php require_once('inc/footer.php'); ?>