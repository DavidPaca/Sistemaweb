<?php
require_once('../../inc/db.php');//CONEXION CON BASE DE DATOS
//echo "Estoy ELIMINAR medic";

$id_eliminar_acci = $_POST["id_ajax_eliminar_accident"];
//echo $id_eliminar_acci;

$sql = "DELETE FROM tbl_inter_ei_sifrio_accidentes where id_sifrio_accidentes = $id_eliminar_acci";      
$run = mysqli_query($con, $sql);//ejecutar consulta 

?>