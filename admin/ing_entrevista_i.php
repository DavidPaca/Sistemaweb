<?php
require_once('inc/top.php');
ob_start();
require_once('../inc/db.php');//CONEXION CON BASE DE DATOS
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
                    <h1><i class="fa fa-user-plus"></i> Agregar<small>/Entrevista Inicial del Niño </small></h1><hr>
                    <ol class="breadcrumb">
                         <li><a href="index.php"><i class="fas fa-home"></i> Menú</a></li>
                        <li class="active"><i class="fa fa-user-plus"></i> Entrevista Inicial</li>
                    </ol>



<?php
/*---------------------------Guarda los datos ingresados en los cajones en las variables------------------------------------------*/
                    if (isset($_POST['submit'])) {
                        //$date = time();
                        $nombre_ninio = mysqli_real_escape_string($con, $_POST['nombreninio']);
                        $alergia_ali = mysqli_real_escape_string($con, $_POST['alergiaali']);     /*first name es el nombre del cajon*/
                        $enfermedades_gra = mysqli_real_escape_string($con, $_POST['enfergraves']);
                        $accidentes = mysqli_real_escape_string($con, $_POST['akidentes']);
                        $tiene_alergia = mysqli_real_escape_string($con, $_POST['tienealer']);
                            //$role = $_POST['role'];
                        $come_solo = mysqli_real_escape_string($con, strtolower($_POST['comesolo']));
                        $vocabulario = mysqli_real_escape_string($con, strtolower($_POST['vocabular']));
                        $mas_relacion = mysqli_real_escape_string($con, strtolower($_POST['masrelacion']));
                        $acti_negativa = mysqli_real_escape_string($con, strtolower($_POST['actinegativa']));
                        $depende_adultos = mysqli_real_escape_string($con, strtolower($_POST['dependeadultos']));
                        $le_gusta_jugar = mysqli_real_escape_string($con, strtolower($_POST['legustajugar']));
                        $mascota = mysqli_real_escape_string($con, strtolower($_POST['mascotas']));
                        $nombre_mascota = mysqli_real_escape_string($con, strtolower($_POST['nombremascota']));
                        $llora_facil = mysqli_real_escape_string($con, strtolower($_POST['llorafacil']));
                        $mira_tv = mysqli_real_escape_string($con, strtolower($_POST['miratv']));
                        $escucha_music = mysqli_real_escape_string($con, strtolower($_POST['escuchamusic']));
                        $gusta_bailar = mysqli_real_escape_string($con, strtolower($_POST['gustabailar']));
                        $tiene_miedo = mysqli_real_escape_string($con, strtolower($_POST['tienemiedo']));
                        $referencia_cdi = mysqli_real_escape_string($con, strtolower($_POST['refercdi']));
                        
                       
                        
                        //$cdi = mysqli_real_escape_string($con, strtolower($_POST['cdi']));
                        //$image = $_FILES['image']['name'];
                        //$image_temp = $_FILES['image']['tmp_name'];

                      //  echo($first_name.$last_name.$username.$password.$role.$role.$email.$telef.$dir.$cdi);

                        
                        
                        //$password = crypt($password, $salt);
/*----------------------empty =vacio--------------------------*/
                        if (empty($nombre_ninio)     or empty($depende_adultos) ) { //or empty($username) or empty($email) or empty($password)) {
                            $error = "Todos los (*) Campos son requeridos";
                        } else {
                            $insert_query = " INSERT INTO tbl_entrevista_inicial (id_ninio, alergias_aliment, tuvo_enfer_graves, sufrido_accidentes, alergico, come_solo, vocalbulario, con_quien_relacion_ni, actitud_negativa, dapende_adutos, le_gusta_jugar, mascota, nombre_mascota, llora_facil, mira_tv, escucha_musica, gustar_bailar, tiene_miedo, id_ref_cdi) VALUES ('$nombre_ninio','$alergia_ali','$enfermedades_gra','$accidentes','$tiene_alergia', '$come_solo','$vocabulario','$mas_relacion','$acti_negativa','$depende_adultos','$le_gusta_jugar','$mascota','$nombre_mascota','$llora_facil','$mira_tv','$escucha_music','$gusta_bailar','$tiene_miedo','$referencia_cdi')";

                            //$insert_query = "INSERT INTO tbl_usuario (ci,apellidos,nombres,tipo,correo_e,direccion_dom,telefono,contrasenia,id_cdi,referencia_cdi,imagen_usuario) values('$username','$last_name','$first_name','$role','$email','$dir','$telef','$password','$cdi','referencia','$image')";
                            if (mysqli_query($con, $insert_query)) {
                              //  $msg = "Datos de la Entrevista actual Ingresada";
                             //   $path="img/$image";

                                
                                move_uploaded_file($image_temp, "img/$image"); /** Mueve un archivo subido a una nueva ubicación */
                               move_uploaded_file($image_tmp, $path);
                               copy($path,"../$path");
                                $msg = "Datos de la Entrevista actual Ingresada";
                                /*$first_name = "";
                                $last_name = "";
                                $email = "";
                                $username = "";*/
                                header("Location: nientrevistaregistrada.php"); /*para poder volver al blog o login*/
                            } else {
                                $error = "Datos de la Entrevista actual No Ingresada";
                            }
                        }
                    }
                    ?>

