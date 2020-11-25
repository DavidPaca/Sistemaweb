<?php 
require_once('../../inc/db.php');//CONEXION CON BASE DE DATOS
//echo "Estoy LISTAR enfermedades";
$id_ninio_enfer_grav = $_POST["id_ajax_ninio_list_enfer_graves"];
//echo $id_ninio_enfer_grav;

$sql = "SELECT tbl_inter_ei_enfermedades_graves.id_enfermedades_graves, tbl_datos_personales_ninio.id_ninio, tbl_enfermedades.detalle 
FROM `tbl_inter_ei_enfermedades_graves` 
INNER JOIN tbl_datos_personales_ninio ON tbl_datos_personales_ninio.id_ninio = tbl_inter_ei_enfermedades_graves.id_ninio_eg 
INNER JOIN tbl_enfermedades ON tbl_enfermedades.id_enfermedades = tbl_inter_ei_enfermedades_graves.id_enfermedades_graves_eg 
WHERE tbl_inter_ei_enfermedades_graves.id_ninio_eg = $id_ninio_enfer_grav";
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
            while ($enfer_graves = mysqli_fetch_array($run)){
                echo"
                    <tr>
                        <td>".$enfer_graves["detalle"]."</td>
                        <td><button id='eliminar_pre_enfermedades_greaves' data-id_eliminar_eg='".$enfer_graves["id_enfermedades_graves"]."'>Eliminar</button></td>
                    </tr>               
                ";


            }; 

    echo "</div>
    </table>"
?>