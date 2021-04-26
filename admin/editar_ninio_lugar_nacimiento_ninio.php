<?php
require_once('../admin/inc/top.php');
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}
ob_start();
require_once('../inc/db.php');//CONEXION CON BASE DE DATOS



if (isset($_GET['edit'])) {//si esque hay la variable edit
    $edit_id = $_GET['edit'];//get y post sirven para atrapar datos.
    //echo($edit_id);

    $edit_query = "SELECT tbl_datos_personales_ninio.id_ninio, 
    tbl_pais.id_pais, tbl_pais.detalle AS detalle_pais,
    tbl_provincia.id_provincia, tbl_provincia.detalle AS detalle_provincia,
    tbl_canton.id_canton, tbl_canton.detalle AS detalle_canton,
    tbl_parroquia.id_parroquia, tbl_parroquia.detalle AS detalle_parroquia
        FROM tbl_datos_personales_ninio
        INNER JOIN tbl_pais
        ON tbl_pais.id_pais = tbl_datos_personales_ninio.pais
        INNER JOIN tbl_provincia
        ON tbl_provincia.id_provincia = tbl_datos_personales_ninio.id_provincia
        INNER JOIN tbl_canton
        ON tbl_canton.id_canton = tbl_datos_personales_ninio.id_canton
        INNER JOIN tbl_parroquia
        ON tbl_parroquia.id_parroquia = tbl_datos_personales_ninio.id_parroquia
        WHERE tbl_datos_personales_ninio.id_ninio = $edit_id";
    $edit_query_run = mysqli_query($con, $edit_query);
   // if (mysqli_num_rows($edit_query_run) > 0) {/*if numero de filas es mayor q 0*/
        $edit_row = mysqli_fetch_array($edit_query_run);//fetch array sirve para que tu atrapestoda la fila de una table... fetch assoc.
        //$row = mysqli_fetch_array($run)
      
        
        //$idninio = $edit_row['id_ninio'];
        //echo $idninio;
        //echo 'HOLA';
        /*$idTipodocumento = $edit_row['id_docide'];
        $c_i = $edit_row['numero_docide'];
        $last_name = $edit_row['apellidos'];
        $first_name = $edit_row['nombres'];
        $fecha_nac = $edit_row['fecha_nac'];
        $anio_ninio = $edit_row['anio'];
        $mes_ninio = $edit_row['mes'];
        $dia_ninio = $edit_row['dia'];*/
        $pais_nac = $edit_row['detalle_pais'];
        $detalle_provincia = $edit_row['detalle_provincia'];
        $detalle_canton = $edit_row['detalle_canton'];
        $detalle_parroquia = $edit_row['detalle_parroquia'];
       /* $dir = $edit_row['direccion_dom'];
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
        $id_periodo_ninio = $edit_row['id_periodo_ninio'];
        $imagen_n = $edit_row['imagen_ninio'];*/

   // } else {
       // header('location: index.php');
  /*  }*/
} else {
    header("location: index.php");
}       
?>

<script>                        
                        $(document).ready(function(e){
                            $("#provincia").change(function(){
                                var parametros ="id="+$("#provincia").val();
                                
                                $.ajax({
                                    data:parametros,
                                    url: '../admin/ajax_canton.php',
                                    type: 'post',
                                    beforeSend: function(){
                                    
                                    },
                                    success: function(response){
                                    
                                        $("#canton").html(response);
                                    },
                                    error:function(){
                                        alert("error")
                                    }
                                });            
                            })

                            $("#canton").change(function(){
                                var parametros ="id="+$("#canton").val();
                            // alert(parametros)
                                $.ajax({
                                    data:parametros,
                                    url: '../admin/ajax_parroquia.php',
                                    type: 'post',
                                    beforeSend: function(){
                                    
                                    },
                                    success: function(response){
                                    
                                        $("#parroquia").html(response);
                                    },
                                    error:function(){
                                        alert("error")
                                    }
                                });            
                            })
                        })                    
                    </script>

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
                    <h1><i class="fa fa-user-plus"></i> Editar<small> Lugar de nacimiento del Niño(a)</small></h1><hr>
                    <ol class="breadcrumb">
                    <li><a href="editar_datos_ninio.php?edit=<?php echo $edit_id; ?>"><i class="fas fa-chevron-left"></i> Regresar</a></li>
                    </ol>
                    <?php
                    if (isset($_POST['submit'])) {//si se ha presionado el boton subbmit
                        $pais_nombre = ($_POST['pais_nombre']);
                        $provincianac = ($_POST['provincia_n']);
                        $cantonnac = ($_POST['canton_no']);
                        $parroquia_n = ($_POST['parroquia_ni']);
                                                                    
                                                
                        $consulta="UPDATE tbl_datos_personales_ninio SET pais = '$pais_nombre', id_provincia = '$provincianac', id_canton = '$cantonnac', id_parroquia = '$parroquia_n'
                        WHERE id_ninio = $edit_id";
                        //$ejecutar = mysqli_query($con, $consulta);//ejecutar consulta
                        if (mysqli_query($con, $consulta)) {
                            $msg = "Lugar de nacimiento modificado";
                        } else {
                            $error = "Lugar de nacimiento no modificado";
                        }
                        
                        
                        //$password = crypt($password, $salt);                       
                    }
                    ?>
       
                <form action="" method="post" enctype="multipart/form-data">