<!--------------------------------------------------Tamaño cajones------------------------------------------------------------>
<div class="row">
                        <div class="col-md-8">
                            <form action="" method="post" enctype="multipart/form-data">     


<!--------------------------------------------------Busqueda ninios------------------------------------------------------------>
<?php
/*$idninio = $_POST ['id_ninio'];
$consultadatos = mysqli_query ("Select * from tbl_datos_personales_ninio where id_ninio = $nombre_ninio");
while ($consultadatos = mysqli_fetch_array ($consultadatos)){
    echo $consultadatos ['id_ninio']." ".$consultadatos ['nombres']." ".$consultadatos ['apellidos'];
}*/
?>
 
<!--------------------------------------------------id Ninio------------------------------------------------------------>
                                    <div class="form-group">
                                    <label for="role">Niño:</label>
                                    <select class="form-control" name="nombreninio" id="categories">
                                        <?php
                                        $sql_cdi = "select * from tbl_datos_personales_ninio";
                                        $ejecutar = mysqli_query($con, $sql_cdi);//ejecutar consulta  ucfirst
                                        
                                        if (mysqli_num_rows($ejecutar) > 0) {
                                            while ($row2 = mysqli_fetch_array($ejecutar)) {  
                                                
                                                $apellidosninio = $row2['apellidos'];
                                                $apellidosnin = $row2['nombres'];
                                                $idninio = $row2['id_ninio'];
                                              
                                                echo "<option value='" . $idninio. "' " .  ">". $apellidosnin." ".$apellidosninio. "</option>";
                                                //echo "<option value='" . $idninio. "' " .  ">" . ($apellidosnin) . "</option>";
                                                
                                            }
                                        } else {
                                        // echo "<center><h6>Categoría no disponible</h6></center>";
                                        }
                                        ?>
                                    </select>
                                </div>
           
<!--------------------------------------------------Ha tenido alergias------------------------------------------------------------>                   
                                
                     <!--           <div class="form-group">
                                   <label for="alergiaali">¿Tiene alergia a algún tipo de alimento? </label><br>
                                    <select name="alergiaali" id="role" >
                                        <option value="Si">Si</option>
                                        <option value="No">No</option>
                                    </select> <br>
                                    <label for="alergiaali">¿Especifíque? </label>-->
                                    <?php
                                /*    if (isset($error)) {
                                        echo "<span class='pull-right' style='color:red;'>$error</span>";
                                    } else if (isset($msg)) {
                                        echo "<span class='pull-right' style='color:green;'>$msg</span>";
                                    }*/
                                    ?>
                                  <!--  <input type="text" id="first-name" name="alergiaali" class="form-control" value="<?php
                                   // if (isset($first_name)) {
                                     //   echo $first_name;
                                  //  }
                                    ?>" placeholder="">
                                </div>-->

                                <div class="form-group">
                                    <label for="alergiaali">¿Tiene alergia a algún tipo de alimento? (De ser la respuesta afirmativa "Especifique") </label>
                                    <input type="text" id="last-name" name="alergiaali" class="form-control" value="<?php
                                    if (isset($last_name)) {
                                        echo $last_name;
                                    }
                                    ?>" placeholder="">
                                </div>

 <!--------------------------------------------------Enfermedades Graves------------------------------------------------------------>
                                <div class="form-group">
                                    <label for="enfergraves">¿Ha sufrido alguna enfermedad grave? (De ser la respuesta afirmativa "Especifique") </label>
                                    <input type="text" id="last-name" name="enfergraves" class="form-control" value="<?php
                                    if (isset($last_name)) {
                                        echo $last_name;
                                    }
                                    ?>" placeholder="">
                                </div>

