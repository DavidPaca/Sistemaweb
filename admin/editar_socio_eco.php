<?php
require_once('../admin/inc/top.php');
ob_start();
require_once('../inc/db.php');//CONEXION CON BASE DE DATOS
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}


if (isset($_GET['edit'])) {//si esque hay la variable edit
    $edit_id = $_GET['edit'];//get y post sirven para atrapar datos.
    //echo($edit_id);



        $edit_query = "SELECT * FROM tbl_datos_personales_ninio WHERE id_ninio = $edit_id";
        $edit_query_run = mysqli_query($con, $edit_query);
        $edit_row = mysqli_fetch_array($edit_query_run);//fetch array sirve para que tu atrapestoda la fila de una table... fetch assoc.
       
          
            
            //$idninio = $edit_row['id_ninio'];
            $c_i = $edit_row['numero_docide'];
            $last_name = $edit_row['apellidos'];
            $first_name = $edit_row['nombres'];
        }


        if (isset($_GET['edit'])) {//si esque hay la variable edit
            $edit_id = $_GET['edit'];//get y post sirven para atrapar datos.
            //echo($edit_id);
        
            $edit_query = "SELECT * FROM tbl_socio_economica WHERE id_ninio_se = $edit_id";
            $edit_query_run = mysqli_query($con, $edit_query);
           // if (mysqli_num_rows($edit_query_run) > 0) {/*if numero de filas es mayor q 0*/
                $edit_row = mysqli_fetch_array($edit_query_run);//fetch array sirve para que tu atrapestoda la fila de una table... fetch assoc.
                //$row = mysqli_fetch_array($run)
                     
                $id_ninio_se = $edit_row['id_ninio_se'];
                $id_tipo_docum = $edit_row['id_tipo_docum'];
                $num_documide = $edit_row['num_documide'];
                $apellidos_se = $edit_row['apellidos_se'];
                $nombres_se = $edit_row['nombres_se'];
                $edad_se = $edit_row['edad_se'];
                $estado_civil_se = $edit_row['estado_civil_se'];
                $etnia_se = $edit_row['etnia_se'];
                $parentesco_se = $edit_row['parentesco_se'];
                $direccion_dom_se = $edit_row['direccion_dom_se'];
                echo $edit_row['direccion_dom_se'];
                echo "HOLAaassa";
                $telefono_dom_se = $edit_row['telefono_dom_se'];
                $instruccion_se = $edit_row['instruccion_se'];
                $ocupación_se = $edit_row['ocupación_se'];
                $vinculo_laboral = $edit_row['vinculo_laboral'];
                $direccion_laboral_se = $edit_row['direccion_laboral_se'];
                $telefono_trabajo_se = $edit_row['telefono_trabajo_se'];
                $vivienda_acupa_es = $edit_row['vivienda_acupa_es'];
                $tipo_vivienda_se = $edit_row['tipo_vivienda_se'];
                $num_habitaciones_se = $edit_row['num_habitaciones_se'];
                $tipo_piso_se = $edit_row['tipo_piso_se'];
                $tipo_pared_se = $edit_row['tipo_pared_se'];
                $tipo_techo_se = $edit_row['tipo_techo_se'];
                $recibe_bono_se = $edit_row['recibe_bono_se'];
                $miembros_hogar_se = $edit_row['miembros_hogar_se'];
                $num_hijos_se = $edit_row['num_hijos_se'];
                $num_hijas_se = $edit_row['num_hijas_se'];
                $consume_bebidas_se = $edit_row['consume_bebidas_se'];
                $fuma_se = $edit_row['fuma_se'];
                $tiene_disca_miembro_familia = $edit_row['tiene_disca_miembro_familia'];
                $fami_discap_va_manuela_espejo = $edit_row['fami_discap_va_manuela_espejo'];
                $miembros_hogar_trabajan = $edit_row['miembros_hogar_trabajan'];
                $ingreso_mensual = $edit_row['ingreso_mensual'];
                $egreso_mensual = $edit_row['egreso_mensual'];
                $Acti_genera_ingresos = $edit_row['Acti_genera_ingresos'];
                $especifique_actividad = $edit_row['especifique_actividad'];
                $nivel_vida = $edit_row['nivel_vida'];
                $nivel_ingresos = $edit_row['nivel_ingresos'];
        
           // } else {
               // header('location: index.php');
          /*  }*/
        }        
?>    

</head>
<body>
    <div id="wrapper">
        <?php require_once('inc/header.php'); ?>

        <div class="container-fluid body-section">
            <div class="row">
                <div class="col-md-3">
                <?php require_once('../admin/inc/sidebar.php'); ?>
                    <?php require_once('inc/sidebar.php'); ?>
                </div>
                <div class="col-md-9">
                    <h1><i class="fas fa-user-edit"></i> Editar<small> Información Socio Económica </small></h1><hr>
                    <ol class="breadcrumb">
                         <li><a href="index.php"><i class="fas fa-home"></i> Menú</a></li>
                         <li><a href="nisocioeconomico.php"><i class="fas fa-chevron-left"></i> Regresar</a></li>
                        <li class="active"><i class="fa fa-user-plus"></i> Socio Económica</li>
                    </ol>
                    
                    
                    <?php
/*---------------------------Guarda los datos ingresados en los cajones en las variables------------------------------------------*/
                    if (isset($_POST['submit'])) {
                        
                        $id_ninios_se = ($_POST['id_de_ninios_se']);
                        $tipo_docide_se = ($_POST['tipo_docide_se']);
                        $num_ci_se = ($_POST['ci_se']);
                        $apellidos_repre_se = ($_POST['apellidos_repre']);
                        $nombres_repre_se = ($_POST['nombres_repre']);
                        $edad_repre_se = ($_POST['edad_repre']);
                        $estado_civ_repre_se = ($_POST['estado_civ_repre']);
                        $g_etnico_repre_se = ($_POST['g_etnico_repre']);
                        $parentesco_repre_se = ($_POST['parentesco_repre']);
                        $direcion_do_repre_se = ($_POST['direcion_do_repre']);
                        $tlefono_repre_se = ($_POST['tlefono_repre']);
                        $instruccion_repre_se = ($_POST['instruccion_repre']);
                        $ocupacion_repre_se = ($_POST['ocupacion_repre']);
                        $vinculo_laboral_seco = ($_POST['vinculo_laboral_se']);
                        $direcion_trabajo_repre_se = ($_POST['direcion_trabajo_repre']);
                        $tlefono_tabajo_repre_se = ($_POST['tlefono_tabajo_repre']);
                        $vivienda_ocupa_se = ($_POST['vivienda_ocupa']);
                        $vivienda_tipo_se = ($_POST['vivienda_tipo']);
                        $numer_habitaciones_se = ($_POST['numer_habitaciones']);
                        $piso_tipo_se = ($_POST['piso_tipo']);
                        $paredes_tipo_se = ($_POST['paredes_tipo']);
                        $techo_tipo_se = ($_POST['techo_tipo']);
                        $recibe_bono_dh_se = ($_POST['recibe_bono_dh']);
                        $miembros_h_familia_se = ($_POST['miembros_h_familia']);
                        $num_hijos_varones_se = ($_POST['num_hijos_varones']);
                        $num_hijas_mujeres_se = ($_POST['num_hijas_mujeres']);
                        $consume_alcohol_se = ($_POST['consume_alcohol']);
                        $ud_fuma_se = ($_POST['ud_fuma']);
                        $familiar_discapacidad_se = ($_POST['familiar_discapacidad']);
                        $asisten_al_manuela_esp_se = ($_POST['asisten_al_manuela_esp']);
                        $miembros_trabajan_se = ($_POST['miembros_trabajan']);
                        $ingreso_mensual_se = ($_POST['ingreso_mensual']);
                        $egreso_mensual_se = ($_POST['egreso_mensual']);
                        $otra_actv_gene_ing_se = ($_POST['otra_actv_gene_ing']);                        
                        if ($_POST['otra_actv_gene_ing'] == 'No'){
                            $especifique_actividad_se= 'No tiene';

                        }else{
                            $especifique_actividad_se = ($_POST['especifique_actividad']);
                        }  
                        $nivel_vida_12_se = ($_POST['nivel_vida_12']);
                        $ing_mensual_emp_mejo_se = ($_POST['ing_mensual_emp_mejo']);
                                     
                     
                            $consulta_so_ec = "UPDATE tbl_socio_economica SET id_ninio_se='$id_ninios_se', id_tipo_docum='$tipo_docide_se',num_documide='$num_ci_se',
                            apellidos_se='$apellidos_repre_se', nombres_se='$nombres_repre_se', edad_se='$edad_repre_se', estado_civil_se='$estado_civ_repre_se',
                            etnia_se='$g_etnico_repre_se',parentesco_se='$parentesco_repre_se', direccion_dom_se='$direcion_do_repre_se',
                            telefono_dom_se='$tlefono_repre_se', instruccion_se='$instruccion_repre_se',    
                            ocupación_se='$ocupacion_repre_se', vinculo_laboral='$vinculo_laboral_seco',direccion_laboral_se='$direcion_trabajo_repre_se', 
                            telefono_trabajo_se='$tlefono_tabajo_repre_se', vivienda_acupa_es='$vivienda_ocupa_se', tipo_vivienda_se='$vivienda_tipo_se', num_habitaciones_se='$numer_habitaciones_se', 
                            tipo_piso_se='$piso_tipo_se',tipo_pared_se='$paredes_tipo_se', tipo_techo_se='$techo_tipo_se', 
                            recibe_bono_se='$recibe_bono_dh_se', miembros_hogar_se='$miembros_h_familia_se',
                            num_hijos_se='$num_hijos_varones_se', num_hijas_se='$num_hijas_mujeres_se',consume_bebidas_se='$consume_alcohol_se', 
                            fuma_se='$ud_fuma_se', tiene_disca_miembro_familia='$familiar_discapacidad_se', fami_discap_va_manuela_espejo='$asisten_al_manuela_esp_se', 
                            miembros_hogar_trabajan='$miembros_trabajan_se', ingreso_mensual='$ingreso_mensual_se',egreso_mensual='$egreso_mensual_se', 
                            Acti_genera_ingresos='$otra_actv_gene_ing_se', especifique_actividad='$especifique_actividad_se', nivel_vida='$nivel_vida_12_se',
                            nivel_ingresos='$ing_mensual_emp_mejo_se'
                            WHERE id_ninio_se = '$edit_id'";
                            if (mysqli_query($con, $consulta_so_ec)) {
                                                        
                                $msg = "Registro modificado";
                            } else {
                                $error = "Registro no modificado";
                            }
                            //$password = crypt($password, $salt);                       
                    }
                    ?>

