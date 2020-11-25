<?php
require_once('../../inc/db.php');//CONEXION CON BASE DE DATOS
//echo "Estoy LISTAR habitos";
$id_ninio_habits = $_POST["id_ajax_ninio_list_habitos"];
//echo $id_ninio_habits;

$sql = "SELECT tbl_inter_ei_habitos.id_habitos_ninio, tbl_datos_personales_ninio.id_ninio, tbl_habitos.detalle
from tbl_inter_ei_habitos
INNER JOIN tbl_datos_personales_ninio ON tbl_datos_personales_ninio.id_ninio = tbl_inter_ei_habitos.id_ninio_hn
INNER JOIN tbl_habitos ON tbl_habitos.id_habitos = tbl_inter_ei_habitos.id_habitos_hn
WHERE tbl_inter_ei_habitos.id_ninio_hn = $id_ninio_habits";
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
                        <td><button id='eliminar_habito' data-id_eliminar_hn='".$hn["id_habitos_ninio"]."'>Eliminar</button></td>
                    </tr>               
                ";


            }; 

    echo "</div>
    </table>"

?>