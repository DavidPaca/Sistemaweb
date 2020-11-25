<?php
//echo "estoy rechaza alimentos";
require_once('../../inc/db.php');//CONEXION CON BASE DE DATOS

$id_rechaza_alimentos_n = $_POST["id_ajax_rechaza_alimento_ninino"];
$id_ninio_recha_alim = $_POST["id_ajax_ninio_rechaza_alim"];
//echo $id_ninio_recha_alim;    
//echo $id_rechaza_alimentos_n;


$insert_quiery = "INSERT INTO `tbl_inter_ei_rechaza_alimento_disgusta`(`id_ninio_rech_ali`, `id_alimentos_rech_ali`) VALUES ($id_ninio_recha_alim, $id_rechaza_alimentos_n)";
$run = mysqli_query($con, $insert_quiery);
?>