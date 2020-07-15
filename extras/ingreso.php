<?php
require_once('inc/top.php');
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
} else if (isset($_SESSION['username']) && $_SESSION['role'] == 'author') {
    header('Location: index.php');
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
                    <h1><i class="fa fa-user-plus"></i> Agregar usuario <small> Agregar nuevo </small></h1><hr>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-tachometer"></i> Usuario</a></li>
                        <li class="active"><i class="fa fa-user-plus"></i> Agrega nuevo usuario</li>
                    </ol>
                    <?php
                    if (isset($_POST['submit'])) {
                        $date = time();
                        $first_name = mysqli_real_escape_string($con, $_POST['first-name']);
                        $last_name = mysqli_real_escape_string($con, $_POST['last-name']);
                        $username = mysqli_real_escape_string($con, strtolower($_POST['username']));
                        $username_trim = preg_replace('/\s+/', '', $username);
                        $email = mysqli_real_escape_string($con, strtolower($_POST['email']));
                        $password = mysqli_real_escape_string($con, $_POST['password']);
                        $role = $_POST['role'];
                        $image = $_FILES['image']['name'];
                        $image_tmp = $_FILES['image']['tmp_name'];

                        $check_query = "SELECT * FROM users WHERE username = '$username' or email = '$email'";
                        $check_run = mysqli_query($con, $check_query);

                        $salt_query = "SELECT * FROM users ORDER BY id DESC LIMIT 1";
                        $salt_run = mysqli_query($con, $salt_query);
                        $salt_row = mysqli_fetch_array($salt_run);
                        $salt = $salt_row['salt'];

                        $password = crypt($password, $salt);

                        if (empty($first_name) or empty($last_name) or empty($username) or empty($email) or empty($password) or empty($image)) {
                            $error = "Todos los (*) Campos son requeridos";
                        } else if ($username != $username_trim) {
                            $error = "No usar espacios en el usuario";
                        } else if (mysqli_num_rows($check_run) > 0) {
                            $error = "usuario o email ya existe";
                        } else {
                            $insert_query = "INSERT INTO `users` (`id`, `date`, `first_name`, `last_name`, `username`, `email`, `image`, `password`, `role`) VALUES (NULL, '$date', '$first_name', '$last_name', '$username', '$email', '$image', '$password', '$role')";
                            if (mysqli_query($con, $insert_query)) {
                                $msg = "Usuario ingresado";
                                move_uploaded_file($image_tmp, "img/$image");
                                $image_check = "SELECT * FROM users ORDER BY id DESC LIMIT 1";
                                $image_run = mysqli_query($con, $image_check);
                                $image_row = mysqli_fetch_array($image_run);
                                $check_image = $image_row['image'];

                                $first_name = "";
                                $last_name = "";
                                $email = "";
                                $username = "";
                            } else {
                                $error = "Usuario no ingresado";
                            }
                        }
                    }
                    ?>
                    <div class="row">
                        <div class="col-md-8">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="first-name">Nombre:*</label>
<?php
if (isset($error)) {
    echo "<span class='pull-right' style='color:red;'>$error</span>";
} else if (isset($msg)) {
    echo "<span class='pull-right' style='color:green;'>$msg</span>";
}
?>
                                    <input type="text" id="first-name" name="first-name" class="form-control" value="<?php if (isset($first_name)) {
                                        echo $first_name;
                                    } ?>" placeholder="First Name">
                                </div>

                                <div class="form-group">
                                    <label for="last-name">Apellido:*</label>
                                    <input type="text" id="last-name" name="last-name" class="form-control" value="<?php if (isset($last_name)) {
                                        echo $last_name;
                                    } ?>" placeholder="Last Name">
                                </div>

                                <div class="form-group">
                                    <label for="username">Usuario:*</label>
                                    <input type="text" id="username" name="username" class="form-control" value="<?php if (isset($username)) {
                                        echo $username;
                                    } ?>" placeholder="Username">
                                </div>

                                <div class="form-group">
                                    <label for="email">Email:*</label>
                                    <input type="text" id="email" name="email" class="form-control" value="<?php if (isset($email)) {
                                        echo $email;
                                    } ?>" placeholder="Email Address">
                                </div>

                                <div class="form-group">
                                    <label for="Password">Password:*</label>
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                                </div>

                                <div class="form-group">
                                    <label for="role">Rol:*</label>
                                    <select name="role" id="role" class="form-control">
                                        <option value="author">Cliente</option>
                                        <option value="admin">Administrador</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="image">Foto de perfil:*</label>
                                    <input type="file" id="image" name="image">
                                </div>

                                <input type="submit" value="Agregar Usuario" name="submit" class="btn btn-primary">
                            </form>
                        </div>
                        <div class="col-md-4">
                            <?php
                            if (isset($check_image)) {
                                echo "<img src='img/$check_image' width='100%'>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php require_once('inc/footer.php'); ?>