<?php
require_once('inc/top.php');
/*if (!isset($_SESSION['username'])) {
    header('Location: login.php');
} else if (isset($_SESSION['username']) && $_SESSION['role'] == 'author') {
    header('Location: index.php');
}*/

if (isset($_GET['edit'])) {
    $edit_id = $_GET['edit'];
}

if (isset($_GET['del'])) {
    $del_id = $_GET['del'];

    echo($_SESSION['roleSS']);
    if ( $_SESSION['roleSS'] == 'Coordinador') {
        $del_query = "DELETE FROM tbl_cdi WHERE id = '$del_id'";
        if (mysqli_query($con, $del_query)) {
            $del_msg = "CDI ha sido eliminado";
        } else {
            $del_error = "CDI no ha sido eliminado";
        }
    }
}

if (isset($_POST['submit'])) {
    $cat_name = mysqli_real_escape_string($con, strtolower($_POST['cat-name']));
    $cat_dir = mysqli_real_escape_string($con, strtolower($_POST['cat-dir']));
    $cat_telef = mysqli_real_escape_string($con, strtolower($_POST['cat-telef']));
    

    if (empty($cat_name)) {
        $error = "Debe llenar el campo";
    } else {
        $check_query = "SELECT * FROM tbl_cdi WHERE nombre = '$cat_name'";
        $check_run = mysqli_query($con, $check_query);
        if (mysqli_num_rows($check_run) > 0) {
            $error = "CDI ya existe";
        } else {
            $insert_query = "INSERT INTO tbl_cdi (nombre, direccion, telefono) VALUES ('$cat_name','$cat_dir','$cat_telef')";
            if (mysqli_query($con, $insert_query)) {
                $msg = "CDI ha sido agregado";
            } else {
                $error = "CDI no ha sido agregado";
            }
        }
    }
}

