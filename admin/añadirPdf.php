<?php
require_once('inc/top.php');
/*if (!isset($_SESSION['username'])) {
    header('Location: login.php');
} else if (isset($_SESSION['username']) && $_SESSION['role'] == 'author') {
    header('Location: index.php');
}*/
$username=$_SESSION['username'];
?>
</head>
<body>
    <div id="wrapper">
        <?php require_once('inc/header.php'); ?>

        <div class="container-fluid body-section">
            <div class="row">
                <div class="col-md-3">
                    <?php require_once('inc/sidebar.php'); ?>
                </div>
                <div class="col-md-9">
                    <h1><i class="fas fa-file-upload"></i> Agregar<small> Nuevo </small></h1><hr>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fas fa-home"></i> Menú</a></li>
                        <li class="active"><i class="fas fa-file-upload"></i> Nuevo Documento</li>
                    </ol>
                    
                   
                        
                    <?php
                    if (isset($_POST['subir'])) {


                        $nombre = $_FILES['archivo']['name'];
                        $tipo = $_FILES['archivo']['type'];
                        $tamanio = $_FILES['archivo']['size'];
                        $ruta = $_FILES['archivo']['tmp_name'];
                        $destino = "archivos/" . $nombre;
//                        $check_query = "SELECT * FROM tbl_documentos WHERE titulo = '$titulo'";
//                        $check_run = mysqli_query($con, $check_query);
                        if ($nombre != "") {
                            if (copy($ruta, $destino)) {
                                $titulo = $_POST['titulo'];
                                $descri = $_POST['descripcion'];
                                $fechaActual = date('Y-m-d'); 
                                //echo $fechaActual();
                            

                                $insert_query = "INSERT INTO tbl_documents (id_doc,Titulo,descripcion,fecha,ruta) VALUES (null,'$titulo','$descri','$fechaActual','$nombre')";
                                $query = mysqli_query($con, $insert_query);

                                /**********sacar Id Documento */
                                $sql_id_doc="SELECT id_doc FROM tbl_documents WHERE 1 ORDER BY id_doc DESC LIMIT 0, 1";
                                $result4=$con->query($sql_id_doc);
                                $row4 = mysqli_fetch_assoc($result4);
                                //echo($row4['id_doc']);
                                $id_doc=$row4['id_doc'];
                                //echo($username);
                                
                                /******************************** */
                                /***********sacar el Id de usuario*********** */
                                $sql_id_user="select id FROM users WHERE username = '$username'";
                                $result5=$con->query($sql_id_user);
                                $row5 = mysqli_fetch_assoc($result5);
                                //echo($row5['id']);
                                $id_user=$row5['id'];
                                echo($id_user);
                                /*********ingresar en tabla user_doc*********** */

                                $sql_insert_user_doc = "INSERT INTO tbl_user_doc (id_user,id_doc) VALUES ('$id_user','$id_doc')";
                                $result6 = mysqli_query($con, $sql_insert_user_doc);
                                /****************************************** */
//                                if (empty($titulo) or empty($descri)) {
//                                    $error = "Todos los (*) Campos son requeridos";
//                                } else if (mysqli_num_rows($check_run) > 0) {
//                                    $error = "nombre ya existe";
//                                } else
                                if ($query) {
                                    echo "Se guardo correctamente";
                                }
                            } else {
                                echo "Error al subir domento";
                            }
                        }
                    }
                    ?>
                    <div class="row">
                        <div class="col-md-8">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="first-name">Titulo :*</label>
                                    <?php
                                    if (isset($error)) {
                                        echo "<span class='pull-right' style='color:red;'>$error</span>";
                                    } else if (isset($msg)) {
                                        echo "<span class='pull-right' style='color:green;'>$msg</span>";
                                    }
                                    ?>
                                    <input type="text" id="first-name" name="titulo" class="form-control" value="<?php
                                    if (isset($titulo)) {
                                        echo $titulo;
                                    }
                                    ?>" placeholder="Titulo">
                                </div>

                                <div class="form-group">
                                    <label for="last-name">Descripcion :*</label>
                                    <input type="text" id="last-name" name="descripcion" class="form-control" value="<?php
                                    if (isset($descripcion)) {
                                        echo $descripcion;
                                    }
                                    ?>" placeholder="Descripción">
                                </div>


                                <div class="form-group">
                                    <label for="image">Documento :*</label>
                                    <input type="file" id="image" name="archivo" accept="application/pdf">
                                </div>

                                <input type="submit" value="Agregar D" name="subir" class="btn btn-primary">
                                <!--<a href="listaAñadirPdf.php">lista</a>-->
                            </form>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>

        <?php require_once('inc/footer.php'); ?>