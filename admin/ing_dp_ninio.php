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
                    <h1><i class="fa fa-user-plus"></i> Agregar<small>/Datos Personales del Niño/Niña </small></h1><hr>
                    <ol class="breadcrumb">
                         <li><a href="index.php"><i class="fas fa-home"></i> Menú</a></li>
                        <li class="active"><i class="fa fa-user-plus"></i> Ingresar Datos Personales del Niño/Niña</li>
                    </ol>
                    
                    
                    <?php
/*---------------------------Guarda los datos ingresados en los cajones en las variables------------------------------------------*/
                    if (isset($_POST['submit'])) {
                            //$date = time();
                        $docide_n = mysqli_real_escape_string($con, $_POST['dociden']);
                        $first_name = mysqli_real_escape_string($con, $_POST['first-name']);     /*first name es el nombre del cajon*/
                        $last_name = mysqli_real_escape_string($con, $_POST['last-name']);
                       // $docide_n = mysqli_real_escape_string($con, $_POST['dociden']);
                            //$role = $_POST['docide'];
                        $ci = mysqli_real_escape_string($con, $_POST['ci']);
                        $fechanaci = mysqli_real_escape_string($con, $_POST['fecha_nac']);
                        $lugarnac = mysqli_real_escape_string($con, $_POST['pais']);
                            // $provincianac= mysqli_real_escape_string($con, $_POST['provincia_n']);
                            //$cantonnac= mysqli_real_escape_string($con, $_POST['canton_no']);
                            // $cantonnac =  $_POST['canton_no'];
                            //$parroquianac = mysqli_real_escape_string($con, $_POST['parroquia_n']);
                        $genero_ni =  mysqli_real_escape_string($con, $_POST['genero_n']);
                        $grupoetnico_n  = mysqli_real_escape_string($con, $_POST['grupoetnico']);
                        $nombre_ma= mysqli_real_escape_string($con, $_POST['nombre_mad']);
                        $nombre_pa= mysqli_real_escape_string($con, $_POST['nombre_pad']);
                        $direccion_domic= mysqli_real_escape_string($con, $_POST['direcion_do']);
                        $discapacidad_n  = mysqli_real_escape_string($con, $_POST['discapacidad_n']);
                        $pocentajedisc = mysqli_real_escape_string($con, $_POST['porcentaje_d']);
                        $carnetcon = mysqli_real_escape_string($con, $_POST['conadis']);
                        $sobrenombre = mysqli_real_escape_string($con, $_POST['sobrenombre_n']);
                                                
                            // $role = $_POST['role'];
                            // $docide_n=$_POST['docide'];
                        $cdi = mysqli_real_escape_string($con, strtolower($_POST['cdi']));
                        $image = $_FILES['image']['name'];
                        $image_temp = $_FILES['image']['tmp_name'];

                //      echo($first_name.$last_name.$ci.$fechanaci.$paisnac.$provincianac.$parroquianac.$genero_ni.$grupoetnico_n.$discapacidad_n.$pocentajedisc. $sobrenombre);

                        
                        
                        //$password = crypt($password, $salt);
/*----------------------empty =vacio--------------------------*/
                        if (empty($first_name) or empty($last_name) or empty($ci) or empty($lugarnac) or empty($fechanaci)) {
                            $error = "Todos los (*) Campos son requeridos";
                        } else 
                        
                        {
   //echo ($last_name+$first_name+$docide_n+$ci+$fechanaci+$lugarnac+$genero_ni+$grupoetnico_n+$nombre_ma+$nombre_pa+$direccion_domic+$discapacidad_n+$pocentajedisc+$carnetcon+$sobrenombre+$cdi);
                            
                            
                 //           $insert_query = "INSERT INTO tbl_datos_personales_ninio(apellidos, nombres, id_docide, ci, fecha_nac, id_pais, id_provincia, id_canton, id_parroquia, id_genero, id_etnia, discapacidad, porcentaje, carnet_conadis, como_lo_llaman, imagen_ninio ) VALUES ('Jara Santos','Leonardo Antonio','1','0601234560','2017/2/5','1','1','1','1','1','1','No tiene','0','NO tiene','Leo');" 
                // $insert_query =  "  INSERT INTO tbl_datos_personales_ninio(apellidos, nombres, id_docide, ci, fecha_nac, lugar_nac, id_genero, id_etnia, nombre_madre, nombre_padre, direrccion_dom, discapacidad, porcentaje, carnet_conadis, como_lo_llaman, id_cdi, imagen_ninio) VALUES ('Robles Jara','Felix','9','0604090211','19-02-2017','Chimborazo-Riobamba','1','1','María Jara','Cesar Robles','El comil','no','0','no','Felix',1,'');"
                $insert_query = "  INSERT INTO tbl_datos_personales_ninio(apellidos, nombres, id_docide, ci, fecha_nac, pais, id_genero, id_etnia, nombre_madre, nombre_padre, direrccion_dom, discapacidad, porcentaje, carnet_conadis, como_lo_llaman, id_cdi, imagen_ninio) VALUES ('$last_name','$first_name','$docide_n','$ci','$fechanaci','$lugarnac','$genero_ni','$grupoetnico_n','$nombre_ma','$nombre_pa','$direccion_domic','$discapacidad_n','$pocentajedisc','$carnetcon','$sobrenombre','$cdi','$image')";
                            if (mysqli_query($con, $insert_query)) {
                               $msg = "Datos ingresados";
                               $path="img/$image";

                              
                                move_uploaded_file($image_temp, "img/$image"); /** Mueve un archivo subido a una nueva ubicación */
                                move_uploaded_file($image_tmp, $path);
                               copy($path,"../$path");
                              $msg = "Datos ingresados";
                              $first_name = "";
                                $last_name = "";
                                $ci  = "";
                                $username = "";
                           header("Location: niniosregistrados.php"); /*para poder volver al blog o login*/
                            } else {
                                $error = "Datos no ingresados";
                            }
                        }
                    }
                    ?>


