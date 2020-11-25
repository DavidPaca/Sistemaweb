<?php
require_once('../../inc/db.php');//CONEXION CON BASE DE DATOS
//echo "Estoy Guardar enfermedades";

$id_ninio_intervension_q = $_POST["id_ajax_ninio_inter_quir"];
$id_intervension_q = $_POST["id_ajax_intervension_q"];
//echo $id_ninio_intervension_q;    
//echo $id_intervension_q;


$insert_quiery = "INSERT INTO `tbl_inter_ei_intervensiones_quirugicas`(`id_ninio_iq`, `id_intervensiones_q_iq`) VALUES ($id_ninio_intervension_q, $id_intervension_q)";
$run = mysqli_query($con, $insert_quiery);

?>