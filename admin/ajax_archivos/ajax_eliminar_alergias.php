<?php
    $id_ale=$_POST['id'];

     require_once('../../inc/db.php');
     $sql = "DELETE FROM tbl_rechaza_alimentos where id_rechaza_alimentos = $id_ale";      
     $run = mysqli_query($con, $sql);//ejecutar consulta  



?>