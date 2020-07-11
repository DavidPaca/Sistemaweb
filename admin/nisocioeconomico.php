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
        $del_query = "DELETE FROM socio_economico WHERE id_socioe = $del_id";
       // $query_documento_identidad = "SELECT detalle FROM tbl_documento_identidad WHERE id = $idTipodocumento ";
        //if (isset($_SESSION['username']) && $_SESSION['role'] == 'admin') {
            if (mysqli_query($con, $del_query)) {
                header('Location: nisocioeconomico.php');
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
                    <h1><i class="fa fa-users"></i> Información Socio Económica <small>Ver todos</small></h1><hr>
                    <ol class="breadcrumb">
                       <li><a href="index.php"><i class="fas fa-home"></i> Menú</a></li>    
                        <li class="active"><i class="fa fa-users"></i> Información Socio Económica</li>
                    </ol>
                    <?php
                    $query = "SELECT * FROM socio_economico ORDER BY id_socioe DESC";
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
                                        <th>Número de Información Socio Económica</th> 
                                        <th>Código del Niño</th>
                                        <th>Nombre del Representante</th>
                                        <th>Tipo de Documento</th>
                                        <th>Número de Documento Identidad</th>
                                        <th>Parentesco</th>
                                        <th>Dirección Domicialira</th>
                                        <th>Télefono</th>
                                        <th>Estado Civil Representante</th>
                                        <th>Vivienda</th>
                                        <th>Tipo de Vivienda</th>
                                        <th>Servicios Básicos</th>
                                        <th>Ingreso Mensual</th>
                                        <th>Lugar de Trabajo</th>
                                        <th>Direccion del Trabajo</th>
                                        <th>Télefono Trabajo</th>
                                        <th>Modificar</th>
                                        <th>Eliminar</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                
                                    <?php
                                    while ($row = mysqli_fetch_array($run)) {
                                        $id_socioeco = $row['id_socioe'];
                                        $idninio = $row['id_ninio'];
                                        $representante = ucfirst($row['nombre_repre']);
                                        $id_documento = ucfirst($row['id_docide']);   //ucfirst
                                        $numero_ci = $row['ci'];
                                        $parentescosocio  = $row['parentesco'];
                                        $direccion_casa = $row['direccion_dom'];
                                        $telefono_so  = $row['telefono_socio'];
                                        $estado_civil_so = $row['id_estado_civil'];
                                        $vivienda_socio  = $row['id_vivienda'];
                                        $tipo_vivienda_socio = $row['id_tipo_vivienda'];
                                        $servicios_b  = $row['servicios_basicos'];
                                        $ingresos = $row['ingreso_mensual'];
                                        $trabajo_repre = $row['lugar_trabajo'];
                                        $direccion_trab  = $row['Direccion_trabajo'];
                                      //$escucha_musica  = $row['escucha_musica'];
                                        $telefono_repre = $row['telefono_trabajo'];
                                                               
                                        ?>
                                        <tr>
                                            <td><input type="checkbox" class="checkboxes" name="checkboxes[]" value="<?php echo  $id_socioeco; ?>"></td>
                                            <td><?php echo "$id_socioeco"; ?></td>
         <?php
          switch ($id_documento){
            case 9:
                $id_documento = 'Cedula de Identidad';   
            break;
             case 10:
                $id_documento = 'Pasaporte';
             break;
             default:
            break;
          }


      /*    switch ($id_ref_cdi){
            case 1:
                $id_ref_cdi = 'Cercania al domicilio';   
            break;
             case 2:
                $id_ref_cdi = 'Cercania al trabajo';
             break;
             case 3:
                $id_ref_cdi = 'Recomendado por otra persona';
             break;
             case 4:
                $id_ref_cdi = 'Tuvo experiencia con otro hijo';
             break;
             default:
            break;
          }
*/
/*
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
*/

    /*      switch ($cdi){
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


*/


          ?>                                
                                             
                                             <td><?php echo $id_socioeco; ?></td>
                                            <td><?php echo $idninio; ?></td>
                                            <td><?php echo $representante; ?></td>
                                            <td><?php echo $id_documento; ?></td>
                                            <td><?php echo $numero_ci; ?></td>
                                            <td><?php echo $parentescosocio; ?></td>
                                            <td><?php echo $direccion_casa; ?></td>
                                            <td><?php echo $telefono_so; ?></td>
                                            <td><?php echo $estado_civil_so; ?></td>
                                            <td><?php echo $vivienda_socio; ?></td>
                                            <td><?php echo $tipo_vivienda_socio; ?></td> 
                                            <td><?php echo $servicios_b; ?></td>
                                            <td><?php echo $ingresos; ?></td>
                                            <td><?php echo $trabajo_repre; ?></td>
                                            <td><?php echo $direccion_trab; ?></td>
                                            <td><?php echo $telefono_repre; ?></td>
                                           <!-- <td><?php// echo $imagen_n; ?></td> -->
                                           <!-- <td><img src="img/<?php // echo $imagen_n; ?>" width="50px"></td> -->
                                           <td><a href="ing_socio_eco.php?edit=<?php echo $id_socioeco; ?>"><i class="far fa-edit"></i></a></td>
                                            <td><a href="niniosregistrados.php?del=<?php echo $id_socioeco; ?>"><i class="fas fa-trash-alt"></i></a></td> 
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

                    
   