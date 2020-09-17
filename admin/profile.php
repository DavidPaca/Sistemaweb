<?php
require_once('inc/top.php');
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}

$session_username = $_SESSION['username'];
//echo($session_username);

$query = "SELECT * FROM tbl_usuario WHERE ci = '$session_username'";
$run = mysqli_query($con, $query);
$row = mysqli_fetch_array($run);

$image = $row['imagen_usuario'];
$id = $row['id_usuario'];
$tipo_docum = $row['id_docide'];
$username = $row['ci'];
$last_name = $row['apellidos'];
$first_name = $row['nombres'];
$fecha_ing = $row['fecha_ingreso'];
$role = $row['tipo'];
$dir = $row['direccion_dom'];
$tlf = $row['telefono'];
$email = $row['correo_e'];
$cdi = $row['id_cdi'];



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
                        
                            <center><img src="img/<?php echo $image; ?>" width="150px" class="rounded" id="profile-image"></center>
                            <a href="edit-profile.php?edit=<?php echo $id; ?>" class="btn btn-primary pull-right">Editar Perfil</a><br>
                            <center>
                                <h3>Información</h3>
                            </center>

                            
                            <br>
                            <table class="table table-bordered">
                                                       
                                <tr>
                                    <td width="20%"><b>Número:</b></td>
                                    <td width="30%"><?php echo $id; ?></td> 
                                </tr>    
                                <tr>
                                    <td width="20%"><b>Tipo de documento:</b></td>
                                    <td width="30%"><?php echo $tipo_docum; ?></td>
                                    <td width="20%"><b>Número de documento de identificación:</b></td>
                                    <td width="30%"><?php echo $username; ?></td>
                                </tr>
                                <tr>
                                    <td width="20%"><b>Apellidos:</b></td>
                                    <td width="30%"><?php echo $last_name; ?></td>
                                    <td width="20%"><b>Nombres:</b></td>
                                    <td width="30%"><?php echo $first_name; ?></td>
                                </tr>
                                <tr>
                                    <td width="20%"><b>Fecha de ingreso:</b></td>
                                    <td width="30%"><?php echo $fecha_ing; ?></td>
                                    <td width="20%"><b>Tipo de usuario:</b></td>
                                    <td width="30%"><?php echo $role; ?></td>
                                </tr>
                                <tr>
                                    <td width="20%"><b><b>Dirección:</b></b></td>
                                    <td width="30%"><?php echo $dir; ?></td>
                                    <td width="20%"><b>Teléfono:</b></td>
                                    <td width="30%"><?php echo $tlf; ?></td>
                                    
                                </tr>
                                <tr>
                                    <td width="20%"><b>Email:</b></td>
                                    <td width="30%"><?php echo $email; ?></td>
                                    <td width="20%"><b>Centro de Desarrollo Infantil:</b></td>
                                    <td width="30%"><?php echo $cdi; ?></td>
                                </tr>
                            </table>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php require_once('inc/footer.php'); ?>