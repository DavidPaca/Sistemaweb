<?php require_once('inc/top.php'); ?>
<?php
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
} else if (isset($_SESSION['username']) && $_SESSION['role'] == 'author') {
    header('Location: index.php');
}

$session_username = $_SESSION['username'];

if (isset($_GET['del'])) {
    $del_id = $_GET['del'];
    $del_check_query = "SELECT * FROM comments WHERE id = $del_id";
    $del_check_run = mysqli_query($con, $del_check_query);
    if (mysqli_num_rows($del_check_run) > 0) {
        $del_query = "DELETE FROM `comments` WHERE `comments`.`id` = $del_id";
        if (isset($_SESSION['username']) && $_SESSION['role'] == 'admin') {
            if (mysqli_query($con, $del_query)) {
                $msg = "Comentario ha sido eliminado";
            } else {
                $error = "Comentario no ha sido elminado";
            }
        }
    } else {
        header('location: index.php');
    }
}

if (isset($_GET['aprobado'])) {
    $approve_id = $_GET['aprobado'];
    $approve_check_query = "SELECT * FROM comments WHERE id = $approve_id";
    $approve_check_run = mysqli_query($con, $approve_check_query);
    if (mysqli_num_rows($approve_check_run) > 0) {
        $approve_query = "UPDATE `comments` SET `status` = 'aprobado' WHERE `comments`.`id` = $approve_id";
        if (isset($_SESSION['username']) && $_SESSION['role'] == 'admin') {
            if (mysqli_query($con, $approve_query)) {
                $msg = "Comentario ha sido aceptado";
            } else {
                $error = "Comentario no ha sido aceptado";
            }
        }
    } else {
        header('location: index.php');
    }
}

if (isset($_GET['noAprobado'])) {
    $unapprove_id = $_GET['noAprobado'];
    $unapprove_check_query = "SELECT * FROM comments WHERE id = $unapprove_id";
    $unapprove_check_run = mysqli_query($con, $unapprove_check_query);
    if (mysqli_num_rows($unapprove_check_run) > 0) {
        $unapprove_query = "UPDATE `comments` SET `status` = 'pendiente' WHERE `comments`.`id` = $unapprove_id";
        if (isset($_SESSION['username']) && $_SESSION['role'] == 'admin') {
            if (mysqli_query($con, $unapprove_query)) {
                $msg = "Comentario ha sido cancelado";
            } else {
                $error = "Comentario no ha sido aceptado";
            }
        }
    } else {
        header('location: index.php');
    }
}