<!--............................................Documento Identidad........................................................-->
                    <div class="row">
                        <div class="col-md-8">


                                    <div class="form-group">
                                    <label for="docide">Tipo de Documento de Identificación :</label>
                                    <select class="form-control" name="dociden" id="categories">
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
                                    <label for="ci">Número de Documento de Identificación:</label>
                                    <input type="text" id="username" name="ci" class="form-control" maxlength="10" value="" placeholder="CI">
                                </div>



<!--............................................Nombre........................................................-->                    
                <!--    <div class="row">
                        <div class="col-md-8">  -->
                             <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="first-name">Nombres :</label>
                                    <?php
                                    if (isset($error)) {
                                        echo "<span class='pull-right' style='color:red;'>$error</span>";
                                    } else if (isset($msg)) {
                                        echo "<span class='pull-right' style='color:green;'>$msg</span>";
                                    }
                                    ?>
                                    <input type="text" id="first-name" name="first-name" class="form-control" value= "<?php
                                    if (isset($first_name)) {
                                        echo $first_name;
                                    }
                                    ?>" placeholder="Nombres">
                                </div>
<!--............................................Apellidos........................................................-->
                                <div class="form-group">
                                    <label for="last-name">Apellidos:</label>
                                    <input type="text" id="last-name" name="last-name" class="form-control" value= "<?php
                                    if (isset($last_name)) {
                                        echo $last_name;
                                    }
                                    ?>" placeholder="Apellidos">
                                </div>
<!--............................................Documento Identidad........................................................-->
<!--
                                <div class="form-group">
                                    <label for="docide">Tipo de Documento :*</label>
                                    <select class="form-control" name="dociden" id="categories">
                                        <?//php
                                       // $sql_cdi = "select * from tbl_documento_identidad";
                                       // $ejecutar = mysqli_query($con, $sql_cdi);//ejecutar consulta
                                        
                                       // if (mysqli_num_rows($ejecutar) > 0) {
                                       //     while ($row2 = mysqli_fetch_array($ejecutar)) {  
                                                
                                        //        $detalledocu = $row2['detalle'];

                                          //      $iddocu = $row2['id_docide'];
                                        //        echo "<option value='" . $iddocu. "' " .  ">" . ucfirst($detalledocu) . "</option>";
                                            }
                                       // } else {
                                        // echo "<center><h6>Categoría no disponible</h6></center>";
                                        }
                                         ?>
                                    </select> -->
<!--............................................CI........................................................-->
                          <!--      <div class="form-group">
                                    <label for="ci">CI:</label>
                                    <input type="text" id="username" name="ci" class="form-control" maxlength="10" value="" placeholder="CI">
                                </div>   -->



                              <!--  <input type="text" id="telef" name="telef" class="form-control" maxlength="10" value="<?php
                                    
                                    ?>" placeholder="Teléfono"> -->