<!--............................................Lugar de Nacimiento........................................................-->
                            <div class="row">                             
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <?php
                                            if (isset($error)) {
                                                echo "<span style='color:red;' class='pull-right'>$error</span>";
                                            } else if (isset($msg)) {
                                                echo "<span style='color:green;' class='pull-right'>$msg</span>";
                                            }        
                                        ?>
                                        <label for="pais_nombre">Lugar de Nacimiento:</label> 

                                        <script type="text/javascript">
                                            function mostrar(a) {
                                                if (a=="otro") {
                                                    $("#otro").show();
                                                    $("#Ecuador").hide();                                        
                                                }

                                                if (a == "1") {
                                                    $("#otro").hide();
                                                    $("#Ecuador").show();                                    
                                                }                                   
                                            }    
                                        </script>    
                            
                                            <select  class="form-control" onChange="mostrar(this.value); " name="pais_nombre" required >
                                                    <option value="<?php echo $pais_nac ?>"><?php echo $pais_nac ?></option>
                                                    <option name="pais_nombre" value="1">Ecuador</option>
                                                  <!--  <option value="otro">Otro</option>  -->                                      
                                            </select>
                            
                                       <!-- <div id="otro" style="display: none;"> <br>                        
                                                <div class="form-group" >
                                                <label class = "col-md-3" style= padding-top: 1%;padding-right: 10% for="role">Seleccione el país:</label>  
                                                    <div class="row" >                          
                                                        <div class="col-md-8">                          
                                                            <select class="form-control" name="pais_nombre" id="pais_nombre">
                                                                <option value="seleccione" selected>Seleccione</option>  -->
                                                                <?php
                                                                  /*  $sql_genero = "select * from tbl_pais WHERE id_pais != 1";
                                                                      $ejecutar = mysqli_query($con, $sql_genero);//ejecutar consulta
                                                                    
                                                                    if (mysqli_num_rows($ejecutar) > 0) {
                                                                        while ($row2 = mysqli_fetch_array($ejecutar)) {                                                                              
                                                                            $genero_n = $row2['detalle'];
                                                                            $id_genero = $row2['id_pais'];
                                                                            echo "<option value='" . $id_genero. "' " .  ">" . ($genero_n) . "</option>";
                                                                        }
                                                                    } */
                                                                ?>
                                                       <!--     </select>
                                                        </div>  
                                                    </div>
                                                </div>
                                            </div>        -->    
                            
                                            <div id="Ecuador" style="display: none;" >  <br>
                                              <label for="provincia_n" class = "col-md-1" style="padding-top: 1%;padding-right: 10%" >Provincia:</label> 
                                                <div class="row" >                          
                                                    <div class="col-md-8"> 
                                                        <select name="provincia_n" class="form-control" id="provincia">
                                                            <option value="<?php echo $detalle_provincia ?>"><?php echo $detalle_provincia ?></option>
                                                              
                                                            <?php
                                                                $sql_provincia = "select * from tbl_provincia where id_provincia != 0 ";
                                                                $ejecutar_prov = mysqli_query($con, $sql_provincia);//ejecutar consulta
                                                                
                                                                if (mysqli_num_rows($ejecutar_prov) > 0) {
                                                                    while ($row_prov = mysqli_fetch_array($ejecutar_prov)) {
                                                                        
                                                                        $nom_prov = $row_prov['detalle'];
                                                                        $id_prov = $row_prov['id_provincia'];
                                                                        echo "<option value='" . $id_prov. "' " .  ">" . ($nom_prov) . "</option>";
                                                                    }
                                                                } 
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div><br>
                                                <label for="canton_no" class = "col-md-1" style="padding-top: 1%;padding-right: 10%">Cantón:</label>                            
                                                <div class="row" >                          
                                                    <div class="col-md-8">
                                                        <select name="canton_no" id="canton" class="form-control" >
                                                        <option value="<?php echo $detalle_canton ?>"><?php echo $detalle_canton ?></option>
                                                        </select>
                                                    </div>
                                                </div><br>
                                                <label for="parroquia_ni" class = "col-md-1" style="padding-top: 1%;padding-right: 10%">Parroquia:</label>
                                                <div class="row" >                          
                                                    <div class="col-md-8">
                                                        <select name="parroquia_ni" class="form-control" id="parroquia">
                                                        <option value="<?php echo $detalle_parroquia ?>"><?php echo $detalle_parroquia ?></option>                                        
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>    
                                    </div>
                                </div>
                            </div>
        


                                
                      
<!--............................................Imagen........................................................-->
                                        <input type="submit" value="Terminar Edición" name="submit" class="btn btn-primary">
                                        <a href="editar_datos_ninio.php?edit=<?php echo $edit_id; ?>">
                                            <button type="button" class="btn btn-primary">Cancelar</button>
                                        </a>
                                        <a href="editar_datos_ninio.php?edit=<?php echo $edit_id; ?>">
                                            <button type="button" class="btn btn-primary">Regresar</button>
                                        </a>       
                                        

                </form>   
                
                          
                                
                           
                           
                        
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php require_once('inc/footer.php'); ?>
                    