<!--------------------------------------------------Tamaño cajones------------------------------------------------------------>
                    
                    <form action="" method="post" enctype="multipart/form-data">     

                       

<!--............................................Numero_ci/Apellidos/Nombres........................................................-->
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <input type="text" id="ci_ninio_se" name="ci_ninio_se" class="form-control" maxlength="10" disabled value="<?php echo($c_i); ?>" >
                                                </div>
                                        
                                                <div class="col-md-7">
                                                    <input type="text" id="apellidos_nombre_n" name="apellidos_nombre_n" class="form-control"  disabled value= "<?php                                    
                                                        echo "$last_name $first_name";                                
                                                    ?>">
                                                    <?php
                                                        if (isset($error)) {
                                                            echo "<span style='color:red;' class='pull-right'>$error</span>";
                                                        } else if (isset($msg)) {
                                                            echo "<span style='color:green;' class='pull-right'>$msg</span>";
                                                        }
                                                    ?>
                                                </div>
                                            
                                            </div>
                                        </div>     

<!--*********************************************** DATOS REPRESENTANTE **************************************************** -->                                             
                                        <div class="row">
                                            <label for="nom_dpr" style="font-size:1.5rem; color:#2174AB">DATOS PERSONALES DEL REPRESENTANTE</label>
                                        </div>
                                        

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX ID PRINCIPAL DEL NIÑO XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
                        <input type="hidden" name="id_de_ninios_se" id = "id_de_ninios_se" value= "<?php echo $edit_id ?>">

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX PARENTESCO XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
                                <div class="form-group">
                                             <label for="parentesco_repre">Parentesco:</label> 
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <select class="form-control" name="parentesco_repre" id="parentesco_repre">
                                                         <?php
                                                            $sql_selec1 = "select * from tbl_parentesco order by detalle asc";
                                                            $ejecutar1 = mysqli_query($con, $sql_selec1);
                                                            $sql_inner_j1 = "SELECT tbl_socio_economica.parentesco_se, tbl_parentesco.detalle AS detalle_parentes
                                                            FROM tbl_socio_economica
                                                            INNER JOIN tbl_parentesco
                                                            ON tbl_parentesco.id_parentesco = tbl_socio_economica.parentesco_se
                                                            WHERE tbl_socio_economica.id_ninio_se = $edit_id";
                                                            $ejecutar_ij2 = mysqli_query($con, $sql_inner_j1);
                                                            $row3 = mysqli_fetch_array($ejecutar_ij2);
                                                            $id_injoin=$row3['parentesco_se'];
                                                                $detalle_injoin=$row3['detalle_parentes'];
                                                                echo "<option value='" . $id_injoin. "' " .  " selected>" . ($detalle_injoin) . "</option>";
                                  
                                                            
                                                            if (mysqli_num_rows($ejecutar1) > 0) {
                                                                while ($row2 = mysqli_fetch_array($ejecutar1)) {  
                                                                    
                                                                    $id_selec = $row2['id_parentesco'];
                                                                    $detalle_selec = $row2['detalle'];
                                                                    echo "<option value='" . $id_selec. "' " .  ">" . ($detalle_selec) . "</option>";
                                                                }
                                                            } 
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>