<!--............................................Fecha nacimiento........................................................-->
                                <div class="form-group">
                                    <label for="date">Fecha de Nacimiento :</label>  
                                   <!-- <input  class="form-control" placeholder="Fecha de Nacimiento">-->
                                    <input type="date"  name="fecha_nac" class="form-control">
                                </div>

<!--............................................Lugar de Nacimiento........................................................-->
                                                <div class="row">
                                                    <div class="col-md-7">
                                                            <label >Lugar de Nacimiento:</label>


                                                            <form class="form-inline">
                            <div class="form-group mb-2">
                                <label for="staticEmail2" class="sr-only">Email</label>
                                <input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="email@example.com">
                            </div>
                            <div class="form-group mx-sm-3 mb-2">
                                <label for="inputPassword2" class="sr-only">Password</label>
                                <input type="password" class="form-control" id="inputPassword2" placeholder="Password">
                            </div>
                            <button type="submit" class="btn btn-primary mb-2">Confirm identity</button>
                            </form>




                                <div class="form-group">
                                    <label for="pais_n">País:</label> 
                                    <input type="text" id="last-name" name="pais_n" class="form-control" value= "  <?php 
                                    ?>" placeholder="País">
                                </div>

                                <div class="form-group">
                                    <label for="provincia_n">Provincia:</label>
                                    <input type="text" id="last-name" name="provincia_n" class="form-control" value= "<?php
                                    ?>" placeholder="Provincia">
                                </div>

                                <div class="form-group">
                                    <label for="canton_no">Cantón:</label>
                                    <input type="text" id="last-name" name="canton_no" class="form-control" value= "<?php
                                    ?>" placeholder="Cantón">
                                </div>

                                <div class="form-group">
                                    <label for="parroquia_n">Parroquia:</label>
                                    <input type="text" id="last-name" name="parroquia_n" class="form-control" value= "<?php
                                    ?>" placeholder="Parroquia">
                                </div>
                        </div>
                    </div>

 <!--............................................PAis........................................................-->                               
                         <!--       <div class="form-group">
                                <label for="pais_n">Pais :*</label>
                                <select class="form-control" name="pais_n" id="categories">
                                        <?php
                                 /*       $sql_cdi = "select * from tbl_pais";
                                        $ejecutar = mysqli_query($con, $sql_cdi);//ejecutar consulta
                                        
                                        if (mysqli_num_rows($ejecutar) > 0) {
                                            while ($row2 = mysqli_fetch_array($ejecutar)) {  
                                                
                                                $detallepais = $row2['detalle'];

                                                $idpais = $row2['id_pais'];
                                                echo "<option value='" . $idpais. "' " .  ">" . ucfirst($detallepais) . "</option>";
                                            }
                                        } else {
                                        // echo "<center><h6>Categoría no disponible</h6></center>";
                                        }*/
                                        ?>
                                    </select>                                 
                                   <!-- <label for="pais_n">Pais :*</label>
                                   <input  class="form-control" placeholder="Fecha de Nacimiento">
                                    <input type="text"  name="pais_n" class="form-control">-->
                                </div> 

<!--............................................Provincia........................................................-->
                            <!--    <div 
                                class="form-group">
                                    <label for="provincia_n">Provincia:*</label>
                                    <select class="form-control" name="provincia_n" id="categories">
                                        <?php
                                       /* $sql_cdi1 = "select * from tbl_provincia";
                                        $ejecutar = mysqli_query($con, $sql_cdi1);//ejecutar consulta
                                        
                                        if (mysqli_num_rows($ejecutar) > 0) {
                                            while ($row2 = mysqli_fetch_array($ejecutar)) {  
                                                
                                                $detalleprov = $row2['detalle'];
                                                $idprov = $row2['id_provincia'];
                                             
                                                echo "<option value='" . $idprov. "' " .  ">" . ucfirst($detalleprov) . "</option>";
                                               // echo "<option value='" . $idprovincia. "' " .  ">" . ucfirst($detalleprov) . "</option>";
                                            }
                                        } else {
                                        // echo "<center><h6>Categoría no disponible</h6></center>";
                                        }*/
                                        ?>
                                    </select> 

                                  <!--  <input type="text" id="dir" name="provincia_n" class="form-control" value=" <?php
                                    
                                    ?>" placeholder="Provincia">-->
                                </div>
                                <!--<div>
                                <label for="canton_n">Cantón:*</label>
                                    <input type="text" id="dir" name="canton_no" class="form-control" value="<?php
                                    
                                    ?>" placeholder="Cantón">
                                </div>-->

