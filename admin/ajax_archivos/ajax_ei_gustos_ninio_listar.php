<?php
require_once('../../inc/db.php');//CONEXION CON BASE DE DATOS
//echo "Estoy LISTAR gustos";
$id_ninio_gust = $_POST["id_ajax_ninio_list_gusto"];
//echo $id_ninio_gust;

$sql = "SELECT tbl_inter_ei_gustos_ninio.id_gustos_ninio, tbl_datos_personales_ninio.id_ninio, tbl_gustos_disgustos.detalle
FROM tbl_inter_ei_gustos_ninio
INNER JOIN tbl_datos_personales_ninio ON tbl_datos_personales_ninio.id_ninio = tbl_inter_ei_gustos_ninio.id_ninio_gn
INNER JOIN tbl_gustos_disgustos ON tbl_gustos_disgustos.id_gustos_disgustos = tbl_inter_ei_gustos_ninio.id_gustos_gn
WHERE tbl_inter_ei_gustos_ninio.id_ninio_gn = $id_ninio_gust";
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
            while ($gn = mysqli_fetch_array($run)){
                echo"
                    <tr>
                        <td>".$gn["detalle"]."</td>
                        <td><button id='eliminar_gustos_ninio' data-id_eliminar_gn='".$gn["id_gustos_ninio"]."'>Eliminar</button></td>
                    </tr>               
                ";


            }; 

    echo "</div>
    </table>"

?>