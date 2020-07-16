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
        $del_query = "DELETE FROM tbl_alimentos WHERE id_alimentos = '$del_id'";
        if (mysqli_query($con, $del_query)) {
            $del_msg = "Alimento ha sido eliminado";
        } else {
            $del_error = "Alimento no ha sido eliminado";
        }
    }
}

if (isset($_POST['submit'])) {
    $cat_name = mysqli_real_escape_string($con, strtolower($_POST['cat-name']));

    if (empty($cat_name)) {
        $error = "Debe llenar el campo";
    } else {
        $check_query = "SELECT * FROM tbl_alimentos WHERE detalle = '$cat_name'";
        $check_run = mysqli_query($con, $check_query);
        if (mysqli_num_rows($check_run) > 0) {
            $error = "Alimento ya existe";
        } else {
            $insert_query = "INSERT INTO tbl_alimentos (detalle) VALUES ('$cat_name')";
            if (mysqli_query($con, $insert_query)) {
                $msg = "Alimento ha sido agregada";
            } else {
                $error = "Alimento No ha sido agregada";
            }
        }
    }
}

if (isset($_POST['update'])) {
    $cat_name = mysqli_real_escape_string($con, strtolower($_POST['cat-name']));

    if (empty($cat_name)) {
        $up_error = "Debe llenar este campo";
    } else {
        $check_query = "SELECT * FROM tbl_alimentos WHERE detalle = '$cat_name'";
        $check_run = mysqli_query($con, $check_query);
        if (mysqli_num_rows($check_run) > 0) {
            $up_error = "Alimento ya existe";
        } else {
            $update_query = "UPDATE `tbl_alimentos` SET `detalle` = '$cat_name' WHERE `tbl_alimentos`.`id_alimentos` = $edit_id";
            if (mysqli_query($con, $update_query)) {
                $up_msg = "Alimento ha sido agregada";
            } else {
                $up_error = "Alimento no ha sido agregada";
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
                    <h1><i class="fas fa-apple-alt"></i> Alimentos </h1><hr>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fas fa-home"></i> Menú</a></li>
                        <li><a href="menuprincipalprocesos.php"><i class="fa fa-list-ul"></i> Lista de Procesos</a></li>
                        
                    </ol>

                    <div class="row">
                        <div class="col-md-6">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="category">Categoría:</label>
                                    <?php
                                    if (isset($msg)) {
                                        echo "<span class='pull-right' style='color:green;'>$msg</span>";
                                    } else if (isset($error)) {
                                        echo "<span class='pull-right' style='color:red;'>$error</span>";
                                    }
                                    ?>
                                    <input type="text" placeholder="Nombre de Categoría" class="form-control" name="cat-name">
                                </div>
                                <input type="submit" value="Agregar Nueva" name="submit" class="btn btn-primary">
                            </form>
                            <?php
                            if (isset($_GET['edit'])) {
                                $edit_check_query = "SELECT * FROM tbl_desc_evento WHERE id_descevento = $edit_id";
                                $edit_check_run = mysqli_query($con, $edit_check_query);
                                if (mysqli_num_rows($edit_check_run) > 0) {

                                    $edit_row = mysqli_fetch_array($edit_check_run);
                                    $up_category = $edit_row['category'];
                                    ?>
                                    <hr>

                                    <form action="" method="post">
                                        <div class="form-group">
                                            <label for="category">Actualizar Categoría:</label>
                                            <?php
                                            if (isset($up_msg)) {
                                                echo "<span class='pull-right' style='color:green;'>$up_msg</span>";
                                            } else if (isset($up_error)) {
                                                echo "<span class='pull-right' style='color:red;'>$up_error</span>";
                                            }
                                            ?>
                                            <input type="text" value="<?php echo $up_category; ?>" placeholder="Nombre de Categoria" class="form-control" name="cat-name">
                                        </div>
                                        <input type="submit" value="Actualizar Categoría" name="update" class="btn btn-primary">
                                    </form>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                        <div class="col-md-6"><br>
                            <?php
                            $get_query = "SELECT * FROM tbl_desc_evento ORDER BY id_descevento DESC";
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
                                            <th>Id #</th>
                                            <th>Nombre de Categoría</th>
                                            <th>Editar</th>
                                            <th>Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($get_row = mysqli_fetch_array($get_run)) {
                                            $category_id = $get_row['id_descevento'];
                                            $category_name = $get_row['descripcion'];
                                            ?>
                                            <tr>
                                                <td><?php echo $category_id; ?></td>
                                                <td><?php echo ucfirst($category_name); ?></td>
                                                <td><a href="categories.php?edit=<?php echo $category_id; ?>"><i class="far fa-edit"></i></a></td>
                                                <td><a href="categories.php?del=<?php echo $category_id; ?>"><i class="fas fa-trash-alt"></i></a></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <?php
                            } else {
                                echo "<center><h3>No se encontraron categorías</h3></center>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php require_once('inc/footer.php'); ?>