<!--............................................Canton........................................................-->
                         <!--   <div 
                                class="form-group">
                                    <label for="canton_no">Cantón:*</label>
                                    <select class="form-control" name="canton_no" id="categories">
                                        <?php
                                      /*  $sql_canton = "select * from tbl_canton";
                                        $ejecutar = mysqli_query($con, $sql_canton);//ejecutar consulta
                                        
                                        if (mysqli_num_rows($ejecutar) > 0) {
                                            while ($row2 = mysqli_fetch_array($ejecutar)) {  
                                                
                                                $canton_n = $row2['detalle'];
                                                $idcanton = $row2['id_canton'];
                                                echo "<option value='" . $idcanton. "' " .  ">" . ucfirst($canton_n) . "</option>";
                                               // echo "<option value='" . $idprovincia. "' " .  ">" . ucfirst($detalleprov) . "</option>";
                                            }
                                        } else {
                                        // echo "<center><h6>Categoría no disponible</h6></center>";
                                        }*/
                                        ?>
                                    </select> 

                                  <!--  <input type="text" id="dir" name="provincia_n" class="form-control" value=" <?php
                                    
                                    ?>" placeholder="Provincia">-->
                                </div>
                                <!--<div>
                                <label for="canton_n">Cantón:*</label>
                                    <input type="text" id="dir" name="canton_no" class="form-control" value="<?php
                                    
                                    ?>" placeholder="Cantón">
                                </div>-->


   <!--............................................Parroquia........................................................-->                             
                            <!--    <div 
                                 class="form-group">
                                    <label for="parroquia_n">Parroquia:*</label>
                                    <select class="form-control" name="parroquia_n" id="categories">
                                        <?php
                                     /*   $sql_cdi = "select * from tbl_parroquia";
                                        $ejecutar = mysqli_query($con, $sql_cdi);//ejecutar consulta
                                        
                                        if (mysqli_num_rows($ejecutar) > 0) {
                                            while ($row2 = mysqli_fetch_array($ejecutar)) {  
                                                
                                                $parroquia_n = $row2['detalle'];

                                                $id_parroquia = $row2['id_parroquia'];
                                                echo "<option value='" . $id_parroquia. "' " .  ">" . ucfirst($parroquia_n) . "</option>";
                                            }
                                        } else {
                                        // echo "<center><h6>Categoría no disponible</h6></center>";
                                        }*/
                                        ?>
                                    </select>
                                   <!-- <input type="text" id="dir" name="parroquia_n" class="form-control" value="<?php
                                    
                                    ?>" placeholder="Parroquia">
                                </div>-->

<!--............................................Genero........................................................-->
                        <div class="row">
                        <div class="col-md-8">
                               
                                <div class="form-group">
                                    <label for="genero_n">Género :</label>
                                    <select class="form-control" name="genero_n" id="categories">
                                        <?php
                                        $sql_genero = "select * from tbl_genero";
                                        $ejecutar = mysqli_query($con, $sql_genero);//ejecutar consulta
                                        
                                        if (mysqli_num_rows($ejecutar) > 0) {
                                            while ($row2 = mysqli_fetch_array($ejecutar)) {  
                                                
                                                $genero_n = $row2['detalle'];

                                                $id_genero = $row2['id_genero'];
                                                echo "<option value='" . $id_genero. "' " .  ">" . ucfirst($genero_n) . "</option>";
                                            }
                                        } else {
                                        // echo "<center><h6>Categoría no disponible</h6></center>";
                                        }
                                        ?>
                                    </select>
                                    <!--<select name="genero_n" id="role" class="form-control">
                                        <option value="Masculino">Masculino</option>
                                        <option value="Femenino">Femenino</option>
                                    </select>-->
                                </div>

