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
        $del_query = "DELETE FROM tbl_tipo_pared WHERE id_tipo_pared = '$del_id'";
        if (mysqli_query($con, $del_query)) {
            $del_msg = "Nombre del  tipo de pared ha sido eliminado";
        } else {
            $del_error = "Nombre del  tipo de pared no ha sido eliminado";
        }
    }
}

if (isset($_POST['submit'])) {
    $cat_name = mysqli_real_escape_string($con, strtolower($_POST['cat-name']));

    if (empty($cat_name)) {
        $error = "Debe llenar el campo";
    } else {
        $check_query = "SELECT * FROM tbl_tipo_pared WHERE detalle = '$cat_name'";
        $check_run = mysqli_query($con, $check_query);
        if (mysqli_num_rows($check_run) > 0) {
            $error = "Nombre del  tipo de pared ya existe";
        } else {
            $insert_query = "INSERT INTO tbl_tipo_pared (detalle) VALUES ('$cat_name')";
            if (mysqli_query($con, $insert_query)) {
                $msg = "Nombre del  tipo de pared ha sido agregado";
            } else {
                $error = "Nombre del  tipo de pared no ha sido agregado";
            }
        }
    }
}

if (isset($_POST['update'])) {
    $cat_name = mysqli_real_escape_string($con, strtolower($_POST['cat-name']));

    if (empty($cat_name)) {
        $up_error = "Debe llenar este campo";
    } else {
        $check_query = "SELECT * FROM tbl_tipo_pared WHERE detalle = '$cat_name'";
        $check_run = mysqli_query($con, $check_query);
        if (mysqli_num_rows($check_run) > 0) {
            $up_error = "Nombre del  tipo de pared ya existe";
        } else {
            $update_query = "UPDATE `tbl_tipo_pared` SET `detalle` = '$cat_name' WHERE `tbl_tipo_pared`.`id_tipo_pared` = $edit_id";
            if (mysqli_query($con, $update_query)) {
                $up_msg = "Nombre del  tipo de pared ha sido modificada";
            } else {
                $up_error = "Nombre del  tipo de pared no ha sido modificada";
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
                    <h1><i class="fas fa-th"></i> Tipo de pared </h1><hr>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fas fa-home"></i> Menú</a></li>
                        <li><a href="menuprincipalprocesos.php"><i class="fa fa-list-ul"></i> Lista de Procesos</a></li>
                        
                    </ol>

                    <div class="row">
                        <div class="col-md-6">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="detalle">Nombre del tipo de pared:</label>
                                    <?php
                                    if (isset($msg)) {
                                        echo "<span class='pull-right' style='color:green;'>$msg</span>";
                                    } else if (isset($error)) {
                                        echo "<span class='pull-right' style='color:red;'>$error</span>";
                                    }
                                    ?>
                                    <input type="text" placeholder="Nombre del tipo de pared" class="form-control" name="cat-name">
                                </div>
                                <input type="submit" value="Agregar" name="submit" class="btn btn-primary">
                                <a href="menuprincipalprocesos.php">
                                <button type="button" class="btn btn-primary">Cancelar</button>
                                </a>
                                
                            </form>
                            <?php
                            if (isset($_GET['edit'])) {
                                $edit_check_query = "SELECT * FROM tbl_tipo_pared WHERE id_tipo_pared = $edit_id";
                                $edit_check_run = mysqli_query($con, $edit_check_query);
                                if (mysqli_num_rows($edit_check_run) > 0) {

                                    $edit_row = mysqli_fetch_array($edit_check_run);
                                    $up_category = $edit_row['detalle'];
                                    ?>
                                    <hr>

                                    <form action="" method="post">
                                        <div class="form-group">
                                            <label for="tbl_tipo_pared">Actualizar nombre del tipo de pared:</label>
                                            <?php
                                            if (isset($up_msg)) {
                                                echo "<span class='pull-right' style='color:green;'>$up_msg</span>";
                                            } else if (isset($up_error)) {
                                                echo "<span class='pull-right' style='color:red;'>$up_error</span>";
                                            }
                                            ?>
                                            <input type="text" value="<?php echo $up_category; ?>" placeholder="Nombre del tipo de pared" class="form-control" name="cat-name">
                                        </div>
                                        <input type="submit" value="Actualizar" name="update" class="btn btn-primary">
                                       
                                        <a href="protipopared.php">
                                        <button type="button" class="btn btn-primary">Cerrar</button>
                                        </a>

                                        <a href="protipopared.php">
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
                            $get_query = "SELECT * FROM tbl_tipo_pared ORDER BY id_tipo_pared DESC";
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
                                            <th>Nombre del tipo de pared</th>
                                            <th>Editar</th>
                                            <th>Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($get_row = mysqli_fetch_array($get_run)) {
                                            $tipopared_id = $get_row['id_tipo_pared'];
                                            $detalletpared_name = $get_row['detalle'];
                                            ?>
                                            <tr>
                                                <td><?php echo $tipopared_id; ?></td>
                                                <td><?php echo ucfirst($detalletpared_name); ?></td>
                                                <td><a href="protipopared.php?edit=<?php echo $tipopared_id; ?>"><i class="far fa-edit"></i></a></td>
                                                <td><a href="protipopared.php?del=<?php echo $tipopared_id; ?>"><i class="fas fa-trash-alt"></i></a></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <?php
                            } else {
                                echo "<center><h3>No se encontró lista del tipo de pared</h3></center>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php require_once('inc/footer.php'); ?>