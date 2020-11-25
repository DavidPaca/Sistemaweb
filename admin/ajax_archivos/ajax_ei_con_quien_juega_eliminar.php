<?php
require_once('../../inc/db.php');//CONEXION CON BASE DE DATOS
//echo "Estoy ELIMINAR persona q juega";

$id_eliminar_juega_ninio = $_POST["id_ajax_eliminar_persona_jninio"];
//echo $id_eliminar_juega_ninio;

$sql = "DELETE FROM tbl_inter_ei_con_quien_juega where id_con_quien_juega = $id_eliminar_juega_ninio";      
$run = mysqli_query($con, $sql);//ejecutar consulta 

?>