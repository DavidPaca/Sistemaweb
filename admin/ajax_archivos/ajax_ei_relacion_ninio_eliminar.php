<?php
require_once('../../inc/db.php');//CONEXION CON BASE DE DATOS
//echo "Estoy ELIMINAR parient";

$id_eliminar_parient = $_POST["id_ajax_eliminar_pariente"];
//echo $id_eliminar_parient;

$sql = "DELETE FROM tbl_inter_ei_relacion_ninio where id_relacion_ninio = $id_eliminar_parient";      
$run = mysqli_query($con, $sql);//ejecutar consulta 

?>