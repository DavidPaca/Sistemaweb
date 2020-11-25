<?php
require_once('../../inc/db.php');//CONEXION CON BASE DE DATOS
//echo "Estoy GUARDAR con quien juega";

$id_ninio_cqj = $_POST["id_ajax_ninio_persona_q_juega"];
$id_cqj = $_POST["id_ajax_con_quien_juegan"];
//echo $id_ninio_cqj;    
//echo $id_cqj;

$insert_quiery = "INSERT INTO `tbl_inter_ei_con_quien_juega`(`id_ninio_cqj`, `id_personas_q_juega_cqj`) VALUES ($id_ninio_cqj, $id_cqj)";
$run = mysqli_query($con, $insert_quiery);

?>