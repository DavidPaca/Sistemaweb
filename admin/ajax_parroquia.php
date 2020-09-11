

<?php


if(isset($_POST['id'])):
    $id_cant=$_POST['id'];
   
                                                  

    require_once('../inc/db.php');

  
    $query_canton="Select * from tbl_parroquia where id_canton = $id_cant";
    $runcan = mysqli_query($con, $query_canton);//ejecutar consulta  
    $html="";
    while ($rowcan = mysqli_fetch_array($runcan)) {                                                      
        $id_parroquias = $rowcan['id_parroquia'];
        $detalle_parroquias = $rowcan['detalle'];                                                
        echo "<option value='" . $id_parroquias. "' " .  ">" . ($detalle_parroquias) . "</option>";
    }                   

endif;
