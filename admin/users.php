<?php require_once('inc/top.php'); ?>
<?php
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
} 

if (isset($_GET['del'])) {
    $del_id = $_GET['del'];
    //$del_check_query = "SELECT * FROM users WHERE id = $del_id";
    //$del_check_run = mysqli_query($con, $del_check_query);
   // if (mysqli_num_rows($del_check_run) > 0) {
        $del_query = "DELETE FROM `tbl_usuario` WHERE `id_usuario` = $del_id";
     //  if (isset($_SESSION['username']) && $_SESSION['role'] == 'admin') {
            if (mysqli_query($con, $del_query)) {
                header('Location: users.php');
            } 
        //}
     
}

if (isset($_POST['checkboxes'])) {

    foreach ($_POST['checkboxes'] as $id_ni) {

        $bulk_option = $_POST['bulk-options'];

        if ($bulk_option == 'delete') {
            $bulk_del_query = "DELETE FROM `tbl_usuario` WHERE `id_usuario` = $id_ni";
            mysqli_query($con, $bulk_del_query);
        } else if ($bulk_option == 'author') {
            $bulk_author_query = "UPDATE `users` SET `role` = 'author' WHERE `users`.`id` = $user_id";
            mysqli_query($con, $bulk_author_query);
        } else if ($bulk_option == 'admin') {
            $bulk_admin_query = "UPDATE `users` SET `role` = 'admin' WHERE `users`.`id` = $user_id";
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
                    <h1><i class="fa fa-users"></i> Usuarios <small>Ver todos</small></h1><hr>
                    <ol class="breadcrumb">
                       <li><a href="index.php"><i class="fas fa-home"></i> Menú</a></li>    
                        <li class="active"><i class="fa fa-users"></i> Usuarios</li>
                    </ol>
                    <?php
                    $query = "SELECT * FROM tbl_usuario ORDER BY id_usuario DESC";
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
                                                    <option value="author">Exportar</option>
                                                    <option value="admin">Eli</option>
                                                    <option href="user.php">Editar</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-8">
                                            <input type="submit" class="btn btn-success" value="Aplicar cambios">
                                            <a href="add-user.php" class="btn btn-primary">Agregar Nuevo</a>
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
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" id="selectallboxes"></th>
                                        <th>Número</th>
                                        <th>Tipo de Documento</th>
                                        <th>Número de cédula de identidad</th>
                                        <th>Apellidos/Nombre</th>
                                        <th>Fecha de Ingreso</th>
                                        <th>Tipo Usuario</th>
                                        <th>Dirección domiciliaria</th>
                                        <th>Teléfono</th>
                                        <th>Correo electrónico</th>
                                        <th>CDI</th>
                                        <th>Modificar</th>
                                        <th>Eliminar</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row = mysqli_fetch_array($run)) {
                                        $id_ni = $row['id_usuario'];
                                        $tipo_docum = $row['id_docide'];
                                        $ci_us = $row['ci'];
                                        $last_name = ($row['apellidos']);
                                        $first_name = ($row['nombres']);
                                        $fecha_ing = $row['fecha_ingreso'];
                                        $role = $row['tipo'];
                                        $dir = $row['direccion_dom'];
                                        $tlf = $row['telefono'];
                                        $email = $row['correo_e'];
                                        $cdi = $row['id_cdi'];
                                        
                                      
                                        ?>
                                        <tr>
                                        
                                            <td><input type="checkbox" class="checkboxes" name="checkboxes[]" value="<?php echo $id_ni; ?>"></td>
                                            <td><?php echo $id_ni; ?></td>
                                            <td><?php echo $tipo_docum; ?></td>
                                            <td><?php echo $ci_us; ?></td>
                                            <td><?php echo "$last_name $first_name"; ?></td>
                                            <td><?php echo $fecha_ing; ?></td>
                                            <td><?php echo $role; ?></td>
                                            <td><?php echo $dir; ?></td>
                                            <td><?php echo $tlf; ?></td>
                                            <td><?php echo $email; ?></td>
                                            <td><?php echo $cdi;  ?></td>
                                            
                                            <td><a href="edit-user.php?edit=<?php echo $id_ni; ?>"><i class="far fa-edit"></i></a></td>
                                            <td><a href="users.php?del=<?php echo $id_ni; ?>" onclick="return confirm('¿Desea Borrar?');" ><i class="fas fa-trash-alt"></i></a></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <?php
                        } else {
                            echo "<center><h2>Usuarios no disponibles por ahora</h2></center>";
                        }
                        ?>
                    </form>
                </div>
            </div>

        </div>

        

    <?php require_once('inc/footer.php'); ?>

                    
   
