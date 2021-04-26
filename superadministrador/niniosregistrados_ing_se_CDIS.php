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
   // $del_check_query = "SELECT * FROM tbl_datos_personales_ninio ORDER BY id_ninio DESC";
    //$del_check_run = mysqli_query($con, $del_check_query);
   // if (mysqli_num_rows($del_check_run) > 0) {
        $del_query = "UPDATE tbl_datos_personales_ninio SET estado='Inactivo' WHERE id_ninio= $del_id";

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

if (isset($_POST['checkboxes'])) {

    foreach ($_POST['checkboxes'] as $del_id) {

        $bulk_option = $_POST['bulk-options'];

        if ($bulk_option == 'delete') {
            $bulk_del_query = "UPDATE tbl_datos_personales_ninio SET estado='Inactivo' WHERE id_ninio= $del_id";
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
                    <?php require_once('inc/sidebar.php'); ?>    <!--fas fa-house-user ,fas fa-hand-holding-usd, fad fa-house-user, far fa-house-user   -->
                </div>
                <div class="col-md-9">
                    <h1><i class="fas fa-hand-holding-usd"></i> Información Socio Económica <small>Ver todos</small></h1><hr>
                    <ol class="breadcrumb">
                       <li><a href="index_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>"><i class="fas fa-home"></i> Menú</a></li>
                       <li><a href="menuprincipal_se_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>"><i class="fas fa-chevron-left"></i> Regresar</a></li>    
                        <li class="active"><i class="fa fa-users"></i> Información Socio Económica</li>
                    </ol>
                    <?php
                    $query = "SELECT * FROM tbl_datos_personales_ninio WHERE estado='Activo' AND id_cdi = $num_cdi AND id_periodo_ninio = $num_per ORDER BY apellidos ASC";
                    $run = mysqli_query($con, $query);
                    if (mysqli_num_rows($run) > 0) {                        
                        ?>
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <div class="form-group">
                                                <select name="bulk-options" id="" class="form-control">
                                                    
                                                    <option value="">Seleccionar</option>
                                                    <option value="delete">Eliminar</option>
                                                    <!--    <option value="author">Subir</option>
                                                    <option value="admin">Bajar</option>  --> 
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-8">
                                            <input type="submit" class="btn btn-success" value="Aplicar cambios">
                                            <a href="ing_dp_ninio_SU_AD.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="btn btn-primary">Agregar Nuevo</a>
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
                                       <!-- <th>Tipo de Documento</th> -->
                                        <th>Cedula de Identidad</th>
                                        <th>Apellidos</th>
                                        <th>Nombres</th>                               
                                        <th>Ingrese Informacion Socio Económica</th>
                                        <!--    <th>Eliminar</th>  -->
                                       
                                        
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
                                        $estado_socio_ec = $row['estado_se'];
                                                                  
                                    ?>
                                        
                                        
                                        <tr>
                                            <td><input type="checkbox" class="checkboxes" name="checkboxes[]" value="<?php echo $idninio; ?>"></td>
                                            <td><?php echo $cont; ?></td>
                                           <!-- <td><?php // echo $idTipodocumento; ?></td> -->
                                            <td><?php echo $c_i; ?></td>
                                            <td><?php echo $last_name ; ?></td>
                                            <td><?php echo $first_name; ?></td>


                                            <?php
                                        if ($estado_socio_ec == 0){ ?>
                                            <td><a href="ing_socio_eco_SU_AD.php?edit=<?php echo $idninio; ?>&numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>"><i class="far fa-file-alt"></i></a></td>
                                            <?php  } else{ ?>
                                               <td><i id = "block_edit" class="far fa-file-alt"></i></td> 
                                               <?php    }  ?>
                                         
                                          
                                            
                                               <!--    <td><a href="niniosregistrados.php?del=<?php //echo $idninio; ?>" onclick="return confirm('¿Desea Borrar?');"><i class="fas fa-trash-alt"></i></a></td>  --> 
                                            
                                                        
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <?php
                        } else {
                            echo "<center><h2>Lista de niños vacía</h2></center>";
                        }
                        ?>
                    </form>
                </div>
            </div>

        </div>

        


    <?php require_once('inc/footer.php'); ?>

                    
   