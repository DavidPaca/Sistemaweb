<?php
require_once('../../inc/db.php');//CONEXION CON BASE DE DATOS
//echo "Estoy LISTAR habitos";
$id_ninio_juegos = $_POST["id_ajax_ninio_list_juegos"];
//echo $id_ninio_juegos;

$sql = "SELECT tbl_inter_ei_juegos_del_ninio.id_juegos_del_ninio, tbl_datos_personales_ninio.id_ninio, tbl_juegos.detalle
FROM tbl_inter_ei_juegos_del_ninio
INNER JOIN tbl_datos_personales_ninio ON tbl_datos_personales_ninio.id_ninio = tbl_inter_ei_juegos_del_ninio.id_ninio_jn
INNER JOIN tbl_juegos ON tbl_juegos.id_juegos = tbl_inter_ei_juegos_del_ninio.id_juegos_jn
WHERE tbl_inter_ei_juegos_del_ninio.id_ninio_jn = $id_ninio_juegos";
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
            while ($jn = mysqli_fetch_array($run)){
                echo"
                    <tr>
                        <td>".$jn["detalle"]."</td>
                        <td><button id='eliminar_juegos' data-id_eliminar_jn='".$jn["id_juegos_del_ninio"]."'>Eliminar</button></td>
                    </tr>               
                ";


            }; 

    echo "</div>
    </table>"

?>