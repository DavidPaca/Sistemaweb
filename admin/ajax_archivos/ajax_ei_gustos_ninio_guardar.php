<?php
require_once('../../inc/db.php');//CONEXION CON BASE DE DATOS
//echo "Estoy GUARDAR Gustos";

$id_ninio_gust = $_POST["id_ajax_ninio_gustos"];
$id_gust = $_POST["id_ajax_gustos"];
//echo $id_ninio_gust;    
//echo $id_gust;

$insert_quiery = "INSERT INTO `tbl_inter_ei_gustos_ninio`(`id_ninio_gn`, `id_gustos_gn`) VALUES ($id_ninio_gust, $id_gust)";
$run = mysqli_query($con, $insert_quiery);

?>