<!--------------------------------------------------Accidentes------------------------------------------------------------>
                                <div class="form-group">
                                    <label for="akidentes">¿Ha sufrido accidentes?(De ser la respuesta afirmativa "Especifique")</label>
                                    <input type="text" id="username" name="akidentes" class="form-control" value="" placeholder="">
                                </div>

<!--------------------------------------------------Es alergico------------------------------------------------------------>
                                <div class="form-group">
                                    <label for="tienealer">¿ES alérgico?(De ser la respuesta afirmativa "Especifique")</label>
                                    <input type="text" id="username" name="tienealer" class="form-control" value="" placeholder="">
                                </div>

<!--------------------------------------------------Come Solo------------------------------------------------------------>
<div class="form-group">
                                    <label for="comesolo">¿Come solo?</label>
                                    <input type="text" id="username" name="comesolo" class="form-control" value="" placeholder="">
                                </div>

<!--------------------------------------------------Vocabulario----------------------------------------------------------->
                               <div class="form-group">
                                    <label for="vocabular">¿Como es su vocavulario?</label>
                                    <select name="vocabular" id="role" class="form-control">
                                        <option value="No habla">No habla</option>
                                        <option value="Habla Poco">Habla Poco</option>
                                        <option value="Entendible">Entendible</option>
                                        
                                    </select>
                                </div>


<!--<div class="form-group">
                                   <label for="vocabular">¿ES alérgico?(De ser la respuesta afirmativa "Especifique")</label>
                                    <input type="text" id="username" name="vocabular" class="form-control" value="" placeholder="">
                                </div> -->
<!--------------------------------------------------Persoan con quien tiene mas relacion------------------------------------------------------------>
<div class="form-group">
                                    <label for="masrelacion">¿Con qué persona de su familia tiene mas relación?</label>
                                    <input type="text" id="username" name="masrelacion" class="form-control" value="" placeholder="">
                                </div>

<!--------------------------------------------------Actitud negativa------------------------------------------------------------>
<div class="form-group">
                                    <label for="actinegativa">¿Presenta alguna actitud negativa?(De ser la respuesta afirmativa "Especifique")</label>
                                    <input type="text" id="username" name="actinegativa" class="form-control" value="" placeholder="">
                                </div>

<!--------------------------------------------------Tiene dependencia adultos------------------------------------------------------------>
<div class="form-group">
                                    <label for="dependeadultos">¿Tiene dependencia de un adulto?(De ser la respuesta afirmativa "Especifique")</label>
                                    <input type="text" id="username" name="dependeadultos" class="form-control" value="" placeholder="">
                                </div>    

<!--------------------------------------------------Tipos de juegos le gusta jugar------------------------------------------------------------>
<div class="form-group">
                                    <label for="legustajugar">¿Qué tipos de juegos le gusta juegar?</label>
                                    <input type="text" id="username" name="legustajugar" class="form-control" value="" placeholder="">
                                </div>   

<!--------------------------------------------------Tiene mascota----------------------------------------------------------->
<div class="form-group">
                                    <label for="mascotas">¿Tiene mascota?(De ser la respuesta afirmativa "Especifique")</label>
                                    <input type="text" id="username" name="mascotas" class="form-control" value="" placeholder="">
                                </div>   

<!--------------------------------------------------Nombre de la mascota------------------------------------------------------------>
<div class="form-group">
                                    <label for="nombremascota">¿Cuál es el ombre de la mascota?</label>
                                    <input type="text" id="username" name="nombremascota" class="form-control" value="" placeholder="">
                                </div>   

<!--------------------------------------------------Llora facilidad------------------------------------------------------------>
<div class="form-group">
                                    <label for="llorafacil">¿Llora con facilidad?(De ser la respuesta afirmativa "Especifique")</label>
                                    <input type="text" id="username" name="llorafacil" class="form-control" value="" placeholder="">
                                </div>   

<!--------------------------------------------------Mira tv------------------------------------------------------------>
<div class="form-group">
                                    <label for="miratv">¿Mira la televisión?(De ser la respuesta afirmativa "Especifique")</label>
                                    <input type="text" id="username" name="miratv" class="form-control" value="" placeholder="">
                                </div>   
                                
<!--------------------------------------------------Escucha musica------------------------------------------------------------>
<div class="form-group">
                                    <label for="escuchamusic">¿Le gusta escuchar música?(De ser la respuesta afirmativa "Especifique")</label>
                                    <input type="text" id="username" name="escuchamusic" class="form-control" value="" placeholder="">
                                </div>   

