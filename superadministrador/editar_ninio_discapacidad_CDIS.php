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
        $first_name = $edit_row['nombres'];
        $fecha_nac = $edit_row['fecha_nac'];
        $anio_ninio = $edit_row['anio'];
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
        $ni_discapacidad = $edit_row['discapacidad'];
        //echo $ni_discapacidad;
        //echo "HOLA SI";
        $ni_porcentaje = $edit_row['porcentaje'];
        $carnet_conadis = $edit_row['carnet_conadis'];
        $tip_discapacidad_n = $edit_row['id_tipo_discapacidad'];
        $estable_discap = $edit_row['asiste_estableci_personas_discapacidad'];
        $nombre_estable = $edit_row['nombre_establecimiento'];
        /*$n_peso = $edit_row['peso'];
        $n_talla = $edit_row['talla'];
        $n_nivel = $edit_row['id_niveles_ninio'];
        $sobrenombre = $edit_row['como_lo_llaman'];
        $cdi = $edit_row['id_cdi'];
        $id_periodo_ninio = $edit_row['id_periodo_ninio'];
        $imagen_n = $edit_row['imagen_ninio'];*/

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
                    <?php require_once('inc/sidebar.php'); ?>
                </div>
                <div class="col-md-9">
                    <h1><i class="fa fa-user-plus"></i> Editar<small> Fecha de nacimiento del Niño(a)</small></h1><hr>
                    <ol class="breadcrumb">
                    <li><a href="editar_datos_ninio_CDIS.php?edit=<?php echo $edit_id; ?>&numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>"><i class="fas fa-chevron-left"></i> Regresar</a></li>
                    </ol>
                    <?php
                    if (isset($_POST['submit'])) {//si se ha presionado el boton subbmit
                    
                        $n_discap = ($_POST['n_discap']);
                        $n_tipo_disca = ($_POST['n_tipo_disca']);
                        $n_porcentaje = ($_POST['n_porcentaje']);
                        $n_conadis = ($_POST['n_conadis']);
                        $n_establec_dis = ($_POST['n_establec_dis']);
                        //$nom_establec = ($_POST['nom_establec']);
                        

                        if ($_POST['nom_establec'] == null){
                            $nom_establec= 'No asiste';

                        }else{
                            $nom_establec = ($_POST['nom_establec']);
                        }
                       

                        $consulta="UPDATE tbl_datos_personales_ninio SET discapacidad='$n_discap', id_tipo_discapacidad='$n_tipo_disca',porcentaje='$n_porcentaje',
                        carnet_conadis='$n_conadis', asiste_estableci_personas_discapacidad='$n_establec_dis', nombre_establecimiento='$nom_establec'
                        WHERE id_ninio = $edit_id";
                        //$ejecutar1 = mysqli_query($con, $consulta);//ejecutar consulta
                        if (mysqli_query($con, $consulta)) {
                            //header("Location: profile_datos_ninio_CDIS.php");
                            $msg = "Datos modificado";
                        } else {
                            $error = "Datos no modificado";
                        }                                               
                        //$password = crypt($password, $salt);                       
                    }
                    ?>

                <form action="" method="post" enctype="multipart/form-data">
              <!--  <label for="date">NOTA: En caso de modificar datos a las opción "NO", modificar todos los datos:</br> 
                 &nbsp   - &nbsp Tipo de discapacidad</br>
                 &nbsp   - &nbsp Especificación de tipo de discapacidad</br>
                 &nbsp   - &nbsp Porcentaje</br>
                 &nbsp   - &nbsp Carnet CONADIS</br>
                 &nbsp   - &nbsp Asistencia a Establecimiento de educación especial</br>
                 &nbsp   - &nbsp Nombre o Lugar del Establecimiento de educación especial</br></br> </label> -->


