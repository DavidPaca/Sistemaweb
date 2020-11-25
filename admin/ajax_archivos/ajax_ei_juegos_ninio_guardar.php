<?php
require_once('../../inc/db.php');//CONEXION CON BASE DE DATOS
echo "Estoy GUARDAR juegos";

$id_ninio_juegos = $_POST["id_ajax_ninio_juegos"];
$id_juegos = $_POST["id_ajax_juegos"];
//echo $id_ninio_juegos;    
//echo $id_juegos;

$insert_quiery = "INSERT INTO `tbl_inter_ei_juegos_del_ninio`(`id_ninio_jn`, `id_juegos_jn`) VALUES ($id_ninio_juegos, $id_juegos)";
$run = mysqli_query($con, $insert_quiery);

?>