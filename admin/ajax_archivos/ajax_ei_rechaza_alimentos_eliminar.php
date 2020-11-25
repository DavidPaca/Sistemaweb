<?php 
//echo "Estoy eliminar";
require_once('../../inc/db.php');
$id_eliminar_rech_alim = $_POST['id_ajax_eliminar_rech_alim'];
//echo $id_eliminar_rech_alim;


     
     $sql = "DELETE FROM tbl_inter_ei_rechaza_alimento_disgusta where id_rechaza_alimento_disgustas = $id_eliminar_rech_alim";      
     $run = mysqli_query($con, $sql);//ejecutar consulta  


?>