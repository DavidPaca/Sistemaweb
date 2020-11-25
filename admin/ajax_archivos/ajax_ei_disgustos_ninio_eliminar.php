<?php
require_once('../../inc/db.php');//CONEXION CON BASE DE DATOS
//echo "Estoy ELIMINAR disgustos";

$id_eliminar_disgustos = $_POST["id_ajax_eliminar_disgustos"];
//echo $id_eliminar_disgustos;

$sql = "DELETE FROM tbl_inter_ei_disgustos_ninio where id_disgustos_ninio = $id_eliminar_disgustos";      
$run = mysqli_query($con, $sql);//ejecutar consulta 

?>