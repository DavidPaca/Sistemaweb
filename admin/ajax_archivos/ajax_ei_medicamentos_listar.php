<?php
require_once('../../inc/db.php');//CONEXION CON BASE DE DATOS
//echo "Estoy LISTAR enfermedades";
$id_ninio_toma_medicamento = $_POST["id_ajax_ninio_list_medicamento"];
//echo $id_ninio_toma_medicamento;

$sql = "SELECT tbl_inter_ei_toma_medicamentos.id_toma_medicamentos, tbl_datos_personales_ninio.id_ninio, tbl_medicamentos.detalle 
FROM tbl_inter_ei_toma_medicamentos 
INNER JOIN tbl_datos_personales_ninio ON tbl_inter_ei_toma_medicamentos.id_ninio_tm = tbl_datos_personales_ninio.id_ninio 
INNER JOIN tbl_medicamentos ON tbl_inter_ei_toma_medicamentos.id_medicamentos_tm = tbl_medicamentos.id_medicamentos 
WHERE tbl_inter_ei_toma_medicamentos.id_ninio_tm = $id_ninio_toma_medicamento";
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
            while ($tm = mysqli_fetch_array($run)){
                echo"
                    <tr>
                        <td>".$tm["detalle"]."</td>
                        <td><button id='eliminar_medicamento' data-id_eliminar_tm='".$tm["id_toma_medicamentos"]."'>Eliminar</button></td>
                    </tr>               
                ";


            }; 

    echo "</div>
    </table>"

?>