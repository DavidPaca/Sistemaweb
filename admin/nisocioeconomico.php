<?php require_once('inc/top.php'); ?>
<?php
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
} 

$_nom_cdi = $_SESSION['tipo_cdi'];
//echo $_nom_cdi; 
$_nom_periodo = $_SESSION['periodo_ac'];
//echo $_nom_periodo;

if (isset($_GET['del'])) {
    $del_id = $_GET['del'];
   // $del_check_query = "SELECT * FROM tbl_datos_personales_ninio ORDER BY id_ninio DESC";
    //$del_check_run = mysqli_query($con, $del_check_query);
   // if (mysqli_num_rows($del_check_run) > 0) {
        $del_query = "UPDATE tbl_datos_personales_ninio SET estado_se= 0 WHERE id_ninio= $del_id";

   //     $query_documento_identidad = "SELECT detalle FROM tbl_documento_identidad WHERE id = $idTipodocumento ";
        //if (isset($_SESSION['username']) && $_SESSION['role'] == 'admin') {
            if (mysqli_query($con, $del_query)) {
                //header('Location: niniosregistrados.php');
                $msg = "Registro eliminado";
            } else {
                $error = "Registro no eliminado";
            }     
}

if (isset($_GET['del'])) {
    $del_id = $_GET['del'];
   // $del_check_query = "SELECT * FROM tbl_datos_personales_ninio ORDER BY id_ninio DESC";
    //$del_check_run = mysqli_query($con, $del_check_query);
   // if (mysqli_num_rows($del_check_run) > 0) {
    $del_query_se = "DELETE FROM tbl_socio_economica WHERE tbl_socio_economica.id_ninio_se = $del_id";

   //     $query_documento_identidad = "SELECT detalle FROM tbl_documento_identidad WHERE id = $idTipodocumento ";
        //if (isset($_SESSION['username']) && $_SESSION['role'] == 'admin') {
            if (mysqli_query($con, $del_query_se)) {
                //header('Location: niniosregistrados.php');
                $msg = "Registro eliminado";
            } else {
                $error = "Registro no eliminado";
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
                    <h1><i class="fas fa-hand-holding-usd"></i> Información Socio Económica Registrada <small>Ver todos</small></h1><hr>
                    <ol class="breadcrumb">
                       <li><a href="index.php"><i class="fas fa-home"></i> Menú</a></li>   
                       <li><a href="menuprincipal_se.php"><i class="fas fa-chevron-left"></i> Regresar</a></li> 
                        <li class="active"><i class="fa fa-users"></i> Información Socio Económica Registrada</li>
                    </ol>
                    <?php
                    $query = "SELECT * FROM tbl_datos_personales_ninio Where estado='Activo' AND id_cdi = $_nom_cdi AND id_periodo_ninio = $_nom_periodo ORDER BY apellidos ASC";
                    $run = mysqli_query($con, $query);
                    if (mysqli_num_rows($run) > 0) {
                        ?>
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="row">
                                    <!--    <div class="col-xs-4">
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
                                            <a href="ing_socio_eco.php" class="btn btn-primary">Agregar Nuevo</a>
                                        </div>  -->
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


                            <table class="table table-bordered table-striped table-hover" id="example" >
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" id="selectallboxes"></th>
                                        <th>Número</th>
                                        <th>Cedula de Identidad</th>
                                        <th>Apellidos</th>                               
                                        <th>Nombres</th>
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
                                        $idninio = $row['id_ninio'];
                                       // $idTipodocumento = $row['detalle_di'];
                                        $c_i = $row['numero_docide'];
                                        $last_name = ($row['apellidos']);
                                        $first_name = ($row['nombres']);
                                        $estado_socio_ec = $row['estado_se'];
                                        //$fecha_nac = $row['fecha_nac'];
                                       // $anio_ninio = $row['anio'];
                                       // $mes_ninio = $row['mes'];
                                       // $dia_ninio = $row['dia'];
                                        //$pais_nac = $row['detalle_pais'];
                                        //$provincia_nac = $row['detalle_provincia'];
                                        //$canton_nac = $row['detalle_canton'];
                                        //$parroquia_nac = $row['detalle_parroquia'];
                                       // $dir = $row['direccion_dom'];
                                       // $Referencia_dom = $row['referencia_ubicacion'];
                                        //$idgenero_n = $row['detalle_genero'];
                                        //$idetnia_n = $row['detalle_etnia'];
                                       // $ni_discapacidad = $row['discapacidad'];
                                       // $ni_porcentaje = $row['porcentaje'];
                                        //$carnet_conadis = $row['carnet_conadis'];
                                        //$tip_discapacidad_n = $row['detalle_tdicapacidad'];
                                        //$estable_discap = $row['asiste_estableci_personas_discapacidad'];
                                        //$nombre_estable = $row['nombre_establecimiento'];
                                        //$n_peso = $row['peso'];
                                        //$n_talla = $row['talla'];
                                        //$n_nivel = $row['detalle_nivel_ninio'];                               
                                        //$sobrenombre = $row['como_lo_llaman'];
                                        //$cdi = $row['detalle_cdi'];
                                        //$imagen_n = $row['imagen_ninio'];                          
                                    ?>
                                        
                                        
                                        <tr>
                                            <td><input type="checkbox" class="checkboxes" name="checkboxes[]" value="<?php echo $idninio; ?>"></td>
                                            <td><?php echo $cont; ?></td>
                                            <!--<td><?php // echo $idTipodocumento; ?></td> -->
                                            <td><?php echo $c_i; ?></td>
                                            <td><?php echo $last_name ; ?></td>
                                            <td><?php echo $first_name; ?></td>
                                           <!-- <td><?php //echo "$anio_ninio Año(s), $mes_ninio Mes(es), $dia_ninio Días"; ?></td> -->
                                           
                                          <!--  <td><?php //echo $ni_discapacidad; ?></td>
                                            <td><?php// echo $ni_porcentaje; ?></td>
                                            <td><?php //echo $carnet_conadis; ?></td>
                                            <td><?php //echo $tip_discapacidad_n; ?></td>
                                            <td><?php //echo $estable_discap; ?></td>
                                            <td><?php //echo $nombre_estable; ?></td>
                                            <td><?php// echo "$n_peso kg."; ?></td>
                                            <td><?php// echo "$n_talla cm."; ?></td>
                                            <td><?php// echo $n_nivel; ?></td>
                                            <td><?php// echo $sobrenombre; ?></td>
                                            <td><?php// echo $cdi; ?></td> -->
                                           <!-- <td><?php// echo $imagen_n; ?></td> -->
                                           <!--  <td><img src="img/<?php //echo $imagen_n; ?>" width="50px"></td>  -->
                                           <?php
                                           if ($estado_socio_ec == 1){ ?>
                                           <td><a href="profile_socio_eco.php?edit=<?php echo $idninio; ?>"><i class="far fa-file-alt"></i></a></td>  
                                            <?php  } else{ ?>
                                               <td><i id = "block_edit" class="far fa-file-alt"></i></td> 
                                               <?php    }  ?>
                                               <?php
                                        if ($estado_socio_ec == 1){ ?>
                                   <td><a href="editar_socio_eco.php?edit=<?php echo $idninio; ?>"><i class="far fa-edit"></i></a></td>
                                    <?php  } else{ ?>
                                        <td><i id = "block_edit" class="far fa-file-alt"></i></td> 
                                        <?php    }  ?>

                                           
                                            
                                            <td><a href="nisocioeconomico.php?del=<?php echo $idninio; ?>" onclick="return confirm('¿Desea Borrar?');"><i class="fas fa-trash-alt"></i></a></td>
                                        
                                        
                                      
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

                     
   