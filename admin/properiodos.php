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

    
    if ( $db_id_us_nivel == $tipo_user) {
        $del_query = "DELETE FROM tbl_periodo WHERE id_periodo = '$del_id'";
        if (mysqli_query($con, $del_query)) {
            $del_msg = "Periodo ha sido eliminado";
        } else {
            $del_error = "Periodo no ha sido eliminado";
        }
    }
}

if (isset($_POST['submit'])) {
    $cat_name = ($_POST['cat-name']);
    $cat_fin = ($_POST['cat-fin']);

    if (empty($cat_name)) {
        $error = "Debe llenar el campo";
    } else {
        $check_query = "SELECT * FROM tbl_periodo WHERE inicio = '$cat_name'";
        $check_run = mysqli_query($con, $check_query);
        if (mysqli_num_rows($check_run) > 0) {
            $error = "Periodo ya existe";
        } else {
            $insert_query = "INSERT INTO tbl_periodo (inicio, fin) VALUES ('$cat_name', '$cat_fin')";
            if (mysqli_query($con, $insert_query)) {
                $msg = "Periodo ha sido agregado";
            } else {
                $error = "Periodo no ha sido agregado";
            }
        }
    }
}

if (isset($_POST['update'])) {
    $cat_name = ($_POST['cat-name']);
    $cat_fin = ($_POST['cat-fin']);

    if (empty($cat_name)) {
        $up_error = "Debe llenar este campo";
    } else {
        $check_query = "SELECT * FROM tbl_periodo WHERE inicio = '$cat_name'";
        $check_run = mysqli_query($con, $check_query);
        if (mysqli_num_rows($check_run) > 0) {
            $up_error = "Alimento ya existe";
        } else {
            $update_query = "UPDATE `tbl_periodo` SET `inicio` = '$cat_name', `fin` = '$cat_fin' WHERE `tbl_periodo`.`id_periodo` = $edit_id";
            if (mysqli_query($con, $update_query)) {
                $up_msg = "Periodo ha sido modificado";
            } else {
                $up_error = "Periodo no modificado";
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
                    <h1><i class="fas fa-qrcode"></i> Periodos </h1><hr>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fas fa-home"></i> Menú</a></li>
                        <li><a href="menuprincipalprocesos.php"><i class="fa fa-list-ul"></i> Lista de Procesos</a></li>
                        
                    </ol>

                    <div class="row">
                        <div class="col-md-6">
                        <form action="" method="post">
                                <div class="form-group">
                                    <label for="inicio">Ingrese inicio periodo:</label>
                                    <?php
                                    if (isset($msg)) {
                                        echo "<span class='pull-right' style='color:green;'>$msg</span>";
                                    } else if (isset($error)) {
                                        echo "<span class='pull-right' style='color:red;'>$error</span>";
                                    }
                                    ?>
                                    <input type="text" placeholder="Inicio periodo" class="form-control" name="cat-name">
                               
                                    <label for="inicio">Ingrese fin periodo:</label>
                                    <input type="text" placeholder="Fin periodo" class="form-control" name="cat-fin">
                                </div>
                                <input type="submit" value="Agregar" name="submit" class="btn btn-primary">
                                
                                <a href="menuprincipalprocesos_CDIS.php">
                                <button type="button" class="btn btn-primary">Cancelar</button>
                                </a>
                                     
                            <?php
                            if (isset($_GET['edit'])) {
                                $edit_check_query = "SELECT * FROM tbl_periodo WHERE id_periodo = $edit_id";
                                $edit_check_run = mysqli_query($con, $edit_check_query);
                                if (mysqli_num_rows($edit_check_run) > 0) {

                                    $edit_row = mysqli_fetch_array($edit_check_run);
                                    $up_inicio = $edit_row['inicio'];
                                    $up_fin = $edit_row['fin'];
                                    ?>
                                    <hr>

                                    <form action="" method="post">
                                        <div class="form-group">
                                            <label for="tbl_periodo">Actualizar inicio periodo:</label>
                                            <?php
                                            if (isset($up_msg)) {
                                                echo "<span class='pull-right' style='color:green;'>$up_msg</span>";
                                            } else if (isset($up_error)) {
                                                echo "<span class='pull-right' style='color:red;'>$up_error</span>";
                                            }
                                            ?>
                                            <input type="text" value="<?php echo $up_inicio; ?>" placeholder="Nombre del perido" class="form-control" name="cat-name">
                                           
                                            <label for="tbl_periodo">Actualizar fin periodo:</label>
                                            <input type="text" value="<?php echo $up_fin; ?>" placeholder="Nombre del perido" class="form-control" name="cat-fin">

                                        </div>
                                        <input type="submit" value="Actualizar" name="update" class="btn btn-primary">
                                       
                                            <a href="properiodos.php">
                                            <button type="button" class="btn btn-primary">Cerrar</button>
                                            </a>

                                            <a href="properiodos.php">
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
                            $get_query = "SELECT * FROM tbl_periodo ORDER BY id_periodo ASC";
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
                                            <th>Nombre del periodo</th>
                                            <th>Editar</th>
                                            <th>Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $cont = 0;
                                        while ($get_row = mysqli_fetch_array($get_run)) {
                                            $periodo_id = $get_row['id_periodo'];
                                            $inicio_name = $get_row['inicio'];
                                            $fin_name = $get_row['fin'];
                                            $cont++;
                                            ?>
                                            <tr>
                                            <td><?php echo $cont; ?></td>
                                                <td><?php echo ("$inicio_name $fin_name"); ?></td>
                                                <td><a href="properiodos.php?edit=<?php echo $periodo_id; ?>"><i class="far fa-edit"></i></a></td>
                                                <td><a href="properiodos.php?del=<?php echo $periodo_id; ?>" onclick="return confirm('¿Desea Borrar?');  "><i class="fas fa-trash-alt"></i></a></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <?php
                            } else {
                                echo "<center><h3>No se encontró lista de accidentes</h3></center>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php require_once('inc/footer.php'); ?>