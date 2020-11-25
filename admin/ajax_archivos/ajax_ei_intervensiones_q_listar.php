<?php
require_once('../../inc/db.php');//CONEXION CON BASE DE DATOS
//echo "Estoy LISTAR enfermedades";
$id_ninio_interven_q = $_POST["id_ajax_ninio_list_interven_quir"];
//echo $id_ninio_interven_q;

$sql = "SELECT tbl_inter_ei_intervensiones_quirugicas.id_intervensiones_quirugicas, tbl_datos_personales_ninio.id_ninio, tbl_intervensionesq.detalle 
FROM tbl_inter_ei_intervensiones_quirugicas 
INNER JOIN tbl_datos_personales_ninio ON tbl_inter_ei_intervensiones_quirugicas.id_ninio_iq = tbl_datos_personales_ninio.id_ninio 
INNER JOIN tbl_intervensionesq ON tbl_inter_ei_intervensiones_quirugicas.id_intervensiones_q_iq = tbl_intervensionesq.id_intervensionesq 
WHERE tbl_inter_ei_intervensiones_quirugicas.id_ninio_iq = $id_ninio_interven_q";
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
            while ($iq = mysqli_fetch_array($run)){
                echo"
                    <tr>
                        <td>".$iq["detalle"]."</td>
                        <td><button id='eliminar_interven_quirur' data-id_eliminar_iq='".$iq["id_intervensiones_quirugicas"]."'>Eliminar</button></td>
                    </tr>               
                ";


            }; 

    echo "</div>
    </table>"
?>