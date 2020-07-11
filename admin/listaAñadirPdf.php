<?php
require_once('inc/top.php');
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
} else if (isset($_SESSION['username']) && $_SESSION['role'] == 'author') {
    //header('Location: index.php');
}
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
                    <h1><i class="fa fa-file"></i> Listado<small> Documentos </small></h1><hr>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fas fa-home"></i> Menú</a></li>
                        <li class="active"><i class="fa fa-file"></i> Listado</li>
                    </ol>
                   
                    <?php
                    /************hallar usuario id********* */
                    $sql_id_user="select id FROM users WHERE username = '$username'";
                                $result5=$con->query($sql_id_user);
                                $row5 = mysqli_fetch_assoc($result5);
                                //echo($row5['id']);
                                $id_user=$row5['id'];
                                echo($id_user);
                    /************* ************************/

                    if ($_SESSION['role'] == 'admin') {
                        //$query = "SELECT * FROM tbl_documents";
                        $query = "SELECT tbl_documents.id_doc, tbl_documents.Titulo, users.first_name, users.last_name, tbl_documents.fecha, tbl_documents.ruta, tbl_documents.descripcion 
                                    FROM tbl_documents INNER JOIN tbl_user_doc ON tbl_documents.id_doc = tbl_user_doc.id_doc 
                                    INNER JOIN users ON tbl_user_doc.id_user = users.id";
                        $run = mysqli_query($con, $query);

                    } else if ($_SESSION['role'] == 'author') {
                        /**poner id de usuario */
                        $query = "SELECT tbl_documents.id_doc, tbl_documents.Titulo, users.first_name, users.last_name, tbl_documents.fecha, tbl_documents.ruta, tbl_documents.descripcion 
                        FROM tbl_documents INNER JOIN tbl_user_doc ON tbl_documents.id_doc = tbl_user_doc.id_doc 
                        INNER JOIN users ON tbl_user_doc.id_user = users.id where users.id ='$id_user' ";
                        $run = mysqli_query($con, $query);
                    }
                    if (mysqli_num_rows($run) > 0) {
                        ?>
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                            <?php
                            if (isset($error)) {
                                echo "<span style='color:red;' class='pull-right'>$error</span>";
                            } else if (isset($msg)) {
                                echo "<span style='color:green;' class='pull-right'>$msg</span>";
                            }
                            ?>
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" id="selectallboxes"></th>
                                                                                
                                        <th>Título</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Fecha</th>
                                        <th>Descargar</th>                                        
                                        <th>Descripcion</th>                                        
                                        <th>Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row = mysqli_fetch_array($run)) {
                                        $id = $row['id_doc'];
                                        $title = $row['Titulo'];
                                        $nombre = $row['first_name'];
                                        $apellido = $row['last_name'];
                                        $fecha = $row['fecha'];
                                        $author = $row['ruta'];
                                        $descri = $row['descripcion'];
                                        
                                        ?>
                                        <tr>
                                            <td><input type="checkbox" class="checkboxes" name="checkboxes[]" value="<?php echo $id; ?>"></td>
                                            
                                            <td><?php echo "$title"; ?></td>
                                            <td><?php echo "$nombre"; ?></td>
                                            <td><?php echo "$apellido"; ?></td>
                                            <td><?php echo "$fecha"; ?></td>
                                            

                                            <td><a href="archivos/<?php echo $author; ?>"> <?php echo $author; ?></a></td>
                                            <!--<td><a href=""<?/*php echo $author;*/?>></a></td>-->
                                            <td><?php echo "$descri"; ?></td>  
                                            <td><a href="eliminar_archivo.php/?del=<?php echo $id; ?>" class="text-center"><i class="fas fa-trash-alt"></i></a></td>
                                        </tr>
                                    <?php } ?>


                                </tbody>
                            </table>

                            <?php
                        } else {
                            echo "<center><h2>Ninguna información publicada</h2></center>";
                        }
                        ?>


                    </form>
                </div>

                    
                </div>
            </div>
            <?php require_once('inc/footer.php'); ?>
        </div>

        