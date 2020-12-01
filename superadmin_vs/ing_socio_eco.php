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
                        //$date = time();
                        //$id_ninios = mysqli_real_escape_string($con, $_POST['ninios']);
                        $nombre_ninio = mysqli_real_escape_string($con, $_POST['nombreninio']);
                                      
                        //$cdi = mysqli_real_escape_string($con, strtolower($_POST['cdi']));
                        //$image = $_FILES['image']['name'];
                        //$image_temp = $_FILES['image']['tmp_name'];

                      //  echo($first_name.$last_name.$username.$password.$role.$role.$email.$telef.$dir.$cdi);
               
                        //$password = crypt($password, $salt);
/*----------------------empty =vacio--------------------------*/
                        if (empty($nombre_ninio)     or empty( $nombre_repre) ) { //or empty($username) or empty($email) or empty($password)) {
                            $error = "Todos los (*) Campos son requeridos";
                        } else {
                            $insert_query = "INSERT INTO socio_economico(id_ninio, nombre_repre, id_docide, ci, parentesco, direccion_dom, id_estado_civil, id_vivienda, id_tipo_vivienda, servicios_basicos, ingreso_mensual, lugar_trabajo, telefono_socio) VALUES ('$nombre_ninio','$nombre_repre','$id_documento_iden','$ci','$parentesco_n','$direccion_dom','$idvivienda_s','$idtipo_vivienda_s','$idtipo_vivienda_s','$serviciosbasisco','$ingreso_mes','$lugar_trabajo','$telefono_socio')";

                            //$insert_query = "INSERT INTO tbl_usuario (ci,apellidos,nombres,tipo,correo_e,direccion_dom,telefono,contrasenia,id_cdi,referencia_cdi,imagen_usuario) values('$username','$last_name','$first_name','$role','$email','$dir','$telef','$password','$cdi','referencia','$image')";
                            if (mysqli_query($con, $insert_query)) {
                              //  $msg = "Datos de la Entrevista actual Ingresada";
                             //   $path="img/$image";

                                
                              // move_uploaded_file($image_temp, "img/$image"); /** Mueve un archivo subido a una nueva ubicación */
                               //move_uploaded_file($image_tmp, $path);
                               copy($path,"../$path");
                               $msg = "Datos de la Entrevista actual Ingresada";
                                /*$first_name = "";
                                $last_name = "";
                                $email = "";
                                $username = "";*/
                                header("Location: nisocioeconomico.php"); /*para poder volver al blog o login*/
                            } else {
                                $error = "Datos de la Entrevista actual No Ingresada";
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
                                        <?php
                                            if (isset($error)) {
                                                echo "<span style='color:red;' class='pull-right'>$error</span>";
                                            } else if (isset($msg)) {
                                                echo "<span style='color:green;' class='pull-right'>$msg</span>";
                                            }
                                        ?>  
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
                                        <div class="col-md-2">
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

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX Direccion dom LAboralXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-8" >
                                            <label for="direcion_trabajo_repre">Dirección del trabajo :</label>
                                            <input type="text" id="direcion_trabajo_repre" name="direcion_trabajo_repre" class="form-control" value= "<?php
                                            ?>" placeholder="Dirección del domicilio" required>
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
                                
<!--*********************************************** DATOS REPRESENTANTE **************************************************** -->                                             
                                        <div class="row">
                                            <label for="nom_dpr" style="font-size:1.5rem">DATOS DE VIVIENDA Y HOGAR</label>
                                        </div>

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX Vivienda XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->                                                                                                                          



<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX FIN FOOORM XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX -->
                                <input type="submit" value="Agregar Datos Personales del Niño(a)" name="submit" class="btn btn-primary">
                                <a href="menuprincipaldatosninio.php">
                                 <button type="button" class="btn btn-primary">Regresar</button>
                                </a>

                    </form>
                    
                
            </div>
        </div>
    </div>
<body>
        <?php require_once('inc/footer.php'); ?>  
                
                </div>