<?php require_once('inc/top.php'); ?>
<?php
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
} 

//$_nom_cdi = $_SESSION['tipo_cdi'];
//echo $_nom_cdi;
//$_nom_periodo = $_SESSION['periodo_ac'];
//echo $_nom_periodo;

$num_cdi = $_REQUEST['numcdi'];
//echo $num_cdi;
$num_per = $_REQUEST['numper'];
//echo $num_per;

if (isset($_GET['del'])) {
    $del_id = $_GET['del'];
    //echo $del_id;
   // $del_check_query = "SELECT * FROM tbl_datos_personales_ninio ORDER BY id_ninio DESC";
    //$del_check_run = mysqli_query($con, $del_check_query);
   // if (mysqli_num_rows($del_check_run) > 0) {
        $del_query = "UPDATE tbl_datos_personales_ninio SET estado='Inactivo' WHERE id_ninio= $del_id ";

   //     $query_documento_identidad = "SELECT detalle FROM tbl_documento_identidad WHERE id = $idTipodocumento ";
        //if (isset($_SESSION['username']) && $_SESSION['role'] == 'admin') {
            if (mysqli_query($con, $del_query)) {
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
                <?php require_once('../admin/inc/sidebar.php'); ?>
                <?php require_once('inc/sidebar.php'); ?>
                </div>
                <div class="col-md-9">
                    <h1><i class="fa fa-users"></i> Datos Personales del Niño(a) <small>Ver todos</small></h1><hr>
                    <ol class="breadcrumb">
                       <li><a href="index_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>"><i class="fas fa-home"></i> Menú</a></li>   
                       <li><a href="index_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>"><i class="fas fa-chevron-left"></i> Regresar</a></li> 
                        <li class="active"><i class="fa fa-users"></i> Datos Personales del Niño(a)</li>
                    </ol>
                    <?php
                    $query = "SELECT tbl_datos_personales_ninio.id_ninio, tbl_datos_personales_ninio.numero_docide, tbl_datos_personales_ninio.apellidos, tbl_datos_personales_ninio.nombres,
                    tbl_cdi.nombre AS detalle_cdi, tbl_periodo.inicio, tbl_periodo.fin 
                    FROM tbl_datos_personales_ninio
                    INNER JOIN tbl_cdi ON tbl_cdi.id = tbl_datos_personales_ninio.id_cdi
                    INNER JOIN tbl_periodo ON tbl_periodo.id_periodo = tbl_datos_personales_ninio.id_periodo_ninio
                    Where estado='Activo' AND id_cdi = $num_cdi AND id_periodo_ninio = $num_per ORDER BY apellidos ASC";
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


                            <table class="table table-bordered table-striped table-hover" id="example" >
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" id="selectallboxes"></th>
                                        <th>Número</th>
                                        <th>Cédula de Identidad</th>
                                        <th>Apellidos</th>                               
                                        <th>Nombres</th>
                                        <th>Acta de compromiso</th>
                                        
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                
                                    <?php
                                    $cont=0;
                                    while ($row = mysqli_fetch_array($run)) {
                                        $cont++;
                                        $idninio = $row['id_ninio'];
                                        //echo $idninio;
                                       // $idTipodocumento = $row['detalle_di'];
                                        $c_i = $row['numero_docide'];
                                        $last_name = ($row['apellidos']);
                                        $first_name = ($row['nombres']);
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
                                        //$detalle_cdi = $row['detalle_cdi'];
                                        //$ini_periodo = $row['inicio'];
                                        //$fin_periodo = $row['fin'];
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
                                            <td><?php// echo $sobrenombre; ?></td
                                            <td><?php //echo $detalle_cdi; ?></td> 
                                            <td><?php //echo "$ini_periodo $fin_periodo" ; ?></td> >-->
                                           <!-- <td><?php// echo $imagen_n; ?></td> -->
                                           <!--  <td><img src="img/<?php //echo $imagen_n; ?>" width="50px"></td>  -->
                                           <td><center><a href="../reportes_pdf/pdf_acta_compromis_CDIS.php?edit=<?php echo $idninio; ?>&numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" target="_blank" class="btn btn-primary btn-sm">Generar Acta de Compromiso</i></a></center></td>
                                        <!--   <td><a href="niniosregistrados.php?del=<?php //echo $idninio; ?>" onclick="return confirm('¿Desea Borrar?');"><i class="fas fa-trash-alt"></i></a></td> -->                     
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

                     
   