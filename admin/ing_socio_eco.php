<?php
require_once('inc/top.php');
ob_start();
require_once('../inc/db.php');//CONEXION CON BASE DE DATOS
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}



if (isset($_GET['edit'])) {//si esque hay la variable edit
    $edit_id = $_GET['edit'];//get y post sirven para atrapar datos.
    echo($edit_id);



        $edit_query = "SELECT * FROM tbl_datos_personales_ninio WHERE id_ninio = $edit_id";
        $edit_query_run = mysqli_query($con, $edit_query);
        $edit_row = mysqli_fetch_array($edit_query_run);//fetch array sirve para que tu atrapestoda la fila de una table... fetch assoc.
       
          
            
            //$idninio = $edit_row['id_ninio'];
            $c_i = $edit_row['numero_docide'];
            $last_name = $edit_row['apellidos'];
            $first_name = $edit_row['nombres'];
        }
?>    

</head>
<body>
    <div id="wrapper">
        <?php require_once('inc/header.php'); ?>

        <div class="container-fluid body-section">
            <div class="row">
                <div class="col-md-3">
                    <?php require_once('inc/sidebar.php'); ?>
                </div>
                <div class="col-md-9">
                    <h1><i class="fa fa-user-plus"></i> Agregar<small> Información Socio Económica </small></h1><hr>
                    <ol class="breadcrumb">
                         <li><a href="../admin/index.php"><i class="fas fa-home"></i> Menú</a></li>
                         <li><a href="niniosregistrados_ing_se.php"><i class="fas fa-chevron-left"></i> Regresar</a></li>
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
                        $especifique_actividad_se = ($_POST['especifique_actividad']);
                        $nivel_vida_12_se = ($_POST['nivel_vida_12']);
                        $ing_mensual_emp_mejo_se = ($_POST['ing_mensual_emp_mejo']);
                                     
                        //$cdi = mysqli_real_escape_string($con, strtolower($_POST['cdi']));
                        //$image = $_FILES['image']['name'];
                        //$image_temp = $_FILES['image']['tmp_name'];

                      //  echo($first_name.$last_name.$username.$password.$role.$role.$email.$telef.$dir.$cdi);
               
                        //$password = crypt($password, $salt);
/*----------------------empty =vacio--------------------------*/
                        if (empty($tipo_docide_se) or empty( $num_ci_se) ) { //or empty($username) or empty($email) or empty($password)) {
                            $error = "Todos los (*) Campos son requeridos";
                        } else {
                            $insert_query = "INSERT INTO `tbl_socio_economica` (`id_ninio_se`, `id_tipo_docum`, `num_documide`, `apellidos_se`, `nombres_se`, 
                            `edad_se`,`estado_civil_se`, `etnia_se`, `parentesco_se`, `direccion_dom_se`, `telefono_dom_se`, 
                            `instruccion_se`, `ocupación_se`, `vinculo_laboral`, `direccion_laboral_se`, `telefono_trabajo_se`, `vivienda_acupa_es`,
                            `tipo_vivienda_se`, `num_habitaciones_se`, `tipo_piso_se`, `tipo_pared_se`, `tipo_techo_se`, `recibe_bono_se`,
                            `miembros_hogar_se`, `num_hijos_se`, `num_hijas_se`, `consume_bebidas_se`, `fuma_se`, `tiene_disca_miembro_familia`,
                            `fami_discap_va_manuela_espejo`, `miembros_hogar_trabajan`, `ingreso_mensual`, `egreso_mensual`, `Acti_genera_ingresos`,
                            `especifique_actividad`,`nivel_vida`, `nivel_ingresos`) 
                            VALUES ('$id_ninios_se', '$tipo_docide_se', '$num_ci_se', '$apellidos_repre_se', '$nombres_repre_se', '$edad_repre_se', '$estado_civ_repre_se',
                            '$g_etnico_repre_se', '$parentesco_repre_se', '$direcion_do_repre_se', '$tlefono_repre_se', '$instruccion_repre_se', '$ocupacion_repre_se', 
                            '$vinculo_laboral_seco', '$direcion_trabajo_repre_se', '$tlefono_tabajo_repre_se', '$vivienda_ocupa_se', '$vivienda_tipo_se', 
                            '$numer_habitaciones_se', '$piso_tipo_se', '$paredes_tipo_se', '$techo_tipo_se', '$recibe_bono_dh_se', '$miembros_h_familia_se', 
                            '$num_hijos_varones_se', '$num_hijas_mujeres_se', '$consume_alcohol_se', '$ud_fuma_se', '$familiar_discapacidad_se','$asisten_al_manuela_esp_se', 
                            '$miembros_trabajan_se', '$ingreso_mensual_se', '$egreso_mensual_se',  '$otra_actv_gene_ing_se', '$especifique_actividad_se', '$nivel_vida_12_se', 
                            '$ing_mensual_emp_mejo_se')";

                            //$insert_query = "INSERT INTO tbl_usuario (ci,apellidos,nombres,tipo,correo_e,direccion_dom,telefono,contrasenia,id_cdi,referencia_cdi,imagen_usuario) values('$username','$last_name','$first_name','$role','$email','$dir','$telef','$password','$cdi','referencia','$image')";
                            if (mysqli_query($con, $insert_query)) {
                              //  $msg = "Datos de la Entrevista actual Ingresada";
                             //   $path="img/$image";

                                
                              // move_uploaded_file($image_temp, "img/$image"); /** Mueve un archivo subido a una nueva ubicación */
                               //move_uploaded_file($image_tmp, $path);
                               //copy($path,"../$path");
                               $msg = "Información Socio económica Ingresada";
                                /*$first_name = "";
                                $last_name = "";
                                $email = "";
                                $username = "";*/
                                //header("Location: nisocioeconomico.php"); /*para poder volver al blog o login*/
                            } else {
                                $error = "Información Socio económica No Ingresada";
                            }
                        }
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
                                            <label for="nom_dpr" style="font-size:1.5rem">DATOS PERSONALES DEL REPRESENTANTE</label>
                                        </div>
                                        

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX ID PRINCIPAL DEL NIÑO XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
                        <input type="hidden" name="id_de_ninios_se" id = "id_de_ninios_se" value= "<?php echo $edit_id ?>">


