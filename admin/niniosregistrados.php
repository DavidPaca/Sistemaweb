<?php require_once('inc/top.php'); ?>
<?php
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
} 

if (isset($_GET['del'])) {
    $del_id = $_GET['del'];
   // $del_check_query = "SELECT * FROM tbl_datos_personales_ninio ORDER BY id_ninio DESC";
    //$del_check_run = mysqli_query($con, $del_check_query);
   // if (mysqli_num_rows($del_check_run) > 0) {
        $del_query = "UPDATE tbl_datos_personales_ninio SET estado='Inactivo' WHERE id_ninio= $del_id";
        $query_documento_identidad = "SELECT detalle FROM tbl_documento_identidad WHERE id = $idTipodocumento ";
        //if (isset($_SESSION['username']) && $_SESSION['role'] == 'admin') {
            if (mysqli_query($con, $del_query)) {
                //header('Location: niniosregistrados.php');
                $error = "Esatdo civil ha sido eliminado";
            } else {
                $msg = "Estado civil no ha sido eliminado";
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
                    $query = "SELECT * FROM tbl_datos_personales_ninio WHERE estado='Activo'";
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
                           /* $get_query = "SELECT * FROM tbl_datos_personales_ninio ORDER BY id_ninio DESC";
                            $run = mysqli_query($con, $get_query);
                            if (isset($error)) {
                                echo "<span style='color:red;' class='pull-right'>$error</span>";
                            } else if (isset($msg)) {
                                echo "<span style='color:green;' class='pull-right'>$msg</span>";
                            }*/
                            ?>

                            <?php
                           $get_query = "SELECT * FROM tbl_datos_personales_ninio ORDER BY id_ninio DESC";
                            $run = mysqli_query($con, $get_query);
                            if (mysqli_num_rows($run) > 0) {

                                if (isset($error)) {
                                    echo "<span style='color:red;' class='pull-right'>$error</span>";
                                    // echo "<span class='pull-right' style='color:green;'>$del_msg</span>";
                                } else if (isset($msg)) {
                                    echo "<span style='color:green;' class='pull-right'>$msg</span>";
                                    //echo "<span class='pull-right' style='color:red;'>$del_error</span>";
                                }
                            }
                            ?>


                            <table class="table table-bordered table-striped table-hover" id="example" >
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" id="selectallboxes"></th>
                                        <th>Número</th>
                                       <!-- <th>Tipo de Documento</th> -->
                                        <th>Cedula de Identidad</th>
                                        <th>Apellidos/Nombre</th>                               
                                        <th>Fecha de Nacimiento</th>
                                        <th style = "width: 200px">Edad (Año, mes, días)</th>
                                        <th>Nacionalidad</th>
                                        <th>Lugar de Nacimiento</th>
                                        <th>Dirección Domiciliaria</th>
                                        <th>Referencia Domiciliaria</th>
                                        <th>Género</th>
                                        <th>Grupo Étnico</th>
                                        <th>Discapacidad</th>
                                        <th>Porcentaje</th>
                                        <th>Carnet del CONADIS</th>
                                        <th>Tipo de Discapacidad</th>                                       
                                        <th>Asiste a algún establecimiento de Educación Especial</th>
                                        <th>Nombre establecimiento de Educación Especial</th>
                                        <th>Peso</th>
                                        <th>Talla</th>
                                        <th>Nivel</th>
                                        <th>Sobrenombre</th>
                                        <th>CDI</th>
                                        <th>Fotografía</th>
                                        <th>Modificar</th>
                                        <th>Eliminar</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                
                                    <?php
                                    $cont=0;
                                    while ($row = mysqli_fetch_array($run)) {
                                        $cont++;
                                        $idninio = $row['id_ninio'];
                                        $idTipodocumento = $row['id_docide'];
                                        $c_i = $row['numero_docide'];
                                        $last_name = ($row['apellidos']);
                                        $first_name = ($row['nombres']);
                                        $fecha_nac = $row['fecha_nac'];
                                        $anio_ninio = $row['anio'];
                                        $mes_ninio = $row['mes'];
                                        $dia_ninio = $row['dia'];
                                        $pais_nac = $row['pais'];
                                        $ciudad_nac = $row['ciudad'];
                                        $provincia_nac = $row['id_provincia'];
                                        $canton_nac = $row['id_canton'];
                                        $parroquia_nac = $row['id_parroquia'];
                                        $dir = $row['direccion_dom'];
                                        $Referencia_dom = $row['referencia_ubicacion'];
                                        $idgenero_n = $row['id_genero'];
                                        $idetnia_n = $row['id_etnia'];
                                        $ni_discapacidad = $row['discapacidad'];
                                        $ni_porcentaje = $row['porcentaje'];
                                        $carnet_conadis = $row['carnet_conadis'];
                                        $tip_discapacidad_n = $row['id_tipo_discapacidad'];
                                        $estable_discap = $row['asiste_estableci_personas_discapacidad'];
                                        $nombre_estable = $row['nombre_establecimiento'];
                                        $n_peso = $row['peso'];
                                        $n_talla = $row['talla'];
                                        $n_nivel = $row['id_niveles_ninio'];                               
                                        $sobrenombre = $row['como_lo_llaman'];
                                        $cdi = $row['id_cdi'];
                                        $imagen_n = $row['imagen_ninio'];                          
                                    ?>
                                        
                                        
                                        <tr>
                                            <td><input type="checkbox" class="checkboxes" name="checkboxes[]" value="<?php echo $idninio; ?>"></td>
                                            <td><?php echo $cont; ?></td>
                                           <!-- <td><?php // echo $idTipodocumento; ?></td> -->
                                            <td><?php echo $c_i; ?></td>
                                            <td><?php echo "$last_name $first_name "; ?></td>
                                            <td><?php echo $fecha_nac; ?></td>
                                            <td><?php echo "$anio_ninio Año(s), $mes_ninio Mes(es), $dia_ninio Días"; ?></td>
                                            <td><?php echo "$pais_nac $ciudad_nac"; ?></td>
                                            <td><?php echo "$provincia_nac, $canton_nac, $parroquia_nac"; ?></td>
                                            <td><?php echo $dir; ?></td>
                                            <td><?php echo $Referencia_dom; ?></td>
                                            <td><?php echo $idgenero_n; ?></td>
                                            <td><?php echo $idetnia_n; ?></td>
                                            <td><?php echo $ni_discapacidad; ?></td>
                                            <td><?php echo $ni_porcentaje; ?></td>
                                            <td><?php echo $carnet_conadis; ?></td>
                                            <td><?php echo $tip_discapacidad_n; ?></td>
                                            <td><?php echo $estable_discap; ?></td>
                                            <td><?php echo $nombre_estable; ?></td>
                                            <td><?php echo "$n_peso kg."; ?></td>
                                            <td><?php echo "$n_talla cm."; ?></td>
                                            <td><?php echo $n_nivel; ?></td>
                                            <td><?php echo $sobrenombre; ?></td>
                                            <td><?php echo $cdi; ?></td>
                                           <!-- <td><?php// echo $imagen_n; ?></td> -->
                                            <td><img src="img/<?php echo $imagen_n; ?>" width="50px"></td>
                                            <td><a href="editar_datos_ninio.php?edit=<?php echo $idninio; ?>"><i class="far fa-edit"></i></a></td>
                                            <td><a href="niniosregistrados.php?del=<?php echo $idninio; ?>" onclick="return confirm('¿Desea Borrar?');"><i class="fas fa-trash-alt"></i></a></td>
                                        
                                        
                                      
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

                     
   