<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX Tipo Documento XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
                            <div class="form-group">
                                             <label for="tipo_docide_se">Tipo de Documento de Identificación:</label> 
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <select class="form-control" name="tipo_docide_se" id="tipo_docide_se">
                                                         <?php
                                                            $sql_selec1 = "select * from tbl_documento_identidad order by detalle asc";
                                                            $ejecutar1 = mysqli_query($con, $sql_selec1);
                                                            $sql_inner_j1 = "SELECT tbl_socio_economica.id_tipo_docum, tbl_documento_identidad.detalle AS detalle_docum
                                                            FROM tbl_socio_economica
                                                            INNER JOIN tbl_documento_identidad
                                                            ON tbl_documento_identidad.id_docide = tbl_socio_economica.id_tipo_docum
                                                            WHERE tbl_socio_economica.id_ninio_se = $edit_id";
                                                            $ejecutar_ij2 = mysqli_query($con, $sql_inner_j1);
                                                            $row3 = mysqli_fetch_array($ejecutar_ij2);
                                                            $id_injoin=$row3['id_tipo_docum'];
                                                                $detalle_injoin=$row3['detalle_docum'];
                                                                echo "<option value='" . $id_injoin. "' " .  " selected>" . ($detalle_injoin) . "</option>";
                                  
                                                            
                                                            if (mysqli_num_rows($ejecutar1) > 0) {
                                                                while ($row2 = mysqli_fetch_array($ejecutar1)) {  
                                                                    
                                                                    $id_selec = $row2['id_docide'];
                                                                    $detalle_selec = $row2['detalle'];
                                                                    echo "<option value='" . $id_selec. "' " .  ">" . ($detalle_selec) . "</option>";
                                                                }
                                                            } 
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>  

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX DOCUMENTO IDENTIDAD XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-8">  
                                            <label for="ci_se">Número de Documento de Identificación :</label>
                                            <input type="text" id="ci_se" name="ci_se" class="form-control" value="<?php echo $num_documide ?>" maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57' placeholder="Ej:1234567890">
                                        </div>
                                    </div>    
                                </div>

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX DOCUMENTO IDENTIDAD XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-8">  
                                            <label for="apellidos_repre">Apellidos :</label>
                                            <input type="text" id="apellidos_repre" name="apellidos_repre" class="form-control" value= "<?php echo $apellidos_se ?>" placeholder="Apellidos">
                                        </div>
                                    </div>
                                </div>

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX DOCUMENTO IDENTIDAD XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-8"> 
                                            <label for="nombres_repre">Nombres :</label>                                   
                                            <input type="text" id="nombres_repre" name="nombres_repre" class="form-control" value= "<?php echo $nombres_se ?>" placeholder="Nombres">
                                        </div>
                                    </div>
                                </div>

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX EDAD XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
                                <div class="form-group">
                                    <label for="edad_repre">Edad :</label>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="input-group">
                                                <input type="text" id="edad_repre" name="edad_repre" maxlength="3" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control" value="<?php echo $edad_se ?>" placeholder="Edad" >
                                                <span class="input-group-addon">años</span>   
                                            </div>
                                        </div>
                                    </div> 
                                </div>

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX ESTADO CIVIL XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
                                            <div class="form-group">
                                             <label for="estado_civ_repre">Estado Civil:</label> 
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <select class="form-control" name="estado_civ_repre" id="estado_civ_repre">
                                                         <?php
                                                            $sql_selec1 = "select * from tbl_estado_civil order by detalle asc";
                                                            $ejecutar1 = mysqli_query($con, $sql_selec1);
                                                            $sql_inner_j1 = "SELECT tbl_socio_economica.estado_civil_se, tbl_estado_civil.detalle 
                                                            FROM tbl_socio_economica
                                                            INNER JOIN tbl_estado_civil
                                                            ON tbl_estado_civil.id_estado_civil = tbl_socio_economica.estado_civil_se
                                                            WHERE tbl_socio_economica.id_ninio_se = $edit_id";
                                                            $ejecutar_ij2 = mysqli_query($con, $sql_inner_j1);
                                                            $row3 = mysqli_fetch_array($ejecutar_ij2);
                                                            $id_injoin=$row3['estado_civil_se'];
                                                                $detalle_injoin=$row3['detalle'];
                                                                echo "<option value='" . $id_injoin. "' " .  " selected>" . ($detalle_injoin) . "</option>";
                                  
                                                            
                                                            if (mysqli_num_rows($ejecutar1) > 0) {
                                                                while ($row2 = mysqli_fetch_array($ejecutar1)) {  
                                                                    
                                                                    $id_selec = $row2['id_estado_civil'];
                                                                    $detalle_selec = $row2['detalle'];
                                                                    echo "<option value='" . $id_selec. "' " .  ">" . ($detalle_selec) . "</option>";
                                                                }
                                                            } 
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>                                                                             

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX Grupo Etnico XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
                                <div class="form-group">
                                             <label for="g_etnico_repre">Grupo Étnico:</label> 
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <select class="form-control" name="g_etnico_repre" id="g_etnico_repre">
                                                         <?php
                                                            $sql_selec1 = "select * from tbl_etnia order by detalle asc";
                                                            $ejecutar1 = mysqli_query($con, $sql_selec1);
                                                            $sql_inner_j1 = "SELECT tbl_socio_economica.etnia_se, tbl_etnia.detalle
                                                            FROM tbl_socio_economica
                                                            INNER JOIN tbl_etnia
                                                            ON tbl_etnia.id_etnia = tbl_socio_economica.etnia_se
                                                            WHERE tbl_socio_economica.id_ninio_se = $edit_id";
                                                            $ejecutar_ij2 = mysqli_query($con, $sql_inner_j1);
                                                            $row3 = mysqli_fetch_array($ejecutar_ij2);
                                                            $id_injoin=$row3['etnia_se'];
                                                                $detalle_injoin=$row3['detalle'];
                                                                echo "<option value='" . $id_injoin. "' " .  " selected>" . ($detalle_injoin) . "</option>";
                                  
                                                            
                                                            if (mysqli_num_rows($ejecutar1) > 0) {
                                                                while ($row2 = mysqli_fetch_array($ejecutar1)) {  
                                                                    
                                                                    $id_selec = $row2['id_etnia'];
                                                                    $detalle_selec = $row2['detalle'];
                                                                    echo "<option value='" . $id_selec. "' " .  ">" . ($detalle_selec) . "</option>";
                                                                }
                                                            } 
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>


<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX Direccion dom XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-8" >
                                            <label for="direcion_do_repre">Dirección del domicilio :</label>
                                            <input type="text" id="direcion_do_repre" name="direcion_do_repre" class="form-control" value= "<?php echo $direccion_dom_se ?>" placeholder="Dirección del domicilio" >
                                        </div>
                                    </div>
                                </div>

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX Telefono XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-8" >
                                            <label for="tlefono_repre">Teléfono :</label>
                                            <input type="text" id="tlefono_repre" name="tlefono_repre" class="form-control" value= "<?php echo $telefono_dom_se ?>" placeholder="Ej: 123456789" maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                        </div>
                                    </div>
                                </div>

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX instruccion XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
                                            <div class="form-group">
                                             <label for="instruccion_repre">Instrucción:</label> 
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <select class="form-control" name="instruccion_repre" id="instruccion_repre">
                                                         <?php
                                                            $sql_selec1 = "select * from tbl_instruccion order by detalle asc";
                                                            $ejecutar1 = mysqli_query($con, $sql_selec1);
                                                            $sql_inner_j1 = "SELECT tbl_socio_economica.instruccion_se, tbl_instruccion.detalle
                                                            FROM tbl_socio_economica
                                                            INNER JOIN tbl_instruccion
                                                            ON tbl_instruccion.id_instruccion = tbl_socio_economica.instruccion_se
                                                            WHERE tbl_socio_economica.id_ninio_se = $edit_id";
                                                            $ejecutar_ij2 = mysqli_query($con, $sql_inner_j1);
                                                            $row3 = mysqli_fetch_array($ejecutar_ij2);
                                                            $id_injoin=$row3['instruccion_se'];
                                                                $detalle_injoin=$row3['detalle'];
                                                                echo "<option value='" . $id_injoin. "' " .  " selected>" . ($detalle_injoin) . "</option>";
                                  
                                                            
                                                            if (mysqli_num_rows($ejecutar1) > 0) {
                                                                while ($row2 = mysqli_fetch_array($ejecutar1)) {  
                                                                    
                                                                    $id_selec = $row2['id_instruccion'];
                                                                    $detalle_selec = $row2['detalle'];
                                                                    echo "<option value='" . $id_selec. "' " .  ">" . ($detalle_selec) . "</option>";
                                                                }
                                                            } 
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>  

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX ocupacion XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
                                            <div class="form-group">
                                             <label for="ocupacion_repre">Ocupación:</label> 
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <select class="form-control" name="ocupacion_repre" id="ocupacion_repre">
                                                         <?php
                                                            $sql_selec1 = "select * from tbl_ocupacion order by detalle asc";
                                                            $ejecutar1 = mysqli_query($con, $sql_selec1);
                                                            $sql_inner_j1 = "SELECT tbl_socio_economica.ocupación_se, tbl_ocupacion.detalle
                                                            FROM tbl_socio_economica
                                                            INNER JOIN tbl_ocupacion
                                                            ON tbl_ocupacion.id_ocupacion = tbl_socio_economica.ocupación_se
                                                            WHERE tbl_socio_economica.id_ninio_se = $edit_id";
                                                            $ejecutar_ij2 = mysqli_query($con, $sql_inner_j1);
                                                            $row3 = mysqli_fetch_array($ejecutar_ij2);
                                                            $id_injoin=$row3['ocupación_se'];
                                                                $detalle_injoin=$row3['detalle'];
                                                                echo "<option value='" . $id_injoin. "' " .  " selected>" . ($detalle_injoin) . "</option>";
                                  
                                                            
                                                            if (mysqli_num_rows($ejecutar1) > 0) {
                                                                while ($row2 = mysqli_fetch_array($ejecutar1)) {  
                                                                    
                                                                    $id_selec = $row2['id_ocupacion'];
                                                                    $detalle_selec = $row2['detalle'];
                                                                    echo "<option value='" . $id_selec. "' " .  ">" . ($detalle_selec) . "</option>";
                                                                }
                                                            } 
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX Vinculo Laboral XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
                            <div class="form-group">    
                                <div class="row">                                  
                                    <div class="col-md-8">
                                        <label for="vinculo_laboral_se">Vínculo laboral:</label>
                                        <input type="text" id="vinculo_laboral_se" name="vinculo_laboral_se" class="form-control" value="<?php echo $vinculo_laboral ?>" placeholder="Vínculo laboral" >
                                    </div>
                                </div>
                            </div>                                 

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX Direccion dom LAboralXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-8" >
                                            <label for="direcion_trabajo_repre">Dirección del trabajo :</label>
                                            <input type="text" id="direcion_trabajo_repre" name="direcion_trabajo_repre" class="form-control" value= "<?php echo $direccion_laboral_se ?>" placeholder="Dirección del trabajo" >
                                        </div>
                                    </div>
                                </div>

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX Telefono trabajoXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-8" >
                                            <label for="tlefono_tabajo_repre">Teléfono del trabajo :</label>
                                            <input type="text" id="tlefono_tabajo_repre" name="tlefono_tabajo_repre" class="form-control" value= "<?php echo $telefono_trabajo_se ?>" placeholder="Ej: 123456789" maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                        </div>
                                    </div>
                                </div>
                                
