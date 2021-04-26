<?php
require_once('inc/top.php');
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
} /*else if (isset($_SESSION['username']) && $_SESSION['role'] == 'author') {
    header('Location: index.php');
}*/

if (isset($_GET['edit'])) {//si esque hay la variable edit
    $edit_id = $_GET['edit'];//get y post sirven para atrapar datos.
    //echo($edit_id);
    $edit_query = "SELECT * FROM tbl_usuario WHERE id_usuario = $edit_id";
    $edit_query_run = mysqli_query($con, $edit_query);
   // if (mysqli_num_rows($edit_query_run) > 0) {/*if numero de filas es mayor q 0*/
        $edit_row = mysqli_fetch_array($edit_query_run);//fetch array sirve para que tu atrapestoda la fila de una table... fetch assoc.
        //$row = mysqli_fetch_array($run)
        $tipo_docum = $edit_row['id_docide'];
        $ci=$edit_row['ci'];
        $apellidos=$edit_row['apellidos'];
        $nombre = $edit_row['nombres'];
        $fecha_ing = $edit_row['fecha_ingreso'];
        $tipo = $edit_row['tipo'];
        $direccion = $edit_row['direccion_dom'];
        $correo = $edit_row ['correo_e'];
        $telefono = $edit_row['telefono'];
        $contrasenia = $edit_row['contrasenia'];
        $id_cdi = $edit_row['id_cdi'];
        
   // } else {
       // header('location: index.php');
  /*  }*/
} else {
    header("location: index.php");
}
?>
</head>
<body>
<div id="wrapper">
        <?php require_once('inc/header.php'); ?>

        <div class="container-fluid body-section">
            <div class="row">
                <div class="col-md-3">
                <?php require_once('../admin/inc/sidebar.php'); ?>
                </div>
                <div class="col-md-9">
                    <h1><i class="fa fa-user-plus"></i> Editar<small> Usuario</small></h1><hr>
                    <ol class="breadcrumb">
                         <li><a href="index.php"><i class="fas fa-home"></i> Menú</a></li>
                        <li class="active"><i class="fa fa-user-plus"></i> Nuevo Usuario</li>
                    </ol>
                    <?php
                    if (isset($_POST['submit'])) {//si se ha presionado el boton subbmit
                        
                    
                        $username = ( $_POST['ci']);

                        if (empty($username)) {
                            $error = "Debe llenar el campo";
                        }else {
                            $check_query = "SELECT * FROM tbl_usuario WHERE ci = $username";
                            $check_run = mysqli_query($con, $check_query);                     
                            if (mysqli_num_rows($check_run) > 0) {
                                $error = "Número de documento de identidad existente";
                            } else {
                     
                        $consulta="UPDATE tbl_usuario set ci='$username' where id_usuario = '$edit_id'";
                        //$ejecutar = mysqli_query($con, $consulta);//ejecutar consulta
                        //header("location: users.php");
                        if (mysqli_query($con, $consulta)) {

                            
                        //header('location: ../admin/index.php');
                          //     $msg = "Usuario ingresado";
                           $msg = "Información actualizada";                          
                          // header("Location: ../admin/index.php"); /*para poder volver al blog o login*/
                         } 
                         else {
                           $error = "Información no actualizada";
                         }
                        
                        //$password = crypt($password, $salt);
                    }
                    }   
                    }
                    ?>
                    <div class="row">
                        <div class="col-md-8">
                        <form action="" method="post" enctype="multipart/form-data">
                             
                            <?php
                                if (isset($error)) {
                                  echo "<span style='color:red;' class='pull-right'>$error</span>";
                                } else if (isset($msg)) {
                                  echo "<span style='color:green;' class='pull-right'>$msg</span>";
                                }
                            ?>

                                
                                
                                
                                <div class="form-group">
                                    <label for="username">Número de documento de identidad (Escribir el número de documento sin guión):</label>
                                    <input type="text" id="username" name="ci" class="form-control" value="<?php echo($ci);
                                    
                                    ?>" maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57' >
                                </div>


                                         

                               
                                <input type="submit" value="Actualizar información" name="submit" class="btn btn-primary">
                                                                
                                <a href="edit-user.php?edit=<?php echo $edit_id; ?>">
                                  <button type="button" class="btn btn-primary">Regresar</button>
                                </a>
                        </form>
                            
                        </div>
                                
                    </div>
                </div>
            </div>
        </div>

    <?php require_once('inc/footer.php'); ?>
                    