<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX Tipo Documento XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
                            <div class="form-group ">                             
                                <div class="col-md-8">
                                    <div class="row">
                                          
                                         <label for="tipo_docide_se">Tipo de Documento de Identificación :</label>
                                        <select class="form-control" name="tipo_docide_se" id="tipo_docide_se" required>
                                            <option value="" >Seleccione</option>
                                            <?php
                                                $sql_t_doc_repre = "select * from tbl_documento_identidad";
                                                $ejecutar = mysqli_query($con, $sql_t_doc_repre);//ejecutar consulta
                                                
                                                if (mysqli_num_rows($ejecutar) > 0) {
                                                    while ($row2 = mysqli_fetch_array($ejecutar)) {                                                  
                                                        $detalledocu_repre = $row2['detalle'];
                                                        $iddocu_repre = $row2['id_docide'];
                                                        echo "<option value='" . $iddocu_repre. "' " .  ">" . ($detalledocu_repre) . "</option>";
                                                    }
                                                } 
                                            ?>
                                        </select>  <br> 
                                    </div>
                                </div>
                            </div>  

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX DOCUMENTO IDENTIDAD XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-8">  
                                            <label for="ci_se">Número de Documento de Identificación :</label>
                                            <input type="text" id="ci_se" name="ci_se" class="form-control" maxlength="10" value="" placeholder="Ej:1234567890" required>
                                        </div>
                                    </div>    
                                </div>

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX DOCUMENTO IDENTIDAD XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-8">  
                                            <label for="apellidos_repre">Apellidos :</label>
                                            <input type="text" id="apellidos_repre" name="apellidos_repre" class="form-control" value= "" placeholder="Apellidos" required>
                                        </div>
                                    </div>
                                </div>

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX DOCUMENTO IDENTIDAD XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-8"> 
                                            <label for="nombres_repre">Nombres :</label>                                   
                                            <input type="text" id="nombres_repre" name="nombres_repre" class="form-control" value= "<?php
                                            ?>" placeholder="Nombres" required>
                                        </div>
                                    </div>
                                </div>

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX EDAD XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
                                <div class="form-group">
                                    <label for="edad_repre">Edad :</label>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="input-group">
                                                <input type="number" id="edad_repre" name="edad_repre" maxlength="3" class="form-control" value="" placeholder="Edad" required>
                                                <span class="input-group-addon">años</span>   
                                            </div>
                                        </div>
                                    </div> 
                                </div>

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX ESTADO CIVIL XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-8">
                                              <label for="estado_civ_repre">Estado Civil :</label>
                                            <select class="form-control" name="estado_civ_repre" id="estado_civ_repre" required>
                                                  <option value="">Seleccione</option>
                                                <?php
                                                $sql_est_civil_repre = "select * from tbl_estado_civil";
                                                $ejecutar = mysqli_query($con, $sql_est_civil_repre);//ejecutar consulta                                        
                                                if (mysqli_num_rows($ejecutar) > 0) {
                                                    while ($row2 = mysqli_fetch_array($ejecutar)) {                                                  
                                                        $e_C_repre = $row2['detalle'];
                                                        $id_e_c_repre = $row2['id_estado_civil'];
                                                        echo "<option value='" . $id_e_c_repre. "' " .  ">" . ($e_C_repre) . "</option>";
                                                    }
                                                } 
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>                                                                              

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX Grupo Etnico XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-8">
                                              <label for="g_etnico_repre">Grupo Étnico :</label>
                                            <select class="form-control" name="g_etnico_repre" id="g_etnico_repre" required>
                                                  <option value="">Seleccione</option>
                                                <?php
                                                $sql_etnia_repre = "select * from tbl_etnia";
                                                $ejecutar = mysqli_query($con, $sql_etnia_repre);//ejecutar consulta                                        
                                                if (mysqli_num_rows($ejecutar) > 0) {
                                                    while ($row2 = mysqli_fetch_array($ejecutar)) {                                                  
                                                        $etnia_repre = $row2['detalle'];
                                                        $idetnia_repre = $row2['id_etnia'];
                                                        echo "<option value='" . $idetnia_repre. "' " .  ">" . ($etnia_repre) . "</option>";
                                                    }
                                                } 
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX PARENTESCO XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-8" >
                                            <label for="parentesco_repre">Parentesco :</label>
                                            <select class="form-control" name="parentesco_repre" id="parentesco_repre" required>
                                            <option value="">Seleccione</option>
                                                <?php
                                                $sql_parentesco_repre = "select * from tbl_parentesco";
                                                $ejecutar = mysqli_query($con, $sql_parentesco_repre);//ejecutar consulta
                                                
                                                if (mysqli_num_rows($ejecutar) > 0) {
                                                    while ($row2 = mysqli_fetch_array($ejecutar)) {  
                                                        
                                                        $detalle_parent_repre = $row2['detalle'];
                                                        $id_parent_repre = $row2['id_parentesco'];
                                                        echo "<option value='" . $id_parent_repre. "' " .  ">" . ($detalle_parent_repre) . "</option>";
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
                                            <input type="text" id="direcion_do_repre" name="direcion_do_repre" class="form-control" value= "<?php
                                            ?>" placeholder="Dirección del domicilio" required>
                                        </div>
                                    </div>
                                </div>

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX Telefono XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-8" >
                                            <label for="tlefono_repre">Teléfono :</label>
                                            <input type="text" id="tlefono_repre" name="tlefono_repre" class="form-control" value= "<?php
                                            ?>" placeholder="Ej: 123456789" required>
                                        </div>
                                    </div>
                                </div>

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX instruccion XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-8" >
                                            <label for="instruccion_repre">Instrucción :</label>
                                            <select class="form-control" name="instruccion_repre" id="instruccion_repre" required>
                                            <option value="">Seleccione</option>
                                                <?php
                                                $sql_instruccion_repre = "select * from tbl_instruccion";
                                                $ejecutar = mysqli_query($con, $sql_instruccion_repre);//ejecutar consulta
                                                
                                                if (mysqli_num_rows($ejecutar) > 0) {
                                                    while ($row2 = mysqli_fetch_array($ejecutar)) {  
                                                        
                                                        $detalle_instruc_repre = $row2['detalle'];
                                                        $id_instruc_repre = $row2['id_instruccion'];
                                                        echo "<option value='" . $id_instruc_repre. "' " .  ">" . ($detalle_instruc_repre) . "</option>";
                                                    }
                                                } 
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>   

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX ocupacion XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-8" >
                                            <label for="ocupacion_repre">Ocupación :</label>
                                            <select class="form-control" name="ocupacion_repre" id="ocupacion_repre" required>
                                            <option value="">Seleccione</option>
                                                <?php
                                                $sql_ocupacion_repre = "select * from tbl_ocupacion";
                                                $ejecutar = mysqli_query($con, $sql_ocupacion_repre);//ejecutar consulta
                                                
                                                if (mysqli_num_rows($ejecutar) > 0) {
                                                    while ($row2 = mysqli_fetch_array($ejecutar)) {  
                                                        
                                                        $detalle_ocup_repre = $row2['detalle'];
                                                        $id_ocup_repre = $row2['id_ocupacion'];
                                                        echo "<option value='" . $id_ocup_repre. "' " .  ">" . ($detalle_ocup_repre) . "</option>";
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
                                        <input type="text" id="vinculo_laboral_se" name="vinculo_laboral_se" class="form-control" value="" placeholder="Vínculo laboral" required>
                                    </div>
                                </div>
                            </div>                                 

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX Direccion dom LAboralXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-8" >
                                            <label for="direcion_trabajo_repre">Dirección del trabajo :</label>
                                            <input type="text" id="direcion_trabajo_repre" name="direcion_trabajo_repre" class="form-control" value= "" placeholder="Dirección del domicilio" required>
                                        </div>
                                    </div>
                                </div>

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX Telefono trabajoXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-8" >
                                            <label for="tlefono_tabajo_repre">Teléfono del trabajo :</label>
                                            <input type="text" id="tlefono_tabajo_repre" name="tlefono_tabajo_repre" class="form-control" value= "<?php
                                            ?>" placeholder="Ej: 123456789" required>
                                        </div>
                                    </div>
                                </div>
                                
<!--*********************************************** DATOS DE VIVIENDA Y HOGAR **************************************************** -->                                             
                                        <div class="row">
                                            <label for="nom_dpr" style="font-size:1.5rem">DATOS DE VIVIENDA Y HOGAR</label>
                                        </div>

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX Vivienda (arrendada prestada propia) XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->                                                                                                                          
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-8" >
                                            <label for="vivienda_ocupa">La vivienda que ocupa es:</label>
                                            <select class="form-control" name="vivienda_ocupa" id="vivienda_ocupa" required>
                                            <option value="">Seleccione</option>
                                                <?php
                                                $sql_vivienda_ocupa = "select * from tbl_vivienda";
                                                $ejecutar = mysqli_query($con, $sql_vivienda_ocupa);//ejecutar consulta
                                                
                                                if (mysqli_num_rows($ejecutar) > 0) {
                                                    while ($row2 = mysqli_fetch_array($ejecutar)) {  
                                                        
                                                        $detalle_vivi_ocu = $row2['detalle'];
                                                        $id_vivi_ocu = $row2['id_vivienda'];
                                                        echo "<option value='" . $id_vivi_ocu. "' " .  ">" . ($detalle_vivi_ocu) . "</option>";
                                                    }
                                                } 
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>            

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX Tipo de Vivienda XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->                                                                                                                          
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-8" >
                                            <label for="vivienda_tipo">Su vivienda es:</label>
                                            <select class="form-control" name="vivienda_tipo" id="vivienda_tipo" required>
                                            <option value="">Seleccione</option>
                                                <?php
                                                $sql_vivienda_tipo = "select * from tbl_tipo_vivienda";
                                                $ejecutar = mysqli_query($con, $sql_vivienda_tipo);//ejecutar consulta
                                                
                                                if (mysqli_num_rows($ejecutar) > 0) {
                                                    while ($row2 = mysqli_fetch_array($ejecutar)) {  
                                                        
                                                        $detalle_vivi_tipo = $row2['detalle'];
                                                        $id_vivi_tipo = $row2['id_tipo_vivienda'];
                                                        echo "<option value='" . $id_vivi_tipo. "' " .  ">" . ($detalle_vivi_tipo) . "</option>";
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
                                                        <select class="form-control" id="numer_habitaciones" name="numer_habitaciones" required>
                                                            <option value="seleccione">Seleccione</option>
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
                                    <div class="row">
                                        <div class="col-md-8" >
                                            <label for="piso_tipo">El piso de su casa es:</label>
                                            <select class="form-control" name="piso_tipo" id="piso_tipo" required>
                                            <option value="">Seleccione</option>
                                                <?php
                                                $sql_piso_tipo = "select * from tbl_tipo_piso";
                                                $ejecutar = mysqli_query($con, $sql_piso_tipo);//ejecutar consulta
                                                
                                                if (mysqli_num_rows($ejecutar) > 0) {
                                                    while ($row2 = mysqli_fetch_array($ejecutar)) {  
                                                        
                                                        $detalle_piso_tipo = $row2['detalle'];
                                                        $id_piso_tipo = $row2['id_tipo_piso'];
                                                        echo "<option value='" . $id_piso_tipo. "' " .  ">" . ($detalle_piso_tipo) . "</option>";
                                                    }
                                                } 
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>  

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX Tipo de PARED XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->                                                                                                                          
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-8" >
                                            <label for="paredes_tipo">Las paredes de su casa son:</label>
                                            <select class="form-control" name="paredes_tipo" id="paredes_tipo" required>
                                            <option value="">Seleccione</option>
                                                <?php
                                                $sql_pared_tipo = "select * from tbl_tipo_pared";
                                                $ejecutar = mysqli_query($con, $sql_pared_tipo);//ejecutar consulta
                                                
                                                if (mysqli_num_rows($ejecutar) > 0) {
                                                    while ($row2 = mysqli_fetch_array($ejecutar)) {  
                                                        
                                                        $detalle_pared_tipo = $row2['detalle'];
                                                        $id_pared_tipo = $row2['id_tipo_pared'];
                                                        echo "<option value='" . $id_pared_tipo. "' " .  ">" . ($detalle_pared_tipo) . "</option>";
                                                    }
                                                } 
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX Tipo de TECHO XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->                                                                                                                          
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-8" >
                                            <label for="techo_tipo">El techo de su casa es:</label>
                                            <select class="form-control" name="techo_tipo" id="techo_tipo" required>
                                            <option value="">Seleccione</option>
                                                <?php
                                                $sql_techo_tipo = "select * from tbl_tipo_techo";
                                                $ejecutar = mysqli_query($con, $sql_techo_tipo);//ejecutar consulta
                                                
                                                if (mysqli_num_rows($ejecutar) > 0) {
                                                    while ($row2 = mysqli_fetch_array($ejecutar)) {  
                                                        
                                                        $detalle_techo_tipo = $row2['detalle'];
                                                        $id_techo_tipo = $row2['id_tipo_techo'];
                                                        echo "<option value='" . $id_techo_tipo. "' " .  ">" . ($detalle_techo_tipo) . "</option>";
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
                                                             url: 'ajax_archivos/ajax_se_servicios_basic_listar.php',
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
                                                             url: 'ajax_archivos/ajax_se_servicios_basic_eliminar.php',
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
                                                          url: 'ajax_archivos/ajax_se_servicios_basic_guardar.php',
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
                                                                    $sql_ser_bas = "select * from tbl_servicios_basicos";
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
                                                            <button type="button" class="btn btn-primary" id="btn_servic_basic">Agregar</button>
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
                                            <label for="nom_dpr" style="font-size:1.5rem">BONO DE DESARROLLO HUMANO</label>
                                        </div>

<!--*********************************************************** Recibe vono ******************************************************************-->
                                <div class="form-group">
                                  <label for="recibe_bono_dh">¿Recibe bono de desarrollo humano?</label> 
                                    <div class="row">
                                        <div class="col-md-3">
                                            <select class="form-control" id="recibe_bono_dh" name="recibe_bono_dh" required>
                                                <option value="">Seleccione</option>
                                                <option value="Si">Si</option>
                                                <option value="No">No</option>                                
                                            </select>
                                        </div>
                                    </div>
                                </div>

<!--*********************************************** MIEMBROS DEL HOGAR Y EDUCACIÓN **************************************************** -->                                             
                                        <div class="row">
                                            <label for="nom_dpr" style="font-size:1.5rem">MIEMBROS DEL HOGAR Y EDUCACIÓN</label>
                                        </div>

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX Num habitaciones XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
                                            <div class="form-group">
                                             <label for="miembros_h_familia">¿Cuátos miembros de su hogar componen su familia?</label> 
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <select class="form-control" id="miembros_h_familia" name="miembros_h_familia" required>
                                                            <option value="seleccione">Seleccione</option>
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
                                                    <select class="form-control" id="num_hijos_varones" name="num_hijos_varones" required>
                                                        <option value="seleccione">Seleccione</option>
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
                                                    <select class="form-control" id="num_hijas_mujeres" name="num_hijas_mujeres" required>
                                                        <option value="seleccione">Seleccione</option>
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
                                                             url: 'ajax_archivos/ajax_se_miembros_hogar_listar.php',
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
                                                             url: 'ajax_archivos/ajax_se_miembros_hogar_eliminar.php',
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
                                                          url: 'ajax_archivos/ajax_se_miembros_hogar_guardar.php',
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
                                            <label for="miembros_hog">Registro de los miembros del hogar:</label> 
                                    <!--    <form id="frmajax" method="POST">     -->
                                            <div class="row">
                                                <label class = "col-md-1" style="padding-top: 1%;padding-right: 10%" for="parentesco_mh">Parentesco:</label> 
                                                <div class="col-md-8">
                                                    <select class="form-control" name="parentesco_mh" id="parentesco_mh">
                                                        <option value="seleccione">Seleccione</option>
                                                        <?php
                                                        $sql_parentesco_mh = "select * from tbl_parentesco";
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
                                                    <input name="apellido_mh" id= "apellido_mh" class="form-control" value="" placeholder="Apellidos" required>
                                                </div>
                                            </div> <br> 

                                            <div class="row">                                  
                                                <label class = "col-md-1" style="padding-top: 1%;padding-right: 10%" for="nombre_mh">Nombres:</label>  
                                                <div class="col-md-8">
                                                    <input type="text" id="nombre_mh" name="nombre_mh" class="form-control" value="" placeholder="Nombres" required>
                                                </div>
                                            </div> <br>

                                            <div class="row">                                  
                                                <label class = "col-md-1" style="padding-top: 1%;padding-right: 10%" for="edad_mh">Edad:</label>  
                                                <div class="col-md-3">
                                                    <div class="input-group">
                                                        <input type="text" id="edad_mh" name="edad_mh" maxlength="3" class="form-control" value="" placeholder="Edad">
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
                                                        $sql_instruccion_mh = "select * from tbl_instruccion";
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
                                                        $sql_ocupacion_mh = "select * from tbl_ocupacion";
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
                                                    <input type="text" id="vinculo_lab_mh" name="vinculo_lab_mh" class="form-control" value="" placeholder="Vínculo laboral" required>
                                                </div>
                                            </div> <br>

                                            <div class="row">                                  
                                                <label class = "col-md-1" style="padding-top: 0%;padding-right: 10%" for="dir_trab_mh">Dirección trabajo:</label>  
                                                <div class="col-md-8">
                                                    <input type="text" id="dir_trab_mh" name="dir_trab_mh" class="form-control" value="" placeholder="Dirección trabajo" required>
                                                </div>
                                            </div> <br>

                                            <div class="row">                                  
                                                <label class = "col-md-1" style="padding-top: 0%;padding-right: 10%" for="tlf_trab_mh">Teléfono:</label>  
                                                <div class="col-md-8">
                                                    <input type="text" id="tlf_trab_mh" name="tlf_trab_mh" class="form-control" value="" placeholder="Teléfono trabajo" required>
                                                </div>
                                                <button type="button" class="btn btn-primary" id="btn_miembros_hogar">Agregar</button>
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
                                            <label for="nom_dpr" style="font-size:1.5rem">PRESENCIA DE ENFERMEDADES</label>
                                        </div>

<!--*********************************************************** Bebidas alcoholicas ******************************************************************-->
                                <div class="form-group">
                                  <label for="consume_alcohol">¿Consume bebidas alcohólicas?</label> 
                                    <div class="row">
                                        <div class="col-md-3">
                                            <select class="form-control" id="consume_alcohol" name="consume_alcohol" required>
                                                <option value="">Seleccione</option>
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
                                            <select class="form-control" id="ud_fuma" name="ud_fuma" required>
                                                <option value="">Seleccione</option>
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
                                            <select class="form-control" id="familiar_discapacidad" name="familiar_discapacidad" required>
                                                <option value="">Seleccione</option>
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
                                            <select class="form-control" id="asisten_al_manuela_esp" name="asisten_al_manuela_esp" required>
                                                <option value="">Seleccione</option>
                                                <option value="Si">Si</option>
                                                <option value="No">No</option>                                
                                            </select>
                                        </div>
                                    </div>
                                </div>

<!--*********************************************** INGRESO FAMILIAR **************************************************** -->                                             
                                        <div class="row">
                                            <label for="nom_dpr" style="font-size:1.5rem">INGRESO FAMILIAR</label>
                                        </div> 

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX Num habitaciones XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
                                            <div class="form-group">
                                             <label for="miembros_trabajan">¿Cuátos miembros del hogar trabajan?</label> 
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <select class="form-control" id="miembros_trabajan" name="miembros_trabajan" required>
                                                            <option value="seleccione">Seleccione</option>
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
                                                <input type="number" step="0.01" id="ingreso_mensual" name="ingreso_mensual" class="form-control" value="" placeholder="000,00" required>
                                                   
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
                                                <input step="0.01" type="number" id="egreso_mensual" name="egreso_mensual" class="form-control" value="" placeholder="000,00" required>
                                                   
                                            </div>
                                        </div>
                                    </div> 
                                </div>

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX OTRA ACTIVIDAD XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
                                            <script type="text/javascript">
                                                function mostrar_otra_actividad_genera_ingresos(a) {
                                                    if (a== "No") {
                                                        $("#No_otra_actividad_genera_ingresosotra_actividad_genera_ingresos").show();
                                                        $("#Si_otra_actividad_genera_ingresosotra_actividad_genera_ingresos").hide();                            
                                                    }
                                                    if (a == "Si") {
                                                        $("#No_otra_actividad_genera_ingresosotra_actividad_genera_ingresos").hide();
                                                        $("#Si_otra_actividad_genera_ingresosotra_actividad_genera_ingresos").show();
                                                    }                 
                                                }    
                                            </script>    

                                            <div class="form-group">
                                             <label for="otra_actv_gene_ing">¿Realiza otra actividad que le generan ingresos?</label> 
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <select class="form-control" id="otra_actv_gene_ing" name="otra_actv_gene_ing" onChange="mostrar_otra_actividad_genera_ingresos(this.value);" required>
                                                            <option value="seleccione">Seleccione</option>
                                                            <option value="Si">Si</option>
                                                            <option value="No">No</option>
                                                        
                                                        </select>
                                                    </div>                                                
                                                </div>
                                            </div>
                                                    
                                            
                                            <div id="No_otra_actividad_genera_ingresosotra_actividad_genera_ingresos" style="display: none;"></div>
                                            
                                            <div id="Si_otra_actividad_genera_ingresosotra_actividad_genera_ingresos" style="display: none;">
                                                <div class="form-group">
                                                    <label class = "col-md-1" style="padding-top: 1%;padding-right: 10%" for="especifique_actividad">Especifíque:</label>  
                                                    <div class="row" >                          
                                                        <div class="col-md-8">
                                                            <input type="text" id="especifique_actividad" name="especifique_actividad" class="form-control" value="" placeholder="Dirección trabajo" required>
                                                        </div>
                                                    </div>
                                                </div>      
                                            </div> 

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX Ultimos 12 meses XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
                                            <div class="form-group">
                                             <label for="nivel_vida_12">En los útimos 12 meses, su nivel de vida:</label> 
                                                <div class="form-group" style="padding-left: 1%">
                                                    <input type="radio" id="nivel_vida_12" name="nivel_vida_12" value="Mejoró">
                                                    <label for="nivel_vida_12" > Mejoró</label><br>  
                                                    <input type="radio" id="nivel_vida_12" name="nivel_vida_12" value="Empeoró">
                                                    <label for="nivel_vida_12" > Empeoró</label><br>
                                                    <input type="radio" id="nivel_vida_12" name="nivel_vida_12" value="Mantiene">
                                                    <label for="nivel_vida_12" > Mantiene</label><br>
                                                </div>   
                                            </div> 

<!--*********************************************************** CREE DEL INGRESO MENSUAL ******************************************************************-->
                                <div class="form-group">
                                  <label for="ing_mensual_emp_mejo">Considera usted, que los ingresos mensuales de su hogar son:</label> 
                                    <div class="row">
                                        <div class="col-md-4">
                                            <select class="form-control" id="ing_mensual_emp_mejo" name="ing_mensual_emp_mejo" required>
                                                <option value="">Seleccione</option>
                                                <option value="Suficientes">Suficientes para cubrir los gastos básicos</option>
                                                <option value="Insuficientes">Insuficientes para cubrir los gastos básicos</option>                                
                                            </select>
                                        </div>
                                    </div>
                                </div> 


<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX FIN FORM XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
                                    <input type="submit" value="Agregar" name="submit" class="btn btn-primary">
                                    
                                    <a href="niniosregistrados_ci.php">
                                    <button type="button" class="btn btn-primary">Regresar</button>
                                    </a>  

                        </form>
                    
                
            </div>
        </div>
    </div>
                
<!--*************************************************************************************************************************************************-->
                  
                
                
                
<?php require_once('inc/footer.php'); ?> 
                
                