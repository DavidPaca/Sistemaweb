<?php 

require_once('inc/top.php');//llamar archivos
$rol= $_SESSION['roleSS'];
 
if(!isset($_SESSION['username'])){
    header('Location: login.php');
}
$session_role1 = $_SESSION['roleSS'];
?>
  </head>
  <body>
    <div id="wrapper">





        <?php 
        require_once('../superadministrador/inc/header.php');
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
<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX MENU ADMINISTRADOR SISTEMA XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX-->                    
                    <?php
                      if ($session_role1 == '1') {
                    ?>
                    

                        <div class="row tag-boxes">
                                <?php
                                    $sql = "SELECT * FROM `tbl_cdi` WHERE id !=100 AND id !=101 AND id !=102"; 
                                    $run = mysqli_query($con, $sql);     
                                    $cont=0;
                                    while ($row = mysqli_fetch_array($run)){
                                        $id_cdi = $row['id'];
                                        $cdis_mostrar = $row['nombre'];
                                        $cont++;
                                ?>                             
                                <div class="col-md-6 col-lg-3 text-center">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading ">
                                            <div class="row ">  
                                                <i class="fa fa-university fa-3x  " style="align-items:center"></i>  <!-----------IMAGEN DE PRIMER CUADRO----------->
                                                <div class="col-xs-9">
                                                    <div class="text-right huge"><?php //echo $com_rows;?></div>
                                                    <!--<div class="text-right">Comentarios Nuevos</div>-->
                                                </div>
                                            </div> 
                                        </div> 
                                        <!-- <a href="profile_datos_ninio.php?edit=<?php //echo $idninio; ?>"><i class="far fa-file-alt"></i></a> -->
                                        <a href="../superadministrador/menu_principal_periodos.php?numcdi=<?php echo $id_cdi; ?>">
                                            <div class="panel-footer letrasmenuficha">
                                                <span class="pull-left">CENTRO DE DEARROLLO INFANTIL <?php echo $cont ?></span>
                                                <span class="pull-right "><i class="fa fa-arrow-circle-right"></i></span>
                                                <div class="clearfix"></div>
                                            </div>
                                        </a>
                                    </div>                                
                                </div>
                                <?php } ?>  
                        </div>
                                <?php } ?>


<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX MENU COORDINADOR GENERAL XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX-->                    
                    <?php
                      if ($session_role1 == '2') {
                    ?>

                    <div class="row tag-boxes">
                        <?php
                        $sql = "SELECT * FROM `tbl_cdi` WHERE id !=100 AND id !=101 AND id !=102"; 
                        $run = mysqli_query($con, $sql);     
                        $cont=0;
                        while ($row = mysqli_fetch_array($run)){
                            $id_cdi = $row['id'];
                            $cdis_mostrar = $row['nombre'];
                            $cont++;
                        ?>                             
                        <div class="col-md-6 col-lg-3 text-center">
                            <div class="panel panel-primary">
                                <div class="panel-heading ">
                                    <div class="row ">  
                                        <i class="fa fa-university fa-3x  " style="align-items:center"></i>  <!-----------IMAGEN DE PRIMER CUADRO----------->
                                        <div class="col-xs-9">
                                            <div class="text-right huge"><?php //echo $com_rows;?></div>
                                            <!--<div class="text-right">Comentarios Nuevos</div>-->
                                        </div>
                                    </div> 
                                </div> 
                                    <!-- <a href="profile_datos_ninio.php?edit=<?php //echo $idninio; ?>"><i class="far fa-file-alt"></i></a> -->
                                    <a href="../superadministrador/menu_principal_periodos.php?numcdi=<?php echo $id_cdi; ?>">
                                        <div class="panel-footer letrasmenuficha">
                                            <span class="pull-left">CENTRO DE DEARROLLO INFANTIL <?php echo $cont ?></span>
                                            <span class="pull-right "><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                            </div>
                                
                        </div>
                        <?php } ?>                                    
                    </div>
                    <?php } ?>


