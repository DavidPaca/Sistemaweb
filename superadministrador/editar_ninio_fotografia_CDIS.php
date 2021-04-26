<?php
require_once('../admin/inc/top.php');
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}
ob_start();
require_once('../inc/db.php');//CONEXION CON BASE DE DATOS

$num_cdi = $_REQUEST['numcdi'];
//echo $num_cdi;
$num_per = $_REQUEST['numper'];
//echo $num_per;

if (isset($_GET['edit'])) {//si esque hay la variable edit
    $edit_id = $_GET['edit'];//get y post sirven para atrapar datos.
    //echo($edit_id);

    $edit_query = "SELECT * FROM tbl_datos_personales_ninio WHERE id_ninio = $edit_id";
    $edit_query_run = mysqli_query($con, $edit_query);
   // if (mysqli_num_rows($edit_query_run) > 0) {/*if numero de filas es mayor q 0*/
        $edit_row = mysqli_fetch_array($edit_query_run);//fetch array sirve para que tu atrapestoda la fila de una table... fetch assoc.
        //$row = mysqli_fetch_array($run)
      
        
        $idninio = $edit_row['id_ninio'];
        //echo $idninio;
        //echo 'HOLA';
        /*$idTipodocumento = $edit_row['id_docide'];
        $c_i = $edit_row['numero_docide'];
        $last_name = $edit_row['apellidos'];
        $first_name = $edit_row['nombres'];*/
        //$fecha_nac = $edit_row['fecha_nac'];
       /* $anio_ninio = $edit_row['anio'];
        $mes_ninio = $edit_row['mes'];
        $dia_ninio = $edit_row['dia'];
        $pais_nac = $edit_row['pais'];
        $provincia_nac = $edit_row['id_provincia'];
        $canton_nac = $edit_row['id_canton'];
        $parroquia_nac = $edit_row['id_parroquia'];
        $dir = $edit_row['direccion_dom'];
        $Referencia_dom = $edit_row['referencia_ubicacion'];
        $idgenero_n = $edit_row['id_genero'];
        $idetnia_n = $edit_row['id_etnia'];*/
        //$ni_discapacidad = $edit_row['discapacidad'];
        //echo $ni_discapacidad;
        //echo "HOLA SI";
        /*$ni_porcentaje = $edit_row['porcentaje'];
        $carnet_conadis = $edit_row['carnet_conadis'];
        $tip_discapacidad_n = $edit_row['id_tipo_discapacidad'];
        $estable_discap = $edit_row['asiste_estableci_personas_discapacidad'];
        $nombre_estable = $edit_row['nombre_establecimiento'];*/
        /*$n_peso = $edit_row['peso'];
        $n_talla = $edit_row['talla'];
        $n_nivel = $edit_row['id_niveles_ninio'];
        $sobrenombre = $edit_row['como_lo_llaman'];
        $cdi = $edit_row['id_cdi'];
        $id_periodo_ninio = $edit_row['id_periodo_ninio'];*/
        $imagen_ninio = $edit_row['imagen_ninio'];
        //echo $imagen_ninio;
        //echo "HOLA OSKC";

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
                    <?php require_once('inc/sidebar.php'); ?>
                </div>
                <div class="col-md-9">
                    <h1><i class="fa fa-user-plus"></i> Editar<small> Fotografía del Niño(a)</small></h1><hr>
                    <ol class="breadcrumb">
                    <li><a href="profile_datos_ninio_CDIS.php?edit=<?php echo $edit_id; ?>&numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>"><i class="fas fa-chevron-left"></i> Regresar</a></li>
                    </ol>
                    <?php
                    if (isset($_POST['submit'])) {//si se ha presionado el boton subbmit
                        $image = $_FILES['image']['name'];
                        $image_temp = $_FILES['image']['tmp_name'];

                        $consulta="UPDATE `tbl_datos_personales_ninio` SET `imagen_ninio` = '$image' WHERE `id_ninio` = $edit_id";

                       // $del_query = mysqli_query($con, $consulta);//ejecutar consulta
                        if (mysqli_query($con, $consulta)) {
                             //$msg = "Registro modificado";
                             $path="../admin/img/$image";
                                
                                
                                move_uploaded_file($image_temp, "../admin/img/$image"); /** Mueve un archivo subido a una nueva ubicación */
                                //move_uploaded_file($image_tmp, $path);
                                //copy($path,"../$path");
                                //header("location: profile_datos_ninio_CDIS.php?edit="'<?php echo $edit_id; );
                                $msg = "Fotografía modificada";
                                move_uploaded_file($image_temp, "../admin/img/$image");
                        } else {
                                $error = "Fotografía no modificada";
                        }
                        //$password = crypt($password, $salt);
                       
                    }
                    ?>



<!--*****************************************************************************************-->
                    <form action="" method="post" enctype="multipart/form-data">

<!--............................................Fotografia........................................................-->
                        <div class="row">
                            <div class="col-xs-5">
                                <div class="form-group" >                                         
                                    <?php
                                        if (isset($error)) {
                                            echo "<span class='pull-right' style='color:red;'>$error</span>";
                                        } else if (isset($msg)) {
                                            echo "<span class='pull-right' style='color:green;'>$msg</span>";
                                        }
                                    ?>  
                                    <label for="image">Fotografía</label>
                                    <input type="file" id="image" name="image" value="<?php echo($imagen_ninio); ?>" required>
                                </div>
                            </div>   
                        </div>      
                        
                        <br>
                                <input type="submit" value="Terminar Edición" name="submit" class="btn btn-primary">
                                <a href="profile_datos_ninio_CDIS.php?edit=<?php echo $edit_id; ?>&numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>">
                                    <button type="button" class="btn btn-primary">Cancelar</button>
                                </a>
                                <a href="editar_datos_ninio_CDIS.php?edit=<?php echo $edit_id; ?>&numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>">
                                    <button type="button" class="btn btn-primary">Regresar</button>
                                </a>                               
                    </form>
            </div>
        </div>
     </div>

    <?php require_once('inc/footer.php'); ?>
                    