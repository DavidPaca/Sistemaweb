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
<!--*********************************************** DESDE AQUI **************************************************** --> 

<!--*********************************************** TITULO ALIMENTOS **************************************************** -->                                             
<label for="n_establec_dis" style="font-size:1.5rem">ALIMENTOS</label>



<!--------------------------------------------------Ha tenido alergias------------------------------------------------------------>                   
                                
                    <script type="text/javascript">
                        function mostrar_nombre_alergias(a) {
                            if (a== "No_tiene_alergia") {
                                $("#No_tiene_alergia").show();
                                $("#Si_tiene_alergia").hide();
                            
                            }

                            if (a == "Si_tiene_alergia") {
                                $("#No_tiene_alergia").hide();
                                $("#Si_tiene_alergia").show();
                            }                 
                        }    
                    </script>    

                    <div class="form-group">
                      <label for="n_establec_dis">¿Tiene alérgia a algún(os) alimento(s)?</label> 
                        <div class="row">
                            <div class="col-md-3">
                                <select class="form-control" id="n_establec_dis" name="n_establec_dis" onChange="mostrar_nombre_alergias(this.value);">
                                    <option value="seleccione">Seleccione</option>
                                    <option value="Si_tiene_alergia">Si</option>
                                    <option value="No_tiene_alergia">No</option>
                                
                                </select>
                            </div>
                           
                        </div>
                    </div>
                            
                    
                    <div id="No_tiene_alergia" style="display: none;">                        
                        <div class="form-group">
                         <label for="n_establec_dis">***************Sin alergias***************</label>                             
                        </div>
                    </div>
                    
                    <div id="Si_tiene_alergia" style="display: none;">
                        <div class="form-group">
                        <label class = "col-md-1" style="padding-top: 1%;padding-right: 10%" for="role">Especifíque:</label>  
                            <div class="row" >                          
                                <div class="col-md-8">
                                    <select class="form-control" name="ninio_nivel" id="ninio_nivel">
                                      <option value="seleccione">Seleccione</option>
                                        <?php
                                        $sql_nivel_ninio = "select * from tbl_alimentos";
                                        $ejecutar = mysqli_query($con, $sql_nivel_ninio);//ejecutar consulta
                                        
                                        if (mysqli_num_rows($ejecutar) > 0) {
                                            while ($row2 = mysqli_fetch_array($ejecutar)) {  
                                                
                                                $detalle_nivel = $row2['detalle'];

                                                $id_nivel = $row2['id_alimentos'];
                                                echo "<option value='" . $id_nivel. "' " .  ">" . ($detalle_nivel) . "</option>";
                                            }
                                        } 
                                        ?>
                                    </select>
                                    
                                </div>
                                <button type="button" class="btn btn-primary">Agregar</button>
                                
                            </div> 
                        </div> 
                    </div>        
                </form>
                    </div> 
                    </div>

                    </div>
                    </div>
                    </div>
                      




        

        <?php require_once('inc/footer.php'); ?>