<!--*********************************************** DATOS DE VIVIENDA Y HOGAR **************************************************** -->                                             
                                        <div class="row">
                                            <label for="nom_dpr" style="font-size:1.5rem; color:#2174AB">DATOS DE VIVIENDA Y HOGAR</label>
                                        </div>

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX Vivienda (arrendada prestada propia) XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX --> 
                                            <div class="form-group">
                                             <label for="vivienda_ocupa">La vivienda que ocupa es:</label> 
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <select class="form-control" name="vivienda_ocupa" id="vivienda_ocupa">
                                                         <?php
                                                            $sql_selec1 = "select * from tbl_vivienda order by detalle asc";
                                                            $ejecutar1 = mysqli_query($con, $sql_selec1);
                                                            $sql_inner_j1 = "SELECT tbl_socio_economica.vivienda_acupa_es, tbl_vivienda.detalle
                                                            FROM tbl_socio_economica
                                                            INNER JOIN tbl_vivienda
                                                            ON tbl_vivienda.id_vivienda = tbl_socio_economica.vivienda_acupa_es
                                                            WHERE tbl_socio_economica.id_ninio_se = $edit_id";
                                                            $ejecutar_ij2 = mysqli_query($con, $sql_inner_j1);
                                                            $row3 = mysqli_fetch_array($ejecutar_ij2);
                                                            $id_injoin=$row3['vivienda_acupa_es'];
                                                                $detalle_injoin=$row3['detalle'];
                                                                echo "<option value='" . $id_injoin. "' " .  " selected>" . ($detalle_injoin) . "</option>";
                                  
                                                            
                                                            if (mysqli_num_rows($ejecutar1) > 0) {
                                                                while ($row2 = mysqli_fetch_array($ejecutar1)) {  
                                                                    
                                                                    $id_selec = $row2['id_vivienda'];
                                                                    $detalle_selec = $row2['detalle'];
                                                                    echo "<option value='" . $id_selec. "' " .  ">" . ($detalle_selec) . "</option>";
                                                                }
                                                            } 
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>            

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX Tipo de Vivienda XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->                                                                        
                                            <div class="form-group">
                                             <label for="vivienda_tipo">Su vivienda es:</label> 
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <select class="form-control" name="vivienda_tipo" id="vivienda_tipo">
                                                         <?php
                                                            $sql_selec1 = "select * from tbl_tipo_vivienda order by detalle asc";
                                                            $ejecutar1 = mysqli_query($con, $sql_selec1);
                                                            $sql_inner_j1 = "SELECT tbl_socio_economica.tipo_vivienda_se, tbl_tipo_vivienda.detalle
                                                            FROM tbl_socio_economica
                                                            INNER JOIN tbl_tipo_vivienda
                                                            ON tbl_tipo_vivienda.id_tipo_vivienda = tbl_socio_economica.tipo_vivienda_se
                                                            WHERE tbl_socio_economica.id_ninio_se = $edit_id";
                                                            $ejecutar_ij2 = mysqli_query($con, $sql_inner_j1);
                                                            $row3 = mysqli_fetch_array($ejecutar_ij2);
                                                            $id_injoin=$row3['tipo_vivienda_se'];
                                                                $detalle_injoin=$row3['detalle'];
                                                                echo "<option value='" . $id_injoin. "' " .  " selected>" . ($detalle_injoin) . "</option>";
                                  
                                                            
                                                            if (mysqli_num_rows($ejecutar1) > 0) {
                                                                while ($row2 = mysqli_fetch_array($ejecutar1)) {  
                                                                    
                                                                    $id_selec = $row2['id_tipo_vivienda'];
                                                                    $detalle_selec = $row2['detalle'];
                                                                    echo "<option value='" . $id_selec. "' " .  ">" . ($detalle_selec) . "</option>";
                                                                }
                                                            } 
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div> 
<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX Num habitaciones XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
                                            <div class="form-group">
                                             <label for="numer_habitaciones">¿Cuántos cuartos tiene su vivienda?</label> 
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <select class="form-control" id="numer_habitaciones" name="numer_habitaciones" >
                                                            <option value="<?php echo $num_habitaciones_se ?>"><?php echo $num_habitaciones_se ?></option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>                                                        
                                                            <option value="4">4</option>                                                        
                                                            <option value="5">5</option>                                                        
                                                            <option value="6">6</option>                                                        
                                                            <option value="7">7</option>                                                        
                                                            <option value="8">8</option>                                                        
                                                            <option value="9">9</option>                                                        
                                                            <option value="10">10</option>
                                                            <option value="11">11</option>
                                                            <option value="12">12</option>
                                                            <option value="13">13</option>                                                        
                                                            <option value="14">14</option>                                                        
                                                            <option value="15">15</option>                                                        
                                                            <option value="16">16</option>                                                        
                                                            <option value="17">17</option>                                                        
                                                            <option value="18">18</option>                                                        
                                                            <option value="19">19</option>                                                        
                                                            <option value="20">20</option>                                                        
                                                        </select>
                                                    </div>                                                
                                                </div>
                                            </div>

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX Tipo de PISO XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->                  
                                            <div class="form-group">
                                             <label for="piso_tipo">El piso de su casa es:</label> 
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <select class="form-control" name="piso_tipo" id="piso_tipo">
                                                         <?php
                                                            $sql_selec1 = "select * from tbl_tipo_piso order by detalle asc";
                                                            $ejecutar1 = mysqli_query($con, $sql_selec1);
                                                            $sql_inner_j1 = "SELECT tbl_socio_economica.tipo_piso_se, tbl_tipo_piso.detalle
                                                            FROM tbl_socio_economica 
                                                            INNER JOIN tbl_tipo_piso
                                                            ON tbl_tipo_piso.id_tipo_piso = tbl_socio_economica.tipo_piso_se
                                                            WHERE tbl_socio_economica.id_ninio_se = $edit_id";
                                                            $ejecutar_ij2 = mysqli_query($con, $sql_inner_j1);
                                                            $row3 = mysqli_fetch_array($ejecutar_ij2);
                                                            $id_injoin=$row3['tipo_piso_se'];
                                                                $detalle_injoin=$row3['detalle'];
                                                                echo "<option value='" . $id_injoin. "' " .  " selected>" . ($detalle_injoin) . "</option>";
                                  
                                                            
                                                            if (mysqli_num_rows($ejecutar1) > 0) {
                                                                while ($row2 = mysqli_fetch_array($ejecutar1)) {  
                                                                    
                                                                    $id_selec = $row2['id_tipo_piso'];
                                                                    $detalle_selec = $row2['detalle'];
                                                                    echo "<option value='" . $id_selec. "' " .  ">" . ($detalle_selec) . "</option>";
                                                                }
                                                            } 
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>   

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX Tipo de PARED XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
                                            <div class="form-group">
                                             <label for="paredes_tipo">Las paredes de su casa son:</label> 
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <select class="form-control" name="paredes_tipo" id="paredes_tipo">
                                                         <?php
                                                            $sql_selec1 = "select * from tbl_tipo_pared order by detalle asc";
                                                            $ejecutar1 = mysqli_query($con, $sql_selec1);
                                                            $sql_inner_j1 = "SELECT tbl_socio_economica.tipo_pared_se, tbl_tipo_pared.detalle
                                                            FROM tbl_socio_economica
                                                            INNER JOIN tbl_tipo_pared
                                                            ON tbl_tipo_pared.id_tipo_pared = tbl_socio_economica.tipo_pared_se
                                                            WHERE tbl_socio_economica.id_ninio_se = $edit_id";
                                                            $ejecutar_ij2 = mysqli_query($con, $sql_inner_j1);
                                                            $row3 = mysqli_fetch_array($ejecutar_ij2);
                                                            $id_injoin=$row3['tipo_pared_se'];
                                                                $detalle_injoin=$row3['detalle'];
                                                                echo "<option value='" . $id_injoin. "' " .  " selected>" . ($detalle_injoin) . "</option>";
                                  
                                                            
                                                            if (mysqli_num_rows($ejecutar1) > 0) {
                                                                while ($row2 = mysqli_fetch_array($ejecutar1)) {  
                                                                    
                                                                    $id_selec = $row2['id_tipo_pared'];
                                                                    $detalle_selec = $row2['detalle'];
                                                                    echo "<option value='" . $id_selec. "' " .  ">" . ($detalle_selec) . "</option>";
                                                                }
                                                            } 
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div> 

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX Tipo de TECHO XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->            
                                            <div class="form-group">
                                             <label for="techo_tipo">El techo de su casa es:</label> 
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <select class="form-control" name="techo_tipo" id="techo_tipo">
                                                         <?php
                                                            $sql_selec1 = "select * from tbl_tipo_techo order by detalle asc";
                                                            $ejecutar1 = mysqli_query($con, $sql_selec1);
                                                            $sql_inner_j1 = "SELECT tbl_socio_economica.tipo_techo_se, tbl_tipo_techo.detalle
                                                            FROM tbl_socio_economica
                                                            INNER JOIN tbl_tipo_techo
                                                            ON tbl_tipo_techo.id_tipo_techo = tbl_socio_economica.tipo_techo_se
                                                            WHERE tbl_socio_economica.id_ninio_se = $edit_id";
                                                            $ejecutar_ij2 = mysqli_query($con, $sql_inner_j1);
                                                            $row3 = mysqli_fetch_array($ejecutar_ij2);
                                                            $id_injoin=$row3['tipo_techo_se'];
                                                                $detalle_injoin=$row3['detalle'];
                                                                echo "<option value='" . $id_injoin. "' " .  " selected>" . ($detalle_injoin) . "</option>";
                                  
                                                            
                                                            if (mysqli_num_rows($ejecutar1) > 0) {
                                                                while ($row2 = mysqli_fetch_array($ejecutar1)) {  
                                                                    
                                                                    $id_selec = $row2['id_tipo_techo'];
                                                                    $detalle_selec = $row2['detalle'];
                                                                    echo "<option value='" . $id_selec. "' " .  ">" . ($detalle_selec) . "</option>";
                                                                }
                                                            } 
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div> 

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX SERVIC BASICOS (No esta en la tabla EI) XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->                                        
                                            <script type = "text/javascript"> 
                                                    var list_servic_basic = function(){
                                                        //$(document).ready(function(){
                                                         var id_ninio_list_sb = $("#id_de_ninios_se").val();
                                                         //alert(id_ninio_list_sb); 
                                                         $.ajax({
                                                             type: 'POST',
                                                             url: '../admin/ajax_archivos/ajax_se_servicios_basic_listar.php',
                                                             data: {
                                                                 'id_ajax_ninio_list_sb': id_ninio_list_sb,
                                                             },
                                                             success: function(data){
                                                                 //alert(data);
                                                                 $('#list_servic_basic').empty().html(data);
                                                             }
                                                         })
                                                     } 

                                                //eliminar
                                                $(document).on("click","#eliminar_ser_bas",function(){
                                                     if(confirm("Está seguro que desea eliminar")){
                                                         var id_eliminar_sb = $(this).data("id_eliminar_sb");
                                                         //alert(id_eliminar_sb);
                                                         $.ajax({
                                                             type: 'POST',
                                                             url: '../admin/ajax_archivos/ajax_se_servicios_basic_eliminar.php',
                                                             data: {
                                                                'id_ajax_eliminar_sb': id_eliminar_sb,
                                                             },
                                                             success: function(respuesta){
                                                                 //alert(respuesta);
                                                                 list_servic_basic();
                                                             },
                                                             error:function(){
                                                             alert("error")
                                                            }
                                                         });
                                                         return false;
                                                     };
                                                 } )              
                                                //fin eliminar
                                               
                                                $(document).ready(function(){
                                                  $("#btn_servic_basic").click(function (){
                                                      var id_sv = $("#serv_basic").val();
                                                      var id_ninio_sv = $("#id_de_ninios_se").val();
                                                      //alert(id_sv);
                                                      //alert(id_ninio_sv);
                                                      $.ajax({
                                                          type: 'POST',
                                                          url: '../admin/ajax_archivos/ajax_se_servicios_basic_guardar.php',
                                                          data: {
                                                                'id_ajax_ninio_sv':id_ninio_sv,
                                                                'id_ajax_sv':id_sv,
                                                            },
                                                          success: function (respuesta){
                                                            //  alert(respuesta);
                                                            list_servic_basic();
                                                          },
                                                          error: function (){
                                                              
                                                              alert("Error");
                                                          }

                                                      });
                                                      return false;
                                                  });  
                                                });

                                            </script>

