<?php
require_once('../../inc/db.php');//CONEXION CON BASE DE DATOS
//echo "Estoy GUARDAR mascotas";

$id_ninio_mascota = $_POST["id_ajax_ninio_mascota"];
$id_mascota_ninio = $_POST["id_ajax_mascotas_del_ninio"];
$nombre_mascotta = $_POST["id_ajax_nombre_mascotita"];
//echo $id_ninio_mascota;    
//echo $id_mascota_ninio;
//echo $nombre_mascotta;

$insert_quiery = "INSERT INTO `tbl_inter_ei_tiene_mascotas`(`id_ninio_tm`, `id_mascotas_tm`, `nombre_mascotita`) VALUES ('$id_ninio_mascota', '$id_mascota_ninio', '$nombre_mascotta')";
$run = mysqli_query($con, $insert_quiery);

?>