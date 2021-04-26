<?php
$session_role2 = $_SESSION['roleSS'];
$session_username2 = $_SESSION['username'];
$session_tipo_cdi = $_SESSION['tipo_cdi'];

//echo $session_role2;
//echo $session_username2;
//echo $session_tipo_cdi;
//$num_cdi = $_REQUEST['numcdi'];
//echo $num_cdi;
//$num_per = $_REQUEST['numper'];
//echo $num_per;


require_once('../inc/db.php');//CONEXION CON BASE DE DATOS
        /**CONSULTA PARA HALLAR NOMBRE Y APELLIDO DE USUARIO */
        $sql="select * from tbl_usuario where ci = '$session_username2'";
        $check_username_run = mysqli_query($con, $sql);//ejecutar consulta 
        $row = mysqli_fetch_array($check_username_run); //atratpa todos los valores de la fila
        $db_nombre = $row['nombres'];
        $db_Apellido = $row['apellidos'];

        /**CONSULTA PARA ATRAPAR EL NOMBRE DE CDI */
        $sql2="SELECT tbl_usuario.id_docide, tbl_usuario.ci, tbl_usuario.apellidos, tbl_usuario.nombres, tbl_usuario.fecha_ingreso,
        tbl_usuario.direccion_dom, tbl_usuario.telefono, tbl_usuario.correo_e, tbl_usuario.contrasenia, tbl_usuario.id_cdi,
        tbl_usuario.imagen_usuario, tbl_usuario.tipo, tbl_usuario_nombre.detalle AS detalle_nivel_usuario
        FROM tbl_usuario
        INNER JOIN tbl_usuario_nombre ON tbl_usuario_nombre.id_usuario_nombre = tbl_usuario.tipo
        WHERE tbl_usuario.tipo  = $session_role2";
        $check_username_run2 = mysqli_query($con, $sql2);//ejecutar consulta 
        $row2 = mysqli_fetch_array($check_username_run2); //atratpa todos los valores de la fila
        $db_nombre_cdi = $row2['nombres'];
        $db_Apellido = $row2['apellidos'];
        $db_nivel_usuario = $row2['detalle_nivel_usuario'];
        //echo $db_nombre_cdi;
        //echo $db_Apellido;

?>
<nav class="navbar navbar-default navbar-fixed-top " style="background-color:#595757">
    <div class="container-fluid">
        <div class="navbar-header">
            <!--***************************LOGO ADMIN *****************************-->
         <a class="navbar-brand" href="../admin/index.php"><img src="img/logoescudoGADM.png" class="img-responsive" style="width: 170px; height: 45px; margin-top: -10px"></a> <!--para el logo de la empresa-->
        </div>
        <div class="navbar-collapse collapse" id="navbar">
            <ul class="nav navbar-nav">
                <!--<li><a href="add-post.php"><i class="fa fa-plus-square" title="Agregar Noticia"></i> Ver Noticia</a></li>-->
                <?php
                if ($session_role2 == 'detalle_nivel_usuario') {
                    ?>
              <!--      <li><a href="add-user.php"><i class="fa fa-user-plus" title="Agregar Usuario"></i>Agregar Usuario</a></li>    -->
                <?php } ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a><i class="fa fa-user"></i> <?php echo ($db_Apellido.' '.$db_nombre); ?></a></li>
                <li><a><i class="far fa-user-circle fa-1x"></i> <?php echo ($db_nivel_usuario); ?></a></li>
                <?php
                if ($session_role2 == '1') {
                    ?>
                  <li><a></a></li> 
            <?php } ?>
            <!--    <li><a><i class="far fa-user-circle fa-1x"></i> <?php  //echo ($db_nombre_cdi); ?></a></li>    --> 

                <li><a href="profile_CDIS.php"><i class="fa fa-user" title="Ver Perfil"></i>Ver Perfil</a></li>
                <li><a href="logout.php"><i class="fas fa-sign-out-alt" title="Salir"></i></a></li>
            </ul>
        </div>
    </div>
</nav>



<!--
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Fábrica</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">

            </ul>
        </div>
    </div>
</nav>-->