<?php
require_once('../../inc/db.php');//CONEXION CON BASE DE DATOS
//echo "Estoy ELIMINAR enfermedades";

$id_eliminar_inter_quir = $_POST["id_ajax_eliminar_inter_quir"];
echo $id_eliminar_inter_quir;

$sql = "DELETE FROM tbl_inter_ei_intervensiones_quirugicas where id_intervensiones_quirugicas = $id_eliminar_inter_quir";      
$run = mysqli_query($con, $sql);//ejecutar consulta 

?>