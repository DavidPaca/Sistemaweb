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
        $del_query = "DELETE FROM tbl_niveles_estudio_ninio WHERE id_niveles_ninio = '$del_id'";
        if (mysqli_query($con, $del_query)) {
            $del_msg = "Nivel ha sido eliminado";
        } else {
            $del_error = "Nivel no ha sido eliminado";
        }
    }
}

if (isset($_POST['submit'])) {
    $nivel_ninio = mysqli_real_escape_string($con, ($_POST['cat-name']));

    if (empty($nivel_ninio)) {
        $error = "Debe llenar el campo";
    } else {
        $check_query = "SELECT * FROM tbl_niveles_estudio_ninio WHERE detalle = '$nivel_ninio'";
        $check_run = mysqli_query($con, $check_query);
        if (mysqli_num_rows($check_run) > 0) {
            $error = "Nivel ya existe";
        } else {
            $insert_query = "INSERT INTO tbl_niveles_estudio_ninio (detalle) VALUES ('$nivel_ninio')";
            if (mysqli_query($con, $insert_query)) {
                $msg = "Nivel ha sido agregado";
            } else {
                $error = "Nivel no ha sido agregado";
            }
        }
    }
}

if (isset($_POST['update'])) {
    $nivel_ninio = mysqli_real_escape_string($con, ($_POST['cat-name']));

    if (empty($nivel_ninio)) {
        $up_error = "Debe llenar este campo";
    } else {
        $check_query = "SELECT * FROM tbl_niveles_estudio_ninio WHERE detalle = '$nivel_ninio'";
        $check_run = mysqli_query($con, $check_query);
        if (mysqli_num_rows($check_run) > 0) {
            $up_error = "Nivel ya existe";
        } else {
            $update_query = "UPDATE `tbl_niveles_estudio_ninio` SET `detalle` = '$nivel_ninio' WHERE `tbl_niveles_estudio_ninio`.`id_niveles_ninio` = $edit_id";
            if (mysqli_query($con, $update_query)) {
                $up_msg = "Nivel ha sido agregado";
            } else {
                $up_error = "Nivel no ha sido agregado";
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
                    <h1><i class="fas fa-pills"></i> Niveles </h1><hr>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fas fa-home"></i> Menú</a></li>
                        <li><a href="menuprincipalprocesos.php"><i class="fa fa-list-ul"></i> Lista de Procesos</a></li>
                        
                    </ol>

                    <div class="row">
                        <div class="col-md-6">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="detalle">Nivel:</label>
                                    <?php
                                    if (isset($msg)) {
                                        echo "<span class='pull-right' style='color:green;'>$msg</span>";
                                    } else if (isset($error)) {
                                        echo "<span class='pull-right' style='color:red;'>$error</span>";
                                    }
                                    ?>
                                    <input type="text" placeholder="Nombre del medicamento" class="form-control" name="cat-name">
                                </div>
                                <input type="submit" value="Agregar" name="submit" class="btn btn-primary">
                                <a href="menuprincipalprocesos.php">
                                <button type="button" class="btn btn-primary">Cancelar</button>
                                </a>
                                
                            </form>
                            <?php
                            if (isset($_GET['edit'])) {
                                $edit_check_query = "SELECT * FROM tbl_niveles_estudio_ninio WHERE id_niveles_ninio = $edit_id";
                                $edit_check_run = mysqli_query($con, $edit_check_query);
                                if (mysqli_num_rows($edit_check_run) > 0) {

                                    $edit_row = mysqli_fetch_array($edit_check_run);
                                    $up_category = $edit_row['detalle'];
                                    ?>
                                    <hr>

                                    <form action="" method="post">
                                        <div class="form-group">
                                            <label for="tbl_niveles_estudio_ninio">Actualizar nombre del medicamento:</label>
                                            <?php
                                            if (isset($up_msg)) {
                                                echo "<span class='pull-right' style='color:green;'>$up_msg</span>";
                                            } else if (isset($up_error)) {
                                                echo "<span class='pull-right' style='color:red;'>$up_error</span>";
                                            }
                                            ?>
                                            <input type="text" value="<?php echo $up_category; ?>" placeholder="Nombre del medicamento" class="form-control" name="cat-name">
                                        </div>
                                        <input type="submit" value="Actualizar" name="update" class="btn btn-primary">
                                       
                                        <a href="pronivelninio.php">
                                        <button type="button" class="btn btn-primary">Cerrar</button>
                                        </a>

                                        <a href="pronivelninio.php">
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
                            $get_query = "SELECT * FROM tbl_niveles_estudio_ninio ORDER BY id_niveles_ninio DESC";
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
                                            <th>Nivel</th>
                                            <th>Editar</th>
                                            <th>Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($get_row = mysqli_fetch_array($get_run)) {
                                            $nivel_id = $get_row['id_niveles_ninio'];
                                            $detallnivel_name = $get_row['detalle'];
                                            ?>
                                            <tr>
                                                <td><?php echo $nivel_id; ?></td>
                                                <td><?php echo ucfirst($detallnivel_name); ?></td>
                                                <td><a href="pronivelninio.php?edit=<?php echo $nivel_id; ?>"><i class="far fa-edit"></i></a></td>
                                                <td><a href="pronivelninio.php?del=<?php echo $nivel_id; ?>"><i class="fas fa-trash-alt"></i></a></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <?php
                            } else {
                                echo "<center><h3>No existen niveles</h3></center>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php require_once('inc/footer.php'); ?>