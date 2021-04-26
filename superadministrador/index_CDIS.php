<?php 

require_once('inc/top.php');//llamar archivos
$rol= $_SESSION['roleSS'];
 
if(!isset($_SESSION['username'])){
    header('Location: login.php');
}
$session_role1 = $_SESSION['roleSS'];
//echo $session_role1

?>
  </head>
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
                        <li><a href="../admin/index.php"><i class="fas fa-home"></i> Menú</a></li>
                        <li><a href="menu_principal_periodos.php?numcdi=<?php echo $num_cdi; ?>"><i class="fas fa-chevron-left"></i> Regresar</a></li>
                    </ol> 
                   
                    
                    <h2><h2>

<!-- XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX VISITADORA SOCIAL XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX-->
<?php
      if ($session_role1 == '3') {
      ?>
                    <div class="row tag-boxes">
                        <div class="col-md-6 col-lg-3">
                        
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-user-circle fa-5x"></i><!-----------IMAGEN DE PRIMER CUADRO----------->
                                        </div>
                                        <div class="col-xs-9">
                                            <div class="text-right huge"><?php //echo $com_rows;?></div>
                                            <!--<div class="text-right">Comentarios Nuevos</div>-->
                                        </div>
                                    </div>
                                </div>
                                <!-- <a href="../superadministrador/index_cdi1.php?numcdi=<?php //echo $num_cdi; ?>"> -->
                                <a href="menuprincipaldatosninio_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>">
                                <!-- <a href="menuprincipaldatosninio_CDIS.php?numper=<?php //echo $id_periodo_sa; ?>"> -->
                                    <div class="panel-footer letrasmenuficha">
                                        <span class="pull-left">DATOS PERSONALES DEL NIÑO/A</span>
                                        <span class="pull-right "><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                            
                        </div>

                        <div class="col-md-6 col-lg-3">
                            <div class="panel panel-red">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-comments fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9">
                                            <div class="text-right huge"><?php// echo// $post_rows;?></div>
                                            <!--<div class="text-right"></div>-->
                                        </div>
                                    </div>
                                </div>
                                <a href="menuprincipal_ei_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>">
                                    <div class="panel-footer letrasmenuficha">
                                        <span class="pull-left">ENTREVISTA INICIAL<br><br></span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-3">
                            <div class="panel panel-yellow">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-users fa-5x"></i>
                                        </div>
                                            <div class="col-xs-9">
                                                <div class="text-right huge"><?php //echo $user_rows;?></div>
                                                <!--<div class="text-right">Todos los usuarios</div>-->
                                            </div>
                                    </div>
                                </div>
                                        <a href="menuprincipal_se_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>">
                                            <div class="panel-footer letrasmenuficha">
                                                <span class="pull-left">SOCIO ECONÓMICO <br><br></span>
                                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                <div class="clearfix"></div>
                                            </div>
                                        </a>
                            </div>
                        </div>
                           
                     <!--   <div class="col-md-6 col-lg-3">
                            <div class="panel panel-green">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fas fa-file-alt fa-5x"></i> 
                                        </div>
                                        <div class="col-xs-9">
                                            <div class="text-right huge"><?php //echo $cat_rows;?></div>
                                            <div class="text-right">Todas Categorias</div>
                                        </div>   
                                    </div>   
                                 </div>   
                                 <a href="niniosregistrados_acta_compromiso_CDIS.php?numcdi=<?php //echo $num_cdi; ?>&numper=<?php //echo $num_per; ?>">
                                    <div class="panel-footer letrasmenuficha">
                                        <span class="pull-left"> ACTA DE COMPROMISO <br></span>
                                        <span class="pull-right"><br><i class="fa fa-arrow-circle-right"></i></span>                                        <div class="clearfix"></div>
                                    </div> 
                                </a>
                            </div>
                        </div>                                                

                        <div class="col-md-6 col-lg-3">
                            <div class="panel panel-green">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fas fa-clipboard-list fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9">
                                            <div class="text-right huge"><?php //echo $cat_rows;?></div>
                                            <div class="text-right">Todas Categorias</div>
                                        </div>   
                                    </div>   
                                 </div>   
                                 <a href="menuprincipalprocesos_CDIS.php?numcdi=<?php //echo $num_cdi; ?>&numper=<?php //echo $num_per; ?>">
                                    <div class="panel-footer letrasmenuficha">
                                        <span class="pull-left"> PROCESOS <br></span>
                                        <span class="pull-right"><br><br><br><i class="fa fa-arrow-circle-right"></i></span>                                        <div class="clearfix"></div>
                                    </div> 
                                </a>
                            </div>
                        </div>  -->

                        <div class="col-md-6 col-lg-3">
                            <div class="panel panel-green">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fas fa-file-pdf fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9">
                                            <div class="text-right huge"><?php //echo $cat_rows;?></div>
                                           <!-- <div class="text-right">Todas Categorias</div>-->
                                        </div>   
                                    </div>   
                                 </div>   
                                 <a href="menuprincipal_reportes_CDIS.php">
                                    <div class="panel-footer letrasmenuficha">
                                        <span class="pull-left"> REPORTES <br></span>
                                        <span class="pull-right"><br><br><br><i class="fa fa-arrow-circle-right"></i></span>                                        <div class="clearfix"></div>
                                    </div> 
                                </a>
                            </div>
                        </div>
                    </div><hr></hr>
                    <?php }  else {?>

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX MENU PRINCIPAL SUPER ADMINISTRADOR XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX-->
                   

                    <div class="row tag-boxes">
                        <div class="col-md-6 col-lg-3">
                        
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-user-circle fa-5x"></i><!-----------IMAGEN DE PRIMER CUADRO----------->
                                        </div>
                                        <div class="col-xs-9">
                                            <div class="text-right huge"><?php //echo $com_rows;?></div>
                                            <!--<div class="text-right">Comentarios Nuevos</div>-->
                                        </div>
                                    </div>
                                </div>
                                <!-- <a href="../superadministrador/index_cdi1.php?numcdi=<?php //echo $num_cdi; ?>"> -->
                                <a href="menuprincipaldatosninio_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>">
                                <!-- <a href="menuprincipaldatosninio_CDIS.php?numper=<?php //echo $id_periodo_sa; ?>"> -->
                                    <div class="panel-footer letrasmenuficha">
                                        <span class="pull-left">DATOS PERSONALES DEL NIÑO/A</span>
                                        <span class="pull-right "><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                            
                        </div>

                        <div class="col-md-6 col-lg-3">
                            <div class="panel panel-red">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-comments fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9">
                                            <div class="text-right huge"><?php// echo// $post_rows;?></div>
                                            <!--<div class="text-right"></div>-->
                                        </div>
                                    </div>
                                </div>
                                <a href="menuprincipal_ei_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>">
                                    <div class="panel-footer letrasmenuficha">
                                        <span class="pull-left">ENTREVISTA INICIAL<br><br></span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-3">
                            <div class="panel panel-yellow">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-users fa-5x"></i>
                                        </div>
                                            <div class="col-xs-9">
                                                <div class="text-right huge"><?php //echo $user_rows;?></div>
                                                <!--<div class="text-right">Todos los usuarios</div>-->
                                            </div>
                                    </div>
                                </div>
                                        <a href="menuprincipal_se_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>">
                                            <div class="panel-footer letrasmenuficha">
                                                <span class="pull-left">SOCIO ECONÓMICO <br><br></span>
                                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                <div class="clearfix"></div>
                                            </div>
                                        </a>
                            </div>
                        </div>
                           
                        <div class="col-md-6 col-lg-3">
                            <div class="panel panel-green">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fas fa-file-alt fa-5x"></i> 
                                        </div>
                                        <div class="col-xs-9">
                                            <div class="text-right huge"><?php //echo $cat_rows;?></div>
                                           <!-- <div class="text-right">Todas Categorias</div>-->
                                        </div>   
                                    </div>   
                                 </div>   
                                 <a href="niniosregistrados_acta_compromiso_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>">
                                    <div class="panel-footer letrasmenuficha">
                                        <span class="pull-left"> ACTA DE COMPROMISO <br></span>
                                        <span class="pull-right"><br><i class="fa fa-arrow-circle-right"></i></span>                                        <div class="clearfix"></div>
                                    </div> 
                                </a>
                            </div>
                        </div>                                                
                           
                        <div class="col-md-6 col-lg-3">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fas fa-syringe fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9">
                                            <div class="text-right huge"><?php //echo $cat_rows;?></div>
                                           <!-- <div class="text-right">Todas Categorias</div>-->
                                        </div>   
                                    </div>   
                                 </div>   
                                 <a href="niniosregistrados_vacunas_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>">
                                    <div class="panel-footer letrasmenuficha">
                                        <span class="pull-left"> VACUNAS <br></span>
                                        <span class="pull-right"><br><br><br><i class="fa fa-arrow-circle-right"></i></span>                                        <div class="clearfix"></div>
                                    </div> 
                                </a>
                            </div>
                        </div>                                                

                        <div class="col-md-6 col-lg-3">
                            <div class="panel panel-red">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fas fa-clipboard-list fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9">
                                            <div class="text-right huge"><?php //echo $cat_rows;?></div>
                                           <!-- <div class="text-right">Todas Categorias</div>-->
                                        </div>   
                                    </div>   
                                 </div>   
                                 <a href="menuprincipalprocesos_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>">
                                    <div class="panel-footer letrasmenuficha">
                                        <span class="pull-left"> PROCESOS <br></span>
                                        <span class="pull-right"><br><br><br><i class="fa fa-arrow-circle-right"></i></span>                                        <div class="clearfix"></div>
                                    </div> 
                                </a>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-3">
                            <div class="panel panel-yellow">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fas fa-file-pdf fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9">
                                            <div class="text-right huge"><?php //echo $cat_rows;?></div>
                                           <!-- <div class="text-right">Todas Categorias</div>-->
                                        </div>   
                                    </div>   
                                 </div>   
                                 <a href="menuprincipal_reportes_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>">
                                    <div class="panel-footer letrasmenuficha">
                                        <span class="pull-left"> REPORTES <br></span>
                                        <span class="pull-right"><br><br><br><i class="fa fa-arrow-circle-right"></i></span>                                        <div class="clearfix"></div>
                                    </div> 
                                </a>
                            </div>
                        </div>
                    </div><hr></hr> 


                        <?php } ?>




                </div>
                
            </div>
            
        </div>

<?php require_once('inc/footer.php');?>