<!-------------------------------------------------- Tabla de ser bas ------------------------------------------------------------>                             
                                            <div class="form-group">
                                             <label for="serv_basic">¿Qué servicios básicos dispone su vivienda?</label> 
                                                <div class="row">
                                                            <div class="col-md-8">
                                                                <select class="form-control" name="serv_basic" id="serv_basic">
                                                                  <option value="seleccione">Seleccione</option>
                                                                    <?php
                                                                    $sql_ser_bas = "select * from tbl_servicios_basicos order by detalle asc";
                                                                    $ejecutar = mysqli_query($con, $sql_ser_bas);//ejecutar consulta
                                                                    
                                                                    if (mysqli_num_rows($ejecutar) > 0) {
                                                                        while ($row2 = mysqli_fetch_array($ejecutar)) {  
                                                                            
                                                                            $detalle_sv = $row2['detalle'];
                                                                            $id_sv = $row2['id_servi_basicos'];
                                                                            echo "<option value='" . $id_sv. "' " .  ">" . ($detalle_sv) . "</option>";
                                                                        }
                                                                    } 
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <button type="button" class="btn btn-primary" id="btn_servic_basic">Ver / Agregar</button>
                                                </div>          
                                            </div>       
                                                    <div class="row" >
                                                        <div class="card" style="width: 100%;">
                                                            <div class="card-body">                                       
                                                                <div class="div" id="list_servic_basic">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

<!--*********************************************** BONO DE DESARROLLO HUMANO **************************************************** -->                                             
                                        <div class="row">
                                            <label for="nom_dpr" style="font-size:1.5rem; color:#2174AB">BONO DE DESARROLLO HUMANO</label>
                                        </div>

<!--*********************************************************** Recibe vono ******************************************************************-->
                                <div class="form-group">
                                  <label for="recibe_bono_dh">¿Recibe bono de desarrollo humano?</label> 
                                    <div class="row">
                                        <div class="col-md-3">
                                            <select class="form-control" id="recibe_bono_dh" name="recibe_bono_dh" >
                                                <option value="<?php echo $recibe_bono_se ?>"><?php echo $recibe_bono_se ?></option>
                                                <option value="Si">Si</option>
                                                <option value="No">No</option>                                
                                            </select>
                                        </div>
                                    </div>
                                </div>

