<?php
require_once('inc/top.php');
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}
/*} else if (isset($_SESSION['username']) && $_SESSION['role'] == 'author') {
    header('Location: index.php');
}*/
$tipo_user = $_SESSION['roleSS'];
//echo $tipo_user;

if (isset($_GET['edit'])) {
    $edit_id = $_GET['edit'];
}

$sql="SELECT * FROM `tbl_usuario_nombre` WHERE  id_usuario_nombre = $tipo_user;";
        
        $check_username_run = mysqli_query($con, $sql);//ejecutar consulta 
        $row = mysqli_fetch_array($check_username_run); //atratpa todos los valores de la fila
        $db_id_us_nivel = $row['id_usuario_nombre'];
        $db_detalle = $row['detalle'];
        $db_nivel_permisos = $row['nivel_permisos'];
 //echo $db_id_us_nivel;

if (isset($_GET['del'])) {
    $del_id = $_GET['del'];

//echo $del_id;
    
    if ( $db_id_us_nivel == $tipo_user) {
        $del_query = "DELETE FROM tbl_etnia WHERE id_etnia = '$del_id'";
        if (mysqli_query($con, $del_query)) {
            $del_msg = "Etnia ha sido eliminada";
        } else {
            $del_error = "Etnia no ha sido eliminada";
        }
    }
}

if (isset($_POST['submit'])) {
    $cat_name = ($_POST['cat-name']);

    if (empty($cat_name)) {
        $error = "Debe llenar el campo";
    } else {
        $check_query = "SELECT * FROM tbl_etnia WHERE detalle = '$cat_name'";
        $check_run = mysqli_query($con, $check_query);
        if (mysqli_num_rows($check_run) > 0) {
            $error = "Etnia ya existe";
        } else {
            $insert_query = "INSERT INTO tbl_etnia (detalle) VALUES ('$cat_name')";
            if (mysqli_query($con, $insert_query)) {
                $msg = "Etnia ha sido agregada";
            } else {
                $error = "Etnia no ha sido agregada";
            }
        }
    }
}

if (isset($_POST['update'])) {
    $cat_name = ($_POST['cat-name']);

    if (empty($cat_name)) {
        $up_error = "Debe llenar el campo";
    } else {
        $check_query = "SELECT * FROM tbl_etnia WHERE detalle = '$cat_name'";
        $check_run = mysqli_query($con, $check_query);
        if (mysqli_num_rows($check_run) > 0) {
            $up_error = "Etnia ya existe";
        } else {
            $update_query = "UPDATE `tbl_etnia` SET `detalle` = '$cat_name' WHERE `tbl_etnia`.`id_etnia` = $edit_id";
            if (mysqli_query($con, $update_query)) {
                $up_msg = "Etnia ha sido agregada";
            } else {
                $up_error = "Etnia no ha sido agregada";
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
                    <h1><i class="fas fa-id-card-alt"></i> Etnia </h1><hr>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fas fa-home"></i> Menú</a></li>
                        <li><a href="menuprincipalprocesos.php"><i class="fa fa-list-ul"></i> Lista de Procesos</a></li>
                        
                    </ol>

                    <div class="row">
                        <div class="col-md-6">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="detalle">Nombre de etnia:</label>
                                    <?php
                                    if (isset($msg)) {
                                        echo "<span class='pull-right' style='color:green;'>$msg</span>";
                                    } else if (isset($error)) {
                                        echo "<span class='pull-right' style='color:red;'>$error</span>";
                                    }
                                    ?>
                                    <input type="text" placeholder="Nombre de etnia" class="form-control" name="cat-name">
                                </div>
                                <input type="submit" value="Agregar" name="submit" class="btn btn-primary">
                                <a href="menuprincipalprocesos.php">
                                <button type="button" class="btn btn-primary">Cancelar</button>
                                </a>
                                
                            </form>
                            <?php
                            if (isset($_GET['edit'])) {
                                $edit_check_query = "SELECT * FROM tbl_etnia WHERE id_etnia = $edit_id";
                                $edit_check_run = mysqli_query($con, $edit_check_query);
                                if (mysqli_num_rows($edit_check_run) > 0) {

                                    $edit_row = mysqli_fetch_array($edit_check_run);
                                    $up_category = $edit_row['detalle'];
                                    ?>
                                    <hr>

                                    <form action="" method="post">
                                        <div class="form-group">
                                            <label for="tbl_etnia">Actualizar nombre de etnia:</label>
                                            <?php
                                            if (isset($up_msg)) {
                                                echo "<span class='pull-right' style='color:green;'>$up_msg</span>";
                                            } else if (isset($up_error)) {
                                                echo "<span class='pull-right' style='color:red;'>$up_error</span>";
                                            }
                                            ?>
                                            <input type="text" value="<?php echo $up_category; ?>" placeholder="Nombre de etnia" class="form-control" name="cat-name">
                                        </div>
                                        <input type="submit" value="Actualizar" name="update" class="btn btn-primary">
                                       
                                        <a href="proetnia.php">
                                        <button type="button" class="btn btn-primary">Cerrar</button>
                                        </a>

                                        <a href="proetnia.php">
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
                            $get_query = "SELECT * FROM tbl_etnia ORDER BY detalle ASC";
                            $get_run = mysqli_query($con, $get_query);
                            if (mysqli_num_rows($get_run) > 0) {

                                if (isset($del_msg)) {
                                    echo "<span class='pull-right' style='color:green;'>$del_msg</span>";
                                } else if (isset($del_error)) {
                                    echo "<span class='pull-right' style='color:red;'>$del_error</span>";
                                }
                                ?>


                                <table class="table table-bordered table-striped table-hover" id="example" >
                                    <thead>
                                        <tr>
                                            <th>Número</th>
                                            <th>Nombre de Etnia</th>
                                            <th>Editar</th>
                                            <th>Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $cont=0;
                                        while ($get_row = mysqli_fetch_array($get_run)) {
                                            $cont++;
                                            $etnia_id = $get_row['id_etnia'];
                                            $detalleetnia_name = $get_row['detalle'];
                                            ?>
                                            <tr>
                                                <td><?php echo $cont; ?></td>
                                                <td><?php echo ($detalleetnia_name); ?></td>
                                                <td><a href="proetnia.php?edit=<?php echo $etnia_id; ?>"><i class="far fa-edit"></i></a></td>
                                                <td><a href="proetnia.php?del=<?php echo $etnia_id; ?>" onclick="return confirm('¿Desea Borrar?');"><i class="fas fa-trash-alt"></i></a></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <?php
                            } else {
                                echo "<center><h3>No se encontró lista de alergias</h3></center>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php require_once('inc/footer.php'); ?>