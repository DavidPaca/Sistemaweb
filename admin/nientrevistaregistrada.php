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
        $del_query = "DELETE FROM tbl_entrevista_inicial WHERE id_entrevista_i = $del_id";
       // $query_documento_identidad = "SELECT detalle FROM tbl_documento_identidad WHERE id = $idTipodocumento ";
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
                    <h1><i class="fa fa-users"></i> Entrevista Inicial de cada Niño(a) <small>Ver todos</small></h1><hr>
                    <ol class="breadcrumb">
                       <li><a href="index.php"><i class="fas fa-home"></i> Menú</a></li>    
                        <li class="active"><i class="fa fa-users"></i> Entrevista Inicial</li>
                    </ol>
                    <?php
                    $query = "SELECT * FROM tbl_entrevista_inicial ORDER BY id_entrevista_i DESC";
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
                                        <th>Código del Niño</th>
                                        <th>Presenta elrgias</th>
                                        <th>Ha tenido enfermedades graves</th>
                                        <th>Ha sufrido accidentes</th>
                                        <th>Lugar de Nacimiento</th>
                                        <th>Alérgias</th>
                                        <th>Come Solo</th>
                                        <th>Vocabulario</th>
                                        <th>Con quién mas se relaciona</th>
                                        <th>Dependencia de adultos</th>
                                        <th>Juegos Preferidos</th>
                                        <th>Tiene una Mascota</th>
                                        <th>Nombre de la mascota</th>
                                        <th>Mira Televisión</th>
                                        <th>Escucha música</th>
                                        <th>Tiene miedo</th>
                                        <th>Referencia CDI</th>
                                        <th>Modificar</th>
                                        <th>Eliminar</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                
                                    <?php
                                    while ($row = mysqli_fetch_array($run)) {
                                        $id_entrevista = $row['id_entrevista_i'];
                                        $idninio = $row['id_ninio'];
                                        $alergias_aliment = ucfirst($row['alergias_aliment']);
                                        $tuvo_enfer_graves = ucfirst($row['tuvo_enfer_graves']);   //ucfirst
                                        $sufrido_accidentes = $row['sufrido_accidentes'];
                                        $alergico  = $row['alergico'];
                                        $come_solo = $row['come_solo'];
                                        $vocalbulario  = $row['vocalbulario'];
                                        $con_quien_relacion_ni = $row['con_quien_relacion_ni'];
                                        $dapende_adutos  = $row['dapende_adutos'];
                                        $le_gusta_jugar = $row['le_gusta_jugar'];
                                        $mascota  = $row['mascota'];
                                        $nombre_mascota = $row['nombre_mascota'];
                                        $mira_tv = $row['mira_tv'];
                                        $escucha_musica  = $row['escucha_musica'];
                                        $escucha_musica  = $row['escucha_musica'];
                                        $id_ref_cdi = $row['id_ref_cdi'];
                                        
                                      
                                        ?>
                                        <tr>
                                            <td><input type="checkbox" class="checkboxes" name="checkboxes[]" value="<?php echo  $id_entrevista; ?>"></td>
                                            <td><?php echo "$id_entrevista"; ?></td>
         <?php
        /*  switch ($idTipodocumento){
            case 9:
                $idTipodocumento = 'Cedula de Identidad';   
            break;
             case 10:
                $idTipodocumento = 'Pasaporte';
             break;
             default:
            break;
          }*/


          switch ($id_ref_cdi){
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
                                             
                                             <td><?php echo $id_entrevista; ?></td>
                                            <td><?php echo $idninio; ?></td>
                                            <td><?php echo $alergias_aliment; ?></td>
                                            <td><?php echo $tuvo_enfer_graves; ?></td>
                                            <td><?php echo $sufrido_accidentes; ?></td>
                                            <td><?php echo $alergico; ?></td>
                                            <td><?php echo $come_solo; ?></td>
                                            <td><?php echo $vocalbulario; ?></td>
                                            <td><?php echo $con_quien_relacion_ni; ?></td>
                                            <td><?php echo $dapende_adutos; ?></td>
                                            <!-- <td><?php // echo $discapacidad_n; ?></td> -->
                                            <td><?php echo $le_gusta_jugar; ?></td>
                                            <td><?php echo $mascota; ?></td>
                                            <td><?php echo $nombre_mascota; ?></td>
                                            <td><?php echo $mira_tv; ?></td>
                                            <td><?php echo $escucha_musica; ?></td>
                                            <td><?php echo $id_ref_cdi; ?></td>
                                           <!-- <td><?php// echo $imagen_n; ?></td> -->
                                           <!-- <td><img src="img/<?php // echo $imagen_n; ?>" width="50px"></td> -->
                                            <td><a href="ing_entrevista_i.php?edit=<?php echo $id_entrevista; ?>"><i class="far fa-edit"></i></a></td>
                                            <td><a href="nientrevistaregistrada.php?del=<?php echo $id_entrevista; ?>"><i class="fas fa-trash-alt"></i></a></td>
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

                    
   