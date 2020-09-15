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
    $edit_query = "SELECT * FROM tbl_usuario WHERE id_usuario = $edit_id";
    $edit_query_run = mysqli_query($con, $edit_query);
   // if (mysqli_num_rows($edit_query_run) > 0) {/*if numero de filas es mayor q 0*/
        $edit_row = mysqli_fetch_array($edit_query_run);//fetch array sirve para que tu atrapestoda la fila de una table... fetch assoc.
        //$row = mysqli_fetch_array($run)
        $tipo_docum = $edit_row['id_docide'];
        $ci=$edit_row['ci'];
        $apellidos=$edit_row['apellidos'];
        $nombre = $edit_row['nombres'];
        $fecha_ing = $edit_row['fecha_ingreso'];
        $tipo = $edit_row['tipo'];
        $direccion = $edit_row['direccion_dom'];
        $correo = $edit_row ['correo_e'];
        $telefono = $edit_row['telefono'];
        $contrasenia = $edit_row['contrasenia'];
        $id_cdi = $edit_row['id_cdi'];
        
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
                    <h1><i class="fa fa-user-plus"></i> Editar<small> Usuario</small></h1><hr>
                    <ol class="breadcrumb">
                         <li><a href="index.php"><i class="fas fa-home"></i> Menú</a></li>
                        <li class="active"><i class="fa fa-user-plus"></i> Nuevo Usuario</li>
                    </ol>
                    <?php
                    if (isset($_POST['submit'])) {//si se ha presionado el boton subbmit
                        //$date = time();
                        $tipo_docide = ($_POST['tipo_docid']);
                        $first_name = ( $_POST['first-name']);
                        $last_name = ( $_POST['last-name']);
                        $username = ( $_POST['ci']);
                        $fecha_ingreso = ($_POST['fecha_ing']);
                        $password = ( $_POST['password']);
                        $role = ($_POST['role']);
                        $email = ($_POST['email']);
                        $telef = ($_POST['telef']);
                        $dir = ($_POST['dir']);
                        $cdi = ($_POST['cdi']);

                        echo($tipo_docide.$first_name.$last_name.$username.$fecha_ingreso.$password.$role.$email.$telef.$dir.$cdi);


                        $consulta="update tbl_usuario set id_docide='$tipo_docide', ci='$username',apellidos='$last_name',nombres='$first_name', fecha_ingreso='$fecha_ingreso', tipo='$role',correo_e='$email',direccion_dom='$dir',telefono='$telef',contrasenia='$password',id_cdi='$cdi' where id_usuario = '$edit_id'";
                        $ejecutar = mysqli_query($con, $consulta);//ejecutar consulta
                        header("location: users.php");
                        
                        
                        //$password = crypt($password, $salt);

                       
                    }
                    ?>
                    <div class="row">
                        <div class="col-md-8">
                            <form action="" method="post" enctype="multipart/form-data">
                             

                                <div class="form-group">
                                    <label for="role">Tipo de Documento de Identidad:</label>
                                    <select class="form-control" name="tipo_docid" id="categories">
                                    
                                      <?php
                                        

                                        $sql_tdocu = "select * from tbl_documento_identidad ";
                                        $ejecutar = mysqli_query($con, $sql_tdocu);//ejecutar consulta
                                        $sql_llenartdocumento = "SELECT tbl_usuario.id_docide,tbl_documento_identidad.detalle FROM tbl_usuario INNER JOIN tbl_documento_identidad ON tbl_usuario.id_docide = tbl_documento_identidad.id_docide Where id_usuario = $edit_id";
                                        $ejecutar2 = mysqli_query($con, $sql_llenartdocumento);
                                        $row3 = mysqli_fetch_array($ejecutar2);
                                        $idlltdoc=$row3['id_docide'];
                                            $detallelltdoc=$row3['detalle'];
                                            echo "<option value='" . $idlltdoc. "' " .  " selected>" . ($detallelltdoc) . "</option>";

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
                                    <label for="username">Número de documento de identidad:</label>
                                    <input type="text" id="username" name="ci" class="form-control" value="<?php echo($ci);
                                    
                                    ?>" >
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
                                    <input type="text" id="first-name" name="first-name" class="form-control" value="<?php echo($nombre);   
                                    if (isset($first_name)) {
                                        echo $first_name;
                                    }
                                    ?>">
                                </div>

                                <div class="form-group">
                                    <label for="last-name">Apellidos:</label>
                                    <input type="text" id="last-name" name="last-name" class="form-control" value="<?php echo($apellidos);
                                    if (isset($last_name)) {
                                        echo $last_name;
                                    }
                                    ?>" >
                                </div>

                                
                                <div class="form-group">
                                    <label for="date">Fecha de Ingreso :</label>  
                                    <input type="date"  name="fecha_ing" class="form-control" value="<?php echo($fecha_ing);?>">
                                </div>


                                <div class="form-group">
                                    <label for="Password">Password:</label>
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Password" value="<?php echo($contrasenia);?>"> 
                                </div>

                                <div class="form-group">
                                    <label for="role">Rol:</label>
                                    <select name="role" id="role" class="form-control" value="<?php echo($tipo); ?>" >
                                        <option value="Parvulario">Parvulario</option>
                                        
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
                                    <select class="form-control" name="cdi" id="categories">

  
   


                            <?php
                            $sql_cdi = "select * from tbl_cdi";
                            $ejecutar = mysqli_query($con, $sql_cdi);//ejecutar consulta
                            
                            if (mysqli_num_rows($ejecutar) > 0) {
                                while ($row2 = mysqli_fetch_array($ejecutar)) {
                                    
                                    $cdi = $row2['nombre'];
                                    $idcdi = $row2['id'];
                                    echo "<option value='" . $idcdi. "' " .  ">" . ($cdi) . "</option>";
                                }
                            } else {
                                echo "<center><h6>Categoría no disponible</h6></center>";
                            }
                            ?>
                        </select>
                                </div>
                                

                                

                                

                                <!--<div class="form-group">
                                    <label for="image">Foto de perfil :*</label>
                                    <input type="file" id="image" name="image">
                                </div>-->

                                <input type="submit" value="Terminar Edición" name="submit" class="btn btn-primary">
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
                    