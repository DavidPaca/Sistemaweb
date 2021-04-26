<?php
require_once('../../inc/db.php');//CONEXION CON BASE DE DATOS
//echo "Estoy LISTAR Enfer_padecio";
$id_ninio_enf_padece = $_POST["id_ajax_ninio_list_enfermed_padecio"];
//echo $id_ninio_habits;

$sql = "SELECT tbl_inter_ei_enfermedades_padecio.id_ei_enfermedades_padecio, tbl_datos_personales_ninio.id_ninio, tbl_enfermedades.detalle
FROM tbl_inter_ei_enfermedades_padecio 
INNER JOIN tbl_datos_personales_ninio 
ON tbl_datos_personales_ninio.id_ninio = tbl_inter_ei_enfermedades_padecio.id_ninio_ep
INNER JOIN tbl_enfermedades 
ON tbl_enfermedades.id_enfermedades = tbl_inter_ei_enfermedades_padecio.id_enfermedades_padecio_ep
WHERE tbl_inter_ei_enfermedades_padecio.id_ninio_ep= $id_ninio_enf_padece";
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
            while ($ep = mysqli_fetch_array($run)){
                echo"
                    <tr>
                        <td>".$ep["detalle"]."</td>
                        <td><button id='eliminar_enfer_padece' data-id_eliminar_ep='".$ep["id_ei_enfermedades_padecio"]."'>Eliminar</button></td>
                    </tr>               
                ";


            }; 

    echo "</div>
    </table>"

?>