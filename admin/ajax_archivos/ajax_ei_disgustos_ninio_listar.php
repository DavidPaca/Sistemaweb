<?php
require_once('../../inc/db.php');//CONEXION CON BASE DE DATOS
//echo "Estoy LISTAR disgustos";
$id_ninio_disgust = $_POST["id_ajax_ninio_list_disgustos"];
//echo $id_ninio_disgust;

$sql = "SELECT tbl_inter_ei_disgustos_ninio.id_disgustos_ninio, tbl_datos_personales_ninio.id_ninio, tbl_gustos_disgustos.detalle
FROM tbl_inter_ei_disgustos_ninio
INNER JOIN tbl_datos_personales_ninio ON tbl_datos_personales_ninio.id_ninio = tbl_inter_ei_disgustos_ninio.id_ninio_dn
INNER JOIN tbl_gustos_disgustos ON tbl_gustos_disgustos.id_gustos_disgustos = tbl_inter_ei_disgustos_ninio.id_disgustos_dn
WHERE tbl_inter_ei_disgustos_ninio.id_ninio_dn = $id_ninio_disgust";
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
            while ($dn = mysqli_fetch_array($run)){
                echo"
                    <tr>
                        <td>".$dn["detalle"]."</td>
                        <td><button id='eliminar_disgustos' data-id_eliminar_disgu='".$dn["id_disgustos_ninio"]."'>Eliminar</button></td>
                    </tr>               
                ";


            }; 

    echo "</div>
    </table>"

?>