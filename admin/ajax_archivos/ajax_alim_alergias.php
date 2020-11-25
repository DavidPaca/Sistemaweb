<?php 
//echo "Estoy en agregar alergias";
require_once('../../inc/db.php');//CONEXION CON BASE DE DATOS
 $id_alimentoalergia = $_POST["id_alimento"];
 $id_niniosalergia = $_POST["id_ninios"];
 //echo $id_alimentoalergia;
 //echo $id_niniosalergia;
 
 $insert_query = "INSERT INTO tbl_rechaza_alimentos (id_ninio, id_alimentos) VALUES ($id_niniosalergia, $id_alimentoalergia)";
 $run = mysqli_query($con, $insert_query);
?>