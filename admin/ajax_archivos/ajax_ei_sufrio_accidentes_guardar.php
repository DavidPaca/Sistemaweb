<?php
require_once('../../inc/db.php');//CONEXION CON BASE DE DATOS
//echo "Estoy GUARDAR accidentes";

$id_ninio_accident = $_POST["id_ajax_ninio_accidentes"];
$id_accident = $_POST["id_ajax_sifrio_accidentes_n"];
//echo $id_ninio_accident;    
//echo $id_accident;

$insert_quiery = "INSERT INTO `tbl_inter_ei_sifrio_accidentes`(`id_ninio_sa`, `id_accidentes_sa`) VALUES ($id_ninio_accident, $id_accident)";
$run = mysqli_query($con, $insert_quiery);

?>