<!--------------------------------------------------Le gusta bailar------------------------------------------------------------>
<div class="form-group">
                                    <label for="gustabailar">¿Le gusta bailar?(De ser la respuesta afirmativa "Especifique")</label>
                                    <input type="text" id="username" name="gustabailar" class="form-control" value="" placeholder="">
                                </div>   

<!--------------------------------------------------Tiene dependencia adultos------------------------------------------------------------>
<div class="form-group">
                                    <label for="tienemiedo">¿Tiene miedo?(De ser la respuesta afirmativa "Especifique")</label>
                                    <input type="text" id="username" name="tienemiedo" class="form-control" value="" placeholder="">
                                </div>         

<!--------------------------------------------------Referencia de CDI------------------------------------------------------------>

<div class="form-group">
                                    <label for="role">¿Cuál fue el motivo que le inscribe a su niño en en nuestro CDI?</label>
                                    <select class="form-control" name="refercdi" id="categories">
                            <?php
                            $sql_cdi = "select * from tbl_referencia_cdi";
                            $ejecutar = mysqli_query($con, $sql_cdi);//ejecutar consulta
                            
                            if (mysqli_num_rows($ejecutar) > 0) {
                                while ($row2 = mysqli_fetch_array($ejecutar)) {
                                    
                                    $cdi1 = $row2['detalle'];
                                    $idcdi1 = $row2['id_ref_cdi'];
                                    echo "<option value='" . $idcdi1. "' " .  ">" . ucfirst($cdi1) . "</option>";
                                }
                            } else {
                               // echo "<center><h6>Categoría no disponible</h6></center>";
                            }
                            ?>
                        </select>
                                </div>

                    
                                <input type="submit" value="Agregar Datos Personales" name="submit" class="btn btn-primary">
                            </form>

<!--<div class="form-group">
                                    <label for="refercdi">¿Cuál fue el motivo que le inscribe a su niño en en nuestro CDI?(De ser la respuesta afirmativa "Especifique")</label>
                                    <input type="text" id="username" name="refercdi" class="form-control" value="" placeholder="">
                                </div>      -->                                                       

                            <!--    <div class="form-group">
                                    <label for="role">¿Come solo?</label>
                                    <select name="role" id="role" class="form-control">
                                        <option value="Parvulario">Si</option>
                                        <option value="Coordinador">No</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="email">¿Cómo es el vocavulario del niño?</label>
                                    <input type="text" id="email" name="email" class="form-control" value="<?php
                                   // if (isset($email)) {
                                   //     echo $email;
                                  //  }
                                    ?>" placeholder="">
                                </div> -->

                             <!--   <div class="form-group">
                                    <label for="telef">¿Con quién se relaciona mas el niño(a) con el papá, mamá u otro?</label> <!--maxlength="10"
                                    <input type="text" id="telef" name="telef" class="form-control"  value="<?php
                                    
                                    ?>" placeholder="">
                                </div>
                                <div class="form-group">
                                <label for="dir">¿Es sociable o presenta alguna actitud negativa?</label>
                                    <input type="text" id="dir" name="dir" class="form-control" value="<?php
                                    
                                    ?>" placeholder="">
                                </div>

                                <div class="form-group">
                                    <label for="role">CDI :*</label>  
                                    <select class="form-control" name="cdi" id="categories"> -->
                            <?php
                        /*    $sql_cdi = "select * from tbl_cdi";   
                            $ejecutar = mysqli_query($con, $sql_cdi);//ejecutar consulta*/
                            
                       /*     if (mysqli_num_rows($ejecutar) > 0) {
                                while ($row2 = mysqli_fetch_array($ejecutar)) {
                                    
                                    $cdi = $row2['nombre'];
                                    $idcdi = $row2['id'];
                                    echo "<option value='" . $idcdi. "' " .  ">" . ucfirst($cdi) . "</option>";
                                }
                            } else {
                               // echo "<center><h6>Categoría no disponible</h6></center>";
                            }
                            ?>
                        </select>
                                </div>
                                

                                

 <!--***************************************************insertar imagen***************************-->                               

                          <!--      <div class="form-group">
                                    <label for="image">Foto de perfil :*</label>
                                    <input type="file" id="image" name="image">
                                </div>

                                <input type="submit" value="Agregar Usuario" name="submit" class="btn btn-primary">
                            </form>
                        </div>-->
                       <!-- <div class="col-md-4">-->
                            <?php /*
                            if (isset($check_image)) {
                                echo "<img src='img/$check_image' width='50%'>";
                            }*/
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php //require_once('inc/footer.php'); ?>