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
        $del_query = "DELETE FROM `tbl_datos_personales_ninio` WHERE `id_ninio` = $del_id";
        $query_documento_identidad = "SELECT detalle FROM tbl_documento_identidad WHERE id = $idTipodocumento ";
        //if (isset($_SESSION['username']) && $_SESSION['role'] == 'admin') {
            if (mysqli_query($con, $del_query)) {
                header('Location: niniosregistrados.php');
            } 
        //}
     
}

/*if (isset($_POST['checkboxes'])) {

    foreach ($_POST['checkboxes'] as $user_id) {

        $bulk_option = $_POST['bulk-options'];

        if ($bulk_option == 'delete') {
            $bulk_del_query = "DELETE FROM `users` WHERE `users`.`id` = $user_id";
            mysqli_query($con, $bulk_del_query);
        } else if ($bulk_option == 'author') {
            $bulk_author_query = "UPDATE `users` SET `role` = 'author' WHERE `users`.`id` = $user_id";
            mysqli_query($con, $bulk_author_query);
        } else if ($bulk_option == 'admin') {
            $bulk_admin_query = "UPDATE `users` SET `role` = 'admin' WHERE `users`.`id` = $user_id";
            mysqli_query($con, $bulk_admin_query);
        }
    }
}*/
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
                    <h1><i class="fa fa-users"></i> Datos Personales del Niño(a) <small>Ver todos</small></h1><hr>
                    <ol class="breadcrumb">
                       <li><a href="index.php"><i class="fas fa-home"></i> Menú</a></li>    
                        <li class="active"><i class="fa fa-users"></i> Datos Personales del Niño(a)</li>
                    </ol>
                    <?php
                    $query = "SELECT * FROM tbl_datos_personales_ninio ORDER BY id_ninio DESC";
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
                                                    <option value="author">Subir</option>
                                                    <option value="admin">Bajar</option> 
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-8">
                                            <input type="submit" class="btn btn-success" value="Aplicar cambios">
                                            <a href="ing_dp_ninio.php" class="btn btn-primary">Agregar Nuevo</a>
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
                                        <th>Apellidos/Nombre</th>
                                        <th>Tipo de Documento</th>
                                        <th>Cedula de Identidad</th>
                                        <th>Fecha de Nacimiento</th>
                                        <th>Lugar de Nacimiento</th>
                                        <th>Dirección Domiciliaria</th>
                                        <th>Género</th>
                                        <th>Grupo Étnico</th>
                                        <th>Nombre del Padre</th>
                                        <th>Mombre de la Madre</th>
                                        <th>Discapacidad</th>
                                        <th>Como lo llaman en casa</th>
                                        <th>CDI</th>
                                        <th>Fotografía</th>
                                        <th>Modificar</th>
                                        <th>Eliminar</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                
                                    <?php
                                    while ($row = mysqli_fetch_array($run)) {
                                        $idninio = $row['id_ninio'];
                                        $first_name = ucfirst($row['nombres']);
                                        $last_name = ucfirst($row['apellidos']);
                                        $idTipodocumento = $row['id_docide'];
                                        $c_i = $row['ci'];
                                        $fecha_nac = $row['fecha_nac'];
                                        $lugar_nac = $row['lugar_nac'];
                                        $dir = $row['direrccion_dom'];
                                        $idgenero_n = $row['id_genero'];
                                        $idetnia_n = $row['id_etnia'];
                                        $nombre_padre_n = $row['nombre_padre'];
                                        $nombre_madre_n = $row['nombre_madre'];
                                        $discapacidad_n = $row['discapacidad'];
                                        $sobrenombre = $row['como_lo_llaman'];
                                        $cdi = $row['id_cdi'];
                                        $imagen_n = $row['imagen_ninio'];                          
                                    ?>
                                        
                                        
                                        <tr>
                                            <td><input type="checkbox" class="checkboxes" name="checkboxes[]" value="<?php echo $idninio; ?>"></td>
                                            <td><?php echo "$last_name $first_name "; ?></td>
     
     
         <?php
          switch ($idTipodocumento){
            case 9:
                $idTipodocumento = 'Cedula de Identidad';   
            break;
             case 10:
                $idTipodocumento = 'Pasaporte';
             break;
             default:
            break;
          }


          switch ($idgenero_n){
            case 1:
                $idgenero_n = 'Masculino';   
            break;
             case 2:
                $idgenero_n = 'Femenino';
             break;
             default:
            break;
          }


          switch ($idetnia_n){
            case 1:
                $idetnia_n = 'Mestizo';   
            break;
             case 2:
                $idetnia_n = 'Indigena';
             break;
             case 3:
                $idetnia_n = 'Mulato';
             break;
             case 4:
                $idetnia_n = 'Afroamericano';
             break;
             case 5:
                $idetnia_n = 'Blanco';
             break;
             default:
            break;
          }


          switch ($cdi){
            case 1:
                $cdi = 'CDI 1';   
            break;
             case 4:
                $cdi = 'CDI 2';
             break;
             case 5:
                $cdi = 'CDI 3';
             break;
             case 6:
                $cdi = 'CDI 4';
             break;
             case 7:
                $cdi = 'CDI 5';
             break;
             case 8:
                $cdi = 'CDI 6';
             break;
             default:
            break;
          }

          ?>                                     <td><?php echo $idTipodocumento; ?></td>
                                            <td><?php echo $c_i; ?></td>
                                            <td><?php echo $fecha_nac; ?></td>
                                            <td><?php echo $lugar_nac; ?></td>
                                            <td><?php echo $dir; ?></td>
                                            <td><?php echo $idgenero_n; ?></td>
                                            <td><?php echo $idetnia_n; ?></td>
                                            <td><?php echo $nombre_padre_n; ?></td>
                                            <td><?php echo $nombre_madre_n; ?></td>
                                            <td><?php echo $discapacidad_n; ?></td>
                                            <td><?php echo $sobrenombre; ?></td>
                                            <td><?php echo $cdi; ?></td>
                                           <!-- <td><?php// echo $imagen_n; ?></td> -->
                                            <td><img src="img/<?php echo $imagen_n; ?>" width="50px"></td>
                                            <td><a href="editar_datos_ninio.php?edit=<?php echo $idninio; ?>"><i class="far fa-edit"></i></a></td>
                                            <td><a href="niniosregistrados.php?del=<?php echo $idninio; ?>"><i class="fas fa-trash-alt"></i></a></td>
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

                    
   