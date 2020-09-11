

<?php


if(isset($_POST['id'])):
    $idprov=$_POST['id'];
   
                                                  

    require_once('../inc/db.php');

  
    $query_canton="Select * from tbl_canton where id_provincia = $idprov";
    $runcan = mysqli_query($con, $query_canton);//ejecutar consulta  
    $html="";
    echo "<option value='" . $idprov. "' " .  ">" . "Seleccione" . "</option>";

    while ($rowcan = mysqli_fetch_array($runcan)) {                                                      
        $id_cantones = $rowcan['id_canton'];
        $detalle_cantones = $rowcan['detalle'];                                                
        echo "<option value='" . $id_cantones. "' " .  ">" . ($detalle_cantones) . "</option>";
    }                   

endif;
