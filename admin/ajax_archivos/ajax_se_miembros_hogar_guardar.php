<?php
require_once('../../inc/db.php');//CONEXION CON BASE DE DATOS
//echo "Estoy GUARDAR miembros hogar";

$id_ninio_miembros_h = $_POST["id_ajax_id_ninio_mh"];
$apellid_mh = $_POST["ajax_apellid_mh"];
$nombr_mh = $_POST["ajax_nombr_mh"];
$id_parent_mh = $_POST["id_ajax_parent_mh"];
$edad_del_mh = $_POST["ajax_edad_del_mh"];
$id_instruccion_del_mh = $_POST["id_ajax_instruccion_del_mh"];
$id_ocupacion_del_mh = $_POST["id_ajax_ocupacion_del_mh"];
$vinculo_lab_del_mh = $_POST["ajax_vinculo_lab_del_mh"];
$dir_trab_del_mh = $_POST["ajax_dir_trab_del_mh"];
$tlf_trab_del_mh = $_POST["ajax_tlf_trab_del_mh"];
$estado_seco_mh = $_POST["ajax_estado_seco_mh"];
//echo $ninio_miembros_h;    
//echo $apellid_mh;
//echo $nombr_mh;
//echo $id_parent_mh;
//echo $edad_del_mh;
//echo $id_instruccion_del_mh;
//echo $id_ocupacion_del_mh;
//echo $vinculo_lab_del_mh;
//echo $dir_trab_del_mh;
//echo $tlf_trab_del_mh;

$insert_quiery = "INSERT INTO `tbl_inter_se_miembros_hogar`(`id_ninio_mh`, `apellidos_mh`, `nombres_mh`, `id_parentesco_mh`, `edad`, `id_instruccion_mh`,
                  `id_ocupacion_mh`,`vinculo_laboral`,`dir_laboral`, `telefono`, estado_mh) VALUES ('$id_ninio_miembros_h','$apellid_mh','$nombr_mh',
                  '$id_parent_mh', '$edad_del_mh', '$id_instruccion_del_mh', '$id_ocupacion_del_mh', '$vinculo_lab_del_mh',
                  '$dir_trab_del_mh', '$tlf_trab_del_mh', '$estado_seco_mh')";
$run = mysqli_query($con, $insert_quiery);

?>