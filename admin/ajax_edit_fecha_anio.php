<?php
$fecha=$_POST["fecha"];
//echo "ajax recibe la fecha asi".$fecha;

date_default_timezone_set('America/Bogota');//declaro zona horaria
$time = new DateTime();//para sacar la fecha actual

$hoy = $time->format('Y-m-d');//imprimimos la fecha actual


$datos = calcularTiempo($fecha,$hoy);
echo "<input type='text' class='form-control'  value='$datos[0]' name='mostrar_anio' disabled>";
echo "<input type='hidden' class='form-control'  value='$datos[0]' name='anio_n' >";
echo "<span class='input-group-addon' disabled>Año(s)</span> ";


/*
echo "<hr>";
echo "Meses" . $datos[1];
echo "<hr>";
echo "Dias" . $datos[2];
echo "<hr>";
echo "Total Dias" . $datos[11];*/
function calcularTiempo ($fechaInicio,$fechaFin){
    //indice 0 = años
    //indice 1 = meses
    //indice 2 = dias
    //indice 3 = total en dias
$datetime1 = date_create($fechaInicio);
$datetime2 = date_create($fechaFin);
$interval = date_diff($datetime1, $datetime2);

$tiempo=array ();

foreach ($interval as $valor){
    $tiempo[]=$valor;
}
return $tiempo;
}
?>