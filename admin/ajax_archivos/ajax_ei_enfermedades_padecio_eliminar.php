<?php
require_once('../../inc/db.php');//CONEXION CON BASE DE DATOS
//echo "Estoy ELIMINAR enfer padece";

$id_eliminar_enfer_padec = $_POST["id_ajax_eliminar_enfer_padecio"];
//echo $id_eliminar_enfer_padec;

$sql = "DELETE FROM tbl_inter_ei_enfermedades_padecio where id_ei_enfermedades_padecio = $id_eliminar_enfer_padec";      
$run = mysqli_query($con, $sql);//ejecutar consulta 

?>