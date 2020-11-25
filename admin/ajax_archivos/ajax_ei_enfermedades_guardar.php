<?php 
require_once('../../inc/db.php');//CONEXION CON BASE DE DATOS
//echo "Estoy guardar enfermedades";

$id_ninio_enfer_graves = $_POST["id_ajax_ninio_enfer_graves"];
$id_enfermedades_graves = $_POST["id_ajax_enfermedades_graves"];
//echo $id_ninio_enfer_graves;    
//echo $id_enfermedades_graves;


$insert_quiery = "INSERT INTO `tbl_inter_ei_enfermedades_graves`(`id_ninio_eg`, `id_enfermedades_graves_eg`) VALUES ($id_ninio_enfer_graves, $id_enfermedades_graves)";
$run = mysqli_query($con, $insert_quiery);

?> 