<?php
require_once('../../inc/db.php');//CONEXION CON BASE DE DATOS
//echo "Estoy ELIMINAR medic";

$id_eliminar_medic = $_POST["id_ajax_eliminar_toma_medic"];
//echo $id_eliminar_medic;

$sql = "DELETE FROM tbl_inter_ei_toma_medicamentos where id_toma_medicamentos = $id_eliminar_medic";      
$run = mysqli_query($con, $sql);//ejecutar consulta 

?>