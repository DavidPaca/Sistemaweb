<?php 
require_once('inc/top.php');//llamar archivos
if(!isset($_SESSION['username'])){
    header('Location: login.php');
}

?>

<body>
    <div id="wrapper">

<?php 
require_once('inc/header.php');
//require_once('inc/menufichas.php'); 

$num_cdi = $_REQUEST['numcdi'];
//echo $num_cdi;
$num_per = $_REQUEST['numper'];
//echo $num_per;

?>

        <div class="container-fluid body-section">
            <div class="row">
                <div class="col-md-3">
                <?php require_once('../admin/inc/sidebar.php'); ?>
                <?php require_once('inc/sidebar.php'); ?>
                </div>

                
                <div class="col-md-9">
                   <h1><i class="fa fa-tachometer"></i> Panel <small> Administración</small></h1><hr>
                    <ol class="breadcrumb">
                    <li><a href="index_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>"><i class="fas fa-home"></i> Menú</a></li>

                    </ol> 
                   
                    
                    <h2><h2>

                    <div class="row tag-boxes">
                            

                            <?php
                           if ($session_role1 == 3){ ?>
                            <div class="col-md-6 col-lg-3">
                                <div class="panel panel-red">
                                        <div class="panel-heading">
                                            <div class="row">
                                                
                                                <div class="col-xs-9">
                                                    <div class="text-right huge"><?php //echo $com_rows;?></div>
                                                    <!--<div class="text-right">Comentarios Nuevos</div>-->
                                                </div>
                                            </div>
                                        </div>
                                        <a href="nientrevistaregistrada_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>">
                                            <div class="panel-footer">
                                                <span class="pull-left">Entrevista Inicial Registrada </span>
                                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span> <!-- Es la flecha de la esquina inferior del icono -->
                                                <div class="clearfix"></div>
                                            </div>
                                        </a>
                                </div>
                            </div>
                            

                          <?php } else { ?>
                            <div class="col-md-6 col-lg-3">
                            
                                <div class="panel panel-red">
                                    <div class="panel-heading">
                                        <div class="row">
                                            
                                            <div class="col-xs-9">
                                                <div class="text-right huge"><?php //echo $com_rows;?></div>
                                                <!--<div class="text-right">Comentarios Nuevos</div>-->
                                            </div>
                                        </div>
                                    </div>
                                    <a href="niniosregistrados_ei_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>">
                                        <div class="panel-footer">
                                            <span class="pull-left">Ingresar Entrevista Inicial</span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span> <!-- Es la flecha de la esquina inferior del icono -->
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-3">
                                <div class="panel panel-red">
                                        <div class="panel-heading">
                                            <div class="row">
                                                
                                                <div class="col-xs-9">
                                                    <div class="text-right huge"><?php //echo $com_rows;?></div>
                                                    <!--<div class="text-right">Comentarios Nuevos</div>-->
                                                </div>
                                            </div>
                                        </div>
                                        <a href="nientrevistaregistrada_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>">
                                            <div class="panel-footer">
                                                <span class="pull-left">Entrevista Inicial Registrada </span>
                                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span> <!-- Es la flecha de la esquina inferior del icono -->
                                                <div class="clearfix"></div>
                                            </div>
                                        </a>
                                </div>
                            </div>
                          <?php } ?>



                    </div>
                </div>

                   


                
                    
            
                
        </div>
            
    </div>

<?php require_once('inc/footer.php');?>

</div>