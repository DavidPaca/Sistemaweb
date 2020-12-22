<?php
require_once('../../inc/db.php');//CONEXION CON BASE DE DATOS
//echo "Estoy ELIMINAR sb";

$id_eliminar_ser_b = $_POST["id_ajax_eliminar_sb"];
//echo $id_eliminar_ser_b;

$sql = "DELETE FROM tbl_inter_se_servicio_basico where id_servicio_bas = $id_eliminar_ser_b";      
$run = mysqli_query($con, $sql);//ejecutar consulta 

?>