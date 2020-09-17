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

$first_name = $row['nombres'];
$last_name = $row['apellidos'];
$username = $row['ci'];
$email = $row['correo_e'];
$role = $row['tipo'];
$details = $row['direccion_dom'];
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
                            <a href="edit-profile.php?edit=<?php echo $id; ?>" class="btn btn-primary pull-right">Editar Perfil</a><br><br>
                            <center>
                                <h3>Información</h3>
                            </center>

                            
                            <br>
                            <table class="table table-bordered">
                                <tr>
                                    <td width="20%"><b>ID:</b></td>
                                    <td width="30%"><?php echo $id; ?></td>
                                    <td width="20%"><b>Fecha de Ingreso:</b></td>
                                    <td width="30%"><?php //echo "$day $month $year"; ?></td>
                                </tr>
                                <tr>
                                    <td width="20%"><b>Nombre:</b></td>
                                    <td width="30%"><?php echo $first_name; ?></td>
                                    <td width="20%"><b>Apellido:</b></td>
                                    <td width="30%"><?php echo $last_name; ?></td>
                                </tr>
                                <tr>
                                    <td width="20%"><b>Usuario:</b></td>
                                    <td width="30%"><?php echo $username; ?></td>
                                    <td width="20%"><b>Email:</b></td>
                                    <td width="30%"><?php echo $email; ?></td>
                                </tr>
                                <tr>
                                    <td width="20%"><b>Rol:</b></td>
                                    <td width="30%"><?php echo $role; ?></td>
                                    <td width="20%"><b><b>Dirección:</b></b></td>
                                    <td width="30%"><?php echo $details; ?></td>
                                </tr>
                            </table>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php require_once('inc/footer.php'); ?>