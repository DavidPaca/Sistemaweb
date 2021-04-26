<?php
require_once('inc/top.php');
ob_start();
require_once('../inc/db.php');//CONEXION CON BASE DE DATOS
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    
}
$user_ci = $_SESSION['username'];
//echo $user_ci;
?>
</head>
<body>
    <div id="wrapper">
        <?php require_once('inc/header.php'); ?>

        <div class="container-fluid body-section">
            <div class="row">
                <div class="col-md-3">
                    <?php require_once('../admin/inc/sidebar.php'); ?>
                </div>
                <div class="col-md-9">
                    <h1><i class="fa fa-user-plus"></i> Agregar<small> Nuevo Visitador(a) Social </small></h1><hr>
                    <ol class="breadcrumb">
                         <li><a href="index.php"><i class="fas fa-home"></i> Menú</a></li>
                        <li class="active"><i class="fa fa-user-plus"></i> Nuevo Usuario</li>
                    </ol>
                    
                    
                    <?php
/*---------------------------Guarda los datos ingresados en los cajones en las variables------------------------------------------*/
                    if (isset($_POST['submit'])) {
                                         
                        $tipo_docide = ($_POST['tipo_docid']);  
                        $username =($_POST['ci']);
                        $first_name = ($_POST['first-name']);     /*first name es el nombre del cajon*/
                        $last_name = ($_POST['last-name']);
                        $fecha_ingreso = ($_POST['fecha_ing']);                                                                       //username
                        $role = $_POST['role'];
                        $dir = ($_POST['dir']);
                        $telef = ($_POST['telef']);
                        $email = ($_POST['email']);
                        $password =($_POST['password']);
                        $cdi = ($_POST['cdi']);
                        $estado_us_ni = ($_POST['estado_us_n']);
                        $periodo_academic = ($_POST['periodo_acad']);
                        $image = $_FILES['image']['name'];
                        $image_temp = $_FILES['image']['tmp_name'];
                        if($image == null){
                            $image='defecto.png';
                        }
                            if (empty($username)) {
                                $error = "Debe llenar el campo";
                            }else {
                                $check_query = "SELECT * FROM tbl_usuario WHERE ci = $username";
                                $check_run = mysqli_query($con, $check_query);                     
                                if (mysqli_num_rows($check_run) > 0) {
                                    $error = "Número de documento de identidad existente";
                                } else {
                        
                        //$password = crypt($password, $salt);
/*----------------------empty =vacio--------------------------*/
                      //  if (empty($first_name) or empty($last_name) or empty($username) or empty($email) or empty($password)) {   //username
                        //    $error = "Todos los (*) Campos son requeridos";
                        //} else {
                            $insert_query = "INSERT INTO `tbl_usuario` ( `id_usuario`,`id_docide`,`ci`,`apellidos`,`nombres`,`fecha_ingreso`,`tipo`,
                                            `direccion_dom`,`telefono`,`correo_e`,`contrasenia`,`id_cdi`, `id_periodo_usuario`, `estado_us`, `imagen_usuario`) 
                                            values('id_usuario','$tipo_docide','$username','$last_name','$first_name','$fecha_ingreso','$role','$dir',
                                            '$telef','$email','$password','$cdi', '$periodo_academic', '$estado_us_ni', '$image')";
                            if (mysqli_query($con, $insert_query)) {
                                $msg = "Usuario ingresado";
                               // $path="img/$image";

                                
                                //move_uploaded_file($image_temp, "img/$image"); /** Mueve un archivo subido a una nueva ubicación */
                                /*le edite*/
                                //move_uploaded_file($image_temp, $path);
                                /*aqui tb*/
                                //copy($path,"../$path");
                                //$msg = "Usuario ingresado";
                                //$first_name = "";
                                //$last_name = "";
                                //$email = "";
                                //$username = "";         //username
                                //header("Location: users.php"); /*para poder volver al blog o login*/
                            } else {
                                $error = "Usuario no ingresado";
                            }
                        }
                    }
                }
                    ?>
                    <div class="row">
                        <div class="col-md-8">
                            <form action="" method="post" enctype="multipart/form-data" autocomplete="off">


                                <div class="form-group">
                                    <?php
                                        if (isset($error)) {
                                            echo "<span style='color:red;' class='pull-right'>$error</span>";
                                        } else if (isset($msg)) {
                                            echo "<span style='color:green;' class='pull-right'>$msg</span>";
                                        }
                                    ?>
                                        <label for="role">Tipo de Documento de Identidad:</label>
                                        <select class="form-control" name="tipo_docid" id="tipo_docid" required>
                                        <option value="" >Seleccione</option>
                                        <?php
                                            $sql_tdocu = "select * from tbl_documento_identidad";
                                            $ejecutar = mysqli_query($con, $sql_tdocu);//ejecutar consulta
                                            
                                            if (mysqli_num_rows($ejecutar) > 0) {
                                                while ($row2 = mysqli_fetch_array($ejecutar)) {
                                                    
                                                    $detalledoc = $row2['detalle'];
                                                    $iddoc = $row2['id_docide'];
                                                    echo "<option value='" . $iddoc. "' " .  ">" . ($detalledoc) . "</option>";
                                                }
                                            } else {
                                            // echo "<center><h6>Categoría no disponible</h6></center>";
                                            }
                                        ?>
                                        </select>
                                </div>


                                <div class="form-group">
                                    <label for="username">Número de Documento de Identidad: (Sin guión)</label>    <!--username-->
                                    <input type="text" id="username" name="ci" class="form-control" maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57' placeholder="Ej:1234567890" required>    <!--username-->
                                </div>

                                <div class="form-group">
                                    <label for="Password">Contraseña: (Número documento de identidad):</label>
                                    <input type="text" id="password" name="password" class="form-control" placeholder="Contraseña" required maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                </div>

                             <!--   <div class="form-group">
                                    <label for="apellidos_us">Apellidos:</label>
                                    <input type="text" id="apellidos_us" name="apellidos_us" class="form-control" value="<?php
                                    
                                    ?>" placeholder="Apellidos">
                                </div>-->

                                <div class="form-group">
                                    <label >Apellidos:</label>
                                    <input name="last-name" class="form-control" value="<?php
                                    ?>" placeholder="Apellidos" required>
                                </div>

                                <div class="form-group">
                                    <label for="first-name">Nombres:</label>
                                    <input type="text" id="first-name" name="first-name" class="form-control" value="<?php
                                    ?>" placeholder="Nombres" required>
                                </div>
                       
                                <div class="form-group">
                                    <label for="date">Fecha de Ingreso :</label>  
                                    <input type="date"  name="fecha_ing" class="form-control" required>
                                </div>

                               
                                <div class="form-group">
                                <label for="role">Tipo de usuario :</label>
                                    <select class="form-control" name="role" id="role" required>
                                    <option value="" >Seleccione</option>
                                        <?php
                                            $sql_usuario_nom = "SELECT * FROM `tbl_usuario_nombre` WHERE id_usuario_nombre != 1 AND id_usuario_nombre != 4 AND id_usuario_nombre != 5 AND id_usuario_nombre != 2 AND id_usuario_nombre != 6 ";
                                            $ejecutar = mysqli_query($con, $sql_usuario_nom);//ejecutar consulta
                                            
                                            if (mysqli_num_rows($ejecutar) > 0) {
                                                while ($row2 = mysqli_fetch_array($ejecutar)) {
                                                    
                                                    $detalle_usu_perm = $row2['nivel_permisos'];
                                                    $detalle_usu_nombre = $row2['detalle'];
                                                    $id_usu_nombre = $row2['id_usuario_nombre'];
                                                    echo "<option value='" . $id_usu_nombre. "' " .  ">" . ($detalle_usu_nombre) . "</option>";
                                                }
                                            } else {
                                            // echo "<center><h6>Categoría no disponible</h6></center>";
                                            }
                                        ?>
                                    </select>
                                </div>

                                <input type="hidden" name="cdi" id = "cdi" value= 101>

