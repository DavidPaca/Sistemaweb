<?php 
require_once('../../inc/db.php');//CONEXION CON BASE DE DATOS
//echo "Estoy lista rechaza alimentos";
$id_ninio_rech_alime = $_POST["id_ajax_ninio_list_rech_alim"];
//echo $id_ninio_rech_alime;

$sql = "SELECT tbl_inter_ei_rechaza_alimento_disgusta.id_rechaza_alimento_disgustas, tbl_datos_personales_ninio.id_ninio, tbl_alimentos.detalle 
        FROM tbl_inter_ei_rechaza_alimento_disgusta 
        INNER JOIN tbl_datos_personales_ninio ON tbl_datos_personales_ninio.id_ninio = tbl_inter_ei_rechaza_alimento_disgusta.id_ninio_rech_ali 
        INNER JOIN tbl_alimentos ON tbl_alimentos.id_alimentos = tbl_inter_ei_rechaza_alimento_disgusta.id_alimentos_rech_ali 
        WHERE tbl_inter_ei_rechaza_alimento_disgusta.id_ninio_rech_ali = $id_ninio_rech_alime ";
$run = mysqli_query($con, $sql);

echo "
        <div class='col-md-6'>
        <table class='table table-hover table-bordered table-striped'>
            <thead>
                <tr>
                    <th>Descripción</th>
                    <th>Eliminar</th>                    
                </tr>
            </thead>    
                ";
            while ($rechaza_alim = mysqli_fetch_array($run)){
                echo"
                    <tr>
                        <td>".$rechaza_alim["detalle"]."</td>
                        <td><button id='eliminar_rech_alim' data-id_eliminar='".$rechaza_alim["id_rechaza_alimento_disgustas"]."'>Eliminar</button></td>
                    </tr>               
                ";


            }; 

    echo "</div>
    </table>"
?>