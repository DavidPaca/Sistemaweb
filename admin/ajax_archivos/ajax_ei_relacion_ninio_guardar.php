<?php
require_once('../../inc/db.php');//CONEXION CON BASE DE DATOS
echo "Estoy GUARDAR habitos";

$id_ninio_relacion = $_POST["id_ajax_ninio_parentesco"];
$id_relacion = $_POST["id_ajax_parentesco"];
echo $id_ninio_relacion;    
echo $id_relacion;

$insert_quiery = "INSERT INTO `tbl_inter_ei_relacion_ninio`(`id_ninio_rn`, `id_parentesco_rn`) VALUES ($id_ninio_relacion, $id_relacion)";
$run = mysqli_query($con, $insert_quiery);

?>