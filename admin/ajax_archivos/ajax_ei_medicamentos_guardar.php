<?php
require_once('../../inc/db.php');//CONEXION CON BASE DE DATOS
//echo "Estoy GUARDAR medicamentos";

$id_ninio_medicamento = $_POST["id_ajax_ninio_medicina"];
$id_medicamento = $_POST["id_ajax_medicina"];
//echo $id_ninio_medicamento;    
//echo $id_medicamento;

$insert_quiery = "INSERT INTO `tbl_inter_ei_toma_medicamentos`(`id_ninio_tm`, `id_medicamentos_tm`) VALUES ($id_ninio_medicamento, $id_medicamento)";
$run = mysqli_query($con, $insert_quiery);
?>