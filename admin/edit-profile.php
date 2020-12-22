<?php
require_once('inc/top.php');
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}

$session_username = $_SESSION['username'];
//echo("hola");
//echo($session_username);

$sql = "SELECT * FROM tbl_usuario WHERE ci = $session_username";
$run = mysqli_query($con, $sql);
$row = mysqli_fetch_array($run);
//$e_image =$row['nombres'];



$edit_id = $_GET['edit'];
echo($edit_id);
/*if (isset($_POST['edit'])) {
    $edit_id = $_POST['edit'];
   
    
    $edit_query = "SELECT * FROM tbl_usuario WHERE ci = $edit_id";
    $edit_query_run = mysqli_query($con, $edit_query);
    if (mysqli_num_rows($edit_query_run) > 0) {
        $edit_row = mysqli_fetch_array($edit_query_run);
        $e_username = $edit_row['username'];
        if ($e_username == $session_username) {
            $e_first_name = $edit_row['first_name'];
            $e_last_name = $edit_row['last_name'];
            $e_image = $edit_row['image'];
            $e_details = $edit_row['details'];
        } else {
           // header('location: index.php');
        }
    } else {
        //header('location: index.php');
    }
} else {
    //header("location: index.php");
}*/
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
                    <h1><i class="fa fa-user"></i> Editar <small>Informacion</small></h1><hr>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fas fa-home"></i> Menú</a></li>
                        <li class="active"><i class="fa fa-user"></i> Perfil</li>
                    </ol>
                    <?php
                    if (isset($_POST['submit'])) {
                        $tipo_docide = ($_POST['tipo_docid']);
                        $username = ( $_POST['ci']);
                        $last_name = ( $_POST['last-name']);
                        $first_name = ( $_POST['first-name']);     /*first name es el nombre del cajon*/
                        $fecha_ing = ( $_POST['fecha_ing']);     
                        $pass = ( $_POST['password']);     
                        $role_ni = ( $_POST['role']);
                        $email =  ($_POST['email']);
                        $telef = ($_POST['telef']);
                        $dir = ($_POST['dir']);
                        $cdi_ni = ($_POST['cdi']);
                        $periodo_ni = ($_POST['periodo_nin']);
                        $image = $_FILES['image']['name'];
                        $image_temp = $_FILES['image']['tmp_name'];

                      //  echo($first_name.$last_name.$username.$password.$role.$role.$email.$telef.$dir.$cdi);

                        
                        
                        //$password = crypt($password, $salt);
/*----------------------empty =vacio--------------------------*/
                        if (empty($first_name) or empty($last_name)  or empty($email) or empty($password)) {
                            $error = "Todos los (*) Campos son requeridos";
                        } else {
                            $insert_query = "UPDATE `tbl_usuario` SET `ci`='$username',`apellidos`='$last_name', `nombres`='$first_name', 
                            `contrasenia`='$pass',  `correo_e`='$email',`telefono`='$telef',
                            `direccion_dom`='$dir', `imagen_usuario` = '$image' 
                            where `id_usuario` = '$edit_id'";
                            if (mysqli_query($con, $insert_query)) {
                                //$msg = "Usuario ingresado";
                                //$path="img/$image";

                                
                                move_uploaded_file($image_temp, "img/$image"); /** Mueve un archivo subido a una nueva ubicación */
                                //move_uploaded_file($image_tmp, $path);
                                //copy($path,"../$path");
                                header('location: profile.php');
                                $msg = "Usuario ingresado";
                                /*$first_name = "";
                                $last_name = "";
                                $email = "";
                                $username = "";*/
                                //header("Location: users.php"); /*para poder volver al blog o login*/
                            } else {
                                $error = "Usuario no ingresado";
                            }
                        }
                    }
                    ?>
                    <div class="row">
                        <div class="col-md-8">
                        <form action="" method="POST" enctype="multipart/form-data">

                                
                                    <!--    <div class="form-group">
                                                <?php
                                            if (isset($error)) {
                                                echo "<span class='pull-right' style='color:red;'>$error</span>";
                                            } else if (isset($msg)) {
                                                echo "<span class='pull-right' style='color:green;'>$msg</span>";
                                            }
                                            ?>
                                            <label for="role">Tipo de Documento de Identidad:</label>
                                            <select class="form-control" name="tipo_docid" id="categories">
                                            
                                                <?php 
                                                   // $sql_tdocu = "select * from tbl_documento_identidad ";
                                                //    $ejecutar = mysqli_query($con, $sql_tdocu);//ejecutar consulta
                                                  //  $sql_llenartdocumento = "SELECT tbl_usuario.id_docide,tbl_documento_identidad.detalle FROM tbl_usuario INNER JOIN tbl_documento_identidad ON tbl_usuario.id_docide = tbl_documento_identidad.id_docide Where id_usuario = $edit_id";
                                                //    $ejecutar2 = mysqli_query($con, $sql_llenartdocumento);
                                                 //   $row3 = mysqli_fetch_array($ejecutar2);
                                                //    $idlltdoc=$row3['id_docide'];
                                                //        $detallelltdoc=$row3['detalle'];
                                                //        echo "<option value='" . $idlltdoc. "' " .  " selected>" . ($detallelltdoc) . "</option>";
                                                //
                                                //    if (mysqli_num_rows($ejecutar) > 0) {
                                                //        while ($row2 = mysqli_fetch_array($ejecutar)) {
                                                //            
                                                //            $detalledoc = $row2['detalle'];
                                                //            $iddoc = $row2['id_docide'];
                                                //            echo "<option value='" . $iddoc. "' " .  ">" . ($detalledoc) . "</option>";
                                                            
                                                //        }
                                                        
                                                //    } else {
                                                    // echo "<center><h6>Categoría no disponible</h6></center>";
                                                //    }
                                                ?>
                                            </select>
                                        </div>    -->



                                        <div class="form-group">
                                            <label for="ci  ">Número de documento de identidad:</label>
                                            <input type="text" id="ci" name="ci" class="form-control" value="<?php echo($row["ci"])
                                            
                                            ?>" >
                                        </div>


                                        <div class="form-group">
                                            <label for="last-name">Apellidos:</label>
                                            <input type="text" id="last-name" name="last-name" class="form-control" value="<?php echo($row["apellidos"]) ?>" placeholder="Apellidos">
                                        </div>



                                <div class="form-group">
                                    <label for="first-name">Nombres:</label>
                                    <input type="text" id="first-name" name="first-name" class="form-control" value="<?php echo($row["nombres"])       ?>" placeholder="Nombres">
                                </div>

                                
                              <!--  <div class="form-group">
                                    <label for="date">Fecha de Ingreso :</label>  
                                    <input type="date"  name="fecha_ing" class="form-control" value="<?php //echo($fecha_ing);?>">
                                </div>   -->
                                

                                <div class="form-group">
                                    <label for="Password">Contraseña :</label>
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Password" value="<?php echo( $row["contrasenia"]);?>">
                                </div>

                               <!-- <div class="form-group">
                                    <label for="role">Tipo de Ususario:</label>
                                    <select name="role" id="role" class="form-control" value="<?php //echo($tipo); ?>" >
                                        <option value="4">Coordinador</option>
                                        <option value="5">Parvulario</option>
                                        
                                    </select>
                                </div>   -->

                                <div class="form-group">
                                    <label for="email">Email :</label>
                                    <input type="text" id="email" name="email" class="form-control" value="<?php echo($row["correo_e"]);
                                    
                                    ?>" placeholder="Email">
                                </div>

                                <div class="form-group">
                                    <label for="telef">Teléfono:</label>
                                    <input type="text" id="telef" name="telef" class="form-control" maxlength="10" value="<?php echo($row["telefono"]);
                                    
                                    ?>" placeholder="Teléfono">
                                </div>
                                <div class="form-group">
                                    <label for="dir">Dirección:*</label>
                                    <input type="text" id="dir" name="dir" class="form-control" value="<?php echo($row["direccion_dom"]);
                                    
                                    ?>" placeholder="Dirección">
                                </div>

                               <!-- <div class="form-group">
                                    <label for="role">CDI :*</label>
                                    <select class="form-control" name="cdi" id="categories">
                                    <?php
                                    /*$sql_cdi = "select * from tbl_cdi";
                                    $ejecutar = mysqli_query($con, $sql_cdi);//ejecutar consulta
                                    
                                    if (mysqli_num_rows($ejecutar) > 0) {
                                        while ($row2 = mysqli_fetch_array($ejecutar)) {
                                            
                                            $cdi = $row2['nombre'];
                                            $idcdi = $row2['id'];
                                            echo "<option value='" . $idcdi. "' " .  ">" . ucfirst($cdi) . "</option>";
                                        }
                                    } else {
                                    // echo "<center><h6>Categoría no disponible</h6></center>";
                                    }*/
                            ?>
                        </select>
                                </div>-->
                                

                                

                                

                                <div class="form-group">
                                    <label for="image">Foto de perfil :*</label>
                                    <input type="file" id="image" name="image">
                                </div>

                                <input type="submit" value="Actualizar Datos" name="submit" class="btn btn-primary">
                                <a href="profile_users.php">
                                            <button type="button" class="btn btn-primary">Cancelar</button>
                                </a>
                                <a href="profile_users.php">
                                            <button type="button" class="btn btn-primary">Regresar</button>
                                </a>

                            </form></form>
                        </div>
                        <div class="col-md-4">
                        <img src='img/<?php echo($row["imagen_usuario"])?>' width='50%'>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php require_once('inc/footer.php'); ?>