<!--............................................estado........................................................-->

                                <input type="hidden" name="estado_us_n" class="form-control" value= "Activo">   
                                                                        
                                        

                                <div class="form-group">
                                    <label for="dir">Dirección:</label>
                                    <input type="text" id="dir" name="dir" class="form-control" value="<?php
                                    
                                    ?>" placeholder="Dirección" required>
                                    
                                </div>

                                <div class="form-group">
                                    <label for="telef">Teléfono:</label>
                                    <input type="text" id="telef" name="telef" class="form-control" maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="<?php
                                    
                                    ?>" placeholder="Teléfono" required>
                                </div>

                                <div class="form-group">
                                    <label for="email">Correo Electrónico:</label>
                                    <input type="text" id="email" name="email" class="form-control" value="" placeholder="Correo Electrónico" required>
                                </div>

                                <div class="form-group">
                                    <label for="periodo_acad">Período académico:</label>
                                    <select class="form-control" name="periodo_acad" id="periodo_acad" required>
                                    <option value="" >Seleccione</option>
                                        <?php
                                            $sql_periodo_ac = "SELECT * FROM `tbl_periodo` WHERE id_periodo ";
                                            $ejecutar = mysqli_query($con, $sql_periodo_ac);//ejecutar consulta
                                            if (mysqli_num_rows($ejecutar) > 0) {
                                                while ($row2 = mysqli_fetch_array($ejecutar)) {
                                                    
                                                    $periodo_ac_fin = $row2['fin'];
                                                    $periodo_ac_inicio = $row2['inicio'];
                                                    $id_periodo_ac = $row2['id_periodo'];
                                                    echo "<option value='" . $id_periodo_ac. "' " .  ">" . ("$periodo_ac_inicio $periodo_ac_fin") . "</option>";
                                                }
                                            } else {
                                            // echo "<center><h6>Categoría no disponible</h6></center>";
                                            }
                                        ?>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for="image">Fotografía:</label>
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