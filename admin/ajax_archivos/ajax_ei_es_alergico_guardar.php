<?php
require_once('../../inc/db.php');//CONEXION CON BASE DE DATOS
//echo "Estoy GUARDAR alergias ";

$id_ninio_alergi = $_POST["id_ajax_ninio_alergia"];
$id_alergia_n = $_POST["id_ajax_alergia_del_ninio"];
//echo $id_ninio_alergi;    
//echo $id_alergia_n;

$insert_quiery = "INSERT INTO `tbl_inter_ei_es_alergico`(`id_ninio_ea`, `id_alergia_ea`) VALUES ($id_ninio_alergi, $id_alergia_n)";
$run = mysqli_query($con, $insert_quiery);

?>