<?php
require_once('inc/top.php');
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}

if (isset($_GET['edit'])) {//si esque hay la variable edit
    $edit_id = $_GET['edit'];//get y post sirven para atrapar datos.

//$session_username = $_SESSION['username'];
//echo($session_username);

$query = "SELECT   tbl_usuario.id_usuario, tbl_usuario.ci,  tbl_usuario.apellidos,  tbl_usuario.nombres,  tbl_usuario.fecha_ingreso,  tbl_usuario.tipo,  tbl_usuario.direccion_dom,  tbl_usuario.telefono,  tbl_usuario.correo_e,  tbl_usuario.contrasenia,  tbl_usuario.imagen_usuario,  tbl_usuario.id_docide, tbl_documento_identidad.detalle AS detalle_di,
tbl_usuario.id_cdi, tbl_cdi.nombre AS detalle_cdi, tbl_periodo.inicio, tbl_periodo.fin
                   FROM  tbl_usuario 
                   INNER JOIN tbl_documento_identidad 
                   ON  tbl_usuario.id_docide = tbl_documento_identidad.id_docide 
                   INNER JOIN tbl_cdi
                   ON  tbl_usuario.id_cdi = tbl_cdi.id
                   INNER JOIN tbl_periodo
                   ON tbl_periodo.id_periodo = tbl_usuario.id_periodo_usuario
                   Where  tbl_usuario.id_usuario = $edit_id";
$run = mysqli_query($con, $query);
$row = mysqli_fetch_array($run);

        $tipo_docum = $row['detalle_di'];
        $ci=$row['ci'];
        $apellidos=$row['apellidos'];
        $nombre = $row['nombres'];
        $fecha_ing = $row['fecha_ingreso'];
        $tipo = $row['tipo'];
        $direccion = $row['direccion_dom'];
        $correo = $row ['correo_e'];
        $telefono = $row['telefono'];
        $contrasenia = $row['contrasenia'];
        $id_cdi = $row['detalle_cdi']; 
        $periodo_in = $row['inicio']; 
        $periodo_fin = $row['fin'];
        $image = $row['imagen_usuario'];
    } 
?>
</head>
<body id="profile">
    <div id="wrapper">
        <?php require_once('inc/header.php'); ?>

        <div class="container-fluid body-section">
            <div class="row">
                <div class="col-md-3">
                    <?php require_once('inc/sidebar.php'); ?>
                </div>
                <div class="col-md-9">
                    <h1><i class="fa fa-user"></i> Datos<small> Personales</small></h1><hr>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fas fa-home"></i> Menú</a></li>
                        <li class="active"><i class="fa fa-user"></i> Perfil</li>
                    </ol>

                    

                    <div class="row">
                    
                        <div class="col-xs-12">
                        
                            <center><img src="img/<?php echo $image; ?>" width="200px" class="rounded" id="profile-image"></center><br>
                            
                            <center>
                                <h3>Información</h3>
                            </center>

                            <?php echo $_GET['edit']; ?>
                            
                            
                            
                            <br>
                            <table class="table table-bordered">
                                <tr>
                                    <td width="20%"><b>Tipo de documento de identidad:</b></td>
                                    <td width="30%"><?php echo $tipo_docum; ?></td>
                                    <td width="20%"><b>Número de documento de identidad:</b></td>
                                    <td width="30%"><?php echo $ci ?></td>
                                </tr>
                                <tr>
                                    <td width="20%"><b>Apellidos:</b></td>
                                    <td width="30%"><?php echo $apellidos; ?></td>
                                    <td width="20%"><b>Nombres:</b></td>
                                    <td width="30%"><?php echo $nombre; ?></td>
                                </tr>
                                <tr>
                                    <td width="20%"><b>Fecha de ingreso:</b></td>
                                    <td width="30%"><?php echo $fecha_ing; ?></td>
                                    <td width="20%"><b>Tipo de usuario:</b></td>
                                    <td width="30%"><?php echo $tipo; ?></td>
                                </tr>
                                <tr>
                                    <td width="20%"><b>Dirección:</b></td>
                                    <td width="30%"><?php echo $direccion; ?></td>
                                    <td width="20%"><b><b>Correo electrónico:</b></b></td>
                                    <td width="30%"><?php echo $correo; ?></td>
                                </tr>
                                <tr>
                                    <td width="20%"><b>Teléfono:</b></td>
                                    <td width="30%"><?php echo $telefono; ?></td>
                                    <td width="20%"><b><b>Período acádemico:</b></b></td>
                                    <td width="30%"><?php echo "$periodo_in $periodo_fin"; ?></td>
                                </tr>
                                <tr>
                                    <td width="20%"><b><b>Nombre de CDI:</b></b></td>
                                    <td width="30%"><?php echo $id_cdi; ?></td>
                                </tr>
                            </table>
                            <center> <a href="edit-user.php?edit=<?php echo $edit_id; ?>" class="btn btn-primary">Editar Perfil</a>
                            <a href="users.php">
                                            <button type="button" class="btn btn-primary">Regresar</button>
                                </a></center>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php require_once('inc/footer.php'); ?>