<?php require_once('inc/top.php'); ?>
<?php
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
} 

$cdi_perimisos = $_SESSION['tipo_cdi'];
//echo $cdi_perimisos;

if (isset($_GET['del'])) {
    $del_id = $_GET['del'];
    //echo  $del_id;
    //echo  "HOLA";
    //$del_check_query = "SELECT * FROM users WHERE id = $del_id";
    //$del_check_run = mysqli_query($con, $del_check_query);
   // if (mysqli_num_rows($del_check_run) > 0) {
        $del_query = "UPDATE tbl_usuario SET estado_us ='Inactivo' WHERE id_usuario= $del_id";
        
     //  if (isset($_SESSION['username']) && $_SESSION['role'] == 'admin') {
            if (mysqli_query($con, $del_query)) {
                header('Location: users_cg.php');
            } 
        //}
     
}

if (isset($_POST['checkboxes'])) {
    //echo $id_ni;
    foreach ($_POST['checkboxes'] as $del_id) {
       
        $bulk_option = $_POST['bulk-options'];

        if ($bulk_option == 'delete') {
            $bulk_del_query = "UPDATE tbl_usuario SET estado_us ='Inactivo' WHERE id_usuario= $del_id";
            mysqli_query($con, $bulk_del_query);
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
                </div>
                <div class="col-md-9">
                    <h1><i class="fa fa-users"></i> Usuarios: Coordinador General <small>Ver todos</small></h1><hr>
                    <ol class="breadcrumb">
                       <li><a href="../admin/index.php"><i class="fas fa-home"></i> Menú</a></li>    
                        <li class="active"><i class="fa fa-users"></i> Coordinador General</li>
                    </ol>
                    <?php
                    $query = "SELECT tbl_usuario.id_usuario, tbl_usuario.id_docide, tbl_usuario.ci, tbl_usuario.apellidos, tbl_usuario.nombres, tbl_usuario.fecha_ingreso,
                    tbl_usuario.direccion_dom, tbl_usuario.telefono, tbl_usuario.correo_e, tbl_usuario.contrasenia,
                    tbl_usuario.imagen_usuario, tbl_usuario.tipo, tbl_usuario_nombre.detalle AS detalle_nivel_usuario, tbl_usuario.id_cdi, 
                    tbl_cdi.nombre
                    FROM tbl_usuario
                    INNER JOIN tbl_usuario_nombre ON tbl_usuario_nombre.id_usuario_nombre = tbl_usuario.tipo
                    INNER JOIN tbl_cdi ON tbl_cdi.id = tbl_usuario.id_cdi
                    WHERE tbl_usuario.tipo = '2' AND estado_us = 'Activo' ORDER BY apellidos ASC";
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
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-8">
                                            <input type="submit" class="btn btn-success" value="Aplicar cambios">
                                            <a href="add-user_cg.php" class="btn btn-primary">Agregar Nuevo</a>
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
                            <table class="table table-bordered table-striped table-hover" id="example">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" id="selectallboxes"></th>
                                        <th>Número</th>
                                        <th>Número de cédula de identidad</th>
                                        <th>Apellidos/Nombre</th>
                                        <th>Fecha de Ingreso</th>
                                        <th>Tipo Usuario</th>
                                        <th>Teléfono</th>
                                        <th>Correo electrónico</th>
                                        <th>Detalle</th>
                                        <th>Modificar</th>
                                        <th>Eliminar</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $cont=0;
                                    while ($row = mysqli_fetch_array($run)) {
                                        $cont++;
                                        $id_ni = $row['id_usuario'];
                                        $tipo_docum = $row['id_docide'];
                                        $ci_us = $row['ci'];
                                        $last_name = ($row['apellidos']);
                                        $first_name = ($row['nombres']);
                                        $fecha_ing = $row['fecha_ingreso'];
                                        $role = $row['detalle_nivel_usuario'];
                                        $dir = $row['direccion_dom'];
                                        $tlf = $row['telefono'];
                                        $email = $row['correo_e'];
                                        $cdi = $row['nombre'];
                                        
                                      
                                        ?>
                                        <tr>
                                        
                                            <td><input type="checkbox" class="checkboxes" name="checkboxes[]" value="<?php echo $id_ni; ?>"></td>
                                            <td><?php echo $cont; ?></td>
                                           <!-- <td><?php// echo $tipo_docum; ?></td>  -->
                                            <td><?php echo $ci_us; ?></td>
                                            <td><?php echo "$last_name $first_name"; ?></td>
                                            <td><?php echo $fecha_ing; ?></td>
                                            <td><?php echo $role; ?></td>
                                            <td><?php echo $tlf; ?></td>
                                            <td><?php echo $email; ?></td>
                                            <td><a href="profile_users_adm_sist.php?edit=<?php echo $id_ni; ?>"><i class="far fa-file-alt"></i></a></td>
                                            <td><a href="edit_user_cg_vs.php?edit=<?php echo $id_ni; ?>"><i class="far fa-edit"></i></a></td>
                                            <td><a href="users_cg.php?del=<?php echo $id_ni; ?>" onclick="return confirm('¿Desea Borrar?');" ><i class="fas fa-trash-alt"></i></a></td>
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

                    
   