<!--*********************************************** MIEMBROS DEL HOGAR Y EDUCACIÓN **************************************************** -->                                             
                                        <div class="row">
                                            <label for="nom_dpr" style="font-size:1.5rem; color:#2174AB">MIEMBROS DEL HOGAR Y EDUCACIÓN</label>
                                        </div>

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX Num habitaciones XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
                                            <div class="form-group">
                                             <label for="miembros_h_familia">¿Cuátos miembros de su hogar componen su familia?</label> 
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <select class="form-control" id="miembros_h_familia" name="miembros_h_familia" >
                                                            <option value="<?php echo $miembros_hogar_se ?>"><?php echo $miembros_hogar_se ?></option>
                                                            <option value="0">0</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>                                                        
                                                            <option value="4">4</option>                                                        
                                                            <option value="5">5</option>                                                        
                                                            <option value="6">6</option>                                                        
                                                            <option value="7">7</option>                                                        
                                                            <option value="8">8</option>                                                        
                                                            <option value="9">9</option>                                                        
                                                            <option value="10">10</option>
                                                            <option value="11">11</option>
                                                            <option value="12">12</option>
                                                            <option value="13">13</option>                                                        
                                                            <option value="14">14</option>                                                        
                                                            <option value="15">15</option>                                                        
                                                            <option value="16">16</option>                                                        
                                                            <option value="17">17</option>                                                        
                                                            <option value="18">18</option>                                                        
                                                            <option value="19">19</option>                                                        
                                                            <option value="20">20</option>                                                        
                                                        </select>
                                                    </div>                                                
                                                </div>
                                            </div>  

<!--............................................Numero_ci/Apellidos/Nombres........................................................-->
                                        <div class="form-group">
                                        <label for="num_hijos_varones">Número de hijos:</label>
                                            <div class="row">                                  
                                                <label class = "col-md-1" style="padding-top: 1%;padding-right: 10%" for="num_hijos_varones">Hombres:</label>  
                                                <div class="col-md-3">
                                                    <select class="form-control" id="num_hijos_varones" name="num_hijos_varones" >
                                                        <option value="<?php echo $num_hijos_se ?>"><?php echo $num_hijos_se ?></option>
                                                        <option value="0">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>                                                        
                                                        <option value="4">4</option>                                                        
                                                        <option value="5">5</option>                                                        
                                                        <option value="6">6</option>                                                        
                                                        <option value="7">7</option>                                                        
                                                        <option value="8">8</option>                                                        
                                                        <option value="9">9</option>                                                        
                                                        <option value="10">10</option>
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>
                                                        <option value="13">13</option>                                                        
                                                        <option value="14">14</option>                                                        
                                                        <option value="15">15</option>                                                        
                                                        <option value="16">16</option>                                                        
                                                        <option value="17">17</option>                                                        
                                                        <option value="18">18</option>                                                        
                                                        <option value="19">19</option>                                                        
                                                        <option value="20">20</option>                                                        
                                                    </select>
                                                </div>
                                                <label class = "col-md-1" style="padding-top: 1%;padding-right: 10%" for="num_hijas_mujeres">Mujeres:</label> 
                                                <div class="col-md-3">
                                                    <select class="form-control" id="num_hijas_mujeres" name="num_hijas_mujeres" >
                                                        <option value="<?php echo $num_hijas_se ?>"><?php echo $num_hijas_se ?></option>
                                                        <option value="0">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>                                                        
                                                        <option value="4">4</option>                                                        
                                                        <option value="5">5</option>                                                        
                                                        <option value="6">6</option>                                                        
                                                        <option value="7">7</option>                                                        
                                                        <option value="8">8</option>                                                        
                                                        <option value="9">9</option>                                                        
                                                        <option value="10">10</option>
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>
                                                        <option value="13">13</option>                                                        
                                                        <option value="14">14</option>                                                        
                                                        <option value="15">15</option>                                                        
                                                        <option value="16">16</option>                                                        
                                                        <option value="17">17</option>                                                        
                                                        <option value="18">18</option>                                                        
                                                        <option value="19">19</option>                                                        
                                                        <option value="20">20</option>                                                        
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX MIEMBROS HOGAR (No esta en la tabla EI) XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->                                        
                                            <script type = "text/javascript"> 
                                                    var list_miembros_hogar = function(){
                                                        //$(document).ready(function(){
                                                         var id_ninio_list_mh = $("#id_de_ninios_se").val();
                                                         //alert(id_ninio_list_sb); 
                                                         $.ajax({
                                                             type: 'POST',
                                                             url: '../admin/ajax_archivos/ajax_se_miembros_hogar_listar.php',
                                                             data: {
                                                                 'id_ajax_ninio_list_mh': id_ninio_list_mh,
                                                             },
                                                             success: function(data){
                                                                 //alert(data);
                                                                 $('#list_miembros_hogar_se').empty().html(data);
                                                             }
                                                         })
                                                     } 

                                                //eliminar
                                                $(document).on("click","#eliminar_miembros_h",function(){
                                                     if(confirm("Está seguro que desea eliminar")){
                                                         var id_eliminar_miem_h = $(this).data("id_eliminar_mh");
                                                         //alert(id_eliminar_miem_h);
                                                         $.ajax({
                                                             type: 'POST',
                                                             url: '../admin/ajax_archivos/ajax_se_miembros_hogar_eliminar.php',
                                                             data: {
                                                                'id_ajax_eliminar_miem_h': id_eliminar_miem_h,
                                                             },
                                                             success: function(respuesta){
                                                                 //alert(respuesta);
                                                                 list_miembros_hogar();
                                                             },
                                                             error:function(){
                                                             alert("error")
                                                            }
                                                         });
                                                         return false;
                                                     };
                                                 } )              
                                                //fin eliminar
                                               
                                                $(document).ready(function(){
                                                  $("#btn_miembros_hogar").click(function (){
                                                      var apellid_mh = $("#apellido_mh").val();
                                                      var nombr_mh = $("#nombre_mh").val();
                                                      var id_parent_mh = $("#parentesco_mh").val();
                                                      var edad_del_mh = $("#edad_mh").val();
                                                      var instruccion_del_mh = $("#instruccion_mh").val();
                                                      var ocupacion_del_mh = $("#ocupacion_mh").val();
                                                      var vinculo_lab_del_mh = $("#vinculo_lab_mh").val();
                                                      var dir_trab_del_mh = $("#dir_trab_mh").val();
                                                      var tlf_trab_del_mh = $("#tlf_trab_mh").val();
                                                      var id_ninio_mh = $("#id_de_ninios_se").val();
                                                      var estado_seco_mh = $("#estado_seco").val();
                                                      //alert(apellid_mh);
                                                      //alert(nombr_mh);
                                                      //alert(id_parent_mh);
                                                      //alert(edad_del_mh);
                                                      //alert(instruccion_del_mh);
                                                      //alert(ocupacion_del_mh);
                                                      //alert(vinculo_lab_del_mh);
                                                      //alert(dir_trab_del_mh);
                                                      //alert(tlf_trab_del_mh);
                                                      //alert(id_ninio_mh);
                                                      $.ajax({
                                                          type: 'POST',
                                                          url: '../admin/ajax_archivos/ajax_se_miembros_hogar_guardar.php',
                                                          data: {
                                                                'ajax_apellid_mh':apellid_mh,
                                                                'ajax_nombr_mh':nombr_mh,
                                                                'id_ajax_parent_mh':id_parent_mh,
                                                                'ajax_edad_del_mh':edad_del_mh,
                                                                'id_ajax_instruccion_del_mh':instruccion_del_mh,
                                                                'id_ajax_ocupacion_del_mh':ocupacion_del_mh,
                                                                'ajax_vinculo_lab_del_mh':vinculo_lab_del_mh,
                                                                'ajax_dir_trab_del_mh':dir_trab_del_mh,
                                                                'ajax_tlf_trab_del_mh':tlf_trab_del_mh,
                                                                'id_ajax_id_ninio_mh':id_ninio_mh,
                                                                'ajax_estado_seco_mh':estado_seco_mh,
                                                            },
                                                          success: function (respuesta){
                                                            document.getElementById("parentesco_mh").value = "Seleccione";
                                                            document.getElementById("apellido_mh").value = "";
                                                            document.getElementById("nombre_mh").value = "";
                                                            document.getElementById("edad_mh").value = "";
                                                            document.getElementById("instruccion_mh").value = "Seleccione";
                                                            document.getElementById("ocupacion_mh").value = "Seleccione";
                                                            document.getElementById("vinculo_lab_mh").value = "";
                                                            document.getElementById("dir_trab_mh").value = "";
                                                            document.getElementById("tlf_trab_mh").value = "";
                                                              //alert(respuesta);
                                                            list_miembros_hogar();
                                                          },
                                                          error: function (){
                                                              
                                                              alert("Error");
                                                          }

                                                      });
                                                      return false;
                                                  });  
                                                });

                                               

                                            </script>

                                            

