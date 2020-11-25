<?php
require_once('../../inc/db.php');//CONEXION CON BASE DE DATOS
//echo "Estoy ELIMINAR enfermedades";
$id_eliminar_enf_grav = $_POST["id_ajax_eliminar_enf_grav"];
//echo $id_eliminar_enf_grav;

$sql = "DELETE FROM tbl_inter_ei_enfermedades_graves where id_enfermedades_graves = $id_eliminar_enf_grav";      
$run = mysqli_query($con, $sql);//ejecutar consulta 

?>