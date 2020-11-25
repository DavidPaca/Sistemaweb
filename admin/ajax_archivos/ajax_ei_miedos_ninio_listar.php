<?php
require_once('../../inc/db.php');//CONEXION CON BASE DE DATOS
//echo "Estoy LISTAR miedos";
$id_ninio_mied = $_POST["id_ajax_ninio_list_miedos"];
//echo $id_ninio_mied;

$sql = "SELECT tbl_inter_ei_miedos_ninio.id_miedos_ninio, tbl_datos_personales_ninio.id_ninio, tbl_miedos.detalle
FROM tbl_inter_ei_miedos_ninio
INNER JOIN tbl_datos_personales_ninio ON tbl_datos_personales_ninio.id_ninio = tbl_inter_ei_miedos_ninio.id_ninio_miedosn
INNER JOIN tbl_miedos ON tbl_miedos.id_miedos = tbl_inter_ei_miedos_ninio.id_miedos_miedosn
WHERE tbl_inter_ei_miedos_ninio.id_ninio_miedosn = $id_ninio_mied";
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
            while ($miedon = mysqli_fetch_array($run)){
                echo"
                    <tr>
                        <td>".$miedon["detalle"]."</td>
                        <td><button id='eliminar_miedos' data-id_eliminar_miedon='".$miedon["id_miedos_ninio"]."'>Eliminar</button></td>
                    </tr>               
                ";


            }; 

    echo "</div>
    </table>"

?>