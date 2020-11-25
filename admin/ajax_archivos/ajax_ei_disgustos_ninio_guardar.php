<?php
require_once('../../inc/db.php');//CONEXION CON BASE DE DATOS
//echo "Estoy GUARDAR Disgustos";

$id_ninio_disgust = $_POST["id_ajax_ninio_disgustos"];
$id_disgust = $_POST["id_ajax_disgustos"];
//echo $id_ninio_disgust;    
//echo $id_disgust;

$insert_quiery = "INSERT INTO `tbl_inter_ei_disgustos_ninio`(`id_ninio_dn`, `id_disgustos_dn`) VALUES ($id_ninio_disgust, $id_disgust)";
$run = mysqli_query($con, $insert_quiery);

?>