<!--............................................Etnia........................................................-->
                                <div class="form-group">
                                    <label for="grupoetnico">Grupo Étnico</label>
                                    <select class="form-control" name="grupoetnico" id="categories">
                                        <?php
                                        $sql_etnia = "select * from tbl_etnia";
                                        $ejecutar = mysqli_query($con, $sql_etnia);//ejecutar consulta
                                        
                                        if (mysqli_num_rows($ejecutar) > 0) {
                                            while ($row2 = mysqli_fetch_array($ejecutar)) {  
                                                
                                                $etnia_n = $row2['detalle'];

                                                $idetnia = $row2['id_etnia'];
                                                echo "<option value='" . $idetnia. "' " .  ">" . ucfirst($etnia_n) . "</option>";
                                            }
                                        } else {
                                        // echo "<center><h6>Categoría no disponible</h6></center>";
                                        }
                                        ?>
                                    </select>
                                    <!--<select name="grupoetnico" id="role" class="form-control">
                                        <option value="Mestizo">Mestizo</option>
                                        <option value="Indígena">Indígena</option>
                                        <option value="Mulato">Mulato</option>
                                        <option value="Negro">Negro</option>
                                        <option value="Blanco">Blanco</option>
                                    </select>-->
                                    
                                </div>

<!--............................................Nombre de la madre........................................................-->
                                    <div class="form-group">
                                    <label for="nombre_mad">Nombre de la madre:</label>
                                    <input type="text" id="last-name" name="nombre_mad" class="form-control" value= "<?php
                                    if (isset($last_name)) {
                                        echo $last_name;
                                    }
                                    ?>" placeholder="Nombre de la madre">
                                </div>

<!--............................................Nombre del padre........................................................-->
                                <div class="form-group">
                                    <label for="nombre_pad">Nombre del padre:</label>
                                    <input type="text" id="last-name" name="nombre_pad" class="form-control" value= "<?php
                                    if (isset($last_name)) {
                                        echo $last_name;
                                    }
                                    ?>" placeholder="Nombre del padre">
                                </div>

<!--............................................Direccion domiciliaria........................................................-->
                                <div class="form-group">
                                    <label for="direcion_do">Dirección Domiciliaria:</label>
                                    <input type="text" id="last-name" name="direcion_do" class="form-control" value= "<?php
                                    if (isset($last_name)) {
                                        echo $last_name;
                                    }
                                    ?>" placeholder="Dirección Domiciliaria">
                                </div>


<!--............................................Discapacidad........................................................-->
                                <div class="form-group">
                                    <label for="discapacidad_n">Tiene Discapacidad :</label>
                                    <select name="discapacidad_n" id="role" class="form-control">
                                        <option value="Si">Si</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>

 <!--............................................Porcentaje........................................................-->                               
                                <div 
                                class="form-group">
                                    <label for="dir">Porcentaje:</label>
                                    <input type="text" id="dir" name="porcentaje_d" class="form-control" value="<?php
                                    
                                    ?>" placeholder="Porcentaje">
                                </div>

<!--............................................Carnet conadis........................................................-->
                                <div class="form-group">
                                    <label for="conadis">Tiene Carnet del CONADIS :*</label>
                                    <select name="conadis" id="role" class="form-control">
                                        <option value="Si">Si</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>

<!--............................................Sobrenombre........................................................-->
                                <div 
                                 class="form-group">
                                    <label for="dir">Como lo llaman en casa:*</label>
                                    <input type="text" id="dir" name="sobrenombre_n" class="form-control" value="<?php
                                    
                                    ?>" placeholder="Sobrenombre">
                                </div>


<!--............................................CDI.......................................................-->                                
                                <div class="form-group">
                                    <label for="role">CDI :*</label>
                                    <select class="form-control" name="cdi" id="categories">
                                        <?php
                                        $sql_cdi = "select * from tbl_cdi";
                                        $ejecutar = mysqli_query($con, $sql_cdi);//ejecutar consulta
                                        
                                        if (mysqli_num_rows($ejecutar) > 0) {
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
                                
                      
<!--............................................Imagen........................................................-->
                                <div class="form-group">
                                    <label for="image">Fotografía</label>
                                    <input type="file" id="image" name="image">
                                </div>

                                <input type="submit" value="Agregar Datos Personales del Niño(a)" name="submit" class="btn btn-primary">
                            </form>

                        </div>
                        <div class="col-md-4">
                            <?php
                            if (isset($check_image)) {
                                echo "<img src='img/$check_image' width='50%'>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <?php require_once('inc/footer.php'); ?>