<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX MENU VISITADORA SOCIAL XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX-->                    
                    <?php
                      if ($session_role1 == '3') {
                    ?>

                    <div class="row tag-boxes">
                            <?php
                            $sql = "SELECT * FROM `tbl_cdi` WHERE id !=100 AND id !=101 AND id !=102"; 
                            $run = mysqli_query($con, $sql);     
                            $cont=0;
                            while ($row = mysqli_fetch_array($run)){
                                $id_cdi = $row['id'];
                                $cdis_mostrar = $row['nombre'];
                                $cont++;
                            ?>                             
                            <div class="col-md-6 col-lg-3 text-center">
                                <div class="panel panel-primary">
                                    <div class="panel-heading ">
                                        <div class="row ">  
                                            <i class="fa fa-university fa-3x  " style="align-items:center"></i>  <!-----------IMAGEN DE PRIMER CUADRO----------->
                                            <div class="col-xs-9">
                                                <div class="text-right huge"><?php //echo $com_rows;?></div>
                                                <!--<div class="text-right">Comentarios Nuevos</div>-->
                                            </div>
                                        </div> 
                                    </div> 
                                    <!-- <a href="profile_datos_ninio.php?edit=<?php //echo $idninio; ?>"><i class="far fa-file-alt"></i></a> -->
                                    <a href="../superadministrador/menu_principal_periodos.php?numcdi=<?php echo $id_cdi; ?>">
                                        <div class="panel-footer letrasmenuficha">
                                            <span class="pull-left">CENTRO DE DEARROLLO INFANTIL <?php echo $cont ?></span>
                                            <span class="pull-right "><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                                
                            </div>
                        <?php
                        } 
                        ?>                     
                    
                    </div>
                    <?php } ?>

                    


<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX MENU PRINCIPAL COORDINADOR XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX-->
                    <?php
                      if ($session_role1 == '4') {
                    ?>

                    <div class="row tag-boxes">
                        <div class="col-md-6 col-lg-3">                        
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-user-circle fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9">
                                            <div class="text-right huge"><?php ?></div>
                                            
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
                                            <div class="text-right huge"><?php?></div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <a href="menuprincipal_ei.php">
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
                                        <a href="menuprincipal_se.php">
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
                                 <a href="niniosregistrados_acta_compromiso.php">
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
                                            <i class="fas fa-clipboard-list fa-5x"></i>
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

                        <div class="col-md-6 col-lg-3">
                            <div class="panel panel-red">
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
                                 <a href="menuprincipal_reportes.php">
                                    <div class="panel-footer letrasmenuficha">
                                        <span class="pull-left"> REPORTES <br></span>
                                        <span class="pull-right"><br><br><br><i class="fa fa-arrow-circle-right"></i></span>                                        <div class="clearfix"></div>
                                    </div> 
                                </a>
                            </div>
                        </div>
                    </div><hr></hr> 

                    <?php } ?>


                    <!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX MENU VISITADORA SOCIAL XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX-->                    
                    <?php
                      if ($session_role1 == '6') {
                    ?>

                    <div class="row tag-boxes">
                        <?php
                        $sql = "SELECT * FROM `tbl_cdi` WHERE id !=100 AND id !=101 AND id !=102"; 
                        $run = mysqli_query($con, $sql);     
                        $cont=0;
                        while ($row = mysqli_fetch_array($run)){
                            $id_cdi = $row['id'];
                            $cdis_mostrar = $row['nombre'];
                            $cont++;
                        ?>                             
                            <div class="col-md-6 col-lg-3 text-center">
                                <div class="panel panel-primary">
                                    <div class="panel-heading ">
                                        <div class="row ">  
                                            <i class="fa fa-university fa-3x  " style="align-items:center"></i>  <!-----------IMAGEN DE PRIMER CUADRO----------->
                                            <div class="col-xs-9">
                                                <div class="text-right huge"><?php //echo $com_rows;?></div>
                                                <!--<div class="text-right">Comentarios Nuevos</div>-->
                                            </div>
                                        </div> 
                                    </div> 
                                    <!-- <a href="profile_datos_ninio.php?edit=<?php //echo $idninio; ?>"><i class="far fa-file-alt"></i></a> -->
                                    <a href="../superadministrador/menu_principal_periodos.php?numcdi=<?php echo $id_cdi; ?>">
                                        <div class="panel-footer letrasmenuficha">
                                            <span class="pull-left">CENTRO DE DEARROLLO INFANTIL <?php echo $cont ?></span>
                                            <span class="pull-right "><i class="fa fa-arrow-circle-right"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                                
                            </div>




                        <?php } ?>                     
                    
                        </div>
                           
                        

                    <?php } ?>


                    


<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX MENU PRINCIPAL PARVULARIO XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX-->        
<?php
                      if ($session_role1 == '5') {
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
                                <a href="niniosregistrados_ci.php">
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

                        <?php } ?>

                
                
            </div>            
        </div>
    </div>

<?php require_once('inc/footer.php');?>
</div>