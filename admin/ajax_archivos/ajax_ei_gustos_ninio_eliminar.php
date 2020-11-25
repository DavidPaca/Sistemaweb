<?php
require_once('../../inc/db.php');//CONEXION CON BASE DE DATOS
//echo "Estoy ELIMINAR habit";

$id_eliminar_gus = $_POST["id_ajax_eliminar_gusto"];
//echo $id_eliminar_gus;

$sql = "DELETE FROM tbl_inter_ei_gustos_ninio where id_gustos_ninio = $id_eliminar_gus";      
$run = mysqli_query($con, $sql);//ejecutar consulta 

?>