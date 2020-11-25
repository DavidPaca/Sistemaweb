<?php
require_once('../../inc/db.php');//CONEXION CON BASE DE DATOS
//echo "Estoy ELIMINAR habit";

$id_eliminar_mied = $_POST["id_ajax_eliminar_miedosn"];
//echo $id_eliminar_mied;

$sql = "DELETE FROM tbl_inter_ei_miedos_ninio where id_miedos_ninio = $id_eliminar_mied";      
$run = mysqli_query($con, $sql);//ejecutar consulta 

?>