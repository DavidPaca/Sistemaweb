<?php
require_once('../../inc/db.php');//CONEXION CON BASE DE DATOS
//echo "Estoy GUARDAR miedos";

$id_ninio_miedo = $_POST["id_ajax_ninio_miedos"];
$id_miedo = $_POST["id_ajax_miedos"];
//echo $id_ninio_miedo;    
//echo $id_miedo;

$insert_quiery = "INSERT INTO `tbl_inter_ei_miedos_ninio`(`id_ninio_miedosn`, `id_miedos_miedosn`) VALUES ($id_ninio_miedo, $id_miedo)";
$run = mysqli_query($con, $insert_quiery);

?>