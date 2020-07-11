<?php 
require_once('inc/top.php');//llamar archivos
if(!isset($_SESSION['username'])){
    header('Location: login.php');
}

/*$comment_tag_query = "SELECT * FROM comments WHERE status = 'pendiente'";
$category_tag_query = "SELECT * FROM categories";
$users_tag_query = "SELECT * FROM users";
$posts_tag_query = "SELECT * FROM posts";

$com_tag_run = mysqli_query($con, $comment_tag_query);
$cat_tag_run = mysqli_query($con, $category_tag_query);
$user_tag_run = mysqli_query($con, $users_tag_query);
$post_tag_run = mysqli_query($con, $posts_tag_query);


/*$com_rows = mysqli_num_rows($com_tag_run);
$cat_rows = mysqli_num_rows($cat_tag_run);
$user_rows = mysqli_num_rows($user_tag_run);
//$post_rows = mysqli_num_rows($post_tag_run);*/
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

               <!-- <div class="col-md-9">
                    <?php //require_once('inc/menufichas.php');?>
                </div> -->
               

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX  EJEMPLO VA AQUI   XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX-->




<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX  HASTA A AQUI   XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX-->


                
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
                                <a href="ing_dp_ninio.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">DATOS PERSONALES DEL NIÑO</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
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
                                    <div class="panel-footer">
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
                                    <div class="panel-footer">
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
                                            <i class="fa fa-folder-open fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9">
                                            <div class="text-right huge"><?php //echo $cat_rows;?></div>
                                            <!--<div class="text-right">Todas Categorias</div>-->
                                        </div>
                                    </div>
                                 </div>
                               <a href="ing_nutricion.php">
                                    <div class="panel-footer">
                                        <span class="pull-left"> PROCESOS <br></span>
                                        <span class="pull-right"><br><br><br><i class="fa fa-arrow-circle-right"></i></span>                                        <div class="clearfix"></div>
                                    </div> 
                                </a>
                            </div>
                        </div>
                    </div><hr></hr>

                    <!--*****************************inicio de la tabla de usuarios***********************************-->
                 <!--   <h1><i class="fa fa-users"></i> Usuarios <small>Registrados</small></h1><hr>
                    
                    <?php
                    /*$query = "SELECT * FROM tbl_usuario ORDER BY id_usuario DESC";
                    $run = mysqli_query($con, $query);
                    if (mysqli_num_rows($run) > 0) {*/
                        ?>
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="row">
                                        <div class="col-xs-4">   -->
                                            
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <?php
                            /*if (isset($error)) {
                                echo "<span style='color:red;' class='pull-right'>$error</span>";
                            } else if (isset($msg)) {
                                echo "<span style='color:green;' class='pull-right'>$msg</span>";
                            }*/
                            ?>
                          <!--  <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" id="selectallboxes"></th>
                                        <th>Apellidos/Nombre</th>
                                        <th>Cedula-Identidad</th>
                                        <th>Tipo Usuario</th>
                                        <th>Email</th>
                                        <th>Dirección</th>
                                        <th>Telefono</th>
                                        <th>CDI</th>   -->
                                        
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                  /*  while ($row = mysqli_fetch_array($run)) {
                                        $id = $row['id_usuario'];
                                        $first_name = ucfirst($row['nombres']);
                                        $last_name = ucfirst($row['apellidos']);
                                        $email = $row['correo_e'];
                                        $username = $row['ci'];
                                        $role = $row['tipo'];
                                        $dir = $row['direccion_dom'];
                                        $tlf = $row['telefono'];
                                        $cdi = $row['id_cdi'];
                                        */
                                      
                                        ?>
                                  <!--      <tr>
                                            <td><input type="checkbox" class="checkboxes" name="checkboxes[]" value="<?php //echo $id; ?>"></td>
                                            <td><?php //echo "$last_name $first_name "; ?></td>
                                            <td><?php //echo $username; ?></td>
                                            <td><?php //echo $role; ?></td>
                                            <td><?php //echo $email; ?></td>
                                            <td><?php //echo $dir; ?></td>
                                            <td><?php //echo $tlf; ?></td>
                                            <td><?php //echo $cdi; ?></td>  -->
                                            
                                           
                                        </tr>
                                    <?php// } ?>
                                </tbody>
                            </table>
                            <?php
                   /*     } else {
                            echo "<center><h2>Usuarios no disponibles por ahora</h2></center>";
                        }  */
                        ?>
                    </form>


                    <!--*****************************fin de la tabla de usuarios***********************************-->
                    <!--<table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Id #</th>
                                <th>Fecha</th>
                                <th>Nombre</th>
                                <th>Usuario</th>
                                <th>Rol</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php/* 
                            while($get_users_row = mysqli_fetch_array($get_users_run)){
                                $users_id = $get_users_row['id'];
                                $users_date = getdate($get_users_row['date']);
                                $users_day = $users_date['mday'];
                                $users_month = substr($users_date['month'],0,3);
                                $users_year = $users_date['year'];
                                $users_firstname = $get_users_row['first_name'];
                                $users_lastname = $get_users_row['last_name'];
                                $users_fullname = "$users_firstname $users_lastname";
                                $users_username = $get_users_row['username'];
                                $users_role = $get_users_row['role'];
                            
                            */?>
                            <tr>
                                <td><?php //echo $users_id;?></td>
                                <td><?php //echo "$users_day $users_month $users_year";?></td>
                                <td><?php// echo $users_fullname;?></td>
                                <td><?php //echo ucfirst($users_username);?></td>
                                <td><?php// echo ucfirst($users_role);?></td>
                            </tr>
                            <?php// }?>
                        </tbody>
                    </table>
                    -->
                    
                    <!--<a href="users.php" class="btn btn-primary">Ver todos los usuarios</a><hr>-->
                    <?php// }?>
                    
                    <?php
                    $get_posts_query = "SELECT * FROM posts ORDER BY id DESC LIMIT 5";
                    $get_posts_run = mysqli_query($con,$get_posts_query);
                    //if(mysqli_num_rows($get_posts_run) > 0){
                        
                    
                    ?>
                    <!--<h3>Nuevos post</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Id #</th>
                                <th>Fecha</th>
                                <th>Titulo post</th>
                                <th>Categoría</th>
                                <th>Vista</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php /*
                            while($get_posts_row = mysqli_fetch_array($get_posts_run)){
                                $posts_id = $get_posts_row['id'];
                                $posts_date = getdate($get_posts_row['date']);
                                $posts_day = $posts_date['mday'];
                                $posts_month = substr($posts_date['month'],0,3);
                                $posts_year = $posts_date['year'];
                                $posts_title = $get_posts_row['title'];
                                $posts_categories = $get_posts_row['categories'];
                                $posts_views = $get_posts_row['views'];
                            
                           */ ?>
                            <tr>
                                <td><?php //echo $posts_id;?></td>
                                <td><?php// echo "$posts_day $posts_month $posts_year";?></td>
                                <td><?php// echo $posts_title;?></td>
                                <td><?php// echo ucfirst($posts_categories);?></td>
                                <td><i class="fa fa-eye"></i> <?php //echo $posts_views;?></td>
                            </tr>
                            <?php //}?>
                        </tbody>
                    </table>
                    <a href="posts.php" class="btn btn-primary">Ver todos los post</a>
                    <?php// }?>-->
                    
                </div>
                
            </div>
            
        </div>

<?php //require_once('inc/footer.php');?>