<?php
require_once('../../inc/db.php');//CONEXION CON BASE DE DATOS
//echo "Estoy LISTAR con quien juega";
$id_ninio_cqj = $_POST["id_ajax_ninio_list_con_qjuega"];
//echo $id_ninio_cqj;

$sql = "SELECT tbl_inter_ei_con_quien_juega.id_con_quien_juega, tbl_datos_personales_ninio.id_ninio, tbl_personas_que_juega.detalle
FROM tbl_inter_ei_con_quien_juega
INNER JOIN tbl_datos_personales_ninio ON tbl_datos_personales_ninio.id_ninio = tbl_inter_ei_con_quien_juega.id_ninio_cqj
INNER JOIN tbl_personas_que_juega ON tbl_personas_que_juega.id_personas_q_juega = tbl_inter_ei_con_quien_juega.id_personas_q_juega_cqj
WHERE tbl_inter_ei_con_quien_juega.id_ninio_cqj = $id_ninio_cqj";
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
            while ($cqj = mysqli_fetch_array($run)){
                echo"
                    <tr>
                        <td>".$cqj["detalle"]."</td>
                        <td><button id='eliminar_con_quienj_ninio' data-id_eliminar_pqjn='".$cqj["id_con_quien_juega"]."'>Eliminar</button></td>
                    </tr>               
                ";


            }; 

    echo "</div>
    </table>"

?>