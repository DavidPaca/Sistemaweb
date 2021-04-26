<?php
require_once('../../inc/db.php');//CONEXION CON BASE DE DATOS
//echo "Estoy LISTAR habitos";
$id_ninio_vacs = $_POST["id_ajax_ninio_list_vacs"];
//echo $id_ninio_habits;

$sql = "SELECT tbl_inter_ei_vacunas.id_inter_ei_vacunas, tbl_inter_ei_vacunas.fecha_vac, tbl_inter_ei_vacunas.obcervaciones_vac,
tbl_datos_personales_ninio.id_ninio, tbl_vacunas.id_vacunas, tbl_vacunas.detalle AS detalle_vacunas
FROM tbl_inter_ei_vacunas
INNER JOIN tbl_datos_personales_ninio
ON tbl_datos_personales_ninio.id_ninio = tbl_inter_ei_vacunas.id_ninio_vac
INNER JOIN tbl_vacunas
ON tbl_vacunas.id_vacunas = tbl_inter_ei_vacunas.id_vacunas_vac
WHERE tbl_inter_ei_vacunas.id_ninio_vac = $id_ninio_vacs";
$run = mysqli_query($con, $sql);
echo "
        <div class='col-md-6'>
        <table class='table table-hover table-bordered table-striped'>
            <thead>
                <tr>
                    <th>Nombre de la vacuna</th>
                    <th>Fecha</th>
                    <th>Obcervación</th>
                    <th>Eliminar</th>                    
                </tr>
            </thead>    
                ";
            while ($vacuns = mysqli_fetch_array($run)){
                echo"
                    <tr>
                        <td>".$vacuns["detalle_vacunas"]."</td>
                        <td>".$vacuns["fecha_vac"]."</td>
                        <td>".$vacuns["obcervaciones_vac"]."</td>
                        <td><button id='eliminar_vacuna_ninio' data-id_eliminar_vacun='".$vacuns["id_inter_ei_vacunas"]."'>Eliminar</button></td>
                    </tr>               
                ";


            }; 

    echo "</div>
    </table>"

?>