<!--******************************************** Tiene discapacidad *********************************************-->
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="date">Discapacidad :</label> 

                                <?php
                                    if (isset($error)) {
                                        echo "<span style='color:red;' class='pull-right'>$error</span>";
                                    } else if (isset($msg)) {
                                        echo "<span style='color:green;' class='pull-right'>$msg</span>";
                                    }        
                                ?>

                                 <!--   <script type="text/javascript">
                                        function mostrar_discapacidad(a) {
                                            if (a== "No") {
                                                $("#no_discap").show();
                                                $("#si_discap").hide();
                                                
                                            }

                                            if (a == "Si") {
                                                $("#no_discap").hide();
                                                $("#si_discap").show();
                                            }                 
                                        }    
                                    </script>    -->

                                    <div class="form-group">
                                      <label for="n_discap">¿Tiene algún tipo de discapacidad?</label> 
                                        <div class="row">
                                            <div class="col-md-3">
                                                <select class="form-control" id="n_discap" name="n_discap" >
                                                    <option value="<?php echo $ni_discapacidad ?>"><?php echo $ni_discapacidad ?></option>                                                         
                                                    <option value="No">No</option>
                                                    <option value="Si">Si</option>
                                                    
                                                
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                        
                                
                                <!--    <div id="no_discap" style="display: none;">                        
                                        <div class="form-group">
                                            <label for="n_discap">***************No tienes DISCAPACIDADES***************</label>                             
                                        </div>
                                    </div>  -->
                                    
                                
                                    <!--<div id="si_discap" style="display: none;"> -->
                                      <label for="n_tipo_disca">Especifíque:</label> 
                                        <select name="n_tipo_disca" class="form-control" id="especificar">
                                          <option value="seleccione">Seleccione</option>  -->
                                            <?php
                                                $sql_tdiscap = "select * from tbl_tipos_discapacidad where id_tipo_discapacidad != 0 order by detalle asc";
                                                $ejecutar_tdiscap = mysqli_query($con, $sql_tdiscap);//ejecutar consulta
                                                $sql_llenart_dicapa = "SELECT tbl_datos_personales_ninio.id_docide,tbl_tipos_discapacidad.detalle FROM tbl_datos_personales_ninio INNER JOIN tbl_tipos_discapacidad ON tbl_datos_personales_ninio.id_tipo_discapacidad = tbl_tipos_discapacidad.id_tipo_discapacidad Where id_ninio = $edit_id";
                                                        $ejecutar_llenar_tdiscap = mysqli_query($con, $sql_llenart_dicapa);
                                                        $row_tdiscap = mysqli_fetch_array($ejecutar_llenar_tdiscap);
                                                        $idlltdiscap=$row_tdiscap['id_tipo_discapacidad'];
                                                            $detallelltdiscap=$row_tdiscap['detalle'];
                                                            echo "<option value='" . $idlltdiscap. "' " .  " selected>" . ($detallelltdiscap) . "</option>";
            
                                                if (mysqli_num_rows($ejecutar_tdiscap) > 0) {
                                                    while ($row_tdiscap = mysqli_fetch_array($ejecutar_tdiscap)) {
                                                        
                                                        $nom_tdiscap = $row_tdiscap['detalle'];
                                                        $id_tdisca = $row_tdiscap['id_tipo_discapacidad'];
                                                        echo "<option value='" . $id_tdisca. "' " .  ">" . ($nom_tdiscap) . "</option>";
                                                    }
                                                } 
                                            ?>
                                        </select>
                                                                    
                                        
                                                <label for="porcentaje_d">Porcentaje:</label>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="input-group">                                            
                                                            <input type="text" id="n_porcentaje" name="n_porcentaje" maxlength="3" type="range" min="1" max="100"class="form-control" value="<?php echo($ni_porcentaje); ?>" >
                                                            <span class="input-group-addon">%</span>   
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="n_conadis">Tiene Carnet del CONADIS:</label>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <select name="n_conadis" id="n_conadis" class="form-control">
                                                                <option value="<?php echo $carnet_conadis ?>"><?php echo $carnet_conadis ?></option>
                                                                <option value="Si">Si</option>
                                                                <option value="No">No</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>   


                                         <!--   <script type="text/javascript">  
                                                function mostrar_establecimiento_discapacidad(a) {
                                                    if (a== "No") {
                                                        $("#no_establecimiento").show();
                                                        $("#si_establecimiento").hide();
                                                    
                                                    }

                                                    if (a == "Si") {
                                                        $("#no_establecimiento").hide();
                                                        $("#si_establecimiento").show();
                                                    }                 
                                                }    
                                            </script>    -->

                                            <div class="form-group">
                                              <label for="n_establec_dis">¿Asiste a algún establecimiento de Educación Especial?</label> 
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <select class="form-control" id="n_establec_dis" name="n_establec_dis">
                                                            <option value="<?php echo $estable_discap ?>"><?php echo $estable_discap ?></option>
                                                            <option value="Si">Si</option>
                                                            <option value="No">No</option>                                            
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                
                                       <!-- <div id="no_establecimiento" style="display: none;">                       
                                                <div class="form-group">
                                                    <label for="n_establec_dis">***************No ASISTE NADIE***************</label>                             
                                                </div>
                                            </div>  -->
                                
                                
                                        <!--    <div id="si_establecimiento" style="display: none;">   -->
                                                <div class="form-group">
                                                    <label for="nom_establec">Nombre/Lugar:</label>
                                                    <input type="text" id="nom_establec" name="nom_establec" class="form-control" value="<?php echo($nombre_estable); ?>" >
                                            <!--    </div>  -->
                                            </div>  
                                   <!-- </div> -->
                            
                                      
                                 

                            </div>                                
                        </div>
                    </div>
                    <br>
                                        <input type="submit" value="Terminar Edición" name="submit" class="btn btn-primary">
                                        <a href="editar_datos_ninio_CDIS.php?edit=<?php echo $edit_id; ?>&numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>">
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
                    