<?php
require_once('../../inc/db.php');//CONEXION CON BASE DE DATOS
//echo "Estoy ELIMINAR habit";

$id_eliminar_habit = $_POST["id_ajax_eliminar_habitos"];
//echo $id_eliminar_habit;

$sql = "DELETE FROM tbl_inter_ei_habitos where id_habitos_ninio = $id_eliminar_habit";      
$run = mysqli_query($con, $sql);//ejecutar consulta 

?>