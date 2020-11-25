<?php 

//echo "Estoy en el mostrar alergias";
require_once('../../inc/db.php');//CONEXION CON BASE DE DATOS


        $id_ninio=$_POST['id_nin'];
        //echo ($_POST['id_ninios']);
        
        $sql = "SELECT tbl_datos_personales_ninio.id_ninio, tbl_alimentos.detalle, tbl_rechaza_alimentos.id_rechaza_alimentos 
                FROM tbl_rechaza_alimentos 
                INNER JOIN tbl_datos_personales_ninio on tbl_datos_personales_ninio.id_ninio = tbl_rechaza_alimentos.id_ninio 
                INNER JOIN tbl_alimentos on tbl_rechaza_alimentos.id_alimentos = tbl_alimentos.id_alimentos 
                WHERE tbl_rechaza_alimentos.id_ninio = $id_ninio";      
        $run = mysqli_query($con, $sql);//ejecutar consulta  
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
            while ($alerg = mysqli_fetch_array($run)){
                echo"
                    <tr>
                        <td>".$alerg["detalle"]."</td>
                        <td><button id='eliminar' data-id='".$alerg["id_rechaza_alimentos"]."'>Eliminar</button></td>
                    </tr>
                ";


            }; 

    echo "</div>
    </table>"


?>