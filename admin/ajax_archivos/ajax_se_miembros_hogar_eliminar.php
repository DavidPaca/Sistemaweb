<?php
require_once('../../inc/db.php');//CONEXION CON BASE DE DATOS
//echo "Estoy ELIMINAR mh";

$id_eliminar_mi_hogar = $_POST["id_ajax_eliminar_miem_h"];
//echo $id_eliminar_mi_hogar;

$sql = "UPDATE tbl_inter_se_miembros_hogar SET estado_mh='Inactivo' WHERE id_miembros_hogar= $id_eliminar_mi_hogar";      
$run = mysqli_query($con, $sql);//ejecutar consulta 

?>