if (isset($_POST['checkboxes'])) {

    foreach ($_POST['checkboxes'] as $user_id) {

        $bulk_option = $_POST['bulk-options'];

        if ($bulk_option == 'delete') {
            $bulk_del_query = "DELETE FROM `comments` WHERE `comments`.`id` = $user_id";
            mysqli_query($con, $bulk_del_query);
        } else if ($bulk_option == 'aprobado') {
            $bulk_author_query = "UPDATE `comments` SET `status` = 'aprobado' WHERE `comments`.`id` = $user_id";
            mysqli_query($con, $bulk_author_query);
        } else if ($bulk_option == 'pendiente') {
            $bulk_admin_query = "UPDATE `comments` SET `status` = 'pendiente' WHERE `comments`.`id` = $user_id";
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
                <div class="col-md-3">
                    <?php require_once('inc/sidebar.php'); ?>
                </div>
                <div class="col-md-9">
                    <h1><i class="fa fa-comments"></i> Comentarios<small> Realizados</small></h1><hr>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fas fa-home"></i> Menú</a></li>
                        <li class="active"><i class="fa fa-comments"></i> Comentarios</li>
                    </ol>
                    <?php
                    if (isset($_GET['reenviar'])) {
                        $reply_id = $_GET['reenviar'];
                        $reply_check = "SELECT * FROM comments WHERE post_id = $reply_id";
                        $reply_check_run = mysqli_query($con, $reply_check);
                        if (mysqli_num_rows($reply_check_run) > 0) {
                            if (isset($_POST['reenviar'])) {
                                $comment_data = $_POST['comment'];
                                if (empty($comment_data)) {
                                    $comment_error = "Debe llenar este campo";
                                } else {
                                    $get_user_data = "SELECT * FROM users WHERE username = '$session_username'";
                                    $get_user_run = mysqli_query($con, $get_user_data);
                                    $get_user_row = mysqli_fetch_array($get_user_run);
                                    $date = time();
                                    $first_name = $get_user_row['first_name'];
                                    $last_name = $get_user_row['last_name'];
                                    $full_name = "$first_name $last_name";
                                    $email = $get_user_row['email'];
                                    $image = $get_user_row['image'];

                                    $insert_comment_query = "INSERT INTO comments (date,name,username,post_id,email,image,comment,status) VALUES ('$date','$full_name','$session_username','$reply_id','$email','$image','$comment_data','aprobado')";
                                    if (mysqli_query($con, $insert_comment_query)) {
                                        $comment_msg = "Comentario ha sido enviado";
                                        header('location: post.php');
                                    } else {
                                        $comment_error = "Comentario no ha sido enviado";
                                    }
                                }
                            }
                            ?>
                            <div class="row">
                                <div class="col-xs-12 col-sm-8 col-md-6 col-lg-6">
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <label for="comment">Comentario:*</label>
                                            <?php
                                            if (isset($comment_error)) {
                                                echo "<span class='pull-right' style='color:red;'>$comment_error</span>";
                                            } else if (isset($comment_msg)) {
                                                echo "<span class='pull-right' style='color:green;'>$comment_msg</span>";
                                            }
                                            ?>
                                            <textarea name="comment" id="comment" cols="30" rows="10" placeholder="Su comentario aquí" class="form-control"></textarea>
                                        </div>
                                        <input type="submit" name="reenviar" class="btn btn-primary">
                                    </form>
                                </div>
                            </div>
                            <hr>

                            <?php
                        }
                    }
                    $query = "SELECT * FROM comments ORDER BY id DESC";
                    $run = mysqli_query($con, $query);
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
                                                    <option value="delete">Eliminar</option>
                                                    <option value="aprobado">Aceptar</option>
                                                    <option value="pendiente">Cancelar</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-8">
                                            <input type="submit" class="btn btn-success" value="Aplicar Cambios">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            if (isset($error)) {
                                echo "<span style='color:red;' class='pull-right'></i>$error</span>";
                            } else if (isset($msg)) {
                                echo "<span style='color:green;' class='pull-right'> </i>$msg</span>";
                            }
                            ?>
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" id="selectallboxes"></th>
                                        <th>Id #</th>
                                        <th>Fecha</th>
                                        <th>Usario</th>
                                        <th>Comentario</th>
                                        <th>Estado</th>
                                        <th>Aceptar</th>
                                        <th>Cancelar</th>
                                        <th>Reenviar</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row = mysqli_fetch_array($run)) {
                                        $id = $row['id'];
                                        $username = $row['username'];
                                        $status = $row['status'];
                                        $comment = $row['comment'];
                                        $post_id = $row['post_id'];
                                        $date = getdate($row['date']);
                                        $day = $date['mday'];
                                        $month = substr($date['month'], 0, 3);
                                        $year = $date['year'];
                                        ?>
                                        <tr>
                                            <td><input type="checkbox" class="checkboxes" name="checkboxes[]" value="<?php echo $id; ?>"></td>
                                            <td><?php echo $id; ?></td>
                                            <td><?php echo "$day $month $year"; ?></td>
                                            <td><?php echo $username; ?></td>
                                            <td><?php echo $comment; ?></td>
                                            <td><span style="color:<?php
                                                if ($status == 'aprobado') {
                                                    echo 'green';
                                                } else if ($status == 'pendiente') {
                                                    echo 'red';
                                                }
                                                ?>;"><?php echo ucfirst($status); ?></span></td>
                                            <td><a href="comments.php?aprobado=<?php echo $id; ?>">   <i class="far fa-check-circle"></i> </a></td>
                                            <td><a href="comments.php?noAprobado=<?php echo $id; ?>">  <i class="fas fa-backspace"></i>  </a></td>
                                            <td><a href="comments.php?reenviar=<?php echo $post_id; ?>"><i class="fa fa-reply"></i></a></td>
                                            <td><a href="comments.php?del=<?php echo $id; ?>"><i class="fas fa-trash-alt"></i></a></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <?php
                        } else {
                            echo "<center><h2> No hay comentarios</h2></center>";
                        }
                        ?>
                    </form>
                </div>
            </div>
        </div>

        <?php require_once('inc/footer.php'); ?>