<?php
require_once('../../inc/db.php');//CONEXION CON BASE DE DATOS
//echo "Estoy ELIMINAR habit";

$id_eliminar_vacu = $_POST["id_ajax_eliminar_vacunas_ninio"];
//echo $id_eliminar_habit;

$sql = "DELETE FROM tbl_inter_ei_vacunas where id_inter_ei_vacunas = $id_eliminar_vacu";      
$run = mysqli_query($con, $sql);//ejecutar consulta 

?>