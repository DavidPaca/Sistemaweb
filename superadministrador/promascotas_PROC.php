<?php
require_once('inc/top.php');
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}
/*} else if (isset($_SESSION['username']) && $_SESSION['role'] == 'author') {
    header('Location: index.php');
}*/
$num_cdi = $_REQUEST['numcdi'];
//echo $num_cdi;
$num_per = $_REQUEST['numper'];
//echo $num_per;
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
        $del_query = "DELETE FROM tbl_mascotas WHERE id_mascota = '$del_id'";
        if (mysqli_query($con, $del_query)) {
            $del_msg = "Nombre de la mascota ha sido eliminada";
        } else {
            $del_error = "Nombre de la mascota no ha sido eliminada";
        }
    }
}

if (isset($_POST['submit'])) {
    $cat_name =($_POST['cat-name']);

    if (empty($cat_name)) {
        $error = "Debe llenar el campo";
    } else {
        $check_query = "SELECT * FROM tbl_mascotas WHERE detalle = '$cat_name'";
        $check_run = mysqli_query($con, $check_query);
        if (mysqli_num_rows($check_run) > 0) {
            $error = "Nombre de la mascota ya existe";
        } else {
            $insert_query = "INSERT INTO tbl_mascotas (detalle) VALUES ('$cat_name')";
            if (mysqli_query($con, $insert_query)) {
                $msg = "Nombre de la mascota ha sido agregada";
            } else {
                $error = "Nombre de la mascota no ha sido agregada";
            }
        }
    }
}

if (isset($_POST['update'])) {
    $cat_name = ($_POST['cat-name']);

    if (empty($cat_name)) {
        $up_error = "Debe llenar este campo";
    } else {
        $check_query = "SELECT * FROM tbl_mascotas WHERE detalle = '$cat_name'";
        $check_run = mysqli_query($con, $check_query);
        if (mysqli_num_rows($check_run) > 0) {
            $up_error = "Hábito ya existe";
        } else {
            $update_query = "UPDATE `tbl_mascotas` SET `detalle` = '$cat_name' WHERE `tbl_mascotas`.`id_mascota` = $edit_id";
            if (mysqli_query($con, $update_query)) {
                $up_msg = "Nombre de la mascota ha sido modificada";
            } else {
                $up_error = "Nombre de la mascota no ha sido modificada";
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
                <?php require_once('../admin/inc/sidebar.php'); ?>
                <?php require_once('inc/sidebar.php'); ?>
                </div>
                <div class="col-md-9">
                    <h1><i class="fa fa-paw"></i> Mascotas </h1><hr>
                    <ol class="breadcrumb">
                        <li><a href="index_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>"><i class="fas fa-home"></i> Menú</a></li>
                        <li><a href="menuprincipalprocesos_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>"><i class="fa fa-list-ul"></i> Lista de Procesos</a></li>
                        
                    </ol>

                    <div class="row">
                        <div class="col-md-6">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="detalle">Nombre de la mascota:</label>
                                    <?php
                                    if (isset($msg)) {
                                        echo "<span class='pull-right' style='color:green;'>$msg</span>";
                                    } else if (isset($error)) {
                                        echo "<span class='pull-right' style='color:red;'>$error</span>";
                                    }
                                    ?>
                                    <input type="text" placeholder="Nombre de la mascota" class="form-control" name="cat-name">
                                </div>
                                <input type="submit" value="Agregar" name="submit" class="btn btn-primary">
                                <a href="menuprincipalprocesos_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>">
                                <button type="button" class="btn btn-primary">Cancelar</button>
                                </a>
                                
                            </form>
                            <?php
                            if (isset($_GET['edit'])) {
                                $edit_check_query = "SELECT * FROM tbl_mascotas WHERE id_mascota = $edit_id";
                                $edit_check_run = mysqli_query($con, $edit_check_query);
                                if (mysqli_num_rows($edit_check_run) > 0) {

                                    $edit_row = mysqli_fetch_array($edit_check_run);
                                    $up_category = $edit_row['detalle'];
                                    ?>
                                    <hr>

                                    <form action="" method="post">
                                        <div class="form-group">
                                            <label for="tbl_mascotas">Actualizar nombre de al mascota:</label>
                                            <?php
                                            if (isset($up_msg)) {
                                                echo "<span class='pull-right' style='color:green;'>$up_msg</span>";
                                            } else if (isset($up_error)) {
                                                echo "<span class='pull-right' style='color:red;'>$up_error</span>";
                                            }
                                            ?>
                                            <input type="text" value="<?php echo $up_category; ?>" placeholder="Nombre de la mascota" class="form-control" name="cat-name">
                                        </div>
                                        <input type="submit" value="Actualizar" name="update" class="btn btn-primary">
                                       
                                        <a href="promascotas_PROC.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>">
                                        <button type="button" class="btn btn-primary">Cerrar</button>
                                        </a>

                                        <a href="promascotas_PROC.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>">
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
                            $get_query = "SELECT * FROM tbl_mascotas ORDER BY detalle ASC";
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
                                            <th>Nombre de la mascota</th>
                                            <th>Editar</th>
                                            <th>Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                         $cont=0;
                                        while ($get_row = mysqli_fetch_array($get_run)) {
                                            $cont++;
                                            $mascota_id = $get_row['id_mascota'];
                                            $detallemasco_name = $get_row['detalle'];
                                            ?>
                                            <tr>
                                                <td><?php echo $cont; ?></td>
                                                <td><?php echo ($detallemasco_name); ?></td>
                                                <td><a href="promascotas_PROC.php?edit=<?php echo $mascota_id; ?>&numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>"><i class="far fa-edit"></i></a></td>
                                                <td><a href="promascotas_PROC.php?del=<?php echo $mascota_id; ?>&numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" onclick="return confirm('¿Desea Borrar?');"><i class="fas fa-trash-alt"></i></a></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <?php
                            } else {
                                echo "<center><h3>No se encontró lista de mascotas</h3></center>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php require_once('inc/footer.php'); ?>