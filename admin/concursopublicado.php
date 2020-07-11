<?php require_once('inc/top.php'); ?>
<?php

/*if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}*/

$session_username = $_SESSION['username'];
echo($session_username);
if (isset($_GET['del'])) {
    $del_id = $_GET['del'];
    if ($_SESSION['role'] == 'admin') {
        $del_check_query = "SELECT * FROM posts WHERE id = $del_id";
        $del_check_run = mysqli_query($con, $del_check_query);
    } else if ($_SESSION['role'] == 'author') {
        $del_check_query = "SELECT * FROM posts WHERE id = $del_id and author = '$session_username'";
        $del_check_run = mysqli_query($con, $del_check_query);
    }
    if (mysqli_num_rows($del_check_run) > 0) {
        $del_query = "DELETE FROM `tbl_concurso` WHERE `tbl_concurso`.`id_con` = $del_id";
        if (mysqli_query($con, $del_query)) {
            $msg = "Post ha sido eliminado";
        } else {
            $error = "Post no ha sido eliminado";
        }
    } else {
        header('location: index.php');
    }
}

if (isset($_POST['checkboxes'])) {

    foreach ($_POST['checkboxes'] as $user_id) {

        $bulk_option = $_POST['bulk-options'];

        if ($bulk_option == 'del') {
            $bulk_del_query = "DELETE FROM `posts` WHERE `posts`.`id` = $user_id";
            mysqli_query($con, $bulk_del_query);
        } else if ($bulk_option == 'publico') {
            $bulk_author_query = "UPDATE `posts` SET `status` = 'publico' WHERE `posts`.`id` = $user_id";
            mysqli_query($con, $bulk_author_query);
        } else if ($bulk_option == 'oculto') {
            $bulk_admin_query = "UPDATE `posts` SET `status` = 'oculto' WHERE `posts`.`id` = $user_id";
            mysqli_query($con, $bulk_admin_query);
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

                <!--para el menu de la izquierda-->
                <div class="col-md-3">
                    <?php require_once('inc/sidebar.php'); ?>
                </div>
                <!--para el menu de la izquierda-->


                <div class="col-md-9">
                    <h1><i class="fa fa-file"></i> Concursos <small>Publicados</small></h1><hr>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fas fa-home"></i> Menú</a></li>
                        <li class="active"><i class="fa fa-file"></i> Ver Concurso</li>
                    </ol>
                    <?php
                    if ($_SESSION['role'] == 'admin') {
                        $query = "SELECT * FROM tbl_concurso ORDER BY id_con DESC";
                        $run = mysqli_query($con, $query);
                    } else if ($_SESSION['role'] == 'author') {
                        $query = "SELECT * FROM posts WHERE author = '$session_username' ORDER BY id DESC";
                        $run = mysqli_query($con, $query);
                    }
                    if (mysqli_num_rows($run) > 0) {
                        ?>
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <div class="form-group">
                                                <select name="bulk-options" id="" class="form-control">

                                                    <option value="">Seleccionar</option>
                                                    <option value="del">Eliminar</option>
                                                    <option value="publico">Estado Público</option>
                                                    <option value="oculto">Estado Oculto</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-8">
                                            <input type="submit" class="btn btn-success" value="Aplicar cambios">
                                            <a href="add-post.php" class="btn btn-primary">Agregar Nuevo</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            if (isset($error)) {
                                echo "<span style='color:red;' class='pull-right'>$error</span>";
                            } else if (isset($msg)) {
                                echo "<span style='color:green;' class='pull-right'>$msg</span>";
                            }
                            ?>
                            <?php $fechaActual = date('Y-m-d'); 
                                //echo $fechaActual;
                            ?>
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" id="selectallboxes"></th>
                                        <th>Id #</th>
                                        <th>Fecha</th>
                                        <th>Título</th>
                                        <th>Imagen</th>
                                        <th>Editar</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row = mysqli_fetch_array($run)) {
                                        $id = $row['id_con'];
                                        $title = $row['titulo'];
                                        $image = $row['imagen'];
                                        $date = getdate($row['fecha_con']);
                                        $day = $date['mday'];
                                        $month = substr($date['month'], 0, 3);
                                        $year = $date['year'];
                                        ?>
                                        <tr>
                                            <td><input type="checkbox" class="checkboxes" name="checkboxes[]" value="<?php echo $id; ?>"></td>
                                            <td><?php echo $id; ?></td>
                                            <td><?php echo "$day $month $year"; ?></td>
                                            <td><?php echo "$title"; ?></td>
                                            <td><img src="img/<?php echo $image; ?>" width="50px"></td>
                                          
                                            <td><a href="edit-post.php?edit=<?php echo $id; ?>" class="text-center"><i class="far fa-edit"></i></a></td>
                                            <td><a href="eliminar_concurso.php?del=<?php echo $id; ?>" class="text-center"><i class="fas fa-trash-alt"></i></a></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <?php
                        } else {
                            echo "<center><h2>Ninguna información publicada</h2></center>";
                        }
                        ?>
                        
                    </form>
                </div>
            </div>
        </div>

        <?php require_once('inc/footer.php'); ?>