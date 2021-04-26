<?php
require_once('../../inc/db.php');//CONEXION CON BASE DE DATOS
//echo "Estoy GUARDAR vacunas";

$id_ninio_vacs = $_POST["id_ajax_ninio_vac"];
$id_vakunass = $_POST["id_ajax_vacunas"];
$id_fecha_vakunass = $_POST["id_ajax_fecha_vacunas"];
$id_obcervaciones_vakunass = $_POST["id_ajax_obcervaciones_vacunas"];


$insert_quiery = "INSERT INTO tbl_inter_ei_vacunas(id_ninio_vac, id_vacunas_vac, fecha_vac, obcervaciones_vac) 
VALUES ('$id_ninio_vacs', '$id_vakunass', '$id_fecha_vakunass', '$id_obcervaciones_vakunass')";
$run = mysqli_query($con, $insert_quiery);

?>