<!-------------------------------------------------- Inputs - selects -Miembros del hogar ------------------------------------------------------------>                             
                                    <div class="form-group">
                                            <label for="miembros_hog">Registro de los miembros del hogar (No volver a ingresar datos del representante): </label> 
                                    <!--    <form id="frmajax" method="POST">     -->
                                            <div class="row">
                                                <label class = "col-md-1" style="padding-top: 1%;padding-right: 10%" for="parentesco_mh">Parentesco:</label> 
                                                <div class="col-md-8">
                                                    <select class="form-control" name="parentesco_mh" id="parentesco_mh">
                                                        <option value="seleccione">Seleccione</option>
                                                        <?php
                                                        $sql_parentesco_mh = "select * from tbl_parentesco order by detalle asc";
                                                        $ejecutar = mysqli_query($con, $sql_parentesco_mh);//ejecutar consulta
                                                        
                                                        if (mysqli_num_rows($ejecutar) > 0) {
                                                            while ($row2 = mysqli_fetch_array($ejecutar)) {  
                                                                
                                                                $detalle_pmh = $row2['detalle'];
                                                                $id_pmh = $row2['id_parentesco'];
                                                                echo "<option value='" . $id_pmh. "' " .  ">" . ($detalle_pmh) . "</option>";
                                                            }
                                                        } 
                                                        ?>
                                                    </select>
                                                </div>
                                            </div><br> 

                                            <div class="row">                                  
                                                <label class = "col-md-1" style="padding-top: 1%;padding-right: 10%" for="apellido_mh">Apellidos:</label>  
                                                <div class="col-md-8">
                                                    <input name="apellido_mh" id= "apellido_mh" class="form-control" value="" placeholder="Apellidos" >
                                                </div>
                                            </div> <br> 

                                            <div class="row">                                  
                                                <label class = "col-md-1" style="padding-top: 1%;padding-right: 10%" for="nombre_mh">Nombres:</label>  
                                                <div class="col-md-8">
                                                    <input type="text" id="nombre_mh" name="nombre_mh" class="form-control" value="" placeholder="Nombres" >
                                                </div>
                                            </div> <br>

                                            <div class="row">                                  
                                                <label class = "col-md-1" style="padding-top: 1%;padding-right: 10%" for="edad_mh">Edad:</label>  
                                                <div class="col-md-3">
                                                    <div class="input-group">
                                                        <input type="text" id="edad_mh" name="edad_mh" maxlength="3" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control" value="" placeholder="Edad">
                                                        <span class="input-group-addon">años</span>
                                                    </div>
                                                </div>
                                            </div> <br>

                                            <div class="row">
                                                <label class = "col-md-1" style="padding-top: 1%;padding-right: 10%" for="instruccion_mh">Instrucción:</label> 
                                                <div class="col-md-8">
                                                    <select class="form-control" name="instruccion_mh" id="instruccion_mh">
                                                        <option value="seleccione">Seleccione</option>
                                                        <?php
                                                        $sql_instruccion_mh = "select * from tbl_instruccion order by detalle asc";
                                                        $ejecutar = mysqli_query($con, $sql_instruccion_mh);//ejecutar consulta
                                                        
                                                        if (mysqli_num_rows($ejecutar) > 0) {
                                                            while ($row2 = mysqli_fetch_array($ejecutar)) {  
                                                                
                                                                $detalle_instruccion_mh = $row2['detalle'];
                                                                $id_instruccion_mh = $row2['id_instruccion'];
                                                                echo "<option value='" . $id_instruccion_mh. "' " .  ">" . ($detalle_instruccion_mh) . "</option>";
                                                            }
                                                        } 
                                                        ?>
                                                    </select>
                                                </div>
                                            </div> <br>

                                            <div class="row">
                                                <label class = "col-md-1" style="padding-top: 1%;padding-right: 10%" for="ocupacion_mh">Ocupación:</label> 
                                                <div class="col-md-8">
                                                    <select class="form-control" name="ocupacion_mh" id="ocupacion_mh">
                                                        <option value="seleccione">Seleccione</option>
                                                        <?php
                                                        $sql_ocupacion_mh = "select * from tbl_ocupacion order by detalle asc";
                                                        $ejecutar = mysqli_query($con, $sql_ocupacion_mh);//ejecutar consulta
                                                        
                                                        if (mysqli_num_rows($ejecutar) > 0) {
                                                            while ($row2 = mysqli_fetch_array($ejecutar)) {  
                                                                
                                                                $detalle_ocupacion_mh = $row2['detalle'];
                                                                $id_ocupacion_mh = $row2['id_ocupacion'];
                                                                echo "<option value='" . $id_ocupacion_mh. "' " .  ">" . ($detalle_ocupacion_mh) . "</option>";
                                                            }
                                                        } 
                                                        ?>
                                                    </select>
                                                </div>
                                            </div> <br>

                                            <div class="row">                                  
                                                <label class = "col-md-1" style="padding-top: 0%;padding-right: 10%" for="vinculo_lab_mh">Vínculo laboral:</label>  
                                                <div class="col-md-8">
                                                    <input type="text" id="vinculo_lab_mh" name="vinculo_lab_mh" class="form-control" value="" placeholder="Vínculo laboral" >
                                                </div>
                                            </div> <br>

                                            <div class="row">                                  
                                                <label class = "col-md-1" style="padding-top: 0%;padding-right: 10%" for="dir_trab_mh">Dirección trabajo:</label>  
                                                <div class="col-md-8">
                                                    <input type="text" id="dir_trab_mh" name="dir_trab_mh" class="form-control" value="" placeholder="Dirección trabajo" >
                                                </div>
                                            </div> <br>

                                            <div class="row">                                  
                                                <label class = "col-md-1" style="padding-top: 0%;padding-right: 10%" for="tlf_trab_mh">Teléfono:</label>  
                                                <div class="col-md-8">
                                                    <input type="text" id="tlf_trab_mh" name="tlf_trab_mh" class="form-control" value="" maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57' placeholder="Teléfono trabajo">
                                                </div>
                                                <button type="button" class="btn btn-primary" id="btn_miembros_hogar">Ver / Agregar</button>
                                            <!--    <input type="submit" value="Agregar" name="frmajax" class="btn btn-primary">  -->
                                            </div> <br>

                                            
                                            <input type="hidden" id = "estado_seco" name="estado_seco" class="form-control" value= "Activo">
                                                                          
                                            </div> 
                                                <div class="row" >
                                                    <div class="card" style="width: 100%;">
                                                        <div class="card-body">                                       
                                                            <div class="div" id="list_miembros_hogar_se">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                             
                                    <!--    </form>  -->
                                      

<!--*********************************************** PRESENCIA DE ENFERMEDADES **************************************************** -->                                             
                                        <div class="row">
                                            <label for="nom_dpr" style="font-size:1.5rem; color:#2174AB">PRESENCIA DE ENFERMEDADES</label>
                                        </div>

