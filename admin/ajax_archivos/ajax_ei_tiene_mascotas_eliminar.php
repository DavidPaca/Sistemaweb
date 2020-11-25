<?php
require_once('../../inc/db.php');//CONEXION CON BASE DE DATOS
//echo "Estoy ELIMINAR mascota";

$id_eliminar_mascotita = $_POST["id_ajax_eliminar_mascota"];
//echo $id_eliminar_mascotita;

$sql = "DELETE FROM tbl_inter_ei_tiene_mascotas where id_tiene_mascotas = $id_eliminar_mascotita";      
$run = mysqli_query($con, $sql);//ejecutar consulta 

?>