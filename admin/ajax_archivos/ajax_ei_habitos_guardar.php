<?php
require_once('../../inc/db.php');//CONEXION CON BASE DE DATOS
//echo "Estoy GUARDAR habitos";

$id_ninio_habit = $_POST["id_ajax_ninio_habitos"];
$id_habit = $_POST["id_ajax_habitos"];
//echo $id_ninio_habit;    
//echo $id_habit;

$insert_quiery = "INSERT INTO `tbl_inter_ei_habitos`(`id_ninio_hn`, `id_habitos_hn`) VALUES ($id_ninio_habit, $id_habit)";
$run = mysqli_query($con, $insert_quiery);

?>