<!--*********************************************************** Bebidas alcoholicas ******************************************************************-->
                                <div class="form-group">
                                  <label for="consume_alcohol">¿Consume bebidas alcohólicas?</label> 
                                    <div class="row">
                                        <div class="col-md-3">
                                            <select class="form-control" id="consume_alcohol" name="consume_alcohol" >
                                                <option value="<?php echo $consume_bebidas_se ?>"><?php echo $consume_bebidas_se ?></option>
                                                <option value="Si">Si</option>
                                                <option value="No">No</option>                                
                                            </select>
                                        </div>
                                    </div>
                                </div>  

<!--*********************************************************** Fumas ******************************************************************-->
                                <div class="form-group">
                                  <label for="ud_fuma">¿Usted fuma?</label> 
                                    <div class="row">
                                        <div class="col-md-3">
                                            <select class="form-control" id="ud_fuma" name="ud_fuma" >
                                                <option value="<?php echo $fuma_se ?>"><?php echo $fuma_se ?></option>
                                                <option value="Si">Si</option>
                                                <option value="No">No</option>                                
                                            </select>
                                        </div>
                                    </div>
                                </div> 

<!--*********************************************************** Discapacidad algun familiar ******************************************************************-->
                                <div class="form-group">
                                  <label for="familiar_discapacidad">¿Sufre algún miembro de la familia alguna discapacidad?</label> 
                                    <div class="row">
                                        <div class="col-md-3">
                                            <select class="form-control" id="familiar_discapacidad" name="familiar_discapacidad" >
                                                <option value="<?php echo $tiene_disca_miembro_familia ?>"><?php echo $tiene_disca_miembro_familia ?></option>
                                                <option value="Si">Si</option>
                                                <option value="No">No</option>                                
                                            </select>
                                        </div>
                                    </div>
                                </div>  

<!--*********************************************************** Familiares asiste a manuela espejo ******************************************************************-->
                                <div class="form-group">
                                  <label for="asisten_al_manuela_esp">¿El/los miembro(s) de la familia con discapacidad accede a la Misión Manuela Espejo?</label> 
                                    <div class="row">
                                        <div class="col-md-3">
                                            <select class="form-control" id="asisten_al_manuela_esp" name="asisten_al_manuela_esp" >
                                                <option value="<?php echo $fami_discap_va_manuela_espejo ?>"><?php echo $fami_discap_va_manuela_espejo ?></option>
                                                <option value="Si">Si</option>
                                                <option value="No">No</option>                                
                                            </select>
                                        </div>
                                    </div>
                                </div>

<!--*********************************************** INGRESO FAMILIAR **************************************************** -->                                             
                                        <div class="row">
                                            <label for="nom_dpr" style="font-size:1.5rem; color:#2174AB">INGRESO FAMILIAR</label>
                                        </div> 

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX Num habitaciones XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
                                            <div class="form-group">
                                             <label for="miembros_trabajan">¿Cuátos miembros del hogar trabajan?</label> 
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <select class="form-control" id="miembros_trabajan" name="miembros_trabajan" >
                                                            <option value="<?php echo $miembros_hogar_trabajan ?>"><?php echo $miembros_hogar_trabajan ?></option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>                                                        
                                                            <option value="4">4</option>                                                        
                                                            <option value="5">5</option>                                                        
                                                            <option value="6">6</option>                                                        
                                                            <option value="7">7</option>                                                        
                                                            <option value="8">8</option>                                                        
                                                            <option value="9">9</option>                                                        
                                                            <option value="10">10</option>
                                                            <option value="11">11</option>
                                                            <option value="12">12</option>
                                                            <option value="13">13</option>                                                        
                                                            <option value="14">14</option>                                                        
                                                            <option value="15">15</option>                                                        
                                                            <option value="16">16</option>                                                        
                                                            <option value="17">17</option>                                                        
                                                            <option value="18">18</option>                                                        
                                                            <option value="19">19</option>                                                        
                                                            <option value="20">20</option>                                                        
                                                        </select>
                                                    </div>                                                
                                                </div>
                                            </div>

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX INGRESO MENSUAL XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
                                <div class="form-group">
                                    <label for="ingreso_mensual">¿Cuál es el ingreso mensual total de su familia?</label>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="input-group">
                                            <span class="input-group-addon">$</span>
                                                <input type="text" id="ingreso_mensual" name="ingreso_mensual" maxlength="10" type="range" min="1" max="100" type="range" class="form-control" value="<?php echo $ingreso_mensual ?>" placeholder="000.00" >
                                                 
                                            </div>
                                        </div>
                                    </div> 
                                </div>

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX EGRESO MENSUAL XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
                                <div class="form-group">
                                    <label for="egreso_mensual">¿Cuál es el egreso mensual total de su familia?</label>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="input-group">
                                            <span class="input-group-addon">$</span>
                                                <input type="text" id="egreso_mensual" name="egreso_mensual"  maxlength="10" type="range" min="1" max="100" type="range" class="form-control" value="<?php echo $egreso_mensual ?>" placeholder="000.00" >
                                                   
                                            </div>
                                        </div>
                                    </div> 
                                </div>

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX OTRA ACTIVIDAD XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
                                            <div class="form-group">
                                             <label for="otra_actv_gene_ing">¿Realiza otra actividad que le generan ingresos?</label> 
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <select class="form-control" id="otra_actv_gene_ing" name="otra_actv_gene_ing" onChange="mostrar_otra_actividad_genera_ingresos(this.value);" >
                                                            <option value="<?php echo $Acti_genera_ingresos ?>"><?php echo $Acti_genera_ingresos ?></option>
                                                            <option value="Si">Si</option>
                                                            <option value="No">No</option>
                                                        
                                                        </select>
                                                    </div>                                                
                                                </div>
                                            </div>
                                              
                                            <div class="form-group">
                                                <label class = "col-md-1" style="padding-top: 1%;padding-right: 10%" for="especifique_actividad">Especifíque:</label>  
                                                <div class="row" >                          
                                                    <div class="col-md-8">
                                                        <input type="text" id="especifique_actividad" name="especifique_actividad" class="form-control" value="<?php echo $especifique_actividad ?>" placeholder="Dirección trabajo" >
                                                    </div>
                                                </div>
                                            </div>      
                                            

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX Ultimos 12 meses XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
                                            <div class="form-group">
                                             <label for="nivel_vida_12">En los útimos 12 meses, su nivel de vida:</label> 
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <select class="form-control" id="nivel_vida_12" name="nivel_vida_12" >
                                                            <option value="<?php echo $nivel_vida ?>"><?php echo $nivel_vida ?></option>
                                                            <option value="Mejoró">Mejoró</option>
                                                            <option value="Empeoró">Empeoró</option>                                                                                                                    
                                                            <option value="Mantiene">Mantiene</option>                                                                                                                    
                                                        </select>
                                                    </div>                                                
                                                </div>
                                            </div>

<!--*********************************************************** CREE DEL INGRESO MENSUAL ******************************************************************-->
                                <div class="form-group">
                                  <label for="ing_mensual_emp_mejo">Considera usted, que los ingresos mensuales de su hogar son:</label> 
                                    <div class="row">
                                        <div class="col-md-4">
                                            <select class="form-control" id="ing_mensual_emp_mejo" name="ing_mensual_emp_mejo" >
                                                <option value="<?php echo $nivel_ingresos ?>"><?php echo $nivel_ingresos ?></option>
                                                <option value="Suficientes">Suficientes para cubrir los gastos básicos</option>
                                                <option value="Insuficientes">Insuficientes para cubrir los gastos básicos</option>                                
                                            </select>
                                        </div>
                                    </div>
                                </div> 


<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX FIN FORM XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
                                    <input type="submit" value="Terminar edición" name="submit" class="btn btn-primary">
                                    
                                    <a href="nisocioeconomico.php">
                                    <button type="button" class="btn btn-primary">Regresar</button>
                                    </a>  

                        </form>
                    
                
            </div>
        </div>
    </div>
                
<!--*************************************************************************************************************************************************-->
                  
                
                
                
<?php require_once('inc/footer.php'); ?> 
                
                