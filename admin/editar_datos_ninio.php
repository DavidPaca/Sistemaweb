<?php
require_once('inc/top.php');
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
} /*else if (isset($_SESSION['username']) && $_SESSION['role'] == 'author') {
    header('Location: index.php');
}*/

if (isset($_GET['edit'])) {//si esque hay la variable edit
    $edit_id = $_GET['edit'];//get y post sirven para atrapar datos.
    echo($edit_id);
    $edit_query = "SELECT * FROM tbl_datos_personales_ninio WHERE id_ninio = $edit_id";
    $edit_query_run = mysqli_query($con, $edit_query);
   // if (mysqli_num_rows($edit_query_run) > 0) {/*if numero de filas es mayor q 0*/
        $edit_row = mysqli_fetch_array($edit_query_run);//fetch array sirve para que tu atrapestoda la fila de una table... fetch assoc.
        //$row = mysqli_fetch_array($run)
      /*  $ci=$edit_row['ci'];
        $apellidos=$edit_row['apellidos'];
        $nombre = $edit_row['nombres'];
        $tipo = $edit_row['tipo'];
        $direccion = $edit_row['direccion_dom'];
        $correo = $edit_row ['correo_e'];
        $telefono = $edit_row['telefono'];
        $contrasenia = $edit_row['contrasenia'];
        $id_cdi = $edit_row['id_cdi'];*/
        
        $idninio = $edit_row['id_ninio'];
        $first_name = $edit_row['nombres'];
        $last_name = $edit_row['apellidos'];
        $idTipodocumento = $edit_row['id_docide'];
        $c_i = $edit_row['ci'];
        $fecha_nac = $edit_row['fecha_nac'];
        $lugar_nac = $edit_row['lugar_nac'];
        $dir = $edit_row['direrccion_dom'];
        $idgenero_n = $edit_row['id_genero'];
        $idetnia_n = $edit_row['id_etnia'];
        $nombre_padre_n = $edit_row['nombre_padre'];
        $nombre_madre_n = $edit_row['nombre_madre'];
        $discapacidad_n = $edit_row['discapacidad'];
        $sobrenombre = $edit_row['como_lo_llaman'];
        $cdi = $edit_row['id_cdi'];
        $imagen_n = $edit_row['imagen_ninio'];

   // } else {
       // header('location: index.php');
  /*  }*/
} else {
    header("location: index.php");
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
                    <h1><i class="fa fa-user-plus"></i> Editar<small> Datos Personales del Niño(a)</small></h1><hr>
                    <ol class="breadcrumb">
                         <li><a href="index.php"><i class="fas fa-home"></i> Menú</a></li>
                        <li class="active"><i class="fa fa-user-plus"></i> Nuevo Usuario</li>
                    </ol>
                    <?php
                    if (isset($_POST['submit'])) {//si se ha presionado el boton subbmit
                        //$date = time();
                        $idninio = mysqli_real_escape_string($con, $_POST['id_ninio']);
                        $first_name = mysqli_real_escape_string($con, $_POST['nombres']);
                        $last_name = mysqli_real_escape_string($con, $_POST['apellidos']);
                        $idTipodocumento = mysqli_real_escape_string($con, $_POST['ci']);
                        $c_i = mysqli_real_escape_string($con, $_POST['id_docide']);
                        //$fecha_nac = $_POST['role'];
                        $fecha_nac = mysqli_real_escape_string($con, strtolower($_POST['fecha_nac']));
                        $lugar_nac = mysqli_real_escape_string($con, strtolower($_POST['lugar_nac']));
                        $dir = mysqli_real_escape_string($con, strtolower($_POST['direrccion_dom']));
                        $idgenero_n = mysqli_real_escape_string($con, strtolower($_POST['id_genero']));
                        $idetnia_n = mysqli_real_escape_string($con, strtolower($_POST['id_etnia']));
                        $nombre_padre_n = mysqli_real_escape_string($con, strtolower($_POST['nombre_padre']));
                        $nombre_madre_n = mysqli_real_escape_string($con, strtolower($_POST['nombre_madre']));
                        $discapacidad_n = mysqli_real_escape_string($con, strtolower($_POST['discapacidad']));
                        $sobrenombre = mysqli_real_escape_string($con, strtolower($_POST['como_lo_llaman']));
                        $cdi = mysqli_real_escape_string($con, strtolower($_POST['cdi']));
                        $imagen_n = mysqli_real_escape_string($con, strtolower($_POST['imagen_ninio']));

                                             
                        
                        //echo($first_name.$last_name.$username.$password.$role.$role.$email.$telef.$dir.$cdi);


                        $consulta="update tbl_usuario set ci='$username',apellidos='$last_name',nombres='$first_name', tipo='$role',correo_e='$email',direccion_dom='$dir',telefono='$telef',contrasenia='$password',id_cdi='$cdi' where id_usuario = '$edit_id'";
                        $ejecutar = mysqli_query($con, $consulta);//ejecutar consulta
                        header("location: users.php");
                        
                        
                        //$password = crypt($password, $salt);

                       
                    }
                    ?>
                    <div class="row">
                        <div class="col-md-8">
                            <form action="" method="post" enctype="multipart/form-data">
                                

<!--............................................Nombre........................................................-->                    
<div class="row">
                        <div class="col-md-8">
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

                                <div class="form-group">
                                    <label for="docide">Tipo de Documento :*</label>
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
                                    <label for="ci">CI:</label>
                                    <input type="text" id="username" name="ci" class="form-control" value="" placeholder="CI">
                                </div>

<!--............................................Fecha nacimiento........................................................-->
                                <div class="form-group">
                                    <label for="date">Fecha de Nacimiento :*</label>
                                   <!-- <input  class="form-control" placeholder="Fecha de Nacimiento">-->
                                    <input type="date"  name="fecha_nac" class="form-control">
                                </div>

<!--............................................Lugar de Nacimiento........................................................-->
                                <div class="form-group">
                                    <label for="lugar_n">Lugar de Nacimiento:</label>
                                    <input type="text" id="last-name" name="lugar_n" class="form-control" value= "<?php
                                    if (isset($last_name)) {
                                        echo $last_name;
                                    }
                                    ?>" placeholder="Lugar de Nacimiento">
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
                                <div class="form-group">
                                    <label for="genero_n">Género :*</label>
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


                       <input type="submit" value="Terminar Edición" name="submit" class="btn btn-primary">
                            </form>             
                                
                           
                           
                         <!--       <div class="form-group">
                                    <label for="image">Foto de perfil :*</label>
                                    <input type="file" id="image" name="image">
                                </div>

                                  
                             
                             -->
                             
                             
                             
                       <!--         <div class="form-group">
                                    <label for="first-name">Nombre :*</label>
                                    <?php
                                  /*  if (isset($error)) {
                                        echo "<span class='pull-right' style='color:red;'>$error</span>";
                                    } else if (isset($msg)) {
                                        echo "<span class='pull-right' style='color:green;'>$msg</span>";
                                    }
                                    ?>
                                    <input type="text" id="first-name" name="first-name" class="form-control" value="<?php echo($nombre);   
                                    if (isset($first_name)) {
                                        echo $first_name;
                                    }
                                    ?>" placeholder="Nombres">
                                </div>

                                <div class="form-group">
                                    <label for="last-name">Apellido :*</label>
                                    <input type="text" id="last-name" name="last-name" class="form-control" value="<?php echo($apellidos);
                                    if (isset($last_name)) {
                                        echo $last_name;
                                    }
                                    ?>" placeholder="Apellidos">
                                </div>

                                <div class="form-group">
                                    <label for="username">CI:*</label>
                                    <input type="text" id="username" name="ci" class="form-control" value="<?php echo($ci);
                                    
                                    ?>" placeholder="CI">
                                </div>

                                <div class="form-group">
                                    <label for="Password">Password :*</label>
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Password" value="<?php echo($contrasenia);?>"> 
                                </div>

                                <div class="form-group">
                                    <label for="role">Rol :*</label>
                                    <select name="role" id="role" class="form-control" >
                                        <option value="<?php echo($tipo); ?>" selected></option>
                                        <option value="Parvulario">Parvulario</option>
                                        <option value="Coordinador">Coordinador</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email :*</label>
                                    <input type="text" id="email" name="email" class="form-control" value="<?php echo($correo);?>"
                                    <?php  if (isset($email)) {
                                        echo $email;
                                    }
                                    ?> placeholder="Email">
                                </div>

                                <div class="form-group">
                                    <label for="telef">Teléfono:*</label>
                                    <input type="text" id="telef" name="telef" maxlength="10" class="form-control" value="<?php echo($telefono);?>"  placeholder="Teléfono">
                                </div>
                                <div class="form-group">
                                    <label for="dir">Dirección:*</label>
                                    <input type="text" id="dir" name="dir" class="form-control" value="<?php echo($direccion);?>"
                                    
                                     placeholder="Dirección">
                                </div>

                                
                                <div class="form-group">
                                    <label for="role">CDI :*</label>
                                    <select class="form-control" name="cdi" id="categories"> -->

  
   


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
                                echo "<center><h6>Categoría no disponible</h6></center>";
                            }
                            ?>
                        </select>
                                </div>
                                

                                

                                

                                <div class="form-group">
                                    <label for="image">Foto de perfil :*</label>
                                    <input type="file" id="image" name="image">
                                </div>

                                <input type="submit" value="Terminar Edición" name="submit" class="btn btn-primary">
                            </form>
                        </div>

                        <div class="col-md-4">  -->
                            <?php
                            if (isset($check_image)) {
                                echo "<img src='img/$check_image' width='50%'>";
                            }*/
                            ?>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php require_once('inc/footer.php'); ?>
                    