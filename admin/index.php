<?php 

require_once('inc/top.php');//llamar archivos
if(!isset($_SESSION['username'])){
    header('Location: login.php');
}
$session_role1 = $_SESSION['roleSS'];
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
                    <?php require_once('inc/sidebar.php');?>
                    
                </div>

                
                <div class="col-md-9">
                   <h1><i class="fa fa-tachometer"></i> Panel <small> Administración</small></h1><hr>
                    <ol class="breadcrumb">
                    <li class="active"><i class="fa fa-tachometer"></i> Inicio</li>
                    </ol> 
                   
                    
                    <h2><h2>

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
                                <a href="menuprincipaldatosninio.php">
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
                                <a href="ing_entrevista_i.php">
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
                                        <a href="ing_socio_eco.php">
                                            <div class="panel-footer letrasmenuficha">
                                                <span class="pull-left">SOCIO ECONÓMICO <br><br></span>
                                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                <div class="clearfix"></div>
                                            </div>
                                        </a>
                            </div>
                        </div>



                           <?php
                             if ($session_role1 == 'Coordinador') {
                           ?>
                        <div class="col-md-6 col-lg-3">
                            <div class="panel panel-green">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-folder-open fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9">
                                            <div class="text-right huge"><?php //echo $cat_rows;?></div>
                                           <!-- <div class="text-right">Todas Categorias</div>-->
                                        </div>   
                                    </div>   
                                 </div>   
                                 <a href="menuprincipalprocesos.php">
                                    <div class="panel-footer letrasmenuficha">
                                        <span class="pull-left"> PROCESOS <br></span>
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