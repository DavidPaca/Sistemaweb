<?php
require_once('inc/top.php');
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    
}

$session_username = $_SESSION['username'];
$session_author_image = $_SESSION['author_image'];
?>
</head>
<body>
    <div id="wrapper">
        <?php require_once('inc/header.php'); 
            $username=$_SESSION['username'];
        ?>

        <div class="container-fluid body-section">
            <div class="row">
                <div class="col-md-3">
                    <?php require_once('inc/sidebar.php'); ?>
                </div>
                <div class="col-md-9">
                    <h1><i class="fa fa-briefcase"></i> Añadir<small> Concurso</small></h1><hr>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fas fa-home"></i> Menú </a></li>
                        <li class="active"><i class="fa fa-briefcase"></i>  Añadir Cocncurso</li>
                    </ol>
                    <!--*********Sacar Imagen del Usuario-->
                    <?php
                         //$sql_id_user="select image FROM users WHERE username = '$username'";
                         //$result5=$con->query($sql_id_user);
                        // $row5 = mysqli_fetch_assoc($result5);
                         //echo($row5['id']);
                         ///$image_user=$row5['image'];
                         //echo($image_user);
                    ?>
                    <!--***********ingresar noticia*********-->
                    <?php
                    if (isset($_POST['submit'])) {
                        
                        $title = mysqli_real_escape_string($con, $_POST['title']);
                        $post_data = mysqli_real_escape_string($con, $_POST['post-data']);
                        $image = $_FILES['image']['name'];
                        $tmp_name = $_FILES['image']['tmp_name'];
                        $date = time();

                        if (empty($title) or empty($post_data) or empty($image)) {
                            $error = "Los campos con(*) son obligados";
                        } else {
                            $insert_query = "INSERT INTO tbl_concurso (titulo, descripcion,imagen,fecha_con) VALUES ('$title','$post_data','$image','$date') 
                            ";
                            if (mysqli_query($con, $insert_query)) {
                                $msg = "Información Subida";
                                
                                $title = "";
                                $post_data = "";
                                $path = "img/$image";
                                if (move_uploaded_file($tmp_name, $path)) {
                                    copy($path, "../$path");
                                }
                            } else {
                                $error = "Información no añadida";
                            }
                        }
                    }
                    ?>
                   


                    <div class="row">
                        <div class="col-xs-12">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="title"> Título :*</label>
                                    <?php
                                    if (isset($msg)) {
                                        echo "<div class='alert alert-danger' style='color:green;><i class='fa fa-close'></i>$msg</div>";
                                    } else if (isset($error)) {
                                        echo "<div class = 'alert alert-success' role = 'alert' style = 'color:red;'><i class='fa fa-close'></i>$error
                        </div>";
                                    }
                                    ?>
                                    <input type="text" name="title" placeholder="Ingrese un título para su publicación" value="<?php
                                    if (isset($title)) {
                                        echo $title;
                                    }
                                    ?>" class="form-control">
                                </div>


                                <div class="form-group">
                                    <textarea name="post-data" id="textarea" rows="10" class="form-control"><?php
                                        if (isset($post_data)) {
                                            echo $post_data;
                                        }
                                        ?></textarea>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <!--<div class="form-group">
                                            <label for="file">Documento relacionado :*</label>
                                            <input type="file" name="image" accept="application/pdf">
                                        </div>-->
                                        <div class="form-group">
                                            <label for="file">Imagen relacionada :*</label>
                                            <input type="file" name="image" >
                                        </div>
                                    </div>
                                   
                                </div>

                                <div class="row">
                                    
                                    
                                </div>
                                <input type="submit" class="btn btn-primary" value="Agregar Noticia" name="submit">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php require_once('inc/footer.php'); ?>