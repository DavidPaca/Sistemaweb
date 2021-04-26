<?php
require_once('../../inc/db.php');//CONEXION CON BASE DE DATOS
//echo "Estoy LISTAR mascotas";
$id_ninio_masco = $_POST["id_ajax_ninio_list_masc"];
//echo $id_ninio_masco;

$sql = "SELECT tbl_inter_ei_tiene_mascotas.id_tiene_mascotas, tbl_inter_ei_tiene_mascotas.nombre_mascotita, tbl_datos_personales_ninio.id_ninio, tbl_mascotas.detalle
FROM tbl_inter_ei_tiene_mascotas
INNER JOIN tbl_datos_personales_ninio ON tbl_datos_personales_ninio.id_ninio = tbl_inter_ei_tiene_mascotas.id_ninio_tm
INNER JOIN tbl_mascotas ON tbl_mascotas.id_mascota = tbl_inter_ei_tiene_mascotas.id_mascotas_tm
WHERE tbl_inter_ei_tiene_mascotas.id_ninio_tm = $id_ninio_masco";
$run = mysqli_query($con, $sql);
echo "
        <div class='col-md-6'>
        <table class='table table-hover table-bordered table-striped'>
            <thead>
                <tr>
                    <th>Descripción</th>
                    <th>Nombre</th>
                    <th>Eliminar</th>                    
                </tr>
            </thead>    
                ";
            while ($tm = mysqli_fetch_array($run)){
                echo"
                    <tr>
                        <td>".$tm["detalle"]."</td>
                        <td>".$tm["nombre_mascotita"]."</td>
                        <td><button id='eliminar_mascota' data-id_eliminar_tm='".$tm["id_tiene_mascotas"]."'>Eliminar</button></td>
                    </tr>               
                ";


            }; 

    echo "</div>
    </table>"

?>