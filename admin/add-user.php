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
                    <h1><i class="fa fa-user-plus"></i> Agregar<small> Nuevo </small></h1><hr>
                    <ol class="breadcrumb">
                         <li><a href="index.php"><i class="fas fa-home"></i> Menú</a></li>
                        <li class="active"><i class="fa fa-user-plus"></i> Nuevo Usuario</li>
                    </ol>
                    
                    
                    <?php
/*---------------------------Guarda los datos ingresados en los cajones en las variables------------------------------------------*/
                    if (isset($_POST['submit'])) {
                        //$date = time();
                        
                        $tipo_docide = mysqli_real_escape_string($con, $_POST['tipo_docid']);
                        $username = mysqli_real_escape_string($con, $_POST['ci']);
                        $first_name = mysqli_real_escape_string($con, $_POST['first-name']);     /*first name es el nombre del cajon*/
                        $last_name = mysqli_real_escape_string($con, $_POST['last-name']);
                        $fecha_ingreso = mysqli_real_escape_string($con, $_POST['fecha_ing']);                                                                       //username
                        $role = $_POST['role'];
                        $dir = mysqli_real_escape_string($con, strtolower($_POST['dir']));
                        $telef = mysqli_real_escape_string($con, strtolower($_POST['telef']));
                        $email = mysqli_real_escape_string($con, strtolower($_POST['email']));
                        $password = mysqli_real_escape_string($con, $_POST['password']);
                        $cdi = mysqli_real_escape_string($con, strtolower($_POST['cdi']));
                        $image = $_FILES['image']['name'];
                        $image_temp = $_FILES['image']['tmp_name'];

                      //  echo($first_name.$last_name.$username.$password.$role.$role.$email.$telef.$dir.$cdi);         //username

                        
                        
                        //$password = crypt($password, $salt);
/*----------------------empty =vacio--------------------------*/
                        if (empty($first_name) or empty($last_name) or empty($username) or empty($email) or empty($password)) {   //username
                            $error = "Todos los (*) Campos son requeridos";
                        } else {
                            $insert_query = "INSERT INTO tbl_usuario (id_docide,ci,apellidos,nombres,fecha_ingreso,tipo,direccion_dom,telefono,correo_e,contrasenia,id_cdi,imagen_usuario) values('$tipo_docide','$username','$Last_name','$first_name','$fecha_ingreso','$role','$dir','$telef','$email','$password','$cdi','$image')";
                            if (mysqli_query($con, $insert_query)) {
                                $msg = "Usuario ingresado";
                                $path="img/$image";

                                
                                move_uploaded_file($image_temp, "img/$image"); /** Mueve un archivo subido a una nueva ubicación */
                                /*le edite*/
                                move_uploaded_file($image_temp, $path);
                                /*aqui tb*/
                                copy($path,"../$path");
                                $msg = "Usuario ingresado";
                                $first_name = "";
                                $last_name = "";
                                $email = "";
                                $username = "";         //username
                                header("Location: users.php"); /*para poder volver al blog o login*/
                            } else {
                                $error = "Usuario no ingresado";
                            }
                        }
                    }
                    ?>
                    <div class="row">
                        <div class="col-md-8">
                            <form action="" method="post" enctype="multipart/form-data">


                            <div class="form-group">
                                    <label for="role">Tipo de Documento de Identidad:</label>
                                    <select class="form-control" name="tipo_docid" id="categories">
                            <?php
                            $sql_tdocu = "select * from tbl_documento_identidad";
                            $ejecutar = mysqli_query($con, $sql_tdocu);//ejecutar consulta
                            
                            if (mysqli_num_rows($ejecutar) > 0) {
                                while ($row2 = mysqli_fetch_array($ejecutar)) {
                                    
                                    $detalledoc = $row2['detalle'];
                                    $iddoc = $row2['id_docide'];
                                    echo "<option value='" . $iddoc. "' " .  ">" . ucfirst($detalledoc) . "</option>";
                                }
                            } else {
                               // echo "<center><h6>Categoría no disponible</h6></center>";
                            }
                            ?>
                        </select>
                                </div>


                                <div class="form-group">
                                    <label for="username">Número de Documento de Identidad:</label>    <!--username-->
                                    <input type="text" id="username" name="ci" class="form-control" maxlength="10" value="" placeholder="Número de Documento de Identidad">    <!--username-->
                                </div>


                                <div class="form-group">
                                    <label for="first-name">Nombres:</label>
                                    <?php
                                    if (isset($error)) {
                                        echo "<span class='pull-right' style='color:red;'>$error</span>";
                                    } else if (isset($msg)) {
                                        echo "<span class='pull-right' style='color:green;'>$msg</span>";
                                    }
                                    ?>
                                    <input type="text" id="first-name" name="first-name" class="form-control" value="<?php
                                    if (isset($first_name)) {
                                        echo $first_name;
                                    }
                                    ?>" placeholder="Nombres">
                                </div>


                                <div class="form-group">
                                    <label for="last-name">Apellidos:</label>
                                    <input type="text" id="last-name" name="last-name" class="form-control" value="<?php
                                    if (isset($last_name)) {
                                        echo $last_name;
                                    }
                                    ?>" placeholder="Apellidos">
                                </div>

                                
                                <div class="form-group">
                                    <label for="date">Fecha de Ingreso :</label>  
                                    <input type="date"  name="fecha_ing" class="form-control">
                                </div>

                               
                                <div class="form-group">
                                    <label for="role">Tipo de Ususario:</label>
                                    <select name="role" id="role" class="form-control">
                                        <option value="Coordinador">Coordinador</option>
                                        <option value="Parvulario">Parvulario</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="dir">Dirección:</label>
                                    <input type="text" id="dir" name="dir" class="form-control" value="<?php
                                    
                                    ?>" placeholder="Dirección">
                                </div>

                                <div class="form-group">
                                    <label for="telef">Teléfono:</label>
                                    <input type="text" id="telef" name="telef" class="form-control" maxlength="10" value="<?php
                                    
                                    ?>" placeholder="Teléfono">
                                </div>

                                <div class="form-group">
                                    <label for="email">Correo Electrónico:</label>
                                    <input type="text" id="email" name="email" class="form-control" value="<?php
                                    if (isset($email)) {
                                        echo $email;
                                    }
                                    ?>" placeholder="Correo Electrónico">
                                </div>

                                
                                <div class="form-group">
                                    <label for="Password">Contraseña:</label>
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña">
                                </div>


                                <div class="form-group">
                                    <label for="role">Centro de Desarrollo Infantil:</label>
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
                                

                                <div class="form-group">
                                    <label for="image">Foto de perfil:</label>
                                    <input type="file" id="image" name="image">
                                </div>

                                <input type="submit" value="Agregar Usuario" name="submit" class="btn btn-primary">
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