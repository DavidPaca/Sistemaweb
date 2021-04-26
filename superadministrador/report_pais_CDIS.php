<?php
require_once('inc/top.php');
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    }
/*} else if (isset($_SESSION['username']) && $_SESSION['role'] == 'author') {
    header('Location: index.php');
}*/
//$num_cdi = $_REQUEST['numcdi'];
//echo $num_cdi;
//$num_per = $_REQUEST['numper'];
//echo $num_per;
$num_cdi = $_REQUEST['numcdi'];
//echo $num_cdi;
$num_per = $_REQUEST['numper'];
//echo $num_per;
$tipo_user = $_SESSION['roleSS'];
//echo $tipo_user;

//echo "HOLA REPROTE";


if (isset($_GET['edit'])) {
    $edit_id = $_GET['edit'];
}

$sql="SELECT * FROM `tbl_usuario_nombre` WHERE  id_usuario_nombre = $tipo_user;";
        
        $check_username_run = mysqli_query($con, $sql);//ejecutar consulta 
        $row = mysqli_fetch_array($check_username_run); //atratpa todos los valores de la fila
        $db_id_us_nivel = $row['id_usuario_nombre'];
        $db_detalle = $row['detalle'];
        $db_nivel_permisos = $row['nivel_permisos'];
//echo $db_id_us_nivel;

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
                    <h1><i class="fas fa-file-pdf"></i> País </h1><hr>
                    <ol class="breadcrumb">
                        <li><a href="index_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>"><i class="fas fa-home"></i> Menú</a></li>
                        <li><a href="menuprincipal_reportes_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>"><i class="fa fa-list-ul"></i> Lista de Reportes</a></li>
                    </ol>

                    <div class="row">                
                        <div class="col-md-6"><br>
                            <?php                          
                            $get_query = "SELECT * FROM tbl_pais ORDER BY detalle ASC";
                            $get_run = mysqli_query($con, $get_query);
                            if (mysqli_num_rows($get_run) > 0) {

                                if (isset($del_msg)) {
                                    echo "<span class='pull-right' style='color:green;'>$del_msg</span>";
                                } else if (isset($del_error)) {
                                    echo "<span class='pull-right' style='color:red;'>$del_error</span>";
                                }
                                ?>


                                <table class="table table-bordered table-striped table-hover" id="example" >

                                    <thead>
                                        <tr>
                                            <th>Número</th>
                                            <th>Detalle</th>
                                            <th><center>Reporte</center></th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $cont = 0;
                                        while ($get_row = mysqli_fetch_array($get_run)) {
                                            $repor_id = $get_row['id_pais'];
                                            $detalle_report = $get_row['detalle'];
                                            $cont++;
                                            ?>
                                            <tr>
                                                <td><?php echo $cont; ?></td>
                                                <td><?php echo ($detalle_report); ?></td>
                                              
                                                <td><center><a href="../reportes_pdf/pdf_lista_pais_CDIS.php?edit=<?php echo $repor_id; ?>&numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" target="_blank" class="btn btn-primary btn-sm">Reporte</i></a></center></td>
                                           
                                            <!--    <td><a href="proalimentos_PROC.php?del=<?php //echo $alimento_id; ?>&numcdi=<?php //echo $num_cdi; ?>&numper=<?php //echo $num_per; ?>" onclick="return confirm('¿Desea Borrar?');"><i class="fas fa-trash-alt"></i></a></td>  -->
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <?php
                            } else {
                                echo "<center><h3>Lista vacía</h3></center>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            
        </div>
    </div>
        

        <?php require_once('inc/footer.php'); ?>