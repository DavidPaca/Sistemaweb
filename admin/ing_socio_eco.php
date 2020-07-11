<?php
require_once('inc/top.php');
ob_start();
require_once('../inc/db.php');//CONEXION CON BASE DE DATOS


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
                    <h1><i class="fa fa-user-plus"></i> Agregar<small>Información Socio Económica </small></h1><hr>
                    <ol class="breadcrumb">
                         <li><a href="index.php"><i class="fas fa-home"></i> Menú</a></li>
                        <li class="active"><i class="fa fa-user-plus"></i> Socio Económica</li>
                    </ol>
                    
                    
                    <?php
/*---------------------------Guarda los datos ingresados en los cajones en las variables------------------------------------------*/
                    if (isset($_POST['submit'])) {
                        //$date = time();
                        //$id_ninios = mysqli_real_escape_string($con, $_POST['ninios']);
                        $nombre_ninio = mysqli_real_escape_string($con, $_POST['nombreninio']);
                        $nombre_repre = mysqli_real_escape_string($con, $_POST['nombre']);     /*first name es el nombre del cajon*/
                        $id_documento_iden = mysqli_real_escape_string($con, $_POST['id_docide']);
                        $ci = mysqli_real_escape_string($con, $_POST['cis']);
                        $parentesco_n = mysqli_real_escape_string($con, $_POST['parentescos']);
                            //$role = $_POST['role'];
                        $direccion_dom = mysqli_real_escape_string($con, strtolower($_POST['direc']));
                      
                        $telefono_socio = mysqli_real_escape_string($con, strtolower($_POST['tlf_socio']));
                        $id_estadocivil = mysqli_real_escape_string($con, strtolower($_POST['estadocivil']));  
                        $idvivienda_s = mysqli_real_escape_string($con, strtolower($_POST['idviviendas']));
                        $idtipo_vivienda_s = mysqli_real_escape_string($con, strtolower($_POST['id_tipoviviendas']));
                        $serviciosbasisco = mysqli_real_escape_string($con, strtolower($_POST['servicio_b']));
                        $ingreso_mes = mysqli_real_escape_string($con, strtolower($_POST['ingreso_men']));
                        $lugar_trabajo = mysqli_real_escape_string($con, strtolower($_POST['lugar_trab']));
                      
                        $direccion_trab = mysqli_real_escape_string($con, strtolower($_POST['dir_trabajo']));
                        $telefono_trab = mysqli_real_escape_string($con, strtolower($_POST['tlf_trabajo']));   
                       
                       
                       /* $llora_facil = mysqli_real_escape_string($con, strtolower($_POST['llorafacil']));
                        $mira_tv = mysqli_real_escape_string($con, strtolower($_POST['miratv']));
                        $escucha_music = mysqli_real_escape_string($con, strtolower($_POST['escuchamusic']));
                        $gusta_bailar = mysqli_real_escape_string($con, strtolower($_POST['gustabailar']));
                        $tiene_miedo = mysqli_real_escape_string($con, strtolower($_POST['tienemiedo']));
                        $referencia_cdi = mysqli_real_escape_string($con, strtolower($_POST['refercdi']));*/
                        
                       
                        
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
<div class="row">
                        <div class="col-md-8">
                            <form action="" method="post" enctype="multipart/form-data">                    
<!--------------------------------------------------id Ninio------------------------------------------------------------>
                                    <div class="form-group">
                                    <label for="nombreninio">Niño:</label>
                                    <select class="form-control" name="nombreninio" id="categories">
                                        <?php
                                        $sql_cdi = "select * from tbl_datos_personales_ninio";
                                        $ejecutar = mysqli_query($con, $sql_cdi);//ejecutar consulta  ucfirst
                                        
                                        if (mysqli_num_rows($ejecutar) > 0) {
                                            while ($row2 = mysqli_fetch_array($ejecutar)) {  
                                                
                                                $apellidosninio = $row2['apellidos'];
                                                $apellidosnin = $row2['nombres'];
                                                $idninio = $row2['id_ninio'];
                                              
                                                echo "<option value='" . $idninio. "' " .  ">". $apellidosnin." ".$apellidosninio. "</option>";
                                                //echo "<option value='" . $idninio. "' " .  ">" . ($apellidosnin) . "</option>";
                                                
                                            }
                                        } else {
                                        // echo "<center><h6>Categoría no disponible</h6></center>";
                                        }
                                        ?>
                                    </select>
                                </div>
           
<!--------------------------------------------------nOMBRE REPRE------------------------------------------------------------>                   
                                
                     <!--           <div class="form-group">
                                   <label for="alergiaali">¿Tiene alergia a algún tipo de alimento? </label><br>
                                    <select name="alergiaali" id="role" >
                                        <option value="Si">Si</option>
                                        <option value="No">No</option>
                                    </select> <br>
                                    <label for="alergiaali">¿Especifíque? </label>-->
                                    <?php
                                /*    if (isset($error)) {
                                        echo "<span class='pull-right' style='color:red;'>$error</span>";
                                    } else if (isset($msg)) {
                                        echo "<span class='pull-right' style='color:green;'>$msg</span>";
                                    }*/
                                    ?>
                                  <!--  <input type="text" id="first-name" name="alergiaali" class="form-control" value="<?php
                                   // if (isset($first_name)) {
                                     //   echo $first_name;
                                  //  }
                                    ?>" placeholder="">
                                </div>-->

                                <div class="form-group">
                                    <label for="nombre">Nombre del Representante: </label>
                                    <input type="text" id="last-name" name="nombre" class="form-control" value="<?php
                                    if (isset($last_name)) {
                                        echo $last_name;
                                    }
                                    ?>" placeholder="">
                                </div>


<!--............................................Documento Identidad........................................................-->

<div class="form-group">
                                    <label for="id_docide">Tipo de Documento :*</label>
                                    <select class="form-control" name="id_docide" id="categories">
                                        <?php
                                        $sql_cdi = "select * from tbl_documento_identidad";
                                        $ejecutar = mysqli_query($con, $sql_cdi);//ejecutar consulta
                                        
                                        if (mysqli_num_rows($ejecutar) > 0) {
                                            while ($row2 = mysqli_fetch_array($ejecutar)) {  
                                                
                                                $detalledocu = $row2['detalle'];

                                                $iddocu = $row2['id_docide'];
                                                echo "<option value='" . $iddocu. "' " .  ">" . ucfirst($detalledocu) . "</option>";
                                            }
                                        } else {
                                        // echo "<center><h6>Categoría no disponible</h6></center>";
                                        }
                                        ?>
                                    </select>


<!--............................................CI........................................................-->
<div class="form-group">
                                    <label for="cis">Número de Documento de Identidad:</label>
                                    <input type="text" id="username" name="cis" class="form-control" maxlength="10" value="" placeholder="CI">
                                </div>




<!--............................................Parentescos........................................................-->
<div class="form-group">
                                    <label for="parentescos">Parentesco:</label>
                                    <input type="text" id="username" name="parentescos" class="form-control"  value="" placeholder="Parentesco">
                                </div>


<!--............................................Direccion domiciliaria........................................................-->
<div class="form-group">
                                    <label for="direc">Dirección Domiciliaria:</label>
                                    <input type="text" id="last-name" name="direc" class="form-control" value= "<?php
                                    if (isset($last_name)) {
                                        echo $last_name;
                                    }
                                    ?>" placeholder="Dirección Domiciliaria">
                                </div>


<!--------------------------------------------------Telefono------------------------------------------------------------>
<div class="form-group">
                                    <label for="tlf_socio">Teléfono:</label>
                                    <input type="text" id="username" name="tlf_socio" class="form-control"  maxlength="10"value="" placeholder="">
                                </div>   

                 
                             


<!--------------------------------------------------Estado civil------------------------------------------------------------>
<div class="form-group">
                                    <label for="role">Estado Civil:</label>
                                    <select class="form-control" name="estadocivil" id="categories">
                                        <?php
                                        $sql_cdi = "select * from tbl_estado_civil";
                                        $ejecutar = mysqli_query($con, $sql_cdi);//ejecutar consulta  ucfirst
                                        
                                        if (mysqli_num_rows($ejecutar) > 0) {
                                            while ($row2 = mysqli_fetch_array($ejecutar)) {  
                                                
                                                $apellidosninio = $row2['detalle'];
                                                
                                                $idninio = $row2['id_estado_civil'];
                                              
                                                echo "<option value='" . $idninio. "' " .  ">". " ".$apellidosninio. "</option>";
                                                //echo "<option value='" . $idninio. "' " .  ">" . ($apellidosnin) . "</option>";
                                                
                                            }
                                        } else {
                                        // echo "<center><h6>Categoría no disponible</h6></center>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                
<!--------------------------------------------------Vivienda------------------------------------------------------------>
<div class="form-group">
<label for="role">Vivienda:</label>
                                    <select class="form-control" name=" idviviendas" id="categories">
                                        <?php
                                        $sql_cdi = "select * from tbl_vivienda";
                                        $ejecutar = mysqli_query($con, $sql_cdi);//ejecutar consulta  ucfirst
                                        
                                        if (mysqli_num_rows($ejecutar) > 0) {
                                            while ($row2 = mysqli_fetch_array($ejecutar)) {  
                                                
                                                $apellidosninio = $row2['detalle'];
                                                
                                                $idninio = $row2['id_vivienda'];
                                              
                                                echo "<option value='" . $idninio. "' " .  ">". " ".$apellidosninio. "</option>";
                                                //echo "<option value='" . $idninio. "' " .  ">" . ($apellidosnin) . "</option>";
                                                
                                            }
                                        } else {
                                        // echo "<center><h6>Categoría no disponible</h6></center>";
                                        }
                                        ?>
                                    </select>
                                </div>

<!--------------------------------------------------tipo vivienda---------------------------------------------------------->
<div class="form-group">
<label for="role">Tipo de Vivienda:</label>
                                    <select class="form-control" name=" id_tipoviviendas" id="categories">
                                        <?php
                                        $sql_cdi = "select * from tbl_tipo_vivienda";
                                        $ejecutar = mysqli_query($con, $sql_cdi);//ejecutar consulta  ucfirst
                                        
                                        if (mysqli_num_rows($ejecutar) > 0) {
                                            while ($row2 = mysqli_fetch_array($ejecutar)) {  
                                                
                                                $apellidosninio = $row2['detalle'];
                                                
                                                $idninio = $row2['id_tipo_vivienda'];
                                              
                                                echo "<option value='" . $idninio. "' " .  ">". " ".$apellidosninio. "</option>";
                                                //echo "<option value='" . $idninio. "' " .  ">" . ($apellidosnin) . "</option>";
                                                
                                            }
                                        } else {
                                        // echo "<center><h6>Categoría no disponible</h6></center>";
                                        }
                                        ?>
                                    </select>
                                </div>


<!--<div class="form-group">
                                   <label for="vocabular">¿ES alérgico?(De ser la respuesta afirmativa "Especifique")</label>
                                    <input type="text" id="username" name="vocabular" class="form-control" value="" placeholder="">
                                </div> -->
<!--------------------------------------------------Servicios Basicos------------------------------------------------------------>
<div class="form-group" >      <!-- method="post" target="_blank"-->

<p>

Servicios Básicos:<br>

  <input type="checkbox"  id="username" name="servicio_b" value="Luz"> Luz<br>

  <input type="checkbox" id="username" name="servicio_b" value="Luz, Agua"> Agua<br>

  <input type="checkbox" id="username" name="servicio_b" value="Luz, Agua, Telefono"> Teléfono<br>

  <input type="checkbox" id="username" name="servicio_b" value="Luz, Agua, Telefono, Internet"> Internet<br>

</p>

<!--<p><input type="submit" value="Enviar datos"></p>  -->
                                </div>
                                
                                
                 <!--               <div class="form-group">
                                    <label for="servicio_b">Servicios Básicos:</label>
                                    <input type="text" id="username" name="servicio_b" class="form-control" value="" placeholder="">
                                </div>  -->

<!--------------------------------------------------Ingreso mensuala------------------------------------------------------------>
<div class="form-group">
                                    <label for="ingreso_men">Ingeso Mensual:</label>
                                    <input type="text" id="username" name="ingreso_men" class="form-control" value="" placeholder="">
                                </div>

<!--------------------------------------------------Lugar de trabajo------------------------------------------------------------>
<div class="form-group">
                                    <label for="lugar_trab">Lugar de Trabajo:</label>
                                    <input type="text" id="username" name="lugar_trab" class="form-control" value="" placeholder="">
                                </div>    

<!--............................................Direccion domiciliaria........................................................-->
<div class="form-group">
                                    <label for="dir_trabajo">Dirección Domiciliaria:</label>
                                    <input type="text" id="last-name" name="dir_trabajo" class="form-control" value= "<?php
                                    if (isset($last_name)) {
                                        echo $last_name;
                                    }
                                    ?>" placeholder="Dirección Domiciliaria">
                                </div>


<!--------------------------------------------------Telefono Trabajo------------------------------------------------------------>
<div class="form-group">
                                    <label for="tlf_trabajo">Teléfono:</label>
                                    <input type="text" id="username" name="tlf_trabajo" class="form-control"  maxlength="10"value="" placeholder="">
                                </div>   


                                  







                 
                                <input type="submit" value="Agregar Datos Personales" name="submit" class="btn btn-primary">
                            </form>

<!--<div class="form-group">
                                    <label for="refercdi">¿Cuál fue el motivo que le inscribe a su niño en en nuestro CDI?(De ser la respuesta afirmativa "Especifique")</label>
                                    <input type="text" id="username" name="refercdi" class="form-control" value="" placeholder="">
                                </div>      -->                                                       

                            <!--    <div class="form-group">
                                    <label for="role">¿Come solo?</label>
                                    <select name="role" id="role" class="form-control">
                                        <option value="Parvulario">Si</option>
                                        <option value="Coordinador">No</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="email">¿Cómo es el vocavulario del niño?</label>
                                    <input type="text" id="email" name="email" class="form-control" value="<?php
                                   // if (isset($email)) {
                                   //     echo $email;
                                  //  }
                                    ?>" placeholder="">
                                </div> -->

                             <!--   <div class="form-group">
                                    <label for="telef">¿Con quién se relaciona mas el niño(a) con el papá, mamá u otro?</label> <!--maxlength="10"
                                    <input type="text" id="telef" name="telef" class="form-control"  value="<?php
                                    
                                    ?>" placeholder="">
                                </div>
                                <div class="form-group">
                                <label for="dir">¿Es sociable o presenta alguna actitud negativa?</label>
                                    <input type="text" id="dir" name="dir" class="form-control" value="<?php
                                    
                                    ?>" placeholder="">
                                </div>

                                <div class="form-group">
                                    <label for="role">CDI :*</label>  
                                    <select class="form-control" name="cdi" id="categories"> -->
                            <?php
                        /*    $sql_cdi = "select * from tbl_cdi";   
                            $ejecutar = mysqli_query($con, $sql_cdi);//ejecutar consulta*/
                            
                       /*     if (mysqli_num_rows($ejecutar) > 0) {
                                while ($row2 = mysqli_fetch_array($ejecutar)) {
                                    
                                    $cdi = $row2['nombre'];
                                    $idcdi = $row2['id'];
                                    echo "<option value='" . $idcdi. "' " .  ">" . ucfirst($cdi) . "</option>";
                                }
                            } else {
                               // echo "<center><h6>Categoría no disponible</h6></center>";
                            }
                            ?>
                        </select>
                                </div>
                                

                                

 <!--***************************************************insertar imagen***************************-->                               

                          <!--      <div class="form-group">
                                    <label for="image">Foto de perfil :*</label>
                                    <input type="file" id="image" name="image">
                                </div>

                                <input type="submit" value="Agregar Usuario" name="submit" class="btn btn-primary">
                            </form>
                        </div>-->
                       <!-- <div class="col-md-4">-->
                            <?php /*
                            if (isset($check_image)) {
                                echo "<img src='img/$check_image' width='50%'>";
                            }*/
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php require_once('inc/footer.php'); ?>