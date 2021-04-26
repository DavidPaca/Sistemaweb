<?php
require_once('inc/top.php');//llamar archivos
if(!isset($_SESSION['username'])){
    header('Location: login.php');
}

$num_cdi = $_REQUEST['numcdi'];
//echo $num_cdi;
//$num_per = $_REQUEST['numper'];
//echo $num_per;

?>
  </head>
  <body>
    <div id="wrapper">





<?php
require_once('inc/header.php');
//require_once('inc/menufichas.php');

?>

        <div class="container-fluid body-section">
            <div class="row">
                <div class="col-md-3">
                <?php require_once('../admin/inc/sidebar.php'); ?>

                </div>


                <div class="col-md-9">
                   <h1><i class="fa fa-tachometer"></i> Panel <small> Administración</small></h1><hr>
                    <ol class="breadcrumb">
                    <li><a href="../admin/index.php"><i class="fas fa-home"></i> Menú</a></li>

                    </ol>


                    <h2><h2>

                    <div class="row tag-boxes">

                        <?php
                            $sql = "SELECT * FROM `tbl_periodo`";
                            $run = mysqli_query($con, $sql);
                            $cont=0;
                            while ($row = mysqli_fetch_array($run)){
                                $id_periodo_sa = $row['id_periodo'];
                                $inicio_sa = $row['inicio'];
                                $fin_sa = $row['fin'];
                                $cont++;
                            ?>
                                <div class="col-md-6 col-lg-3">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <div class="row">

                                                <div class="col-xs-9">
                                                    <div class="text-right huge"><?php //echo $com_rows;?></div>
                                                    <!--<div class="text-right">Comentarios Nuevos</div>-->
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <a href="destino.php?variable1=valor1&variable2=valor2">Mi enlace</a> -->
                                         <a href="index_CDIS.php?numper=<?php echo $id_periodo_sa; ?>&numcdi=<?php echo $num_cdi; ?>">
                                        <!-- <a href="index_CDIS.php?numcdi=<?php //echo $num_cdi; ?>"> -->

                                            <div class="panel-footer">
                                                <span class="pull-left"><?php echo "$inicio_sa $fin_sa"; ?></span>
                                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span> <!-- Es la flecha de la esquina inferior del icono -->
                                                <div class="clearfix"></div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>


                    </div>
                </div>
            </div>
        </div>
          <?php require_once('inc/footer.php');?>
    </div>