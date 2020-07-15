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
        $del_query = "DELETE FROM tbl_documento_identidad WHERE id_docide = '$del_id'";
        if (mysqli_query($con, $del_query)) {
            $del_msg = "Tipo de Documento ha sido eliminado";
        } else {
            $del_error = "Tipo de Documento no ha sido eliminado";
        }
    }
}

if (isset($_POST['submit'])) {
    $doc_name = mysqli_real_escape_string($con, strtolower($_POST['cat-name']));
     echo $doc_name;
    if (empty($doc_name)) {
        $error = "Debe llenar el campo";
    } else {
        $check_query = "SELECT * FROM tbl_documento_identidad WHERE detalle = '$doc_name'";
        $check_run = mysqli_query($con, $check_query);
        if (mysqli_num_rows($check_run) > 0) {
            $error = "Documento ya existe";
        } else {
            $insert_query = "INSERT INTO tbl_documento_identidad (detalle) VALUES ('$doc_name')";
            if (mysqli_query($con, $insert_query)) {
                $msg = "Agregado";
            } else {
                $error = "No ha sido agregado";
            }
        }
    }
}

if (isset($_POST['update'])) {
    $doc_name = mysqli_real_escape_string($con, strtolower($_POST['cat-name']));

    if (empty($doc_name)) {
        $up_error = "Debe llenar este campo";
    } else {
        $check_query = "SELECT * FROM tbl_documento_identidad WHERE detalle = '$doc_name'";
        $check_run = mysqli_query($con, $check_query);
        if (mysqli_num_rows($check_run) > 0) {
            $up_error = "Documento de Identidad ya existe";
        } else {
            $update_query = "UPDATE `tbl_documento_identidad` SET `detalle` = '$doc_name' WHERE `tbl_documento_identidad`.`id_docide` = $edit_id";
            if (mysqli_query($con, $update_query)) {
                $up_msg = "Tipo de Documento de Identidad ha sido agregada";
            } else {
                $up_error = "Tipo de Documento de Identidad no ha sido agregada";
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
                    <h1><i class="fa fa-id-card"></i> Documento de Identidad </h1><hr>
                    <ol class="breadcrumb">
                        <li><a href="index.html"><i class="fas fa-home"></i> Menú</a></li>
                        <li><a href="menuprincipalprocesos.php"><i class="fa fa-list-ul"></i> Lista de Procesos</a></li>
                        
                    </ol>

                    <div class="row">
                        <div class="col-md-6">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="detalle">Tipo de Documento de Identificación:</label>
                                    <?php
                                    if (isset($msg)) {
                                        echo "<span class='pull-right' style='color:green;'>$msg</span>";
                                    } else if (isset($error)) {
                                        echo "<span class='pull-right' style='color:red;'>$error</span>";
                                    }
                                    ?>
                                    <input type="text" placeholder="Nombre de Documento de Identidad" class="form-control" name="cat-name">
                                </div>
                                <input type="submit" value="Agregar" name="submit" class="btn btn-primary">
                            </form>
                            <?php
                            if (isset($_GET['edit'])) {
                                $edit_check_query = "SELECT * FROM tbl_documento_identidad WHERE id_docide = $edit_id";   //aqui era la tlb desc_evento - id_descevento
                                $edit_check_run = mysqli_query($con, $edit_check_query);
                                if (mysqli_num_rows($edit_check_run) > 0) {

                                    $edit_row = mysqli_fetch_array($edit_check_run);
                                    $up_documentoi = $edit_row['detalle'];
                                    ?>
                                    <hr>

                                    <form action="" method="post">
                                        <div class="form-group">
                                            <label for="tbl_documento_identidad">Actualizar Documento de Identidad:</label>
                                            <?php
                                            if (isset($up_msg)) {
                                                echo "<span class='pull-right' style='color:green;'>$up_msg</span>";
                                            } else if (isset($up_error)) {
                                                echo "<span class='pull-right' style='color:red;'>$up_error</span>";
                                            }
                                            ?>
                                            <input type="text" value="<?php echo $up_documentoi; ?>" placeholder="Nombre de Documento de Identidad" class="form-control" name="cat-name">
                                        </div>
                                        <input type="submit" value="Actualizar" name="update" class="btn btn-primary">
                                    </form>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                        <div class="col-md-6"><br>
                            <?php
                            $get_query = "SELECT * FROM tbl_documento_identidad ORDER BY id_docide DESC";     //aqui era la tlb desc_evento - id_descevento
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
                                            <th>Nombre del Documento de Identidad</th>
                                            <th>Editar</th>
                                            <th>Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($get_row = mysqli_fetch_array($get_run)) {
                                            $documento_id = $get_row['id_docide'];
                                            $documento_name = $get_row['detalle'];
                                            ?>
                                            <tr>
                                                <td><?php echo $documento_id; ?></td>
                                                <td><?php echo ucfirst($documento_name); ?></td>
                                                <td><a href="prodocumentoidentificacion.php?edit=<?php echo $documento_id; ?>"><i class="far fa-edit"></i></a></td>
                                                <td><a href="prodocumentoidentificacion.php?del=<?php echo $documento_id; ?>"><i class="fas fa-trash-alt"></i></a></td>
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