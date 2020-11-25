<?php 
//echo "Estoy ELIMINAR alergias";
require_once('../../inc/db.php');
$id_eliminar_alergia = $_POST['id_ajax_eliminar_alergia'];
//echo $id_eliminar_alergia;


$sql = "DELETE FROM tbl_inter_ei_es_alergico where id_es_alergico = $id_eliminar_alergia";      
$run = mysqli_query($con, $sql);//ejecutar consulta  


?>