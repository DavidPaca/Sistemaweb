<?php
require_once('../../inc/db.php');//CONEXION CON BASE DE DATOS
//echo "Estoy LISTAR sb";
$id_ninio_sb = $_POST["id_ajax_ninio_list_sb"];
//echo $id_ninio_sb;

$sql = "SELECT tbl_inter_se_servicio_basico.id_servicio_bas, tbl_datos_personales_ninio.id_ninio, tbl_servicios_basicos.detalle
FROM tbl_inter_se_servicio_basico
INNER JOIN tbl_datos_personales_ninio 
ON tbl_datos_personales_ninio.id_ninio = tbl_inter_se_servicio_basico.id_ninio_sb
INNER JOIN tbl_servicios_basicos
ON tbl_servicios_basicos.id_servi_basicos = tbl_inter_se_servicio_basico.id_servicio_basicos_sv
WHERE tbl_inter_se_servicio_basico.id_ninio_sb = $id_ninio_sb";
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
            while ($sb = mysqli_fetch_array($run)){
                echo"
                    <tr>
                        <td>".$sb["detalle"]."</td>
                        <td><button id='eliminar_ser_bas' data-id_eliminar_sb='".$sb["id_servicio_bas"]."'>Eliminar</button></td>
                    </tr>               
                ";


            }; 

    echo "</div>
    </table>"

?>