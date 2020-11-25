<?php

require_once('../../inc/db.php');//CONEXION CON BASE DE DATOS
echo "Estoy ELIMINAR habit";

$id_eliminar_juegos_del_ninio = $_POST["id_ajax_eliminar_juegos"];
echo $id_eliminar_juegos_del_ninio;

$sql = "DELETE FROM tbl_inter_ei_juegos_del_ninio where id_juegos_del_ninio = $id_eliminar_juegos_del_ninio";      
$run = mysqli_query($con, $sql);//ejecutar consulta 

?>