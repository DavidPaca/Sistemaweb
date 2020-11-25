<?php
require_once('../../inc/db.php');//CONEXION CON BASE DE DATOS
//echo "Estoy LISTAR accidentes";
$id_ninio_acciden = $_POST["id_ajax_ninio_list_accidente"];
//echo $id_ninio_acciden;

$sql = "SELECT tbl_inter_ei_sifrio_accidentes.id_sifrio_accidentes, tbl_datos_personales_ninio.id_ninio, tbl_accidentes.detalle
FROM tbl_inter_ei_sifrio_accidentes
INNER JOIN tbl_datos_personales_ninio ON tbl_datos_personales_ninio.id_ninio = tbl_inter_ei_sifrio_accidentes.id_ninio_sa
INNER JOIN tbl_accidentes ON tbl_accidentes.id_accidentes = tbl_inter_ei_sifrio_accidentes.id_accidentes_sa
WHERE tbl_inter_ei_sifrio_accidentes.id_ninio_sa = $id_ninio_acciden";
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
            while ($sa = mysqli_fetch_array($run)){
                echo"
                    <tr>
                        <td>".$sa["detalle"]."</td>
                        <td><button id='eliminar_accidente' data-id_eliminar_sa='".$sa["id_sifrio_accidentes"]."'>Eliminar</button></td>
                    </tr>               
                ";


            }; 

    echo "</div>
    </table>"

?>