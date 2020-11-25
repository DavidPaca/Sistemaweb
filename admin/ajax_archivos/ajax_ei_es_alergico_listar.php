<?php
require_once('../../inc/db.php');//CONEXION CON BASE DE DATOS
//echo "Estoy LISTAR alergias";
$id_ninio_alergico = $_POST["id_ajax_ninio_list_alergia"];
//echo $id_ninio_alergico;

$sql = "SELECT tbl_inter_ei_es_alergico.id_es_alergico, tbl_datos_personales_ninio.id_ninio, tbl_alergias.detalle
FROM tbl_inter_ei_es_alergico
INNER JOIN tbl_datos_personales_ninio ON tbl_datos_personales_ninio.id_ninio = tbl_inter_ei_es_alergico.id_ninio_ea
INNER JOIN tbl_alergias ON tbl_alergias.id_alergias = tbl_inter_ei_es_alergico.id_alergia_ea
WHERE tbl_inter_ei_es_alergico.id_ninio_ea = $id_ninio_alergico";
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
            while ($ea = mysqli_fetch_array($run)){
                echo"
                    <tr>
                        <td>".$ea["detalle"]."</td>
                        <td><button id='eliminar_alergia' data-id_eliminar_ea='".$ea["id_es_alergico"]."'>Eliminar</button></td>
                    </tr>               
                ";


            }; 

    echo "</div>
    </table>"

?>