if (isset($_POST['update'])) {
    $cat_name = mysqli_real_escape_string($con, strtolower($_POST['cat-name']));
    $cat_dir = mysqli_real_escape_string($con, strtolower($_POST['cat-dir']));
    $cat_telef = mysqli_real_escape_string($con, strtolower($_POST['cat-telef']));
    

    if (empty($cat_name)) {
        $up_error = "Debe llenar este campo";
    } else {
        $check_query = "SELECT * FROM tbl_cdi WHERE nombre = '$cat_name'";
        $check_run = mysqli_query($con, $check_query);
        if (mysqli_num_rows($check_run) > 1) {
            $up_error = "CDI ya existe";
        } else {
            $update_query = "UPDATE `tbl_cdi` SET `nombre` = '$cat_name',`direccion` = '$cat_dir',`telefono` = '$cat_telef'  WHERE `tbl_cdi`.`id` = $edit_id";
            if (mysqli_query($con, $update_query)) {
                $up_msg = "CDI ha sido modificado";
            } else {
                $up_error = "CDI no ha sido modificado";
            }
        }
    }
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
                    <h1><i class="fas fa-university"></i> CDI </h1><hr>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fas fa-home"></i> Menú</a></li>
                        <li><a href="menuprincipalprocesos.php"><i class="fa fa-list-ul"></i> Lista de Procesos</a></li>
                        
                    </ol>

                    <div class="row">
                        <div class="col-md-6">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="nombre">Nombre del Centro de Desarrollo Infantil:</label>
                                    <?php
                                    if (isset($msg)) {
                                        echo "<span class='pull-right' style='color:green;'>$msg</span>";
                                    } else if (isset($error)) {
                                        echo "<span class='pull-right' style='color:red;'>$error</span>";
                                    }
                                    ?>
                                    <input type="text" placeholder="Nombre del Centro de Desarrollo Infantil" class="form-control" name="cat-name">
                                </div>

                                <div class="form-group">
                                    <label for="cat-dir">Dirección:</label>
                                    <input type="text" id="cat-dir" name="cat-dir" class="form-control" value="<?php
                                    ?>" placeholder="Dirección">
                                </div>

                                <div class="form-group">
                                    <label for="cat-telef">Teléfono:</label>
                                    <input type="text" id="cat-telef" name="cat-telef" class="form-control" maxlength="10" value="<?php
                                    ?>" placeholder="Teléfono">
                                </div>

                                <input type="submit" value="Agregar" name="submit" class="btn btn-primary">
                                <a href="menuprincipalprocesos.php">
                                <button type="button" class="btn btn-primary">Cancelar</button>
                                </a>


                                
                            </form>
                            <?php
                            if (isset($_GET['edit'])) {
                                $edit_check_query = "SELECT * FROM tbl_cdi WHERE id = $edit_id";
                                $edit_check_run = mysqli_query($con, $edit_check_query);
                                if (mysqli_num_rows($edit_check_run) > 0) {

                                    $edit_row = mysqli_fetch_array($edit_check_run);
                                    $up_nombrecdi = $edit_row['nombre'];
                                    $up_direccioncdi = $edit_row['direccion'];
                                    $up_telefonocdi = $edit_row['telefono'];
                                    ?>
                                    <hr>

                                    <form action="" method="post">
                                        <div class="form-group">
                                            <label for="nombre">Actualizar nombre del Centro de Desarrollo Infantil:</label>
                                            <?php
                                            if (isset($up_msg)) {
                                                echo "<span class='pull-right' style='color:green;'>$up_msg</span>";
                                            } else if (isset($up_error)) {
                                                echo "<span class='pull-right' style='color:red;'>$up_error</span>";
                                            }
                                            ?>
                                            <input type="text" value="<?php echo $up_nombrecdi; ?>" placeholder="Nombre del Centro de Desarrollo Infantil" class="form-control" name="cat-name">
                                        </div>

                                        <div class="form-group">
                                            <label for="cat-dir">Actualizar dirección:</label>
                                            <input type="text" id="cat-dir" name="cat-dir" class="form-control" value="<?php echo $up_direccioncdi;
                                            ?>" placeholder="Dirección">
                                        </div>

                                        <div class="form-group">
                                            <label for="cat-telef">Actualizar teléfono:</label>
                                            <input type="text" id="cat-telef" name="cat-telef" class="form-control" maxlength="10" value="<?php echo $up_telefonocdi;
                                            ?>" placeholder="Teléfono">
                                        </div>


                                        <input type="submit" value="Actualizar" name="update" class="btn btn-primary">
                                       
                                        <a href="procdi.php">
                                        <button type="button" class="btn btn-primary">Cerrar</button>
                                        </a>

                                        <a href="procdi.php">
                                        <button type="button" class="btn btn-primary">Cancelar</button>
                                        </a>
                                    </form>

                                    <?php
                                }
                            }
                            ?>
                        </div>
                        <div class="col-md-6"><br>
                            <?php
                            $get_query = "SELECT * FROM tbl_cdi ORDER BY id DESC";
                            $get_run = mysqli_query($con, $get_query);
                            if (mysqli_num_rows($get_run) > 0) {

                                if (isset($del_msg)) {
                                    echo "<span class='pull-right' style='color:green;'>$del_msg</span>";
                                } else if (isset($del_error)) {
                                    echo "<span class='pull-right' style='color:red;'>$del_error</span>";
                                }
                                ?>


                                <table class="table table-hover table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Número</th>
                                            <th>Nombre</th>
                                            <th>Dirección</th>
                                            <th>Teléfono</th>
                                            <th>Editar</th>
                                            <th>Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($get_row = mysqli_fetch_array($get_run)) {
                                            $cdi_id = $get_row['id'];
                                            $nombre_cdi = $get_row['nombre'];
                                            $direc_cdi = $get_row['direccion'];
                                            $telefono_cdi = $get_row['telefono'];
                                            ?>
                                            <tr>
                                                <td><?php echo $cdi_id; ?></td>
                                                <td><?php echo ucfirst($nombre_cdi); ?></td>
                                                <td><?php echo ucfirst($direc_cdi); ?></td>
                                                <td><?php echo ucfirst($telefono_cdi); ?></td>
                                                <td><a href="procdi.php?edit=<?php echo $cdi_id; ?>"><i class="far fa-edit"></i></a></td>
                                                <td><a href="procdi.php?del=<?php echo $cdi_id; ?>"><i class="fas fa-trash-alt"></i></a></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <?php
                            } else {
                                echo "<center><h3>No se encontró lista de Centros de Desarrollo Infantil</h3></center>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php require_once('inc/footer.php'); ?>