<?php
require_once('../../inc/db.php');//CONEXION CON BASE DE DATOS
//echo "Estoy GUARDAR Enfer_padecio";

$id_ninio_en_pa = $_POST["id_ajax_ninio_enfer_padecio"];
$id_en_pa = $_POST["id_ajax_enfer_padecio_n"];
//echo $id_ninio_en_pa;    
//echo $id_en_pa;

$insert_quiery = "INSERT INTO `tbl_inter_ei_enfermedades_padecio`(`id_ninio_ep`, `id_enfermedades_padecio_ep`) VALUES ($id_ninio_en_pa, $id_en_pa)";
$run = mysqli_query($con, $insert_quiery);

?>