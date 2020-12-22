<?php
require_once('../../inc/db.php');//CONEXION CON BASE DE DATOS
//echo "Estoy LISTAR mh";
$id_ninio_mh = $_POST["id_ajax_ninio_list_mh"];
//echo $id_ninio_mh;

$sql = "SELECT tbl_inter_se_miembros_hogar.apellidos_mh, tbl_inter_se_miembros_hogar.nombres_mh, tbl_inter_se_miembros_hogar.edad,
tbl_inter_se_miembros_hogar.vinculo_laboral, tbl_inter_se_miembros_hogar.dir_laboral, tbl_inter_se_miembros_hogar.telefono,
tbl_inter_se_miembros_hogar.id_miembros_hogar, tbl_datos_personales_ninio.id_ninio,tbl_parentesco.detalle AS detalle_parent,
tbl_instruccion.detalle AS detalle_instruc, tbl_ocupacion.detalle AS detalle_ocup
from tbl_inter_se_miembros_hogar
INNER JOIN tbl_datos_personales_ninio ON tbl_datos_personales_ninio.id_ninio = tbl_inter_se_miembros_hogar.id_ninio_mh
INNER JOIN tbl_parentesco ON tbl_parentesco.id_parentesco = tbl_inter_se_miembros_hogar.id_parentesco_mh
INNER JOIN tbl_instruccion ON tbl_instruccion.id_instruccion = tbl_inter_se_miembros_hogar.id_instruccion_mh
INNER JOIN tbl_ocupacion ON tbl_ocupacion.id_ocupacion = tbl_inter_se_miembros_hogar.id_ocupacion_mh
WHERE tbl_inter_se_miembros_hogar.id_ninio_mh = $id_ninio_mh  AND tbl_inter_se_miembros_hogar.estado_mh='Activo'";
$run = mysqli_query($con, $sql);
echo "
        <div class='col-md-6'>
        <table class='table table-hover table-bordered table-striped'>
            <thead>
                <tr>
                    <th>Apellidos</th>
                    <th>Nombres</th>
                    <th>Parentesco</th>
                    <th>Edad</th>
                    <th>Instrucción</th>
                    <th>Ocupación</th>
                    <th>Vínculo laboral</th>
                    <th>Dirección laboral</th>
                    <th>Teléfono trabajo</th>
                    <th>Eliminar</th>                    
                </tr>
            </thead>    
                ";
            while ($mh = mysqli_fetch_array($run)){
                echo"
                    <tr>
                        <td>".$mh["apellidos_mh"]."</td>
                        <td>".$mh["nombres_mh"]."</td>
                        <td>".$mh["detalle_parent"]."</td>
                        <td>".$mh["edad"]."</td>
                        <td>".$mh["detalle_instruc"]."</td>
                        <td>".$mh["detalle_ocup"]."</td>
                        <td>".$mh["vinculo_laboral"]."</td>
                        <td>".$mh["dir_laboral"]."</td>
                        <td>".$mh["telefono"]."</td>
                        <td><button id='eliminar_miembros_h' data-id_eliminar_mh='".$mh["id_miembros_hogar"]."'>Eliminar</button></td>
                    </tr>               
                ";


            }; 

    echo "</div>
    </table>"

?>