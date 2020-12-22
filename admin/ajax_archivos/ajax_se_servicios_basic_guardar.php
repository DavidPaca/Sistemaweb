<?php
require_once('../../inc/db.php');//CONEXION CON BASE DE DATOS
//echo "Estoy GUARDAR habitos";

$id_ninio_sb = $_POST["id_ajax_ninio_sv"];
$id_sb = $_POST["id_ajax_sv"];
//echo $id_ninio_sb;    
//echo $id_sb;

$insert_quiery = "INSERT INTO `tbl_inter_se_servicio_basico`(`id_ninio_sb`, `id_servicio_basicos_sv`) VALUES ($id_ninio_sb, $id_sb)";
$run = mysqli_query($con, $insert_quiery);

?>