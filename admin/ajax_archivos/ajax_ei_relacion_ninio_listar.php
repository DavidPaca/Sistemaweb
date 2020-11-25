<?php
require_once('../../inc/db.php');//CONEXION CON BASE DE DATOS
//echo "Estoy LISTAR habitos";
$id_ninio_relacion_ninio = $_POST["id_ajax_ninio_list_parentesco"];
//echo $id_ninio_relacion_ninio;

$sql = "SELECT tbl_inter_ei_relacion_ninio.id_relacion_ninio, tbl_datos_personales_ninio.id_ninio, tbl_parentesco.detalle
from tbl_inter_ei_relacion_ninio
INNER JOIN tbl_datos_personales_ninio ON tbl_datos_personales_ninio.id_ninio = tbl_inter_ei_relacion_ninio.id_ninio_rn
INNER JOIN tbl_parentesco ON tbl_parentesco.id_parentesco = tbl_inter_ei_relacion_ninio.id_parentesco_rn
WHERE tbl_inter_ei_relacion_ninio.id_ninio_rn = $id_ninio_relacion_ninio";
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
            while ($hn = mysqli_fetch_array($run)){
                echo"
                    <tr>
                        <td>".$hn["detalle"]."</td>
                        <td><button id='eliminar_parentesco' data-id_eliminar_rn='".$hn["id_relacion_ninio"]."'>Eliminar</button></td>
                    </tr>               
                ";


            }; 

    echo "</div>
    </table>"

?>